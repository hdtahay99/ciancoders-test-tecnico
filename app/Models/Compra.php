<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable =['id_cliente', 'no_compra', 'fecha_compra', 'total_compra',  'estado_compra'];


    public function cliente(){
        return $this->belongsTo('App\Models\Cliente', 'id_cliente', 'id');
    }

    public function detallecompras()
    {
        return $this->hasMany('App\Models\CompraDetalle', 'id_compra', 'id');
    }


}
