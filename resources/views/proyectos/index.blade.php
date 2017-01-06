@extends('base')
@section('content')
    <div class="grid">
        <div class="row">
            @foreach($proyectos as $proyecto)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 masonry-item">
                    <div class="box-masonry"><a href="{{url('proyectos/'. $proyecto->id)}}" title=""
                                                class="box-masonry-image with-hover-overlay with-hover-icon"><img
                                    src="{{asset('img/covers/'.$proyecto->portada)}}"
                                    class="img-responsive"></a>
                        <div class="box-masonry-text">
                            <h4><a href="{{url('proyectos/'.$proyecto->id)}}">{{$proyecto->nombre}}</a></h4>
                            <div class="box-masonry-desription">
                                <p>{{$proyecto->extracto}}</p>
                            </div>
                        </div>
                        @if(isset($permiso) && $permiso->isAdmin)
                            <form action="{{url('proyectos/'.$proyecto->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-danger">
                                        <i class="fa fa-trash"></i> Eliminar entrada
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection