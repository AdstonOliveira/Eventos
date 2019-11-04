<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Participantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('participantes')){
        Schema::create('participantes', function (Blueprint $table)
	 {
           		$table->integer('id');
                $table->string('nome');
                $table->string('rg');
                $table->string('cpf');
                $table->string('email');
                $table->string('telefone');
                $table->date('data_nascimento');
                $table->string('organizacao');
                $table->timestamps();
                $table->softdeletes();
            });   
        }     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participantes');
    }
}


