<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Notifications\OrderStatusNotification;

class OrderController extends Controller
{
    // ============================
    // 🧍 CÔTÉ CLIENT
    // ============================

    // 🧾 Lister les commandes du client connecté
    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour voir vos commandes.');
        }

        $orders = Order::where('user_id', $user->id)->with('products')->orderBy('created_at', 'desc')->get();

        return view('orders.index', compact('orders'));
    }

    public function checkoutindex(Request $request)
    {
        // Récupérer le panier pour finalisation de commande
        $cart = $request->user()
            ? Cart::where('user_id', $request->user()->id)
                ->with('products')
                ->first()
            : Cart::where('session_id', $request->session()->getId())
                ->with('products')
                ->first();

        if (!$cart || $cart->products->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        // Récupérer les commandes pour les utilisateurs connectés
        $orders = [];
        if ($request->user()) {
            $orders = Order::where('user_id', $request->user()->id)
                ->with('products')
                ->get();
        }

        return view('checkout.details', compact('cart', 'orders'));
    }

    // 🔍 Voir les détails d’une commande
    public function show($id, Request $request)
    {
        $order = Order::with('products')->findOrFail($id);

        // Vérifie que l'utilisateur a accès à sa commande
        if ($request->user() && $order->user_id !== $request->user()->id) {
            abort(403, 'Accès non autorisé à cette commande.');
        }

        return view('orders.show', compact('order'));
    }

    // 🛒 Créer une nouvelle commande
    public function store(Request $request)
    {
        $user = $request->user();

        if (!$request->user()) {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour passer une commande.');
        }

        // Récupère le panier actif
        $cart = $user
            ? Cart::where('user_id', $user->id)->with('products')->first()
            : Cart::where('session_id', $request->session()->getId())
                ->with('products')
                ->first();

        if (!$cart || $cart->products->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        $total = $cart->products->sum(fn($p) => $p->price * $p->pivot->quantity);

        // Crée la commande
        $order = Order::create([
            'user_id' => $user->id ?? null,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'guest_phone' => $request->guest_phone,
            'guest_address' => $request->guest_address,
            'total' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method ?? 'cash_on_delivery',
        ]);

        // Associe les produits
        foreach ($cart->products as $product) {
            $order->products()->attach($product->id, [
                'quantity' => $product->pivot->quantity,
                'price' => $product->price,
            ]);
        }

        // Vide le panier
        $cart->products()->detach();

        // Après avoir créé la commande
\Log::info("🔵 Tentative d'envoi de notification à l'utilisateur", [
    'user_id' => $user->id,
    'email' => $user->email,
    'order_id' => $order->id,
]);

try {
    $user->notify(new OrderStatusNotification($order, 'created'));
    \Log::info("🟢 Notification envoyée à l'utilisateur avec succès", [
        'user_id' => $user->id,
    ]);
} catch (\Exception $e) {
    \Log::error("🔴 Erreur lors de la notification de l'utilisateur", [
        'message' => $e->getMessage(),
        'trace' => $e->getTraceAsString(),
    ]);
}


// ===============================
// 📩 Notification aux admins
// ===============================
$admins = \App\Models\User::role('admin')->get();

\Log::info("🟡 Nombre d'admins trouvés : " . $admins->count());

foreach ($admins as $admin) {

    \Log::info("🔵 Tentative d'envoi de notification admin", [
        'admin_id' => $admin->id,
        'email' => $admin->email,
        'order_id' => $order->id,
    ]);

    try {
        $admin->notify(new OrderStatusNotification($order, 'created'));
        \Log::info("🟢 Notification envoyée à l'admin", [
            'admin_id' => $admin->id
        ]);
    } catch (\Exception $e) {
        \Log::error("🔴 Erreur lors de la notification admin", [
            'admin_id' => $admin->id,
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
    }
}


        // 🔥 Redirige vers la page de détails de la commande avec succès
        return redirect()->route('orders.show', $order->id)->with('success', 'Votre commande a été enregistrée avec succès !');
    }

    // ❌ Annuler une commande
    public function cancel($id, Request $request)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id !== $request->user()->id) {
            abort(403, 'Vous ne pouvez pas annuler cette commande.');
        }

        if ($order->status !== 'pending') {
            return back()->with('error', 'Cette commande ne peut plus être annulée.');
        }

        $order->update(['status' => 'cancelled']);

        $user = $request->user();
        $user->notify(new OrderStatusNotification($order, 'cancelled'));

        $admins = \App\Models\User::role('admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new OrderStatusNotification($order, 'cancelled'));
        }
        return back()->with('success', 'Commande annulée avec succès.');
    }

    // ============================
    // 🧑‍💼 CÔTÉ ADMIN
    // ============================

    // 📋 Liste des commandes
    public function adminIndex()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // ✏️ Modifier le statut
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,confirmed,delivered,cancelled',
        ]);

        $oldStatus = $order->status;
        $order->update(['status' => $request->status]);

        // Notification
        $user = $order->user;
        $user->notify(new OrderStatusNotification($order, 'status_updated', $oldStatus, $order->status));

        $admins = \App\Models\User::role('admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new OrderStatusNotification($order, 'status_updated', $oldStatus, $order->status));
        }

        // Notifier l'utilisateur du changement de statut

        return back()->with('success', 'Statut mis à jour avec succès.');
    }
    // Afficher le détail d'une commande pour l'admin
    public function adminShow($id)
    {
        $order = Order::with('products', 'user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // 🗑️ Supprimer une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with('success', 'Commande supprimée.');
    }
}
