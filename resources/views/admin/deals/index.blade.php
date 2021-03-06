@extends('layouts.admin')
@section('content')	
	<div class="panel panel-default">
		<div class="panel-heading">
			{{ $sStatus }} Deals			
            @if( $sStatus == 'Pending')
                <a href="{{route('deals.create')}}" class="btn btn-success pull-right" style="margin-top:-7px;">+ Add Deal</a>
            @endif
		</div>
    
		<div class="panel-body">
			<div class="row">
                @if( $sStatus == 'Pending' )
                    <div class="col-sm-3 pull-right">
                        <select class="form-control" id="category_filter">
                            <option value="0">All Category</option>
                            @foreach($subcategories->toArray() AS $category )
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="clearfix"></div>
                @endif
				<div class="table-responsive">
                    <table class="vTable table table-stripped">
						<thead>
                            <th style="width:35%;">Titles</th>
                            <th style="width:20%;">Category</th>
                            @if( strtolower($sStatus) == 'approved' )
                                <th class="text-center">Deal Of The Day</th>
                            @endif
                            @if( strtolower($sStatus) != 'expired' )
                            <th style="width:35%;text-align:center;">Actions</th>
                            @else
                            <th style="width:35%;text-align:center;">Expired Date</th>
                            @endif

						</thead>
						<tbody>
							@foreach( $aDeals AS $oDeal )
								<tr data-category_id="{{$oDeal->category_id}}" data-id="{{ $oDeal->id }}">
									<td><a href="{{ route('admin.deals.show',[ $oDeal->id ]) }}">{{ $oDeal->title }}</a></td>
									<td>{{ ($oDeal->ListingCategory) ? $oDeal->ListingCategory->name : ""}}</td>
                                    @if( strtolower($sStatus) == 'approved' )
                                        <td class="text-center"><input type="checkbox" class="deal_of_the_day" data-id="{{$oDeal->id}}" value="1" {{ $oDeal->is_deal_of_the_day ? 'checked=""' : '' }}> </td>
                                    @endif
									@if( strtolower($sStatus) != 'expired' )
                                    <td style="text-align:center;">
                                        @if( $sStatus == "Pending" )
                                            <a target="_blank" href="{{route('deals.edit',[$oDeal->id])}}" class="btn btn-primary">edit</a>
                                            <button class="btn btn-success action" data-status="approved" data-firstname="{{$oDeal->Owner->firstname}}" data-lastname="{{$oDeal->Owner->lastname}}" data-email="{{$oDeal->email}}" data-id="{{$oDeal->id}}">Approve</button>&nbsp;
                                            <button class="btn btn-danger action" data-status="declined" data-id="{{$oDeal->id}}">Decline</button>
                                            <button class="btn btn-danger action" data-status="archived" data-id="{{$oDeal->id}}">Archive</button>
                                        @elseif( $sStatus == 'Approved' )
                                            <a target="_blank" href="{{route('deals.edit',[$oDeal->id])}}" class="btn btn-primary">edit</a>
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
                                    @else
                                    <td style="text-align:center;">
                                        {{ date('d-m-Y',strtotime($oDeal->end_date)) }}
                                    </td>    

                                    @endif
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
                }).error(function(resp){
                    obj = $.parseJSON(resp.responseText);
                    $this.attr('checked',false);
                    alert(obj.error);
                });
            });
            $('#category_filter' ).on('change',function(){
                if( $(this ).val() == 0 )
                    $('tbody tr').show();
                else
                {
                    $('tbody tr' ).hide();
                    $('tbody tr[data-category_id="'+$(this ).val()+'"]' ).show();
                }

            });
        });
    </script>
@endsection	
