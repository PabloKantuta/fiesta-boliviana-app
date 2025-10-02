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
        Schema::create('fabricacion_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fabricacion_id')->constrained('fabricaciones')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('items');
            $table->integer('cantidad_a_producir')->nullable();
            $table->integer('cantidad_producida')->default(0);
            $table->text('notas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fabricacion_item');
    }
};
