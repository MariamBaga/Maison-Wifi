<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        View::composer('*', function ($view) {
            $view->with('categories', Category::orderBy('name')->get());
        });




        View::composer('*', function ($view) {
            $cart = null;
            $cartCount = 0;
            $cartItems = [];
            $cartTotal = 0;

            if (auth()->check()) {
                $cart = Cart::where('user_id', auth()->id())->with('products')->first();
            } else {
                $cart = Cart::where('session_id', session()->getId())->with('products')->first();
            }

            if ($cart) {
                $cartItems = $cart->products;
                $cartCount = $cartItems->sum('pivot.quantity');
                $cartTotal = $cartItems->sum(fn($p) => $p->price * $p->pivot->quantity);
            }

            $view->with(compact('cart', 'cartCount', 'cartItems', 'cartTotal'));
        });
    }


}
