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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_categoria_id')->constrained('servicio_categorias');
            $table->string('nombre');
            $table->enum('unidad_cobro', ['unitario', 'hora', 'km', 'paquete']);
            $table->boolean('requiere_agendamiento')->default(false);
            $table->boolean('es_externo')->default(false);
            $table->json('metadatos')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
