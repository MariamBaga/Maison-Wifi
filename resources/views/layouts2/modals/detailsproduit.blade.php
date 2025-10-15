 <!-- ✅ MODAL PAR PRODUIT -->
 <div class="modal fade" id="QuickViewProduct-{{ $product->id }}">
                                                <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                    <div class="modal-content bg-dark-4 rounded-0 border-0">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                            <div class="row g-0">
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="image-zoom-section">
                                                                        <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="{{ $product->id }}">
                                                                            @if($product->image)
                                                                                <div class="item">

                                                                                    <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                                                                                </div>
                                                                            @endif
                                                                            {{-- tu peux ajouter d’autres images ici --}}
                                                                        </div>
                                                                        <div class="owl-thumbs d-flex justify-content-center" data-slider-id="{{ $product->id }}">
                                                                            @if($product->image)
                                                                                <button class="owl-thumb-item">
                                                                                <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                                                                                </button>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-lg-6">
                                                                    <div class="product-info-section p-3">
                                                                        <h3 class="mt-3 mt-lg-0 mb-0">{{ $product->name }}</h3>

                                                                        <div class="product-rating d-flex align-items-center mt-2">
                                                                            <div class="rates cursor-pointer font-13">
                                                                                @for($i = 0; $i < 5; $i++)
                                                                                    <i class="bx bxs-star {{ $i < 4 ? 'text-warning' : 'text-light-4' }}"></i>
                                                                                @endfor
                                                                            </div>
                                                                            <div class="ms-1"><p class="mb-0">(24 Ratings)</p></div>
                                                                        </div>

                                                                        <div class="d-flex align-items-center mt-3 gap-2">
                                                                            @if($product->price < 100)
                                                                                <h5 class="mb-0 text-decoration-line-through text-light-3">
                                                                                    {{ number_format($product->price + 50, 0, ',', ' ') }} FCFA
                                                                                </h5>
                                                                            @endif
                                                                            <h4 class="mb-0">{{ number_format($product->price, 0, ',', ' ') }} FCFA</h4>
                                                                        </div>

                                                                        <div class="mt-3">
                                                                            <h6>Description :</h6>
                                                                            <p class="mb-0">{{ $product->description }}</p>
                                                                        </div>

                                                                        <dl class="row mt-3">
                                                                            <dt class="col-sm-3">Catégorie</dt>
                                                                            <dd class="col-sm-9">{{ $product->category->name ?? 'Uncategorized' }}</dd>
                                                                            <dt class="col-sm-3">Stock</dt>
                                                                            <dd class="col-sm-9">{{ $product->stock }}</dd>
                                                                        </dl>

                                                                        <!-- ✅ Quantité et boutons -->
                                                                        <div class="row row-cols-auto align-items-center mt-3">
                                                                            <div class="col">
                                                                                <label class="form-label">Quantity</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    @for($q=1; $q<=5; $q++)
                                                                                        <option>{{ $q }}</option>
                                                                                    @endfor
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="d-flex gap-2 mt-3">
                                                                        <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="quantity" value="1">
        <button type="submit" class="btn btn-light btn-ecomm w-100">
            <i class="bx bxs-cart-add"></i> Ajouter au panier
        </button>
    </form>
                                                                           <!-- 💖 Ajouter à la wishlist -->
    <form action="{{ route('wishlist.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" class="btn btn-link btn-ecomm w-100">
            <i class="bx bx-heart"></i> Ajouter à la favoris
        </button>
    </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ✅ FIN MODAL -->
