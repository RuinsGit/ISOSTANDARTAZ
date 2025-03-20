<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="namespace-it" />
    <meta
      name="description"
      content="RevAuto - Car Dealer & Services Html Template"
    />
    <!-- ======== Page title ============ -->
    <title>@yield('title')</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/img/favicon.svg') }}" />
    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/css/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/css/meanmenu.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/css/color.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/css/main.css') }}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
    @stack('css')
</head>

<body>
    @include('front.includes.header')
    @include('front.includes.navbar')
    @include('front.includes.mobile-navbar')

    @yield('content')

    @include('front.includes.footer')

    <!-- ========== Start JS ========== -->
    @include('front.includes.scripts')
    <!-- ========== End JS ========== -->
</body>

</html>
