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
        Schema::create('lista_precio_paquetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lista_precio_id')->constrained('listas_precios')->onDelete('cascade');
            $table->foreignId('paquete_id')->constrained('paquetes');
            $table->enum('modalidad', ['venta', 'alquiler_bidiario']);
            $table->decimal('precio_base', 10, 2);
            $table->decimal('precio_minimo', 10, 2)->nullable();
            $table->integer('cantidad_minima')->nullable();
            $table->foreignId('ciudad_id')->nullable()->constrained('ciudades');
            $table->string('canal', 100)->nullable();
            $table->string('segmento_cliente', 100)->nullable();
            $table->enum('temporada', ['alta', 'media', 'baja'])->nullable();
            $table->integer('prioridad')->nullable();
            $table->json('reglas_inventario_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_precio_paquetes');
    }
};
