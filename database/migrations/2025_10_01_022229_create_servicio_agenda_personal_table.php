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
        Schema::create('servicio_agenda_personal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_agenda_id')->constrained('servicio_agendas')->onDelete('cascade');
            $table->foreignId('personal_id')->constrained('personal');
            $table->string('rol_en_servicio')->nullable();
            $table->integer('horas_asignadas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_agenda_personal');
    }
};
