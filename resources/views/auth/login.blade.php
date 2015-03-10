@extends('layouts.front')

@section('content')
<div class="row header_wrap">
      <div class="container">
        <div class="col-xs-12">
          <div class="logo">
            <a href="#">
              <img src="{{asset('/images/logo.png')}}" alt="" class="img-responsive">
            </a>
          </div>

          <div class="header_btns_wrap">
            <a href="#" class="btn btn-lg custome_blue_btn">Signup</a>
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

    <div class="row login_subnav_wrap">
      <div class="container">
        <div class="login_subnav">
          <a href="#">View All Deals</a>
          <a href="#">Tribal Classifieds</a>
          <a href="#">View Baby Sitters </a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="container">
        <div class="signin_box">
          <h1>Sign in</h1>
          <div class="col-sm-5 login_box_left">
            <h4>Sign in with your Facebook account </h4>
            <p>Connect your Facebook account to sign in
to Tribal Square</p>
            <a href="#">
              <img src="{{asset('/images/signin_fb_btn.png')}}" alt="" class="img-responsive">
            </a>
          </div>
          <div class="col-sm-7 login_box_right">
            <h4>Sign in with your Tribal Square account</h4>
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
            <form action="{{action('Auth\AuthController@postLogin')}}" method="post">
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
                <a href="#">Forgot Password?</a>
              </div>
              <div class="form-group col-sm-11 col-xs-12">
                <input type="submit" class="btn btn-lg btn-block custome_blue_btn" value="Sign In">
              </div>
              <div class="col-sm-11 col-xs-12">
                <a href="#" class="signup_link text-center">Not a Member yet ?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
