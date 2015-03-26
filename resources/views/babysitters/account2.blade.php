@extends('layouts.inspinia.inspinia')
@section('content')	
     <link href="{{ url('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
     <script src="{{ asset('inspinia/js/plugins/validate/jquery.validate.min.js') }}"></script>
	 <div class="row">
        <div class="col-lg-10">
        	<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>About You</h5>                            
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" name="frmBabySitter" id="frmBabySitter" action="{{ action('Users\BabySittersController@postStore') }}" enctype="multipart/form-data">
                            	<div class="form-group">
                            		<div class="col-sm-12">
                            			<label class="control-label">Phone</label>
                            		</div>
                            	</div>
                                <div class="form-group">                                	
                                    <div class="col-sm-6">
                                    	<input type="text" class="form-control required" name="phone" placeholder="Phone" value="{{ $oAccountBasics->phone }}">                                     	
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label" style="font-weight:normal;">Display on Profile : </label>&nbsp;&nbsp;
                                    	<input type="radio" class="required i-checks" name="display_phone_on_profile" value="1" {{ ( $oAccountBasics ) ? ( ( $oAccountBasics->display_phone_on_profile == 1 ) ? 'checked' : '' ) : 'checked' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="display_phone_on_profile" value="0" {{ ( $oAccountBasics ) ? ( ( $oAccountBasics->display_phone_on_profile == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                    </div>
                                </div>                                
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Birthday</label>                                   
                                	</div>
                                </div>
                                <?php
                                    $sDay = "";
                                    $sMonth = "";
                                    $sYear = "";
                                    if( $oAccountBasics->birthdate )
                                    {
                                        $ts = strtotime($oAccountBasics->birthdate);
                                        $sDay = date('d',$ts);
                                        $sMonth = date('m',$ts);
                                        $sYear = date('Y',$ts); 
                                    }
                                ?>
                                <div class="form-group">
                                	<div class="col-sm-2">
                                		<select name="month" class="form-control required">
                                            <option value="">Month</option>
                                            @for( $i = 1; $i <= 12; $i++ )
                                                <?php 
                                                    if( $i < 10 )
                                                        $i = "0".$i;
                                                ?>
                                                <option value="{{ $i }}" {{ ( $i == $sDay ) ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                	</div>
                                    <div class="col-sm-2">
                                        <select name="day" class="form-control required">
                                            <option value="">Day</option>
                                            @for( $i = 1; $i <= 31; $i++ )
                                                <?php 
                                                    if( $i < 10 )
                                                        $i = "0".$i;
                                                ?>
                                                <option value="{{ $i }}" {{ ( $i == $sMonth ) ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="year" class="form-control required">
                                            <option value="">Year</option>
                                            @for( $i = 1950; $i <= 2050; $i++ )
                                                <option value="{{ $i }}" {{ ( $i == $sYear ) ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>                                  
                                    <div class="col-sm-6">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Gender</label>                                   
                                	</div>
                                </div>
                                <div class="form-group">                                	
                                    <div class="col-sm-12">                                    	 
                                        <input type="radio" class="required i-checks" class="gender required" name="gender" value="Male" {{ ( $oAccountBasics->gender ) ? ( ( $oAccountBasics->gender == "Male" ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" class="gender required" name="gender" value="Female" {{ ( $oAccountBasics->gender ) ? ( ( $oAccountBasics->gender == "Female" ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Female
                                    </div>
                                </div>
                                @if( $oAccountBasics->profile_pic )
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <img src="{{ url('profile_pictures'."/".$oAccountBasics->profile_pic) }}" height="150" width="150">
                                        </div>
                                        <div class="col-sm-8">
                                        </div>
                                    </div>
                                @endif                                 
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Upload a Picture</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-6">
                                		<input type="file" name="file" class="form-control">
                                	</div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="col-sm-12">                                        
                                        <button class="btn btn-primary" type="submit">Save & Continue</button>
                                    </div>
                                </div>
                                 <input type="hidden" name="section" value="{{ $section }}">
                            </form>
                        </div>
                    </div>
        </div>        
     </div>
      <!-- iCheck -->
    <script src="{{ url('inspinia/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({               
                radioClass: 'iradio_square-green',
            });
            $('#frmBabySitter').validate({
                rules:{                  
                },
                submitHandler:function()
                {
                    document.frmBabySitter.submit();
                    return false;
                }
           });
        });
    </script>
@endsection