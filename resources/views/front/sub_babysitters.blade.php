 @if( !empty($aBabySitters) )
@foreach( $aBabySitters as $oBabySitter )
    <div class="clearfix"></div>
		<div class="row user-menu-container square">
	        <div class="col-sm-7 user-details">
	            <div class="row coralbg white">
	                <div class="col-sm-6 no-pad">
	                    <div class="user-image">
	                        <img src="{{ url('profile_pictures/'.$oBabySitter->Account->profile_pic) }}" class="img-responsive thumbnail">
	                    </div>
	                </div>
	                <div class="col-sm-6 no-pad">
	                    <div class="user-pad">
	                        <h3>{{ ucFirst($oBabySitter->firstname)." ".ucFirst($oBabySitter->lastname)}}</h3>
	                        <h5 class="white"><i class="glyphicon glyphicon-heart"></i> Age : {{ $oBabySitter->Account->age }}</h5>
	                        <h5 class="white"><i class="glyphicon glyphicon-map-marker"></i> Less than {{ $oBabySitter->Bio->miles_from_home }} mile <small style="color: #fff;"> (Atlanta, GA) </small></h5>
	                        <h5 class="white"><i class="glyphicon glyphicon-lock"></i> Last 
	                        signed in: {{ date('m/d/Y h:i a' , strtotime($oBabySitter->last_logged_in))}}</h5>
	                        <h5 class="white"><i class="glyphicon glyphicon-ok"></i> Enhanced Background Check</h5>
	                        <span class="glyphicon glyphicon-star" style="color: #f38a02;"></span>
	                        <span class="glyphicon glyphicon-star" style="color: #f38a02;"></span>
	                        <span class="glyphicon glyphicon-star" style="color: #f38a02;"></span>
	                        <span class="glyphicon glyphicon-star" style="color: #f38a02;"></span>
	                        <span class="glyphicon glyphicon-star-empty" style="color: #f38a02;"></span>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-4 user-menu user-pad">
	            <div class="user-menu-content active">
	                <h3>
	                    About Me :
	                </h3>
	                <p>{{ (strlen($oBabySitter->Bio->experience) > 175 ) ? substr($oBabySitter->Bio->experience,0,174)."..." : $oBabySitter->Bio->experience }}</p>
	                <a href="{{ action('BabySittersController@show', [ $oBabySitter->id ]) }}" class="btn btn-md custome_blue_btn view_profile_btn">See Full Profile</a>
	            </div>
	        </div>
	    </div>						    
	@endforeach
@endif