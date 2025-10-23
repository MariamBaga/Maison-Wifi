@extends('layouts2.master')
@section('title', 'Contactez-nous')

@section('content')

<!-- Page Header -->
@include('layouts2.breadcrumb', ['title' => 'Contactez-nous'])

<!-- Contact Section -->
<section class="contact-one">
    <div class="container">
        <div class="row">
            <!-- Informations de contact -->
            <div class="col-xl-4">
                <ul class="list-unstyled contact-one__info">
                    <li class="contact-one__info__item">
                        <div class="contact-one__info__icon"><i class="icon-maps-and-flags"></i></div>
                        <div class="contact-one__info__content">
                            <h4 class="contact-one__info__title">Adresse</h4>
                            <p class="contact-one__info__text">
                                ConnectiiX, Bamako, Mali<br>
                                Hamdallaye ACI 2000
                            </p>
                        </div>
                    </li>
                    <li class="contact-one__info__item">
                        <div class="contact-one__info__icon"><i class="icon-telephone"></i></div>
                        <div class="contact-one__info__content">
                            <h4 class="contact-one__info__title">Téléphone</h4>
                            <p class="contact-one__info__text">
                                <a href="tel:+2290192840000">+229 01 92 84 00 00</a><br>
                                <a href="tel:+2290164245424">+229 01 64 24 54 24</a>
                            </p>
                        </div>
                    </li>
                    <li class="contact-one__info__item">
                        <div class="contact-one__info__icon"><i class="icon-mail"></i></div>
                        <div class="contact-one__info__content">
                            <h4 class="contact-one__info__title">Email</h4>
                            <p class="contact-one__info__text">
                                <a href="mailto:contact@connectiix.com">contact@connectiix.com</a><br>
                                <a href="mailto:info@connectiix.com">info@connectiix.com</a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Formulaire -->
            <div class="col-xl-8">
                <form method="POST" action="{{ route('contact.store') }}" class="contact-one__form contact-form-validated form-one wow fadeInUp" data-wow-duration="1500ms">
                    @csrf
                    <div class="contact-one__form__bg" style="background-image: url({{ asset('assets/images/shapes/contact-bg-1.png') }});"></div>
                    <div class="row">
                        <!-- Image -->
                        <div class="col-md-6">
                            <div class="contact-one__form__image">
                                <img src="{{ asset('assets/images/resources/contact-1-1.jpg') }}" alt="ConnectiiX">
                            </div>
                        </div>
                        <!-- Inputs -->
                        <div class="col-md-6">
                            <div class="form-one__group">
                                <div class="form-one__control form-one__control--full">
                                    <input type="text" name="name" placeholder="Votre nom" required>
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <input type="email" name="email" placeholder="Votre adresse email" required>
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <div class="form-one__control__select">
                                        <label class="sr-only" for="subject-select">Objet du message</label>
                                        <select class="selectpicker" id="subject-select" name="subject">
                                            <option value="">Sélectionnez un sujet</option>
                                            <option value="Demande info">Demande info</option>
                                            <option value="Support">Support</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <textarea name="message" placeholder="Tapez votre message" required></textarea>
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <button type="submit" class="ienet-btn">
                                        <span>Envoyer le message <span class="ienet-btn__icon"><i class="fas fa-chevron-right"></i></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                @if(session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="google-map">
    <div class="google-map">
        <iframe title="ConnectiiX Map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd"
            class="map__@@extraClassName" allowfullscreen></iframe>
    </div>
</section>

@endsection
