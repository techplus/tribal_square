@extends('layouts.front')

@section('content')    
    <div class="page-wrap">
        <div class="row header_wrap new_header_wrap">
            @include('layouts.front_navbar')
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Recommended Deals for you</h1>

                        <div class="clearfix"></div>

                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="margin-top:20px;">
                            @if( $oDeals->isEmpty() )
                                <h3>No deal found!</h3>
                            @else
                                <?php $counter = 0; ?>
                            @foreach( $oDeals AS $deal )
                                @if( $counter == 1 ) <?php break; ?> @endif
                                    @if( $counter == 0 )                                    
                                        <?php $counter++; ?>
                                        @if( $deal->DealImages->count() > 0 )
                                            <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 deal_for_day_image_wrap user-image">                                            
                                                <img src="{{Image::url($deal->DealImages->first()->image_path,590,300)}}" alt="" class="img-responsive" style="width: 100%;">
                                                <div>
                                                    <span>{{ $deal->discount_percentage }}%</span>
                                                    <p>DISCOUNT</p>
                                                </div>
                                            </div> -->
                                        @else
                                            <?php $oDealImages = $deal->DealImages(); ?>
                                            <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 deal_for_day_image_wrap user-image">                                            
                                                <img src="{{ $oDealImages->count() > 0 ? $oDealImages->first()->image_path : url('images/no_image.png') }}" alt="" class="img-responsive" style="width:100%;">                                            
                                                <div>
                                                    <span>{{ $deal->discount_percentage }}%</span>
                                                    <p>DISCOUNT</p>
                                                </div>
                                            </div> -->
                                        @endif
                                    @endif
                                @endforeach
                            <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 deal_for_day_wrap">
                                <h4>Deal of the Day</h4>
                                <h3>
                                    {{$oDeals->first()->title}} ${{$oDeals->first()->new_price}}
                                    <strike>${{$oDeals->first()->original_price}}</strike>
                                </h3>
                                <p>Sold : 12</p>
                                <a href="{{route('search.deals.show',[$oDeals->first()->id])}}" class="btn btn-lg custome_blue_btn col-sm-2">
                                    View Deal Details <span class="glyphicon glyphicon-triangle-right" style="color:#fff; font-size:16px;"></span>
                                </a>
                            </div> -->

                            <div class="clearfix"></div>
                            @include('front.getimage')
                            <div class="col-sm-12 all_deal_box_wrap">
                                <?php $counter = 0; ?>
                                @foreach( $oDeals AS $oDeal )  
                                    <!-- @if( $counter++ == 0 ) <?php //continue; ?> @endif -->                                                                                                          
                                    @if( $counter == 0 ) <?php continue; ?> @endif
                                <div class="col-sm-4">
                                    <div class="col-item">
                                        <div class="photo">   
                                            <a href="{{route('search.deals.show',[$oDeal->id])}}" style="margin-left:0;width:100%;">                                         
                                                <?php /*<div class="user-image" align="center" style="height:260px;width:346px;position:relative;">                                                    
                                                    <?php
                                                        $oDealsImages = $oDeal->DealImages();                                                        
                                                        $image = ( $oDeal->DealImages->count() > 0 ) ? $oDeal->DealImages->first()->image_path : ( $oDealsImages->count()  ? $oDealsImages->first()->image_path : url('images/no_image.png'));
                                                        $path =  ( $oDeal->DealImages->count() > 0 ) ? base_path('uploads/'.pathinfo($oDeal->DealImages->first()->image_path,PATHINFO_BASENAME)) : ( $oDealsImages->count()  ? base_path('uploads/'.pathinfo( $oDealsImages->first()->image_path,PATHINFO_BASENAME)) : base_path('images/no_image.png'));
                                                        echo getImage($image,340,260,$path,true);

                                                </div>*/ ?>
                                                <?php
                                                        $oDealsImages = $oDeal->DealImages(); 
                                                        ?>
                                                <img alt="{{$oDeal->title}}" style="max-width:350px;height: 260px;" class="img-responsive" src="{{Image::url(( $oDeal->DealImages->count() > 0 ) ? $oDeal->DealImages->first()->image_path : ( $oDealsImages->count()  ? $oDealsImages->first()->image_path : url('images/no_image.png')),350,260)}}">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="price" style="height: 30px;text-transform: initial;">
                                                    <a href="{{route('search.deals.show',[$oDeal->id])}}" style="width:100%;" align="left">
                                                        <h5 style="text-indent: 0;font-size: 15px;">{{ ( strlen( $oDeal->title ) > 30 ) ? substr($oDeal->title,0,30)."..." : $oDeal->title }}</h5>
                                                    </a>
                                                </div>
                                                <div class="price" style="height: 30px;text-align:left;">
                                                    <h5 style="text-indent: 0;font-size:11px;color:#666;">
                                                        <span class="glyphicon glyphicon-map-marker"></span>
                                                        {{ ( strlen( $oDeal->location ) > 30 ) ? substr($oDeal->location,0,30)."..." : $oDeal->location }}
                                                    </h5>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="separator clear-left">
                                                 <a href="{{route('search.deals.show',[$oDeal->id])}}"><p class="btn-add">{{$oDeal->new_price}}$</p>
                                                <p class="btn-details">-{{$oDeal->discount_percentage}}%</p></a>
                                            </div>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                   
                                @endforeach


                                {{--<a class="btn btn-lg custome_blue_btn col-sm-2" href="#" style="margin-left:14px;">--}}
                                    {{--Load More <span style="color:#fff; font-size:16px;" class="glyphicon glyphicon-refresh"></span>--}}
                                {{--</a>--}}

                            </div>
                            @endif
                        </div>

                        @include('layouts.front_sidebar')



                    </div>
                </div>
            </div>
        </div>
    </div>
@stop