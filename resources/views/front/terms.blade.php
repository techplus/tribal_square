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

<?php 
//echo $aFooterPrivacy['content_title'];
echo $aFooterTerms['descriptions'];
    
?>

<div class="push"></div> <!-- Add for Sticky Footer -->
</div> <!-- Wrapper End -->


@stop
<style type="text/css">
.wrapper {
  min-height: 100%;
  height: auto !important;
  height: 100%;
}
</style>