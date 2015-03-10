@extends('layouts.front')

@section('content')
    <div class="row header_wrap">
          <div class="container">
            <div class="col-xs-12">
              <div class="logo">
                <a href="{{url('/')}}">
                  <img src="{{asset('/images/logo.png')}}" alt="" class="img-responsive">
                </a>
              </div>
              <div class="header_btns_wrap">
                <a href="#" class="btn btn-lg custome_blue_btn">Signup</a>
                <a href="{{action('Auth\AuthController@getIndex')}}" class="btn btn-lg custome_blue_btn">Login</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="container">
            <div class="home_main_serch">
              <form>
                <div class="radio col-sm-4">
                  <label>
                    <input type="radio" class="fancy-radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Tribal Deals
                  </label>
                </div>
                <div class="radio col-sm-4">
                  <label>
                    <input type="radio" class="fancy-radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Baby Sitters
                  </label>
                </div>
                <div class="radio col-sm-4">
                  <label>
                    <input type="radio" class="fancy-radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Tribal Classifieds
                  </label>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group col-xs-12 serach_input_wrap">
                    <img src="images/search_icon.png" alt="">
                    <input type="text" class="form-control serach_input" placeholder="What are you looking for ?">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group col-xs-12 serach_input_wrap">
                    <img src="images/location_icon.png" alt="">
                    <input type="text" class="form-control serach_input" placeholder="Enter Your Location">
                  </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                  <input type="submit" class="btn btn-lg custome_blue_btn col-xs-12 col-sm-4 col-sm-offset-4" value="Search">
                </div>
              </form>
            </div>
          </div>
        </div>
@stop