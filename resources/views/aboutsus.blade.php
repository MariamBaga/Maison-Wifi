@extends('layouts2.master')
@section('title', 'A propos de nous')
@section('content')


    

        <!-- Our Journey & Mission -->
        <section class="about-section section-padding fix">
            <div class="container">
                <div class="about-wrapper-2">
                    <div class="row g-4 align-items-center">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="about-left-content">
                                <h4>Notre Histoire</h4>
                                <h3>Votre monde à portée de main</h3>
                                <p>
                                    La Maison du Wifi a commencé comme un petit projet avec une grande vision.
                                    Notre objectif est de rendre la connexion fiable, rapide et accessible à tous.
                                </p>
                                <div class="content">
                                    <h3>Notre Mission</h3>
                                    <p>
                                        Nous accompagnons les foyers et entreprises pour installer, optimiser et maintenir
                                        leurs réseaux internet, en garantissant sécurité et performance.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="about-image">
                                <img src="{{ asset('assets/images/about/about-01.jpg') }}" alt="Notre Histoire">
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="about-right">
                                <h3>A propos de l'entreprise</h3>
                                <p>
                                    Grâce à notre expertise et engagement, nous transformons la connectivité en un véritable
                                    atout pour votre quotidien et votre productivité.
                                </p>
                                <div class="info-text">
                                    <h6>Co-fondateur</h6>
                                    <img src="{{ asset('assets/images/about/signature.png') }}" alt="Signature Co-fondateur">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video Section -->
        <div class="video-bg-section fix">
            <div class="container-fluid">
                <div class="video-wrapper bg-cover" style="background-image: url('{{ asset('assets/images/about/video-bg.jpg') }}');">
                    <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn video-popup">
                        <i class="fa-duotone fa-play"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Why Choose Us -->
        <section class="py-4">
            <div class="container">
                <h4>Pourquoi nous choisir?</h4>
                <hr>
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col d-flex">
                        <div class="card rounded-0 shadow-none w-100 text-center">
                            <div class="card-body">
                                <img src="{{ asset('assets/images/icons/delivery.png') }}" width="60" alt="">
                                <h5 class="my-3">Livraison Rapide</h5>
                                <p>Profitez d’une expédition rapide et fiable pour tous vos produits technologiques.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 shadow-none w-100 text-center">
                            <div class="card-body">
                                <img src="{{ asset('assets/images/icons/money-bag.png') }}" width="60" alt="">
                                <h5 class="my-3">Garantie Satisfaction</h5>
                                <p>Nous garantissons un service de qualité et un remboursement en cas d’insatisfaction.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 shadow-none w-100 text-center">
                            <div class="card-body">
                                <img src="{{ asset('assets/images/icons/support.png') }}" width="60" alt="">
                                <h5 class="my-3">Support 24/7</h5>
                                <p>Notre équipe est disponible à tout moment pour répondre à vos besoins.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Section -->
        <section class="testimonial-section fix">
            <div class="testimonial-wrapper">
                <div class="row g-0">
                    <div class="col-xl-6">
                        <div class="testimonial-image">
                            <img src="{{ asset('assets/images/testimonial/01.jpg') }}" alt="Client satisfait">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="testimonial-content">
                            <h3>Ce que nos clients disent</h3>
                            <p>Découvrez nos derniers retours clients sur nos services.</p>
                            <div class="swiper testimonial-slider-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="info-content">
                                            <h4>Nelson Richard</h4>
                                            <span>Designer</span>
                                            <p>Très satisfait de la connectivité et du support technique de la Maison du Wifi.</p>
                                            <div class="star">
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star color"></i>
                                            </div>
                                            <div class="client-image">
                                                <img src="{{ asset('assets/images/testimonial/client-1.png') }}" alt="">
                                                <img src="{{ asset('assets/images/testimonial/client-2.png') }}" alt="">
                                                <img src="{{ asset('assets/images/testimonial/client-3.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Autres slides similaires -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

@endsection
