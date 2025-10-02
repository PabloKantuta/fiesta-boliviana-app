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
        Schema::create('movimientos_activo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activo_id')->constrained('activos')->onDelete('cascade');
            $table->enum('tipo', [
                'alta', 
                'asignacion_alquiler', 
                'devolucion', 
                'reparacion_ingreso', 
                'reparacion_salida', 
                'venta'
            ]);
            $table->dateTime('fecha');
            $table->text('notas')->nullable();
            $table->foreignId('usuario_id')->nullable()->constrained('users'); // Se relaciona con la tabla 'users' de Laravel
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_activo');
    }
};
