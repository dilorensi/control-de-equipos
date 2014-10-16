<?php

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

Route::filter('login', function()
{
	if (!User::identificado()) return Redirect::route('ingresar');
});


Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});