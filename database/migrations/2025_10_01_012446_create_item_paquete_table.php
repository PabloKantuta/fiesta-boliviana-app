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
        Schema::create('item_paquete', function (Blueprint $table) {
            $table->id();

            // Relación con la tabla 'paquetes'
            $table->foreignId('paquete_id')->constrained('paquetes')->onDelete('cascade');

            // Relación con la tabla 'items'
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');

            $table->integer('cantidad_por_paquete');
            $table->json('especificaciones_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_paquete');
    }
};
