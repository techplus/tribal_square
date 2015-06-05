@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Providers
        </div>
        <div class="panel-body">
            @if( session('success') )
                <div class="alert alert-success">
                    {{ Session::pull('success') }}
                </div>
            @endif
            <div class="row">
                <div class="table-responsive">
                    <table class="vTable table table-stripped">
                        <thead>
                        <th style="width:20%;">Name</th>
                        <th style="width:20%;">Email</th>
                        <th style="width:30%;text-align:center;">Action</th>
                        </thead>
                        <tbody>
                        @if( $aUsers->count() > 0 )
                            @foreach( $aUsers AS $oUser )
                                <tr data-id="{{ $oUser->id }}">
                                    <td>{{ ucfirst($oUser->firstname)." ".ucfirst($oUser->lastname) }}</td>
                                    <td>{{ $oUser->email  }}</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-primary" onclick="updateProvider({{ $oUser->id }});">Edit</button>
                                        <button class="btn btn-danger action" data-status="{{ ucfirst($oUser->firstname)." ".ucfirst($oUser->lastname) }}" data-id="{{$oUser->id}}">Delete</button>
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
                    Are you sure you want to delete <span id="status_field"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirm_btn">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Babysitter -->
    <div class="modal fade" id="modal_edit_provider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

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
        function updateProvider(id)
        {
            $.ajax({
                url : "{{ route('admin.providers.edit') }}"+"/"+id,
                data : {},
                type : "get",
                success : function(data)
                {
                    $('#modal_edit_provider').find('.modal-content').html(data);
                    $('#modal_edit_provider').modal('show');
                },
                error : function(err)
                {
                    obj = $.parseJson(err);
                    console.log(obj);
                }
            });
        }
        $(document).ready(function(){
            $('.action').on('click',function(){
                status = $(this).data('status');
                id = $(this).data('id');
                $('#status_field').html(status);
                $('#confirmation_modal').modal('show');
            });
            $('#confirm_btn' ).on('click',function(){
                $.ajax({
                    url: '{{url("admin/providers")}}/'+id,
                    type:"post",
                    data: {_method:"delete"}
                } ).success(function(data){
                    onSuccess(id,status);
                })
            });
        });
    </script>
@endsection