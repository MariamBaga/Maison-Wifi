<?php
namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function show(Request $request) {
        $wishlist = Wishlist::where('customer_id', $request->user()->id)->with('products')->first();
        return response()->json($wishlist);
    }

    public function add(Request $request) {
        $wishlist = Wishlist::firstOrCreate(['customer_id' => $request->user()->id]);
        $wishlist->products()->syncWithoutDetaching([$request->product_id]);
        return response()->json(['message' => 'Produit ajouté à la wishlist']);
    }

    public function remove(Request $request) {
        $wishlist = Wishlist::where('customer_id', $request->user()->id)->first();
        $wishlist->products()->detach($request->product_id);
        return response()->json(['message' => 'Produit retiré de la wishlist']);
    }
}
