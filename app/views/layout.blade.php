<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('titulo')</title>


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:700,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>

<!-- Styles -->
<link rel="stylesheet" href="/template/css/bootstrap.min.css" type="text/css" /><!-- Bootstrap -->
<link rel="stylesheet" href="/template/font-awesome-4.0.3/css/font-awesome.css" type="text/css" /><!-- Font Awesome -->

<link rel="stylesheet" href="/template/css/nv.d3.css" type="text/css" /><!-- VISITOR CHART -->
<link rel="stylesheet" type="/template/text/css" media="all" href="/template/css/daterangepicker-bs3.css" /><!-- Date Range Picker -->
<link rel="stylesheet" href="/template/css/style.css" type="text/css" /><!-- Style -->	
<link rel="stylesheet" href="/template/css/responsive.css" type="text/css" /><!-- Responsive -->	



 
<!-- Script -->
<script src="/template/js/jquery-1.10.2.js"></script><!-- Jquery -->
<script type="text/javascript"  src="/template/js/d3.v2.js"></script><!-- VISITOR CHART -->
<script type="text/javascript"  src="/template/js/nv.d3.js"></script><!-- VISITOR CHART -->
<script type="text/javascript"  src="/template/js/live-updating-chart.js"></script><!-- VISITOR CHART -->
<script type="text/javascript"  src="/template/js/bootstrap.min.js"></script><!-- Bootstrap -->
<script type="text/javascript"  src="/template/js/script.js"></script><!-- Script -->
<script src="/template/js/skycons.js"></script> <!-- Skycons -->
<script src="/template/js/enscroll-0.5.2.min.js"></script> <!-- Custom Scroll bar -->
<script src="/template/js/moment.js"></script> <!-- Date Range Picker -->
<script src="/template/js/daterangepicker.js"></script><!-- Date Range Picker -->
<script src="/template/js/carousal-plugins.js"></script><!-- Carousal Widget -->
<script src="/template/js/ticker.js"></script><!-- Ticker -->
@yield("javascript")



</head>
<body>
<?php
	$menu=new Menu;
	$menus=$menu->listar();
	$menusRecursos= new RecursoMenu;
?>
		<div class="responsive-menu">
			<div class="responsive-menu-dropdown blue">
				<a title="" class="blue">MENU <i class="fa fa-align-justify" ></i></a>
			</div>

			@foreach ($menus as $m)
				<?php $submenu=$menusRecursos->listar(array("menu_id"=>$m["id"]));?>	
			   <ul>
			   		<li id="intro4"><a href="#" title="" ><i class="{{$m['boton']}}"></i><span><i>{{count($submenu)}}</i></span>{{$m["menu"]}}</a>
			   		<ul>
			   			@foreach ($submenu as $sm)
							<li><a href="{{$sm["ruta"]}}" title="">{{$sm["menu"]}}</a></li>
			   			@endforeach
			   		</ul>
			   		</li>
			   </ul>
			@endforeach
		</div>
	<header>
		<div class="logo">
			<img src="/template/images/logo.png" alt="" />
		</div>
		<div class="header-post">
			<a href="#add-post-title" data-toggle="modal" title="">POST <i class="fa fa-plus"></i></a>
			<ul>
			<li><a href="#" title="" data-tooltip="Refresh" data-placement="bottom"><i class="fa fa-refresh"></i></a></li>
			<li><a href="#" title="" data-tooltip="Custom" data-placement="bottom"><i class="fa fa-th-large"></i></a></li>
			<li class="upload-files-sec"><a href="#" title="" data-tooltip="Upload Files" data-placement="bottom" class="upload-btn"><i class="fa fa-cloud-upload"></i></a>
			
			<div class="upload-files">
				<ul>
					<li>
						<p>Photoshop 524.psd</p>
						<div class="progress small-progress progress-striped active">
							<div style="width: 30%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar pink">
							</div>
						</div>
					</li>
					
					<li>
						<p>Phtoto758.jpg</p>
						<div class="progress small-progress progress-striped active">
							<div style="width: 58%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar yellow">
							</div>
						</div>
					</li>
					
					<li>
						<p>Private files.xlxs</p>
						<div class="progress small-progress  progress-striped active">
							<div style="width: 32%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar blue">
							</div>
						</div>
					</li>
					
					<li>
						<p>index.html</p>
						<div class="progress small-progress progress-striped active">
							<div style="width: 98%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar black">
							</div>
						</div>
					</li>
				
				</ul>
			</div>	
			</li>
			</ul>
		</div>
		<div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade" id="add-post-title" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header blue">
					  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					  <h4 class="modal-title">Setting Section</h4>
					</div>
					<div class="modal-body">
					  <input type="text" placeholder="TITLE" />
					  <textarea placeholder="DESCRIPTION" rows="5"></textarea>
					</div>
					<div class="modal-footer">
					  <button data-dismiss="modal" class="btn btn-default black" type="button">Close</button>
					  <button class="btn btn-primary blue" type="button">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div>
		</div>
		<div class="header-alert">
			<ul>
				<li><a href="#" title=""><i class="fa fa-group"></i>Team Statistics</a></li>
				<li><a title="" class="message-btn"><i class="fa fa-envelope"></i><span>3</span></a>
					<div class="message">
						<span>You have 3 New Messages</span>
						<a href="#" title=""><img src="http://placehold.it/40x40" alt="" />Hey! How are You Diana. I waiting for you.
						toe Check. <p><i class="fa fa-clock-o"></i>3:45pm</p></a>
						<a href="#" title=""><img src="http://placehold.it/40x40" alt="" />Please Can you Submit A file. I am From Korea
						toe Check. <p><i class="fa fa-clock-o"></i>1:40am</p></a>
						<a href="#" title=""><img src="http://placehold.it/40x40" alt="" />Hey Today is Party So you Will Have to Come <p><i class="fa fa-clock-o"></i>4 Hours ago</p></a>
						<a href="inbox.html" class="view-all">VIEW ALL MESSAGE</a>
					</div>				
				
				
				</li>
				<li><a title="" class="notification-btn"><i class="fa fa-bell"></i><span>4</span></a>
					<div class="notification">
						<span>You have 6 New Notification</span>
						<a href="#" title=""><img src="http://placehold.it/40x40" alt="" />Server 3 is Over Loader Pleas
						toe Check. <p><i class="fa fa-clock-o"></i>3:45pm</p></a>
						<a href="#" title=""><img src="http://placehold.it/40x40" alt="" />Server 10 is Over Loader Pleas
						toe Check. <p><i class="fa fa-clock-o"></i>1:40am</p></a>
						<a href="#" title=""><img src="http://placehold.it/40x40" alt="" />New User Registered Please Check This <p><i class="fa fa-clock-o"></i>4 Hours ago</p></a>
						<a href="#" class="view-all">VIEW ALL NOTIFICATIONS</a>
					</div>
				
				</li>					
			</ul>
		</div>
		<div class="right-bar-sec">
			<a href="#" title="" class="right-bar-btn"><i class="fa fa-bars rotator animation"></i></a>
			<a href="#" title="" class="right-bar-btn-mobile"><i class="fa fa-bars rotator animation"></i></a>
			<div id="scrollbox4" class="right-bar">
					
				<div class="my-account">
					<form>
						<input type="text" placeholder="SEARCH ACCOUNT" />
						<a href="" title="" data-tooltip="Account" data-placement="left"><i class="fa fa-cogs"></i></a>
					</form>
					<a id="account" class="toogle-head">ACCOUNT LIST<i class="fa fa-plus"></i></a>
					<div class="account2">
						<ul>
							<li>
							Private Office
								<div class="switch-account">
								  <input type="checkbox" id="check"/>
								  <label for="check" class="switch">
									<span class="slide-account"></span>
								  </label>
								</div>
							</li>
							<li>
							Home Account
								<div class="switch-account">
									<input type="checkbox" id="check2" checked/>
								  <label for="check2" class="switch">
									<span class="slide-account"></span>
								  </label>
								</div>
							</li>
							<li>
							Personal Account
								<div class="switch-account">
									<input type="checkbox" id="check3" checked/>
								  <label for="check3" class="switch">
									<span class="slide-account"></span>
								  </label>
								</div>
							</li>
						</ul>
						
					<a href="#" title=""><i class="fa fa-plus"></i>ADD ACCOUNT</a>	
					</div>
				</div><!-- Add Account -->
				
				<div class="users-online">
					<a id="user-online" class="toogle-head">USERS ONLINE<i class="fa fa-plus"></i><span>26</span></a>
					<div class="user-online2">
						<ul>
							<li><img src="http://placehold.it/32x32" alt="" /><h5><a href="#" title="">Johny Razell</a></h5><span class="offline">OFFLINE</span> </li>
							<li><img src="http://placehold.it/32x32" alt="" /><h5><a href="#" title="">John Smith</a></h5><span class="online">ONLINE</span> </li>
							<li><img src="http://placehold.it/32x32" alt="" /><h5><a href="#" title="">Doe Haxzer</a></h5><span class="online">ONLINE</span> </li>
							<li><img src="http://placehold.it/32x32" alt="" /><h5><a href="#" title="">Karen Kelly</a></h5><span class="unread"><i>4</i></span> 
							<p>Hey! I am still waitin</p>
							</li>
						</ul>
					<a href="#" title="" ><i>260</i>TOTAL MEMBER</a>
					</div>
				</div><!-- Users Online -->
				
				
				<div class="disk-usage-sec">
					<a id="disk-usage" class="toogle-head">USAGE<i class="fa fa-plus"></i></a>
					<div class="disk-usage">
						<p>1.31 GB of 1.50 GB used <i>75%</i></p>
						<div class="progress small-progress">
							<div style="width: 35%" class="progress-bar black">
							  <span class="sr-only">35% Complete (success)</span>
							</div>
							<div style="width: 20%" class="progress-bar blue">
							  <span class="sr-only">20% Complete (warning)</span>
							</div>
							<div style="width: 10%" class="progress-bar pink">
							  <span class="sr-only">10% Complete (danger)</span>
							</div>
						</div>						
					</div>
				</div><!-- Disk Usage -->
				
				
				<div class="pending-task-sec">
					<a id="pending-task" class="toogle-head">PENDING TASK<i class="fa fa-plus"></i></a>
					<div class="pending-task">
						<ul>
							<li><h6>Development</h6><span>75%</span><a href="#" title="" data-tooltip="Refresh" data-placement="left"><i class="fa fa-refresh"></i></a>
								<div class="progress small-progress">
									<div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar pink">
									</div>
								</div>							
							</li>
							
							<li><h6>Bug Fixes</h6><span>60%</span><a href="#" title="" data-tooltip="Refresh" data-placement="top"><i class="fa fa-refresh"></i></a>
								<div class="progress small-progress">
									<div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar blue">
									</div>
								</div>							
							</li>
							
							<li><h6>Javascript</h6><span>90%</span><a href="#" title="" data-tooltip="Refresh" data-placement="bottom"><i class="fa fa-refresh"></i></a>
								<div class="progress small-progress">
									<div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar black">
									</div>
								</div>							
							</li>
							
							
						</ul>
					</div>
				</div><!-- Disk Usage -->
				
				
			</div><!-- Right Bar -->
		</div><!-- Right Bar Sec -->
	</header><!-- Header -->

	<div class="menu">
		<div class="menu-profile" id="intro3">
			<img width="57px" height="57px" src="/usuarios/{{ Session::get('user_imagen') }}" alt="" />
			<span><i class="fa fa-plus"></i></span>
			<div class="menu-profile-hover">
				<h1><i> {{ Session::get('user_nombre') }}</i></h1>
				<p><i class="fa fa-map-marker"></i>LONDON, UNITED KINGDOM</p>
				<a href="index.html" title=""><i class="fa fa-power-off"></i></a>
				<div class="menu-profile-btns">
					
				<h3>	
					<i class="fa fa-user blue"></i>
					<a href="profile.html" title="">PROFILE</a>
				</h3>
				<h3>
					<i class="fa fa-inbox pink"></i>
					<a href="inbox.html" title="">INBOX</a>
				</h3>
					
					
				</div>
			</div>
		</div>

		
		@foreach ($menus as $m)
			<?php $submenu=$menusRecursos->listar(array("menu_id"=>$m["id"]));?>	
		   <ul>
		   		<li><li><a href="#" title="" ><i class="{{$m["boton"]}}"></i>{{$m["menu"]}}</a>
		   		<ul>
		   			@foreach ($submenu as $sm)
						<li><a href="{{$sm["ruta"]}}" title="">{{$sm["menu"]}}</a></li>
		   			@endforeach
		   		</ul>
		   		</li>
		   </ul>
		@endforeach
		
		</ul>
	</div><!-- Right Menu -->

	<div class="wrapper">
		<div class="container">
			<div class="col-md-6">
				<div class="heading-sec">
					@yield('ubicacion')
				</div>
			</div>
			@yield('contenido')
		</div><!-- Container -->
	</div><!-- Wrapper -->
	
<!-- RAIn ANIMATED ICON-->
<script>
  var icons = new Skycons();
  icons.set("rain", Skycons.RAIN);
  icons.play();
</script>


</body>
</html>