@extends('layouts.inspinia.inspinia')
@section('content') 
     <link href="{{ url('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
     <div class="row">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Bio & Preferences</h5>                            
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal" name="frmBabySitter">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Title</label>
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control required" name="title" placeholder="Title">                                      
                                    </div>                                    
                                </div>                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Your Experience</label>                                                                           
                                    </div>
                                    <div class="col-sm-12">
                                        <small>Experience must be at least 150 characters</small>
                                    </div>
                                </div>
                                <div class="form-group">                                                            
                                    <div class="col-sm-12">
                                        <textarea class='form-control required' name="experience" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">                                                            
                                    <div class="col-sm-6">
                                        (minimum 150 characters)
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="pull-right">
                                            <span class="remaining_bal">3000</span> characters remaining
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Do you have own car?</label>                                   
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-sm-12">                                      
                                        <input type="radio" class="required i-checks" name="have_own_car" value="1">&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="have_own_car" value="0">&nbsp;&nbsp;No
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Do you comfortable with pets?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-12">                                      
                                        <input type="radio" class="required i-checks" name="comfortable_with_pets" value="1">&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="comfortable_with_pets" value="0">&nbsp;&nbsp;No
                                    </div>
                                </div>    
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Do you smoke?</label>                                   
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-sm-12">                                      
                                        <input type="radio" class="required i-checks" name="do_smoke" value="1">&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="do_smoke" value="0">&nbsp;&nbsp;No
                                    </div>
                                </div>    
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Average Hourly Rate</label>                                   
                                    </div>
                                </div>          
                                 <div class="form-group">     
                                    <div class="col-sm-1" style="padding-right: 5px;width:auto;padding-top: 0.5%;">                               
                                        $
                                    </div>
                                    <div class="col-sm-2" style="padding: 0;">
                                        <input type="text" class="form-control required" name="average_from_rate" placeholder="start range">                                      
                                    </div>
                                    <div class="col-sm-1"  style="padding-right: 0;padding-top: 0.5%;width:auto;">
                                        To
                                    </div>
                                    <div class="col-sm-1" style="padding-right: 5px;width:auto;padding-top: 0.5%;">                               
                                        $
                                    </div>
                                    <div class="col-sm-2" style="padding: 0;">
                                        <input type="text" class="form-control required" name="average_to_rate" placeholder="end range">                                      
                                    </div>   
                                    <div class="col-sm-5" style="padding-top: 0.5%;">
                                        per hour
                                    </div>                                 
                                </div>               
                                 <div class="form-group">                                                                                                                    
                                    <div class="col-sm-12">
                                        <label class="control-label">Increase rate for each additional child by </label>                                                                       
                                    </div>                                                                                                                                                       
                                </div> 
                                <div class="form-group">
                                    <div class="col-sm-1" style="padding-right: 5px;width:auto;padding-top: 0.5%;">                               
                                        $
                                    </div>                                 
                                    <div class="col-sm-2"  style="padding: 0;">
                                        <input type="text" name="increase_rate_for_each_child" class="form-control required">
                                    </div>  
                                    <div class="col-sm-9">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">How many miles from home are you willing to work?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-2">                                      
                                        <input type="text" name="miles_from_home" class="form-control required">
                                    </div>
                                    <div class="col-sm-1" style="padding-top: 0.5%;">
                                        miles
                                    </div>
                                    <div class="col-sm-9">
                                    </div>
                                </div> 
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">How many children are you comfortable watching at a time?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-2">                                      
                                        <select name="no_of_childrens_comfortable_with" class="form-control required">
                                            @for( $i = 1; $i <= 10 ; $i++ )
                                                <option value="{{ $i }}">{{ $i }}</option> 
                                            @endfor                                        
                                            <option value="any">any</option>     
                                        </select>
                                    </div>                               
                                    <div class="col-sm-10" style="padding-top: 0.5%;">
                                        child/children
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