@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Earnings of {{ (($monthName) ? $monthName : '').' '.(($year) ? $year : '') }}
            <div class="pull-right" style="margin-top:-6px;">
                <select class="form-control earningYear">
                    <?php for($i = date('Y');$i>=2000;$i--){  ?>
                    <option value="{{ $i }}" {{ ($i == $year) ? 'selected' : '' }}>{{ $i }}</option>
                    <?php } ?>
                </select>
            </div>
            <div class="pull-right" style="margin-top:-6px;">
                <select class="form-control earningMonth">
                    <?php for($i = 1;$i<=12;$i++){
                        $mn = date( 'F' , mktime( 0 , 0 , 0 , $i , 10 ) );
                    ?>
                        <option value="{{ $i }}" {{ ($i == $month) ? 'selected' : '' }}>{{ $mn }}</option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="vTable table table-stripped">
                        <thead>
                        <th style="width:50%">Deal Name</th>
                        <th style="width:30%">Buyer Email</th>
                        <th style="width:10%">Actual Purchase</th>
                        <th style="width:10%;">Amount Earned</th>
                        </thead>
                        <tbody>
                        @if( $aAgentEarnings )
                            @foreach( $aAgentEarnings AS $aAgentEarning )
                                <tr data-id="{{ $oSalesAgent->id }}">
                                    <td>{{ ($aAgentEarning->Deal) ? $aAgentEarning->Deal->title : '' }}</td>
                                    <td>{{ ($aAgentEarning->Transaction) ? $aAgentEarning->Transaction->email : '' }}</td>
                                    <td style="text-align:center;">${{ number_format($aAgentEarning->actual_purchase_price,2) }}</td>
                                    <td style="text-align:center;">${{ number_format($aAgentEarning->amount_earned,2) }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.earningYear').on('change',function(){
                var val = $(this).val();
                var month = $('.earningMonth').val();
                window.location = "{{ action('Admin\AgentEarningsController@getShowEarningsMonthly',[$id]) }}"+"/"+val+"/"+month;
            });
            $('.earningMonth').on('change',function(){
                var val = $(this).val();
                var year = $('.earningYear').val();
                window.location = "{{ action('Admin\AgentEarningsController@getShowEarningsMonthly',[$id]) }}"+"/"+year+"/"+val;
            });
        });
    </script>
@endsection