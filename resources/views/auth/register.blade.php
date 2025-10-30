@extends('layouts2.master')

@section('title', 'Inscription')

@section('content')

<!-- Page Header -->
@include('layouts2.breadcrumb', ['title' => 'Créer un compte'])

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

                    <h3 class="login-page__wrap__title">Créer un compte</h3>

                    <form method="POST" action="{{ route('register') }}" class="login-page__form">
                        @csrf

                        {{-- Nom --}}
                        <div class="login-page__form-input-box">
                            <label for="name">Nom complet</label>
                            <input type="text" id="name" name="name" placeholder="Votre nom complet" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="login-page__form-input-box">
                            <label for="email">Adresse Email</label>
                            <input type="email" id="email" name="email" placeholder="Votre adresse email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mot de passe --}}
                        <div class="login-page__form-input-box">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" placeholder="Choisir un mot de passe" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Confirmation mot de passe --}}
                        <div class="login-page__form-input-box">
                            <label for="password_confirmation">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmer votre mot de passe" required>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Boutons --}}
                        <div class="login-page__form-btn-box">
                            <button type="submit" class="ienet-btn">
                                <span>S'inscrire</span>
                            </button>

                            <div class="login-page__form-btn-box__border"></div>

                            <p class="login-page__form-btn-box__register-text">
                                Déjà un compte ?
                                <a href="{{ route('login') }}">Se connecter</a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
