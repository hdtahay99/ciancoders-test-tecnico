@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection


@section('content')

    <h1 class="text-center">Editar Mi Perfil</h1>

   <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form
                action="{{ route('users.update', ['user' => $user->id ]) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre_vendedor">Nombre</label>

                    <input type="text"
                        name="nombre_vendedor"
                        class="form-control @error('nombre_vendedor') is-invalid @enderror "
                        id="nombre_vendedor"
                        placeholder="Nombre del vendedor"
                        value="{{ $user->nombre_vendedor }}"
                    >

                    @error('nombre_vendedor')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="apellido_vendedor">Apellido</label>

                    <input type="text"
                        name="apellido_vendedor"
                        class="form-control @error('apellido_vendedor') is-invalid @enderror "
                        id="apellido_vendedor"
                        placeholder="Apellido del vendedor"
                        value="{{ $user->apellido_vendedor }}"
                    >

                    @error('apellido_vendedor')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono_vendedor">Teléfono</label>

                    <input type="text"
                        name="telefono_vendedor"
                        class="form-control @error('telefono_vendedor') is-invalid @enderror "
                        id="telefono_vendedor"
                        placeholder="Teléfono del vendedor"
                        value="{{ $user->telefono_vendedor }}"
                    >

                    @error('telefono_vendedor')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen_vendedor">Imagen de perfil</label>

                    <input 
                        id="imagen_vendedor" 
                        type="file" 
                        class="form-control @error('imagen_vendedor') is-invalid @enderror"
                        name="imagen_vendedor"
                    >

                    @if( $user->imagen_vendedor )
                        <div class="mt-4">
                            <p>Imagen Actual:</p>
                            <img src="/storage/{{$user->imagen_vendedor}}" style="width: 300px">
                        </div>

                        @error('imagen_vendedor')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @else 

                    <div class="mt-4">
                            <p>Avatar predeterminado:</p>
                            <img src="/images/avatar.png" style="width: 300px">
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar Perfil" >
                </div>

            </form>
        </div>
   </div>


@endsection
