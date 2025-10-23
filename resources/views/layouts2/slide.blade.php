<!-- main-slider-start -->
<section class="main-slider-one">
    <div class="main-slider-one__carousel ienet-owl__carousel owl-carousel"
        data-owl-options='{
        "loop": true,
        "animateOut": "fadeOut",
        "animateIn": "fadeIn",
        "items": 1,
        "autoplay": true,
        "autoplayTimeout": 7000,
        "smartSpeed": 1000,
        "nav": false,
        "dots": true,
        "margin": 0
    }'>
        <!-- Slide 1 -->
        <div class="item">
            <div class="main-slider-one__item">
                <div class="main-slider-one__bg" style="background-image: url('{{ asset('assets/images/backgrounds/slider-1-1.jpg') }}');"></div>
                <div class="main-slider-one__content">
                    <h5 class="main-slider-one__sub-title">
                        <span class="main-slider-one__sub-title__border"></span>
                        Bienvenue à Maison Wifi
                    </h5>
                    <h2 class="main-slider-one__title">
                        Votre monde connecté,<br>simple et performant
                    </h2>
                    <p class="main-slider-one__text">
                        Des solutions Internet fiables, rapides et accessibles.<br>
                        Maison Wifi vous accompagne pour équiper, installer et sécuriser vos réseaux.
                    </p>
                    <div class="main-slider-one__btn">
                        <a href="{{ route('products.index') }}" class="ienet-btn main-slider-one__btn__first">
                            <span>Boutique<span class="ienet-btn__icon"><i class="fas fa-chevron-right"></i></span></span>
                        </a>
                        <a href="{{ route('contact.form') }}" class="ienet-btn main-slider-one__btn__last">
                            <span><span class="ienet-btn__icon ienet-btn__icon--left"><i class="fas fa-phone"></i></span>Assistance</span>
                        </a>
                    </div>
                </div>
                <div class="main-slider-one__image">
                    <div class="main-slider-one__image__one">
                        <img src="{{ asset('assets/images/backgrounds/slider-1-layer-2.jpg') }}" alt="Maison Wifi">
                    </div>
                    <div class="main-slider-one__image__border">
                        <img src="{{ asset('assets/images/shapes/slider-1-border.png') }}" alt="Maison Wifi">
                    </div>
                    <div class="main-slider-one__image__user">
                        <div class="main-slider-one__image__user__text">+2 000 clients satisfaits</div>
                        <div class="main-slider-one__image__user__image">
                            <img src="{{ asset('assets/images/resources/user-1.png') }}" alt="client">
                            <img src="{{ asset('assets/images/resources/user-2.png') }}" alt="client">
                            <img src="{{ asset('assets/images/resources/user-3.png') }}" alt="client">
                            <span class="main-slider-one__image__user__rm">+50</span>
                        </div>
                    </div>
                </div>
                <div class="main-slider-one__layer"
                    style="background-image: url('{{ asset('assets/images/backgrounds/slider-1-layer-1.png') }}');">
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="item">
            <div class="main-slider-one__item">
                <div class="main-slider-one__bg" style="background-image: url('{{ asset('assets/images/backgrounds/slider-1-2.jpg') }}');"></div>
                <div class="main-slider-one__content">
                    <h5 class="main-slider-one__sub-title">
                        <span class="main-slider-one__sub-title__border"></span>
                        Notre Mission
                    </h5>
                    <h2 class="main-slider-one__title">
                        Simplifier la connectivité<br>dans chaque foyer
                    </h2>
                    <p class="main-slider-one__text">
                        Installation, maintenance et optimisation de vos réseaux WiFi<br>
                        pour un Internet sans coupure et une productivité renforcée.
                    </p>
                    <div class="main-slider-one__btn">
                        <a href="{{ route('aboutus') }}" class="ienet-btn main-slider-one__btn__first">
                            <span>Découvrir<span class="ienet-btn__icon"><i class="fas fa-chevron-right"></i></span></span>
                        </a>
                        <a href="{{ route('contact.form') }}" class="ienet-btn main-slider-one__btn__last">
                            <span><span class="ienet-btn__icon ienet-btn__icon--left"><i class="fas fa-gem"></i></span>Nous contacter</span>
                        </a>
                    </div>
                </div>
                <div class="main-slider-one__image">
                    <div class="main-slider-one__image__one">
                        <img src="{{ asset('assets/images/backgrounds/slider-1-layer-2.jpg') }}" alt="Maison Wifi">
                    </div>
                    <div class="main-slider-one__image__border">
                        <img src="{{ asset('assets/images/shapes/slider-1-border.png') }}" alt="Maison Wifi">
                    </div>
                </div>
                <div class="main-slider-one__layer"
                    style="background-image: url('{{ asset('assets/images/backgrounds/slider-1-layer-2.png') }}');">
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="item">
            <div class="main-slider-one__item">
                <div class="main-slider-one__bg" style="background-image: url('{{ asset('assets/images/backgrounds/slider-1-3.jpg') }}');"></div>
                <div class="main-slider-one__content">
                    <h5 class="main-slider-one__sub-title">
                        <span class="main-slider-one__sub-title__border"></span>
                        À propos
                    </h5>
                    <h2 class="main-slider-one__title">
                        Votre partenaire<br>connectivité & technologie
                    </h2>
                    <p class="main-slider-one__text">
                        Depuis notre création, nous aidons les familles et entreprises<br>
                        à bâtir des réseaux modernes, sûrs et performants.
                    </p>
                    <div class="main-slider-one__btn">
                        <a href="{{ route('aboutus') }}" class="ienet-btn main-slider-one__btn__first">
                            <span>Notre Histoire<span class="ienet-btn__icon"><i class="fas fa-chevron-right"></i></span></span>
                        </a>
                        <a href="{{ route('products.index') }}" class="ienet-btn main-slider-one__btn__last">
                            <span><span class="ienet-btn__icon ienet-btn__icon--left"><i class="fas fa-store"></i></span>Visiter la boutique</span>
                        </a>
                    </div>
                </div>
                <div class="main-slider-one__image">
                    <div class="main-slider-one__image__one">
                        <img src="{{ asset('assets/images/backgrounds/slider-1-layer-2.jpg') }}" alt="Maison Wifi">
                    </div>
                    <div class="main-slider-one__image__border">
                        <img src="{{ asset('assets/images/shapes/slider-1-border.png') }}" alt="Maison Wifi">
                    </div>
                </div>
                <div class="main-slider-one__layer"
                    style="background-image: url('{{ asset('assets/images/backgrounds/slider-1-layer-3.png') }}');">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main-slider-end -->
