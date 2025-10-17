<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Maison Wifi')</title>

    {{-- Liens CSS --}}
    @include('layouts2.links')
</head>

<body class="bg-theme bg-theme-primary">
    <b class="screen-overlay"></b>
    <div class="wrapper">
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

    {{-- Paramètres et modales --}}
    @include('layouts2.parametre')
</body>
</html>
