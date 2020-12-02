<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'nombre_vendedor',
        'apellido_vendedor',
        'telefono_vendedor',
        'imagen_vendedor',
        'estado_vendedor'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password_vendedor',
        'remember_token',
    ];


    public function catalogos()
    {
        return $this->hasMany('App\Models\Catalogo', 'id_catalogo', 'id');
    }

}
