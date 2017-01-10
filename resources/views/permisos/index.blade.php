<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crear un nuevo proyecto</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.blue.css')}}" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div id="all">
    <div class="container center-block">
        <h1 class="text-center">Verifica con tu correo</h1>
        <p>Al parecer, aún no tienes acceso a mi portafolio. Si ya tienes un acceso, por favor introduce tu email aquí debajo.</p>
        <form action="{{url('permisos/check')}}" method="post" >
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu correo aquí" required>
            </div>
            <button type="submit" class="btn btn-success">Revisar</button>
            {{csrf_field()}}
        </form>
        <p><b>Si requieres de un acceso, por favor mándame un correo a esta dirección <i><a href="mailto:isaacherrera47@gmail.com">isaacherrera47@gmail.com</a></i></b></p>
        @if( isset($error))
            <div class="alert alert-danger" role="alert">Aún no tienes permisos para ver este sitio :( solicítalos.</div>
        @endif
    </div>
</div>
<!-- Javascript files-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
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