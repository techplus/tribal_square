@extends('layouts.front')
@section('content')

<div class="wrapper"> 
  <div class="row">
    <div class="container">
      <div class="pull-left logo">
        <a href="{{url('/')}}">
          <img src="{{asset('/images/logo1.jpg')}}" alt="" class="img-responsive">
        </a>
        <span>...Connecting Africans abroad to African goods and services</span>
      </div>
      <div class="pull-right">
        @if( ! Auth::check() )
        <div class="topbtn col-sm-6 col-lg-12 col-xs-12">
              <a href="{{action('Auth\RegisterController@getIndex')}}" class="btn btn-lg red_btn">Signup</a>
              <a href="{{action('Auth\AuthController@getIndex')}}" class="btn btn-lg red_btn">Login</a>
        </div>
        @else
          <div class="topbtn col-sm-6 col-lg-12 col-xs-12" style="margin-top: 20px;font-weight: bold;">
          <?php echo "Welcome ".Auth::user()->firstname. " ".Auth::user()->lastname ; ?> 
          <?php $oUser = Auth::user()->UserTypes()->first(); 
            $userType = $oUser->name;
            if($userType == 'Providers')
            {
              $dashBoardLink = action('Users\PostsController@index');
            }
            elseif($userType == 'BabySitters')
            {
              $dashBoardLink = action('Users\BabySittersController@getIndex');
            }
            elseif($userType == 'SalesAgent')
            {
              $dashBoardLink = action('Users\SalesAgentController@index'); 
            }
            elseif($userType == 'SuperAdmin' || $userType == 'Admin')
            {
              $dashBoardLink = action('Admin\PostsController@index');  
            }
          ?><br>
          <a href="{{ $dashBoardLink }}" class="">My Dashboard</a> |
            <a href="{{action('Auth\AuthController@getLogout')}}" class="">Logout</a>
          </div> 
        @endif
      </div>    
      <a href="#" class="col-sm-4 col-lg-3 col-xs-12 pull-right text-center questions_top_btn">
        <div>Discuss all things</div>
        <p>Africa in the Forum</p>
      </a>
    </div>
  </div> 

    <div class="page-wrap">
        <div class="row">
            <div class="container">
                <div class="signin_box">
                    <h1>Forgot Password</h1>
                    <div class="col-sm-5 col-xs-12 forgot_password_box">
                        <h4>Tribal Square Password reset</h4>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
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
                        <p>Enter your email address related to <br>
                            this account to continue with password reset.</p>
                        <form role="form" method="POST" action="{{ url('/password/email') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group col-sm-11 col-xs-12 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <input type="email" class="form-control login_input" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group col-sm-11 col-xs-12">
                                <input type="submit" class="btn btn-lg custome_blue_btn" value="Reset Now !">
                            </div>
                            <div class="col-sm-11 col-xs-12">
                                <a href="{{action('Auth\AuthController@getIndex')}}" class="signup_link">Return to Login</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-7 password_img">
                        <img src="{{asset('/images/lock.png')}}" alt="" class="img-repsonsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="push"></div>     
</div>    
<style type="text/css">
    .wrapper {
        min-height: 100%;
        height: auto !important;
        height: 100%;
    }
</style>
@endsection
