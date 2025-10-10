<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Afficher le panier du client
    public function index(Request $request)
    {
        $cart = Cart::where('customer_id', $request->user()->id)->with('products')->first();
        return view('cart.index', compact('cart'));
    }

    // Ajouter un produit au panier
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $cart = Cart::firstOrCreate(['customer_id' => $request->user()->id]);
        $cart->products()->syncWithoutDetaching([
            $request->product_id => ['quantity' => $request->quantity ?? 1]
        ]);

        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier.');
    }

    // Mettre à jour la quantité d’un produit
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::where('customer_id', $request->user()->id)->first();
        if ($cart && $cart->products()->where('product_id', $request->product_id)->exists()) {
            $cart->products()->updateExistingPivot($request->product_id, ['quantity' => $request->quantity]);
        }

        return redirect()->route('cart.index')->with('success', 'Quantité mise à jour.');
    }

    // Retirer un produit du panier
    public function remove(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);

        $cart = Cart::where('customer_id', $request->user()->id)->first();
        if ($cart) {
            $cart->products()->detach($request->product_id);
        }

        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
    }

    // Vider tout le panier
    public function clear(Request $request)
    {
        $cart = Cart::where('customer_id', $request->user()->id)->first();
        if ($cart) {
            $cart->products()->detach();
        }

        return redirect()->route('cart.index')->with('success', 'Panier vidé.');
    }
}
