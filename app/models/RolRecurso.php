<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class RolRecurso extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'acl_rol_recurso';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	*/
	public function Rol(){
       return $this->hasMany('Rol','rol_id');
	}
	public function Recurso(){
       return $this->hasMany('Recurso','recurso_id');
	}

    public function listar(){
        return $this::all();
    }
}
