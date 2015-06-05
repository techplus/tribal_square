@extends($layout)
@section('content')
        <script>
            // Stop carousel
        $('.carousel').carousel({
            interval: false
        });
    </script>

    @if(  Auth::check() )
        @if(Request::segment(1) != "search") 
        <link href="{{asset('/css/style.css')}}" rel="stylesheet">
        <div class="panel panel-default">
            <div class="panel-heading">
                Deals
                <div class="pull-right" style="margin-top:-7px;">
                    @if( $sStatus == "Archived" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$deal->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$deal->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="Pending" data-id="{{$deal->id}}">Move To Pending</button>
                        <button class="btn btn-danger action" data-status="deleted" data-id="{{$deal->id}}">Delete Forever</button>
                    @elseif( $sStatus == "Pending" )
                        <button class="btn btn-success action" data-status="approved" data-email="{{$deal->email}}" data-firstname="{{$deal->Owner->firstname}}" data-lastname="{{$deal->Owner->lastname}}" data-id="{{$deal->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$deal->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$deal->id}}">Archive</button>
                    @elseif( $sStatus == "Approved" )
                        <button class="btn btn-success action" data-status="pending" data-id="{{$deal->id}}">Move To Pending</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$deal->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$deal->id}}">Archive</button>
                    @elseif( $sStatus == "Declined" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$deal->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="pending" data-id="{{$deal->id}}">Move To Pending</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$deal->id}}">Archive</button>                    
                    @endif

                </div>      
            </div>
            <div class="panel-body">                
                <div class="row"> 
                    <div style="position:relative;width:100%;height:100%;">
                        <div style="position: absolute;opacity:0;width:100%;height:100%;z-index:1030;"></div>                                       
        @endif
        @if(Request::segment(1) == "search")
        <div class="row header_wrap new_header_wrap">    
            @include('layouts.front_navbar')
        </div>    
        @endif    
    @else
        <div class="page-wrap">
            @if(Request::segment(1) == "search")
            <div class="row header_wrap new_header_wrap">
                @include('layouts.front_navbar')

            @endif   
            <!--    @include('layouts.front_navbar') -->
                <style>
                    .error{
                        border:1px solid #ff0000;
                    }
                </style>
    @endif
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 style="font-size:26px;">{{$deal->title}}
                            <div class="Discount_Tag">
                                <span class="glyphicon glyphicon-tag"></span>
                                {{$deal->discount_percentage}}% Discount
                            </div>
                        </h1>

                        <!-- <div class="clearfix"></div> -->

                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="margin-top:20px;">
                            <div class="col-sm-7 col-md-7 col-lg-8">
                                <div class="carousel slide article-slide" id="article-photo-carousel">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner cont-slider">
                                        @if( $deal->DealImages->count() > 0 )
                                            <?php $counter = 1; ?>                                        
                                            @foreach( $deal->DealImages AS $image )
                                            <div class="item {{$counter++ == 1 ? 'active' : ''}}">
                                                <img alt="" title="" src="{{Image::url($image->image_path,600,400)}}" style="width: 100%;max-width:600px;height:400px;">
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="item active">
                                                <img alt="" title="" src="{{ Image::url(url('images/no_image.png'),600,400) }}" style="width: 100%;">
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @if( $deal->DealImages->count() > 0 )
                                            <?php $counter = 0; ?>
                                            @foreach( $deal->DealImages AS $image )
                                            <li class="active" data-slide-to="{{ $counter++ }}" data-target="#article-photo-carousel">
                                                <img alt="" src="{{Image::url($image->image_path,250,180)}}" class="img-responsive">
                                            </li>
                                            @endforeach
                                        @else
                                            <li class="active" data-slide-to="0" data-target="#article-photo-carousel">
                                                <img alt="" src="{{ Image::url(url('images/no_image.png'),250,180) }}" class="img-responsive">
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
                                    <?php $qty = 0; 
                                        if($deal->Purchases->count() > 0)
                                        {
                                            foreach( $deal->Purchases as $purchase )
                                            {
                                                $qty += $purchase->quantity;
                                            }
                                        }
                                     ?>
                                    <span>Sold : {{ $qty }} </span>
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
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-5 col-md-5 control-label" style="text-align: left;">Refferel code</label>
                                            <div class="col-sm-7 col-md-7">
                                                <input type="text" name="refferel_code" id="refferel_code" class="form-control required">
                                            </div>
                                            <div class="col-sm-12 error-refferel" style="display: none;color:#ff0000;">
                                                <span class="pull-right"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg custome_blue_btn btn-block buy-now" aria-label="Left Align" {{ (Auth::check()) ? 'disabled' : '' }}>
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
                        @if(  Auth::check() )
                            @if(Request::segment(1) == "search") 
                                @include('layouts.front_sidebar')
                            @endif    
                        @else
                            @include('layouts.front_sidebar')
                        @endif    

                    </div>                 
                </div>                  
            </div> 

        </div>
        @if( Auth::check() )
            </div>

            <div class="row">
            @if(Request::segment(1) != "search")     
                <div class="pull-right">
                            @if( $sStatus == "Archived" )
                                <button class="btn btn-success action" data-status="approved" data-id="{{$deal->id}}">Approve</button>&nbsp;
                                <button class="btn btn-danger action" data-status="declined" data-id="{{$deal->id}}">Decline</button>
                                <button class="btn btn-danger action" data-status="Pending" data-id="{{$deal->id}}">Move To Pending</button>
                                <button class="btn btn-danger action" data-status="deleted" data-id="{{$deal->id}}">Delete Forever</button>
                            @elseif( $sStatus == "Pending" )
                                <button class="btn btn-success action" data-status="approved" data-email="{{$deal->email}}" data-firstname="{{$deal->Owner->firstname}}" data-lastname="{{$deal->Owner->lastname}}" data-id="{{$deal->id}}">Approve</button>&nbsp;
                                <button class="btn btn-danger action" data-status="declined" data-id="{{$deal->id}}">Decline</button>
                                <button class="btn btn-danger action" data-status="archived" data-id="{{$deal->id}}">Archive</button>
                            @elseif( $sStatus == "Approved" )
                                <button class="btn btn-success action" data-status="pending" data-id="{{$deal->id}}">Move To Pending</button>&nbsp;
                                <button class="btn btn-danger action" data-status="declined" data-id="{{$deal->id}}">Decline</button>
                                <button class="btn btn-danger action" data-status="archived" data-id="{{$deal->id}}">Archive</button>
                            @elseif( $sStatus == "Declined" )
                                <button class="btn btn-success action" data-status="approved" data-id="{{$deal->id}}">Approve</button>&nbsp;
                                <button class="btn btn-danger action" data-status="pending" data-id="{{$deal->id}}">Move To Pending</button>
                                <button class="btn btn-danger action" data-status="archived" data-id="{{$deal->id}}">Archive</button>                    
                            @endif
                                                    <!-- Modal -->
                            <div class="modal fade" id="confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to <span id="status_field"></span>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="confirm_btn">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                  
                </div>
            @endif    
            </div>
        @endif 
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
            //console.log($sStatus);
            if($sStatus == 'pending')
                window.location = "{{ route('admin.deals.index') }}?status=approved";
            else if($sStatus == 'approved')
                window.location = "{{ route('admin.deals.index') }}?status=pending";

                //window.location = "{{ route('admin.deals.index') }}?status="+$sStatus;
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
                        $('.error-refferel').hide();
                        $('#refferel_code').removeClass('error');
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
                        var obj = JSON.parse(xhr.responseText);
                        if( obj.error == "Sorry, the code isn't exist" ) {
                            $('#refferel_code').addClass('error');
                            $('.error-refferel').find('span').html(obj.error);
                            $('.error-refferel').show();
                        }
                        else
                            alert(obj.error );
                    },
                    complete : function()
                    {
                        $this.removeAttr('disabled'); 
                    }
                });
            });
            $('#refferel_code').on('keypress',function(){
                $('.error-refferel').hide();
                $('#refferel_code').removeClass('error');
            });
            @if( Auth::check() )
               @include('admin.deals.scripts')
            @endif
        });
    </script>
@stop