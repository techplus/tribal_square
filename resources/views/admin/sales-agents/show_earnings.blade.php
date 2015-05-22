@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Earnings of {{ $year }}
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="vTable table table-stripped">
                        <thead>
                        <th style="width:50%">Deal Name</th>
                        <th style="width:30%">Buyer name</th>
                        <th style="width:10%">Actual Purchase</th>
                        <th style="width:10%;">Amount Earned</th>
                        </thead>
                        <tbody>
                        @if( $aAgentEarnings )
                            @foreach( $aAgentEarnings AS $aAgentEarning )
                                <tr data-id="{{ $oSalesAgent->id }}">
                                    <td>{{ ($aAgentEarning->Deal) ? $aAgentEarning->Deal->title : '' }}</td>
                                    <td></td>
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

@endsection