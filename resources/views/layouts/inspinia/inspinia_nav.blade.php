<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <span>
                        <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                    </span>
                </div>
                  <!--   <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a> -->
                    <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul> -->
                
                <div class="logo-element">
                    IN+
                </div>
            </li>            
            @if( $oUser->type == "Providers" )
                <li {{ ( Request::segment(1) == "posts" ) ? 'class=active' : '' }}>
                    <a href="{{ route('posts.index') }}" ><i class="fa fa-edit"></i> <span class="nav-label">Posting</span></a>               
                </li>
                <?php /* <li>
                    <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Drafts</span></a>               
                </li> */ ?>
                <li>
                    <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Saved Searches</span></a>               
                </li>
                <li>
                    <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">Settings</span></a>               
                </li>
                <li>
                    <a href="#"><i class="fa fa-list-alt"></i> <span class="nav-label">Billing</span></a>               
                </li>
                <li {{ ( Request::segment(1) == "deals" ) ? 'class=active' : '' }}>
                    <a href="{{ route('deals.index') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Deals</span></a>               
                </li> 
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Posted Deals</span></a>               
                </li>          
            @endif          
        </ul>

    </div>
</nav>