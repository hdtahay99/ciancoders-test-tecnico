<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function getCategorias()
    {

        $categorias = Categoria::where('estado_categoria', '=', '1')
                                ->get();

        return ['categorias' => $categorias];

    }
}
