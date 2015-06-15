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
            <!--  @include('layouts.front_navbar') -->
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
                                            <input type="radio" name="user_type" id="optionsRadios1" value="2" checked <?php if(Input::old('user_type')== "2") { echo 'checked="checked"'; } ?>>
                                            Service Provider
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_type" id="optionsRadios2" value="4" <?php if(Input::old('user_type')== "4") { echo 'checked="checked"'; } ?>>
                                            Sales Agent
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_type" id="optionsRadios3" value="3" <?php if(Input::old('user_type')== "3") { echo 'checked="checked"'; } ?>>
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
                                <div style="display:none;" class="paypalid form-group col-sm-11 col-xs-12 {{$errors->has('password') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control login_input" placeholder="Paypal ID" name="paypalid">
                                    @if( $errors->has('paypalid') ) <p class="help-block">{{$errors->first('paypalid')}}</p> @endif
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    {!! app('captcha')->display(); !!}
                                </div>
                                @if( $errors->has('g-recaptcha-response') )
                                    <div class="col-sm-11 col-xs-12">
                                        <p class="text-danger">Captcha validation failed!</p>
                                    </div>
                                @endif
                                <div class="col-sm-11 col-xs-12 signup_chkbox {{ $errors->has('agreement') ? 'has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="agreement" value="1"> I agree to the <a href="{{action('HomeController@getTerms')}}" target="_blank"> Terms of Use </a> and <a target="_blank" href="{{action('HomeController@getPrivacypolicy')}}"> Privacy Statement.</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    <input type="submit" class="btn btn-lg btn-block custome_blue_btn" value="Sign Up">
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
<div class="push"></div>
</div>
<style type="text/css">
.wrapper {
    min-height: 100%;
    height: auto !important;
    height: 100%;
}
.footer_wrap
{
    width: 100%;
    float: left;
}

</style>
    
<script>
$(document).ready(function(){
    if($('.signup_radio_btn input:radio[name="user_type"]:checked').val() == 4)
    {
      $('.paypalid').show();
    }
    else
    {
        $('.paypalid').hide();
    }   

    $('.signup_radio_btn input:radio[name="user_type"]').change(function(){
        if($(this).val() == '4'){
          $('.paypalid').show();
        }
        else
        {
            $('.paypalid').hide();
        }
    });
});
 </script>
@endsection
