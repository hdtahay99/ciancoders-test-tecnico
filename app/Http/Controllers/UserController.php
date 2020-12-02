<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Catalogo;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {

        $catalogos = Catalogo::with('productos')->where('id_usuario', $user->id)->paginate(4);

        return view('users.show', compact('user', 'catalogos'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $data = request()->validate([
            'nombre_vendedor' => 'required',
            'apellido_vendedor' => 'required',
            'telefono_vendedor' => 'required',
        ]);


        auth()->user()->nombre_vendedor    = $data['nombre_vendedor'];
        auth()->user()->apellido_vendedor = $data['apellido_vendedor'];
        if( $request['imagen_vendedor'] ) {
            $ruta_imagen = $request['imagen_vendedor']->store('upload-users', 'public');

            // Resize de la imagen
            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(600, 600 );
            $img->save();

            auth()->user()->imagen_vendedor = $ruta_imagen;

        } 

        auth()->user()->save();

        unset($data['nombre_vendedor']);
        unset($data['apellid_vendedor']);
        unset($data['telefono_vendedor']);

        return redirect()->route('inven');



    }

}
