<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_categoria')->references('id')->on('categorias');
            $table->foreignId('id_catalogo')->references('id')->on('catalogos');

            $table->string('nombre_producto', 100);
            $table->string('imagen_producto');
            $table->integer('stock_producto');
            $table->decimal('precio_venta', 10, 2);
            $table->decimal('precio_compra', 10, 2);
            $table->boolean('estado_producto')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
