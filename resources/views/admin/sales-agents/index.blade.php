@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Sales Agents
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                @if( session('success') )
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if( session('error') )
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="vTable table table-stripped">
                        <thead>
                        <th style="width: 30%;">Name</th>
                        <th style="width: 30%;">Email</th>
                        <th style="width: 20%;">Code</th>
                        <th style="width: 10%;text-align: center;">Action</th>
                        </thead>
                        <tbody>
                        @if( $aSalesAgents->count() > 0 )
                            @foreach( $aSalesAgents AS $oSalesAgent )
                                <tr data-id="{{ $oSalesAgent->id }}">
                                    <td>   
                                        <a href="{{ route('admin.sales-agents.edit',[ $oSalesAgent->id ] ) }}" target="_blank"> 
                                           {{ ucfirst($oSalesAgent->firstname)." ".ucfirst($oSalesAgent->lastname) }}
                                        <a/>    
                                    </td>
                                    <td>{{ $oSalesAgent->email }}</td>
                                    <td>{{ ($oSalesAgent->UserTypes()->first()) ? $oSalesAgent->UserTypes()->first()->pivot->refferal_code : "" }}</td>
                                    <td><a href="{{ action('Admin\AgentEarningsController@getShowEarnings',[$oSalesAgent->id,date('Y')]) }}">[Manage Payment]</a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to <span id="status_field"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirm_btn">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection