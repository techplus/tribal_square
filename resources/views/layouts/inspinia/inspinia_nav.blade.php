<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <span>
                        <a href="{{url('/')}}">
                            <img alt="image" class="img-circle" src="{{ url('images/logo.png') }}" />
                        </a>
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
                    <!-- IN+ -->
                </div>
            </li>            
            @if( $oUser->type == "Providers" )
                <li {{ ( Request::segment(1) == "posts" ) ? 'class=active' : '' }}>
                    <a href="{{ route('posts.index') }}" ><i class="fa fa-edit"></i> <span class="nav-label">Your Listings</span></a>               
                </li>
                <li {{ ( Request::segment(1) == "deals" ) ? 'class=active' : '' }}>
                    <a href="{{ route('deals.index') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Your Deals</span></a>               
                </li> 
                <?php /* <li>
                    <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Drafts</span></a>               
                </li> */ ?>
                <li>
                    <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Saved Searches</span></a>               
                </li>
                <li class="{{Request::url() == route('providers.show',[Auth::user()->id]) ? 'active' : ''}}">
                    <a href="{{route('providers.show',[Auth::user()->id])}}"><i class="fa fa-cog"></i> <span class="nav-label">Settings</span></a>
                </li>
                <li class="{{Request::url() == route('provider.billings.index') ? 'active' : ''}}">
                    <a href="{{route('provider.billings.index')}}"><i class="fa fa-list-alt"></i> <span class="nav-label">Billing</span></a>
                </li>
                
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Posted Deals</span></a>               --}}
                {{--</li>    --}}

            @elseif( $oUser->type == "BabySitters" )      
                 @foreach( $aMenu as $key => $sMenu )
                     <li class="{{ ( $section == $sMenu ) ? 'active' : '' }}">
                        <a href="{{ ( $key <= $last_step ) ? action('Users\BabySittersController@getIndex').'/index/'.$sMenu : '#' }}" >{{ $aMenuLables[ $key ] }}</span></a>
                     </li>                       
                 @endforeach
                 <li class="{{Request::url() == route('baby-sitter.billings.index') ? 'active' : ''}}">
                     <a href="{{route('baby-sitter.billings.index')}}"><i class="fa fa-list-alt"></i> <span class="nav-label">Billing</span></a>
                 </li>
                
                @elseif( $oUser->type == "SalesAgent" )      
                <li {{ ( Request::segment(1) == "sales-agents" ) ? 'class=active' : '' }}>
                    <a href="{{ route('sales-agents.index') }}"><i class="fa fa-cog"></i> <span class="nav-label">Settings</span></a>
                </li>
                <li {{ ( Request::segment(2) == "show-earnings" ) ? 'class=active' : '' }}>
                    <a href="{{ action('Users\SalesAgentController@getShowEarnings',[$oUser->id,date('Y')]) }}"><i class="fa fa-cog"></i> <span class="nav-label">Billing</span></a>
                </li>
                                        
            @endif          
        </ul>

    </div>
</nav>