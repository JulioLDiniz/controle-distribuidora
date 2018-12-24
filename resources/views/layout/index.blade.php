<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="css/paper/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="css/paper/animate.min.css" rel="stylesheet"/>

	<!--  Paper Dashboard core CSS    -->
	<link href="css/paper/paper-dashboard.css" rel="stylesheet"/>

	<!-- CSS customizado -->
	<link href="css/customizado.css" rel="stylesheet"/>

	<!--  Fonts and icons     -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="css/paper/themify-icons.css" rel="stylesheet">
	<script src="js/paper/jquery.min.js" type="text/javascript"></script>
</head>
<body>

	<div class="wrapper">
		<div class="sidebar" data-background-color="white" data-active-color="danger">


			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="#" class="simple-text">
						Distribuidora
					</a>
				</div>

				<ul class="nav">
					<li class="active">
						<a href="dashboard.html">
							<i class="ti-pie-chart"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li>
						<a href="dashboard.html">
							<i class="ti-user"></i>
							<p>Cliente</p>
						</a>
					</li>
					<li>
						<a href="produtos" class="nav nav-second-level" aria-expanded="false" style="height: 0px;" data-toggle="collapse" data-target="#collapseExample" id="collapse">
							<i class="ti-shopping-cart"></i>
							<p>Produto</p>
						</a>		
					</li>
					<li>
						<a href="dashboard.html">
							<i class="ti-money"></i>
							<p>Caixa</p>
						</a>
					</li>
				</ul>
			</div>
		</div>


		<div class="main-panel">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar bar1"></span>
							<span class="icon-bar bar2"></span>
							<span class="icon-bar bar3"></span>
						</button>
						<a class="navbar-brand" href="#">@yield('pagina')</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="ti-panel"></i>
									<p>Stats</p>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="ti-bell"></i>
									<p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Notification 1</a></li>
									<li><a href="#">Notification 2</a></li>
									<li><a href="#">Notification 3</a></li>
									<li><a href="#">Notification 4</a></li>
									<li><a href="#">Another notification</a></li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="ti-settings"></i>
									<p>Settings</p>
								</a>
							</li>
						</ul>

					</div>
				</div>
			</nav>


			<div class="content">
				<div class="container-fluid">
					<div class="row">
						@yield('conteudo')
					</div>
				</div>
			</div>


			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>

							<li>
								<a href="#">
									Home
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
					</div>
				</div>
			</footer>

		</div>
	</div>


</body>

<!--   Core JS Files   -->

<script src="js/paper/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="js/paper/bootstrap-checkbox-radio.js"></script>

<!--  Notifications Plugin    -->
<script src="js/paper/bootstrap-notify.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="js/paper/paper-dashboard.js"></script>

<!-- Js Customizado -->
<script src="js/customizado.js"></script>

</html>
