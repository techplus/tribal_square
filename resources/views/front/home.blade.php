@extends('layouts.front')

@section('content')    
    <div class="page-wrap">
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
                  <p class="header_cart"><a href="{{ url('shopping-cart') }}">My Cart <span class="no_of_items">{{ (Session::has('products')) ? "( ".count(Session::get('products'))." Items )" : '' }}</span></a></p>
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
                        <input type="text" name="location" class="form-control serach_input" placeholder="Enter Your Location">
                      </div>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                      <input type="submit" class="btn btn-lg custome_blue_btn col-xs-12 col-sm-4 col-sm-offset-4" value="Search">
                    </div>
                  </form>
                </div>
              </div>
            </div>
    </div>
@stop