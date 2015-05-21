@extends('layouts.front')

@section('content')    
    <div class="page-wrap">
        <div class="row header_wrap new_header_wrap">
            @include('layouts.front_navbar')
            <div class="page-content">
                <div class="row">
                    <div class="demo col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-right">
                        <div class="clearfix"></div>
                            @include('front.getimage')
                            <div class="col-sm-12 all_deal_box_wrap">
                                <h1>Recommended Deals for you</h1>
                                @if( $oDeals->isEmpty() )
                                <h3>No deal found!</h3>
                            @else
                                <?php $counter = 0; ?>
                            @foreach( $oDeals AS $deal )
                                @if( $counter == 1 ) <?php break; ?> @endif
                                    @if( $counter == 0 )                                    
                                        <?php $counter++; ?>
                                        @if( $deal->DealImages->count() > 0 )
                                             <div class="col-xs-12 banner_wrapper">                                            
                                                <img src="{{Image::url($deal->DealImages->first()->image_path,981,300)}}" alt="" class="img-responsive">
                                                <div class="banner_info">
                                                    <div class="info_wrapper col-xs-12">
                                                        <h4 class="title">{{$oDeals->first()->title}} </h4>
                                                        <p class="city"><span class="glyphicon glyphicon-map-marker"></span> {{$oDeals->first()->city}} </p>
                                                        <p class="pricing"><span class="strike_through">${{$oDeals->first()->original_price}}</span> From ${{$oDeals->first()->new_price}}</p>
                                                        <a class="btn btn-lg custome_blue_btn view_deal" href="{{route('search.deals.show',[$oDeals->first()->id])}}">View Deal</a>
                                                    </div>
                                                </div>
                                            </div> 
                                        @else
                                            <?php $oDealImages = $deal->DealImages(); ?>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 deal_for_day_image_wrap user-image">                                            
                                                <img src="{{ $oDealImages->count() > 0 ? $oDealImages->first()->image_path : url('images/no_image.png') }}" alt="" class="img-responsive" style="width:100%;">                                            
                                                <div>
                                                    <span>{{ $deal->discount_percentage }}%</span>
                                                    <p>DISCOUNT</p>
                                                </div>
                                            </div> 
                                        @endif
                                    @endif
                                @endforeach
                             
                            </div> 

                            <div class="col-sm-12 all_deal_box_wrap">
                                <h1>New Deals</h1>
                                <div class="col-sm-12 all_deal_box_wrap" style="margin-top:10px;">
                                    <div class="row">
                                        <div class="col-sm-12"></div>
                                    </div>
                                    <?php $counter = 0; ?>
                                    @foreach( $oDeals AS $oDeal )  
                                        <!-- @if( $counter++ == 0 ) <?php //continue; ?> @endif -->                                                                                                          
                                        @if( $counter == 0 ) <?php continue; ?> @endif
                                    <div class="col-sm-3 col-xs-6">
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
                                            <img alt="{{$oDeal->title}}" class="img-responsive" src="{{Image::url(( $oDeal->DealImages->count() > 0 ) ? $oDeal->DealImages->first()->image_path : ( $oDealsImages->count()  ? $oDealsImages->first()->image_path : url('images/no_image.png')),350,185)}}">
                                        </a>
                                    </div>
                                    <div class="info custom_info">
                                        <div class="row" style="float:left; height:28px;">
                                            <div class="price custom_price">
                                                <a href="{{route('search.deals.show',[$oDeal->id])}}" style="width:100%;" align="left">
                                                    <h5 style="text-indent: 0;font-size: 15px;">{{ ( strlen( $oDeal->title ) > 20 ) ? substr($oDeal->title,0,20)."..." : $oDeal->title }}</h5>
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="separator">
                                            <p class="btn-add strike_through"><span style="float:left; text-transform:none;">{{ ( strlen( $oDeal->city ) > 30 ) ? substr($oDeal->city,0,30)."..." : $oDeal->city }}</span>${{$oDeal->original_price}}</p>
                                            <p class="btn-details">${{$oDeal->new_price}} <!-- -{{$oDeal->discount_percentage}}% --></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                                                                   
                                    @endforeach
                                </div>

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