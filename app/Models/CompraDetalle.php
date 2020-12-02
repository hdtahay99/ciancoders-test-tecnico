<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraDetalle extends Model
{
    use HasFactory;

    protected $fillable =['id_compra', 'id_producto', 'cantidad_compra_detalle', 'precio_compra_detalle', 'subtotal_compra_detalle', 'estado_compra_detalle'];


    public function compra(){
        return $this->belongsTo('App\Models\Compra', 'id_compra', 'id');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Producto', 'id_producto', 'id');
    }
}
