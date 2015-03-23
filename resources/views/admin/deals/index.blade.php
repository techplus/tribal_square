@extends('layouts.admin')
@section('content')	
	<div class="panel panel-default">
		<div class="panel-heading">
			{{ $sStatus }} Deals			
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="table-responsive">
					<table class="vTable table table-stripped">
						<thead>
                            <th style="width:35%;">Titles</th>
                            <th style="width:20%;">Category</th>
                            <th style="width:35%;text-align:center;">Actions</th>
						</thead>
						<tbody>
							@foreach( $aDeals AS $oDeal )
								<tr data-id="{{ $oDeal->id }}">
									<td>{{ $oDeal->title }}</td>
									<td>{{ $oDeal->ListingCategory->name }}</td>
									<td style="text-align:center;">
                                        @if( $sStatus == "Pending" )
                                            <button class="btn btn-success action" data-status="approved" data-id="{{$oDeal->id}}">Approve</button>&nbsp;
                                            <button class="btn btn-danger action" data-status="declined" data-id="{{$oDeal->id}}">Decline</button>
                                            <button class="btn btn-danger action" data-status="archived" data-id="{{$oDeal->id}}">Archive</button>
                                        @elseif( $sStatus == 'Approved' )
                                            <button class="btn btn-success action" data-status="pending" data-id="{{$oDeal->id}}">Move To Pending</button>&nbsp;
                                            <button class="btn btn-danger action" data-status="declined" data-id="{{$oDeal->id}}">Decline</button>
                                            <button class="btn btn-danger action" data-status="archived" data-id="{{$oDeal->id}}">Archive</button>
                                        @elseif( $sStatus == 'Declined' )
                                            <button class="btn btn-success action" data-status="approved" data-id="{{$oDeal->id}}">Approve</button>&nbsp;
                                            <button class="btn btn-danger action" data-status="Pending" data-id="{{$oDeal->id}}">Move To Pending</button>
                                            <button class="btn btn-danger action" data-status="archived" data-id="{{$oDeal->id}}">Archive</button>
                                        @elseif( $sStatus == 'Archived')
                                            <button class="btn btn-success action" data-status="approved" data-id="{{$oDeal->id}}">Approve</button>&nbsp;
                                            <button class="btn btn-danger action" data-status="declined" data-id="{{$oDeal->id}}">Decline</button>
                                            <button class="btn btn-danger action" data-status="Pending" data-id="{{$oDeal->id}}">Move To Pending</button>
                                            <button class="btn btn-danger action" data-status="deleted" data-id="{{$oDeal->id}}">Delete Forever</button>
                                        @endif
									</td>
								</tr>
							@endforeach
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
        $(document).ready(function(){
            $('.action' ).on('click',function(){
                status = $(this ).data('status');
                id = $(this ).data('id');
                $('#status_field' ).html(status);
                $('#confirmation_modal' ).modal('show');
            });
            $('#confirm_btn' ).on('click',function(){
                var data = {};
                if( status == 'approved')
                    data = {is_approved_by_admin:1};
                else if( status == 'declined')
                    data = {is_approved_by_admin:2};
                else if( status == 'pending' )
                    data = {is_approved_by_admin:0};
                else if( status == 'archived' )
                    data = {status : 'archived'};
                else if( status == 'deleted' )
                    data = {status:'force_delete'};
                $.ajax({
                    url: '{{url('admin/deals')}}/'+id,
                    type:"PUT",
                    data:data
                } ).success(function(data){
                    $('tr[data-id='+id+']').remove();
                    $('#confirmation_modal' ).modal('hide');
                })
            });
        });
    </script>
@endsection	