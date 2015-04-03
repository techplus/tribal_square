@extends('layouts.admin')
@section('content')	
	<div class="panel panel-default">
		<div class="panel-heading">
			{{ $sStatus }} Baby Sitters
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="table-responsive">
					<table class="vTable table table-stripped">					
						<thead>
                            <th style="width:20%;">Name</th>
                            <th style="width:%;">Title</th>
                            <th style="width:15%;">Location</th>
                            <th style="width:30%;text-align:center;">Actions</th>
						</thead>
						<tbody>
                            @if( $aUsers->count() > 0 )
							    @foreach( $aUsers AS $oUser )
    								<tr data-id="{{ $oUser->id }}">
    									<td><a href="{{ route( 'admin.babysitters.show' , [ $oUser->id ] ) }}">{{ ucfirst($oUser->firstname)." ".ucfirst($oUser->lastname) }}</a></td>
    									<td>{{ ( $oUser->Bio ) ? $oUser->Bio->title : '-'  }}</td>
                                        <td>{{ ( $oUser->Account ) ? $oUser->Account->country : '-' }}</td>
    									<td>
                                            @if( $sStatus == "Pending" )
    											<button class="btn btn-success action" data-status="approved" data-id="{{$oUser->id}}">Approve</button>&nbsp;
    										    <button class="btn btn-danger action" data-status="declined" data-id="{{$oUser->id}}">Decline</button>
                                                <button class="btn btn-danger action" data-status="archived" data-id="{{$oUser->id}}">Archive</button>
                                            @elseif( $sStatus == 'Approved' )
                                                <button class="btn btn-success action" data-status="pending" data-id="{{$oUser->id}}">Move To Pending</button>&nbsp;
                                                <button class="btn btn-danger action" data-status="declined" data-id="{{$oUser->id}}">Decline</button>
                                                <button class="btn btn-danger action" data-status="archived" data-id="{{$oUser->id}}">Archive</button>
                                            @elseif( $sStatus == 'Declined' )
                                                <button class="btn btn-success action" data-status="approved" data-id="{{$oUser->id}}">Approve</button>&nbsp;
                                                <button class="btn btn-danger action" data-status="pending" data-id="{{$oUser->id}}">Move To Pending</button>
                                                <button class="btn btn-danger action" data-status="archived" data-id="{{$oUser->id}}">Archive</button>
                                            @elseif( $sStatus == 'Archived')
                                                <button class="btn btn-success action" data-status="approved" data-id="{{$oUser->id}}">Approve</button>&nbsp;
                                                <button class="btn btn-danger action" data-status="declined" data-id="{{$oUser->id}}">Decline</button>
                                                <button class="btn btn-danger action" data-status="Pending" data-id="{{$oUser->id}}">Move To Pending</button>
                                                <button class="btn btn-danger action" data-status="deleted" data-id="{{$oUser->id}}">Delete Forever</button>
                                            @endif                                            
    									</td>
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
<script>
    var status,id;
    function onSuccess($id,$sStatus)
    {
        $('tr[data-id='+$id+']').remove();
        $('#confirmation_modal' ).modal('hide');
    }
	$(document).ready(function(){
        @include('admin.babysitters.scripts')      
	});
</script>
@endsection	