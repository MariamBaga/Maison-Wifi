<!--start top header wrapper-->
<div class="header-wrapper bg-dark-1">
    <div class="top-menu border-bottom">
        <div class="container">
            <nav class="navbar navbar-expand">
                <div class="shiping-title text-uppercase font-13 text-white d-none d-sm-flex">Bienvenue!! Dans Maison
                    Wifi</div>
                <ul class="navbar-nav ms-auto d-none d-lg-flex">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('orders.index') }}">Track Order</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('aboutus') }}">About</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Our Stores</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">Blog</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('contact.form') }}">Contact</a></li>

                </ul>

                <ul class="navbar-nav social-link ms-lg-2 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/share/1Cqw2fha4c/" target="_blank">
                            <i class='bx bxl-facebook'></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/connectiix?igsh=MW5mOXZrdHZrNXJqdw=="
                            target="_blank">
                            <i class='bx bxl-instagram'></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://www.linkedin.com/posts/connectiix_bonne-f%C3%AAte-de-tabaski-en-ce-jour-de-c%C3%A9l%C3%A9bration-activity-7336688602535378944-EiNR?utm_source=share&utm_medium=member_android&rcm=ACoAAA24VbIBop8-uRh2ODgVkuK6XYKDaal3ZvY"
                            target="_blank">
                            <i class='bx bxl-linkedin'></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.tiktok.com/@connectiix2?_t=ZM-8x3htpyKUEg&_r=1"
                            target="_blank">
                            <i class='bx bxl-tiktok'></i>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
    </div>
    <div class="header-content pb-3 pb-md-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-md-auto">
                    <div class="d-flex align-items-center">
                        <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i
                                class='bx bx-menu'></i>
                        </div>
                        <div class="logo d-none d-lg-flex">
                            <a href="{{ route('products.index') }}">

                                <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon"
                                    alt="Logo" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md order-4 order-md-2">
                    <div class="input-group flex-nowrap px-xl-4">
                        <input type="text" class="form-control w-100" placeholder="recherchez des produits ici..." />

                        <select class="form-select flex-shrink-0" aria-label="Default select example"
                            style="width: 10.5rem;">
                            <option value="" selected>Tous les Categories</option>
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <span class="input-group-text cursor-pointer"><i class='bx bx-search'></i></span>
                    </div>
                </div>

                <div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
                    <div class="fs-1 text-white"><i class='bx bx-headphone'></i>
                    </div>
                    <div class="ms-2">
                        <p class="mb-0 font-13">Appel nous maintenant</p>
                        <h5 class="mb-0"><a href="tel:002250748088478"> (229) 01 92 84 00 00</a></h5>
                    </div>
                </div>
                <div class="col col-md-auto order-2 order-md-4">
                    <div class="top-cart-icons">
                        <nav class="navbar navbar-expand">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a href="account-dashboard.html" class="nav-link cart-link"><i
                                            class='bx bx-user'></i></a>
                                </li>
                                <li class="nav-item"><a href="wishlist.html" class="nav-link cart-link"><i
                                            class='bx bx-heart'></i></a>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <a href="#"
                                        class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link"
                                        data-bs-toggle="dropdown">
                                        <span class="alert-count">{{ $cartCount ?? 0 }}</span>
                                        <i class='bx bx-shopping-bag'></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('cart.index') }}">
                                            <div class="cart-header">
                                                <p class="cart-header-title mb-0">{{ $cartCount ?? 0 }}
                                                    {{ Str::plural('ITEM', $cartCount ?? 0) }}</p>
                                                <p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
                                            </div>
                                        </a>

                                        <div class="cart-list">
                                            @forelse($cartItems ?? [] as $item)
                                                <a class="dropdown-item"
                                                    href="{{ route('products.show', $item->id) }}">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h6 class="cart-product-title mb-0">{{ $item->name }}
                                                            </h6>
                                                            <p class="cart-product-price mb-0">
                                                                {{ $item->pivot->quantity }} ×
                                                                {{ number_format($item->price, 0, ',', ' ') }} FCFA
                                                            </p>
                                                        </div>
                                                        <div class="position-relative">
                                                            <form method="POST" action="{{ route('cart.remove') }}">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $item->id }}">
                                                                <button type="submit"
                                                                    class="cart-product-cancel position-absolute border-0 bg-transparent text-white">
                                                                    <i class='bx bx-x'></i>
                                                                </button>
                                                            </form>
                                                            <div class="cart-product">
                                                                <img src="{{ asset($item->image) }}"
                                                                    alt="{{ $item->name }}" class="rounded"
                                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @empty
                                                <div class="text-center p-3">
                                                    <p class="text-muted mb-0">Votre panier est vide.</p>
                                                </div>
                                            @endforelse
                                        </div>

                                        @if (!empty($cartItems) && $cartCount > 0)
                                            <a href="{{ route('cart.index') }}">
                                                <div class="text-center cart-footer d-flex align-items-center">
                                                    <h5 class="mb-0">TOTAL</h5>
                                                    <h5 class="mb-0 ms-auto">
                                                        {{ number_format($cartTotal, 0, ',', ' ') }} FCFA
                                                    </h5>
                                                </div>
                                            </a>
                                            <div class="d-grid p-3 border-top">
                                                <a href="{{ route('cart.index') }}" class="btn btn-light btn-ecomm">
                                                    CHECKOUT
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <div class="primary-menu border-top">
    <div class="container">
        <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
            <div class="offcanvas-header">
                <button class="btn-close float-end"></button>
                <h5 class="py-2 text-white">Maison WIFI</h5>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}"
                       href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}"
                       href="{{ route('products.index') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('aboutus') ? 'active' : '' }}"
                       href="{{ route('aboutus') }}">A propos de nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact.form') ? 'active' : '' }}"
                       href="{{ route('contact.form') }}">Contactez-nous</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

</div>
