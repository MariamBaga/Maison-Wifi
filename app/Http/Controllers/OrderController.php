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
        $orders = Order::where('user_id', $request->user()->id)
                        ->with('products')
                        ->get();

        return view('orders.index', compact('orders'));
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
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        $cart = Cart::where('user_id', $request->user()->id)->with('products')->first();

        if (!$cart || $cart->products->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        $total = $cart->products->sum(function($product) {
            return $product->price * $product->pivot->quantity;
        });

        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
        ]);

        foreach ($cart->products as $product) {
            $order->products()->attach($product->id, [
                'quantity' => $product->pivot->quantity,
                'price' => $product->price
            ]);
        }

        // Vider le panier
        $cart->products()->detach();

        return redirect()->route('orders.index')->with('success', 'Commande créée avec succès.');
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
