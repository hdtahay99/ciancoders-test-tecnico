<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Models\Catalogo;
use App\Models\Producto;
use App\Models\User;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search', 'ver']]);
    }

    public function index()
    {

        return view('catalogos.index');
    }

    public function getCatalogos()
    {
        $catalogos = Catalogo::where('estado_catalogo', '=', '1')
                            ->where('id_usuario', '=', Auth::user()->id)
                            ->orderBy('id', 'desc')
                            ->get();

        return ['catalogos' => $catalogos];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // try {
        //     DB::beginTransaction();

                $catalogo = new Catalogo();

                $catalogo->id_usuario      = Auth::user()->id;
                $catalogo->nombre_catalogo = $request->nombre_catalogo;
                $catalogo->estado_catalogo = '1';
                $catalogo->save();
        
        
                $productos = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $request->productos), true);
        
                foreach ($productos as $key => $valor) {
                    $imagen = $request["image{$key}"];
                    
                    $producto = new Producto();
                    $producto->id_categoria    = $valor['id_categoria'];
                    $producto->id_catalogo     = $catalogo->id;
                    $producto->nombre_producto = $valor['nombre_producto'];
                    $ruta = $imagen->store('upload-productos', 'public');
                    $img = Image::make( public_path("storage/{$ruta}"))->fit(300, 200);
                    $img->save();
                    $producto->imagen_producto = $ruta;
                    $producto->stock_producto  = $valor['stock_producto'];
                    $producto->precio_venta    = $valor['precio_venta'];
                    $producto->precio_compra   = $valor['precio_compra'];
                    $producto->estado_producto = '1';
                    $producto->save();
        
                }

        //     DB::commit();
        //     return 'ok';

        // } catch (\Throwable $th) {
        //     DB::rollBack();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $catalogos = Catalogo::with('productos')
                            ->where('id', '=', $request->id)
                            ->where('estado_catalogo', '=', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        return ['catalogos' => $catalogos];        
    }

    public function ver(Catalogo $catalogo)
    {

        $catalogo = Catalogo::with('productos.categoria')
                        ->where('id', '=', $catalogo->id)
                        ->get();
        // Obtener si el usuario actual le gusta la receta y esta autenticado


        return view('catalogos.ver', compact('catalogo'));       
    }

    public function search(Request $request)
    {
        $busqueda = $request->get('buscar');

        $productos = Producto::with('catalogo')
                             ->where('nombre_producto', 'like', '%' . $busqueda . '%')
                             ->where('estado_producto', '=', '1')                    
                             ->paginate(10);
        $productos->appends(['buscar' => $busqueda]);

        return view('inicio.busqueda', compact('productos', 'busqueda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogo $catalogo)
    {

        $this->authorize('update', $catalogo);


        $catalogo = Catalogo::findOrfail($request->id);
        $catalogo->estado_catalogo = '0';
        $catalogo->save();

        $productos = Producto::where('id_catalogo', '=', $request->id)
                            ->get();
        
        foreach ($productos as $prod) {
            $producto = Producto::findOrfail($prod['id']);
            $producto->estado_producto = '0';
            $producto->save();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
