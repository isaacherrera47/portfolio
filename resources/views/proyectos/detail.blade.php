@extends('base')
@section('title') {{$proyecto->nombre}} @endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="content-column-content">
                <h1>{{$proyecto->nombre}}</h1>
                <p class="lead">{{$proyecto->extracto}}</p>
                <div id="main-slider">
                    @foreach($imagenes as $imagen)
                        <div class="item"><img src="{{asset('img/slider/'.$proyecto->id.'/'.$imagen)}}"
                                               class="img-responsive"></div>
                    @endforeach
                </div>
                {!! $proyecto->contenido !!}
            </div>
        </div>
    </div>
@endsection