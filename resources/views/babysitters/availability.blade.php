@extends('layouts.inspinia.inspinia')
@section('content') 
     <link href="{{ url('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
     <link href="{{ url('inspinia/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
     <div class="row">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Availability</h5>                            
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal" name="frmBabySitter">                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Are you available on short notice?</label>                                   
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-sm-12">                                      
                                        <input type="radio" class="required i-checks" name="available_on_short_notice" value="1">&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="available_on_short_notice" value="0">&nbsp;&nbsp;No
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
                                        <input type="radio" class="required i-checks" name="available_to_provide_daytime_care_during_summer_months" value="1">&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="available_to_provide_daytime_care_during_summer_months" value="0">&nbsp;&nbsp;No
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
                                        <input type="radio" class="required i-checks" name="available_before_school_care" value="1">&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="available_before_school_care" value="0">&nbsp;&nbsp;No
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
                                        <input type="radio" class="required i-checks" name="available_after_school_care" value="1">&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="required i-checks" name="available_after_school_care" value="0">&nbsp;&nbsp;No
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
                                                                   <input type="checkbox" class="i-checks" name='{{ "shift_".$oShift->id."_".$oDay->id }}' value="on">
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
                                            <input type="text" class="form-control required" id="schedule_valid_until" name="schedule_valid_until" value="" readonly="" style="background: #fff;cursor: pointer">
                                        </div> 
                                    </div>
                                    <div class="col-sm-9"> 
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

    <!-- Data picker -->
    <script src="{{ url('inspinia/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({      
                checkboxClass: 'icheckbox_square-green',         
                radioClass: 'iradio_square-green',
            });
            $('#schedule_valid_until').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
        });
    </script>
@endsection