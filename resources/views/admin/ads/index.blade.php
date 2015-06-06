@extends('layouts.admin')
@section('content')
    @if( session('success') )
    <div class="form-group alert alert-success">
        {{ session('success') }}
        <span class="glyphicon glyphicon-remove pull-right" onclick="hideSuccess($(this));" style="cursor:pointer;"></span>
    </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Manage Advertises for {{ $displayType }}
        </div>
        <div class="panel-body">
            <div class="row">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{action('Admin\AdsController@postIndex')}}">
                    <input type="hidden" name="type" value="{{$type}}">
                    <h4>Image 1</h4>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Image:</label>
                        <div class="col-sm-9">
                            <input type="file" name="image[]">
                            <span class="help-block">Recommended size is {{$dimensions[0]['width']." X ".$dimensions[0]['height']}}</span>
                        </div>
                    </div>
                    @if($images->filter(function($q){
                        return preg_match('/1$/',$q->type);
                    })->count())
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <img src="{{$images->filter(function($q){ return preg_match('/1$/',$q->type); })->first()->image}}" height="{{$dimensions[0]['height']}}" width="{{$dimensions[0]['width']}}">
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="control-label col-sm-3">Link:</label>
                        <div class="col-sm-9">
                            <input type="text" name="link[]" class="form-control" value="{{$images->filter(function($q){ return preg_match('/1$/',$q->type);})->count() ? $images->filter(function($q){ return preg_match('/1$/',$q->type);})->first()->link : ''}}">
                        </div>
                    </div>
                    <hr>
                    <h4>Image 2</h4>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Image:</label>
                        <div class="col-sm-9">
                            <input type="file" name="image[]">
                            <span class="help-block">Recommended size is {{$dimensions[1]['width']." X ".$dimensions[1]['height']}}</span>
                        </div>
                    </div>
                    @if($images->filter(function($q){
                        return preg_match('/2$/',$q->type);
                    })->count())
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <img src="{{$images->filter(function($q){ return preg_match('/2$/',$q->type);})->first()->image}}" height="{{$dimensions[1]['height']}}" width="{{$dimensions[1]['width']}}">
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="control-label col-sm-3">Link:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="link[]" value="{{$images->filter(function($q){ return preg_match('/2$/',$q->type);})->count() ? $images->filter(function($q){ return preg_match('/2$/',$q->type);})->first()->link : ''}}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection