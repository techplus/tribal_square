@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Admin Users
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                @if(Auth::user()->UserTypes()->first()->name == 'SuperAdmin' )
                <div class="text-right">
                    <a href="{{route('admin.administrators.create')}}" class="btn btn-primary">Add New</a>
                </div>
                @endif
                @if( session('success') )
                    <div class="alert alert-success">
                        <p>{{session('success')}}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <?php $userType = Auth::user()->UserTypes()->first() ?>
                    <table class="vTable table table-stripped">
                        <thead>
                        <th>Email</th>
                        <th>Action</th>
                        @if( $userType->name == 'SuperAdmin' )
                        <th></th>
                        @endif
                        </thead>
                        <tbody>
                        @if( $admins->count() > 0 )
                            @foreach( $admins AS $user )
                                <tr data-id="{{ $user->id }}">
                                    <td>{{$user->email}}</td>
                                    <td><a href="{{route('admin.administrators.edit',[$user->id])}}">Change Password</a> </td>
                                    @if( $userType->name == 'SuperAdmin' )
                                    <td><button onclick="deleteAdmin({{$user->id}})" class="btn btn-danger">Delete</button> </td>
                                    @endif
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
        function deleteAdmin(i)
        {
            id = i
            $('#confirmation_modal' ).modal('show');
        }
        function onSuccess($id)
        {
            $('tr[data-id='+$id+']').remove();
            $('#confirmation_modal' ).modal('hide');
        }
        $(document).ready(function(){
            $('#confirm_btn' ).on('click',function(){
                $.ajax({
                    url: '{{url('admin/administrators')}}' + '/' +id,
                    type: 'delete'
                } ).success(function(data){
                    onSuccess(id);
                })
            });
        });
    </script>
@endsection