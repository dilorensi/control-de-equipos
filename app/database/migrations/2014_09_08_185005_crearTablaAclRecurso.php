<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAclRecurso extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("acl_recurso",function(Blueprint $table){
			$table->increments("id");
			$table->string("metodo");
			$table->string("variables");
			$table->string("ruta");
			$table->string("controlador");
			$table->string("accion");
			$table->string("menu");
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
		//
		Schema::drop("acl_recurso");

	}

}
