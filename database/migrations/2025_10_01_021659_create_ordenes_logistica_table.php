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
        Schema::create('ordenes_logistica', function (Blueprint $table) {
            $table->id();

            // Esta es una relación "polimórfica": una orden puede pertenecer a un alquiler o a una venta.
            // En Laravel, esto se maneja con dos columnas.
            $table->string('origen_type'); // Guardará el modelo (ej. 'App\Models\Alquiler')
            $table->unsignedBigInteger('origen_id'); // Guardará el ID del alquiler o venta

            $table->date('fecha_programada');
            $table->enum('estado', ['planificada', 'en_ruta', 'completada', 'cancelada'])->default('planificada');
            $table->foreignId('transportista_id')->nullable()->constrained('transportistas');
            $table->foreignId('vehiculo_id')->nullable()->constrained('vehiculos');
            $table->text('notas')->nullable();
            $table->timestamps();

            // Se añade un índice para optimizar las búsquedas de la relación polimórfica
            $table->index(['origen_type', 'origen_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_logistica');
    }
};
