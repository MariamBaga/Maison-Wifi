@extends('layouts2.master')
@section('title', 'home')

@section('content')
    <section class="hero-section hero-1 fix hero-bg">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center mt-2" role="alert"
                style="background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc;">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center mt-2" role="alert"
                style="background-color: #f8d7da; color: #842029; border: 1px solid #f5c2c7;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="arrow-button">
            <button class="array-prev active">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button class="array-next">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>

        <div class="container">
            <div class="hero-items">
                <!-- Contenu statique (texte) -->
                <div class="hero-content">
                    <h6>45% MEGA SALE OFFER</h6>
                    <h1>Maison WiFi – Produits connectés</h1>
                    <a href="contact.html" class="theme-btn">Discover Now</a>
                    <p>
                        Découvrez nos produits connectés pour la maison : prises intelligentes, rallonges, power banks et
                        bien plus.
                    </p>
                </div>

                <!-- Slider des images produits -->
                <div class="swiper hero-image-slider">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <div class="hero-image">
                                    <img src="{{ asset($product->image ?? 'assets/img/hero/01.png') }}"
                                        alt="{{ $product->name }}">
                                </div>
                                <div class="hero-caption">

                                    <a href="{{ route('products.show', $product->id) }}" class="theme-btn">Acheter
                                        maintenant</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation Swiper -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>


<!-- Feature-Section Start -->
<section class="feature-section fix">
    <div class="container">
        <div class="feature-wrapper">
            <div class="feature-item style-2 wow fadeInUp" data-wow-delay=".2s">
                <div class="icon">
                    <img src="{{ asset('assets/img/icon/01.svg') }}" alt="img">
                </div>
                <div class="content">
                    <h6>Livraison Rapide</h6>
                    <p>Expédition fiable et rapide pour tous vos produits connectés.</p>
                </div>
            </div>
            <div class="feature-item wow fadeInUp" data-wow-delay=".4s">
                <div class="icon">
                    <img src="{{ asset('assets/img/icon/02.svg') }}" alt="img">
                </div>
                <div class="content">
                    <h6>Garantie Satisfaction</h6>
                    <p>Remboursement garanti en cas d’insatisfaction.</p>
                </div>
            </div>
            <div class="feature-item wow fadeInUp" data-wow-delay=".6s">
                <div class="icon">
                    <img src="{{ asset('assets/img/icon/03.svg') }}" alt="img">
                </div>
                <div class="content">
                    <h6>Support 24/7</h6>
                    <p>Notre équipe est disponible à tout moment.</p>
                </div>
            </div>
            <div class="feature-item wow fadeInUp" data-wow-delay=".8s">
                <div class="icon">
                    <img src="{{ asset('assets/img/icon/04.svg') }}" alt="img">
                </div>
                <div class="content">
                    <h6>Service Fiable</h6>
                    <p>Des experts pour vos besoins en connectivité.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Offer-Section Start -->
<section class="offer-section section-padding pt-0 fix">
    <div class="container">
        <div class="offer-wrapper">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="offer-card-item wow fadeInUp" data-wow-delay=".3s">
                        <div class="content">
                            <p>Jusqu’à 20% de réduction</p>
                            <h3><a href="#">Équipements Réseaux Domestiques</a></h3>
                            <a href="#" class="theme-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                        <div class="offer-image">
                        <img src="{{ asset('assets/img/Router.jpeg') }}" alt="img" style="width: 151px; height: 176px; object-fit: cover; border-radius: 8px;">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 wow fadeInUp" data-wow-delay=".5s">
                            <div class="offer-box">
                                <div class="content">
                                    <span>Populaire</span>
                                    <h3><a href="#">Routeurs & Modems</a></h3>
                                </div>
                                <div class="offer-image">
                                <img src="{{ asset('assets/img/Router.jpeg') }}" alt="img" style="width: 126px; height: 170px; object-fit: cover; border-radius: 8px;">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay=".7s">
                            <div class="offer-box style-2">
                                <div class="content">
                                    <span>Nouveautés</span>
                                    <h3><a href="#">Solutions Domotiques</a></h3>
                                </div>
                                <div class="offer-image">
                                <img src="{{ asset('assets/img/Router.jpeg') }}" alt="img" style="width: 167px; height: 170px; object-fit: cover; border-radius: 8px;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="offer-bg-box bg-cover" style="background-image: url({{ asset('assets/img/accessoire.jpeg') }});">
                        <div class="content">
                            <p>Collection Spéciale</p>
                            <h3><a href="#">Accessoires et câbles réseau</a></h3>
                            <a href="#" class="theme-btn">Explorer <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About-Section Start -->
<section class="about-section section-padding fix pt-0">
    <div class="container">
        <div class="about-wrapper">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="{{ asset('assets/img/about/01.jpg') }}" alt="img" class="wow fadeInUp" data-wow-delay=".3s">
                        <div class="about-image-2">
                            <img src="{{ asset('assets/img/about/02.jpg') }}" alt="img" class="wow fadeInUp" data-wow-delay=".5s">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title style-2">
                            <h6 class="sub-title wow fadeInUp">Notre Histoire</h6>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">La Maison du Wifi — Connecter, Simplifier, Innover</h2>
                        </div>
                        <div class="text">
                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                La Maison du Wifi est un espace dédié à la connectivité et au confort numérique.
                                Nous accompagnons particuliers et entreprises dans l’installation, la maintenance et
                                l’optimisation de leurs réseaux internet, fibre, et solutions domotiques.
                            </p>
                            <p class="wow fadeInUp" data-wow-delay=".6s">
                                Notre mission est d’améliorer la vie numérique grâce à des solutions fiables,
                                accessibles et durables. Nous croyons que chaque foyer mérite une expérience
                                internet fluide et performante.
                            </p>
                            <a href="{{ route('contacts.index') }}" class="theme-btn wow fadeInUp" data-wow-delay=".8s">
                                Contactez-nous <i class="fa-regular fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 500);
            }
        }, 4000);

        // Flèches array-prev / array-next pour piloter Swiper
        const swiper = new Swiper('.hero-image-slider', {
            loop: true,
            navigation: {
                nextEl: '.array-next',
                prevEl: '.array-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
@endsection
