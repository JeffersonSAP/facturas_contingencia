<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('punto_de_venta');
            $table->string('nombre');
            $table->string('nit');
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('vendedor')->nullable();
            $table->date('fecha')->nullable();
            $table->string('archivado')->nullable();
            $table->string('aplicado')->nullable();
            $table->string('nota')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
        Schema::create('productos_vendidos', function (Blueprint $table) {
            $table->id();
            $table->string('id_factura');
            $table->string('codigo_producto');
            $table->string('Nombre_producto')->nullable();
            $table->string('serie')->nullable();
            $table->double('cantidad')->nullable();
            $table->double('precio_unitario')->nullable();
            $table->double('total')->nullable();
            $table->string('archivado')->nullable();
            $table->string('nota')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('id_factura');
            $table->string('tipo_pago')->nullable();
            $table->string('banco')->nullable();
            $table->string('autorizacion')->nullable();
            $table->string('digitos_tarjeta')->nullable();
            $table->string('archivado')->nullable();
            $table->string('nota')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
        Schema::create('punto_de_venta', function (Blueprint $table) {
            $table->id();
            $table->string('correo');
            $table->string('direccion');
            $table->string('nombre_odoo');
            $table->string('nota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
