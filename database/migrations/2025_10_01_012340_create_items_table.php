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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // id BIGINT PRIMARY KEY AUTO_INCREMENT
            $table->string('nombre');
            $table->string('categoria', 100)->nullable();
            $table->string('unidad_medida', 50)->nullable();
            $table->text('notas')->nullable();
            $table->timestamps(); // created_at y updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
