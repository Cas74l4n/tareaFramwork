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
        Schema::create('asistencia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_Clase')
            ->considered('Clase')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('id_Alumno')
            ->considered('Alunmo')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('id_Maestro')
            ->considered('Maestro')
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
        Schema::dropIfExists('asistencia');
    }
};
