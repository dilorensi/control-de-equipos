<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Equipos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('equipos', function(Blueprint $tabla){
			$tabla->increments("id");
			$tabla->string("equipo");
			$tabla->integer("categoria_id")->unsigned();
			$tabla
                ->foreign('categoria_id')   //creamos la clave foránea
                ->references('id')          //asociada al campo id
                ->on('categoria')          //De la tabla categorias
                ->onDelete('cascade');
            $tabla->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipos');
		//
	}

}
