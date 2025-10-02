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
        Schema::create('orden_servicio_detalles', function (Blueprint $table) {
            $table->id();

            // Relación polimórfica que puede apuntar a 'alquileres' o 'ventas'
            $table->morphs('origen');

            $table->foreignId('servicio_id')->constrained('servicios');
            $table->foreignId('orden_logistica_parada_id')->nullable()->constrained('orden_logistica_paradas');
            $table->integer('cantidad')->nullable();
            $table->decimal('horas', 10, 2)->nullable();
            $table->decimal('km', 10, 2)->nullable();
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('descuento_pct', 5, 2)->default(0);
            $table->decimal('impuesto_pct', 5, 2)->default(0);
            $table->decimal('subtotal', 10, 2);
            $table->json('metadatos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_servicio_detalles');
    }
};
