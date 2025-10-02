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
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id(); // Crea el campo 'id' BIGINT PRIMARY KEY AUTO_INCREMENT
            $table->string('nombre');
            $table->string('estilo', 100)->nullable();
            $table->integer('capacidad')->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps(); // Crea 'created_at' y 'updated_at'
            $table->softDeletes(); // Crea 'deleted_at' para borrado suave
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};