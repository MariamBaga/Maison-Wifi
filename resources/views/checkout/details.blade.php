@extends('layouts2.master')
@section('title', 'Détails de la commande')
@section('content')
@include('layouts2.alerts')
<!-- Page Header -->
@include('layouts2.breadcrumb', ['title' => 'Détails de la commande'])

<section class="checkout-page">
    <div class="container">
        <div class="row">

            <!-- Colonne gauche : informations client / adresse -->
            <div class="col-xl-6 col-lg-6">
                <div class="checkout-page__billing-address">
                    <h2 class="checkout-page__billing-address__title">Informations de livraison</h2>
                    <form class="checkout-page__form" method="POST" action="{{ route('orders.store') }}">
                        @csrf
                        <div class="row bs-gutter-x-30">

                            @guest
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <label for="guest_name">Nom *</label>
                                        <input type="text" id="guest_name" name="guest_name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <label for="guest_email">E-mail *</label>
                                        <input type="email" id="guest_email" name="guest_email" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <label for="guest_phone">Téléphone *</label>
                                        <input type="text" id="guest_phone" name="guest_phone" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <label for="guest_address">Adresse *</label>
                                        <input type="text" id="guest_address" name="guest_address" required class="form-control">
                                    </div>
                                </div>
                            @else
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <label>Nom</label>
                                        <input type="text" value="{{ auth()->user()->name }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <label>E-mail</label>
                                        <input type="email" value="{{ auth()->user()->email }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <label for="phone">Téléphone *</label>
                                        <input type="text" id="phone" name="phone" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <label for="address">Adresse *</label>
                                        <input type="text" id="address" name="address" required class="form-control">
                                    </div>
                                </div>
                            @endguest

                            <div class="col-xl-12">
                                <div class="checkout-page__input-box">
                                    <label for="payment_method">Méthode de paiement</label>
                                    <select class="form-select" name="payment_method" required>
                                        <option value="">-- Sélectionnez --</option>
                                        <option value="cash_on_delivery">Paiement à la livraison</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="checkout-page__input-box mt-3">
                            <button type="submit" class="ienet-btn w-100"><span>Passer la commande</span></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Colonne droite : résumé commande -->
            <div class="col-xl-6 col-lg-6">
                <div class="checkout-page__your-order">
                    <h2 class="checkout-page__your-order__title">Résumé de votre commande</h2>
                    <table class="checkout-page__order-table">
                        <thead class="order_table_head">
                            <tr>
                                <th>Produit</th>
                                <th class="right">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $subtotal = 0; @endphp
                            @foreach($cart->products as $product)
                                @php
                                    $lineTotal = $product->price * $product->pivot->quantity;
                                    $subtotal += $lineTotal;
                                @endphp
                                <tr>
                                    <td class="pro__title">{{ $product->name }} x {{ $product->pivot->quantity }}</td>
                                    <td class="pro__price">{{ number_format($lineTotal, 2, ',', ' ') }} F</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="pro__title">Sous-total</td>
                                <td class="pro__price">{{ number_format($subtotal, 2, ',', ' ') }} F</td>
                            </tr>
                            <tr>
                                <td class="pro__title">Livraison</td>
                                <td class="pro__price">--</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="pro__title">Total</td>
                                <td class="pro__price">{{ number_format($subtotal, 2, ',', ' ') }} F</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-page__payment mt-4">
                        <div class="checkout-page__payment__item checkout-page__payment__item--active">
                            <h3 class="checkout-page__payment__title">Paiement à la livraison</h3>
                            <div class="checkout-page__payment__content" style="display:none;">
                                Vous payez directement lors de la livraison.
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
