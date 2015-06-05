@extends('layouts.front')
@section('content')
    <link rel="stylesheet" href="{{asset('css/style_home.css')}}">
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

    <div class="page-wrap">
        <div class="row header_wrap new_header_wrap">
            <div class="row">
                <div class="container">
                    <div class="signin_box">
                        <h1>Contact Us</h1>
                        <div class="col-sm-6 login_box_left" style="padding-top: 25px;border-right: 1px solid #7a7a7a">
                            @if(session('success') )
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            <form action="" method="post">
                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                <h4 style="font-size: 18px;">Post your comments or questions in the <a href="http://forum.tribalsquare.com/" target="_blank">forum</a> or contact us directly by filling out the form below</h4>
                                <div class="form-group col-sm-11 col-xs-12 {{$errors->has('name') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control login_input" name="name" placeholder="Name" value="{{old('name')}}">
                                    @if( $errors->has('name') ) <p class="help-block">{{$errors->first('name')}}</p> @endif
                                </div>
                                <div class="form-group col-sm-11 col-xs-12 {{$errors->has('email') ? 'has-error' : '' }}">
                                    <input type="email" class="form-control login_input" placeholder="Email" name="email" value="{{old('email')}}">
                                    @if( $errors->has('email') ) <p class="help-block">{{$errors->first('email')}}</p> @endif
                                </div>
                                <div class="form-group col-sm-11 col-xs-12 {{$errors->has('phone') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control login_input" placeholder="Phone" name="phone" value="{{old('phone')}}">
                                    @if( $errors->has('phone') ) <p class="help-block">{{$errors->first('phone')}}</p> @endif
                                </div>
                                <div class="form-group col-sm-11 col-xs-12 {{$errors->has('subject') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control login_input" placeholder="Subject" name="subject" value="{{old('subject')}}">
                                    @if( $errors->has('subject') ) <p class="help-block">{{$errors->first('subject')}}</p> @endif
                                </div>
                                <div class="form-group col-sm-11 col-xs-12 {{$errors->has('description') ? 'has-error' : '' }}">
                                    <textarea class="form-control login_input" placeholder="description" name="description" >{{old('description')}}</textarea>
                                    @if( $errors->has('description') ) <p class="help-block">{{$errors->first('description')}}</p> @endif
                                </div>

                                <div class="form-group col-sm-11 col-xs-12">
                                    <input type="submit" class="btn btn-lg btn-block custome_blue_btn" value="Submit">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6 login_box_right" style="border-left: none;">
                            <h6>Location: {{$content['location'] ? $content['location']->descriptions : ''}}</h6>
                            <div id="map_canvas" style="width:100%;height:200px;float:left"></div>
                            <div class="clearfix"></div>
                            <h4>Phone: {{$content['phone'] ? $content['phone']->descriptions : ''}}</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<div class="push"></div>
</div>
<style type="text/css">
.wrapper {
    min-height: 100%;
    height: auto !important;
    height: 100%;
}
.footer_wrap
{
    width: 100%;
    float: left;
}

</style>
    <script type="text/javascript">
        function initialize() {
            // Create the autocomplete object, restricting the search
            // to geographical location types.
            var myLatlong   =   new google.maps.LatLng(-33.924868,18.424055);
            var myOptions   =   {
                zoom:8,
                center:myLatlong,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            map          =   new google.maps.Map(document.getElementById('map_canvas'),myOptions);
            geocoder      =   new google.maps.Geocoder();
            var address = '{{$content['location']->descriptions}}';
            if( address.length ) {
                geocoder.geocode( { 'address' : address } , function ( results , status ) {
                    if ( status == google.maps.GeocoderStatus.OK ) {
                        map.setCenter( results[ 0 ].geometry.location );
                        var marker = new google.maps.Marker( {
                            map      : map ,
                            position : results[ 0 ].geometry.location
                        } );
                    } else {
                        alert( "Geocode was not successful for the following reason: " + status );
                    }
                } );
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
