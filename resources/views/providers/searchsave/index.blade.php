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

        <?php //dd($aSavesearch); ?>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Saved Searches</h5>
                </div>
                <div class="ibox-content">
                <div class="col-sm-12">
                    <!-- <div class="col-sm-3 pull-right">
                        <select class="form-control filter_status">
                            <option value="">All</option>
                            <option value="Approved">Approved</option>
                            <option value="Declined">Declined</option>
                            <option value="Expired">Expired</option>
                        </select>
                    </div> -->
                </div>
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Keyword</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if( $aSavesearch->count() > 0 )
                        @foreach( $aSavesearch as $oSearch )
                            <tr role="row" class="odd">
                                <td>{{ $oSearch->keyword }}</td>
                                <td>{{ $oSearch->location }}</td>
                                <td>{{ ( $oSearch->Listingcategory ) ? $oSearch->Listingcategory->name : "Show All" }}</td>
                                <?php 
                                    $aSearch[ 'term' ]      = $oSearch->keyword ;
                                    $aSearch[ 'location' ]  = $oSearch->keyword;
                                    $aSearch = session('search');
                                ?>
                                <td><a target="_blank" href="{{route('search.deals.index')}}">[ Open in New tab ]</a></td>
                            </tr>
                            
                        @endforeach 

                        @endif    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Keyword</th>
                        <th>Location</th>
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
        var dataTable;
        $(document).ready(function(){
             dataTable = $('.dataTables-example').dataTable({
                            responsive: true
                         });
            $('.filter_status' ).on('change',function(){
                dataTable.fnFilter($(this ).val());
            })
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