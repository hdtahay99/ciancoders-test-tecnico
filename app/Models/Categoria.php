<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable =['nombre_categoria', 'estado_categoria'];


    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'id_categoria', 'id');
    }

}
