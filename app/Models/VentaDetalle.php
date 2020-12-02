<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    use HasFactory;

    protected $fillable =['id_venta', 'id_producto', 'cantidad_venta_detalle', 'precio_venta_detalle', 'subtotal_venta_detalle', 'estado_venta_detalle'];


    public function venta(){
        return $this->belongsTo('App\Models\Venta', 'id_venta', 'id');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Producto', 'id_producto', 'id');
    }
}
