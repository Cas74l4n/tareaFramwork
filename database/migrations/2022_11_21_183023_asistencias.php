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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_clase')
            ->constrained('clases')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('id_alumno')
            ->constrained('alunmos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('id_maestro')
            ->constrained('maestro')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
};
