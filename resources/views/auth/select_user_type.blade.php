@extends('layouts.front')

@section('content')
    <style>
        #wrapper.active {
            padding-left: 0;
        }
        #wrapper {
            padding-left:40px;
        }
    </style>
    <div class="page-wrap">

    <div class="row header_wrap">
        <div class="container">
            <div class="col-xs-12">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{asset('/images/logo.png')}}" alt="" class="img-responsive">
                    </a>
                </div>
                <div class="header_btns_wrap">
                    <a href="{{action('Auth\AuthController@getLogout')}}" class="btn btn-lg custome_blue_btn">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="home_main_serch">
                <form action="{{action('Auth\AuthController@postSelectUserType')}}" method="post">
                    <div class="radio col-sm-4">
                        <label>
                            <input type="radio" class="fancy-radio" name="user_type" id="user_type" value="2" checked>
                            Provider
                        </label>
                    </div>
                    <div class="radio col-sm-4">
                        <label>
                            <input type="radio" class="fancy-radio" name="user_type" id="user_type" value="3">
                            Baby Sitter
                        </label>
                    </div>
                    <div class="radio col-sm-4">
                        <label>
                            <input type="radio" class="fancy-radio" name="user_type" id="user_type" value="4">
                            Sales Agent
                        </label>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <input type="submit" class="btn btn-lg custome_blue_btn col-xs-12 col-sm-4 col-sm-offset-4" value="Select User Type">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection