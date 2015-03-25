@extends('layouts.inspinia.inspinia')
@section('content')	
     <link href="{{ url('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
	 <div class="row">
        <div class="col-lg-10">
        	<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>About You</h5>                            
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal" name="frmBabySitter">
                            	<div class="form-group">
                            		<div class="col-sm-12">
                            			<label class="control-label">Phone</label>
                            		</div>
                            	</div>
                                <div class="form-group">                                	
                                    <div class="col-sm-6">
                                    	<input type="text" class="form-control required" name="phone" placeholder="Phone">                                     	
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label" style="font-weight:normal;">Display on Profile : </label>&nbsp;&nbsp;
                                    	<input type="radio" class="required i-checks" name="display_phone_on_profile" value="1">&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="display_phone_on_profile" value="0">&nbsp;&nbsp;No
                                    </div>
                                </div>                                
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Birthday</label>                                   
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-2">
                                		<select name="month" class="form-control required">
                                            <option value="">Month</option>
                                            @for( $i = 1; $i <= 12; $i++ )
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                	</div>
                                    <div class="col-sm-2">
                                        <select name="month" class="form-control required">
                                            <option value="">Day</option>
                                            @for( $i = 1; $i <= 31; $i++ )
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="month" class="form-control required">
                                            <option value="">Year</option>
                                            @for( $i = 1950; $i <= 2050; $i++ )
                                                <option value="{{ $i }}">{{ $i }}</option>
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
                                        <input type="radio" class="required i-checks" name="gender" value="Male">&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="gender" value="Female">&nbsp;&nbsp;Female
                                    </div>
                                </div> 
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Upload a Picture</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-6">
                                		<input type="file" name="profile_pic" class="form-control required">
                                	</div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="col-sm-12">                                        
                                        <button class="btn btn-primary" type="button">Save & Continue</button>
                                    </div>
                                </div>
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
        });
    </script>
@endsection