


<!-- Page Header -->


@extends('layouts2.master')
@section('title', 'Mon Panier')
@section('content')

@include('layouts2.breadcrumb', ['title' => 'Mon Panier'])
<!-- Cart Start -->
<section class="cart-page section-padding">
    <div class="container">


        @if($cart && $cart->products->count() > 0)
        <div class="table-responsive">
            <table class="table cart-page__table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Sous-total</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart->products as $product)
                        @php
                            $subtotal = $product->price * $product->pivot->quantity;
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>
                                <div class="cart-page__table__meta d-flex align-items-center gap-3">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="70">
                                    <h3 class="cart-page__table__meta-title">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                </div>
                            </td>
                            <td>{{ number_format($product->price, 0, ',', ' ') }} FCFA</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center gap-1">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" name="action" value="decrement" class="btn btn-light btn-sm"><i class="fa fa-minus"></i></button>
                                    <input type="text" name="quantity" value="{{ $product->pivot->quantity }}" class="form-control text-center" style="width:50px;">
                                    <button type="submit" name="action" value="increment" class="btn btn-light btn-sm"><i class="fa fa-plus"></i></button>
                                </form>
                            </td>
                            <td>{{ number_format($subtotal, 0, ',', ' ') }} FCFA</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="btn btn-danger btn-sm">x</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="cart-page__coupone d-flex flex-wrap justify-content-between align-items-center gap-3 mt-3">
            <form action="#" method="POST" class="d-flex gap-2">
                @csrf
                <input type="text" name="coupon_code" placeholder="Entrez le code promo" class="form-control">
                <button type="submit" class="ienet-btn"><span>Appliquer</span></button>
            </form>
            <a href="{{ route('cart.index') }}" class="ienet-btn update"><span>Mettre à jour le panier</span></a>
        </div>

        <div class="cart-page__cart-total mt-4 p-3 bg-dark-1 text-white rounded">
            <h3 class="cart-page__cart-total__title">Récapitulatif</h3>
            <ul class="cart-page__cart-total__list list-unstyled">
                <li><span>Sous-total</span><span class="cart-page__cart-total__list__amount">{{ number_format($total, 0, ',', ' ') }} FCFA</span></li>
                <li class="shipping">
                    <h4 class="cart-page__cart-total__text">Adresse de livraison</h4>
                    <address class="cart-page__cart-total__address">2801 Lafayette Blvd, Norfolk, Vermont 23509, United States</address>
                </li>
                <li><span>Total</span><span class="cart-page__cart-total__list__amount">{{ number_format($total, 0, ',', ' ') }} FCFA</span></li>
            </ul>
            <div class="cart-page__cart-total__buttons mt-3">
                <a href="{{ route('orders.index') }}" class="ienet-btn"><span>Passer la commande</span></a>
            </div>
        </div>

        @else
            <p class="text-center py-4">Votre panier est vide.</p>
            <div class="text-center">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Voir les produits</a>
            </div>
        @endif

    </div>
</section>
<!-- Cart End -->

@endsection



