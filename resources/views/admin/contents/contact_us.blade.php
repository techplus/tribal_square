@extends('layouts.admin')
@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <div class="panel panel-default">
        <div class="panel-heading">
            Contact Us
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                @if( session('success') )
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form class="form-horizontal" id="main_form" method="post" action="{{route('admin.contact-us.store')}}">
                    <div class="form-group">
                        <label class="col-sm-3">Location:</label>
                        <div class="col-sm-9">
                            <input type="text" name="location" id="autocomplete1" value="{{$content['location'] ? $content['location']->descriptions : ''}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div id="map_canvas" style="width:100%;height:350px;float:left"></div>
                        </div>
                    </div>
                        <div class="clearfix"></div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label class="col-sm-3">Phone Number:</label>
                        <div class="col-sm-9">
                            <input type="text" name="phone_no" class="form-control" value="{{$content['phone'] ? $content['phone']->descriptions : ''}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="button" onclick="$('form#main_form').submit()" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var autocomplete1;
        var placeSearch;
        var map,marker;
        function initialize() {
            // Create the autocomplete object, restricting the search
            // to geographical location types.
            autocomplete1 = new google.maps.places.Autocomplete(
                    /** @type {HTMLInputElement} */(document.getElementById('autocomplete1')),
                    { types: ['geocode'] });
            // When the user selects an address from the dropdown,
            // populate the address fields in the form.
            google.maps.event.addListener(autocomplete1, 'place_changed', function() {
                fillInAddress();
            });
            var latitude = 0;
            var longitude = 0;
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
        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete1.getPlace();
            place.geometry.location.lat();
            var location    =   new google.maps.LatLng(place.geometry.location.lat(),place.geometry.location.lng());
            marker          =   new google.maps.Marker({
                map:map,
                draggable:true
            })
            marker.setPosition(location);
            map.setCenter(location);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.

    </script>
@endsection