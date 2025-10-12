<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
   @include('layouts2.links')

    <title>@yield('title', 'Mon Application Laravel')</title>
</head>

<body>
<div class="wrapper">
    {{-- Header / Navbar --}}
    @include('layouts2.header')

    {{-- Sidebar (si besoin) --}}
    @include('layouts2.sidebar')

   
    {{-- Contenu principal --}}

        @yield('content')
</div>

    {{-- Footer --}}
    @include('layouts2.footer')

    {{-- Scripts --}}
    @include('layouts2.scripts')


</body>
</html>
