@extends('base_admin')
@section('content')
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
                            <th>Fecha creación</th>
                            <th>Último acceso</th>
                            <th>Opciones</th>
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
                                <td>{{ $permiso->creado }}</td>
                                <td>{{ isset($permiso->accesos->first()->fecha) ? $permiso->accesos->first()->fecha : '-' }}</td>
                                <td>
                                    <form class="form-inline" action="{{url('permisos/'.$permiso->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button title="Eliminar" type="submit" class="btn btn-xs btn-danger"><i
                                                    class="fa fa-trash"></i>
                                        </button>
                                        <a class="btn btn-xs btn-primary" title="Ver historial"
                                           href="{{url('accesos/'.$permiso->id)}}"><i class="fa fa-list"></i></a>
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
@endsection