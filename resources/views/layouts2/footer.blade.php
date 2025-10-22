<!-- footer-section Start -->
<footer class="footer-section footer-bg fix">
    <div class="container">
        <div class="footer-widget-wrapper">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-xl-3 col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="{{ route('home.index') }}" class="footer-logo">
                                <img src="{{ asset('assets/images/logo-icon.png') }}" alt="Maison Wifi Logo">
                            </a>
                        </div>
                        <div class="footer-content">
                            <div class="text">
                                <p>Besoin d’aide ? Appelez-nous</p>
                                <a href="tel:+2290192840000">+229 01 92 84 00 00</a><br>
                                <a href="tel:+2290164245424">+229 01 64 24 54 24</a>
                            </div>
                            <ul class="contact-list">
                                <li>
                                    <i class="fa-regular fa-envelope"></i>
                                    <a href="mailto:contact@connectiix.com">contact@connectiix.com</a>
                                </li>
                                <li>
                                    <i class="fa-regular fa-location-dot"></i>
                                    Abatta, Abidjan, Côte d’Ivoire
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Catégories dynamiques -->
                <div class="col-xl-3 col-lg-4 col-md-4 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Catégories</h3>
                        </div>
                        <ul class="list-items">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('categories.show', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Liens rapides -->
                <div class="col-xl-3 col-lg-4 col-md-4 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Liens utiles</h3>
                        </div>
                        <ul class="list-items">
                            <li><a href="{{ route('aboutus') }}">À propos</a></li>
                            <li><a href="{{ route('orders.index') }}">Suivre ma commande</a></li>
                            <li><a href="{{ route('contact.form') }}">Contact</a></li>
                            <li><a href="{{ route('products.index') }}">Boutique</a></li>
                            <li><a href="{{ route('home.index') }}">Accueil</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter & Réseaux -->
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Abonnez-vous</h3>
                        </div>
                        <div class="footer-content">
                            <p class="f-text">Restez informé des nouveautés et offres.</p>
                            <div class="footer-input">
                                <form action="#" method="POST">
                                    <input type="email" placeholder="Entrez votre email">
                                    <button class="newsletter-btn" type="submit">
                                        <span>S'abonner</span>
                                    </button>
                                </form>
                            </div>
                            <div class="social-item mt-3">
                                <h6>Suivez-nous</h6>
                                <div class="social-icon d-flex align-items-center">
                                    <a href="https://www.facebook.com/share/1Cqw2fha4c/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/connectiix" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/company/connectiix" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.tiktok.com/@connectiix2" target="_blank"><i class="fab fa-tiktok"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bas du footer -->
        <div class="footer-bottom">
            <div class="footer-wrapper d-flex justify-content-between align-items-center flex-wrap">
                <p class="mb-0">© {{ date('Y') }} <strong>Maison WIFI</strong> — Tous droits réservés.</p>
                <div class="bottom-list d-flex align-items-center">
                    <div class="app-image"><img src="{{ asset('assets/img/footer/01.png') }}" alt="App"></div>
                    <div class="app-image"><img src="{{ asset('assets/img/footer/02.png') }}" alt="App"></div>
                </div>
            </div>
        </div>
    </div>
</footer>
