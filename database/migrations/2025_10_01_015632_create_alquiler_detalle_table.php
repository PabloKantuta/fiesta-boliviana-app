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
        Schema::create('alquiler_detalle', function (Blueprint $table) {
             $table->id();
            $table->foreignId('alquiler_id')->constrained('alquileres')->onDelete('cascade');
            $table->foreignId('paquete_id')->constrained('paquetes');
            $table->integer('cantidad_paquetes')->default(1);
            $table->decimal('precio_bidiario_unit', 10, 2);
            $table->integer('num_bloques_contratados');
            $table->decimal('subtotal_contrato', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquiler_detalle');
    }
};
