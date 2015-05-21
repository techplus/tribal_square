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

    <div class="advrt" align="center">
        <img src="{{url('images/advrt_1.jpg')}}" alt="" class="img-responsive">
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
        @if( Request::segment(2) == "deals" OR Request::segment(1) == "deals" )
             @if( $aLatestDeals->count() > 0 )
                <div class="current_deals_box">
                    <h2>Current Deals</h2>
                    <a href="{{ route('search.deals.index') }}">See all</a>
                    <div class="clearfix"></div>
                    <ul class="media-list">                    
                        @foreach( $aLatestDeals as $oDeal  )
                            <li class="media" style="border-top:1px dashed #999;padding-top:5px;">
                                <div class="media-left">
                                    <a href="{{ route('search.deals.show' , [ $oDeal->id ] ) }}">
                                        <?php $oDealImagesSidebar = ( $oDeal->CoverPic->count() ) ? $oDeal->CoverPic : $oDeal->DealImages(); ?>
                                        <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="{{ $oDeal->CoverPic->count() ? $oDeal->CoverPic->first()->image_path : ( $oDealImagesSidebar->count() > 0 ? $oDealImagesSidebar->first()->image_path : url('images/no_image.png')) }}" data-holder-rendered="true">                            
                                        <span style="color:#000;">{{ $oDeal->discount_percentage }}%</span>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{ route('search.deals.show' , [ $oDeal->id ] ) }}" style="width:100%;color:#000;"><p>{{ ( strlen( $oDeal->title ) > 75 ) ? substr( $oDeal->title , 0 , 75 )."..." :  $oDeal->title }}<br>${{ $oDeal->new_price }}</p></a>
                                </div>
                            </li>
                        @endforeach                    
                    </ul>
                </div>
             @endif
        @endif

                
        
           

    <div class="advrt" align="center">
        <img src="{{ url( 'images/advrt_2.jpg' ) }}" alt="" class="img-responsive">
    </div>

</div>