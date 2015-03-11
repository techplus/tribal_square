<div class="row header_wrap">
    <div class="col-xs-12">
        <div class="logo"> <a href="#"> <img src="images/logo.png" alt="" class="img-responsive"> </a> </div>
        <div class="inner_top_useroption">
            <a href="#" class="useroption_ative">My Profile</a> |
            <a href="#">{{Auth::user()->firstname}}</a> |
            <a href="{{action('Auth\AuthController@getLogout')}}">Logout</a>
        </div>
        <div class="header_search">
            <form action="#">
                <input type="text" class="form-control header_item_search" placeholder="What are you looking for ?">
                <input type="text" class="form-control header_location_search" placeholder="Enter your Location">
            </form>
        </div>
    </div>
</div>
<div class="row login_subnav_wrap">
    <div class="login_subnav">
        <a href="#">View All Deals</a>
        <a href="#">Tribal Classifieds</a>
        <a href="#">View Baby Sitters </a>
    </div>
    <div class="publish_deal_topbtn">
        <a href="#" class="btn btn-success btn-md">Publish Your Deal</a>
    </div>
</div>
