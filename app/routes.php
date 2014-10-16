<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/


//Route::get('ingresar','HomeController@index');

Route::get('ingresar', array('as' => 'ingresar', 'uses' => 'HomeController@index'));
Route::ANY('login','LoginController@login');
Route::group(array('before' => 'login'), function(){
	Route::get('/','HomeController@inicio');


	/*usuarios*/
	
	$recurso= new Recurso;
	$recursos=$recurso->listar();

	foreach ($recursos as $key => $value) {
		$ruta=$value["ruta"];
		$controlador=$value["controlador"]."Controller@".$value["accion"];
		Route::ANY($ruta,$controlador);

		
	}
	
	/*
	Route::get('/registrar-usuario','UserController@registrar');
	Route::POST("/usuario-guardar",'UserController@store');
	Route::POST("/usuario-editar",'UserController@edit');
	Route::get('/usuario-listar', 'UserController@listar');
	Route::get('/json-usuarios', 'UserController@jsonListar');
	*/
	/*usuarios*/

});
