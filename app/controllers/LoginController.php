<?php
class LoginController extends BaseController
{
 
    //establecemos restful a true
    public $restful = true;
 
    //al hacer uso de get le decimos a laravel que queremos crear una ruta, 
    //cargar una vista etc
    public function get_index()
    {
 
        //si se ha iniciado sesión no dejamos volver
        if(Auth::user())
        {
            return Redirect::to('home');
        }
        //mostramos la vista views/login/index.blade.php pasando un título
        return View::make('login.index')->with('title','Login');
 
    }
 
    //anteponemos post al nombre de la función, esto es así porque es la función
    //que recibirá datos por post
    public function login()
    {


        $inputs = Input::all();

        $reglas = array(
            'usuario' => 'required|exists:users,usuario',
            'password' => 'required',
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Response::json(array("validar"=>$validar,"error"=>"Algunos de los datos es incorrecto"));
        } else {
            $usuario = User::buscarUsuarios($inputs);
            //return $inputs["password"];
            if (Hash::check($inputs["password"], $usuario["password"])) {
                Session::put('user_id', $usuario->id);
                Session::put('user_rol_id', $usuario->rol_id);
                Session::put('user_usuario', $usuario->usuario);
                Session::put('user_email', $usuario->email);
                Session::put('user_nombre', $usuario->nombre);
                Session::put('user_imagen', $usuario->imagen);
                return Response::json(array("success"=>"Datos correctos","imagen"=>Session::get("user_imagen"), "nombre"=>Session::get("user_nombre")));
            } else {
                return Response::json(array("error"=>"El usuario y/o la contraseña no coinciden","contra"=>Hash::check($inputs["password"], $usuario["password"])));
            }
        }
    
 
 
    }
 
}