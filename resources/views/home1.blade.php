@extends('layouts2.master')
@section('title', 'home')

@section('content')
    @include('layouts2.slide')

    <section class="about-one" style="background-image: url({{ asset('assets/images/shapes/about-1-bg.png') }});">
    <div class="about-one__shape" style="background-image: url({{ asset('assets/images/resources/about-shape-1.png') }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-one__image wow fadeInLeft" data-wow-delay="300ms">
                    <div class="about-one__image__one">
                        <img src="{{ asset('assets/images/resources/about-1-1.jpg') }}" alt="Maison Wifi">
                    </div>
                    <div class="about-one__image__bg"></div>
                    <div class="about-one__image__border" style="background-image: url({{ asset('assets/images/shapes/about-1-border.png') }});"></div>
                    <div class="about-one__image__two">
                        <div class="about-one__image__two__inner">
                            <img src="{{ asset('assets/images/resources/about-1-2.jpg') }}" alt="Maison Wifi">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 wow fadeInRight" data-wow-delay="300ms">
                <div class="about-one__content">
                    <div class="sec-title text-left">
                        <h6 class="sec-title__tagline bw-split-in-right">
                            <span class="sec-title__tagline__left-border"></span>
                            À propos de notre service Internet
                            <span class="sec-title__tagline__right-border"></span>
                        </h6>

                        <h3 class="sec-title__title bw-split-in-left">
                            Nous offrons un <span>réseau illimité</span> pour vous.
                        </h3>
                    </div>

                    <p class="about-one__content__text">
                        Avec Maison WiFi, profitez d’une connexion rapide, stable et sans coupure.
                        Nos solutions s’adaptent aussi bien aux particuliers qu’aux entreprises.
                    </p>

                    <ul class="about-one__content__list">
                        <li><span class="fas fa-check"></span>Connexion ultra-rapide</li>
                        <li><span class="fas fa-check"></span>Wi-Fi haut débit</li>
                        <li><span class="fas fa-check"></span>Installation facile</li>
                        <li><span class="fas fa-check"></span>Mises à jour 5G</li>
                    </ul>

                    <a href="{{ route('aboutus') }}" class="ienet-btn">
                        <span>En savoir plus
                            <span class="ienet-btn__icon"><i class="fas fa-chevron-right"></i></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>





<section class="packages-one">
    <div class="packages-one__bg jarallax"
         data-jarallax
         data-speed="0.3"
         data-imgPosition="50% -100%"
         style="background-image: url({{ asset('assets/images/backgrounds/price-bg-1.jpg') }});"></div>

    <div class="container tabs-box">

        {{-- EN-TÊTE DES SERVICES --}}
        <ul class="packages-one__wrapper">
            <li class="packages-one__item">
                <div class="packages-one__item__icon"><i class="icon-home"></i></div>
                <h3 class="packages-one__item__title">Internet Maison</h3>
                <ul class="packages-one__item__list">
                    <li><span class="fas fa-check"></span>Connexion dédiée</li>
                    <li><span class="fas fa-check"></span>Support 24/7</li>
                    <li><span class="fas fa-check"></span>Débit flexible</li>
                    <li><span class="fas fa-check"></span>Installation rapide</li>
                </ul>
            </li>

            <li class="packages-one__item">
                <div class="packages-one__item__icon"><i class="icon-corporation"></i></div>
                <h3 class="packages-one__item__title">Internet Entreprise</h3>
                <ul class="packages-one__item__list">
                    <li><span class="fas fa-check"></span>Réseau fiable</li>
                    <li><span class="fas fa-check"></span>Assistance premium</li>
                    <li><span class="fas fa-check"></span>Connexion évolutive</li>
                    <li><span class="fas fa-check"></span>Haute disponibilité</li>
                </ul>
            </li>

            <li class="packages-one__item">
                <div class="packages-one__item__icon"><i class="icon-data-analytics"></i></div>
                <h3 class="packages-one__item__title">Connectivité de Données</h3>
                <ul class="packages-one__item__list">
                    <li><span class="fas fa-check"></span>Haute performance</li>
                    <li><span class="fas fa-check"></span>Support constant</li>
                    <li><span class="fas fa-check"></span>Évolutif</li>
                    <li><span class="fas fa-check"></span>Sécurisé</li>
                </ul>
            </li>
        </ul>

        {{-- Titre --}}
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="sec-title text-left">
                    <h6 class="sec-title__tagline bw-split-in-right">
                        <span class="sec-title__tagline__left-border"></span>
                        Nos Meilleurs Forfaits
                        <span class="sec-title__tagline__right-border"></span>
                    </h6>
                    <h3 class="sec-title__title bw-split-in-left">Choisissez votre <span>meilleur plan</span></h3>
                </div>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="#" class="ienet-btn">
                    <span>Voir tous les services
                        <span class="ienet-btn__icon"><i class="fas fa-chevron-right"></i></span>
                    </span>
                </a>
            </div>
        </div>

        {{-- Onglets forfaits --}}
        <ul class="packages-one__list tab-buttons list-unstyled">
            <li data-tab="#10mbps" class="tab-btn">10 MBPS</li>
            <li data-tab="#20mbps" class="tab-btn active-btn">20 MBPS</li>
            <li data-tab="#30mbps" class="tab-btn">30 MBPS</li>
            <li data-tab="#50mbps" class="tab-btn">50 MBPS</li>
        </ul>

        {{-- Contenu d’un onglet exemple --}}
        <div class="tabs-content">
            <div class="tab active-tab fadeInUp animated" id="20mbps">
                <div class="row gutter-y-30">
                    <div class="col-lg-4 col-md-6">
                        <div class="packages-one__card">
                            <div class="packages-one__card__price">9 000 F / <span>mois</span></div>
                            <h3 class="packages-one__card__title">Pack Essentiel</h3>
                            <ul class="packages-one__card__list">
                                <li><span class="fas fa-check"></span>Illimité 24h/24</li>
                                <li><span class="fas fa-check"></span>WiFi inclus</li>
                                <li><span class="fas fa-check"></span>Installation gratuite</li>
                                <li><span class="fas fa-check"></span>Fibre optique</li>
                            </ul>
                            <a class="packages-one__card__rm" href="{{ route('contact.form') }}"><i class="icon-right-chevron"></i></a>
                            <div class="packages-one__card__image">
                                <img src="{{ asset('assets/images/resources/package-1-1.jpg') }}" alt="Maison Wifi">
                            </div>
                        </div>
                    </div>
                    {{-- Dupliquer pour d’autres forfaits --}}
                </div>
            </div>
        </div>
    </div>
</section>






<section class="feature-one">
    <div class="container">
        <div class="sec-title text-center">
            <h6 class="sec-title__tagline bw-split-in-right">
                <span class="sec-title__tagline__left-border"></span>Nos Atouts<span class="sec-title__tagline__right-border"></span>
            </h6>
            <h3 class="sec-title__title bw-split-in-left">Nos <span>Fonctionnalités Spéciales</span></h3>
        </div>

        <div class="row">
            <div class="col-lg-4 wow fadeInLeft" data-wow-delay="00ms">
                <div class="feature-one__box"><div class="feature-one__box__icon"><i class="icon-dashboard"></i></div><h5>Connexion Ultra-Rapide</h5></div>
                <div class="feature-one__box"><div class="feature-one__box__icon"><i class="icon-tv"></i></div><h5>250+ Chaînes TV</h5></div>
                <div class="feature-one__box"><div class="feature-one__box__icon"><i class="icon-planning"></i></div><h5>Formules Flexibles</h5></div>
            </div>

            <div class="col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <div class="feature-one__image">
                    <img src="{{ asset('assets/images/resources/feature-1-1.jpg') }}" alt="Maison Wifi">
                </div>
            </div>

            <div class="col-lg-4 wow fadeInRight" data-wow-delay="00ms">
                <div class="feature-one__box"><div class="feature-one__box__icon"><i class="icon-wifi-router"></i></div><h5>Installation Gratuite</h5></div>
                <div class="feature-one__box"><div class="feature-one__box__icon"><i class="icon-support"></i></div><h5>Support 24/7</h5></div>
                <div class="feature-one__box"><div class="feature-one__box__icon"><i class="icon-4k"></i></div><h5>Qualité 4K / 8K</h5></div>
            </div>
        </div>
    </div>
</section>


@endsection
