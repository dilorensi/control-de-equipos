<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->integer("rol_id")->unsigned();
            $table->foreign("rol_id")->references("id")->on("acl_rol")->onDelete("cascade");
            $table->string('email');
            $table->string('password');
            $table->string('usuario');
            $table->string('nombre');
            $table->string('imagen');
            $table->timestamps();
        });	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
