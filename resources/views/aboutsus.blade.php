@extends('layouts2.master')
@section('title', 'A propos de nous')
@section('content')

<!-- Page Header -->
@include('layouts2.breadcrumb', ['title' => 'À propos de nous'])

<!-- About Section -->
<section class="about-two about-two--about-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__image wow fadeInLeft" data-wow-delay="200ms">
                    <div class="about-two__image__one">
                        <img src="{{ asset('assets/images/resources/about-2-1.jpg') }}" alt="Notre Histoire">
                    </div>
                    <div class="about-two__image__border" style="background-image: url('{{ asset('assets/images/shapes/about-2-border.png') }}');"></div>
                    <div class="about-two__image__two">
                        <img src="{{ asset('assets/images/resources/about-2-2.jpg') }}" alt="ienet">
                    </div>
                    <div class="about-two__image__experiance">
                        <div class="about-two__image__experiance__icon"><i class="icon-medal"></i></div>
                        <h5 class="about-two__image__experiance__number count-box">
                            <span class="count-text" data-stop="25" data-speed="1500"></span> Ans
                        </h5>
                        <p class="about-two__image__experiance__text">Expérience Professionnelle</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 wow fadeInRight" data-wow-delay="100ms">
                <div class="about-two__content">
                    <div class="sec-title text-left">
                        <h6 class="sec-title__tagline bw-split-in-right"><span class="sec-title__tagline__left-border"></span>Notre Vision<span class="sec-title__tagline__right-border"></span></h6>
                        <h3 class="sec-title__title bw-split-in-left">Votre partenaire <span>connectivité</span></h3>
                    </div>

                    <p class="about-two__content__text">
                        La Maison du Wifi est un espace dédié à la connectivité, à la technologie et au confort numérique.
                        Nous accompagnons les foyers, entreprises et professionnels dans l’installation, l’optimisation et la
                        maintenance de leurs réseaux internet. Notre objectif : rendre la connexion fiable, rapide et accessible à tous.
                    </p>

                    <p class="about-two__content__text">
                        Fibre optique, domotique, vidéosurveillance, réseau professionnel : nous assurons des solutions sur mesure
                        pour un environnement numérique fluide, sécurisé et performant.
                    </p>

                    <div class="about-two__content__box">
                        <div class="about-two__content__box__icon"><i class="icon-world"></i></div>
                        <h5 class="about-two__content__box__title">Connexion fiable & rapide</h5>
                        <p class="about-two__content__box__text">
                            Nous optimisons votre réseau pour garantir une connectivité stable et haut débit.
                        </p>
                    </div>

                    <div class="about-two__content__box">
                        <div class="about-two__content__box__icon"><i class="icon-wifi-router"></i></div>
                        <h5 class="about-two__content__box__title">Installation & support</h5>
                        <p class="about-two__content__box__text">
                            Accompagnement complet : installation, configuration, maintenance et assistance personnalisée.
                        </p>
                    </div>

                    <div class="about-two__content__user">
                        <div class="about-two__content__user__text">Clients satisfaits</div>
                        <div class="about-two__content__user__image">
                            <img src="{{ asset('assets/images/resources/user-1.png') }}" alt="ienet">
                            <img src="{{ asset('assets/images/resources/user-2.png') }}" alt="ienet">
                            <img src="{{ asset('assets/images/resources/user-3.png') }}" alt="ienet">
                            <span class="about-two__content__user__rm">+65</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-two">
    <div class="cta-two__bg" style="background-image: url('{{ asset('assets/images/shapes/cta-2-bg.png') }}');"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="00ms">
                <div class="cta-two__content">
                    <div class="sec-title text-left">
                        <h6 class="sec-title__tagline bw-split-in-right"><span class="sec-title__tagline__left-border"></span>Connexion accessible<span class="sec-title__tagline__right-border"></span></h6>
                        <h3 class="sec-title__title bw-split-in-left">Profitez d'une connexion stable et <span>sécurisée</span></h3>
                    </div>
                    <p class="cta-two__content__text">
                        Nous offrons des solutions réseau fiables, sécurisées et adaptées à votre budget pour foyers et entreprises.
                    </p>
                    <a href="{{ route('contact.form') }}" class="ienet-btn"><span>Contactez-nous <span class="ienet-btn__icon"><i class="fas fa-chevron-right"></i></span></span></a>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="cta-two__image">
                    <div class="row gutter-y-30 masonry-layout">
                        <div class="col-md-6"><div class="cta-two__image__item"><img src="{{ asset('assets/images/resources/cta-2-1.jpg') }}" alt="Maison du Wifi"></div></div>
                        <div class="col-md-6"><div class="cta-two__image__item"><img src="{{ asset('assets/images/resources/cta-2-3.jpg') }}" alt="Maison du Wifi"></div></div>
                        <div class="col-md-6"><div class="cta-two__image__item"><img src="{{ asset('assets/images/resources/cta-2-2.jpg') }}" alt="Maison du Wifi"></div></div>
                        <div class="col-md-6"><div class="cta-two__image__item"><img src="{{ asset('assets/images/resources/cta-2-4.jpg') }}" alt="Maison du Wifi"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
