<!-- Header Section Start -->
<header id="header-sticky" class="header-1">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ route('home.index') }}" class="header-logo">
                    <img src="{{ asset('assets/img/logo/logo_maison_wifi.png') }}" 
         alt="Logo Maison Wifi" 
         style="height: 100px; width: auto; object-fit: contain;">

                    </a>
                </div>

                <!-- Menu principal -->
                <div class="mean__menu-wrapper">
                    <div class="main-menu">
                        <nav id="mobile-menu" style="display: block;">
                            <ul>
                                <li class="{{ request()->routeIs('home.index') ? 'active' : '' }}">
                                    <a href="{{ route('home.index') }}">Accueil</a>
                                </li>

                                <li class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
                                    <a href="{{ route('products.index') }}">
                                        Boutique <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('products.index') }}">Tous les produits</a></li>
                                        @foreach (\App\Models\Category::all() as $category)
                                            <li>
                                                <a href="{{ route('categories.show', $category->id) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="{{ request()->routeIs('aboutus') ? 'active' : '' }}">
                                    <a href="{{ route('aboutus') }}">À propos</a>
                                </li>

                                <li class="{{ request()->routeIs('contact.form') ? 'active' : '' }}">
                                    <a href="{{ route('contact.form') }}">Contact</a>
                                </li>

                                <li>
                                    <a href="{{ route('orders.index') }}">Suivre ma commande</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Header right -->
                <div class="header-right d-flex justify-content-end align-items-center">
                    <!-- Recherche -->
                   

                    <!-- Icônes -->
                    <ul class="header-icon">
                        <li>
                            <a href="#">
                                <i class="fa-regular fa-heart"></i>
                                <span class="number">0</span>
                            </a>
                        </li>
                    </ul>

                  <!-- Panier -->
    <div class="menu-cart">
        <div class="cart-box bg-white shadow-sm rounded p-3">
            @if(!empty($cartItems) && $cartCount > 0)
                <ul class="list-unstyled mb-3">
                    @foreach($cartItems as $item)
                        <li class="d-flex align-items-center mb-2">
                            <img src="{{ asset($item->image) }}" 
                                 alt="{{ $item->name }}" 
                                 style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px; margin-right: 10px;">
                            <div class="cart-product">
                                <a href="{{ route('products.show', $item->id) }}" 
                                   class="text-dark fw-semibold text-decoration-none">{{ $item->name }}</a>
                                <br>
                                <span class="text-muted">{{ $item->pivot->quantity }} × {{ number_format($item->price, 0, ',', ' ') }} FCFA</span>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="shopping-items d-flex justify-content-between fw-semibold mb-3">
                    <span>Total :</span>
                    <span>{{ number_format($cartTotal, 0, ',', ' ') }} FCFA</span>
                </div>

                <div class="cart-button mb-4 text-center">
                    <a href="{{ route('cart.index') }}" class="theme-btn btn btn-primary px-4">Voir Panier</a>
                </div>
            @else
                <div class="text-center p-3 bg-light rounded">
                    <p class="text-muted mb-0">Votre panier est vide.</p>
                </div>
            @endif
        </div>

        <a href="{{ route('cart.index') }}" class="cart-icon position-relative text-white">
            <i class="fa-sharp fa-regular fa-bag-shopping fs-4"></i>
            <span class="number position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $cartCount ?? 0 }}
            </span>
        </a>
    </div>

                    <!-- Bouton menu mobile -->
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->
