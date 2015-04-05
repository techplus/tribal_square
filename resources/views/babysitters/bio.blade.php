@extends('layouts.inspinia.inspinia')
@section('content') 
     @include('babysitters.babysitter_scripts')
     <div class="row">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Bio & Preferences</h5>                            
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" name="frmBabySitter" id="frmBabySitter" action="{{ action('Users\BabySittersController@postStore') }}">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Title</label>
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control required" name="title" placeholder="Title" value="{{ $oBio->title }}">                                      
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
                                        <textarea class='form-control required' id="experience" name="experience" rows="10">{{ $oBio->experience }}</textarea>
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
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="i-checks" name="have_own_car" value="1" {{ ( $oBio ) ? ( ( $oBio->have_own_car == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="i-checks" name="have_own_car" value="0" {{ ( $oBio ) ? ( ( $oBio->have_own_car == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
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
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="i-checks" name="comfortable_with_pets" value="1" {{ ( $oBio ) ? ( ( $oBio->comfortable_with_pets == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="i-checks" name="comfortable_with_pets" value="0" {{ ( $oBio ) ? ( ( $oBio->comfortable_with_pets == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
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
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="i-checks" name="do_smoke" value="1" {{ ( $oBio ) ? ( ( $oBio->do_smoke == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="i-checks" name="do_smoke" value="0" {{ ( $oBio ) ? ( ( $oBio->do_smoke == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
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
                                        <input type="text" class="form-control required" id="average_rate_from" name="average_rate_from" placeholder="start range" value="{{ $oBio->average_rate_from }}">                                      
                                    </div>
                                    <div class="col-sm-1"  style="padding-right: 0;padding-top: 0.5%;width:auto;">
                                        To
                                    </div>
                                    <div class="col-sm-1" style="padding-right: 5px;width:auto;padding-top: 0.5%;">                               
                                        $
                                    </div>
                                    <div class="col-sm-2" style="padding: 0;">
                                        <input type="text" class="form-control required" id="average_rate_to" name="average_rate_to" placeholder="end range" value="{{ $oBio->average_rate_to }}">                                      
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
                                        <input type="text" name="increase_rate_for_each_child" class="form-control required" value="{{ $oBio->increase_rate_for_each_child }}">
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
                                        <input type="text" name="miles_from_home" class="form-control required" value="{{ $oBio->miles_from_home }}">
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
                                        <select name="no_of_childrens_comfortable_with" class="form-control required" >
                                            @for( $i = 1; $i <= 10 ; $i++ )                                                
                                                <option value="{{ $i }}" {{ ( $oBio->no_of_childrens_comfortable_with == $i ) ? 'selected' : ''  }}>{{ $i }}</option> 
                                            @endfor                                                                                        
                                        </select>
                                    </div>                               
                                    <div class="col-sm-10" style="padding-top: 0.5%;">
                                        child/children
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
        $(document).ready(function () {          
            $('#frmBabySitter').validate({
                rules:{ 
                    experience:{
                        minlength : 150
                    },
                    average_rate_from:{
                        number : true
                    },
                    average_rate_to:{
                        number : true
                    },
                    increase_rate_for_each_child:{
                        number : true
                    },
                    miles_from_home:{
                        digits : true
                    }                 
                },
                submitHandler:function()
                {                    
                    if( parseFloat($('#average_rate_from').val()) > parseFloat($('#average_rate_to').val()) )
                    {
                        alert("average rate strat range must less than end range");
                        return false;
                    }
                    else
                    {
                        document.frmBabySitter.submit();
                        return false;
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("type") == "radio") {
                        element.parents('.form-group' ).append(error);
                    } else {
                        error.insertAfter(element);
                    }
                }
           });
            $('#experience').on('keyup',function (argument) {
                $('.remaining_bal').html( 3000 - $(this).val().length );                
            });
        });
    </script>
@endsection