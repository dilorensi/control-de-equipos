<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Recurso extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'acl_recurso';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	*/
	public function RolRecurso()
    {
        return $this->belongsTo("RolRecurso");
    }
    
    public function listar(){
        return $this::all();
    }
}
