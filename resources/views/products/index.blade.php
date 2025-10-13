@extends('layouts2.master')
@section('title', 'Article')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            @include('layouts2.breadcrumb', ['title' => 'Article'])

            <!--start shop area-->
            <section class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-wrapper">

                                <!-- Toolbox -->
                                <div class="toolbox d-lg-flex align-items-center mb-3 gap-2 p-3 bg-dark-1">
                                    <!-- Ajoute ici tes filtres ou options -->
                                </div>

                                <!-- Product Grid -->
                                <div class="product-grid">
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3">
                                    @foreach($products as $product)
    <div class="col">
        <div class="card rounded-0 product-card h-100">
            <!-- Card Header & Image -->
            <div class="card-header bg-transparent border-bottom-0 d-flex justify-content-end gap-2">
                <a href="javascript:;" class="product-compare"><i class="bx bx-git-compare"></i></a>
                <!-- 💖 Ajouter à la wishlist -->
    <form action="{{ route('wishlist.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" class="btn btn-link btn-ecomm w-100">
            <i class="bx bx-heart"></i>
        </button>
    </form>
            </div>

            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">

            <div class="card-body d-flex flex-column">
                <p class="product-category font-13 mb-1">{{ $product->category->name ?? 'Uncategorized' }}</p>
                <a href="{{ route('products.show', $product->id) }}">
                    <h6 class="product-name mb-2">{{ $product->name }}</h6>
                </a>

                <div class="d-flex align-items-center mb-2">
                    <div class="product-price">
                        @if($product->price < 100)
                            <span class="me-1 text-decoration-line-through">
                                {{ number_format($product->price + 50, 0, ',', ' ') }} FCFA
                            </span>
                        @endif
                        <span class="fs-5 text-white">
                            {{ number_format($product->price, 0, ',', ' ') }} FCFA
                        </span>
                    </div>
                    <div class="ms-auto">
                        @for($i = 0; $i < 5; $i++)
                            <i class="bx bxs-star {{ $i < 4 ? 'text-white' : 'text-light-4' }}"></i>
                        @endfor
                    </div>
                </div>

                <div class="mt-auto">
                    <div class="d-grid gap-2">
                         <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="quantity" value="1">
        <button type="submit" class="btn btn-light btn-ecomm w-100">
            <i class="bx bxs-cart-add"></i> Add to Cart
        </button>
    </form>
                        <!-- Quick View button -->
                        <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct-{{ $product->id }}">
                            <i class="bx bx-zoom-in"></i> Quick View
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick View Modal -->
          @include('layouts2.modals.detailsproduit')
        <!-- End Quick View Modal -->
    </div>
@endforeach

                                    </div>
                                </div>

                                <!-- Pagination -->
                                <div class="mt-4 d-flex justify-content-center">
                                    {{ $products->links('pagination::bootstrap-5') }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--end shop area-->


        </div>
    </div>

@endsection
