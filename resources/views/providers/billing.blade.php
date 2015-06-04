@extends('layouts.inspinia.inspinia')
@section('content')
    <!-- Data Tables -->
    <link href="{{ asset('inspinia/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Billing</h5>
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
                    @if( session('success') )
                     <div class="alert alert-success">
                         {{session('success')}}
                     </div>
                    @endif
                    <div class="col-sm-8">
                        <h3 style="margin-bottom: 30px;">{{ isset($agreement) ? 'Your Active Subscription: $'.$plan->amount.' / Month' : 'You have no active subscription'}}</h3>
                    </div>
                    <div class="col-sm-4">
                        <?php $prefix = Auth::user()->UserTypes()->first()->name == 'Providers' ? 'provider' : 'baby-sitter';  ?>
                        @if( isset($agreement) && $agreement->getState() == 'Active' )
                            <form action="{{route($prefix.'.billings.update',[Auth::user()->id])}}" method="post">
                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                <input type="hidden" value="PUT" name="_method">
                                <input type="hidden" value="suspend" name="_action">
                                <button class="btn btn-danger pull-right">Cancel My Subscription</button>
                            </form>
                        @elseif( isset($agreement) && $agreement->getState() == 'Suspended' )
                            <form action="{{route($prefix.'.billings.update',[Auth::user()->id])}}" method="post">
                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                <input type="hidden" value="PUT" name="_method">
                                <input type="hidden" value="re-active" name="_action">
                                <button class="btn btn-primary pull-right">Reactivate My Subscription</button>
                            </form>
                        @endif
                    </div>
                    {{--<h4>Subscription Ends At: <label class="label label-primary">{{Auth::user()->subscription_end_at}}</label></h4>--}}
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Payer Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( isset($transaction) && count($transactions) > 0 )
                            @foreach( $transactions as $transaction )
                                @if( $transaction->getPayerEmail() )
                                <tr>
                                    <td>{{json_decode($transaction->getAmount())->value}} {{json_decode($transaction->getAmount())->currency}}</td>
                                    <td>{{date('Y-m-d',strtotime($transaction->getTimeStamp()))}}</td>
                                    <td>{{$transaction->getPayerEmail()}}</td>
                                </tr>
                                @endif
                            @endforeach
                        @endif
                        </tbody>
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
    </script>
@stop