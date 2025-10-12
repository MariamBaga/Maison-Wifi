<!-- Core JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

    <!-- App Scripts -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>

    {{-- Scripts personnalisés des pages --}}
    @stack('scripts')
