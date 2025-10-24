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
                        <h5 class="about-two__image__experiance__number count-box"><span class="count-text" data-stop="25" data-speed="1500"></span> Ans</h5>
                        <p class="about-two__image__experiance__text">Expérience Professionnelle</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="100ms">
                <div class="about-two__content">
                    <div class="sec-title text-left">
                        <h6 class="sec-title__tagline bw-split-in-right"><span class="sec-title__tagline__left-border"></span>Notre Internet<span class="sec-title__tagline__right-border"></span></h6>
                        <h3 class="sec-title__title bw-split-in-left">La meilleure agence <span>Internet</span> en ville</h3>
                    </div>
                    <p class="about-two__content__text">
                        La Maison du Wifi a commencé comme un petit projet avec une grande vision. Notre objectif est de rendre la connexion fiable, rapide et accessible à tous.
                    </p>
                    <div class="about-two__content__box">
                        <div class="about-two__content__box__icon"><i class="icon-world"></i></div>
                        <h5 class="about-two__content__box__title">Connexion Rapide</h5>
                        <p class="about-two__content__box__text">
                            Embarrassant caché au milieu de tous les générateurs Lorem Ipsum sur Internet.
                        </p>
                    </div>
                    <div class="about-two__content__box">
                        <div class="about-two__content__box__icon"><i class="icon-wifi-router"></i></div>
                        <h5 class="about-two__content__box__title">Installations Gratuites</h5>
                        <p class="about-two__content__box__text">
                            Embarrassant caché au milieu de tous les générateurs Lorem Ipsum sur Internet.
                        </p>
                    </div>
                    <div class="about-two__content__user">
                        <div class="about-two__content__user__text">2.5M utilisateurs satisfaits</div>
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
                        <h6 class="sec-title__tagline bw-split-in-right"><span class="sec-title__tagline__left-border"></span>Économisez votre argent<span class="sec-title__tagline__right-border"></span></h6>
                        <h3 class="sec-title__title bw-split-in-left">Économisez sur vos services <span>Internet</span> avec TV Service</h3>
                    </div>
                    <p class="cta-two__content__text">
                        Nous offrons des services Internet fiables à prix abordables pour particuliers et entreprises.
                    </p>
                    <a href="{{ route('contact.form') }}" class="ienet-btn"><span>Contactez-nous <span class="ienet-btn__icon"><i class="fas fa-chevron-right"></i></span></span></a>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="cta-two__image">
                    <div class="row gutter-y-30 masonry-layout">
                        <div class="col-md-6">
                            <div class="cta-two__image__item cta-two__image__item--one wow fadeInUp" data-wow-delay="00ms">
                                <img src="{{ asset('assets/images/resources/cta-2-1.jpg') }}" alt="ienet">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cta-two__image__item cta-two__image__item--two wow fadeInUp" data-wow-delay="100ms">
                                <img src="{{ asset('assets/images/resources/cta-2-3.jpg') }}" alt="ienet">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cta-two__image__item wow fadeInUp" data-wow-delay="200ms">
                                <img src="{{ asset('assets/images/resources/cta-2-2.jpg') }}" alt="ienet">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cta-two__image__item cta-two__image__item--four wow fadeInUp" data-wow-delay="300ms">
                                <img src="{{ asset('assets/images/resources/cta-2-4.jpg') }}" alt="ienet">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
