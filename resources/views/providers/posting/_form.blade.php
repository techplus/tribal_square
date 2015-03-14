    <link href="{{ asset('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jQueryUI/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/js/plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('inspinia/css/summernote.css') }}">
    <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">        
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
    </style>
    <script type="text/javascript" src="{{ asset('inspinia/js/jquery.form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('inspinia/js/summernote.js') }}"></script>
    <script type="text/javascript" src="{{asset('inspinia/js/jquery-ui.custom.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('inspinia/js/plugins/plupload/plupload.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('inspinia/js/plugins/plupload/moxie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('inspinia/js/plugins/plupload/jquery.ui.plupload/jquery.ui.plupload.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
    var autocomplete1;
    var autocomplete2;
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
       autocomplete2 = new google.maps.places.Autocomplete(
              /** @type {HTMLInputElement} */(document.getElementById('autocomplete2')),
              { types: ['geocode'] });
      // When the user selects an address from the dropdown,
      // populate the address fields in the form.
      google.maps.event.addListener(autocomplete1, 'place_changed', function() {
            $('#autocomplete1' ).val(autocomplete1.getPlace().formatted_address);
      });
      google.maps.event.addListener(autocomplete2, 'place_changed', function() {
        fillInAddress();
      });
    }
    function fillInAddress() {
          // Get the place details from the autocomplete object.
          var place = autocomplete2.getPlace();
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
                autocomplete2.setBounds(circle.getBounds());
            });
        }
    }   

    </script>  
                                 
              	 <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Create New Posting</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>                              
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">                                                 
                            <form name="frmPost" id="frmPost" class="wizard-big wizard clearfix form-horizontal" action="#">
                                <h1>Location and Category</h1>
                                <fieldset>                    
                                    <input type="hidden" name="id" class="post_id" value="{{$oPost->id}}">
                                    <div class="row">
                                        <div class="col-lg-8">
	                                            <div class="form-group">
	                                                <label>Where do you want to Post your Classified ?</label>
	                                               <input id="autocomplete1" class="form-control required" name="location" placeholder="Enter your address" value="{{$oPost->location}}" type="text"></input>
	                                            </div>	                                            
	                                            <div class="form-group">
	                                                <label>Category</label>                                                
	                                            </div>                                                                                 
                                            	@if( $aCategories->count() > 0 )
                                            		@foreach( $aCategories as $oCat )
                                            			<div class="form-group">    
                                            				<div class="col-lg-12">      
                                                				<input name="category_id" type="radio" class="required col-sm-1" value="{{ $oCat->id }}" data-name="{{ $oCat->name }}" {{$oPost->category_id == $oCat->id ? 'checked' : ''}}><span class="col-sm-11">{{ $oCat->name }}</span>
                                                			</div>                                                			
                                                		</div>                                                		
                                                	@endforeach
												@endif                                                	                                           
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <h1>Profile</h1>
                                <fieldset>                                       	                           
                                    <div class="row">
                                    	<div class="col-lg-12">
                                            <h3 style="font-weight: normal;">
                                    		<div class="col-lg-6">
                                    			<label>Category :</label> <span class="category"></span>
                                    		</div>
                                    		<div class="col-lg-6">
                                    			<label>Location :</label> <span class="location"></span>
                                    		</div>
                                            </h3>
                                    	</div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Email *</label>
                                                <div class="col-lg-8">
                                                    <input id="email" name="email" type="text" value="{{$oPost->email}}" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group">                                               
                                                   <label class="control-label col-lg-4">user can contact me by </label>&nbsp;&nbsp;
                                                   <div class="col-lg-8"> 
                                                    <input type="checkbox" name="can_phone" {{$oPost->can_phone ? 'checked' : ''}} class="chkphone" value="1">&nbsp;<span>Phone</span>&nbsp;&nbsp;
                                                    <input type="checkbox" name="can_text" {{$oPost->can_text ? 'checked' : ''}} class="chktext" value="1">&nbsp;<span>Text</span>
                                                   </div>
                                            </div>
                                            <div class="form-group">                                                
                                                    <div class="col-lg-6 phone-container" style="display: none;padding-left:0;"> 
                                                        <label>Phone Number *</label>
                                                        <input type="text" name="phone" id="phone" value="{{$oPost->phone}}" value="" class="form-control">
                                                    </div>
                                                    <div class="col-lg-6 text-container" style="display: none;padding-right:0;"> 
                                                        <label>Contact Name *</label>
                                                        <input type="text" name="contact_name" value="{{$oPost->contact_name}}" id="contact_name" value="" class="form-control">
                                                    </div>                                               
                                            </div>
                                        </div>   
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Post Title *</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="title" id="title" value="{{$oPost->title}}" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Price *</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="price" id="price" value="{{$oPost->price}}" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Posting Content *</label>
                                                <div class="col-lg-8">
                                                    <textarea name="description" id="description" class="required form-control">{{$oPost->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Condition *</label>
                                                 <div class="col-lg-8">
                                                    <select name="condition" id="condition" class="required form-control">
                                                        <option value="Good" {{$oPost->condition == 'Good' ? 'selected' : ''}}>Good</option>
                                                        <option value="Average" {{$oPost->condition == 'Average' ? 'selected' : ''}}>Average</option>
                                                        <option value="Excellent" {{$oPost->condition == 'Excellent' ? 'selected' : ''}}>Excellent</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Make/Manufacture</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="manufacture" id="manufature" value="{{$oPost->manufacture}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Model Number/Number</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="model_number" id="model_number" value="{{$oPost->model_number}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Size/Dimensions</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="size" id="size" value="{{$oPost->size}}" class="form-control">
                                                </div>
                                            </div>                                            
                                        </div>    
                                        <div class="col-lg-12">
                                             <div class="form-group">
                                                 <label class="control-label col-lg-4">Location</label>
                                                 <div class="col-lg-8">
                                                    <input type="text"  onFocus="geolocate()" name="location2" id="autocomplete2" value="{{$oPost->location2}}" class="form-control required">
                                                </div>
                                            </div>                                            
                                            {{--<div class="form-group">--}}
                                                 {{--<label class="control-label col-lg-4">Street</label>--}}
                                                 {{--<div class="col-lg-4">--}}
                                                    {{--<input type="text" name="street1" id="street_number" value="{{$oPost->manufacture}}" class="form-control" readonly>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-lg-4">--}}
                                                    {{--<input type="text" name="street2" id="route" value="" class="form-control" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="form-group">
                                                 <label class="control-label col-lg-4">City</label>
                                                 <div class="col-lg-8">
                                                    <input type="text" name="city" id="locality" value="{{$oPost->city}}" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="control-label col-lg-4">State</label>
                                                 <div class="col-lg-8">
                                                    <input type="text" name="state" id="administrative_area_level_1" value="{{$oPost->state}}" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="control-label col-lg-4">Country</label>
                                                 <div class="col-lg-8">
                                                    <input type="text" name="country" id="country" value="{{$oPost->country}}" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="control-label col-lg-4">Pin</label>
                                                 <div class="col-lg-8">
                                                    <input type="text" name="pin" id="postal_code" value="{{$oPost->pin}}" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                             <div class="form-group">
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="avail_for_other_services" {{$oPost->avail_for_other_services ? 'checked' : ''}} value="1">
                                                </div>
                                                <div class="col-lg-11">
                                                     <span>Ok for others to contact you about other services, products or commercial interets</span>
                                                </div>
                                            </div>
                                        </div>                                
                                        <input type="hidden" name="lat" value="">
                                        <input type="hidden" name="long" value="">
                                    </div>
                                </fieldset>
                                <h1>Images / Videos</h1>
                                <fieldset>
                                    <div class="col-md-12" id="post_images" style="margin-bottom:20px;">
                                    @if( $oPost->ClassifiedImages )
                                        @foreach($oPost->ClassifiedImages as $oImage )
                                        <div class="col-md-3" id="media_{{$oImage->id}}">
                                            <a href="{{$oImage->image_path}}" target="_blank" class="thumbnail">
                                                <?php $ext = pathinfo($oImage->image_path,PATHINFO_EXTENSION); ?>
                                                @if( $ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png')
                                                    <img src="{{$oImage->image_path}}">
                                                @else
                                                    <img src="{{url('images/video.png')}}">
                                                @endif
                                            </a>
                                            <button type="button" class="btn btn-block btn-primary" onclick="removeAttachment({{$oImage->id}})"><i class="fa fa-trash"></i> Delete</button>
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

                                {{--<h1>Finish</h1>--}}
                                {{--<fieldset>--}}
                                    {{--<h2>Terms and Conditions</h2>--}}
                                    {{--<input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"><label for="acceptTerms">I agree with the Terms and Conditions.</label>--}}
                                {{--</fieldset>--}}
                            </form>
                        </div>
                    </div>                   
                </div>
            </div>
	<!-- Steps -->
    <script src="{{ asset('inspinia/js/plugins/staps/jquery.steps.min.js') }}"></script>    
    <!-- Jquery Validate -->
    <script src="{{ asset('inspinia/js/plugins/validate/jquery.validate.min.js') }}"></script>
	 <script>
         var uploader;
        // pre-submit callback
        function showRequest(formData, jqForm, options)
        {
           return true;
        }	
        // post-submit callback  
        function showResponse(responseText, statusText, xhr, $form)
        {
            $('.post_id').val( responseText.id );
            $('#uploader' ).plupload('getUploader' ).settings.url = "{{url('posts')}}" + "/" + responseText.id + "/images";
            {{--Dropzone.options.myAwesomeDropzone.url = "{{url('posts')}}" + "/" + responseText.id + "/images";--}}
        }
        function saveData(form)
        {
            @if(! $oPost->id )
                var url = '{{ route("posts.store") }}';
                var type = 'post';
            @endif
            if( $('.post_id').val().length > 0 )
            {
                url = '{{ url("posts") }}' + "/" + $('.post_id').val();
                type = 'put';
                form.attr('action','{{url('posts')}}/'+$('.post_id' ).val() + '/images');
            }
            var options = { 
                target:        '#output2',   // target element(s) to be updated with server response 
                beforeSubmit:  showRequest,  // pre-submit callback 
                success:       showResponse, // post-submit callback                                    
                url : url,
                data:{description:$('#description').code()},
                async : false,
                type : type,
                dataType : "json"                                                                                                    
                //timeout:   3000 
            };
            form.ajaxSubmit(options);
        }
        $(document).ready(function(){            	       
            $("form.wizard-big").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    if( currentIndex == 0 )
                    {
                        $( '.category' ).html( $( 'input[name="category_id"]:checked' ).data( 'name' ) );
                        $( '.location' ).html( $( '#autocomplete1' ).val() );
                    }
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }
                    var form = $(this);
                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
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
                    return form.valid() || currentIndex == 2;
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    //saveData();
                    console.log(currentIndex);
                    window.location.href = "{{ route('posts.index') }}";
                   //form.submit(form);
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            price: {
                                number: true
                            }
                        }
            });
            google.maps.event.addDomListener(window, 'load', initialize);
            $('.chkphone').on('change',function () {
                if( $(this).prop('checked') )
                {
                    $('.phone-container').show();
                     $('.phone-container').find('input').addClass('required');
                }
                else
                {
                    $('.phone-container').hide();   
                    $('.phone-container').find('input').removeClass('required');
                }
            });
            $('.chktext').on('change',function () {
                if( $(this).prop('checked') )
                {
                    $('.text-container').show();
                    $('.text-container').find('input').addClass('required');
                }
                else
                {
                    $('.text-container').hide();   
                    $('.text-container').find('input').removeClass('required');
                }
            });
            $('#description').summernote({
                height: 200
            });

                // Setup html5 version
            uploader = $("#uploader").plupload({
                // General settings
                runtimes : 'html5,flash,silverlight,html4',
                url : "/examples/upload",

                // Maximum file size
                max_file_size : '10mb',


                // Resize images on clientside if we can
//                resize : {
//                    width : 200,
//                    height : 200,
//                    quality : 90,
//                    crop: true // crop to exact dimensions
//                },

//                // Specify what files to browse for
//                filters : [
//                    {title : "Image files", extensions : "jpg,gif,png,jpeg"},
//                    {title : "Video files", extensions : "avi,mp4,webm"}
//                ],

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
                    console.log(response);
                    var ext = response.image_path.split('.' ).pop();
                    $('#post_images' ).append('<div class="col-md-3" id="media_'+response.id+'"><a class="thumbnail" href="'+response.image_path+'" target="_blank"><img src="'+( ( ext == 'jpg' || ext == 'jpeg' || ext == 'png' ) ? response.image_path : '{{url('images/video.png')}}')+'"></a><button class="btn btn-block btn-primary" type="button" onclick="removeAttachment('+response.id+')"><i class="fa fa-trash"></i> Delete</button></div>');
                },
                selected: function(event,args) {
                    args.up.start();
                }
            });
       });

         function removeAttachment(id)
         {
             $('#confirmation_modal' ).modal('show');
             $('#confirm_btn' ).on('click',function(){
                 $.ajax({
                     //type:'delete',
                     url: '{{url('images/delete/')}}/'+id
                 } ).success(function(data){
                    $('#media_'+id ).remove();
                     $('#confirmation_modal' ).modal('hide');
                 });
             })
         }
    </script>
        