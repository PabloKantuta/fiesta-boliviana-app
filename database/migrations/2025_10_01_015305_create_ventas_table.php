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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->date('fecha');
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('descuento_total', 10, 2)->default(0);
            $table->decimal('impuesto_total', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->enum('moneda', ['BOB'])->default('BOB');
            $table->boolean('pagado')->default(false);
            $table->boolean('transporte_incluido')->default(false);
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
