@extends('layouts.inspinia.inspinia')
@section('content')
    <!-- Data Tables -->
    <link href="{{ asset('inspinia/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>My Posting</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>                             
                <div class="ibox-content">                   
                <div class="col-sm-12">
                    <a href="{{ route('posts.create') }}"><button class="btn btn-primary pull-right">Add New</button></a>
                </div>
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Posting Titles</th>
                        <th>Category</th>
                        <th>Actions</th>                        
                    </tr>
                    </thead>
                    <tbody>
                        @if( $aPostings->count() > 0 )
                            @foreach( $aPostings as $oPost )
                                <tr data-id = "{{ $oPost->id }}">
                                    <td>{{ $oPost->title }}</td>
                                    <td>
                                        {{ ( $oPost->Category ) ? $oPost->ListingCategory->name : null }}
                                    </td>
                                    <td>
                                        <a href="{{route('posts.edit',[$oPost->id])}}" class="edit-posting">edit</a>
                                        <a href="javascript:;" onclick="removePost({{$oPost->id}})" class="delete-posting">delete</a>
                                    </td>                       
                                </tr>    
                            @endforeach                
                        @endif                            
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Posting Titles</th>
                        <th>Category</th>
                        <th>Actions</th>                        
                    </tr>
                    </tfoot>
                    </table> 
                    <input type="hidden" name="cat_type" value="">                     
                </div>               
            </div>
        </div>
    </div>

    <!-- Data Tables -->
    <script src="{{ asset('inspinia/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/dataTables/dataTables.responsive.js') }}"></script>

    <script>
        $(document).ready(function(){
             $('.dataTables-example').dataTable({
                responsive: true
            });
        });

        function removePost(id)
        {
            $('#confirmation_modal' ).modal('show');
            $('#confirm_btn' ).on('click',function(){
                $.ajax({
                    //type:'delete',
                    url: '{{url('posts')}}/delete/'+id
                } ).success(function(data){
                    $('[data-id='+id+']' ).remove();
                    $('#confirmation_modal' ).modal('hide');
                });
            })
        }
    </script>
@stop