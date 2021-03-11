<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_medicamento', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('tomas_dia');
            $table->text('comentarios')->nullable();
            $table->date('inicio');
            $table->date('fin');
            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascasde');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_medicamento');
    }
}
