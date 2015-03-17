@extends('layouts.front')

@section('content')
    <div class="page-wrap">
        <div class="row header_wrap">
            @include('layouts.front_navbar')
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>{{$deal->title}}
                            <div class="Discount_Tag">
                                <span class="glyphicon glyphicon-tag"></span>
                                {{$deal->discount_percentage}}% Discount
                            </div>
                        </h1>

                        <div class="clearfix"></div>

                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="margin-top:20px;">
                            <div class="col-sm-7 col-md-7 col-lg-8">
                                <div class="carousel slide article-slide" id="article-photo-carousel">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner cont-slider">
                                        @foreach( $deal->DealImages AS $image )
                                        <div class="item active">
                                            <img alt="" title="" src="{{$image->image_path}}" style="width: 100%;">
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @foreach( $deal->DealImages AS $image )
                                        <li class="active" data-slide-to="0" data-target="#article-photo-carousel">
                                            <img alt="" src="{{$image->image_path}}" class="img-responsive">
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-5 col-lg-4">

                                <div class="time_box">
                                    <div class="time_box_title">Hurry up! Offer expires in</div>
                                    <div id="countdown"></div>
                                </div>
                                <div class="value_save">
                                    <p>Value : ${{$deal->original_price}}</p>
                                    <span>You Save : ${{$deal->original_price - $deal->new_price}}</span>
                                </div>
                                <div class="pay_info">
                                    <div>You pay : <strong>${{$deal->new_price}}</strong></div>
                                    <span>Sold : 7</span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="quantity">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-8 control-label">Quantity</label>
                                            <div class="col-sm-4">
                                                <select class="form-control">
                                                    <option selected>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg custome_blue_btn btn-block" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 deal_content_wrap">
                                <div class="col-sm-8 deal_content_left">
                                    <h3>Coupon Details</h3>
                                    <h4>What You're Getting</h4>
                                    {!! $deal->description !!}
                                    <h4>Features/Specifications :</h4>
                                    {!! $deal->fineprint !!}
                                </div>
                                <div class="col-sm-4">
                                    <h3>Contact Information</h3>
                                    <img src="http://placehold.it/300x150" alt="" class="img-responsive">
                                    <h4>Dental Associations</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    <div class="google_map">
                                        <div class="img-responsive" id="map" style="height: 300px;"></div>
                                        <br>
                                        <p>{{$deal->location}}</p>
                                        <p>Telephone: {{$deal->contact}}.</p>
                                        <p>E-mail: {{$deal->email}}</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        @include('layouts.front_deals_sidebar')



                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // set the date we're counting down to
        var dateParts = '{{$deal->end_date}}'.split("-");
        var jsDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));
        var target_date = jsDate.getTime();

        // variables for time units
        var days, hours, minutes, seconds;

        // get tag element
        var countdown = document.getElementById('countdown');

        // update the tag with id "countdown" every 1 second
        setInterval(function () {

            // find the amount of "seconds" between now and target
            var current_date = new Date().getTime();
            var seconds_left = (target_date - current_date) / 1000;

            // do some time calculations
            days = parseInt(seconds_left / 86400);
            seconds_left = seconds_left % 86400;

            hours = parseInt(seconds_left / 3600);
            seconds_left = seconds_left % 3600;

            minutes = parseInt(seconds_left / 60);
            seconds = parseInt(seconds_left % 60);

            // format countdown string + set tag value
            countdown.innerHTML = '<span class="days">' + days +  ' <br/><b>Days</b></span> <span class="hours">' + hours + ' <br/><b>Hours</b></span> <span class="minutes">'
            + minutes + ' <br/><b>Minutes</b></span> <span class="seconds">' + seconds + ' <br/><b>Seconds</b></span>';

        }, 1000);
    </script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
// Define the latitude and longitude positions
            var latitude = parseFloat("{{$deal->lat}}"); // Latitude get from above variable
            var longitude = parseFloat("{{$deal->long}}"); // Longitude from same
            var latlngPos = new google.maps.LatLng(latitude, longitude);
// Set up options for the Google map
            var myOptions = {
                zoom: 10,
                center: latlngPos,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoomControlOptions: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE
                }
            };
// Define the map
            map = new google.maps.Map(document.getElementById("map"), myOptions);
// Add the marker
            var marker = new google.maps.Marker({
                position: latlngPos,
                map: map,
                title: "test"
            });
        });
    </script>
@stop