@extends('layouts2.master')

@section('title', 'Connexion')

@section('content')

<!-- Page Header -->
@include('layouts2.breadcrumb', ['title' => 'Connexion'])

<section class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                <div class="login-page__image">
                    <div class="login-page__image__one">
                        <img src="{{ asset('assets/images/resources/about-2-1.jpg') }}" alt="ienet">
                    </div>
                    <div class="login-page__image__two">
                        <img src="{{ asset('assets/images/resources/about-2-2.jpg') }}" alt="ienet">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="300ms">
                <div class="login-page__wrap">

                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="Logo" height="80">
                    </a>

                    <h3 class="login-page__wrap__title">Heureux de vous revoir</h3>

                    <!-- Formulaire Laravel -->
                    <form method="POST" action="{{ route('login') }}" class="login-page__form">
                        @csrf

                        <!-- Email -->
                        <div class="login-page__form-input-box">
                            <label for="email">Adresse Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Mot de passe -->
                        <div class="login-page__form-input-box">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" placeholder="Entrer votre mot de passe" required>
                            <span class="login-page__form-input-box__icon"><i class="fas fa-eye"></i></span>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember + Mot de passe oublié -->
                        <div class="login-page__form-check-wrapper">
                            <div class="login-page__checked-box">
                                <input type="checkbox" name="remember" id="save-data">
                                <label for="save-data"><span></span>Se souvenir de moi</label>
                            </div>

                            @if(Route::has('password.request'))
                            <div class="login-page__form-forgot-password">
                                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                            </div>
                            @endif
                        </div>

                        <!-- Boutons -->
                        <div class="login-page__form-btn-box">
                            <button type="submit" class="ienet-btn">
                                <span>Se connecter</span>
                            </button>

                            <div class="login-page__form-btn-box__border"></div>

                            <p class="login-page__form-btn-box__register-text">
                                Pas encore de compte ?
                                <a href="{{ route('register') }}">Créer un compte</a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
