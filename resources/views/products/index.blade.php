@extends('layouts2.master')
@section('title', 'Produits')
@section('content')

<!-- Page Header -->
@include('layouts2.breadcrumb', ['title' => 'Produits'])
<section class="product-one">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="product__info-top d-flex justify-content-between align-items-center mb-4">
                    <div class="product__showing-text-box">
                        <p class="product__showing-text">
                            Showing 1–{{ $products->count() }} of {{ $products->total() }} Results
                        </p>
                    </div>
                    <div class="product__showing-sort">
                        <select class="selectpicker" aria-label="Default Sorting">
                            <option selected>Default Sorting</option>
                            <option value="1">Sort by view</option>
                            <option value="2">Sort by price</option>
                            <option value="3">Sort by ratings</option>
                            <option value="4">Sort by popular</option>
                        </select>
                    </div>
                </div>

                <div class="row gutter-y-30">
                    @foreach($products as $index => $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="product__item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="{{ $index * 100 }}ms">
                                <div class="product__item__img">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    <div class="product__item__btn">
                                        <form action="{{ route('wishlist.add') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit"><i class="far fa-heart"></i></button>
                                        </form>
                                        <a href="{{ route('products.show', $product->id) }}"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="product__item__content">
                                    <div class="product__item__ratings">
                                        @for($i = 0; $i < 5; $i++)
                                            <span class="fa fa-star {{ $i < 4 ? '' : 'fa-regular' }}"></span>
                                        @endfor
                                    </div>
                                    <h4 class="product__item__title">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="product__item__price">
                                    {{ number_format($product->price, 0, ',', ' ') }} FCFA

                                    </div>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="ienet-btn product__item__link">
                                            <span>Add To Cart<span class="ienet-btn__icon"><i class="icon-cart"></i></span></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        <ul class="post-pagination text-center product__pagination">
                            {{ $products->links('pagination::bootstrap-5') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
