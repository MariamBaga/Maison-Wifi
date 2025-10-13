@extends('layouts2.master')
@section('title', 'A propos de nous')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        @include('layouts2.breadcrumb', ['title' => 'A propos de nous'])

        <!--start page content-->
        <section class="py-0 py-lg-4">
            <div class="container">
                <h4>Notre Histoire</h4>
                <p>
                    La Maison du Wifi est un espace dédié à la connectivité, à la technologie et au confort numérique.
                    Nous accompagnons les foyers, entreprises et professionnels dans l’installation, l’optimisation
                    et la maintenance de leurs réseaux internet.
                </p>

                <p>
                    Notre objectif est simple : rendre la connexion fiable, rapide et accessible à tous.
                    Que ce soit pour la fibre optique, la domotique, la vidéosurveillance ou le matériel réseau,
                    la Maison du Wifi est votre partenaire de confiance pour un environnement numérique fluide et sécurisé.
                </p>

                <p>
                    Nous croyons que chaque maison, chaque entreprise, mérite une expérience internet stable et performante.
                    Grâce à notre expertise et notre engagement, nous transformons la connectivité en un véritable atout
                    pour votre quotidien et votre productivité.
                </p>

                <hr class="my-4">

                <h4>Notre Mission</h4>
                <p>
                    Notre mission est d’améliorer la qualité de vie numérique des particuliers et des entreprises
                    à travers des solutions innovantes et durables.
                </p>

                <p>Nous œuvrons chaque jour pour :</p>
                <ul>
                    <li>connecter les foyers à un internet plus performant ;</li>
                    <li>simplifier l’accès aux équipements technologiques de qualité ;</li>
                    <li>garantir la sécurité et la stabilité des réseaux ;</li>
                    <li>offrir un service client réactif et personnalisé.</li>
                </ul>

                <p>
                    À la Maison du Wifi, nous connectons bien plus que des appareils :
                    <strong>nous connectons les gens à leurs ambitions.</strong>
                </p>
            </div>
        </section>

        <section class="py-4">
            <div class="container">
                <h4>Pourquoi nous choisir?</h4>
                <hr>
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col d-flex">
                        <div class="card rounded-0 shadow-none w-100">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/images/icons/delivery.png') }}" width="60" alt="">
                                <h5 class="my-3">Livraison Rapide</h5>
                                <p class="mb-0">Profitez d’une expédition rapide et fiable pour tous vos produits technologiques.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 shadow-none w-100">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/images/icons/money-bag.png') }}" width="60" alt="">
                                <h5 class="my-3">Garantie Satisfaction</h5>
                                <p class="mb-0">Nous garantissons un service de qualité et un remboursement en cas d’insatisfaction.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 shadow-none w-100">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/images/icons/support.png') }}" width="60" alt="">
                                <h5 class="my-3">Support 24/7</h5>
                                <p class="mb-0">Notre équipe est disponible à tout moment pour répondre à vos besoins.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="py-4">
            <div class="container">
                <h4>Nos Marques Partenaires</h4>
                <hr>
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-xl-5">
                    @foreach(range(1,15) as $i)
                        <div class="col">
                            <div class="card">
                                <div class="card-body text-center">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('assets/images/brands/' . sprintf('%02d', $i) . '.png') }}" class="img-fluid" alt="Marque {{ $i }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> -->
        <!--end start page content-->
    </div>
</div>

@endsection
