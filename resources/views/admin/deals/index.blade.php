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
							@if( $sStatus == "Pending" )
								<th style="width:35%;">Titles</th>
								<th style="width:35%;">Category</th>							
								<th style="width:20%;text-align:center;">Actions</th>
							@else
								<th style="width:50%;">Titles</th>
								<th style="width:50%;">Category</th>	
							@endif
						</thead>
						<tbody>
							@foreach( $aDeals AS $oDeal )
								<tr data-id="{{ $oDeal->id }}">
									<td>{{ $oDeal->title }}</td>
									<td>{{ $oDeal->ListingCategory->name }}</td>
									@if( $sStatus == "Pending" )
									<td style="text-align:center;">
										<button class="btn btn-success approve-deal">Approve</button>&nbsp; 
										<button class="btn btn-danger decline-deal">Decline</button>
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
<script>
	$(document).ready(function(){
		$('.approve-deal').on('click',function(){			
			var id = $(this).parents('tr').data('id');
			var $this  = $(this);
			$.ajax({
				url : "{{ url( '/admin/deals/approve-deal' ) }}" + "/" + id ,				
				type : "post",
				success : function(resp)
				{
					$this.parents('tr').remove();
				},
				error : function(resp)
				{
					var data = resp.responseText;
					var dataObj = $.parseJSON(data);
					alert( dataObj.error );
				}
			});
		});
		$('.decline-deal').on('click',function(){
			var id = $(this).parents('tr').data('id');
			var $this  = $(this);
			$.ajax({
				url : "{{ url( '/admin/deals/declined-deal' ) }}" + "/" + id ,
				type : "post",
				success : function(resp)
				{
					$this.parents('tr').remove();
				},
				error : function(resp)
				{
					var data = resp.responseText;
					var dataObj = $.parseJSON(data);
					alert( dataObj.error );
				}
			});
		});
	});
</script>	
@endsection	