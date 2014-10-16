@extends('layout')
@section('titulo'){{ 'Usuarios' }}@endsection
@section('ubicacion')
	<h1>Usuarios <i>Registrar usuario</i></h1>
@endsection
@section('contenido')
	<div class="col-md-12">
		<div class="widget-body custom-form">
			{{Form::model($usuario,$form_data,array("role"=>"form"))}}
			<form class="sec" role="form">
			  <div class="form-group">
				{{Form::label('email','Correo electronico')}}
      			{{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control'))}}
      			<p class="help-block">{{$errors->first("email")}}</p>
			  </div>
			  {{Form::text('id',null,array("hidden"))}}
			  <div class="form-group">
				{{Form::label('usuario','Usuario')}}
      			{{ Form::text('usuario', null, array('placeholder' => 'Introduce el usuario', 'class' => 'form-control'))}}
      			<p class="help-block">{{$errors->first("usuario")}}</p>
			  </div>
			  <div class="form-group">
				{{Form::label('nombre','Nombre')}}
      			{{ Form::text('nombre', null, array('placeholder' => 'Introduce el nombre', 'class' => 'form-control'))}}
      			<p class="help-block">{{$errors->first("nombre")}}</p>
			  </div>

			  <div class="form-group">
					<label for="password">Contraseña</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
      			<p class="help-block">{{$errors->first("password")}}</p>

			  </div>
			  <div class="form-group">
					<label for="password_confirmation">Verificar Contraseña</label>
					<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Verificar contraseña">
			  </div>
			  <div class="form-group">
				{{Form::label('imagen','Foto')}}
      			{{ Form::file('imagen', null, array('class' => 'form-control'))}}
      			<p class="help-block">{{$errors->first("nombre")}}</p>
			  </div>
			  <div class="form-group">
				{{Form::label('rol_id','Nombre')}}
      			{{ Form::select('rol_id', $roles,null,array("class"=>"form-control") )}}
      			<p class="help-block">{{$errors->first("rol_id")}}</p>

			  </div>


  				{{ Form::button('Guardar usuario', array('type' => 'submit', 'class' => 'btn green pull-right')) }}    

			{{Form::close()}}
		</div>
	</div>

@endsection