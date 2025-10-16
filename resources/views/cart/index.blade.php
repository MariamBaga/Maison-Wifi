@extends('layouts2.master')
@section('title', 'Mon Panier')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        @include('layouts2.breadcrumb', ['title' => 'Mon Panier'])

        <section class="py-4">
            <div class="container">
                <div class="shop-cart">
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <div class="shop-cart-list mb-3 p-3">

                                @if($cart && $cart->products->count() > 0)
                                    @foreach($cart->products as $product)
                                        <div class="row align-items-center g-3 mb-3 border-bottom pb-3">
                                            <div class="col-12 col-lg-6">
                                                <div class="d-lg-flex align-items-center gap-2">
                                                    <div class="cart-img text-center text-lg-start">
                                                        <img src="{{ asset($product->image) }}" width="130" alt="">
                                                    </div>
                                                    <div class="cart-detail text-center text-lg-start">
                                                        <h6 class="mb-2">{{ $product->name }}</h6>
                                                        <h5 class="mb-0 text-primary">
                                                            {{ number_format($product->price, 0, ',', ' ') }} FCFA
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-3">
                                                <form action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="number"
                                                        name="quantity"
                                                        class="form-control text-center"
                                                        value="{{ $product->pivot->quantity }}"
                                                        min="1"
                                                        onchange="this.form.submit()">
                                                </form>
                                            </div>

                                            <div class="col-12 col-lg-3 text-center">
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button class="btn btn-light btn-ecomm">
                                                        <i class='bx bx-x-circle'></i> Retirer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="d-lg-flex align-items-center gap-2 mt-4">
                                        <a href="{{ route('products.index') }}" class="btn btn-light btn-ecomm">
                                            <i class='bx bx-shopping-bag'></i> Continuer vos achats
                                        </a>

                                        <form action="{{ route('cart.clear') }}" method="POST" class="ms-auto">
                                            @csrf
                                            <button class="btn btn-light btn-ecomm">
                                                <i class='bx bx-x-circle'></i> Vider le panier
                                            </button>
                                        </form>
                                    </div>

                                @else
                                    <p class="text-center py-4">Votre panier est vide.</p>
                                    <div class="text-center">
                                        <a href="{{ route('products.index') }}" class="btn btn-primary">
                                            Voir les produits
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Résumé panier -->
                        <div class="col-12 col-xl-4">
                            @php
                                $total = 0;
                                if ($cart) {
                                    foreach ($cart->products as $product) {
                                        $total += $product->price * $product->pivot->quantity;
                                    }
                                }
                            @endphp
                            <div class="checkout-form p-3 bg-dark-1 text-white rounded">
                                <h5 class="mb-3">Récapitulatif</h5>
                                <p class="mb-2">Sous-total:
                                    <span class="float-end">
                                        {{ number_format($total, 0, ',', ' ') }} FCFA
                                    </span>
                                </p>
                                <div class="my-3 border-top"></div>
                                <h5>Total:
                                    <span class="float-end">
                                        {{ number_format($total, 0, ',', ' ') }} FCFA
                                    </span>
                                </h5>

                                <div class="my-4"></div>
                                <div class="d-grid">
                                <a href="{{ route('orders.index') }}" class="btn btn-white btn-ecomm">
        Passer la commande
    </a>
                                </div>
                            </div>
                        </div>

                    </div><!-- end row -->
                </div>
            </div>
        </section>

    </div>
</div>

@endsection
