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
                    <!-- <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div> -->
                </div>                             
                <div class="ibox-content">
                    @if( session('payment_successfull') )
                        <div class="alert alert-success">
                            <p>We have received your payment successfully!</p>
                        </div>
                        <?php Session::forget('payment_successfull'); ?>
                    @endif
                <div class="col-sm-12">
                    <a href="{{ route('posts.create') }}"><button class="btn btn-primary pull-right">Add New</button></a>
                    <div class="col-sm-3 pull-right">
                        <select class="form-control filter_status">
                            <option value="">All</option>
                            <option value="Approved">Approved</option>
                            <option value="Archived">Archived</option>
                            <option value="Declined">Declined</option>
                        </select>
                    </div>
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
                                    <td><a href="{{route('posts.show',[$oPost->id])}}">{{ $oPost->title }}</a></td>
                                    <td>
                                        {{ ( $oPost->Listingcategory ) ? $oPost->Listingcategory->name : null }}
                                    </td>
                                    <td>
                                        @if( $oPost->deleted_at != "" )
                                            <label class="label label-success">Archived</label>
                                        @else
                                             @if( $oPost->is_approved_by_admin == 0 )
                                                <a href="{{route('posts.edit',[$oPost->id])}}" class="edit-posting">edit</a> |
                                                <a href="javascript:;" onclick="removePost({{$oPost->id}})" class="delete-posting">delete</a>
                                             @elseif( $oPost->is_approved_by_admin == 1 )
                                                <label class="label label-primary">Approved</label>
                                             @elseif( $oPost->is_approved_by_admin == 2 )
                                                <label class="label label-danger">Declined</label>
                                             @endif
                                        @endif
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
    var dataTable;
        $(document).ready(function(){

             dataTable = $('.dataTables-example').dataTable({
                            responsive: true
                         });
              $('.filter_status' ).on('change',function(){
                dataTable.fnFilter($(this ).val());
            })

            //  $('.dataTables-example').dataTable({
            // "aoColumnDefs": [{"bSortable": false, "aTargets": [1]}]
            //     }).columnFilter({
            //         sPlaceHolder: "head:after",
            //         aoColumns: [
            //             {type: "select", values: ['Approved', 'Declined', 'Archived']},
            //             null
            //         ]
            //     });

            // $('.dataTables-example').dataTable({
            //     "aoColumnDefs": [{"bSortable": false, "aTargets": [1]}]
            // })
            // .columnFilter({
            //     sPlaceHolder: "head:before",
            // aoColumns: [ null,
            //          null,
            //         { type: "select",values: ['Approved', 'Declined', 'Archived'] }
            //     ]

            // });

        //     $('.dataTables-example').dataTable()
        //   .columnFilter({   sPlaceHolder: "head:before",
        //             aoColumns: [    null,
        //                         null,
        //                         { type: "select",values: ['Approved', 'Declined', 'Archived'] }
        //                 ]

        // });

        });

        

        

        function removePost(id)
        {
            $('#confirmation_modal' ).modal('show');
            $('#confirm_btn' ).on('click',function(){
                $.ajax({
                    type:'delete',
                    url: '{{url('posts')}}/'+id
                } ).success(function(data){
                    $('[data-id='+id+']' ).remove();
                    $('#confirmation_modal' ).modal('hide');
                });
            })
        }
    </script>
@stop