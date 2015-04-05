@extends('layouts.inspinia.inspinia')
@section('content') 
    @include('babysitters.babysitter_scripts')
     <div class="row">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Experience & Qaulifications</h5>                            
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" name="frmBabySitter" id="frmBabySitter" action="{{ action('Users\BabySittersController@postStore') }}">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Do you have experience caring for a child with special needs?</label>                                   
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required i-checks" name="have_experience_caring_child_with_special_needs" value="1" {{ ( $oExperience ) ? ( ( $oExperience->have_experience_caring_child_with_special_needs == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required i-checks" name="have_experience_caring_child_with_special_needs" value="0" {{ ( $oExperience ) ? ( ( $oExperience->have_experience_caring_child_with_special_needs == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Do you have experience caring for infants?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required i-checks" name="have_experience_caring_infants" value="1" {{ ( $oExperience ) ? ( ( $oExperience->have_experience_caring_infants == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required i-checks" name="have_experience_caring_infants" value="0" {{ ( $oExperience ) ? ( ( $oExperience->have_experience_caring_infants == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Do you have experience caring for twins?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required i-checks" name="have_experience_caring_twins" value="1" {{ ( $oExperience ) ? ( ( $oExperience->have_experience_caring_twins == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required i-checks" name="have_experience_caring_twins" value="0" {{ ( $oExperience ) ? ( ( $oExperience->have_experience_caring_twins == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
                                    </div>
                                </div>    
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Do you have experience providing homework help?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required i-checks" name="have_experience_provide_homework_help" value="1" {{ ( $oExperience ) ? ( ( $oExperience->have_experience_provide_homework_help == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required i-checks" name="have_experience_provide_homework_help" value="0" {{ ( $oExperience ) ? ( ( $oExperience->have_experience_provide_homework_help == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
                                    </div>
                                </div>                                                                                                             
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Years of paid child care experience</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-2">                                      
                                        <input type="text" name="paid_child_care_experience_years" class="form-control required" value="{{ $oExperience->paid_child_care_experience_years }}">
                                    </div>
                                    <div class="col-sm-10" style="padding-top: 0.5%;">
                                        years (use numbers only)
                                    </div>                                    
                                </div> 
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Which are groups do you have child care experience with?(optional)</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                                                        
                                        <?php
                                             $aAgeGroups = Config::get('AgeGroups'); 
                                             $aExpAgeGroups = array();
                                             if( $oExperience->age_groups_experience_with )
                                             {
                                                $aExpAgeGroups = explode(',',$oExperience->age_groups_experience_with);
                                             }
                                        ?>                                      
                                        @if( count( $aAgeGroups ) > 0 )
                                            @foreach( $aAgeGroups as $key => $sElement )
                                                <div class="col-sm-6" style="padding-top: 0.5%"> 
                                                    <input type="checkbox" class="i-checks" name="age_groups_experience_with[]" value="{{ $key }}" {{ ( in_array($key,$aExpAgeGroups) ) ? 'checked' : '' }}>&nbsp;&nbsp;<span class="chkTxt">{{ $sElement }}</span>&nbsp;&nbsp;&nbsp;                                        
                                                </div>
                                            @endforeach                                                
                                        @endif                                   
                                </div> 
                                <div class="hr-line-dashed"></div>                                                             
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Are you willing to care for sick children?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required i-checks" name="willing_care_for_sick_children" value="1" {{ ( $oExperience ) ? ( ( $oExperience->willing_care_for_sick_children == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required i-checks" name="willing_care_for_sick_children" value="0" {{ ( $oExperience ) ? ( ( $oExperience->willing_care_for_sick_children == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label">Do you have Special Needs Services Experience?</label>                                   
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required have-special-needs"  name="have_special_needs_service_experience" value="1" {{ ( $oExperience ) ? ( ( $oExperience->have_special_needs_service_experience == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required have-special-needs" name="have_special_needs_service_experience" value="0" {{ ( $oExperience ) ? ( ( $oExperience->have_special_needs_service_experience == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-group special-needs" style="{{ ( $oExperience ) ? ( ( $oExperience->have_special_needs_service_experience == 1 ) ? '' : 'display:none;' ) : 'display:none;' }}">                                                                        
                                        <?php $aSpecialNeeds = Config::get('SpecialNeedServices'); 
                                             $aExpSpecialNeeds = array();
                                             if( $oExperience->special_needs_service_experience )
                                             {
                                                $aExpSpecialNeeds = explode(',',$oExperience->special_needs_service_experience);
                                             }
                                        ?>                                      
                                        @if( count( $aSpecialNeeds ) > 0 )
                                            @foreach( $aSpecialNeeds as $key => $sElement )
                                                <div class="col-sm-6" style="padding-top: 0.5%"> 
                                                    <input type="checkbox" class="i-checks" name="special_needs_service_experience[]" value="{{ $key }}" {{ ( in_array($key,$aExpSpecialNeeds) ) ? 'checked' : '' }}>&nbsp;&nbsp;<span class="chkTxt">{{ $sElement }}</span>&nbsp;&nbsp;&nbsp;                                        
                                                </div>
                                            @endforeach                                                
                                        @endif                                   
                                </div> 
                                <input type="hidden" name="section" value="{{ $section }}">
                                <div class="form-group">
                                    <div class="col-sm-12">                                        
                                        <button class="btn btn-primary" type="submit">Save & Continue</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>        
     </div>  
    <script>
        $(document).ready(function () {           
            $('.have-special-needs').iCheck({
                checkboxClass: 'icheckbox_square-green',         
                radioClass: 'iradio_square-green'
            });
            $('.have-special-needs').on('ifChanged', function(event){
               $('.special-needs').hide();   
               if( $(this).prop('checked') )
               {
                    if( $(this).val() == '1' )
                    {
                        $('.special-needs').show();
                    }                    
               }
            });     
             $('#frmBabySitter').validate({
                rules:{   
                    paid_child_care_experience_years:{
                        digits : true
                    }                
                },
                submitHandler:function()
                {
                    document.frmBabySitter.submit();
                    return false;                                                         
                },
                 errorPlacement: function(error, element) {
                     if (element.attr("type") == "radio") {
                         element.parents('.form-group' ).append(error);
                     } else {
                         error.insertAfter(element);
                     }
                 }
           });       
        });
    </script>
@endsection