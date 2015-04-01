@extends('layouts.inspinia.inspinia')
@section('content')	    
      @include('babysitters.babysitter_scripts')
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
                                    	<input type="text" class="form-control required" name="phone" placeholder="Phone" value="{{ $oAccountBasics->phone }}" >                                     	
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label" style="font-weight:normal;">Display on Profile : </label>&nbsp;&nbsp;
                                    	<input type="radio" class="required i-checks" name="display_phone_on_profile" value="1" {{ ( $oAccountBasics->phone ) ? ( ( $oAccountBasics->display_phone_on_profile == 1 ) ? 'checked' : '' ) : 'checked' }}>&nbsp;&nbsp;<span>Yes</span>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="display_phone_on_profile" value="0" {{ ( $oAccountBasics->phone ) ? ( ( $oAccountBasics->display_phone_on_profile == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;<span>No</span>
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
                                    if( !in_array( $oAccountBasics->birthdate, [ "0000-00-00" , "1970-01-01" , "1969-12-31" ] ) )
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
                                        <input type="radio" class="required i-checks" class="gender" name="gender" value="Male" {{ ( $oAccountBasics ) ? ( ( $oAccountBasics->gender == "Male" ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;<span>Male</span>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" class="gender" name="gender" value="Female" {{ ( $oAccountBasics ) ? ( ( $oAccountBasics->gender == "Female" ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;<span>Female</span>
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
                                		<input type="file" name="file" class="form-control" style="height:auto !important;">
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
    <script>
        $(document).ready(function () {          
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