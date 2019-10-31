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
           		$table->increments('id');
                $table->string('nome', 100);
                $table->string('rg', );
                $table->string('cpf', 11);
                $table->string('email', 80);
                $table->string('telefone', 80);
                $table->date('data_nascimento', 80);
                $table->string('organizacao', 80);
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
        //
    }
}
