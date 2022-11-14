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
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Celular');
            

            $table->foreignId('id_Disiplina')
            ->considered('Disiplina')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('id_HorarioTrabajo')
            ->considered('HorarioTrabajo')
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
        Schema::dropIfExists('maestro');
    }
};
