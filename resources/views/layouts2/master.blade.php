<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Maison Wifi')</title>

    {{-- Liens CSS --}}
    @include('layouts2.links')
</head>

<body class="custom-cursor">

    <!-- Cursors personnalisés -->
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!-- ===== Preloader Start ===== -->
    <!--
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="M" class="letters-loading">M</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
                <span data-text-preloader="O" class="letters-loading">O</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span>&nbsp;</span>
                <span data-text-preloader="W" class="letters-loading">W</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="F" class="letters-loading">F</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
            </div>
            <p class="text-center">Loading...</p>
        </div>

        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left"><div class="bg"></div></div>
                <div class="col-3 loader-section section-left"><div class="bg"></div></div>
                <div class="col-3 loader-section section-right"><div class="bg"></div></div>
                <div class="col-3 loader-section section-right"><div class="bg"></div></div>
            </div>
        </div>
    </div>
    -->
    <!-- ===== Preloader End ===== -->

    <!-- ===== Alternative Preloader (Image) ===== -->
    <div class="preloader">
        <div class="preloader__image" style="background-image: url('{{ asset('assets/images/loader.png') }}');"></div>
    </div>

    <!-- ===== Page Wrapper ===== -->
    <div class="page-wrapper">

        {{-- Topbar --}}
        @include('layouts2.topbar-one')

        {{-- Header --}}
        @include('layouts2.header')

       

        {{-- Contenu principal --}}
        <main>
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('layouts2.footer')

    </div>
    <!-- ===== End Page Wrapper ===== -->

    {{-- Scripts JS --}}
    @include('layouts2.scripts')

</body>
</html>
