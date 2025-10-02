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
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->date('fecha_contrato');
            $table->date('fecha_entrega_prevista');
            $table->date('fecha_devolucion_prevista');
            $table->string('ciudad', 100)->nullable();
            $table->text('direccion_evento')->nullable();
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('descuento_total', 10, 2)->default(0);
            $table->decimal('impuesto_total', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->boolean('pagado')->default(false);
            $table->boolean('transporte_incluido')->default(false);
            $table->enum('estado', ['reservado', 'entregado', 'devuelto', 'en_mora', 'cancelado'])->default('reservado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquileres');
    }
};
