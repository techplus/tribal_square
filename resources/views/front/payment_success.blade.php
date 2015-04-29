@extends('layouts.front')
@section('content')
    <div class="page-wrap">
        <div id="page-content-wrapper">
            <div class="row header_wrap">
                @include('layouts.front_navbar')
                <!-- Keep all page content within the page-content inset div! -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Your payment succeeded</h1>

                            <div class="clearfix"></div>


                            <div class="row shopping_cart_wrap">
                                Transaction id: {{$transaction->txn_id}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection