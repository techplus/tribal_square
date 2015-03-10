<div class="container">
    <div class="col-xs-12">
        <div class="logo">
            <a href="/">
                <img src="{{asset('/images/logo.png')}}" alt="" class="img-responsive">
            </a>
        </div>

        <div class="header_btns_wrap">
            @if( Request::url() == action('Auth\AuthController@getIndex' ) )
                <a href="{{action('Auth\RegisterController@getIndex')}}" class="btn btn-lg custome_blue_btn">Signup</a>
            @elseif( ! Auth::check() )
                <a href="{{action('Auth\AuthController@getIndex')}}" class="btn btn-lg custome_blue_btn">Login</a>
            @endif
        </div>
        <div class="header_search">
            <form action="#">
                <input type="text" class="form-control header_item_search" placeholder="What are you looking for ?">
                <input type="text" class="form-control header_location_search" placeholder="Enter your Location">
            </form>
        </div>
    </div>
</div>
</div>

<div class="row login_subnav_wrap">
    <div class="container">
        <div class="login_subnav">
            <a href="#">View All Deals</a>
            <a href="#">Tribal Classifieds</a>
            <a href="#">View Baby Sitters </a>
        </div>
    </div>
</div>