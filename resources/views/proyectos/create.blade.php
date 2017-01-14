@extends('base_proyectos')
@section('content')
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
@stop