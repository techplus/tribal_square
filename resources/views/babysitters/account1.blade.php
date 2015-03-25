@extends('layouts.inspinia.inspinia')
@section('content')	
	 <div class="row">
        <div class="col-lg-10">
        	<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Account Basics</h5>                            
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal" name="frmBabySitter">
                            	<div class="form-group">
                            		<div class="col-sm-12">
                            			<label class="control-label">Name</label>
                            		</div>
                            	</div>
                                <div class="form-group">                                	
                                    <div class="col-sm-6">
                                    	<input type="text" class="form-control required" name="first_name" placeholder="First Name">                                     	
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" class="form-control required" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">E-mail Address</label>                                   
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="email" class="form-control required" placeholder="Email Address">
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Password</label>                                   
                                	</div>
                                </div>
                                <div class="form-group">                                	
                                    <div class="col-sm-6">
                                    	<input type="text" class="form-control required" name="password" placeholder="Password (min 6 characters)">                                     	
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" class="form-control required" name="confirm_password" placeholder="Verify Password">
                                    </div>
                                </div> 
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Address</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="address" class="form-control required" placeholder="Location">
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">Street</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="street" class="form-control required" placeholder="Street">
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">City</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="city" class="form-control required" placeholder="City">
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                		<label class="control-label">State</label>                                   
                                	</div>
                                </div>
                                 <div class="form-group">
                                	<div class="col-sm-12">
                                		<input type="text" name="street" class="form-control required" placeholder="State">
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
                                		<input type="text" name="country" class="form-control required" placeholder="Country">                                                            		
                                	</div>
                                	<div class="col-sm-6">                                		
                                		<input type="text" name="pin" class="form-control required" placeholder="Pin"> 
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
@endsection