@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
@endsection

@section('hero')
    <div class="hero-categorias">
        <form class="container h-100" action={{ route('buscar.show') }}>
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Encuentra infinidad de catálogos con los mejores productos del mercado</p>

                    <input
                        type="search"
                        name="buscar"
                        class="form-control"
                        placeholder="Buscar producto"
                    />
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mb-4">Últimos productos</h2>

        <div class="owl-carousel owl-theme">

            @foreach ($nuevas as $nueva)
                <div className="card shadow">
                    <img className="card-img-top" src="/storage/{{$nueva->imagen_producto}}" alt="imagen receta"/>
                    <div className="card-body">
                        <h3 className="card-title">{{ Str::title( $nueva->nombre_producto ) }}</h3>

                        <div className="meta-receta d-flex justify-content-between">

                            <p className="text-primary fecha font-weight-bold">
                                Q {{$nueva->precio_venta}}
                            </p>

                        </div>

                        <a href="#"
                            className="btn btn-primary d-block">Comprar
                        </a>
                    </div>
                </div>
            @endforeach
  
        </div>
    </div>


    @foreach($catalogos as $key => $cat )
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4"> CATÁLOGOS DE {{ str_replace('-', ' ',  $key) }} </h2>
            <div class="row">
                @foreach($cat as $catalogo)
                    <div className="card shadow">
                        <img className="card-img-top" src="/images/fondo-catalogo.jpg" alt="imagen receta"/>
                        <div className="card-body">
                            <h3 className="card-title">{{ Str::title( $catalogo[0]->nombre_catalogo ) }}</h3>

                            <a href="#"
                                className="btn btn-primary d-block">Ver
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @endforeach


@endsection