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
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div id="all">
    <div class="container center-block">
        <div class="row">
            <h1 class="text-center">Agregar un acceso al portafolio</h1>
            <form action="{{url('permisos/')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="Introduce tu correo aquí"
                           required>
                </div>
                <div class="checkbox">
                    <label for="isAdmin">
                        <input type="checkbox" id="isAdmin" name="isAdmin" value="1"> Administrador
                    </label>
                </div>
                <button type="submit" class="btn btn-success">Agregar</button>
            </form>
        </div>
        @if( isset($error) || session()->has('data'))
            <br>
            <div class="alert alert-danger" role="alert">Este usuario ya ha sido agregado</div>
        @endif
        @if(isset($permisos))
            <div class="row">
                <br>
                <div class="col-xs-12">
                    <h2> Lista de agregados</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Es administrador?</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permisos as $permiso)
                                <tr>
                                    <td>{{$permiso->email}}</td>
                                    <td>
                                        @if($permiso->isAdmin == 0)
                                            <i class="fa fa-close"></i>
                                        @else
                                            <i class="fa fa-check"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{url('permisos/'.$permiso->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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