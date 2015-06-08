<?php
    $aSideBarAsLeftPages = array(url('search/deals'),url('search/babysitters'));
    if( in_array(Request::url(),$aSideBarAsLeftPages ) )
        $typeVar = 'left_ads';
    else
        $typeVar = 'right_ads';
?>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    @if( isset( $subcategories ) AND $subcategories->count() > 0 )
        @if( Request::segment(2) == "deals" OR Request::segment(1) == "deals" )
            <div class="categories_sidebar">
                <h2>Categories</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="{{ ( !$cat_id ) ? 'active' : '' }}" role="presentation"><a class="linkcolor" href="{{route('search.categories.index')}}?type=deals">All Deals</a></li>
                    @foreach( $subcategories AS $category )
                        <li role="presentation" class="{{ ( $cat_id == $category->id ) ? 'active' : '' }}"><a class="linkcolor" href="{{ route('search.categories.show',[ $category->id ]) }}?type=deals">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        @elseif( Request::segment(2) == "classified" OR Request::segment(2) == "posts" )            
            <div class="categories_sidebar">
                <h2>Categories</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="{{ ( !$cat_id ) ? 'active' : '' }}" role="presentation"><a class="linkcolor" href="{{route('search.categories.index')}}?type=classified">All classified</a></li>
                    @foreach( $subcategories AS $category )
                        <li role="presentation" class="{{ ( $cat_id == $category->id ) ? 'active' : '' }}"><a class="linkcolor" href="{{ route('search.categories.show',[ $category->id ]) }}?type=classified">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif

    @endif

    @if( Request::segment(2) == "deals" OR Request::segment(1) == "deals" )
        <div class="publish_deal_box">
            <p>Grow Your BUSINESS with <br>
                <strong>TRIBALSQUARE</strong>
            </p>
            <span>Publish your great deal and get audience instantly.</span>
            <div class="clearfix"></div>
            <a class="btn btn-lg custome_blue_btn col-sm-2" href="{{action('Auth\AuthController@getIndex')}}" {{ (Auth::check()) ? 'disabled' : '' }}>
               Publish Your Deal<span style="color:#fff; font-size:16px;" class="glyphicon glyphicon-triangle-right"></span>
            </a>
        </div>
    @endif
        <?php $firstAd = $$typeVar->filter(function($q){return preg_match('/1$/',$q->type);})->first(); ?>
    <div class="advrt" align="center">
        @if( $firstAd && !empty($firstAd->link ) )
            <a target="_blank" href="{{$firstAd ? $firstAd->link : url( '#' ) }}">
        @endif
            <img height="250" width="300" src="{{$firstAd ? $firstAd->image : url('images/advrt_1.jpg')}}" alt="" class="img-responsive">
        @if( $firstAd && !empty($firstAd->link ) )
            </a>
        @endif
    </div>
        @if( Request::segment(2) == "classified" OR Request::segment(2) == "posts" )
            @if( $aLatestPosts->count() > 0 ) 
             <div class="current_deals_box">
                    <h2>Current Classified</h2>
                    <a href="{{ route('search.classified.index') }}">See all</a>
                    <div class="clearfix"></div>
                    <ul class="media-list">                      
                        @foreach( $aLatestPosts as $oPost )
                            <li class="media" style="border-top:1px dashed #999;padding-top:5px;">
                                <div class="media-left">
                                    <a href="{{ route('search.classified.show' , [ $oPost->id ] ) }}">
                                        <?php $oClassifiedImagesSidebar = ( $oPost->CoverPic->count() ) ? $oPost->CoverPic : $oPost->ClassifiedImages(); ?>
                                        <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="{{ $oPost->CoverPic->count() ? $oPost->CoverPic->first()->image_path : ( $oClassifiedImagesSidebar->count() ? $oClassifiedImagesSidebar->first()->image_path : url('images/no_image.png')) }}" data-holder-rendered="true">                                                               
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{ route('search.classified.show' , [ $oPost->id ] ) }}" style="width:100%;color:#000;"><p>{{ ( strlen( $oPost->title ) > 75 ) ? substr( $oPost->title , 0 , 75 )."..." :  $oPost->title }}</p></a>
                                </div>
                            </li>
                        @endforeach                           
                    </ul>

                 </div>
            @endif
        @endif
        <?php $secondAd = $$typeVar->filter(function($q){return preg_match('/2$/',$q->type);})->first(); ?>
    <div class="advrt" align="center">
        @if( $secondAd && !empty( $secondAd->link ) )
            <a target="_blank" href="{{$secondAd ? $secondAd->link : url( '#' ) }}">
        @endif
            <img height="250" width="300" src="{{$secondAd ? $secondAd->image : url( 'images/advrt_2.jpg' ) }}" alt="" class="img-responsive">
        @if( $secondAd && !empty( $secondAd->link ) )
            </a>
        @endif
    </div>

</div>