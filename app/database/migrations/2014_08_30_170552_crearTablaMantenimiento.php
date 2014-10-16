<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMantenimiento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("mantenimiento",function(Blueprint $table){
			$table->increments("id");
			$table->integer("equipo_id")->unsigned();
			$table->foreign("equipo_id")->references("id")->on("equipos")->onDelete("cascade");
			$table->string("descripcion");
			$table->integer("user_id")->unsigned();
			$table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
			$table->datetime("fecha_mantenimiento");
			$table->enum("tipo",array("preventivo","correctivo"));
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
		Schema::drop("mantenimiento");
	}

}
