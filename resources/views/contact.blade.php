@extends('layouts2.master')
@section('title', 'Contact Us')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        @include('layouts2.breadcrumb', ['title' => 'Contact Us'])

        <!--start page content-->
        <section class="py-4">
            <div class="container">
                <h3 class="d-none">Google Map</h3>
                <div class="contact-map p-3 bg-dark-1 rounded-0 shadow-none">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6319269302!2d144.49269200596396!3d-37.971237009163936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sin!4v1618835176130!5m2!1sen!2sin" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>

        <section class="py-4">
            <div class="container">
                <div class="row">
                    <!-- Formulaire de contact -->
                    <div class="col-lg-8">
                        <div class="p-3 bg-dark-1">
                            <form method="POST" action="{{ route('contact.store') }}">
                                @csrf
                                <div class="form-body">
                                    <h6 class="mb-0 text-uppercase">Drop us a line</h6>
                                    <div class="my-3 border-bottom"></div>

                                    <div class="mb-3">
                                        <label class="form-label">Enter Your Name</label>
                                        <input type="text" name="name" class="form-control" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Enter Email</label>
                                        <input type="email" name="email" class="form-control" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Message</label>
                                        <textarea name="message" class="form-control" rows="4" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-light btn-ecomm" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Informations de contact -->
                    <div class="col-lg-4">
                        <div class="p-3 bg-dark-1">
                            <div class="address mb-3">
                                <p class="mb-0 text-uppercase text-white">Address</p>
                                <p class="mb-0 font-12">123 Street Name, City, Australia</p>
                            </div>
                            <div class="phone mb-3">
                                <p class="mb-0 text-uppercase text-white">Phone</p>
                                <p class="mb-0 font-13">Toll Free (123) 472-796</p>
                                <p class="mb-0 font-13">Mobile : +91-9910XXXX</p>
                            </div>
                            <div class="email mb-3">
                                <p class="mb-0 text-uppercase text-white">Email</p>
                                <p class="mb-0 font-13">mail@example.com</p>
                            </div>
                            <div class="working-days mb-3">
                                <p class="mb-0 text-uppercase text-white">WORKING DAYS</p>
                                <p class="mb-0 font-13">Mon - FRI / 9:30 AM - 6:30 PM</p>
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
