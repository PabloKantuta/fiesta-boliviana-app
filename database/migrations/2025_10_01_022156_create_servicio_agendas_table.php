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
        Schema::create('servicio_agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->constrained('servicios');
            $table->morphs('origen'); // Relación polimórfica con Alquiler o Venta
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->enum('estado', ['planificado', 'en_ejecucion', 'completado', 'cancelado'])->default('planificado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_agendas');
    }
};
