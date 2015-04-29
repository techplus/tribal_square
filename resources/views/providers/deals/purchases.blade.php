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
                    <h5>Purchases of {{$deal->title}}</h5>
                    <!--  <div class="ibox-tools">
                         <a class="collapse-link">
                             <i class="fa fa-chevron-up"></i>
                         </a>
                         <a class="close-link">
                             <i class="fa fa-times"></i>
                         </a>
                     </div> -->
                </div>
                <div class="ibox-content">
                    <div class="col-sm-12">
                        <a href="{{ route('deals.create') }}"><button class="btn btn-primary pull-right">Add New</button></a>
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Purchased By</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( $deal->Purchases->count() > 0 )
                            @foreach( $deal->Purchases as $purchase )
                                <tr data-id = "{{ $purchase->id }}">
                                    <td>{{ $purchase->email }}</td>
                                    <td>
                                        {{$purchase->Transaction->first()->txn_id}}
                                    </td>
                                    <td>{{( $purchase->amount * $purchase->quantity )}}</td>
                                    <td><label class="label label-primary">Paid</label></td>
                                    <td>
                                       {{$purchase->quantity}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Purchased By</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Quantity</th>
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


@endsection