@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Admin User
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
                <form action="{{route('admin.administrators.store')}}" method="post">
                    <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                        <label class="control-label">First Name:</label>
                        <input class="form-control" name="firstname" type="text" value="{{old('firstname')}}">
                    </div>
                    <div class="form-group {{$errors->has('lastname') ? 'has-error' : ''}}">
                        <label class="control-label">Last Name:</label>
                        <input class="form-control" name="lastname" type="text" value="{{old('lastname')}}">
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label class="control-label">Email:</label>
                        <input class="form-control" name="email" type="email" value="{{old('email')}}">
                    </div>
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