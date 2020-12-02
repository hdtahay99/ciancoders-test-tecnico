<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable =['id_categoria', 'id_catalogo', 'nombre_producto', 'imagen_producto', 'precio_venta', 'precio_compra', 'estado_producto'];

    public function catalogo(){
        return $this->belongsTo('App\Models\Catalogo', 'id_catalogo', 'id');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria', 'id_categoria', 'id');
    }

}
