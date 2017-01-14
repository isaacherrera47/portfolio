@extends('base_permisos')
@section('title') <title>Resumen de accesos</title> @stop
@section('content')
    <div class="page-header">
        <h1>Resumen de accesos
            <small>{{$permiso->email}}</small>
        </h1>
    </div>
    <table class="table table-responsive table-bordered">
        <thead>
        <tr>
            <th class="text-center">Fecha de acceso</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permiso->accesos as $acceso)
            <tr>
                <td class="text-center"><h5>{{date('l j M - g:i:s a',strtotime($acceso->fecha))}}</h5></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop