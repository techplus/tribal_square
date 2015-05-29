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

<div class="row banner_Wrap">
    <div class="container">
      @if( $aLatestDeals->count() > 0 )
      <div class="banner_left col-sm-4">
          <?php $counter = 0; ?>
        @foreach( $aLatestDeals as $oDeal )
          <?php $oDealImagesSidebar = ( $oDeal->CoverPic->count() ) ? $oDeal->CoverPic : $oDeal->DealImages(); ?>
          <img src="{{ $oDeal->CoverPic->count() ? Image::url($oDeal->CoverPic->first()->image_path,769,344) : ( $oDealImagesSidebar->count() > 0 ? Image::url($oDealImagesSidebar->first()->image_path,769,344) : Image::url(url('images/no_image.png'),769,344)) }}" style="display: none;">
          <a onclick="updateImage({{$counter++}})" href="#" class="dealTitle" data-link="{{ route('search.deals.show' , [ $oDeal->id ] ) }}" data-image="{{ $oDeal->CoverPic->count() ? Image::url($oDeal->CoverPic->first()->image_path,769,344) : ( $oDealImagesSidebar->count() > 0 ? Image::url($oDealImagesSidebar->first()->image_path,769,344) : Image::url(url('images/no_image.png'),769,344)) }}" data-path="{{ $oDeal->title }}" >
            <p>{{ ( strlen( $oDeal->title ) > 35 ) ? substr( $oDeal->title , 0 , 35 )."..." :  $oDeal->title }}</p>
            <span>Discount : {{ $oDeal->discount_percentage }}%</span>
          </a>
        @endforeach
      </div>
      @endif
      <div class="col-sm-8 deal_banner_wrap">
        <a class="dealLink" href="#">
          <img src="images/deal_banner.jpg" alt="" class="img-responsive">
        </a>
        <div class="banner_info" style="bottom: 50px; position: absolute;right: 0;"> 
          <div class="info_wrapper col-xs-12 view_dealbtn">
              <a class="btn btn-lg custome_blue_btn view_deal" href="http://localhost/tribal_square/search/deals/50">View
                  Deal</a>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row deals_holder">
    <div class="container">
        <form name="frmSearch" id="frmSearch" class="form-horizontal" method="post" action="{{ route('search.store') }}">
              <div class="col-xs-12 col-sm-6 col-lg-4 box">
                <a href="javascript:;" data-type="deals" class="searchType">
                  <div class="deal_holder_info holder_1">
                    <div class="boxup">
                      <p>African Deals</p>
                      <span class="boxspan">Discounted deals on African items and services</span>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xs-12 col-sm-6 col-lg-4 box">
                <a href="javascript:;" data-type="baby_sitter" class="searchType">
                  <div class="deal_holder_info holder_2">
                    <div class="boxup">
                      <p>African Sitters &amp; House Help</p>
                      <span class="boxspan">Find African Nannies, baby sitters, and house help</span>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xs-12 col-sm-6 col-lg-4 box">
                <a href="javascript:;" data-type="classified" class="searchType">
                  <div class="deal_holder_info holder_3">
                    <div class="boxup">
                      <p>African Listings</p>
                      <span class="boxspan">Advertise African foods, Services, or Post your needs</span>
                    </div>
                  </div>
                </a>
              </div>
              <input type="hidden" name="type" id="searchTyp" value="">
        </form>
    <?php /*  <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="deal_holder_info holder_4">
          <div>
            <p>African Forum</p>
            <span>Discuss African-related topics</span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-4">
        <a href="https://oaktrips.com/" target="_blank">
          <div class="deal_holder_info holder_5">
            <div>
              <p>Travel to Africa</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="advert"></div>
      </div> */ ?>
      <!-- <div class="col-xs-12" style="color:#ac1919;font-weight:bold;"> 5% of our profit supports 
        <a href="http://www.selfless4africa.org/" target="_blank">www.selfless4africa.org</a>
        ..S4A inspiring change in Africa  </div> -->
    </div>

  </div>


<div class="push"></div> <!-- Add for Sticky Footer -->
</div> <!-- Wrapper End -->

<?php /* <div class="page-wrap">
        <div class="row header_wrap">
              <div class="container">
                <div class="col-xs-12">
                  <div class="logo">
                    <a href="{{url('/')}}">
                      <img src="{{asset('/images/logo.jpg')}}" alt="" class="img-responsive">
                    </a>
                  </div>
                  <div class="header_btns_wrap">                                    
                    <a href="{{action('Auth\RegisterController@getIndex')}}" class="btn btn-lg custome_blue_btn">Signup</a>
                    <a href="{{action('Auth\AuthController@getIndex')}}" class="btn btn-lg custome_blue_btn">Login</a>                    
                  </div>                                    
                </div>                 
              </div>
        </div>

            <div class="row">
              <div class="container">
                <div class="home_main_serch">
                  <form method="post" action="{{route('search.store')}}">
                    <div class="radio col-sm-4">
                      <label>
                        <input type="radio" class="fancy-radio" name="type" id="optionsRadios1" value="deals" checked>
                        Tribal Deals
                      </label>
                    </div>
                    <div class="radio col-sm-4">
                      <label>
                        <input type="radio" class="fancy-radio" name="type" id="optionsRadios2" value="baby_sitter">
                        Baby Sitters
                      </label>
                    </div>
                    <div class="radio col-sm-4">
                      <label>
                        <input type="radio" class="fancy-radio" name="type" id="optionsRadios2" value="classified">
                        Tribal Classifieds
                      </label>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                      <div class="form-group col-xs-12 serach_input_wrap">
                        <img src="images/search_icon.png" alt="">
                        <input type="text" name="term" class="form-control serach_input" placeholder="What are you looking for ?">
                      </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                      <div class="form-group col-xs-12 serach_input_wrap">
                        <img src="images/location_icon.png" alt="">
                        <input type="text" name="location" id="autocomplete1" class="form-control serach_input" placeholder="Enter Your Location">
                      </div>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                      <input type="submit" class="btn btn-lg custome_blue_btn col-xs-12 col-sm-4 col-sm-offset-4" value="Search">
                    </div>
                  </form>
                </div>
              </div>
            </div>
</div> */ ?>
<script type="text/javascript">
    var index;
    function updateImage(i) {
        var imgPath = $('.dealTitle:eq('+i+')').data('image');
        var link = $('.dealTitle:eq('+i+')').data('link');
        $(".dealTitle").removeClass('active_slide');
        $('.dealTitle:eq('+i+')').addClass('active_slide');
        index = i;
        //console.log($('.dealTitle' ).length);
        //var btnLink = $('.dealLink').attr('href');
        $('.deal_banner_wrap img').attr('src', imgPath);
        $('.view_deal').attr('href', link);
        $('.deal_banner_wrap a').attr('href', link);
    }
    $(document).ready(function(){
        $('.searchType').on('click',function() {
            var type = $(this).data('type');
            $('#searchTyp').val(type);
            $('#frmSearch').submit();
        });
//        $('a.dealTitle' ).on('click',function(){
//            var imgPath = $(this ).data('image');
//            var link = $(this).data('link');
//            $(".dealTitle").removeClass('active_slide');
//            $(this).addClass('active_slide');
//            console.log($(this ).prevAll().length);
//            //console.log($('.dealTitle' ).length);
//            //var btnLink = $('.dealLink').attr('href');
//            $('.deal_banner_wrap img').attr('src', imgPath);
//            $('.view_deal').attr('href', link);
//            $('.deal_banner_wrap a').attr('href', link);
//        });

        $('a.dealTitle' ).first().click();

            setInterval(function(){
                if( ++index >= 4 )
                    index = 0;
                $('.banner_left' ).find('a.dealTitle:eq('+(index)+')' ).click();
            },4000);
    });
</script>
<style type="text/css">
    .wrapper {
        min-height: 100%;
        height: auto !important;
        height: 100%;
    }
</style>
@stop
