@extends('layouts2.master')
@section('title', 'Contactez-nous')

@section('content')

<!-- contact-us-Section Start -->
<section class="contact-us-section section-padding fix">
    <div class="container">
        <div class="conatct-main-wrapper">
            <div class="content text-center mb-5">
                <h2>Contactez-nous</h2>
                <ul class="list d-inline-flex gap-2 justify-content-center">
                    <li>
                        <a href="{{ url('/') }}">Accueil</a>
                    </li>
                    <li>
                        Contact
                    </li>
                </ul>
            </div>

            <div class="contact-box-wrapper">
                <div class="row g-4">

                    <!-- Formulaire de contact -->
                    <div class="col-lg-8">
                        <div class="comment-form-wrap">
                            <h3>Envoyez-nous un message</h3>

                            @if(session('success'))
                                <div class="alert alert-success mt-3">{{ session('success') }}</div>
                            @endif

                            <form method="POST" action="{{ route('contact.store') }}">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <input type="text" name="name" placeholder="Votre nom" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <input type="email" name="email" placeholder="Votre adresse email" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <input type="text" name="phone" placeholder="Votre numéro de téléphone">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <textarea name="message" placeholder="Tapez votre message" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="from-cheak-items">
                                            <div class="form-check d-flex gap-2 from-customradio">
                                                <input class="form-check-input" type="checkbox" id="saveInfo">
                                                <label class="form-check-label" for="saveInfo">
                                                    Enregistrer mes informations pour la prochaine fois.
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="theme-btn">Envoyer le message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Informations de contact -->
                    <div class="col-lg-4">
                        <div class="contact-right">
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fa-thin fa-comments"></i>
                                </div>
                                <div class="content">
                                    <h6>
                                        <a href="mailto:contact@connectiix.com">
                                            contact@connectiix.com
                                        </a>
                                    </h6>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fa-thin fa-location-pin"></i>
                                </div>
                                <div class="content">
                                    <h6>
                                        ConnectiiX, Bamako, Mali<br>
                                        Hamdallaye ACI 2000
                                    </h6>
                                </div>
                            </div>

                            <div class="contact-item mb-0">
                                <div class="icon">
                                    <i class="fa-thin fa-share-nodes"></i>
                                </div>
                                <div class="content">
                                    <h6>Suivez-nous sur les réseaux</h6>
                                </div>
                            </div>

                            <div class="social-icon d-flex align-items-center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="bg-2"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>

                </div> <!-- /.row -->
            </div>
        </div>
    </div>
</section>

<!-- map-Section Start -->
<div class="map-section section-padding pt-0">
    <div class="container">
        <div class="map-items">
            <div class="googpemap">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd"
                    style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>

@endsection
