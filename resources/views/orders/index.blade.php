@extends('layouts2.master')
@section('title', 'Détails de la commande')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        @include('layouts2.breadcrumb', ['title' => 'Finaliser la commande'])

        <section class="py-4">
            <div class="container">
                <div class="shop-cart">
                    <div class="row">
                        <!-- Colonne gauche : Détails client et adresse -->
                        <div class="col-12 col-xl-8">
                            <div class="checkout-details">
                                <div class="card bg-transparent rounded-0 shadow-none">
                                    <div class="card-body">
                                        <div class="steps steps-light">
                                            <a class="step-item active" href="{{ route('cart.index') }}">
                                                <div class="step-progress"><span class="step-count">1</span></div>
                                                <div class="step-label"><i class='bx bx-cart'></i>Panier</div>
                                            </a>
                                            <a class="step-item active current" href="#">
                                                <div class="step-progress"><span class="step-count">2</span></div>
                                                <div class="step-label"><i class='bx bx-user-circle'></i>Détails</div>
                                            </a>
                                            <a class="step-item"><div class="step-progress"><span class="step-count">3</span></div>
                                                <div class="step-label"><i class='bx bx-credit-card'></i>Paiement</div>
                                            </a>
                                            <a class="step-item"><div class="step-progress"><span class="step-count">4</span></div>
                                                <div class="step-label"><i class='bx bx-check-circle'></i>Confirmation</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Formulaire de commande -->
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="border p-3">
                                            <h2 class="h5 mb-0">Informations de livraison</h2>
                                            <div class="my-3 border-bottom"></div>

                                            <form class="row g-3" method="POST" action="{{ route('orders.store') }}">
    @csrf

    @guest
    <!-- Pour les invités : saisir nom, email, téléphone et adresse -->
    <div class="col-md-6">
        <label class="form-label">Nom</label>
        <input type="text" name="guest_name" class="form-control rounded-0" placeholder="Votre nom" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">E-mail</label>
        <input type="email" name="guest_email" class="form-control rounded-0" placeholder="Votre email" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Téléphone</label>
        <input type="text" name="guest_phone" class="form-control rounded-0" placeholder="Ex: 70 00 00 00" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Adresse de livraison</label>
        <input type="text" name="guest_address" class="form-control rounded-0" placeholder="Ex: Bamako, Kalaban" required>
    </div>
@else
    <!-- Pour les utilisateurs connectés : afficher leurs infos -->
    <div class="col-md-6">
        <label class="form-label">Nom</label>
        <input type="text" value="{{ auth()->user()->name }}" class="form-control rounded-0" disabled>
    </div>

    <div class="col-md-6">
        <label class="form-label">E-mail</label>
        <input type="email" value="{{ auth()->user()->email }}" class="form-control rounded-0" disabled>
    </div>

    <div class="col-md-6">
        <label class="form-label">Téléphone</label>
        <input type="text" name="phone" class="form-control rounded-0" placeholder="Votre téléphone" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Adresse de livraison</label>
        <input type="text" name="address" class="form-control rounded-0" placeholder="Votre adresse" required>
    </div>
@endguest


    <div class="col-md-12">
        <label class="form-label">Méthode de paiement</label>
        <select class="form-select rounded-0" name="payment_method" required>
            <option value="">-- Sélectionnez --</option>
            <!-- <option value="carte">Carte Bancaire</option>
            <option value="mobile_money">Mobile Money</option> -->
            <option value="cash_on_delivery">Paiement à la livraison</option>
        </select>
    </div>

    <div class="col-md-6">
        <div class="d-grid">
            <a href="{{ route('cart.index') }}" class="btn btn-light btn-ecomm">
                <i class='bx bx-chevron-left'></i> Retour au panier
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="d-grid">
            <button type="submit" class="btn btn-white btn-ecomm">
                Passer la commande <i class='bx bx-chevron-right'></i>
            </button>
        </div>
    </div>
</form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne droite : Résumé de la commande -->
                        <div class="col-12 col-xl-4">
                            <div class="order-summary">
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <p class="fs-5 text-white">Résumé de la commande</p>
                                        <div class="my-3 border-top"></div>

                                        @php
                                            $subtotal = 0;
                                        @endphp

                                        @foreach ($cart->products as $product)
                                            @php
                                                $lineTotal = $product->price * $product->pivot->quantity;
                                                $subtotal += $lineTotal;
                                            @endphp
                                            <div class="d-flex align-items-center mb-2">
                                                <a class="d-block flex-shrink-0" href="#">
                                                    <img src="{{ asset($product->image ?? 'assets/images/products/default.png') }}" width="75" alt="Produit">
                                                </a>
                                                <div class="ps-2">
                                                    <h6 class="mb-1"><a href="#">{{ $product->name }}</a></h6>
                                                    <div class="widget-product-meta">
                                                        <span class="me-2">{{ number_format($product->price, 2, ',', ' ') }} F</span>
                                                        <span>x {{ $product->pivot->quantity }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-2 border-top"></div>
                                        @endforeach

                                        <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                            <div class="card-body">
                                                <p class="mb-2">Sous-total: <span class="float-end">{{ number_format($subtotal, 2, ',', ' ') }} F</span></p>
                                                <p class="mb-2">Livraison: <span class="float-end">--</span></p>
                                                <p class="mb-2">Taxes: <span class="float-end">--</span></p>
                                                <div class="my-3 border-top"></div>
                                                <h5 class="mb-0">Total:
                                                    <span class="float-end">{{ number_format($subtotal, 2, ',', ' ') }} F</span>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
