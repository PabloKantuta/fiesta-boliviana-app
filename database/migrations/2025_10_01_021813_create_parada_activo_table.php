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
        Schema::create('parada_activo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parada_id')->constrained('orden_logistica_paradas')->onDelete('cascade');
            $table->foreignId('activo_id')->constrained('activos');
            $table->integer('cantidad')->default(1);
            $table->text('notas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parada_activo');
    }
};
