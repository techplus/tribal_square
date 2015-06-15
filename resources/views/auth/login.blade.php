@extends('layouts.front')
@section('content')
  <div class="wrapper"> 
  <div class="row">
    <div class="container">
      <div class="pull-left logo">
        <a href="{{url('/')}}">
          <img src="{{asset('/images/logo1.jpg')}}" alt="" class="img-responsive">
        </a>
        <span>Connecting Africans abroad to African goods and services</span>
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
      <a href="http://forum.tribalsquare.com/" target="_blank" class="col-sm-4 col-lg-3 col-xs-12 pull-right text-center questions_top_btn">
        <div>Discuss all things</div>
        <p>Africa in the Forum</p>
      </a>
    </div>
  </div>  
    
    <div class="page-wrap">
      <div class="row header_wrap new_header_wrap">

    <!-- @include('layouts.front_navbar') -->

      <div class="row">
      <div class="container">
        <div class="signin_box">
          <h1>Sign in</h1>
          <div class="col-sm-5 login_box_left">
            <h4>Sign in with your Facebook account </h4>
            <p>Connect your Facebook account to sign in to Tribal Square</p>
            <a href="{{$fb_helper->getLoginUrl(array('email'))}}">
              <img src="{{asset('/images/signin_fb_btn.png')}}" alt="" class="img-responsive">
            </a>
          </div>
          <div class="col-sm-7 login_box_right">
            <h4>Sign in with your Tribal Square account</h4>           
            <form action="{{action('Auth\AuthController@postLogin')}}" method="post">
               @if (count($errors) > 0)
                <div class="form-group col-sm-11 col-xs-12">
                  <div class="alert alert-danger">
                  Email address/Password not correct!
                    <!-- <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul> -->
                    </div>
                </div>
              @endif
              <div class="form-group col-sm-11 col-xs-12 {{$errors->has('email') ? 'has-error' : ''}}">
                <input value="{{old('email')}}" type="email" class="form-control login_input" name="email" placeholder="Email">
              </div>
              <div class="form-group col-sm-11 col-xs-12 {{$errors->has('password') ? 'has-error' : ''}}">
                <input type="password" class="form-control login_input" name="password" placeholder="Password">
              </div>
              <div class="col-sm-11 col-xs-12 checkbox_wrap">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> Check me out
                  </label>
                </div>
                <a href="{{action('Auth\PasswordController@getIndex')}}">Forgot Password?</a>
              </div>
              <div class="form-group col-sm-11 col-xs-12">
                <input type="submit" class="btn btn-lg btn-block custome_blue_btn" value="Sign In">
              </div>
              <div class="col-sm-11 col-xs-12">
                <a href="{{action('Auth\RegisterController@getIndex')}}" class="signup_link text-center">Not a Member yet ?</a>
              </div>
            </form>
          </div>
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
    .signup_link {
  float: left;
  width: 100%;
  text-decoration: center;
  color: #5a5a5a;
  font-size: 16px;
  font-family: 'HelveticaNeueRoman';
  text-decoration: underline;
}
.text-center {
  text-align: center;
}
.login_box_right {
  border-left: 1px solid #7a7a7a;
}
h1 {
  font-family: 'ProximaNovaCondensedSemibold';
  font-size: 37px;
  color: #AC1919;
  margin: 15px 0 0px 0;
  float: left;
  width: 100%;
  border-bottom: 1px solid #9f9f9f;
  padding-bottom: 5px;
}
.checkbox_wrap {
  margin-bottom: 20px;
  font-family: 'HelveticaNeueRoman';
}
.checkbox_wrap div {
  float: left;
}
.checkbox_wrap a {
  float: right;
  margin-top: 10px;
}
.custome_blue_btn {
  border-style: solid;
  border-width: 1px;
  border-color: rgb(177, 25, 25);
  border-radius: 2px;
  background-image: -moz-linear-gradient( 90deg, rgb(177, 25, 25) 0%, rgb(150, 58, 74) 100%);
  background-image: -webkit-linear-gradient( 90deg, rgb(177, 25, 25) 0%, rgb(150, 58, 74) 100%);
  background-image: -ms-linear-gradient( 90deg, rgb(177, 25, 25) 0%, rgb(150, 58, 74) 100%);
  box-shadow: inset 0.5px 0.866px 0px 0px rgba(143, 195, 253, 0.392);
  color: #fff;
  font-family: 'ProximaNovaCondensedSemibold';
  text-transform: uppercase;
}
.btn-block {
  display: block;
  width: 100%;
}
</style>    
@stop
