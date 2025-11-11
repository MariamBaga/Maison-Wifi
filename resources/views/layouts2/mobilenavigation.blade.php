<!-- =======================
MOBILE NAVIGATION
======================= -->
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="{{ route('home.index') }}" aria-label="logo image">
                <img src="{{ asset('assets/images/logo-light.png') }}" width="155" alt="Ienet Logo" />
            </a>
        </div>
        <!-- /.logo-box -->

        <div class="mobile-nav__container">
            <!-- Le menu est injecté automatiquement par JS -->
        </div>

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:info@ienetmail.com">info@ienetmail.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:+22390909090">+223 90 90 90 90</a>
            </li>

            @guest
<li><a href="{{ route('login') }}">Se connecter</a></li>
@endguest

@auth
<li>Bonjour, <strong>{{ Auth::user()->name }}</strong></li>
<li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link text-danger p-0 m-0">Déconnexion</button>
    </form>
</li>
@endauth

        </ul><!-- /.mobile-nav__contact -->

        <div class="mobile-nav__social">
            <a href="https://facebook.com/">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                <span class="sr-only">Facebook</span>
            </a>
            <a href="https://twitter.com/">
                <i class="fab fa-twitter" aria-hidden="true"></i>
                <span class="sr-only">Twitter</span>
            </a>
            <a href="https://instagram.com/">
                <i class="fab fa-instagram" aria-hidden="true"></i>
                <span class="sr-only">Instagram</span>
            </a>
            <a href="https://www.youtube.com/">
                <i class="fab fa-youtube" aria-hidden="true"></i>
                <span class="sr-only">Youtube</span>
            </a>
        </div><!-- /.mobile-nav__social -->
    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->


<!-- =======================
SEARCH POPUP
======================= -->
<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <div class="search-popup__content">
        <form role="search" method="GET" class="search-popup__form" action="#">
            <input type="text" name="q" id="search" placeholder="Rechercher un produit..." />
            <button type="submit" aria-label="search submit" class="ienet-btn">
                <span><i class="icon-search"></i></span>
            </button>
        </form>
    </div>
</div>


<!-- =======================
SIDEBAR
======================= -->
<aside class="sidebar-one">
    <div class="sidebar-one__overlay"></div>
    <div class="sidebar-one__content">
        <div class="sidebar-one__close"><i class="icon-plus"></i></div>

        <div class="sidebar-one__logo">
            <a href="{{ route('home.index') }}" aria-label="logo image">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="Ienet Logo" height="80">
            </a>
        </div>

        <p class="sidebar-one__text">
            Bienvenue sur Maison WiFi, votre partenaire pour tous vos équipements et accessoires réseau.
            Nous mettons la qualité et le service au cœur de notre engagement.
        </p>

        <h4 class="sidebar-one__title">Contact Info:</h4>
        <ul class="sidebar-one__info">
            <li>
                <span class="fas fa-map-marker-alt"></span>
                Lot 1234, Rue des Entrepreneurs Godomey, Cotonou, Bénin
            </li>
            <li>
                <span class="fas fa-clock"></span>
                Lun - Ven: 8h00 - 18h00
            </li>
            <li>
                <span class="fas fa-phone"></span>
                <a href="tel:+2290192840000">+229 01 92 84 00 00</a>
            </li>
            <li>
                <span class="fas fa-envelope"></span>
                <a href="mailto:info@maisonduwifi.com">info@maisonduwifi.com</a>
            </li>
        </ul>

        <div class="sidebar-one__social">
            <a href="https://facebook.com/"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
            <a href="https://twitter.com/"><i class="fab fa-twitter" aria-hidden="true"></i></a>
            <a href="https://instagram.com/"><i class="fab fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/"><i class="fab fa-youtube" aria-hidden="true"></i></a>
        </div>

        <h4 class="sidebar-one__title">Newsletter:</h4>
        <form action="#" method="POST" class="sidebar-one__newsletter">
            @csrf
            <input type="email" name="email" placeholder="Votre adresse e-mail" required>
            <button type="submit" class="fas fa-paper-plane">
                <span class="sr-only">submit</span>
            </button>
        </form>
    </div>
</aside>


<!-- =======================
SCROLL TO TOP
======================= -->
<a href="#" data-target="html" class="scroll-to-target scroll-to-top">
    <span class="scroll-to-top__text">Retour en haut</span>
    <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
</a>
