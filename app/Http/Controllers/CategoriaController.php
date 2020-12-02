<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('categorias.index');

    }

    public function create()
    {
        return view('categorias.create');
    }

    public function getCategorias()
    {

        $categorias = Categoria::where('estado_categoria', '=', '1')
                                ->get();

        return ['categorias' => $categorias];

    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

                $categoria                   = new Categoria();
                $categoria->nombre_categoria = $request->nombre_categoria;
                $categoria->estado_categoria = '1';
                $categoria->save();

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }


    public function update(Request $request, Categoria $categoria)
    {
        $categoria = Categoria::findOrfail($request->id);
        $categoria->estado_categoria = '0';
        $categoria->save();
    }
}
