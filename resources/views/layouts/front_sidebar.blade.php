<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    
    @if( !Auth::check() )
        <div class="categories_sidebar">
            <h2>Categories</h2>
            <ul class="nav nav-pills nav-stacked">
                <li class="active" role="presentation"><a href="#">All Deals</a></li>
                @foreach( $categories AS $category )
                    <li role="presentation"><a href="{{route('search.categories.show',[$category->id])}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="publish_deal_box">
        <p>Grow Your BUSINESS with <br>
            <strong>TRIBAL SQUARE</strong>
        </p>
        <span>Publish your great deal and get audience instantly.</span>
        <div class="clearfix"></div>
        <a class="btn btn-lg custome_blue_btn col-sm-2" href="{{action('Auth\AuthController@getIndex')}}" {{ (Auth::check()) ? 'disabled' : '' }}>
           Publish Your Deal<span style="color:#fff; font-size:16px;" class="glyphicon glyphicon-triangle-right"></span>
        </a>
    </div>

    <div class="advrt" align="center">
        <img src="{{url('images/advrt_1.jpg')}}" alt="" class="img-responsive">
    </div>

    <div class="current_deals_box">
        <h2>Current Deals</h2>
        <a href="{{ route('search.deals.index') }}">See all</a>

        <div class="clearfix"></div>
<!-- 
        <div class="col-item">
            <div class="photo">
                <img src="http://placehold.it/350x260" class="img-responsive" alt="a">
            </div>
            <div class="info">
                <div class="row">
                    <div class="price">
                        <h5>Sample Product</h5>
                    </div>
                    <div class="clearfix"></div>
                    <div class="rating hidden-sm col-md-6">
                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                        </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                        </i><i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="separator clear-left">
                    <p class="btn-add">49$</p>
                    <p class="btn-details">-51%</p>
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
 -->
        <ul class="media-list">
            @if( $aLatestDeals->count() > 0 )
                @foreach( $aLatestDeals as $oDeal  )
                    <li class="media">
                        <div class="media-left">
                            <a href="{{ route('search.deals.show' , [ $oDeal->id ] ) }}">
                                <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="{{ $oDeal->CoverPic->count() ? $oDeal->CoverPic->first()->image_path : url('images/no_image.png') }}" data-holder-rendered="true">                            
                                <span style="color:#000;">{{ $oDeal->discount_percentage }}%
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="{{ route('search.deals.show' , [ $oDeal->id ] ) }}" style="width:100%;color:#000;"><p>{{ $oDeal->title }}</p></a>
                        </div>
                    </li>
                @endforeach
            @endif          
        </ul>

    </div>

    <div class="advrt" align="center">
        <img src="{{ url( 'images/advrt_2.jpg' ) }}" alt="" class="img-responsive">
    </div>

</div>