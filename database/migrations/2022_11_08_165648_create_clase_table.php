<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase', function (Blueprint $table) {
            $table->id();
            $table->integer('HoraSemana');

            $table->foreignId('id_Maestro')
            ->considered('Maestro')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('id_Alumno')
            ->considered('Alumno')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('id_HorarioClase')
            ->considered('HorarioClase')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('id_Asistencia')
            ->considered('Asistencia')
            ->cascadeOnUpdate()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clase');
    }
};
