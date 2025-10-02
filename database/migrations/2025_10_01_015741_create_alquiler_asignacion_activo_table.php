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
        Schema::create('alquiler_asignacion_activo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alquiler_id')->constrained('alquileres')->onDelete('cascade');
            $table->foreignId('activo_id')->constrained('activos');
            $table->date('rango_inicio')->nullable();
            $table->date('rango_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquiler_asignacion_activo');
    }
};
