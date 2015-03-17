@extends('layouts.admin')
@section('content')	
	<div class="panel panel-default">
		<div class="panel-heading">
			{{ $sStatus }} Posts			
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
							@foreach( $aPosts AS $oPost )
								<tr data-id="{{ $oPost->id }}">
									<td>{{ $oPost->title }}</td>
									<td>{{ $oPost->ListingCategory->name }}</td>
									@if( $sStatus == "Pending" )
									<td style="text-align:center;">
										<button class="btn btn-success approve-post">Approve</button>&nbsp; 
										<button class="btn btn-danger decline-post">Decline</button>
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
		$('.approve-post').on('click',function(){			
			var id = $(this).parents('tr').data('id');
			var $this  = $(this);
			$.ajax({
				url : "{{ url( '/admin/posts/approve-post' ) }}" + "/" + id ,				
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
		$('.decline-post').on('click',function(){
			var id = $(this).parents('tr').data('id');
			var $this  = $(this);
			$.ajax({
				url : "{{ url( '/admin/posts/declined-post' ) }}" + "/" + id ,
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