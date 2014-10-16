<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRolRecurso extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("acl_rol_recurso",function(Blueprint $table){
			$table->increments("id");
			$table->integer("rol_id")->unsigned();
			$table->foreign("rol_id")->references("id")->on("acl_rol")->onDelete("cascade");
			$table->integer("recurso_id")->unsigned();
			$table->foreign("recurso_id")->references("id")->on("acl_recurso")->onDelete("cascade");
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
		Schema::drop("acl_rol_recurso");

	}

}
