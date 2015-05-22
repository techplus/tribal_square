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
	<style>
		.sub-menu >li > a{
			padding-left:15%;
		}
		.sub-menu > li.active a, li.active a{
			background:#00b3ee;
			color:#ffffff;
		}
		.sub-menu > li.active a:hover{
			background:#2babcf;
			color:#ffffff;
		}
        .row{
            margin-left:0;
            margin-right: 0;
        }
	</style>
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
					<a class="navbar-brand" href="{{url('/')}}">Tribal Square</a>
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
									<li><a href="{{ route('admin.settings.index') }}">Settings</a></li>
									<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
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
					<nav>
						<ul class="nav">
                            @if( Auth::user()->whereHas('UserTypes',function($q){
                                $q->where('name','SuperAdmin');
                            })->get()->count() > 0)
                                <li class="{{Request::segment(2) == 'administrators' ? 'active' : ''}}"><a href="{{route('admin.administrators.index')}}">Admin Users</a></li>
                            @endif
                            <li class="{{ ( Request::segment(2) == "sales-agents" ) ? 'active' : ''  }}" data-toggle="collapse" data-target="#submenu1" aria-expanded="true">
                                <a href="{{route('admin.sales-agents.index')}}">Sales Agents</a>
                            </li>
							<li data-toggle="collapse" data-target="#submenu1" aria-expanded="true">
								<a href="#">Categories</a>							
								<ul class="nav collapse in sub-menu" id="submenu1" role="menu" aria-labelledby="btn-1" aria-expanded="true">
								@foreach( $categories AS $cat )
									<li class="{{ ( Request::segment(1) == "category" ) ? (( $catnm ) ? ( ( $cat == $catnm ) ? 'active' : '' ) : '') : '' }}"><a href="{{ route('category.sub-category.index',[$cat]) }}">{{$cat}}</a></li>
								@endforeach
								</ul>
							</li>
							<li data-toggle="collapse" data-target="#submenu2" aria-expanded="true">
								<a href="#">Posts</a>							
								<ul class="nav collapse in sub-menu" id="submenu2" role="menu" aria-labelledby="btn-1" aria-expanded="true">									
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "posts" ) ? ( ( $sStatus == "Pending" ) ? "active" : "" ) : "" }}'><a href="{{ route( 'admin.posts.index',[ 'status'=>'pending' ]) }}">Pending</a></li>
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "posts" ) ? ( ( $sStatus == "Approved" ) ? "active" : "" ) : "" }}'><a href="{{  route( 'admin.posts.index',['status'=>'approved']) }}">Approved</a></li>
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "posts" ) ? ( ( $sStatus == "Declined" ) ? "active" : "" ) : "" }}'><a href="{{  route( 'admin.posts.index',['status'=>'declined']) }}">Declined</a></li>
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "posts" ) ? ( ( $sStatus == "Archived" ) ? "active" : "" ) : "" }}'><a href="{{  route( 'admin.posts.index',['status'=>'archived']) }}">Archived</a></li>
								</ul>
							</li>
							<li data-toggle="collapse" data-target="#submenu3" aria-expanded="true">
								<a href="#">Baby Sitters</a>							
								<ul class="nav collapse in sub-menu" id="submenu3" role="menu" aria-labelledby="btn-1" aria-expanded="true">									
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "babysitters" ) ? ( ( $sStatus == "Pending" ) ? "active" : "" ) : "" }}'><a href="{{ route( 'admin.babysitters.index',[ 'status'=>'pending' ]) }}">Pending</a></li>
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "babysitters" ) ? ( ( $sStatus == "Approved" ) ? "active" : "" ) : "" }}'><a href="{{  route( 'admin.babysitters.index',['status'=>'approved']) }}">Approved</a></li>
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "babysitters" ) ? ( ( $sStatus == "Declined" ) ? "active" : "" ) : "" }}'><a href="{{  route( 'admin.babysitters.index',['status'=>'declined']) }}">Declined</a></li>
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "babysitters" ) ? ( ( $sStatus == "Archived" ) ? "active" : "" ) : "" }}'><a href="{{  route( 'admin.babysitters.index',['status'=>'archived']) }}">Archived</a></li>
								</ul>
							</li>
							<li data-toggle="collapse" data-target="#submenu4" aria-expanded="true">
								<a href="#">Deals</a>							
								<ul class="nav collapse in sub-menu" id="submenu4" role="menu" aria-labelledby="btn-1" aria-expanded="true">									
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "deals" ) ? ( ( $sStatus == "Pending" ) ? "active" : "" ) : "" }}'><a href="{{ route( 'admin.deals.index' , [ 'status'=>'pending' ] ) }}">Pending</a></li>
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "deals" ) ? ( ( $sStatus == "Approved" ) ? "active" : "" ) : "" }}'><a href="{{ route( 'admin.deals.index' , ['status'=>'approved'] ) }}">Approved</a></li>
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "deals" ) ? ( ( $sStatus == "Declined" ) ? "active" : "" ) : "" }}'><a href="{{ route(  'admin.deals.index' ,['status'=>'declined'] ) }}">Declined</a></li>
									<li class='{{ ( Request::segment(1) == "admin" AND Request::segment(2) == "deals" ) ? ( ( $sStatus == "Archived" ) ? "active" : "" ) : "" }}'><a href="{{ route( 'admin.deals.index' ,['status'=>'archived'] ) }}">Archived</a></li>
								</ul>
							</li>
						</ul>
					</nav>				
		</nav>
	</div>
	<div class="col-sm-10">
		@yield('content')
	</div>
</div>
	<!-- Scripts -->		
</body>
</html>
