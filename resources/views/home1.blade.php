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
            @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mt-2" role="alert" style="background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc;">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center mt-2" role="alert" style="background-color: #f8d7da; color: #842029; border: 1px solid #f5c2c7;">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

                {{-- SLIDE 1 --}}
                <div class="carousel-item active">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h3 class="h3 fw-light text-primary">Nouvelle arrivée exclusive 🔥</h3>
                                <h1 class="h1 text-primary">Rallonge connectée</h1>
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
                                <h3 class="h3 fw-light text-primary">Profitez d’une autonomie totale ⚡</h3>
                                <h1 class="h1 text-primary">Power bank</h1>
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
                                <h3 class="h3 fw-light text-primary">Contrôlez votre maison du bout des doigts 🏠</h3>
                                <h1 class="h1 text-primary">Prises connectées</h1>
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


@section('scripts')
<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            setTimeout(() => alert.remove(), 500);
        }
    }, 4000); // 4 secondes avant disparition
</script>
@endsection
