@extends('base_proyectos')
@section('content')
    <h1 class="text-center">Agregar un nuevo proyecto</h1>
    <form action="{{route('proyectos.update',['id' => $proyecto->id])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group">
            <label for="nombre">Nombre de proyecto</label>
            <input value="{{$proyecto->nombre}}" type="text" class="form-control" id="extracto" name="nombre"
                   placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <label for="extracto">Extracto</label>
            <textarea class="form-control" id="extracto" name="extracto" rows="3"
                      placeholder="Introduce una descripcion del proyecto desarrollado"
                      required>{{$proyecto->extracto}}</textarea>
        </div>
        <div class="form-group">
            <label for="portada">Portada</label>
            <input type="file" name="portada" id="portada">
            <p class="help-block">*La imagen anterior se borrará</p>
        </div>
        <div class="form-group">
            <label for="slider">Slider</label>
            <input type="file" multiple id="slider" name="slider[]">
            <p class="help-block">Las imagenes que irán en el detalle.</p>
        </div>
        <div class="checkbox">
            <label for="conservar_slider">
                <input type="checkbox" id="conservar_slider" name="conservar_slider" value="1">
                ¿Conservar slider anterior?
            </label>
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
            <input value="{{$proyecto->lenguaje}}" class="form-control" type="text" name="lenguaje" id="lenguaje"
                   required>
        </div>
        <div class="form-group">
            <label for="texto_contenido">Contenido</label>
            <textarea name="contenido" id="texto_contenido"></textarea>
        </div>
        <input type="hidden" id="contenido" value="{{$proyecto->contenido}}">
        <input type="hidden" id="prioridad_hidden" value="{{$proyecto->prioridad}}">
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('#texto_contenido').trumbowyg('html', $('#contenido').val());
            $("#prioridad").val($('#prioridad_hidden').val());
        })
    </script>
@stop