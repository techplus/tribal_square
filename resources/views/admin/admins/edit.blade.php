@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
           Change Password for Admin  {{$user->firstname}} {{$user->lastname}}
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                @if( $errors->any() )
                    <div class="alert alert-danger">
                        @foreach( $errors->all() AS $msg)
                            <p>{{$msg}}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{route('admin.administrators.update',[$user->id])}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                     <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                        <label class="control-label">Password:</label>
                        <input class="form-control" name="password" type="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Retype Password:</label>
                        <input class="form-control" name="password_confirmation" type="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add New</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection