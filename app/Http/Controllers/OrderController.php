<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;

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

        $orders = Order::where('user_id', $user->id)
            ->with('products')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function checkoutindex(Request $request)
    {
     // Récupérer le panier pour finalisation de commande
        $cart = $request->user()
            ? Cart::where('user_id', $request->user()->id)->with('products')->first()
            : Cart::where('session_id', $request->session()->getId())->with('products')->first();

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

        // Récupère le panier actif
        $cart = $user
            ? Cart::where('user_id', $user->id)->with('products')->first()
            : Cart::where('session_id', $request->session()->getId())->with('products')->first();

        if (!$cart || $cart->products->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        $total = $cart->products->sum(fn($p) => $p->price * $p->pivot->quantity);

        // Crée la commande
        $order = Order::create([
            'user_id'        => $user->id ?? null,
            'guest_name'     => $request->guest_name,
            'guest_email'    => $request->guest_email,
            'guest_phone'    => $request->guest_phone,
            'guest_address'  => $request->guest_address,
            'total'          => $total,
            'status'         => 'pending',
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

        return redirect()->route('orders.index')->with('success', 'Votre commande a été enregistrée avec succès !');
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

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Statut mis à jour avec succès.');
    }

    // 🗑️ Supprimer une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with('success', 'Commande supprimée.');
    }
}



