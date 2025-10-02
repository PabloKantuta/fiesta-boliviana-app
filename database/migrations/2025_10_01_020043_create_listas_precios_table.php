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
        Schema::create('listas_precios', function (Blueprint $table) {
           $table->id();
            $table->string('nombre');
            $table->enum('moneda', ['BOB'])->default('BOB');
            $table->boolean('activa')->default(true);
            $table->integer('prioridad')->default(0);
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listas_precios');
    }
};
