<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
   @include('layouts2.links')

    <title>@yield('title', 'Mon Application Laravel')</title>
</head>

<body class="bg-theme bg-theme1">	<b class="screen-overlay"></b>
<div class="wrapper">
    {{-- Header / Navbar --}}
    @include('layouts2.header')

    {{-- Sidebar (si besoin) --}}
    @include('layouts2.sidebar')


    {{-- Contenu principal --}}

        @yield('content')


        {{-- Footer --}}
    @include('layouts2.footer')

  
</div>



    {{-- Scripts --}}
    @include('layouts2.scripts')

@include('layouts2.parametre')
</body>
</html>
