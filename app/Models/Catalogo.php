<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $fillable =['id_usuario', 'nombre_catalogo', 'estado_catalogo'];


    public function user(){
        return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }

    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'id_catalogo', 'id');
    }

}
