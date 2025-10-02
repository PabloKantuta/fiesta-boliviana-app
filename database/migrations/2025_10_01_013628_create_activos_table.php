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
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items');
            $table->foreignId('fabricacion_id')->nullable()->constrained('fabricaciones');
            $table->foreignId('paquete_base_id')->nullable()->constrained('paquetes');
            $table->string('codigo_interno')->unique()->nullable();
            $table->enum('estado', ['disponible', 'alquilado', 'en_reparacion', 'vendido'])->default('disponible');
            $table->string('ubicacion_actual')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activos');
    }
};
