<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cat = Categoria::create([
            'nombre_categoria' => 'Ropa',
            'estado_categoria' => '1',
        ]);

        $cat->create();


        
        $cat1 = Categoria::create([
            'nombre_categoria' => 'Calzado',
            'estado_categoria' => '1',
        ]);

        $cat1->create();


        
        $cat2 = Categoria::create([
            'nombre_categoria' => 'Celulares',
            'estado_categoria' => '1',
        ]);

        $cat2->create();

    }
}
