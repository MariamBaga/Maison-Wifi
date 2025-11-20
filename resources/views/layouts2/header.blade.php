@php
// Classe de base pour le header et topbar
$headerClass = 'main-header sticky-header sticky-header--normal';


// Définir les routes qui auront le style "inner"
$innerRoutes = ['contact.form', 'aboutus', 'cart.index', 'products.index', 'orders.index', 'products.show', 'checkout.index', 'login', 'register', 'services','orders.show'];

// Vérifier si la route actuelle est dans les routes inner
if (request()->routeIs($innerRoutes)) {
    $headerClass .= ' main-header--inner';

}

// Choisir le logo selon la route
$logo = request()->routeIs($innerRoutes)
    ? 'assets/images/logo-dark.png'
    : 'assets/images/logo-light.png';
@endphp

<header class="{{ $headerClass }}">
    <div class="container-fluid">
        <div class="main-header__inner">
            <!-- Logo -->
            <div class="main-header__logo">
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset($logo) }}" alt="Maison Wifi" height="80">
                </a>
            </div>

            <!-- Mobile toggler -->
            <a href="#" class="main-header__toggler"><span class="icon-menu"></span></a>

            <!-- Navigation -->
            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">
                    <li class="{{ request()->routeIs('home.index') ? 'current' : '' }}">
                        <a href="{{ route('home.index') }}">Accueil</a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('products.index') }}">Boutique</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('products.index') }}">Tous les produits</a></li>
                            @foreach (\App\Models\Category::all() as $category)
                                <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ request()->routeIs('aboutus') ? 'current' : '' }}">
                        <a href="{{ route('aboutus') }}">À propos</a>
                    </li>
                    <li class="{{ request()->routeIs('services') ? 'current' : '' }}">
                        <a href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="{{ request()->routeIs('contact.form') ? 'current' : '' }}">
                        <a href="{{ route('contact.form') }}">Contact</a>
                    </li>
                    <li><a href="{{ route('orders.index') }}">Suivre ma commande</a></li>
                </ul>
            </nav>

            <!-- Header Right -->
            <div class="main-header__right">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="#" class="search-toggler main-header__search">
                    <i class="icon-search" aria-hidden="true"></i>
                    <span class="sr-only">Search</span>
                </a>
                <a href="{{ route('cart.index') }}" class="main-header__cart">
                    <i class="icon-cart" aria-hidden="true"></i>
                    <span class="number">{{ $cartCount ?? 0 }}</span>
                </a>
                <div class="main-header__call">
                    <div class="main-header__call__icon"><span class="icon-telephone"></span></div>
                    <div class="main-header__call__title">Assistance</div>
                    <a class="main-header__call__text" href="tel:+2290192840000">+229 01 92 84 00 00</a>
                </div>

                {{-- Auth Buttons --}}
@guest
    <a href="{{ route('login') }}" class="ienet-btn" style="margin-left: 10px;">
        <span>Se connecter</span>
    </a>
@endguest

@auth
    <form method="POST" action="{{ route('logout') }}" style="margin-left: 10px;">
        @csrf
        <button type="submit" class="ienet-btn" style="background:#dc3545;border:none;">
            <span>Déconnexion</span>
        </button>
    </form>
@endauth
{{-- End Auth Buttons --}}

            </div>
        </div>
    </div>
</header>
