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
        Schema::create('logistica_tarifas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ciudad_origen_id')->constrained('ciudades');
            $table->foreignId('ciudad_destino_id')->constrained('ciudades');
            $table->integer('km_aprox')->nullable();
            $table->decimal('tarifa_base', 10, 2)->default(0);
            $table->decimal('tarifa_por_km', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistica_tarifas');
    }
};
