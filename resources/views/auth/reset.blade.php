@extends('layouts.front')

@section('content')
    <div class="page-wrap">
        <div class="row header_wrap">
            <div class="container">
                <div class="col-xs-12">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('/images/logo.png')}}" alt="" class="img-responsive">
                        </a>
                    </div>

                    <div class="header_btns_wrap">
                        <a href="{{action('Auth\AuthController@getIndex')}}" class="btn btn-lg custome_blue_btn">Login</a>
                        <!-- <a href="#" class="btn btn-lg custome_blue_btn">Login</a> -->
                    </div>
                    <div class="header_search">
                        <form action="#">
                            <input type="text" class="form-control header_item_search" placeholder="What are you looking for ?">
                            <input type="text" class="form-control header_location_search" placeholder="Enter your Location">
                        </form>
                    </div>
                </div>
            </div>
        </div>


	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top: 20px;">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Reset Password
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
    </div>
@endsection
