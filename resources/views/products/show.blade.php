


@extends('layouts2.master') {{-- adapte si ton layout s'appelle autrement --}}
@section('title', $product->name)

@section('content')
<!-- Breadcrumb -->
@include('layouts2.breadcrumb', ['title' => $product->name])

<section class="product-details py-5">
    <div class="container">
        <div class="row">
            <!-- Image du produit -->
            <div class="col-lg-6 col-xl-6 wow fadeInLeft" data-wow-delay="200ms">
                <div class="product-details__img text-center">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded shadow">
                </div>
            </div>

            <!-- Détails du produit -->
            <div class="col-lg-6 col-xl-6 d-flex align-items-center wow fadeInRight" data-wow-delay="300ms">
                <div class="product-details__content">
                    <div class="product-details__top mb-3">
                        <h3 class="product-details__title">{{ $product->name }}</h3>
                        <div class="product-details__price text-primary fw-bold">
                            {{ number_format($product->price, 0, ',', ' ') }} FCFA
                        </div>
                    </div>

                    <div class="product-details__review mb-2">
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <a href="#reviews" class="ms-2 text-muted">(3 avis clients)</a>
                    </div>

                    <div class="product-details__divider my-3 border-top"></div>

                    <div class="product-details__excerpt mb-4">
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="product-details__quantity mb-3">
                        <h5>Quantité</h5>
                        <div class="quantity-box d-flex align-items-center">
                            <button type="button" class="btn btn-outline-secondary btn-sm sub"><i class="fa fa-minus"></i></button>
                            <input type="text" class="form-control mx-2 text-center" id="quantity" value="1" style="width: 60px;">
                            <button type="button" class="btn btn-outline-secondary btn-sm add"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="product-details__buttons mb-4">
                        <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" id="cart-quantity" value="1">
                            <button type="submit" class="ienet-btn product-details__buttons__cart">
                                <span>Ajouter au panier <span class="ienet-btn__icon"><i class="icon-cart"></i></span></span>
                            </button>
                        </form>

                        <form action="{{ route('wishlist.add') }}" method="POST" class="d-inline ms-2">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="ienet-btn product-details__buttons__wishlist">
                                <span>Ajouter à la liste de souhaits</span>
                            </button>
                        </form>
                    </div>

                    <div class="product-details__socials">
                        <h5>Partager avec vos amis</h5>
                        <div class="d-flex gap-3 mt-2">
                            <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description complète -->
        <div class="product-details__description mt-5 wow fadeInUp" data-wow-delay="300ms">
            <h3 class="fw-bold mb-3">Description du produit</h3>
            <p>
                {{ $product->description ?? 'Aucune description disponible pour ce produit.' }}
            </p>
        </div>
    </div>
</section>

@endsection
