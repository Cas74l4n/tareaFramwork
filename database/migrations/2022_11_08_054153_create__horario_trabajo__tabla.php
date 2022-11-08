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
        Schema::create('_horario_trabajo__tabla', function (Blueprint $table) {
            $table->id();
            $table->string('DiaSemana');
            $table->time('HoraDeInicio');
            $table->time('HoraFin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_horario_trabajo__tabla');
    }
};
