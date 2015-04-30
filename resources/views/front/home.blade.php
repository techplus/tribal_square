@extends('layouts.front')
@section('content') 
<div class="row">
    <div class="container">
      <div class="pull-left logo">
        <a href="{{url('/')}}">
          <img src="{{asset('/images/logo1.jpg')}}" alt="" class="img-responsive">
        </a>
      </div>  
      <div class="pull-right">
        <div class="topbtn col-sm-6 col-lg-12 col-xs-12">
              <a href="{{action('Auth\RegisterController@getIndex')}}" class="btn btn-lg red_btn">Signup</a>
              <a href="{{action('Auth\AuthController@getIndex')}}" class="btn btn-lg red_btn">Login</a>
        </div>
      </div>  
      <a href="#" class="col-sm-4 col-lg-3 col-xs-12 pull-right text-center questions_top_btn">
        <div>Got Questions ?</div>
        <p>Click here to Post/Comment on your Forum</p>
      </a>
      
    </div>
</div>  

<div class="row banner_Wrap">
    <div class="container">
      @if( $aLatestDeals->count() > 0 )
      <div class="banner_left col-sm-4">
        @foreach( $aLatestDeals as $oDeal )
          <?php $oDealImagesSidebar = ( $oDeal->CoverPic->count() ) ? $oDeal->CoverPic : $oDeal->DealImages(); ?>
          <a href="#" class="dealTitle" data-link="{{ route('search.deals.show' , [ $oDeal->id ] ) }}" data-path="{{ $oDeal->title }}" onclick="imagePath('{{ $oDeal->CoverPic->count() ? Image::url($oDeal->CoverPic->first()->image_path,769,344) : ( $oDealImagesSidebar->count() > 0 ? Image::url($oDealImagesSidebar->first()->image_path,769,344) : Image::url(url('images/no_image.png'),769,344)) }}')">
          <!-- <a href="#" class="dealTitle" data-link="{{ route('search.deals.show' , [ $oDeal->id ] ) }}" data-path="{{ $oDeal->title }}" onclick="imagePath('{{ $oDeal->CoverPic->count() ? $oDeal->CoverPic->first()->image_path : ( $oDealImagesSidebar->count() > 0 ? $oDealImagesSidebar->first()->image_path : url('images/no_image.png')) }}')"> -->
            <p>{{ ( strlen( $oDeal->title ) > 35 ) ? substr( $oDeal->title , 0 , 35 )."..." :  $oDeal->title }}</p>
            <span>Discount : {{ $oDeal->discount_percentage }}%</span>
          </a>
        @endforeach  
       <!--  <a href="#">
          <p>Tony Saccos Coal Oven Pizza</p>
          <span>20% Off on Coal Oven Pizza</span>
        </a>
        <a href="#">
          <p>Sehaj boutique – Canton</p>
          <span>25% Off on Indian Dresses</span>
        </a>
        <a href="#">
          <p>Tony Saccos Coal Oven Pizza</p>
          <span>20% Off on Coal Oven Pizza</span>
        </a> -->
      </div>
      @endif
      <div class="col-sm-8 deal_banner_wrap">
        <a href="#">
          <img src="images/deal_banner.jpg" alt="" class="img-responsive">
        </a>
      </div>
    </div>
</div>

<div class="row deals_holder">
    <div class="container">
      <div class="col-xs-12 col-sm-6 col-lg-4">
        <a href="{{URL('search/deals')}}">
          <div class="deal_holder_info holder_1">
            <div>
              <p>African Deals</p>
              <!-- <span>Discounted deals on African items and services</span> -->
            </div>
          </div>
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-4">
        <a href="{{URL('search/babysitters')}}">
          <div class="deal_holder_info holder_2">
            <div>
              <p>African Sitters &amp; House Help</p>
              <!-- <span>Find African Nannies, baby sitters, and house help</span> -->
            </div>
          </div>
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-4">
        <a href="{{URL('search/classified')}}">
          <div class="deal_holder_info holder_3">
            <div>
              <p>African Listings</p>
              <!-- <span>Advertise African foods, Services, or Post your needs</span> -->
            </div>
          </div>
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-4">
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
      </div>
    </div>
  </div>
<!-- <div class="page-wrap">
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
</div> -->
@stop
<script type="text/javascript">
function imagePath($this)
{
  var imgPath = $this;
  $(this).data('link');

  $('.deal_banner_wrap img').attr('src', imgPath);
}
</script>