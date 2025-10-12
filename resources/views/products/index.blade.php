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
                    <div class="col-12 col-xl-12">
                        <div class="product-wrapper">
                            <div class="toolbox d-lg-flex align-items-center mb-3 gap-2 p-3 bg-dark-1">
                                <!-- Filtres et toolbox restent inchangés -->
                            </div>
                            <div class="product-grid">
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                                    @foreach($products as $product)
                                    <div class="col">
                                        <div class="card rounded-0 product-card">
                                            <div class="card-header bg-transparent border-bottom-0">
                                                <div class="d-flex align-items-center justify-content-end gap-3">
                                                    <a href="javascript:;">
                                                        <div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span></div>
                                                    </a>
                                                    <a href="javascript:;">
                                                        <div class="product-wishlist"> <i class="bx bx-heart"></i></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                            <div class="card-body">
                                                <div class="product-info">
                                                    <a href="javascript:;">
                                                        <p class="product-catergory font-13 mb-1">{{ $product->category->name ?? 'Uncategorized' }}</p>
                                                    </a>
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        <h6 class="product-name mb-2">{{ $product->name }}</h6>
                                                    </a>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mb-1 product-price">
                                                            @if($product->price < 100)
                                                                <span class="me-1 text-decoration-line-through">${{ $product->price + 50 }}</span>
                                                            @endif
                                                            <span class="text-white fs-5">${{ $product->price }}</span>
                                                        </div>
                                                        <div class="cursor-pointer ms-auto">
                                                            @for($i=0; $i<5; $i++)
                                                                <i class="bx bxs-star {{ $i < 4 ? 'text-white' : 'text-light-4' }}"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="product-action mt-2">
                                                        <div class="d-grid gap-2">
                                                            <a href="javascript:;" class="btn btn-light btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a>
                                                            <a href="javascript:;" class="btn btn-link btn-ecomm"><i class="bx bx-zoom-in"></i>Quick View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--end row-->
                            </div>
                            <hr>
                            <!-- Pagination reste inchangée -->
<nav class="d-flex justify-content-between" aria-label="Page navigation">
										<ul class="pagination">
											<li class="page-item"><a class="page-link" href="javascript:;"><i class='bx bx-chevron-left'></i> Prev</a>
											</li>
										</ul>
										<ul class="pagination">
											<li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">2</a>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">3</a>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">4</a>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">5</a>
											</li>
										</ul>
										<ul class="pagination">
											<li class="page-item"><a class="page-link" href="javascript:;" aria-label="Next">Next <i class='bx bx-chevron-right'></i></a>
											</li>
										</ul>
									</nav>

                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end shop area-->
    </div>
</div>

@endsection
