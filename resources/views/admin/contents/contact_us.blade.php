@extends('layouts.admin')
@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <div class="panel panel-default">
        <div class="panel-heading">
            Contact Us
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                @if( session('success') )
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form class="form-horizontal" method="post" action="{{route('admin.contact-us.store')}}">
                    <div class="form-group">
                        <label class="col-sm-3">Location:</label>
                        <div class="col-sm-9">
                            <input type="text" name="location" value="{{$content['location'] ? $content['location']->descriptions : ''}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Phone Number:</label>
                        <div class="col-sm-9">
                            <input type="text" name="phone_no" class="form-control" value="{{$content['phone'] ? $content['phone']->descriptions : ''}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection