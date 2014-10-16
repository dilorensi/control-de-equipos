<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMenuRecurso extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("acl_recurso_menu",function(Blueprint $table){
			$table->increments("id");
			$table->integer("menu_id")->unsigned();
			$table->foreign("menu_id")->references("id")->on("acl_menu")->onDelete("cascade");
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
		Schema::drop("acl_recurso_menu");

	}

}
