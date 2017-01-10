<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@section('title') Bienvenido a mi portafolio @show</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.blue.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div id="all">
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <!--   *** SIDEBAR ***-->
            <div id="sidebar" class="col-xs-6 col-sm-4 col-md-3 sidebar-offcanvas">
                <div class="sidebar-content">
                    <h1 class="sidebar-heading"><a href="{{url('/')}}">Isaac Herrera</a></h1>
                    <p class="sidebar-p">Artesano de software especializado en entorno web. <b>UI Designer</b> <br>
                        Originario de Coatzacoalcos,Veracruz. Actualmente en Mexicali.</p>
                    <p class="sidebar-p">EDAD: 22 años. <br>ESTATURA: 1.85m <br> PESO: 88kg</p>
                    <ul class="sidebar-menu">
                        <li class="active"><a href="{{url('/')}}">Portafolio</a></li>
                        @if(isset($permiso) && $permiso->isAdmin)
                            <li><a href="{{url('permisos/create')}}">Agregar un permiso</a></li>
                            <li><a href="{{url('proyectos/create')}}">Agregar un proyecto</a></li>
                        @endif
                    </ul>
                    <p class="social"><a href="mailto:isaacherrera47@gmail.com" data-animate-hover="pulse"
                                         class="email"><i class="fa fa-envelope"></i></a><a
                                href="http://manicbox.com.mx" target="_blank"><i class="fa fa-chrome"></i></a></p>
                    <div class="copyright">
                        <p class="credit">Desarrollado con Laravel 5.2 y Bootstrap 3</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 content-column">
                <div class="small-navbar visible-xs">
                    <button type="button" data-toggle="offcanvas" class="btn btn-ghost pull-left"><i
                                class="fa fa-align-left"> </i>Menu
                    </button>
                    <h1 class="small-navbar-heading"><a href="{{url('/')}}">Isaac Herrera</a></h1>
                </div>
                @section('content')
                @show
            </div>
        </div>
    </div>
</div>
<!-- Javascript files-->
<script src="{{asset('js/jquery-old.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/ekko-lightbox.js')}}"></script>
<script src="{{asset('js/jquery.cookie.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/front.js')}}"></script>
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X');
    ga('send', 'pageview');
</script>
</body>
</html>