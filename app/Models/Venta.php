<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;


    protected $fillable =['id_usuario', 'id_producto', 'no_venta', 'fecha_venta', 'total_venta',  'estado_venta'];


    public function user(){
        return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }

    public function detalleventas()
    {
        return $this->hasMany('App\Models\VentaDetalle', 'id_venta', 'id');
    }
}
