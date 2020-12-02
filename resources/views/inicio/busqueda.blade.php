@extends('layouts.app')


@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
            Resultados Búsqueda: {{ $busqueda }}
        </h2>

        <div class="row">
            @foreach ($productos as $producto)
                <div className="card shadow">
                    <img className="card-img-top" src="/storage/{{$producto->imagen_producto}}" alt="imagen receta"/>
                    <div className="card-body">
                        <h3 className="card-title">{{ Str::title( $producto->nombre_producto ) }}</h3>

                        <div className="meta-receta d-flex justify-content-between">

                            <p className="text-primary fecha font-weight-bold">
                                Q {{$producto->precio_venta}}
                            </p>

                        </div>

                        <a href="#"
                            className="btn btn-primary d-block">Comprar
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $productos->links() }}
        </div>
    </div>

@endsection