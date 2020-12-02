<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_venta')->references('id')->on('ventas');
            $table->foreignId('id_producto')->references('id')->on('productos');

            $table->integer('cantidad_venta_detalle');
            $table->decimal('precio_venta_detalle', 10, 2);
            $table->decimal('subtotal_venta_detalle', 10, 2);
            $table->boolean('estado_venta_detalle')->default(1);

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
        Schema::dropIfExists('detalle_ventas');
    }
}
