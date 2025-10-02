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
        Schema::create('fabricaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paquete_id')->constrained('paquetes');
            $table->foreignId('responsable_id')->constrained('personal');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->json('especificaciones_lote_json')->nullable();
            $table->enum('estado', ['en_proceso', 'finalizada'])->default('en_proceso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fabricaciones');
    }
};
