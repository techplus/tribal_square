@extends('layouts.front')

@section('content')
    <div class="page-wrap">
<div class="row header_wrap new_header_wrap">
    @include('layouts.front_navbar')

    <div class="row">
      <div class="container">
        <div class="signin_box">
          <h1>Sign in</h1>
          <div class="col-sm-5 login_box_left">
            <h4>Sign in with your Facebook account </h4>
            <p>Connect your Facebook account to sign in
to Tribal Square</p>
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
@stop
