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
        Schema::create('historial_transaccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ci_cliente');
            $table->unsignedSmallInteger('monto');
            $table->timestamp('fecha_transaccion')->default(now());
            $table->text('descripcion')->nullable();
            $table->date('periodo_inicio');
            $table->date('periodo_fin');
            $table->string('membresia_adquirida', 50);
            $table->unsignedBigInteger('cod_pago');
            $table->unsignedBigInteger('id_promocion')->nullable();

            $table->foreign('ci_cliente')->references('id')->on('users');
            $table->foreign('cod_pago')->references('id')->on('tipo_pagos');
            $table->foreign('id_promocion')->references('id')->on('promocions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_transaccions');
    }
};