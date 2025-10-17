@extends('layouts2.master')
@section('title', 'Contactez-nous')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        @include('layouts2.breadcrumb', ['title' => 'Contactez-nous'])

        <!--start page content-->
        

        <section class="py-4">
            <div class="container">
                <div class="row">
                    <!-- Formulaire de contact -->
                    <div class="col-lg-8">
                        <div class="p-3 bg-dark-1">
                            <form method="POST" action="{{ route('contact.store') }}">
                                @csrf
                                <div class="form-body">
                                    <h6 class="mb-0 text-uppercase">Envoyez-nous un message</h6>
                                    <div class="my-3 border-bottom"></div>

                                    <div class="mb-3">
                                        <label class="form-label">Votre nom</label>
                                        <input type="text" name="name" class="form-control" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Votre email</label>
                                        <input type="email" name="email" class="form-control" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Numéro de téléphone</label>
                                        <input type="text" name="phone" class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Message</label>
                                        <textarea name="message" class="form-control" rows="4" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-light btn-ecomm" type="submit">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Informations de contact -->
                    <div class="col-lg-4">
                        <div class="p-3 bg-dark-1">
                            <div class="address mb-3">
                                <p class="mb-0 text-uppercase text-white">Adresse</p>
                                <p class="mb-0 font-12">123 Nom de la rue, Ville, Australie</p>
                            </div>
                            <div class="phone mb-3">
                                <p class="mb-0 text-uppercase text-white">Téléphone</p>
                                <p class="mb-0 font-13">Numéro gratuit : (123) 472-796</p>
                                <p class="mb-0 font-13">Mobile : +91-9910XXXX</p>
                            </div>
                            <div class="email mb-3">
                                <p class="mb-0 text-uppercase text-white">Email</p>
                                <p class="mb-0 font-13">mail@example.com</p>
                            </div>
                            <div class="working-days mb-3">
                                <p class="mb-0 text-uppercase text-white">Jours d'ouverture</p>
                                <p class="mb-0 font-13">Lun - Ven / 9h30 - 18h30</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end page content-->
    </div>
</div>

@endsection
