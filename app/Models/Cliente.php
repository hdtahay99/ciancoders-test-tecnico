<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable =['nombre_cliente', 'apellido_cliente', 'nit_cliente', 'direccion_cliente',  'estado_cliente'];
    
    public function compras()
    {
        return $this->hasMany('App\Models\Compra', 'id_cliente', 'id');
    }

}
