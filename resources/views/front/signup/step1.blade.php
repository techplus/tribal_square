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
                            <a href="#">
                                <img src="images/signup_fb_btn.png" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-sm-7 login_box_right">
                            <form action="#">
                                <div class="signup_radio_btn">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                            Service Provider
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            Sales Agent
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                            Baby Sitter
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    <input type="text" class="form-control login_input" placeholder="First Name">
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    <input type="text" class="form-control login_input" placeholder="Last Name">
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    <input type="email" class="form-control login_input" placeholder="Email">
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    <input type="password" class="form-control login_input" placeholder="Password">
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    <input type="password" class="form-control login_input" placeholder="Confirm Password">
                                </div>
                                <div class="form-group col-sm-11 col-xs-12">
                                    <img src="images/captcha.png" alt="" class="img-responsive">
                                </div>
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
                                    <a href="#" class="signup_link text-center">Already a member ?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection