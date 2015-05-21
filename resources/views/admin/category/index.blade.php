@extends('layouts.admin')
@section('content')
	<script type="text/javascript" src="{{ asset('/js/admin/jquery.validate.js') }}"></script>
	<div class="form-group alert alert-success" style="{{ (Session::has('success')) ? '' : 'display:none;' }}">  
		{{ Session::pull('success') }}
		<span class="glyphicon glyphicon-remove pull-right" onclick="hideSuccess($(this));" style="cursor:pointer;"></span>		
	</div>
	<div class="form-group alert alert-danger" style="{{ (Session::has('error')) ? '' : 'display:none;' }}">  
		{{ Session::pull('error') }}
		<span class="glyphicon glyphicon-remove pull-right" onclick="hideSuccess($(this));" style="cursor:pointer;"></span>		
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Manage Categories for {{ $catnm }}
			<div class="pull-right" style="margin-top:-7px;">
                <a href="{{action('Admin\SubCategoryController@exportCategory',[$catnm])}}" class="btn btn-primary">Download Sample CSV</a>
                <a href="#modal-import" data-toggle="modal" data-target="#modal-import" type="button" class="btn btn-danger">Import CSV</a>
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
								<tr data-id="{{ $oSubCat->id }}" data-name="{{ $oSubCat->name }}" data-type="{{ $oSubCat->type }}">
									<td>{{ $oSubCat->name }}</td>
									<td>{{ $oSubCat->type }}</td>
									<td>
										<a href="javascript:;" class="edit-category">edit</a> |
										<a href="javascript:;" class="delete-category">delete</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<input type="hidden" class="cat-type" value="{{ $catnm }}">
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
	<div class="modal fade" id="modal-delete-category">
		  <div class="modal-dialog">
		    <div class="modal-content">
		          
			      <div class="modal-body">			      				      	
			      	<div class="form-group">
			      		<label class="control-label"> Are you sure , you want to remove category ?</label>
			      	</div>
			        <input type="hidden" name="id" class="cat-id" value="">
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-success" onclick="remove_cat();">Yes</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
			      </div>		     
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

    <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Import Category</h4>
                </div>
                <form class="form-horizontal" action="{{action('Admin\SubCategoryController@postImportCategory',[$catnm])}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" style="text-align: left;">Select File</label>
                            <div class="col-sm-8">
                                <input type="file" name="file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Import">
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	<script>
		function remove_cat()
		{
			$('#modal-delete-category').modal('hide');
			if( $('#modal-delete-category').find('.cat-id').val().length )
			{
				$.ajax({
						url : "{{ route('category.sub-category.destroy',[ $catnm ]) }}/" + $('#modal-delete-category').find('.cat-id').val(),
						data : { id : $('#modal-delete-category').find('.cat-id').val() },
						type : 'delete',						
						success : function(resp)
						{
							 window.location.reload();							 
						}
					});
			}
		}
		function hideSuccess($this)
		{
			$this.parents('.form-group').hide();
		}
		$(document).ready(function(){
			$('.btn-add-cat').on('click',function(){
				var cat_type = $('.cat-type').val();
				$('#modal-category').find('.type[value="' + cat_type + '"]').prop('checked','checked');
				$('#modal-category').modal('show');
			});
			$('.edit-category').on('click',function(){				
				var $this = $(this);
				var id = $this.parents('tr').data('id');
				var type = $this.parents('tr').data('type');
				var cat_name = $this.parents('tr').data('name');
				$('#modal-category').find('.cat-id').val(id);
				$('#modal-category').find('.cat-name').val(cat_name);
				$('#modal-category').find('h4').html('Edit');
				$('#modal-category').find('[value="'+ type +'"]').prop('checked','checked');
				$('#modal-category').modal('show');
				$('#modal-category').find('[value="Both"]').parents('.col-sm-4').hide();
				/*$.ajax({
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
				});*/
			});
			$('#modal-category').on('hidden.bs.modal',function(){
				$('#modal-category').find('h4').html('Add New');
				$('#modal-category').find('hello').remove();
				$('#modal-category').find('.cat-name').val('');
				$('#modal-category').find('.cat-id').val('');
				$('#modal-category').find('.type').removeAttr('checked');
				$('#modal-category').find('.cat-name').removeClass('error').addClass('valid');				
				$('#modal-category').find('.cat-id').val('');
				$('#modal-category').find('alert-danger').html('');
				$('#modal-category').find('alert-danger').hide();
				$('#modal-category').find('[value="Both"]').parents('.col-sm-4').show();
			});
			$('#frmCategory').on('submit',function(e){
				e.preventDefault();
			})
			$('#frmCategory').validate({
				rules:{},
				submitHandler:function()
				{
					if( $('#modal-category').find('.cat-id').val().length > 0 )
					{
						$.ajax({
							url : "{{ route('category.sub-category.update',[ $catnm ]) }}/" + $('#modal-category').find('.cat-id').val(),
							type : "put",
							data : $('#frmCategory').serialize(),
							dataType : "json",
							success : function  (resp) {
									if( resp.success )
									{
										window.location.reload();
									}
									else
									{
										$('#modal-category').find('.alert-danger').html(resp.msg);
										$('#modal-category').find('.alert-danger').show();
										window.setTimeout(function(){
											$('#modal-category').find('.alert-danger').hide();
										},2000);
									}
							}
						});
					}
					else
					{
						$.ajax({
							url : "{{ route('category.sub-category.store',[ $catnm ]) }}",
							type : "post",
							data : $('#frmCategory').serialize(),
							dataType : "json",
							success : function  (resp) {
									if( resp.success )
									{
										window.location.reload();
									}
									else
									{
										$('#modal-category').find('.alert-danger').html(resp.msg);
										$('#modal-category').find('.alert-danger').show();
										window.setTimeout(function(){
											$('#modal-category').find('.alert-danger').hide();
										},2000);
									}
							}
						});
					}
					return false;
				}
			});
			$('.delete-category').on('click',function(){
				$('#modal-delete-category').find('.cat-id').val( $(this).parents('tr').data('id') );
				$('#modal-delete-category').modal('show');				
			});
		});
	</script>
@endsection