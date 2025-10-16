<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Afficher le panier de l'utilisateur ou de l'invité
     */
    public function index(Request $request)
    {
        $cart = $this->getCart($request);

        return view('cart.index', compact('cart'));
    }

    /**
     * Ajouter un produit au panier
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $cart = $this->getCart($request, true);

        // Synchroniser le produit sans détacher les autres
        $cart->products()->syncWithoutDetaching([
            $request->product_id => ['quantity' => $request->quantity ?? 1]
        ]);

        return back()->with('success', 'Produit ajouté au panier.');
    }

    /**
     * Mettre à jour la quantité d'un produit
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = $this->getCart($request);

        if ($cart && $cart->products()->where('product_id', $request->product_id)->exists()) {
            $cart->products()->updateExistingPivot($request->product_id, [
                'quantity' => $request->quantity
            ]);
        }

        return back()->with('success', 'Quantité mise à jour.');
    }

    /**
     * Retirer un produit du panier
     */
    public function remove(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);

        $cart = $this->getCart($request);

        if ($cart) {
            $cart->products()->detach($request->product_id);
        }

        return back()->with('success', 'Produit retiré du panier.');
    }

    /**
     * Vider le panier
     */
    public function clear(Request $request)
    {
        $cart = $this->getCart($request);

        if ($cart) {
            $cart->products()->detach();
        }

        return back()->with('success', 'Panier vidé.');
    }

    /**
     * Récupère ou crée le panier de l'utilisateur / invité
     */
    private function getCart(Request $request, bool $create = false)
    {
        // Si l'utilisateur est connecté, on identifie par user_id
        if ($request->user()) {
            $query = Cart::where('user_id', $request->user()->id);
        } else {
            // Sinon, on identifie par session_id
            $sessionId = $request->session()->getId();
            $query = Cart::where('session_id', $sessionId);
        }

        $cart = $query->with('products')->first();

        // Si le panier n'existe pas encore, on le crée (si demandé)
        if (!$cart && $create) {
            $cart = Cart::create([
                'user_id' => $request->user()->id ?? null,
                'session_id' => $request->user() ? null : $request->session()->getId(),
            ]);
        }

        return $cart;
    }
}
