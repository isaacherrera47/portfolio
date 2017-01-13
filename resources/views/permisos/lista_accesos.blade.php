@extends('base_admin')
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
                <td class="text-center"><h4>{{date('l j, Y - g:i:s a',strtotime($acceso->fecha))}}</h4></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop