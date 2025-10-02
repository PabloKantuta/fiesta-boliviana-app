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
        Schema::create('orden_logistica_paradas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_logistica_id')->constrained('ordenes_logistica')->onDelete('cascade');
            $table->integer('secuencia')->nullable();
            $table->enum('tipo', ['entrega', 'retiro', 'devolucion']);
            $table->foreignId('ciudad_id')->nullable()->constrained('ciudades');
            $table->foreignId('direccion_id')->nullable()->constrained('direcciones');
            $table->string('contacto_nombre')->nullable();
            $table->string('contacto_telefono', 50)->nullable();
            $table->dateTime('ventana_inicio')->nullable();
            $table->dateTime('ventana_fin')->nullable();
            $table->enum('estado', ['pendiente', 'en_progreso', 'entregado', 'fallida', 'reprogramada'])->default('pendiente');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_logistica_paradas');
    }
};
