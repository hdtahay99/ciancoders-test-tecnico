@extends ('layouts.app')



@section('content')


    <article class="contenido-receta bg-white p-5 shadow">
        <h1 class="text-center mb-4">{{$catalogo[0]->nombre_catalogo}}</h1>


        <div class="row">
            @foreach ($catalogo[0]->productos as $producto)
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

    </article>
@endsection