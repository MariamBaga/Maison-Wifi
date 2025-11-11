<footer class="main-footer background-black">
    <div class="main-footer__bg background-black" style="background-image: url({{ asset('assets/images/shapes/footer-bg-1-1.png') }});"></div>
    <div class="main-footer__shape-one" style="background-image: url({{ asset('assets/images/resources/footer-shape-1.png') }});"></div>
    <div class="main-footer__shape-two" style="background-image: url({{ asset('assets/images/resources/footer-shape-2.png') }});"></div>

    <!-- Top -->
    <div class="main-footer__top">
        <div class="container">
            <div class="main-footer__top__inner">
                <ul class="list-unstyled main-footer__top__info">
                    <li class="main-footer__top__info__item">
                        <span class="main-footer__top__info__icon"><i class="icon-mail"></i></span>
                        <a href="mailto:info@maisonduwifi.com">info@maisonduwifi.com</a>
                    </li>
                    <li class="main-footer__top__info__item">
                        <span class="main-footer__top__info__icon"><i class="icon-maps-and-flags"></i></span>
                        Lot 1234, Rue des Entrepreneurs Godomey, Cotonou, Bénin
                    </li>
                </ul>
                <div class="main-footer__top__right">
                    <div class="main-footer__top__social">
                        <a href="https://www.facebook.com/share/1Cqw2fha4c/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/connectiix" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/connectiix" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.tiktok.com/@connectiix2" target="_blank"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle -->
    <div class="container">
        <div class="main-footer__middle">
        <a href="{{ route('home.index') }}" class="main-footer__middle__logo">
        <img src="{{ asset('assets/images/logo-light.png') }}" height="120" alt="Maison WIFI">
                    </a>
                    <form action="#" data-url="MAILCHIMP_FORM_URL" class="footer-widget__newsletter mc-form">
                        <span class="footer-widget__newsletter__icon"><i class="icon-mail"></i></span>
                        <input type="text" name="EMAIL" placeholder="Enter Email Address">
                        <button type="submit" class="ienet-btn"><span>S'abonner maintenant</span></button>
                        <div class="mc-form__response"></div><!-- /.mc-form__response -->
                    </form><!-- /.footer-widget__newsletter mc-form -->
            <div class="main-footer__middle__call">
                <div class="main-footer__middle__call__icon"><span class="icon-telephone"></span></div>
                <div class="main-footer__middle__call__title">Appelez-nous</div>
                <a class="main-footer__middle__call__text" href="tel:+2290192840000">+229 01 92 84 00 00</a>
            </div>
        </div>
    </div>

    <!-- Bottom Widgets -->
    <div class="container">
        <div class="row">
            <!-- À propos -->
            <div class="col-md-6 col-xl-3">
                <div class="footer-widget footer-widget--about">
                    <h2 class="footer-widget__title">À propos</h2>
                    <p class="footer-widget__text">
                        Maison WIFI fournit des solutions fiables pour vos connexions Internet, réseaux et accessoires.
                    </p>
                    <a href="{{ route('aboutus') }}" class="ienet-btn">
                        <span>Découvrir<span class="ienet-btn__icon"><i class="fas fa-chevron-right"></i></span></span>
                    </a>
                </div>
            </div>

            <!-- Catégories dynamiques -->
            <div class="col-md-6 col-xl-3">
                <div class="footer-widget footer-widget--links">
                    <h2 class="footer-widget__title">Catégories</h2>
                    <ul class="list-unstyled footer-widget__links">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Liens utiles -->
            <div class="col-md-6 col-xl-3">
                <div class="footer-widget footer-widget--links">
                    <h2 class="footer-widget__title">Liens utiles</h2>
                    <ul class="list-unstyled footer-widget__links">
                        <li><a href="{{ route('home.index') }}">Accueil</a></li>
                        <li><a href="{{ route('products.index') }}">Boutique</a></li>
                        <li><a href="{{ route('orders.index') }}">Suivre ma commande</a></li>
                        <li><a href="{{ route('aboutus') }}">À propos</a></li>
                        <li><a href="{{ route('contact.form') }}">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Galerie -->
            <div class="col-md-6 col-xl-3">
                <div class="footer-widget footer-widget--gallery">
                    <h2 class="footer-widget__title">Notre Galerie</h2>
                    <div class="footer-widget__gallery">
                        @for ($i = 1; $i <= 6; $i++)
                            <a href="{{ asset('assets/images/gallery/fg-' . $i . '.jpg') }}" class="footer-widget__gallery__link">
                                <img src="{{ asset('assets/images/gallery/fg-' . $i . '.jpg') }}" alt="Maison WIFI">
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bas du footer -->
    <div class="main-footer__bottom">
        <div class="container">
            <div class="main-footer__bottom__inner">
                <p class="main-footer__copyright">
                    © {{ date('Y') }} <strong>Maison WIFI</strong> — Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</footer>
