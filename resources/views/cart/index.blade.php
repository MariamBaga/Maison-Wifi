@extends('layouts2.master')
@section('title', 'Mon Panier')
@section('content')




        <section class="cart-section section-padding">
            <div class="container">
                <div class="cart-list-area">
                    <div class="top-content">
                        <h2>Mon Panier</h2>
                        <ul class="list">
                            <li><a href="{{ route('home.index') }}">Accueil</a></li>
                            <li>Panier</li>
                        </ul>
                    </div>

                    @if($cart && $cart->products->count() > 0)
                    <div class="table-responsive">
                        <table class="table common-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Produit</th>
                                    <th class="text-center">Prix</th>
                                    <th class="text-center">Quantité</th>
                                    <th class="text-center">Sous-total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($cart->products as $product)
                                @php $subtotal = $product->price * $product->pivot->quantity; @endphp
                                @php $total += $subtotal; @endphp
                                <tr class="align-items-center py-3">
                                    <td>
                                        <div class="cart-item-thumb d-flex align-items-center gap-4">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="text-danger border-0 bg-transparent">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                            <img class="w-100" src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="70">
                                            <span class="head text-nowrap">{{ $product->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ number_format($product->price, 0, ',', ' ') }} FCFA</td>
                                    <td class="text-center">
                                        <form action="{{ route('cart.update') }}" method="POST" class="d-flex justify-content-center align-items-center gap-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" name="action" value="decrement" class="btn btn-light btn-sm">-</button>
                                            <input type="text" name="quantity" value="{{ $product->pivot->quantity }}" class="form-control text-center" style="width:50px;">
                                            <button type="submit" name="action" value="increment" class="btn btn-light btn-sm">+</button>
                                        </form>
                                    </td>
                                    <td class="text-center">{{ number_format($subtotal, 0, ',', ' ') }} FCFA</td>
                                    <td class="text-center">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="coupon-items d-flex flex-md-nowrap flex-wrap justify-content-between align-items-center gap-4 pt-4">
                        <form action="#" method="POST" class="d-flex flex-sm-nowrap flex-wrap align-items-center gap-3">
                            @csrf
                            <input type="text" name="coupon_code" placeholder="Entrez le code promo" class="form-control">
                            <button type="submit" class="theme-btn alt-color radius-xs">Appliquer</button>
                        </form>
                        <a href="{{ route('cart.index') }}" class="theme-btn alt-color radius-xs">Mettre à jour le panier</a>
                    </div>

                    <div class="checkout-summary mt-4 p-3 bg-dark-1 text-white rounded">
                        <h5>Récapitulatif</h5>
                        <p class="mb-2">Sous-total: <span class="float-end">{{ number_format($total, 0, ',', ' ') }} FCFA</span></p>
                        <div class="my-3 border-top"></div>
                        <h5>Total: <span class="float-end">{{ number_format($total, 0, ',', ' ') }} FCFA</span></h5>
                        <div class="my-4"></div>
                        <a href="{{ route('orders.index') }}" class="btn btn-white btn-ecomm w-100">Passer la commande</a>
                    </div>

                    @else
                        <p class="text-center py-4">Votre panier est vide.</p>
                        <div class="text-center">
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Voir les produits</a>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </div>
</div>

@endsection
