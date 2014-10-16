<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearEquipoComplemento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('equipo_complemento', function(Blueprint $tabla){
			$tabla->increments("id");
			$tabla->integer("equipo_id")->unsigned();
			$tabla
                ->foreign('equipo_id')   //creamos la clave foránea
                ->references('id')          //asociada al campo id
                ->on('equipos')          //De la tabla equipos
                ->onDelete('cascade');
            $tabla->integer("complemento_id")->unsigned();
            $tabla->foreign("complemento_id")->references("id")->on("complemento")->onDelete("cascade");
            $tabla->enum('estatus', array('equipado', 'baja'));
            $tabla->integer("responsable_id")->unsigned();
            $tabla->foreign("responsable_id")->references("id")->on("users")->onDelete("cascade");
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
		Schema::drop('equipo_complemento');
		//
	}

}
