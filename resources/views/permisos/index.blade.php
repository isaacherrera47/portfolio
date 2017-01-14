@extends('base_permisos')
@section('title') <title>Verifica tu acceso </title> @stop
@section('content')
    <h1 class="text-center">Verifica con tu correo</h1>
    <p>Al parecer, aún no tienes acceso a mi portafolio. Si ya tienes un acceso, por favor introduce tu email aquí
        debajo.</p>
    <form action="{{url('permisos/check')}}" method="post">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu correo aquí"
                   required>
        </div>
        <button type="submit" class="btn btn-success">Revisar</button>
        {{csrf_field()}}
    </form>
    <p><b>Si requieres de un acceso, por favor mándame un correo a esta dirección <i><a
                        href="mailto:isaacherrera47@gmail.com">isaacherrera47@gmail.com</a></i></b></p>
    @if( isset($error))
        <div class="alert alert-danger" role="alert">Aún no tienes permisos para ver este sitio :( solicítalos.</div>
    @endif
@stop