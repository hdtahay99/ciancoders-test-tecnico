<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Catalogo;
use Illuminate\Support\Str;


class InicioController extends Controller
{
    public function index()
    {

        $nuevas = Producto::where('estado_producto', '=', '1')
                            ->latest()->take(6)->get();


        $categorias = Categoria::with('productos')
                                ->whereHas('productos')
                                ->get();

        $catalogos = [];

        foreach($categorias as $categoria) {
            $id = $categoria->id;
            $catalogos[ Str::slug( $categoria->nombre_categoria ) ][] = Catalogo::with(['productos' => function($query) use($id){
                                                                            $query->where('id_categoria', '=', $id);
                                                                        }])
                                                                        ->whereHas('productos', function($query) use($id) {
                                                                            $query->where('id_categoria', '=', $id);
                                                                        })
                                                                        ->where('estado_catalogo', '=', '1')
                                                                        ->get();
        }
                        

        return view('inicio.index',  compact('nuevas', 'catalogos'));
    }

    public function feova()
    {
        $categorias = Categoria::with('productos')
                                ->whereHas('productos')
                                ->get();

        $catalogos = [];

        foreach($categorias as $categoria) {
            $id = $categoria->id;
            $catalogos[ Str::slug( $categoria->nombre_categoria ) ][] = Catalogo::with(['productos' => function($query) use($id){
                                                                            $query->where('id_categoria', '=', $id);
                                                                        }])
                                                                        ->whereHas('productos', function($query) use($id) {
                                                                            $query->where('id_categoria', '=', $id);
                                                                        })
                                                                        ->where('estado_catalogo', '=', '1')
                                                                        ->get();
        }

        return [$categorias, $catalogos];
    }
}
