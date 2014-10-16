<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Log in</title>


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:700,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>

<!-- Styles -->
<script type="text/javascript"></script>
<link rel="stylesheet" href="/template/font-awesome-4.0.3/css/font-awesome.css" type="text/css" /><!-- Font Awesome -->
<link rel="stylesheet" href="/template/css/style.css" type="text/css" /><!-- Style -->
<link rel="stylesheet" href="/template/css/responsive.css" type="text/css" /><!-- Responsive -->	
<script type="text/javascript" src="/template/js/jquery-1.10.2.js"></script>
<script type="text/javascript">
	$(document).on("ready",function(){
		$("form").on("submit",function(e){
			e.preventDefault();
		});
		$("#usuario ,#password").on("focus",function(){
			$("#informacion").hide();
		});
		$("#ingresar").on("click",function(e){
			e.preventDefault();
			if($("#usuario").val()=="" || $("#password").val()==""){
				$("#informacion").show().find("a").text("No puede haber datos vacios");
			}
			else{
				

				$.ajax({
					url:"/login",
					data:"usuario="+$("#usuario").val()+"&password="+$("#password").val(),
					type: 'POST',
                    dataType: 'json',
                    async: false,
                    success: function(json){
                            json_usos = json;
                            if(json_usos.error){
                            	$("#informacion").show().find("a").text(json_usos.error);
                            }
                            else{
                            	$("#mensaje").text("bienvenido "+json_usos.nombre);
                            	$("#user_imagen").attr("src","/usuarios/"+json_usos.imagen);
                            	setTimeout(function(){
                            			location.href="/";
                            		}, 2000);
                            }	
                        }
				});
			}
		});
	});

</script>

</head>
<body class="sign-in-bg">
	<div class="sign-in">
		<div class="sign-in-head black">
			<div class="sign-in-details">
				<h1>Ingresar<i class="fa fa-lock"></i></h1>
			</div>
			<div class="log-in-thumb">
				<img width="124px" height="122px" src="/template/images/sign-in.jpg" id="user_imagen" alt="" />
			</div>
			<p id='mensaje'>Si tienes una cuentra ingresa</p>
		</div>
		<div class="sign-in-form">
		<br/>
		<br/>

			<form>
				<i class="fa fa-user"></i><input type="text" name="usuario" id="usuario" placeholder="USUARIO" />
			</form>
			<form>
				<i class="fa fa-lock"></i><input id="password" name="password" type="password" placeholder="CONTRASEÑA" />
			</form>
			<h5 hidden id="informacion"><a href="#" title="">Datos incorrectos</a></h5>
			<a href="dashboard.html" title="" id="ingresar" class="black">INGRESAR</a> 
		</div>
		<ul>
			<li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
			<li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
			<li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>
		</ul>
	</div>
</body>
</html>