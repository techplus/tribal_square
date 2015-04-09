{{--<div class="container">--}}
    <div class="col-xs-12">
        <div class="logo">
            <a href="{{url('/')}}">
                <img src="{{asset('/images/logo.jpg')}}" height="41" alt="" class="img-responsive">
            </a>
        </div>

        <div class="header_btns_wrap">
            @if( Request::url() == action('Auth\AuthController@getIndex' ) )
                <a href="{{action('Auth\RegisterController@getIndex')}}" class="btn btn-lg custome_blue_btn">Signup</a>
            @elseif( ! Auth::check() )
                <a href="{{action('Auth\AuthController@getIndex')}}" class="btn btn-lg custome_blue_btn">Login</a>
            @else
                <a href="{{action('Auth\AuthController@getLogout')}}" class="btn btn-lg custome_blue_btn">Logout</a>
            @endif
        </div>        
        <div class="header_search">
            <form  action="{{ route('search.store') }}" method="post">                
                <input type="text" name="term" class="form-control header_item_search" placeholder="What are you looking for ?" value="{{ ( !empty($aSearch) ) ? $aSearch['term'] : '' }}">
                <input type="text" name="location" id="autocomplete1" class="form-control header_location_search" placeholder="Enter your Location" value="{{ ( !empty($aSearch) ) ? $aSearch['location'] : '' }}">               
                <input type="submit" name="search" class="btn custome_blue_btn" value="Go">

                @if( !empty( $aSearch[ 'type' ] ) )
                    <input type="hidden" name="type" value="{{ $aSearch[ 'type' ] }}">
                @elseif( Request::segment(2) == "deals" )
                    <input type="hidden" name="type" value="deals">
                @elseif( Request::segment(2) == "classified" )
                    <input type="hidden" name="type" value="classified">
                @elseif( Request::segment(2) == "babysitters" )
                    <input type="hidden" name="type" value="baby_sitter">
                @endif
                <input type="hidden" name="cat" value="{{ ( !empty($aSearch) ) ? $aSearch['cat'] : '' }}">                
            </form> 
        </div>                
    </div>
</div>
{{--</div>--}}

<div class="row login_subnav_wrap">
    {{--<div class="container">--}}

        <form id="frmMenuLinks" action="{{ route('search.store') }}" method="post" style="display:none;">                
            <input type="hidden" name="term" value="{{ ( !empty($aSearch) ) ? $aSearch['term'] : '' }}">
            <input type="hidden" name="location" value="{{ ( !empty($aSearch) ) ? $aSearch['location'] : '' }}">                           

            @if( !empty( $aSearch[ 'type' ] ) )
                <input type="hidden" class="type" name="type" value="{{ $aSearch[ 'type' ] }}">
            @elseif( Request::segment(2) == "deals" )
                <input type="hidden" class="type" name="type" value="deals">
            @elseif( Request::segment(2) == "classified" )
                <input type="hidden" class="type" name="type" value="classified">
            @elseif( Request::segment(2) == "babysitters" )
                <input type="hidden" class="type" name="type" value="baby_sitter">
            @endif
            <input type="hidden" name="cat" value="{{ ( !empty($aSearch) ) ? $aSearch['cat'] : '' }}">                
        </form>         
        <div class="login_subnav">
            <a href="javascript:;" class="menu-links {{ ( Request::segment(2) == 'deals' ) ? 'link-active' : '' }}" data-type="deals">View All Deals</a>
            <a href="javascript:;" class="menu-links {{ ( Request::segment(2) == 'classified' ) ? 'link-active' : '' }}" data-type="classified">Tribal Classifieds</a>
            <a href="javascript:;" class="menu-links {{ ( Request::segment(2) == 'babysitters' ) ? 'link-active' : '' }}" data-type="baby_sitter">View Baby Sitters </a>
        </div>
        @if( Request::segment(2) == "deals" OR Request::segment(1) == "shopping-cart" )
            <a href="{{ url('shopping-cart') }}"><button class="header_cart btn custome_blue_btn no_of_items" style="margin:0;margin-right:10px;">My Cart {{ (Session::has('products')) ? "( ".count(Session::get('products'))." Items )" : '' }}</button></a>
        @endif
    {{--</div>--}}
</div>