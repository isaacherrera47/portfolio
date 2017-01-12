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
    <link rel="stylesheet" href="{{asset('trumbowyg/ui/trumbowyg.min.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div id="all">
    <div class="container">
        <h1 class="text-center">Agregar un nuevo proyecto</h1>
        <form action="{{url('proyectos/')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="nombre">Nombre de proyecto</label>
                <input type="text" class="form-control" id="extracto" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="extracto">Extracto</label>
                <textarea class="form-control" id="extracto" name="extracto" rows="3"
                          placeholder="Introduce una descripcion del proyecto desarrollado" required></textarea>
            </div>
            <div class="form-group">
                <label for="portada">Portada</label>
                <input type="file" name="portada" id="portada" required>
                <p class="help-block">La imagen que irá en el index</p>
            </div>
            <div class="form-group">
                <label for="slider">Slider</label>
                <input type="file" multiple id="slider" name="slider[]" required>
                <p class="help-block">Las imagenes que irán en el detalle.</p>
            </div>
            <div class="form-group">
                <label for="prioridad">Prioridad</label>
                <select class="form-control" name="prioridad" id="prioridad">
                    <option value="1">Baja</option>
                    <option value="2">Media baja</option>
                    <option selected value="3">Media</option>
                    <option value="4">Importante</option>
                    <option value="5">Ver primero</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lenguaje">Lenguaje de programación</label>
                <input class="form-control" type="text" name="lenguaje" id="lenguaje" required>
            </div>
            <div class="form-group">
                <label for="texto_contenido">Contenido</label>
                <textarea name="contenido" id="texto_contenido"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>
<!-- Javascript files-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('trumbowyg/trumbowyg.min.js')}}"></script>
<script src="{{asset('trumbowyg/langs/es.min.js')}}"></script>
<script>
    $('#texto_contenido').trumbowyg({
        lang: 'es'
    });
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