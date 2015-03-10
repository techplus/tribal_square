@extends('layouts.front')

@section('content')
    <div class="row header_wrap">
        @include('layouts.front_navbar')
                   <div class="row">
                <div class="container">
                    <div class="signin_box">
                        <h1>Sign up</h1>
                        <div class="col-sm-5 login_box_left">
                            <h4>Sign up with your Facebook account </h4>
                            <p>Connect your Facebook account to sign up
                                to Tribal Square</p>
                            <a href="{{$fb_helper->getLoginUrl(array('email'))}}">
                                <img src="{{asset('/images/signup_fb_btn.png')}}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-sm-7 login_box_right">
                            <form action="{{action('Auth\RegisterController@postIndex')}}" method="post">
                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                <div class="signup_radio_btn">
                                    <div class="radio" style="margin-top:-5px;">
                                        <label>
                                            <input type="radio" name="user_type" id="optionsRadios1" value="2" checked>
                                            Service Provider
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_type" id="optionsRadios2" value="3">
                                            Sales Agent
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_type" id="optionsRadios3" value="4">
                                            Baby Sitter
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-11 col-xs-12 {{$errors->has('firstname') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control login_input" name="firstname" placeholder="First Name" value="{{old('firstname')}}">
                                    @if( $errors->has('firstname') ) <p class="help-block">{{$errors->first('firstname')}}</p> @endif
                                </div>
                                <div class="form-group col-sm-11 col-xs-12 {{$errors->has('lastname') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control login_input" placeholder="Last Name" name="lastname" value="{{old('lastname')}}">
                                    @if( $errors->has('lastname') ) <p class="help-block">{{$errors->first('lastname')}}</p> @endif
                                </div>
                                <div class="form-group col-sm-11 col-xs-12 {{$errors->has('email') ? 'has-error' : '' }}">
                                    <input type="email" class="form-control login_input" placeholder="Email" name="email" value="{{old('email')}}">
                                    @if( $errors->has('email') ) <p class="help-block">{{$errors->first('email')}}</p> @endif
                                </div>
                                <div class="form-group col-sm-11 col-xs-12 {{$errors->has('password') ? 'has-error' : '' }}">
                                    <input type="password" class="form-control login_input" placeholder="Password" name="password">
                                    @if( $errors->has('password') ) <p class="help-block">{{$errors->first('password')}}</p> @endif
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    <input type="password" class="form-control login_input" placeholder="Confirm Password" name="password_confirmation">
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    {!! app('captcha')->display(); !!}
                                </div>
                                @if( $errors->has('g-recaptcha-response') )
                                    <div class="col-sm-11 col-xs-12">
                                        <p class="text-danger">Captcha validation failed!</p>
                                    </div>
                                @endif
                                <div class="col-sm-11 col-xs-12 signup_chkbox">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#"> Terms of Use </a> and <a href="#"> Privacy Statement.</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    <input type="submit" class="btn btn-lg btn-block custome_blue_btn" value="Proceed to Next Step">
                                </div>
                                <div class="col-sm-11 col-xs-12">
                                    <a href="{{action('Auth\AuthController@getIndex')}}" class="signup_link text-center">Already a member ?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection