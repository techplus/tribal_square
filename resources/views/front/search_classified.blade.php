@extends('layouts.front')

@section('content')
 @include('front.getimage')
    <div class="page-wrap">
        <div class="row header_wrap">
            @include('layouts.front_navbar')
            <div class="page-content">
                <div class="row">
                    <div class="clasiffied_top">
                        <div class="col-sm-12">
                            <a href="#" class="btn btn-sm custome_blue_btn">
                                <span class="glyphicon glyphicon-floppy-disk" style="color:#fff; font-size:12px;"></span> Save Search
                            </a>
                            <a href="#" class="btn btn-sm custome_blue_btn">
                                <span class="glyphicon glyphicon-envelope" style="color:#fff; font-size:12px;"></span> E-mail Alert
                            </a>
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control col-sm-12" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                        @forelse( $classifieds AS $category=>$items)
                        <div class="row">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 style="float:left;">{{$category}}</h3>
                                    <!-- Controls -->
                                    <div class="controls pull-right" style="margin-bottom: 10px;">
                                        <a style="margin:0;" class="left glyphicon glyphicon-triangle-right btn btn-success" href="#{{$category}}"
                                           data-slide="prev"></a>
                                        <a style="margin:0;" class="right glyphicon glyphicon-triangle-left btn btn-success" href="#{{$category}}"
                                           data-slide="next"></a>
                                    </div>
                                </div>
                            </div>
                            <div id="{{$category}}" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php $counter = 1; ?>
                                    @foreach( array_chunk($items,4) as $key=>$chunk)
                                    <div class="item {{$counter++ == 1 ? 'active' : ''}}">
                                        <div class="row">
                                            @foreach( $chunk AS $key=>$item )
                                                @if( $item->ClassifiedImages->count())
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="col-item">
                                                    <div class="photo">
                                                        <a href="{{route('search.classified.show',[$item->id])}}" style="margin-left:0;width:100%;">                                                            
                                                            <div class="user-image" style="height:260px;width:364px;position:relative;">
                                                                <?php /*<img src="{{$item->ClassifiedImages->first()->image_path}}" class="img-responsive" alt="{{$item->title}}" />*/ ?>
                                                                 <?php
                                                                    $image = ( $item->ClassifiedImages ) ? $item->ClassifiedImages->first()->image_path : url('images/6195546981_200e87ddaf_b.jpg');
                                                                    $path =  ( $item->ClassifiedImages ) ? base_path('uploads/'.pathinfo($item->ClassifiedImages->first()->image_path,PATHINFO_BASENAME)) : base_path('images/6195546981_200e87ddaf_b.jpg');
                                                                    echo getImage($image,364,260,$path,true);
                                                                ?>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="info" style="text-align: left;">
                                                        <div class="row">
                                                            <div class="price col-md-12" style="height:40px;">
                                                                <a href="{{route('search.classified.show',[$item->id])}}" style="margin-left:0;width:100%;">
                                                                    <h5 class="pro_title" style="text-indent: 0;">                                                                    
                                                                            {{ ( strlen( $item->title ) > 50 ) ? substr($item->title,0,50)."..." : $item->title }}                                                                    
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <div class="price col-md-7">
                                                                <h5 class="price-text-color clasiffied_price" style="text-indent: 0;">${{$item->price}}</h5>
                                                            </div>
                                                            <div class="rating col-md-5">
                                                                <i class="price-text-color glyphicon glyphicon-star"></i><i class="price-text-color glyphicon glyphicon-star">
                                                                </i><i class="price-text-color glyphicon glyphicon-star"></i><i class="price-text-color glyphicon glyphicon-star">
                                                                </i><i class="glyphicon glyphicon-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                            @empty
                                <h1 class="text-center">No matching classified found!</h1>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop