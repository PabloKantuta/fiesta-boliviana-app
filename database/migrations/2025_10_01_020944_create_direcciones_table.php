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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ciudad_id')->nullable()->constrained('ciudades');
            $table->string('calle')->nullable();
            $table->string('zona_barrio')->nullable();
            $table->text('referencia')->nullable();
            $table->decimal('lat', 10, 8)->nullable(); // Precisión para latitud
            $table->decimal('lng', 11, 8)->nullable(); // Precisión para longitud
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
