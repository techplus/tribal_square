@extends('layouts.inspinia.inspinia')
@section('content')      
      @include('babysitters.babysitter_scripts')
     <div class="row">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Availability</h5>                            
                        </div>
                        <div class="ibox-content">
                            @if( session('payment_successfull') )
                                <div class="alert alert-success">
                                    <p>We have received your payment successfully!</p>
                                </div>
                                <?php Session::forget('payment_successfull'); ?>
                            @endif
                            <form method="post" class="form-horizontal" name="frmBabySitter" id="frmBabySitter" action="{{ action('Users\BabySittersController@postStore') }}">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Are you available on short notice?</label>                                   
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required i-checks" name="available_on_short_notice" value="1" {{ ( $oAvailability ) ? ( ( $oAvailability->available_on_short_notice == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;<span>Yes</span>&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required i-checks" name="available_on_short_notice" value="0" {{ ( $oAvailability ) ? ( ( $oAvailability->available_on_short_notice == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;<span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Are you available to provide daytime care during summer months?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required i-checks" name="available_to_provide_daytime_care_during_summer_months" value="1" {{ ( $oAvailability ) ? ( ( $oAvailability->available_to_provide_daytime_care_during_summer_months == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required i-checks" name="available_to_provide_daytime_care_during_summer_months" value="0" {{ ( $oAvailability ) ? ( ( $oAvailability->available_to_provide_daytime_care_during_summer_months == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Are you available to provide before school care?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required i-checks" name="available_before_school_care" value="1" {{ ( $oAvailability ) ? ( ( $oAvailability->available_before_school_care == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required i-checks" name="available_before_school_care" value="0" {{ ( $oAvailability ) ? ( ( $oAvailability->available_before_school_care == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
                                    </div>
                                </div>   
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Are you available to provide after school care?</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="required i-checks" name="available_after_school_care" value="1" {{ ( $oAvailability ) ? ( ( $oAvailability->available_after_school_care == 1 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" class="required i-checks" name="available_after_school_care" value="0" {{ ( $oAvailability ) ? ( ( $oAvailability->available_after_school_care == 0 ) ? 'checked' : '' ) : '' }}>&nbsp;&nbsp;No
                                            </label>
                                        </div>
                                    </div>
                                </div>         
                                                       
                                <div class="hr-line-dashed"></div> 
                                <div class="form-group">                               
                                    <div class="col-sm-8 table-responsive">
                                        <table class="table vTable table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                       &nbsp;
                                                    </th>
                                                    @if( $aDays )
                                                        @foreach( $aDays as $oDay )
                                                            <th>
                                                                {{ $oDay->name }}
                                                            </th>
                                                        @endforeach
                                                    @endif
                                                </tr>                                                
                                            </thead>
                                            <tbody>                                                
                                                @if( $aShifts )
                                                    @foreach( $aShifts as $oShift )
                                                        <tr>
                                                            <td style="text-align: right;">
                                                                {{ $oShift->name }}<br>
                                                                <small>{{ $oShift->time}}</small>
                                                            </td>
                                                            @if( $aDays )
                                                                @foreach( $aDays as $oDay )
                                                                <td style="vertical-align: middle;">
                                                                   <input type="checkbox" class="i-checks" name='{{ "shift_".$oShift->id."_".$oDay->id }}'  value="on" {{ ( isset( $aDayShifts[$oShift->id][$oDay->id] ) ) ? 'checked' : '' }}>
                                                                </td>
                                                                @endforeach
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">This schedule is valid untill</label>                                   
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                       <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control required" id="schedule_valid_until" name="schedule_valid_until" readonly="" style="background: #fff;cursor: pointer" value="{{ ( $oAvailability->schedule_valid_until ) ? date('m/d/Y',strtotime($oAvailability->schedule_valid_until)) : ''}}">
                                        </div> 
                                    </div>
                                    <div class="col-sm-9"> 
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
            $('#schedule_valid_until').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
            $('#frmBabySitter').validate({
                rules:{                   
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