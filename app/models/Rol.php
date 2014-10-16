<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Rol extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'acl_rol';
	//protected $fillable = array('rol');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('remember_token');

	/*public function user()
    {
       return $this->hasMany('User','rol_id');
    }
    public function Rol()
    {
        return $this->belongsTo("Rol");
    }
	*/

    public function ListarRol(){
        
    }
	
}
