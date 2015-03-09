@extends('layouts.admin')
@section('content')
	<script type="text/javascript" src="{{ asset('/js/admin/jquery.validate.js') }}"></script>
	<div class="panel panel-default">
		<div class="panel-heading">
			Manage Categories for {{ $cat }}
			<div class="pull-right" style="margin-top:-7px;">
				<button class="btn btn-success btn-add-cat"><span class="glyphicon glyphicon-plus"></span> Add New</button>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="table-responsive">
					<table class="vTable table table-stripped">
						<thead>
							<th>Category Name</th>
							<th>Type</th>
							<th>Actions</th>
						</thead>
						<tbody>
							@foreach( $aSubCategories AS $oSubCat )
								<tr data-id="{{ $oSubCat->id }}" data-name="{{ $oSubCat->name }}">
									<td>{{ $oSubCat->name }}</td>
									<td>{{ $oSubCat->type }}</td>
									<td>
										<a href="javascript:;" class="edit-category">edit</a> |
										<a href="javascript:;">delete</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<input type="hidden" class="cat-type" value="{{ $cat }}">
	</div>
	<div class="modal fade" id="modal-category">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Add New</h4>
		      </div>
		      <form class="form-horizontal" name="frmCategory" id="frmCategory" method="post">
			      <div class="modal-body">			      	
			      	<div class="form-group alert alert-danger" style="display:none;">  
			      	</div>
			      	<div class="form-group">		
			      		@foreach( $categories as $cat )	        	
			        	<div class="col-sm-4">
			        		<input type="radio" name="type" class="type" value="{{ $cat }}">{{ $cat }}
			        	</div>			        	
			        	@endforeach
			        	<div class="col-sm-4">
			        		<input type="radio" name="type" class="type" value="Both">Both
			        	</div>
			        </div>
			        <div class="form-group">
			        	<label class="col-sm-4 control-label" style="text-align: left;">Category Name</label>
			        	<div class="col-sm-8">
			        		<input type="text" name="name" id="name" class="cat-name form-control required">
			        	</div>
			        </div>
			        <input type="hidden" name="id" class="cat-id" value="">
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <input type="submit" class="btn btn-primary" value="Save">
			      </div>
		      </form>
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script>
		$(document).ready(function(){
			$('.btn-add-cat').on('click',function(){
				var cat_type = $('.cat-type').val();
				$('#modal-category').find('.type[value="' + cat_type + '"]').attr('checked','checked');
				$('#modal-category').modal('show');
			});
			$('.edit-category').on('click',function(){
				var name = $(this).parents('tr').data('name');
				var $this = $(this);
				$.ajax({
					url : "{{ action('Admin\SubCategoryController@getCatType') }}",
					data : { "name" : name },
					type : "get",
					dataType : "json",
					success : function(resp)
					{
						if( resp.success )
						{
							var id = $this.parents('tr').data('id');
							var cat_name = $this.parents('tr').data('name');
							$('#modal-category').find('.cat-id').val(id);
							$('#modal-category').find('.cat-name').val(cat_name);
							$('#modal-category').find('h4').html('Edit');
							$('#modal-category').find('[value="'+ resp.type +'"]').attr('checked','checked');
							$('#modal-category').modal('show');
						}
					}
				});
			});
			$('#modal-category').on('hidden.bs.modal',function(){
				$('#modal-category').find('.cat-name').val('');
				$('#modal-category').find('.cat-id').val('');
				$('#modal-category').find('.type').removeAttr('checked');
				$('#modal-category').find('.cat-name').parents('.form-group').removeClass('has-error');				
				$('#modal-category').find('.cat-id').val('');
				$('#modal-category').find('alert-danger').html('');
				$('#modal-category').find('alert-danger').hide();
			});
			$('#frmCategory').on('submit',function(e){
				e.preventDefault();
			})
			$('#frmCategory').validate({
				rules:{},
				SubmitHandler:function()
				{
					$.ajax({
						url : "{{ route('category.sub-category.store',[ $cat ]) }}",
						type : "post",
						data : $('#frmCategory').serialize(),
						dataType : "json",
						success : function  (resp) {
								if( resp.success )
								{
									//window.location.reload();
								}
								else
								{
									$('#modal-category').find('alert-danger').html('resp.msg');
									$('#modal-category').find('alert-danger').show();
								}
						}
					});
					return false;
				}
			});
		});
	</script>
@endsection