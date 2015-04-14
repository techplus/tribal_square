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
                            @if( strtolower($sStatus) == 'approved' )
                                <th class="text-center">Deal Of The Day</th>
                            @endif
                            <th style="width:35%;text-align:center;">Actions</th>
						</thead>
						<tbody>
							@foreach( $aDeals AS $oDeal )
								<tr data-id="{{ $oDeal->id }}">
									<td><a href="{{ route('admin.deals.show',[ $oDeal->id ]) }}">{{ $oDeal->title }}</a></td>
									<td>{{ $oDeal->ListingCategory->name }}</td>
                                    @if( strtolower($sStatus) == 'approved' )
                                        <td class="text-center"><input type="checkbox" class="deal_of_the_day" data-id="{{$oDeal->id}}" value="1" {{ $oDeal->is_deal_of_the_day ? 'checked=""' : '' }}> </td>
                                    @endif
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
                                            <button class="btn btn-danger action" data-status="pending" data-id="{{$oDeal->id}}">Move To Pending</button>
                                            <button class="btn btn-danger action" data-status="archived" data-id="{{$oDeal->id}}">Archive</button>
                                        @elseif( $sStatus == 'Archived')
                                            <button class="btn btn-success action" data-status="approved" data-id="{{$oDeal->id}}">Approve</button>&nbsp;
                                            <button class="btn btn-danger action" data-status="declined" data-id="{{$oDeal->id}}">Decline</button>
                                            <button class="btn btn-danger action" data-status="pending" data-id="{{$oDeal->id}}">Move To Pending</button>
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

        function onSuccess($id,$sStatus)
        {
             $('tr[data-id='+$id+']').remove();
             $('#confirmation_modal' ).modal('hide');
        }
        $(document).ready(function(){
            @include('admin.deals.scripts')
            $('.deal_of_the_day' ).on('change',function(){
                var id = $(this).data('id');
                var $this = $(this);
                $.ajax({
                    url: "{{url('admin/deals')}}/"+id,
                    data:{is_deal_of_the_day:$this.prop('checked') ? '1' : 0},
                    dataType:'json',
                    type: "put"
                } ).success(function(data){
                    var msg = "deal is set to deal of the day!";
                    if( data.is_deal_of_the_day == 0 )
                        msg = "deal is removed from deal of the day!";

                    alert(msg);
                });
            });
        });
    </script>
@endsection	