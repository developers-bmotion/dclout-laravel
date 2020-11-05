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
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

    <title>{{ config('app.name') }}</title>

    <!-- vendor css -->
    <link href="/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/assets/css/dashforge.css">
    <link rel="stylesheet" href="/css/propios.css">


</head>
<body class="mn-ht-100v d-flex flex-column">

<!--=====================================
HEADER QUE CONTIENE EL MENU, NOTIFICACIONES Y EL AVATAR DEL PERFIL
======================================-->
@include('backend.partials.navigation-header')
<!--=====================================
	HEADER O TITULO DE LA SECCIÓN
======================================-->
@yield('header')
<div class="content content-fixed">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <!--=====================================
		            MIGAS DE PAN
                ======================================-->
                @yield('breadcrumb')
                <!--=====================================
		            CONTENIDO PRINCIPAL
                ======================================-->
                @yield('content')
            </div>
        </div>

    </div><!-- container -->
</div><!-- content -->

<footer class="footer mg-t-auto">
    <div>
        <span>&copy; 2019 DashForge v1.0.0. </span>
        <span>Created by <a href="http://themepixels.me">ThemePixels</a></span>
    </div>
    <div>
        <nav class="nav">
            <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
            <a href="../../change-log.html" class="nav-link">Change Log</a>
            <a href="https://discordapp.com/invite/RYqkVuw" class="nav-link">Get Help</a>
        </nav>
    </div>
</footer>

<script src="/lib/jquery/jquery.min.js"></script>
<script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/lib/feather-icons/feather.min.js"></script>
<script src="/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>


<script src="/assets/js/dashforge.js"></script>
<script>

    $(function () {
        var getLocalStorage = localStorage.getItem("storeTypeTheme")

        if (getLocalStorage == 1) {
            $("#customSwitch3").prop('checked', true);
            $('#header-title').removeClass('header-background')
            $('#header-title').addClass('bd-b')
            document.head.insertAdjacentHTML("beforeend", `<link id="themeStyle" rel="stylesheet" href="/assets/css/skin.dark.css">`)
        }else {
            $("#customSwitch3").prop('checked', false);
            $('#header-title').addClass('header-background');
            $('#header-title').removeClass('bd-b');
            $('#themeStyle').remove()
        }
    })

    var storeTipoProyecto = "storeTypeTheme";
    $('#customSwitch3').on('click', function () {
        if ($(this).is(':checked')) {

            $('#header-title').removeClass('header-background')
            $('#header-title').addClass('bd-b')
            // Hacer algo si el checkbox ha sido seleccionado
            localStorage.setItem("storeTypeTheme", 1)

            document.head.insertAdjacentHTML("beforeend", `<link id="themeStyle" rel="stylesheet" href="/assets/css/skin.dark.css">`)
        } else {
            $('#header-title').addClass('header-background');
            $('#header-title').removeClass('bd-b');
            localStorage.setItem("storeTypeTheme", 0)
            $('#themeStyle').remove()
        }
    });
</script>
</body>
</html>
