{{--<div class="container">--}}
    <div class="col-xs-12">
        <div class="logo">
            @if( Request::segment(2) == "deals" || Request::segment(1) == "shopping-cart")
                <a href="{{url('/')}}">
                    <img src="{{asset('/images/TSDeals_Logo.jpg')}}" height="41" alt="" class="img-responsive">
                </a>
            @elseif(Request::segment(2) == "babysitters")  
                <a href="{{url('/')}}">
                    <img src="{{asset('/images/TSSittersLogo.jpg')}}" height="41" alt="" class="img-responsive">
                </a>
            @elseif(Request::segment(2) == "classified")  
            <a href="{{url('/')}}">
                <img src="{{asset('/images/TSListings_Logo.jpg')}}" height="41" alt="" class="img-responsive">
            </a>
            @else
              <a href="{{url('/')}}">
                 <img src="{{asset('/images/logo1.jpg')}}" height="41" alt="" class="img-responsive">
              </a>
            @endif
            
        </div>
        <div class="header_btns_wrap" style="margin-top: 5px;font-weight: bold;">
            @if( Request::url() == action('Auth\AuthController@getIndex' ) )
                <a href="{{action('Auth\RegisterController@getIndex')}}" class="btn btn-lg red_btn">Signup</a>
            @elseif( ! Auth::check() )
                <a href="{{action('Auth\RegisterController@getIndex')}}" class="btn btn-lg red_btn">Signup</a>
                <a href="{{action('Auth\AuthController@getIndex')}}" class="btn btn-lg red_btn">Login</a>
            @else
            <?php echo "Welcome ".Auth::user()->firstname. " ".Auth::user()->lastname ; ?>
            <?php $oUser = Auth::user()->UserTypes()->first(); 
            $userType = $oUser->name;
            if($userType == 'Providers')
            {
              $dashBoardLink = action('Users\PostsController@index');
            }
            elseif($userType == 'BabySitters')
            {
              $dashBoardLink = action('Users\BabySittersController@getIndex');
            }
            elseif($userType == 'SalesAgent')
            {
              $dashBoardLink = action('Users\SalesAgentController@index'); 
            }
            elseif($userType == 'SuperAdmin' || $userType == 'Admin')
            {
              $dashBoardLink = action('Admin\PostsController@index');  
            }
          ?><br>
            <a href="{{ $dashBoardLink }}" class="">My Dashboard</a> | 
                <!-- <a href="{{action('Auth\AuthController@getLogout')}}" class="btn btn-lg red_btn">Logout</a> -->
                <a href="{{action('Auth\AuthController@getLogout')}}" class="">Logout</a>
            @endif
        </div> 
        <div class="header_search">
            <form action="{{ route('search.store') }}" method="post" id="frmSearch" name="frmSearch">                
                @if( Auth::check() )
                <input type="hidden" class="user_id" name="user_id" value="{{ Auth::user()->id }}">
                @endif
                <input type="text" name="term" class="form-control header_item_search" placeholder="What are you looking for ?" value="{{ ( !empty($aSearch) ) ? $aSearch['term'] : '' }}">
                <input type="text" name="location" id="autocomplete1" class="form-control header_location_search" placeholder="Enter your Location" value="{{ ( !empty($aSearch) ) ? $aSearch['location'] : '' }}">               
                <input type="submit" name="search" class="btn red_btn" value="Go">
                @if( Auth::check() )
                    <?php  $oUser = Auth::user()->UserTypes()->first(); $userType = $oUser->name; ?>
                    @if( $userType != 'SuperAdmin' || $userType == 'Admin' )
                        @if( Request::segment(2) != "babysitters" )
                            <a href="#" class="savesearch_btn" id="savesearch_btn" style="float:right;margin-right: 55px;"> Save Search </a>
                        @endif        
                    @endif
                @endif
                @if( !empty( $aSearch[ 'type' ] ) )
                    <input type="hidden" class="type" name="type" value="{{ $aSearch[ 'type' ] }}">
                @elseif( Request::segment(2) == "deals" )
                    <input type="hidden" class="type" name="type" value="deals">
                @elseif( Request::segment(2) == "classified" )
                    <input type="hidden" class="type" name="type" value="classified">
                @elseif( Request::segment(2) == "babysitters" )
                    <input type="hidden" class="type" name="type" value="baby_sitter">
                @else
                    <input type="hidden" class="type" name="type" value="">
                @endif
                <input type="hidden" class="category" name="cat" value="{{ ( !empty($aSearch) ) ? $aSearch['cat'] : '' }}">                
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
            @else
                <input type="hidden" class="type" name="type" value="">
            @endif
            <input type="hidden" name="cat" value="{{ ( !empty($aSearch) ) ? $aSearch['cat'] : '' }}">                
        </form>         
        <div class="login_subnav" style="{{ (  Request::segment(2) == "deals" OR Request::segment(1) == "shopping-cart"  ) ? 'margin-top:5px;' : '' }}">
            <a href="{{ url('/') }}">Home</a>
            <a href="javascript:;" class="menu-links {{ ( Request::segment(2) == 'deals' ) ? 'link-active' : '' }}" data-type="deals">Deals</a>
            <a href="javascript:;" class="menu-links {{ ( Request::segment(2) == 'babysitters' ) ? 'link-active' : '' }}" data-type="baby_sitter">Nannies/Babysitter </a>
            <a href="{{route('search.categories.index')}}?type=classified" class="menu-links {{ ( Request::segment(2) == 'classified' ) ? 'link-active' : '' }}" data-type="classified">Listings</a>
        </div>

        @if( Request::segment(2) == "deals" OR Request::segment(1) == "shopping-cart" )
            <a href="{{ url('shopping-cart') }}"><button class="header_cart btn  btn-success btn-md " style="margin:0;margin-right:10px;"><span class="glyphicon glyphicon-shopping-cart"></span><span class="no_of_items"> My Cart {{ (Session::has('products')) ? "( ".count(Session::get('products'))." Items )" : '' }}</span></button></a>
        @endif
    {{--</div>--}}
</div>
<script type="text/javascript">
    
$(document).ready(function(){
    $('#savesearch_btn' ).on('click',function(){
        var user_id     = $('.user_id').val();
        var keyword     = $('.header_item_search').val();
        var location    = $('.header_location_search').val();
        var category_id = $('.category').val();
        var type       = $('.type').val();

        if($('.header_item_search').val() == "" && $('.header_location_search').val() == "")
        {
            alert("Sorry, Please enter Keyword or Location.");
        }
        else
        {
           $.ajax({
                url : "{{ route('save-search.store') }}",
                type:"POST",
                data:{user_id:user_id,keyword:keyword,location:location,category_id:category_id,type:type}
                }).success(function(data){
                    alert('Search Saved.');
            })
        }
    });
});
</script>