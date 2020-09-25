<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
       @routes
    <!-- Scripts -->
    <script src="{{ asset('_dist/admin/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    {{-- Theme Styles --}}
    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/bootstrap.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/bootstrap-extended.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/colors.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/components.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/themes/dark-layout.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/themes/semi-dark-layout.css')) }}">

    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/core/menu/menu-types/vertical-menu.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/core/colors/palette-gradient.css')) }}">

    {{-- Layout Styles works when don't use customizer --}}

    {{-- Page Styles --}}
    {{-- Laravel Style --}}
    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/custom-rtl.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/pages/authentication/authentication.css')) }}">
</head>
<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page">
    @call
</body>
</html>
