@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Earnings of {{ $year }}
            <div class="pull-right" style="margin-top:-6px;">
                <select class="form-control">
                    <?php for($i = date('Y');$i>=1950;$i--){  ?>
                         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="vTable table table-stripped">
                        <thead>
                            <th>Month</th>
                            <th>Earning</th>
                            <th>Is Paid</th>
                        </thead>
                        <tbody>
                            @if( $aAgentEarnings )
                                @foreach( $aAgentEarnings AS $aAgentEarning )
                                    <tr data-id="{{ $oSalesAgent->id }}" data-month="{{ $aAgentEarning->MONTH }}">
                                        <td>{{ $aAgentEarning->month }}</td>
                                        <td>{{ "$".number_format($aAgentEarning->earning,2) }} <a href="{{ action('Admin\AgentEarningsController@getShowEarningsMonthly',[ $oSalesAgent->id , $year , $aAgentEarning->MONTH ]) }}">(View Details)</a></td>
                                        @if( ( date('n') == $aAgentEarning->MONTH AND date('Y') == $year ) )
                                            <td>{{ "Still in Progress" }}</td>
                                        @elseif( date('n') )
                                            <td>{{ ( $aAgentEarning->has_paid_out ) ? "Yes" : "[Mark as Paid]" }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection