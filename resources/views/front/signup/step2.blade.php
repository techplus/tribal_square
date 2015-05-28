@extends('layouts.front')

@section('content')
    <style>
        #wrapper.active {
            padding-left: 0;
            height: auto;
        }
    </style>
    <div class="page-wrap">
        <!-- Header -->    
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
        <!-- Header --> 
        <div class="row header_wrap new_header_wrap">
             

            <div class="row">
                <div class="container">

                    @if( empty( Auth::user()->verfication_code ) )
                        <div class="signin_box">
                            <h1>${{$plan->amount}} / Month
                                <a href="{{action('Auth\RegisterController@getPaypalSubscription')}}"><img
                                            src="{{asset('images/paypal_btn.png')}}" alt=""
                                            class="img-responsive paypal_img"></a>
                            </h1>

                            <a style="margin-top: 20px;"
                               href="{{action('Auth\AuthController@getSelectUserType')}}?skip=payment"
                               class="btn btn-primary">Free Trial</a>

                            {{--<div class="col-sm-12" align="center">
                                <h3>OR</h3>
                                <br>
                            </div>
                            <div class="col-sm-12 col-md-8 login_box_left payment_box_left">
                                <h4>Pay via Authorize.net</h4>
                                <h4>Purchase Information</h4>
                                <div class="billing_info_wrap">
                                    <p>Billing Info</p>
                                    <img src="{{asset('images/cards.png')}}" alt="">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <input type="text" placeholder="First Name" class="form-control login_input">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <input type="text" placeholder="Last Name" class="form-control login_input">
                                </div>
                                <div class="form-group col-xs-12 card_number_wrap">
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Credit Card Number" class="form-control login_input">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="CVV" class="form-control login_input">
                                    </div>
                                </div>
                                <div class="billing_info_wrap">
                                    <p>Expires</p>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-10 col-xs-12 card_number_wrap">
                                        <div class="col-sm-8">
                                            <select class="form-control input-lg">
                                                <option value="">01 - january</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control input-lg">
                                                <option value="">2016</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p class="card_details_info">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenthe industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 payment_box_right">
                                <div class="billing_info_wrap">
                                    <p>Billing Address </p>
                                </div>
                                <div class="form-group col-xs-12">
                                    <input type="text" placeholder="Address" class="form-control login_input">
                                </div>
                                <div class="form-group col-xs-12">
                                    <input type="text" placeholder="Apt / Suite" class="form-control login_input">
                                </div>
                                <div class="form-group col-xs-12">
                                    <input type="text" placeholder="City" class="form-control login_input">
                                </div>
                                <div class="form-group col-xs-12">
                                    <input type="text" placeholder="State" class="form-control login_input">
                                </div>
                                <div class="form-group col-xs-12">
                                    <input type="text" placeholder="Zip " class="form-control login_input">
                                </div>
                                <div class="form-group col-xs-12 country_selectbox">
                                    <select class="form-control input-lg">
                                        <option value="">India</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <input type="submit" value="Purchase &amp; Contiune" class="btn btn-lg  custome_blue_btn col-sm-4 col-xs-12">
                            </div>

                        </div>--}}
                            @else
                                <div class="signin_box">
                                    <h1>Please activate your Tribal Square account by clicking on the link we have forwarded you in email.
                                    </h1>
                                    <div class="clearfix"></div>
                                    @if( session('success') )
                                        <div class="alert alert-success">
                                            {{session('success')}}
                                        </div>
                                    @endif
                                    <a href="{{action('Auth\AuthController@getVerificationLink')}}">Resend Verification Link</a>
                                </div>
                            @endif
                        </div>
                </div>

                <div class="push"></div>
            </div>

        </div>

    </div>
@endsection
<style type="text/css">
    #wrapper {
        min-height: 97%;
        height: auto !important;
        height: 100%;
    }
</style>