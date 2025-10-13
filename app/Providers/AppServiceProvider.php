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
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->with('products')->first();
            $cartItems = $cart ? $cart->products : collect();
            $cartTotal = $cartItems->sum(fn($p) => $p->pivot->quantity * $p->price);
            $cartCount = $cartItems->sum(fn($p) => $p->pivot->quantity);
        } else {
            $cartItems = collect();
            $cartTotal = 0;
            $cartCount = 0;
        }

        $view->with(compact('cartItems', 'cartTotal', 'cartCount'));
    });
    }
}
