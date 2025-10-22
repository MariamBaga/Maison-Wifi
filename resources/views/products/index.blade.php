@extends('layouts2.master')
@section('title', 'Article')
@section('content')

<!-- product-details-Section Start -->
<section class="product-details-section section-padding fix">
    <div class="container">
        <div class="product-details-wrapper">
            <div class="top-content">
                <h2>Only Categories</h2>
                <ul class="list">
                    <li>Home</li>
                    <li>Only Categories</li>
                </ul>
            </div>

            <div class="product-details-sideber">
                <div class="product-details-wrap">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="#Course" data-bs-toggle="tab" class="nav-link active">
                                <i class="fa-regular fa-grid-2"></i>
                            </a>
                        </li>

                    </ul>
                    <p>Showing 1–{{ $products->count() }} of {{ $products->total() }} results</p>
                </div>
                <div class="shop-right">
                    <div class="form-clt">
                        <div class="nice-select" tabindex="0">
                            <span class="current">Default sorting</span>
                            <ul class="list">
                                <li data-value="1" class="option selected focus">Default sorting</li>
                               
                            </ul>
                        </div>
                    </div>
                    <div id="openButton2">
                        <div class="filter-button">
                            <h6><a href="#"><span><img src="assets/img/filter.png" alt="img"></span>Filter</a></h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <!-- Grid View -->
                <div id="Course" class="tab-pane fade show active">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="product-details-item">
                                <div class="shop-image">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    <ul class="shop-icon d-grid justify-content-center align-items-center">
                                        <li>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-link p-0"><i class="fa-regular fa-cart-shopping"></i></button>
                                            </form>
                                        </li>
                                        <li>
                                            <button data-bs-toggle="modal" data-bs-target="#QuickViewProduct-{{ $product->id }}">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <form action="{{ route('wishlist.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-link p-0"><i class="far fa-heart"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <p>{{ $product->category->name ?? 'Uncategorized' }}</p>
                                    <h4><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h4>
                                    <div class="star">
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="fa-solid fa-star {{ $i < 4 ? '' : 'fa-regular' }}"></i>
                                        @endfor
                                    </div>
                                    <h6>{{ number_format($product->price, 2, '.', ',') }} <del>{{ number_format($product->price + 50, 2, '.', ',') }}</del></h6>
                                </div>
                            </div>

                            @include('layouts2.modals.detailsproduit', ['product' => $product])
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- List View -->
                <div id="Curriculum" class="tab-pane fade">
                    <div class="row justify-content-center">
                        <div class="row g-4">
                            @foreach($products as $product)
                            <div class="col-xl-12">
                                <div class="product-details-item style-2">
                                    <div class="shop-image">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                        <ul class="shop-icon d-grid justify-content-center align-items-center">
                                            <li>
                                                <form action="{{ route('cart.add') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button type="submit" class="btn btn-link p-0"><i class="fa-regular fa-cart-shopping"></i></button>
                                                </form>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#QuickViewProduct-{{ $product->id }}">
                                                    <i class="fa-regular fa-eye"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <form action="{{ route('wishlist.add') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button type="submit" class="btn btn-link p-0"><i class="far fa-heart"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <p>{{ $product->category->name ?? 'Uncategorized' }}</p>
                                        <h3><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h3>
                                        <div class="star">
                                            @for($i = 0; $i < 5; $i++)
                                                <i class="fa-solid fa-star {{ $i < 4 ? '' : 'fa-regular' }}"></i>
                                            @endfor
                                        </div>
                                        <h6>{{ number_format($product->price, 2, '.', ',') }} <del>{{ number_format($product->price + 50, 2, '.', ',') }}</del></h6>
                                        <p>{{ Str::limit($product->description ?? '', 100) }}</p>
                                        <a href="{{ route('cart.add') }}" class="theme-btn">Add To Cart</a>
                                    </div>
                                </div>

                                @include('layouts2.modals.detailsproduit', ['product' => $product])
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-nav-wrap">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>

@endsection
