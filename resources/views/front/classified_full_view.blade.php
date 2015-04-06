@extends($layout)
@section('content')
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
    @if( Auth::check() )
        <link href="{{asset('/css/style.css')}}" rel="stylesheet">
        <div class="panel panel-default">
            <div class="panel-heading">
                Baby Sitters
                <div class="pull-right" style="margin-top:-7px;">
                    @if( $sStatus == "Archived" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$classified->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$classified->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="Pending" data-id="{{$classified->id}}">Move To Pending</button>
                        <button class="btn btn-danger action" data-status="deleted" data-id="{{$classified->id}}">Delete Forever</button>
                    @elseif( $sStatus == "Pending" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$classified->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$classified->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$classified->id}}">Archive</button>
                    @elseif( $sStatus == "Approved" )
                        <button class="btn btn-success action" data-status="pending" data-id="{{$classified->id}}">Move To Pending</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$classified->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$classified->id}}">Archive</button>
                    @elseif( $sStatus == "Declined" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$classified->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="pending" data-id="{{$classified->id}}">Move To Pending</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$classified->id}}">Archive</button>                    
                    @endif                  
                </div>      
            </div>
            <div class="panel-body">                
                <div class="row">                                       
    @else
        <div class="page-wrap">
            <div class="row header_wrap">
                @include('layouts.front_navbar')
    @endif
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 style="font-size: 26px;font-weight: bold;">{{$classified->title}}
                            <div class="Discount_Tag">
                                {{$classified->ListingCategory->name}}
                            </div>
                        </h1>

                        <div class="clearfix"></div>

                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="margin-top:20px;">
                            <div class="col-sm-7 col-md-7 col-lg-8">
                                <div class="carousel slide article-slide" id="article-photo-carousel">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner cont-slider">
                                        <?php $counter = 1; ?>
                                        @foreach( $classified->ClassifiedImages AS $image )
                                            <div class="item {{$counter++ == 1 ? 'active' : ''}}">
                                                <img alt="" title="" src="{{$image->image_path}}" style="width: 100%;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <?php $counter = 0; ?>
                                        @foreach( $classified->ClassifiedImages AS $image )
                                            <li class="active" data-slide-to="{{ $counter++ }}" data-target="#article-photo-carousel">
                                                <img alt="" src="{{$image->image_path}}" class="img-responsive">
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-5 col-lg-4">
                                <div class="publish_deal_box">
                                    <div><label class="highlight">Condition: {{$classified->condition}}</label></div>
                                    <div><label class="highlight">Make/Manufacturer: {{$classified->manufacture}}</label></div>
                                    <div><label class="highlight">Model Name/Number: {{$classified->model_number}}</label></div>
                                    <div><label class="highlight">Size/Dimension: {{$classified->size}}</label></div>
                                </div>
                                <div class="pay_info">
                                    <div>Price : <strong>${{$classified->price}}</strong></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="quantity">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <a href="#contact_details" data-toggle="modal" type="button" class="btn btn-lg custome_blue_btn btn-block" aria-label="Left Align">
                                                 Reply
                                            </a>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 deal_content_wrap">
                                <div class="col-sm-8 deal_content_left">
                                    <h3>Classified Details</h3>
                                    <h4>What You're Getting</h4>
                                    {!! $classified->description !!}
                                    <h4>Features/Specifications :</h4>
                                    {!! $classified->fineprint !!}
                                </div>
                                <div class="col-sm-4">
                                    <h3>Contact Information</h3>
                                    <p>{{$classified->location2}}</p>
                                    <p>Telephone: {{$classified->phone}}</p>
                                    <p>E-mail: {{$classified->email}}</p>                                  
                                    <div class="google_map">
                                        <div class="img-responsive" id="map" style="height: 300px;"></div>                                        
                                    </div>
                                    <h4>Language Spoken</h4>
                                    <ul>
                                        <?php $languages = explode(',',$classified->language_spoken); ?>
                                        @foreach( $languages AS $lang )
                                            <li>{{$lang}}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>




                        </div>
                        
                            @include('layouts.front_sidebar')
                        

                    </div>
                </div>
            </div>
        </div>
        @if( Auth::check() )
            <div class="row">
                <div class="pull-right" style="margin-top:-7px;">
                    @if( $sStatus == "Archived" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$classified->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$classified->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="Pending" data-id="{{$classified->id}}">Move To Pending</button>
                        <button class="btn btn-danger action" data-status="deleted" data-id="{{$classified->id}}">Delete Forever</button>
                    @elseif( $sStatus == "Pending" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$classified->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$classified->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$classified->id}}">Archive</button>
                    @elseif( $sStatus == "Approved" )
                        <button class="btn btn-success action" data-status="pending" data-id="{{$classified->id}}">Move To Pending</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$classified->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$classified->id}}">Archive</button>
                    @elseif( $sStatus == "Declined" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$classified->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="pending" data-id="{{$classified->id}}">Move To Pending</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$classified->id}}">Archive</button>                    
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
            </div>
        @endif 
    </div>
    <div class="modal fade" id="contact_details">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center">Reply</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        @if( $classified->can_text OR $classified->can_photn )
                        <h3>Preferred Contact Method:</h3>
                            {!! $classified->can_text ? '<h5>- Email</h5>' : '' !!}
                            {!! $classified->can_phone ? '<h5>- Phone</h5>' : '' !!}
                        @endif
                        @if( ! empty( $classified->contact_name ) )
                        <h3>Contact Name:</h3>
                            <h5>{{$classified->contact_name}}</h5>
                        @endif
                        @if( ! empty( $classified->phone ) OR ! empty( $classified->mobile ) )
                        <h3>Contact By Phone:</h3>
                            @if( ! empty( $classified->phone ))
                                <a href="callto:{{$classified->phone}}"><i class="glyphicon glyphicon-earphone"></i> {{$classified->phone}}</a>
                            @endif
                            @if( ! empty( $classified->mobile ) )
                                <a href="callto:{{$classified->mobile}}"><i class="glyphicon glyphicon-earphone"></i> {{$classified->mobile}}</a>
                            @endif
                        @endif
                        @if( ! empty( $classified->email ) )
                        <h3>Contact By Email:</h3>
                            <a href="mailto:{{$classified->email}}"><i class="glyphicon glyphicon-globe"></i> {{$classified->email}}</a>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            function onSuccess($id,$sStatus)
            {
                 window.location = "{{ route('admin.posts.index') }}?status="+$sStatus;
            }
// Define the latitude and longitude positions
            var latitude = parseFloat("{{$classified->lat}}"); // Latitude get from above variable
            var longitude = parseFloat("{{$classified->long}}"); // Longitude from same
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
            @if( Auth::check() )
               @include('admin.posts.scripts')
            @endif
        });
    </script>
@stop