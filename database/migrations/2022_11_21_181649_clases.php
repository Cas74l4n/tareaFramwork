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
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            
                        $table->integer('HoraSemana');

            $table->foreignId('id_maestro')
            ->nullable()
            ->constrained('maestros')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('id_alumno')
            ->nullable()
            ->constrained('alumnos')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('id_hclase')
            ->nullable()
            ->constrained('hclases')
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
        Schema::dropIfExists('clases');
    }
};
