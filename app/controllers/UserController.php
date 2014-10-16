<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function registrar()
	{
		$roles= new Rol;
		$lista=rol::All();
		$array=array();
		$inputs=Input::All();
		$usuario=array();
		foreach ($lista as $key => $value) {
			$array[$value["id"]]=$value["rol"];
		}
		if(isset($inputs["id"])){
			$user = new User;
			$usuario=$user->find($inputs["id"]);
			//return var_dump($usuario);
			$form_data = array('url' => 'usuario-editar', 'method' => 'POST' , "name"=>"guardar_usuario", 'enctype'=>'multipart/form-data');

		}
		else{
			$form_data = array('url' => 'usuario-guardar', 'method' => 'POST' , "name"=>"guardar_usuario", 'enctype'=>'multipart/form-data');
		}
		return View::make("usuario",["form_data"=>$form_data,"roles"=>$array,"usuario"=>$usuario]);
	}
	public function store()
	{
		 $inputs=Input::All();
		 $usuario = new User;
 		 $file=Input::file('imagen');
	    	 //return "La contraseña es: ".$inputs["nombre"];

		 //$inputs["imagen"]=$file->getClientOriginalExtension();
		 if($usuario->isValid($inputs)){
			 if(Input::hasFile('imagen')) {
	         	 Input::file('imagen')->move('usuarios',$inputs["usuario"].".".$file->getClientOriginalExtension());
	    	 $usuario->email=$inputs["email"];
	    	 $usuario->usuario=$inputs["usuario"];
	    	 $usuario->rol_id=$inputs["rol_id"];
	    	 $usuario->nombre=$inputs["nombre"];
	    	 $usuario->password=Hash::make($inputs["password"]);
	    	 $usuario->imagen=$inputs["usuario"].".".$file->getClientOriginalExtension();
	    	 $usuario->save();
	    	 return Redirect::to("registrar-usuario");
	    	 }
	    	 else{
				return Redirect::to('registrar-usuario')->withInput();
	    	 }
	    	 //return Request::json($inputs);
			//return Redirect::to('registrar-usuario')->withInput()->withErrors($usuario->errors);

		 }
		return Redirect::to('registrar-usuario')->withInput()->withErrors($usuario->errors);
	  
	}
	public function edit(){
		$inputs=Input::All();
		$user= new User;
		$usuario=$user->find($inputs["id"]);
		$data=Input::all();
		if($usuario->isValid($data)){

			if(Input::hasFile('imagen')) {
				Input::file('imagen')->move('usuarios',$inputs["usuario"].".".$file->getClientOriginalExtension());
				$usuario->imagen=$inputs["usuario"].".".$file->getClientOriginalExtension();
			}
			$usuario->email=$inputs["email"];
			$usuario->usuario=$inputs["usuario"];
			$usuario->rol_id=$inputs["rol_id"];
			$usuario->nombre=$inputs["nombre"];
			$usuario->password=Hash::make($inputs["password"]);
			$usuario->save();
			return Redirect::to("usuario-listar");
		}
		else{
			//return dd($usuario->errors);
			return Redirect::to('registrar-usuario?id='.$inputs["id"])->withInput()->withErrors($usuario->errors);
		}
	}
	public function listar(){
		$roles= new Rol;
		$lista=rol::All();
		$array=array();
		$array[0]="Todos";
		foreach ($lista as $key => $value) {
			$array[$value["id"]]=$value["rol"];
		}
		$form_data = array('url' => '/usuario-json-listar', 'method' => 'POST' , "name"=>"listar_usuarios" ,"id"=>"listar_usuarios");


		return View::make("usuarios.listar",["roles"=>$array,"form_data"=>$form_data]);
	}

	public function jsonListar(){
		$user= new User;
		//$usuarios= $user::email("zelgaki@zelgaki.com")->nombre("Roberto Gadiel Priego Arias")->get();
		$usuarios=$user->buscarUsuario(Input::all());
		//var_dump($usuarios);
		return $usuarios;
	}

}
