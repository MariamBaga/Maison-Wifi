<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->


<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="iamlabib">
    <meta name="description" content="Karto - Multipurpose Ecommerce HTML Template">
    <title>@yield('title', 'Maison Wifi')</title>

    {{-- Liens CSS --}}
    @include('layouts2.links')
</head>

<body>

    <!-- Preloader Start -->
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

    <!-- Back To Top Start -->
    <button id="back-top" class="back-to-top">
        <i class="fa-regular fa-arrow-up"></i>
    </button>

    <!--<< Mouse Cursor Start >>-->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


      <!-- search-wrap Start -->
      
    </div>
        {{-- Header --}}
        @include('layouts2.header')

        {{-- Sidebar (si besoin) --}}
        @include('layouts2.sidebar')

        {{-- Contenu principal --}}
        <main>
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('layouts2.footer')
    </div>

    {{-- Scripts --}}
    @include('layouts2.scripts')

</body>
</html>
