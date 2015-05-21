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
                        <th>Deal Name</th>
                        <th>Buyer name</th>
                        <th>Actual Purchase</th>
                        <th>Amount Earned</th>
                        </thead>
                        <tbody>
                        @if( $aAgentEarnings )
                            @foreach( $aAgentEarnings AS $aAgentEarning )
                                <tr data-id="{{ $oSalesAgent->id }}">
                                   <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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