<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Afficher toutes les commandes du client
    public function index(Request $request)
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

        return view('orders.index', compact('cart', 'orders'));
    }

    // Afficher le détail d’une commande
    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Créer une nouvelle commande depuis le panier
    public function store(Request $request)
    {
        // Récupérer le panier
        $cart = $request->user()
            ? Cart::where('user_id', $request->user()->id)->with('products')->first()
            : Cart::where('session_id', $request->session()->getId())->with('products')->first();

        if (!$cart || $cart->products->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        $total = $cart->products->sum(fn($product) => $product->price * $product->pivot->quantity);

        // Créer la commande
        $order = Order::create([
            'user_id' => $request->user()->id ?? null, // null si invité
            'total' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'phone' => $request->user() ? $request->phone : $request->guest_phone,
            'address' => $request->user() ? $request->address : $request->guest_address,
        ]);

        // Si invité, enregistrer nom et email
        if (!$request->user()) {
            $order->guest_name = $request->guest_name;
            $order->guest_email = $request->guest_email;
            $order->guest_phone = $request->guest_phone;
            $order->guest_address = $request->guest_address;
            $order->save();
        }

        // Ajouter les produits à la commande
        foreach ($cart->products as $product) {
            $order->products()->attach($product->id, [
                'quantity' => $product->pivot->quantity,
                'price' => $product->price
            ]);
        }

        // Vider le panier
        $cart->products()->detach();

        return redirect()->route('home.index')->with('success', 'Commande passée avec succès.');
    }

    // Annuler une commande
    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'pending') {
            $order->update(['status' => 'cancelled']);
            return redirect()->route('orders.index')->with('success', 'Commande annulée.');
        }

        return redirect()->route('orders.index')->with('error', 'Impossible d’annuler cette commande.');
    }
}
