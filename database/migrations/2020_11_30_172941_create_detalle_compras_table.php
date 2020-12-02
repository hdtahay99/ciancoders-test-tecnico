<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_compra')->references('id')->on('compras');
            $table->foreignId('id_producto')->references('id')->on('productos');

            $table->integer('cantidad_compra_detalle');
            $table->decimal('precio_compra_detalle', 10, 2);
            $table->decimal('subtotal_compra_detalle', 10, 2);
            $table->boolean('estado_compra_detalle')->default(1);


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
        Schema::dropIfExists('detalle_compras');
    }
}
