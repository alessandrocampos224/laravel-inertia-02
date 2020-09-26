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

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/vendors/css/extensions/shepherd-theme-default.css') }}">
    <!-- END: Vendor CSS-->

     <!-- BEGIN: Page CSS-->
     <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/css/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/css/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/css/plugins/tour/tour.css') }}">
    <!-- END: Page CSS-->
     <!-- BEGIN: Custom CSS-->
     <link rel="stylesheet" type="text/css" href="{{ asset('_dist/admin/css/style.css') }}">
    <!-- END: Custom CSS-->
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
    <!-- <link rel="stylesheet" href="{{ asset(mix('_dist/admin/css/pages/authentication/authentication.css')) }}"> -->
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    @call


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('_dist/admin/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('_dist/admin/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('_dist/admin/vendors/js/extensions/tether.min.js') }}"></script>
    <script src="{{ asset('_dist/admin/vendors/js/extensions/shepherd.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('_dist/admin/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('_dist/admin/js/core/app.js') }}"></script>
    <script src="{{ asset('_dist/admin/js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('_dist/admin/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <!-- END: Page JS-->
</body>

</html>
