<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ParticipanteEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('participante_evento', function (Blueprint $table)
        {
            $table->integer('evento_id');
            $table->integer('participante_id');

            // $table->foreign('evento_id')->references('id')->on('evento');
            // $table->foreign('participante_id')->references('id')->on('participantes');
        });
        
        Schema::table('participante_evento', function (Blueprint $table)
        {
            $table->foreign('evento_id')->references('id')->on('evento')->onDelete('cascade');
            $table->foreign('participante_id')->references('id')->on('participante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("participante_evento");
    }
}
