<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


    /*relaciones*/
    public function Rol()
    {
        return $this->belongsTo("Rol");
    }

    /*relaciones*/
    static function buscarUsuarios($datos)
	{
		$usuario = User::where('usuario', '=', $datos['usuario'])->first();
		return $usuario;
	}
	public static function identificado()
	{
		if(Session::has('user_id') AND Session::has('user_usuario'))
			return true;
		else
			return false;
	}

	public function isValid($data)
    {
        $rules = array(
            'email'     => 'required|email|unique:users',
            'usuario'   => 'required|unique:users',
            'rol_id'	=> 'required',
            'nombre' 	=> 'required|min:4|',
            'password'  => 'min:8|confirmed'
        );
        

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el email del usuario actual
            $rules['email'] .= ',email,' . $this->id;
            $rules['usuario'] .= ',usuario,' . $this->id;

        }
        else // Si no existe...
        {
            // La clave es obligatoria:
            $rules['password'] .= '|required';
            //$rules['imagen'] .= '|required';

        }


        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function scopeEmail($query,$valor){
        if($valor){
            return $query->where("users.email","like","%".$valor."%");
        }
        else{
            return $query;
        }
    }
    public function scopeNombre($query,$valor){
        if($valor){
            return $query->where("users.nombre","like","%".$$valor."%");
        }
        else{
            return $query;
        }
    }
    public function scopeROl($query,$valor){
        if($valor>0){
            return $query->where("r.id","=",$valor);
        }
        else{
            return $query;
        }
    }

    public function scopePrincipal($query,$valor){
        return $query->leftJoin("acl_rol as r","r.id","=","users.rol_id");

    }

    public function buscarUsuario($datos){
        $consulta=$this->leftJoin("acl_rol as r","r.id","=","users.rol_id",["rol"]);
       
        if(isset($datos["email"]))
            $consulta->email($datos["email"]);

        if(isset($datos["nombre"]))
            $consulta->Nombre($datos["nombre"]);

        if(isset($datos["rol_id"]))
            if($datos["rol_id"]>0)
                $consulta->where("r.id","=",$datos["rol_id"]);    
        
        return $consulta->get(array("users.*","r.rol"))->toArray();
    }
}
