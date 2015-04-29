@extends('layouts.inspinia.inspinia')
@section('content')
    <style>
        .article-slide .carousel-indicators {
            bottom: 0;
            left: 0;
            margin-left: 5px;
            width: 100%;
        }
        /* Indicators list style */
        .article-slide .carousel-indicators li {
            border: medium none;
            border-radius: 0;
            float: left;
            height: 54px;
            margin-bottom: 5px;
            margin-left: 0;
            margin-right: 5px !important;
            margin-top: 0;
            width: 100px;
        }
        /* Indicators images style */
        .article-slide .carousel-indicators img {
            border: 2px solid #FFFFFF;
            float: left;
            height: 54px;
            left: 0;
            width: 100px;
        }
        /* Indicators active image style */
        .article-slide .carousel-indicators .active img {
            border: 2px solid #428BCA;
            opacity: 0.7;
        }
        .time_box {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            float: left;
            width: 100%;
        }
        .time_box_title {
            font-size: 18px;
            margin-bottom: 10px;
            font-family: 'ProximaNovaCondensedSemibold';
            text-transform: uppercase;
        }
        .time_box span {
            width: 25%;
            background-color: #fff;
            float: left;
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px 0;
            border-left: none;
            font-size: 24px;
        }
        .time_box:first-child span {
            border-left: 1px solid #ccc;
        }
        .time_box b {
            font-size: 14px;
            font-weight: normal;
        }
        .value_save {
            float: left;
            margin-top: 10px;
            width: 100%;
            border-bottom: 1px solid #ccc;
        }
        .value_save p {
            float: left;
            font-size: 16px;
        }
        .value_save span {
            float: right;
        }
        .pay_info {
            margin-top: 20px;
            float: left;
            width: 100%;
        }
        .pay_info div {
            float: left;
            font-size: 22px;
        }
        .pay_info span {
            float: right;
        }
        .quantity {
            margin-top: 20px;
            float: left;
            width: 100%;
        }
    </style>
    <script>
        // Stop carousel
        $('.carousel').carousel({
            interval: false
        });
    </script>
    <style>
        .highlight {
            padding:10px;
            background: #FAFAFA;
            border: 1px solid #DFDFDF;
            border-radius: 4px;
        }
    </style>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{$deal->title}}</h5>
        </div>
        <div class="ibox-content">
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 style="font-size: 26px;font-weight: bold;">{{$deal->title}}
                            <div class="Discount_Tag">
                                {{$deal->discount_percentage}}% Discount
                            </div>
                        </h1>

                        <div class="clearfix"></div>

                        <div class="col-xs-12" style="margin-top:20px;">
                            <div class="col-sm-7 col-md-7 col-lg-8">
                                <div class="carousel slide article-slide" id="article-photo-carousel">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner cont-slider">
                                        @if( $deal->DealImages->count() > 0 )
                                            <?php $counter = 1; ?>
                                            @foreach( $deal->DealImages AS $image )
                                                <div class="item {{$counter++ == 1 ? 'active' : ''}}">
                                                    <img alt="" title="" src="{{$image->image_path}}" style="width: 100%;">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="item active">
                                                <img alt="" title="" src="{{ url('images/no_image.png') }}" style="width: 100%;">
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @if( $deal->DealImages->count() > 0 )
                                            <?php $counter = 0; ?>
                                            @foreach( $deal->DealImages AS $image )
                                                <li class="active" data-slide-to="{{ $counter++ }}" data-target="#article-photo-carousel">
                                                    <img alt="" src="{{$image->image_path}}" class="img-responsive">
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="active" data-slide-to="0" data-target="#article-photo-carousel">
                                                <img alt="" src="{{ url('images/no_image.png') }}" class="img-responsive">
                                            </li>
                                        @endif
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
                                    <form class="form-horizontal" id="frmdeal" name="frmdeal">
                                        <div class="form-group">
                                            <label class="col-sm-8 control-label">Quantity</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="quantity">
                                                    <option selected>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg custome_blue_btn btn-block buy-now btn-primary" disabled aria-label="Left Align" {{ (Auth::check()) ? 'disabled' : '' }}>
                                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Buy Now
                                            </button>
                                        </div>
                                        <input type="hidden" name="deal_id" value="{{ $deal->id }}">
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
                                    <!-- <img src="http://placehold.it/300x150" alt="" class="img-responsive"> -->
                                    <p>{{$deal->location}}</p>
                                    <p>Telephone: {{$deal->contact}}.</p>
                                    <p>E-mail: {{$deal->email}}</p>
                                    <div class="google_map">
                                        <div class="img-responsive" id="map" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
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
            function onSuccess($id,$sStatus)
            {
                window.location = "{{ route('admin.deals.index') }}?status="+$sStatus;
            }
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

                $('.buy-now').on('click',function(){
                    var $this = $(this);
                    $.ajax({
                        beforeSend : function()
                        {
                            $this.prop('disabled','disabled');
                        },
                        url : "{{ url('shopping-cart/set-session') }}",
                        type : "post",
                        data : $('#frmdeal').serialize(),
                        dataType : "json",
                        success : function(json)
                        {
                            window.location.href = '{{ url("shopping-cart") }}';
                        },
                        error : function(xhr, status, error)
                        {
                            alert(xhr.responseText);
                        },
                        complete : function()
                        {
                            $this.removeAttr('disabled');
                        }
                    });
                });
                @if( Auth::check() )
                @include('admin.deals.scripts')
                @endif
            });
        </script>
@stop