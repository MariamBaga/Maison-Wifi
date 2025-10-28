
   <!-- Modal Version 2 Dynamique -->
<div class="modal modal-common-wrap fade" id="QuickViewProduct-{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="shop-details-wrapper">
                    <div class="row">
                        <!-- Image -->
                        <div class="col-lg-6">
                            <div class="shop-details-image">
                                <div class="tab-content">
                                <div class="shop-thumb">
    @if($product->image)
        <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->name }}">
    @else
        <img src="{{ asset('assets/img/shop/popup.jpg') }}" alt="img">
    @endif
</div>

                                </div>
                            </div>
                        </div>

                        <!-- Détails produit -->
                        <div class="col-lg-6">
                            <div class="product-details-content">
                                <h3 class="pb-3">{{ $product->name }}</h3>

                                <div class="star pb-3">
                                    @for($i = 0; $i < 5; $i++)
                                        <a href="#"><i class="fas fa-star {{ $i < $product->rating ? 'text-warning' : '' }}"></i></a>
                                    @endfor
                                    <span>({{ $product->reviews_count ?? 0 }} Customer Review)</span>
                                </div>

                                <p class="mb-3">{{ $product->description }}</p>

                                <div class="price-list">
                                    <h3>{{ number_format($product->price, 0, ',', ' ') }} FCFA</h3>
                                </div>

                                <div class="cart-wrp">
                                    <div class="cart-quantity">
                                        <form method="POST" action="{{ route('cart.add') }}" class="quantity">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="button" value="-" class="qtyminus minus">
                                            <input type="text" name="quantity" value="1" class="qty">
                                            <input type="button" value="+" class="qtyplus plus">
                                        </form>
                                    </div>

                                    <a href="#" class="icon">
                                        <form action="{{ route('wishlist.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-link text-decoration-none p-0">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </form>
                                    </a>

                                    <div class="social-profile">
                                        <span class="plus-btn"><i class="far fa-share"></i></span>
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="shop-btn">
    <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="quantity" value="1">
        <button type="submit" class="theme-btn">
            <span>Ajouter au panier</span>
        </button>
    </form>

    <a href="{{ route('checkout.index') }}" class="theme-btn">
        <span>Commander maintenant</span>
    </a>
</div>


                                <h6 class="details-info"><span>SKU:</span> <a href="#">{{ $product->sku ?? 'N/A' }}</a></h6>
                                <h6 class="details-info"><span>Categories:</span> <a href="#">{{ $product->category->name ?? 'Uncategorized' }}</a></h6>
                                <h6 class="details-info style-2"><span>Tags:</span>
                                    @if($product->tags)
                                        @foreach($product->tags as $tag)
                                            <b>{{ $tag->name }}</b>
                                        @endforeach
                                    @endif
                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
