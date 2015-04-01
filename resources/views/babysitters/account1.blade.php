@extends('layouts.inspinia.inspinia')
@section('content')	    
    @include('babysitters.babysitter_scripts')
	 <div class="row">
        <div class="col-lg-10">
        	<div class="ibox float-e-margins">                       
                        <div class="ibox-title">
                            <h5>Account Basics</h5>                            
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" name="frmBabySitter" id="frmBabySitter" action="{{ action('Users\BabySittersController@postStore') }}">
                                 @if($errors->has('email'))
                                    <div class="alert alert-danger"> 
                                    {{ $errors->first('email') }}
                                    </div>
                                @endif
                            	<div class="form-group">
                            		<div class="col-sm-12">
                            			<label class="control-label">Name</label>
                            		</div>
                            	</div>
                                <div class="form-group">                                	
                                    <div class="col-sm-6">
                                    	<input type="text" class="form-control required" name="firstname" placeholder="First Name" value="{{ $oUser->firstname }}">                                     	
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" class="form-control required" name="lastname" placeholder="Last Name" value="{{ $oUser->lastname }}">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">E-mail Address</label>                                   
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="email" class="form-control required" placeholder="Email Address" value="{{ $oUser->email }}">
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Password</label>                                   
                                	</div>
                                </div>
                                <div class="form-group">                                	
                                    <div class="col-sm-6">
                                    	<input type="password" class="form-control" name="password" id="password" placeholder="Password (min 6 characters)" value="">                                     	
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="password" class="form-control" name="confirm_password" placeholder="Verify Password" value="">
                                    </div>
                                </div> 
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Address</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="address" class="form-control required" placeholder="Location" value="{{ $oAccountBasics->address }}">
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Street</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="street" class="form-control required" placeholder="Street" value="{{ $oAccountBasics->street }}">
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">City</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="city" class="form-control required" placeholder="City" value="{{ $oAccountBasics->city }}">
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">State</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="state" class="form-control required" placeholder="State" value="{{ $oAccountBasics->state }}">
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-6">
                                		<label class="control-label">Country</label>                                       		
                                	</div>
                                	<div class="col-sm-6">
                                		<label class="control-label">Pin</label>                                       		
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-6">                                		
                                		<input type="text" name="country" class="form-control required" placeholder="Country" value="{{ $oAccountBasics->country }}">                                                            		
                                	</div>
                                	<div class="col-sm-6">                                		
                                		<input type="text" name="pin" class="form-control required" placeholder="Pin" value="{{ $oAccountBasics->pin }}"> 
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
     <script>
        $(document).ready(function(){
           $('#frmBabySitter').validate({
                rules:{
                    email : {
                        email : true
                    },
                    password : {
                        minlength : 6,                        
                    },
                    confirm_password: {                        
                        minlength: 6,
                        equalTo: "#password"
                    }
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