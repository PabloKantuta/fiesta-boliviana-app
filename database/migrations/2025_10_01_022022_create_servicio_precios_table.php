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
    Schema::create('servicio_precios', function (Blueprint $table) {
        $table->id();
        $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade');
        $table->enum('modalidad', ['venta', 'alquiler', 'logistica'])->nullable();
        $table->decimal('precio_base', 10, 2)->nullable();
        $table->decimal('precio_variable_por_km', 10, 2)->nullable();
        $table->decimal('precio_variable_por_hora', 10, 2)->nullable();
        $table->enum('temporada', ['alta', 'media', 'baja'])->nullable();
        $table->foreignId('ciudad_origen_id')->nullable()->constrained('ciudades');
        $table->foreignId('ciudad_destino_id')->nullable()->constrained('ciudades');
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_precios');
    }
};
