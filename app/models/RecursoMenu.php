<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class RecursoMenu extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'acl_recurso_menu';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	*/

    public function listar($datos){
        $consulta=$this->leftJoin("acl_recurso as r","r.id","=","acl_recurso_menu.recurso_id");
        if(isset($datos["menu_id"]))
        	$consulta->where("acl_recurso_menu.menu_id","=",$datos["menu_id"]);
        return $consulta->get()->toArray();
    }
}
