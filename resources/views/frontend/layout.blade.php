<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/d-logo.png">


    <title>{{ config('app.name') }}</title>
    <!-- vendor css -->
    <link href="/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/loading.css">


    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/assets/css/dashforge.css">
    <link rel="stylesheet" href="/css/propios.css">
    <link rel="stylesheet" href="/css/input-material.css">

    {{-- Custom css --}}
    <link href="/css/custom.css" rel="stylesheet" type="text/css" />
    <script>
        window.lang = '{{ session('language') }}'
    </script>

</head>

<body class="mn-ht-100v d-flex flex-column">
    <div id="app">
        <!--=====================================
    HEADER QUE CONTIENE EL MENU, NOTIFICACIONES Y EL AVATAR DEL PERFIL
    ======================================-->
        @include('frontend.partials.navigation-header')
        <!--=====================================
	HEADER O TITULO DE LA SECCIÓN
======================================-->
        @yield('header')
        <div class="content content-fixed" style="margin-top:0rem !important;">
            <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
                <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                    <div>
                        <!--=====================================
                        MIGAS DE PAN
                    ======================================-->
                        @yield('breadcrumb')
                    </div>
                </div>
                <!--=====================================
		            CONTENIDO PRINCIPAL
                ======================================-->
                @yield('content')
            </div><!-- container -->
        </div><!-- content -->
    </div>
    <footer class="footer mg-t-auto">
        <div>
            <span>© {{ date('Y') }} {{ config('app.name') }} All rights reserved. </span>
            <span>Created by <a target="_blank" href="http://bmotion.co">Bmotion SAS</a></span>
        </div>
        <div>
            <nav class="nav">
                <a href="#" class="nav-link">Licenses</a>
                <a href="#" class="nav-link">Change Log</a>
                <a href="#" class="nav-link">Get Help</a>
            </nav>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/feather-icons/feather.min.js"></script>
    <script src="/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/dashforge.js"></script>
    <script src="/js/materialize-inputs.jquery.js"></script>
    <script src="/js/mode-dark.js"></script>
    <script src="/js/loading.js"></script>
    @stack('js')


</body>

</html>
