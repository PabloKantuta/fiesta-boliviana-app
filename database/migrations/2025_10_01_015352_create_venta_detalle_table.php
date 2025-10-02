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
        Schema::create('venta_detalle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->constrained('ventas')->onDelete('cascade');

            // Un item de venta puede ser un activo específico, un tipo de item o un paquete completo
            $table->foreignId('activo_id')->nullable()->constrained('activos');
            $table->foreignId('item_id')->nullable()->constrained('items');
            $table->foreignId('paquete_id')->nullable()->constrained('paquetes');

            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('descuento_pct', 5, 2)->default(0);
            $table->decimal('impuesto_pct', 5, 2)->default(0);
            $table->decimal('subtotal', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_detalle');
    }
};
