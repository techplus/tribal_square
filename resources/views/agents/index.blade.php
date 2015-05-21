@extends('layouts.inspinia.inspinia')

@section('content')
    <?php 
       // dd($oUser);
       // echo $oUserType->pivot->refferal_code;
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                 <div class="ibox-title1">
                    <h2>Your Referal Code : <span style="font-weight:bold;"> {{ $oUserType->pivot->refferal_code }} </sapn></h2>
                </div>
                <div class="ibox-title">
                    <h5>Profile Settings</h5>
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
                    @if( $errors->any() )
                        <div class="alert alert-danger">
                            @foreach( $errors->all() AS $msg )
                                <p>{{$msg}}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{route('sales-agents.update',[Auth::user()->id])}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="put" name="_method">
                        <div class="col-sm-6" style="padding-left: 0;">
                            <div class="form-group {{$errors->has('paypalid') ? 'has-error' : ''}}">
                                <label class="control-label">Paypal ID:</label>
                                <input type="text" class="form-control" name="paypalid" value="{{$oUserType->pivot->paypalid}}">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group" style="margin-top: 15px;">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop