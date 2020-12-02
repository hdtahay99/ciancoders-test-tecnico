@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if($user->imagen_vendedor)
                 <img src="/storage/{{$user->imagen_vendedor}}" class="w-100 rounded-circle" alt="imagen chef">
                @else
                    <img src="/images/avatar.png" class="w-100 rounded-circle" alt="imagen chef">

                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center mb-2 text-primary">{{$user->nombre_vendedor}}, {{$user->apellido_vendedor}}</h2>
                <p class="text-center mb-2 text-primary">{{$user->telefono_vendedor}}</p>
            </div>
        </div>
    </div>

    <h2 class="text-center my-5">Catálogos creados por : {{$user->nombre_vendedor}}, {{$user->apellido_vendedor}}</h2>

    <div class="container">
        <div class="row mx-auto bg-white p-4">
            @if( count($catalogos) > 0)

                @foreach($catalogos as $catalogo)
                    <div class="col-md-4 mb-4">
                        <div className="card shadow">
                            <img className="card-img-top" src="/images/fondo-catalogo.jpg" alt="imagen receta"/>
                            <div className="card-body">
                                <h3 className="card-title">{{ Str::title( $catalogo->nombre_catalogo ) }}</h3>

                                <a href="{{ route('catalogo.show', ['catalogo' => $catalogo->id ])}}"
                                    className="btn btn-primary d-block">Ver
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center w-100">No hay catálogos creados...</p>
            @endif
            
   
        </div>
        <div class="d-flex justify-content-center">
            {{$catalogos->links()}}
        </div>
    </div>

@endsection