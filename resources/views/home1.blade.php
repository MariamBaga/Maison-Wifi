@extends('layouts2.master')
@section('title', 'home')
@section('content')
<section class="slider-section">
    <div class="first-slider">
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                {{-- SLIDE 1 --}}
                <div class="carousel-item active">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h3 class="h3 fw-light">Nouvelle arrivée exclusive 🔥</h3>
                                <h1 class="h1">Rallonge connectée</h1>
                                <p class="pb-3">Gérez vos appareils à distance et économisez de l’énergie en toute simplicité.</p>
                                <div class="">
                                    <a class="btn btn-light btn-ecomm" href="javascript:;">Acheter maintenant <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/images/products/maison1.jpeg') }}" class="img-fluid" alt="Rallonge connectée">
                        </div>
                    </div>
                </div>

                {{-- SLIDE 2 --}}
                <div class="carousel-item">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h3 class="h3 fw-light">Profitez d’une autonomie totale ⚡</h3>
                                <h1 class="h1">Power bank</h1>
                                <p class="pb-3">Rechargez vos appareils à tout moment, où que vous soyez.</p>
                                <div class="">
                                    <a class="btn btn-white btn-ecomm" href="javascript:;">Découvrir <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/images/products/maison2.jpeg') }}" class="img-fluid" alt="Power bank">
                        </div>
                    </div>
                </div>

                {{-- SLIDE 3 --}}
                <div class="carousel-item">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h3 class="h3 fw-light">Contrôlez votre maison du bout des doigts 🏠</h3>
                                <h1 class="h1">Prises connectées</h1>
                                <p class="pb-3">Automatisez vos appareils et simplifiez votre quotidien.</p>
                                <div class="">
                                    <a class="btn btn-dark btn-ecomm" href="javascript:;">Shop Now <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/images/products/maison3.jpeg') }}" class="img-fluid" alt="Prises connectées">
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</section>
@endsection
