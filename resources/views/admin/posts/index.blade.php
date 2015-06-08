@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $sStatus }} Posts
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
                        <th style="width:35%;text-align:center;">Actions</th>
                        </thead>
                        <tbody>
                        @foreach( $aPosts AS $oPost )
                            <tr data-category_id="{{$oPost->category_id}}" data-id="{{ $oPost->id }}">
                                <td><a href="{{ route('admin.posts.show',[ $oPost->id ]) }}">{{ $oPost->title }}</a>
                                </td>
                                <td>{{ ($oPost->ListingCategory) ? $oPost->ListingCategory->name : "" }}</td>
                                <td>
                                    @if( $sStatus == "Pending" )
                                        <a target="_blank" href="{{route('posts.edit',[$oPost->id])}}"
                                           class="btn btn-primary">edit</a>
                                        <button class="btn btn-success action" data-status="approved"
                                                data-id="{{$oPost->id}}">Approve
                                        </button>&nbsp;
                                        <button class="btn btn-danger action" data-status="declined"
                                                data-id="{{$oPost->id}}">Decline
                                        </button>
                                        <button class="btn btn-danger action" data-status="archived"
                                                data-id="{{$oPost->id}}">Archive
                                        </button>
                                    @elseif( $sStatus == 'Approved' )
                                        <a target="_blank" href="{{route('posts.edit',[$oPost->id])}}"
                                           class="btn btn-primary">edit</a>
                                        <button class="btn btn-success action" data-status="pending"
                                                data-id="{{$oPost->id}}">Move To Pending
                                        </button>&nbsp;
                                        <button class="btn btn-danger action" data-status="declined"
                                                data-id="{{$oPost->id}}">Decline
                                        </button>
                                        <button class="btn btn-danger action" data-status="archived"
                                                data-id="{{$oPost->id}}">Archive
                                        </button>
                                    @elseif( $sStatus == 'Declined' )
                                        <button class="btn btn-success action" data-status="approved"
                                                data-id="{{$oPost->id}}">Approve
                                        </button>&nbsp;
                                        <button class="btn btn-danger action" data-status="pending"
                                                data-id="{{$oPost->id}}">Move To Pending
                                        </button>
                                        <button class="btn btn-danger action" data-status="archived"
                                                data-id="{{$oPost->id}}">Archive
                                        </button>
                                    @elseif( $sStatus == 'Archived')
                                        <button class="btn btn-success action" data-status="approved"
                                                data-id="{{$oPost->id}}">Approve
                                        </button>&nbsp;
                                        <button class="btn btn-danger action" data-status="declined"
                                                data-id="{{$oPost->id}}">Decline
                                        </button>
                                        <button class="btn btn-danger action" data-status="Pending"
                                                data-id="{{$oPost->id}}">Move To Pending
                                        </button>
                                        <button class="btn btn-danger action" data-status="deleted"
                                                data-id="{{$oPost->id}}">Delete Forever
                                        </button>
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
    <div class="modal fade" id="confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
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
        var status , id;
        function onSuccess( $id , $sStatus ) {
            $( 'tr[data-id=' + $id + ']' ).remove();
            $( '#confirmation_modal' ).modal( 'hide' );
        }
        $( document ).ready( function () {
            @include('admin.posts.scripts')
            $('#category_filter' ).on('change',function(){
               if( $(this ).val() == 0 )
                    $('tbody tr').show();
               else
               {
                    $('tbody tr' ).hide();
                   $('tbody tr[data-category_id="'+$(this ).val()+'"]' ).show();
               }

            });
        } );
    </script>
@endsection	