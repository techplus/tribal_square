<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tribal Square</title>

	<link href="{{ asset('/css/admin/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Tribal Square</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
							<!-- <li><a href="{{ url('/auth/register') }}">Register</a></li> -->
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ "Welcome ".Auth::user()->firstname }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
<div class="row">
	<div class="col-sm-2">
		<nav class="navbar navbar-default navbar-stacked">
			<div class="container-fluid">			
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav">
							<li data-toggle="collapse" data-target="#submenu1" aria-expanded="true">
								<a href="#">Categories</a>							
								<ul class="nav collapse in" id="submenu1" role="menu" aria-labelledby="btn-1" aria-expanded="true">
								@foreach( $categories AS $cat )
									<li><a href="{{ route('category.sub-category.index',[$cat]) }}">{{$cat}}</a></li>
								@endforeach
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</nav>
	</div>
	<div class="col-sm-10">
		@yield('content')
	</div>
</div>
	<!-- Scripts -->		
</body>
</html>
