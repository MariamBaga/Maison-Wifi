@extends('layouts2.master')
@section('title', 'Services')
@section('content')

<!-- Page Header -->
@include('layouts2.breadcrumb', ['title' => 'Nos Services'])

<section class="service-page">
    <div class="container">
        <div class="row gutter-y-30">
            <!-- Installation Fibre & Internet -->
            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="00ms">
                <div class="service-page__item">
                    <div class="service-page__item__image">
                        <img src="assets/images/resources/service-fiber.jpg" alt="Installation Fibre et Internet">
                    </div>
                    <div class="service-page__item__content">
                        <h3 class="service-page__item__title"><a href="#">Installation Fibre & Connexion Internet</a></h3>
                        <div class="service-page__item__icon"><span class="icon-optical-fiber"></span></div>
                    </div>
                </div>
            </div>
            <!-- Optimisation & Configuration Réseau -->
            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="50ms">
                <div class="service-page__item">
                    <div class="service-page__item__image">
                        <img src="assets/images/resources/service-network.jpg" alt="Optimisation réseau">
                    </div>
                    <div class="service-page__item__content">
                        <h3 class="service-page__item__title"><a href="#">Optimisation & Maintenance Réseau</a></h3>
                        <div class="service-page__item__icon"><span class="icon-wifi-router"></span></div>
                    </div>
                </div>
            </div>
            <!-- Domotique -->
            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="service-page__item">
                    <div class="service-page__item__image">
                        <img src="assets/images/resources/service-domotic.jpg" alt="Domotique & Maison Connectée">
                    </div>
                    <div class="service-page__item__content">
                        <h3 class="service-page__item__title"><a href="#">Installation Domotique & Maison Connectée</a></h3>
                        <div class="service-page__item__icon"><span class="icon-smart-home"></span></div>
                    </div>
                </div>
            </div>
            <!-- Vidéosurveillance -->
            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="150ms">
                <div class="service-page__item">
                    <div class="service-page__item__image">
                        <img src="assets/images/resources/service-camera.jpg" alt="Vidéosurveillance">
                    </div>
                    <div class="service-page__item__content">
                        <h3 class="service-page__item__title"><a href="#">Installation Vidéosurveillance & Sécurité</a></h3>
                        <div class="service-page__item__icon"><span class="icon-cctv-camera"></span></div>
                    </div>
                </div>
            </div>
            <!-- Fourniture Matériel Réseau -->
            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="service-page__item">
                    <div class="service-page__item__image">
                        <img src="assets/images/resources/service-material.jpg" alt="Matériel réseau">
                    </div>
                    <div class="service-page__item__content">
                        <h3 class="service-page__item__title"><a href="#">Vente et Installation de Matériel Réseau</a></h3>
                        <div class="service-page__item__icon"><span class="icon-router"></span></div>
                    </div>
                </div>
            </div>
            <!-- Assistance & Support Technique -->
            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="250ms">
                <div class="service-page__item">
                    <div class="service-page__item__image">
                        <img src="assets/images/resources/service-support.jpg" alt="Support Technique">
                    </div>
                    <div class="service-page__item__content">
                        <h3 class="service-page__item__title"><a href="#">Support Technique & Dépannage</a></h3>
                        <div class="service-page__item__icon"><span class="icon-support"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
