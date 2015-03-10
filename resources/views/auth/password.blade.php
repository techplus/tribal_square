@extends('layouts/front')

@section('content')

    <div class="page-wrap">

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
@endsection
