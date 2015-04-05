  	<link href="{{ asset('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jQueryUI/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/js/plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('inspinia/css/summernote.css') }}">      
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <style>
        .wizard > .content > .body{
            position: relative;
        }
        .form-horizontal .control-label{
            text-align: left !important;
        }
        .note-editable {
            background: #fff;
        }
	      .thumbnail img {
	        height: 200px;
	      }
          label label.error {
            display: none !important;
        }
    </style>    
    <script type="text/javascript" src="{{ asset('inspinia/js/jquery.form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('inspinia/js/summernote.js') }}"></script>
    <script src="{{asset('inspinia/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('inspinia/js/plugins/plupload/plupload.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('inspinia/js/plugins/plupload/moxie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('inspinia/js/plugins/plupload/jquery.ui.plupload/jquery.ui.plupload.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
     <!-- Input Mask-->
    <script src="{{ asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>    
    <script>
    var autocomplete1;   
    var placeSearch;
    var componentForm = {
          street_number: 'short_name',
          route: 'long_name',
          locality: 'long_name',
          administrative_area_level_1: 'short_name',
          country: 'long_name',
          postal_code: 'short_name'
    };
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
    }
    function fillInAddress() {
          // Get the place details from the autocomplete object.
          var place = autocomplete1.getPlace();
        $('#lat_val' ).val(place.geometry.location.lat());
        $('#long_val' ).val(place.geometry.location.lng());
          for (var component in componentForm) {
            if( $('#'+component ).length ) {
                document.getElementById( component ).value = '';
                document.getElementById( component ).disabled = false;
            }
          }
          // Get each component of the address from the place details
          // and fill the corresponding field on the form.
          for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];

            if (componentForm[addressType]) {
              var val = place.address_components[i][componentForm[addressType]];
                if( $('#'+addressType ).length )
                    document.getElementById(addressType).value = val;
            }
        }
    }    
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
              var geolocation = new google.maps.LatLng(
                  position.coords.latitude, position.coords.longitude);
              var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
                });
                autocomplete1.setBounds(circle.getBounds());
            });
        }
    }   
    </script> 
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>
                    @if(! $oDeal->id )
                    	Create New Deal
                    @else
                    	Edit Deal
                    @endif
                    </h5>
                    <!-- <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>                              
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div> -->
                </div>
                <div class="ibox-content">                                                 
                    <form name="frmDeal" id="frmDeal" class="wizard-big wizard clearfix form-horizontal" action="#">                                           
                        <h1>Profile</h1>
                        <fieldset>    
                        	<input type="hidden" name="id" class="deal_id" value="{{$oDeal->id}}">                                   	                           
                            <div class="row">      
                            	<div class="col-lg-12">
                            		<div class="col-lg-6">
	                                    <div class="form-group">
	                                        <label class="control-label col-lg-4">Deal Title *</label>
	                                        <div class="col-lg-8">
	                                            <input type="text" name="title" id="title" value="{{$oDeal->title}}" class="required form-control">
	                                        </div>
	                                    </div>
	                                     <div class="form-group">
	                                        <label class="control-label col-lg-4">Deal Type *</label>
	                                        <div class="col-lg-8">
	                                            <select class="form-control required" name="category_id">
	                                            	<option value="">Select</option>
	                                            	@if ( $aListingCategories->count() > 0 )
	                                            		@foreach ( $aListingCategories as $oCat )
	                                            			<option value="{{ $oCat->id }}" {{ ( $oDeal->category_id == $oCat->id ) ? 'selected' : '' }}>{{ $oCat->name }}</option>
	                                            		@endforeach
	                                            	@endif
	                                            </select>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label class="control-label col-lg-4">Available Stock *</label>
	                                        <div class="col-lg-8">
	                                            <input type="text" name="available_stock" id="available_stock" value="{{$oDeal->available_stock}}" class="required form-control">
	                                        </div>
	                                    </div>
	                                    <div class="form-group" id="data_1">
	                                        <label class="control-label col-lg-4">Start Date *</label>
	                                        <div class="col-lg-8">
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" name="start_date" id="start_date" value="{{ ( $oDeal->start_date ) ? date('m/d/Y',strtotime($oDeal->start_date)) : '' }}" class="required form-control" placeholder="">
                                                    </div>
	                                        </div>
	                                    </div>

                                        <div class="form-group" id="data_2">
	                                        <label class="control-label col-lg-4">Expiration Date *</label>
	                                        <div class="col-lg-8">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="end_date" id="end_date" value="{{( $oDeal->end_date ) ? date('m/d/Y',strtotime($oDeal->end_date)) : '' }}" class="required form-control" placeholder="">
                                                </div>
	                                        </div>
	                                    </div>                                      
	                                </div>
	                                <div class="col-lg-6">
	                                    <div class="form-group">
	                                        <label class="control-label col-lg-4">Original Price *</label>
	                                        <div class="col-lg-8">
	                                            <input type="text" name="original_price" id="original_price" value="{{$oDeal->original_price}}" class="required form-control">
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label class="control-label col-lg-4">New Price *</label>
	                                        <div class="col-lg-8">
	                                            <input type="text" name="new_price" id="new_price" value="{{$oDeal->new_price}}" class="required form-control">
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label class="control-label col-lg-4">%off from Original Price*</label>
	                                        <div class="col-lg-8">
	                                            <input type="text" name="discount_percentage" id="discount_percentage" value="{{$oDeal->discount_percentage}}" class="required form-control" readonly="">
	                                        </div>
	                                    </div>
	                                </div>	                                
                                </div>    
                                <div class="col-lg-12">
                                	<div class="col-lg-10">                                                                
                                		<div class="form-group">
	                                        <label class="control-label col-lg-2">Description *</label>
	                                        <div class="col-lg-10" style="padding-left:45px;">
	                                            <textarea name="description" id="description" class="form-control">{{$oDeal->description}}</textarea>
	                                        </div>
	                                    </div>   
	                                    <div class="form-group">
	                                        <label class="control-label col-lg-2">Fine Print *</label>
	                                        <div class="col-lg-10" style="padding-left:45px;">
	                                            <textarea name="fine_print" id="fine_print" class="form-control">{{$oDeal->fineprint}}</textarea>
	                                        </div>
	                                    </div>                                    
                                    </div>
                                	<div class="col-lg-2">
                                	</div>
                                </div>          
                                <div class="col-lg-12" style="padding-left:30px;">
                                	<h3>
                                		<b>
                                			<u>
                                				Location Details
                                			</u>
                                		</b>
                                	</h3>
                                </div>        	                                                             
                                <div class="col-lg-12">
                                     <div class="form-group">
                                         <label class="control-label col-lg-2" style="padding-left:30px;">Location</label>
                                         <div class="col-lg-10" style="padding-left:25px;">
                                            <input type="text"  onFocus="geolocate()" name="location" id="autocomplete1" value="{{$oDeal->location}}" class="form-control required">
                                        </div>
                                    </div>    
								                  </div>
                  								<div class="col-lg-12"> 
                  									<div class="col-lg-6">									                                                                   
	                                    <div class="form-group">
	                                         <label class="control-label col-lg-4">Street</label>
	                                         <div class="col-lg-8">
	                                            <input type="text" name="street1" id="street_number" value="{{$oDeal->street1}}" class="form-control" readonly>
	                                        </div>	                                        
	                                    </div>
	                                     <div class="form-group">
	                                         <label class="control-label col-lg-4">City</label>
	                                         <div class="col-lg-8">
	                                            <input type="text" name="city" id="locality" value="{{$oDeal->city}}" class="form-control" readonly>
	                                        </div>
	                                    </div>
	                                     <div class="form-group">
	                                         <label class="control-label col-lg-4">Country</label>
	                                         <div class="col-lg-8">
	                                            <input type="text" name="country" id="country" value="{{$oDeal->country}}" class="form-control" readonly>
	                                        </div>
	                                    </div>
	                                    
									                   </div>
                  									 <div class="col-lg-6">	 
                  									   <div class="form-group">                                   	                                   
                  									   		<div class="col-lg-12">
	                                            <input type="text" name="street2" id="route" value="{{$oDeal->street2}}" class="form-control" readonly>
	                                        </div>
									                   </div>
	                                   <div class="form-group">
	                                         <label class="control-label col-lg-4">State</label>
	                                         <div class="col-lg-8">
	                                            <input type="text" name="state" id="administrative_area_level_1" value="{{$oDeal->state}}" class="form-control" readonly>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                         <label class="control-label col-lg-4">Pin</label>
	                                         <div class="col-lg-8">
	                                            <input type="text" name="pin" id="postal_code" value="{{$oDeal->pin}}" class="form-control" readonly>
	                                        </div>
	                                    </div>
									</div>	                                    	                                    	                                    	                                    
                                </div>  
                                <div class="col-lg-12" style="padding-left:30px;">
                                	<h3>
                                		<b>
                                			<u>
                                				Contact Details
                                			</u>
                                		</b>
                                	</h3>
                                </div>  
                                <div class="col-lg-12">
                                	<div class="col-lg-6">
	                                	<div class="form-group">
	                                            <label class="col-lg-4 control-label">Website *</label>
	                                            <div class="col-lg-8">
	                                                <input id="website" name="website" type="text" value="{{$oDeal->website}}" class="form-control required">
	                                            </div>
	                                    </div>                                   	                            		
	                                    <div class="form-group">
	                                            <label class="col-lg-4 control-label">Contact Number *</label>
	                                            <div class="col-lg-8">
	                                                <input id="contact" name="contact" type="text" value="{{$oDeal->contact}}" class="form-control required">
	                                            </div>
	                                    </div>                                	
	                                    <div class="form-group">
	                                            <label class="col-lg-4 control-label">Email *</label>
	                                            <div class="col-lg-8">
	                                                <input id="email" name="email" type="text" value="{{$oDeal->email}}" class="form-control required">
	                                            </div>
	                                    </div>
	                                </div>
	                                <div class="col-lg-6">
	                                </div>
                                </div>                                                          
                                <input type="hidden" id="lat_val" name="lat" value="{{$oDeal->lat}}">
                                <input type="hidden" name="long" id="long_val" value="{{$oDeal->long}}">
                            </div>
                        </fieldset>
                        <h1>Images</h1>
                                <fieldset>
                                    <div class="col-md-12" id="deal_images" style="margin-bottom:20px;">
                                    @if( $oDeal->DealImages->count() > 0 )
                                        @foreach($oDeal->DealImages as $oImage )
                                        <div class="col-md-3" id="media_{{$oImage->id}}">
                                                <div class="radio text-right">
                                                    <label>
                                                        <input type="radio" {{$oImage->is_cover ? 'checked' : ''}} value="{{$oImage->id}}" class="required" name="is_cover"> Cover Photo
                                                    </label>
                                                </div>
                                            <a href="{{$oImage->image_path}}" target="_blank" class="thumbnail">
                                                <?php $ext = pathinfo($oImage->image_path,PATHINFO_EXTENSION); ?>
                                                @if( $ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png')
                                                    <img src="{{$oImage->image_path}}">
                                                @else
                                                    <img src="{{url('images/video.png')}}">
                                                @endif
                                            </a>
                                            <button type="button" class="btn btn-block btn-primary" onclick="removeAttachment({{$oImage->id}},'images')"><i class="fa fa-trash"></i> Delete</button>
                                        </div>
                                        @endforeach
                                    @endif
                                    </div>
                                    <hr>
                                    <div class="clearfix"></div>
                                    <div id="uploader">
                                        <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                                    </div>
                                </fieldset>

                                <h1>Video</h1>
                                <fieldset>
                                    <div class="col-md-12" id="deal_videos" style="margin-bottom:20px;">
                                        @if( $oDeal->DealVideos->count() > 0 )
                                            @foreach($oDeal->DealVideos as $oImage )
                                                <div class="col-md-3" id="media_{{$oImage->id}}">
                                                    <a href="{{$oImage->video_path}}" target="_blank" class="thumbnail">
                                                        <?php $ext = pathinfo($oImage->video_path,PATHINFO_EXTENSION); ?>
                                                        @if( $ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png')
                                                            <img src="{{$oImage->video_path}}">
                                                        @else
                                                            <img src="{{url('images/video.png')}}">
                                                        @endif
                                                    </a>
                                                    <button type="button" class="btn btn-block btn-primary" onclick="removeAttachment({{$oImage->id}},'video')"><i class="fa fa-trash"></i> Delete</button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Video URL:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="video_url" placeholder="Video URL">
                                        </div>
                                    </div>
                                    <h3 class="text-center">OR</h3>
                                    <div id="video_uploader">
                                        <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                                    </div>
                                </fieldset>
                    </form>
                </div>
            </div>                   
        </div>
    </div>
	<!-- Steps -->
    <script src="{{ asset('inspinia/js/plugins/staps/jquery.steps.js') }}"></script>    
    <!-- Jquery Validate -->
    <script src="{{ asset('inspinia/js/plugins/validate/jquery.validate.min.js') }}"></script>
	<script>
         var uploader;

         // check date is valid date or not
         function is_valid_date( dat )
         {
           var sDate = dat;
           var comp = sDate.split('/');
           var m = parseInt( comp[0] , 10 );
           var d = parseInt( comp[1] , 10 );
           var y = parseInt( comp[2] , 10 );
           var date = new Date(y,m-1,d);
           if( date.getFullYear() == y && date.getMonth() + 1 == m && date.getDate() == d){
              return true;
           }
           else
              return false;
         }

         //compare start and end date
         function compare_dates( dat1,dat2,msg )
         {
             var sDate = dat1;
             var comp = sDate.split('/');
             var date1 = new Date(parseInt( comp[2] , 10 ),parseInt( comp[0] , 10 ) - 1 ,parseInt( comp[1] , 10 ));

             sDate = dat2;
             comp = sDate.split('/');            
             var date2 = new Date(parseInt( comp[2] , 10 ),parseInt( comp[0] , 10 ) - 1 ,parseInt( comp[1] , 10 ));

            if( date1 > date2 )
            {
              alert(msg);
              return false;
            }
            return true;
         }

        // pre-submit callback
        function showRequest(formData, jqForm, options)
        {
           return true;
        }	

        // deal-submit callback  
        function showResponse(responseText, statusText, xhr, $form)
        {
            $('.deal_id').val( responseText.id );
            $('#uploader' ).plupload('getUploader' ).settings.url = "{{url('deals')}}" + "/" + responseText.id + "/images";
            $('#video_uploader' ).plupload('getUploader' ).settings.url = "{{url('deals')}}" + "/" + responseText.id + "/videos";                                  
        }

        function setSession()
        {
            $.ajax({
              url : "{{ url('set-success-session-deal') }}",
              data : {},
              async : false,
              success : function()
              {
                window.location.href = "{{ route('deals.index') }}";
              }
            });
        }

        function saveData(form)
        {
            @if(! $oDeal->id )
                var url = '{{ route("deals.store") }}';
                var type = 'post';
            @endif
            if( $('.deal_id').val().length > 0 )
            {
                url = '{{ url("deals") }}' + "/" + $('.deal_id').val();
                type = 'put';
                form.attr('action','{{url('deals')}}/'+$('.deal_id' ).val() + '/images');
            }            
            var options = { 
                target:        '#output2',   // target element(s) to be updated with server response 
                beforeSubmit:  showRequest,  // pre-submit callback 
                success:       showResponse, // post-submit callback                                    
                url : url,
                data:{description:$('#description').code(),fineprint:$('#fine_print').code()},
                async : false,
                type : type,
                dataType : "json",
                error : function(resp)
                {                  
                  var data = $.parseJSON(resp.responseText);
                  alert(data.msg);                  
                  return false;
                }                                                                                                 
                //timeout:   3000 
            };
            form.ajaxSubmit(options);           
        }
        function calculateDiscount()
        {
          var orig_price = parseFloat( $('#original_price').val() );
          var new_price = parseFloat( $('#new_price').val() );
          var discount = 0;
          if( orig_price >= 1 )
          {
            discount = ( new_price * 100 ) / orig_price ;  
            discount = discount.toFixed(2);
          }          
           $('#discount_percentage').val(discount);
        }
        $(document).ready(function(){  
              $(document).on('blur','#original_price',function(){
                  $('#discount_percentage').val('0');
                  if( $('#new_price').val().length > 0 )
                  {                      
                      if( parseFloat( $(this).val() ) < parseFloat( $('#new_price').val() ) ) 
                      {                         
                          $(this).val('');
                          alert('Original Price must be greater than New Price');
                      }
                      else
                      {
                         calculateDiscount();                        
                      }
                  }
              });    
              $(document).on('blur','#new_price',function(){
                  $('#discount_percentage').val('0');
                  if( $('#original_price').val().length > 0 )
                  {                      
                      if( parseFloat( $(this).val() ) > parseFloat( $('#original_price').val() ) ) 
                      {
                          $(this).val('');
                          alert('New Price must be less than Original Price');
                      }
                      else
                      {
                         calculateDiscount();
                      }
                  }
              });         
            /*$('#sandbox-container .input-daterange').datepicker({
                  multidate: false,
                  calendarWeeks: true,
                  autoclose: true,
                  todayHighlight: true
            });      */  	       
            $("form.wizard-big").steps({
                bodyTag: "fieldset",
                onCanceled : function(){
                  window.location = "{{ route('deals.index') }}";
                },
                onStepChanging: function (event, currentIndex, newIndex)
                {                    
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }
                    var form = $(this);
                    if( currentIndex == 0 )
                    {
                      if( $('#description').code() == '' )
                      {
                        alert( 'Description is required');
                        return false;
                      }
                      if( $('#fine_print').code() == '' )
                      {
                        alert( 'fineprint is required');
                        return false;
                      }
//                      if( ! compare_dates( $('#start_date').val(),$('#end_date').val(),"Start date must less than or equal to end date" ) )
//                      {
//                        return false;
//                      }
                    }
                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        $('.alert-danger').remove();
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }
                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";
                    // Start validation; Prevent going forward if false
                    
                    var bValid = form.valid();
                    if( bValid )
                    {
                        saveData(form);                        
                    }
                    
                    if( currentIndex == 1 && !bValid )
                    {
                        $('<div class="alert alert-danger"><p>Please select atleast one image as cover</div>' ).insertBefore('#deal_images');
                    }

                    return bValid;
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {

                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false

                    return  form.valid() || currentIndex == 2 ;
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this); 
                    if( currentIndex == 0 )
                    {
                      if( $('#description').code() == '' )
                      {
                        alert( 'Description is required');
                        return false;
                      }
                      if( $('#fine_print').code() == '' )
                      {
                        alert( 'fineprint is required');
                        return false;
                      }
                    }                   
                    if( $( 'input[name="is_cover"]' ).length > 0 )
                    {
                        if( $( 'input[name="is_cover"]' ).prop('checked').length <= 0 )
                        {
                            alert( "Select atleast one cover photo");
                            return false;
                        }
                    }
                    else
                    {
                      alert( "Upload atleast one image");
                      return false;
                    }                    
                    // Submit form input
                    saveData(form);
                    if($('#video_url' ).val())
                    {
                        //console.log($('#video_url' ).val());
                        $.ajax({
                            url: '{{url('deals/')}}/'+$('.deal_id' ).val()+'/videos',
                            data: {'video_path': $('#video_url' ).val()},
                            type:"post",
                            dataType:'json'
                        } ).success(function(data){
                            setSession(); 
                            window.location.href = "{{ route('deals.index') }}";
                        });
                    }
                    else{
                        setSession();
                        window.location.href = "{{ route('deals.index') }}";
                    }
                   //form.submit(form);
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            original_price: {
                                number : true
                            },
                            new_price: {
                                number : true
                            },
                            discount_percentage:{
                            	number : true
                            },
                            available_stock:{
                            	digits : true
                            },
                            email:{
                            	email : true
                            },
                            contact:{
                              digits : true
                            }
                        }
            });
            google.maps.event.addDomListener(window, 'load', initialize);                      
            $('#description').summernote({
                height: 150
            });
            $('#fine_print').summernote({
                height: 150
            });

                // Setup html5 version
            uploader = $("#uploader,#video_uploader").plupload({
                // General settings
                runtimes : 'html5,flash,silverlight,html4',
                url : "/examples/upload",

                // Maximum file size
                max_file_size : '10mb',
                // Rename files by clicking on their titles
                rename: true,

                // Sort files
                sortable: true,

                // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
                dragdrop: true,

                // Views to activate
                views: {
                    list: true,
                    thumbs: true, // Show thumbs
                    active: 'thumbs'
                },

                // Flash settings
                flash_swf_url : 'inspinia/js/plugins/plupload/Moxie.swf',

                // Silverlight settings
                silverlight_xap_url : 'inspinia/js/plugins/plupload/Moxie.xap',
                uploaded: function(event,args) {
                    response = $.parseJSON(args.response.response);
                    if( response.image_path )
                    {
                       var ext = response.image_path.split('.' ).pop();                       
                       $('#deal_images' ).append('<div class="col-md-3" id="media_'+response.id+'"><div class="radio text-right"><label><input type="radio" class="required" value="'+response.id+'" name="is_cover"> Cover Photo</label></div><a class="thumbnail" href="'+response.image_path+'" target="_blank"><img src="'+response.image_path+'"></a><button class="btn btn-block btn-primary" type="button" onclick="removeAttachment('+response.id+',\'images\')"><i class="fa fa-trash"></i> Delete</button></div>');
                    }
                    else
                    {
                        $('#deal_videos' ).append('<div class="col-md-3" id="media_'+response.id+'"><a class="thumbnail" href="'+response.video_path+'" target="_blank"><img src="{{url('images/video.png')}}"></a><button class="btn btn-block btn-primary" type="button" onclick="removeAttachment('+response.id+',\'videos\')"><i class="fa fa-trash"></i> Delete</button></div>');                        
                    }
                },
                selected: function(event,args) {
                    args.up.start();
                }
            });
       });

         function removeAttachment(id,type)
         {
             var url;
             $('#confirmation_modal' ).modal('show');
             if( type == 'images' )
                url = '{{url('deals')}}/'+$('.deal_id' ).val()+'/images/'+id
             else
                url = '{{url('deals')}}/'+$('.deal_id' ).val()+'/videos/'+id
             $('#confirm_btn' ).on('click',function(){
                 $.ajax({
                     type:'delete',
                     url:url
                 } ).success(function(data){
                    $('#media_'+id ).remove();
                     $('#confirmation_modal' ).modal('hide');
                 });
             })
         }

        $(function(){
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                startDate: new Date(),
                todayHighlight: true
            });
            $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                startDate: new Date(),
                todayHighlight: true
            });

        })
    </script>
        