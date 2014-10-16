@extends('layout')
@section('titulo'){{ 'Listar usuarios' }}@endsection
@section('ubicacion')
	<h1>Usuarios <i>Listar usuarios</i></h1>
@endsection

@section('javascript')
<script type="text/javascript">
	$(document).on("ready",function(){
		$("#listar_usuarios").on("submit",function(e){
			e.preventDefault();
			$.ajax({
					url:"/json-usuarios",
					data:$("#listar_usuarios").serialize(),
					type: 'GET',
                    dataType: 'json',
                    async: false,
                    success: function(json){
                            var json_usos = json;
                            TablaUsuarios(json_usos);
                    }
				});
		});
	});
	function TablaUsuarios(json){
		$("#lista-usuarios").html("");
		$.each(json,function(key,value){
			var tr=$("<tr/>");
			var td=$("<td>"+value["id"]+"</td>");
			tr.append(td);
			var td=$("<td>"+value["usuario"]+"</td>");
			tr.append(td);
			var td=$("<td>"+value["nombre"]+"</td>");
			tr.append(td);
			var td=$("<td>"+value["rol"]+"</td>");
			tr.append(td);
			var td=$("<td>"+"</td>");
			var a =$('<a href="/registrar-usuario?id='+value.id+'" title="" class="green">Editar</a>');
			td.append(a);
			tr.append(td);
			$("#lista-usuarios").append(tr);
		});

	}	
</script>

@endsection

@section('contenido')
	<div class="col-md-12">
		<div class="widget-body custom-form">
			{{Form::open($form_data,array("role"=>"form"))}}
			<form class="sec" role="form">
			  <div class="form-group">
				{{Form::label('email','Correo electronico')}}
      			{{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control'))}}
			  </div>
			  <div class="form-group">
				{{Form::label('usuario','Usuario')}}
      			{{ Form::text('usuario', null, array('placeholder' => 'Introduce el usuario', 'class' => 'form-control'))}}
			  </div>
			  <div class="form-group">
				{{Form::label('nombre','Nombre')}}
      			{{ Form::text('nombre', null, array('placeholder' => 'Introduce el nombre', 'class' => 'form-control'))}}
			  </div>
			  <div class="form-group">
				{{Form::label('rol_id','Nombre')}}
      			{{ Form::select('rol_id', $roles,null,array("class"=>"form-control") )}}
			  </div>
			  


  				{{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn green pull-right')) }}    

			{{Form::close()}}
		</div>
		<div class="streaming-table">
			<div class="progress progress-striped active">
			  <div id="record_count" class="progress-bar progress-bar-success pink large-progress" style="width: 0%">0</div>
			</div>
				<span id="found" class="label label-info"></span>
				<table id="stream_table" class='table table-striped table-bordered'>
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Usuario</th>
					  <th>Nombre</th>
					  <th>Rol</th>
					  <th>Acciones</th>
					</tr>
				  </thead>
				  <tbody id="lista-usuarios">
				  </tbody>
				</table>
				<div id="summary">
				<div>
			  </div>
			</div>

	</div>


@endsection