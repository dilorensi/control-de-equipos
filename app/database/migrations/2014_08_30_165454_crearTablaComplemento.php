<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaComplemento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('complemento', function($table)
        {
            $table->increments('id');
            $table->string('complemento');
            $table->enum('estatus', array('activo', 'baja'));
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
		Schema::drop('complemento');
		//
	}

}
