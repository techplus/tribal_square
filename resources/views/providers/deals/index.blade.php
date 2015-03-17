@extends('layouts.inspinia.inspinia')
@section('content')
	 <!-- Data Tables -->
    <link href="{{ asset('inspinia/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <div class="row">
        @if( Session::has('success_deal') )
        <div class="alert alert-success col-lg-12">
            {{ Session::pull('success_deal') }}
        </div>
        @endif
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>My Deals</h5>
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
                    <a href="{{ route('deals.create') }}"><button class="btn btn-primary pull-right">Add New</button></a>
                </div>
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Deal Titles</th>
                        <th>Category</th>
                        <th>Actions</th>                        
                    </tr>
                    </thead>
                    <tbody>
                        @if( $aDeals->count() > 0 )
                            @foreach( $aDeals as $oDeal )
                                <tr data-id = "{{ $oDeal->id }}">
                                    <td>{{ $oDeal->title }}</td>
                                    <td>
                                        {{ ( $oDeal->Listingcategory ) ? $oDeal->Listingcategory->name : null }}
                                    </td>
                                    <td>
                                        <a href="{{route('deals.edit',[$oDeal->id])}}">edit</a> |
                                        <a href="javascript:;" onclick="removeDeal({{$oDeal->id}})">delete</a>
                                    </td>                       
                                </tr>    
                            @endforeach                
                        @endif                            
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Deal Titles</th>
                        <th>Category</th>
                        <th>Actions</th>                        
                    </tr>
                    </tfoot>
                    </table>                                 
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
             if( $('.alert-success').length > 0 )
             {
                window.setTimeout(function(){
                    $('.alert-success').remove();
                },10000);
             }
        });

        function removeDeal(id)
        {
            $('#confirmation_modal' ).modal('show');
            $('#confirm_btn' ).on('click',function(){
                $.ajax({
                    type:'delete',
                    url: '{{url('deals')}}/'+id
                } ).success(function(data){
                    $('[data-id='+id+']' ).remove();
                    $('#confirmation_modal' ).modal('hide');
                });
            })
        }
    </script>
@endsection