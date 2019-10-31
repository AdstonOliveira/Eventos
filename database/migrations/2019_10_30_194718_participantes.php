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
           		$table->integer('id', true);
                $table->string('nome');
                $table->string('rg');
                $table->string('cpf', 11);
                $table->string('email');
                $table->string('telefone');
                $table->date('data_nascimento');
                $table->string('organizacao', 80);
                $table->timestamps();
<<<<<<< HEAD
                $table->softdeletes();
            });   
        }     
=======
                $table->softDeletes();
        	});        
>>>>>>> c795c8608a1822ea307cae7a231e2ce32eae5c08
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('participantes');
    }
}
