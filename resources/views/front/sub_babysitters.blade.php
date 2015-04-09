 @if( !empty($aBabySitters) )
  @include('front.getimage')
@foreach( $aBabySitters as $oBabySitter )	
    <div class="clearfix"></div>
		<div class="row user-menu-container square">
	        <div class="col-sm-7 user-details">
	            <div class="row coralbg white">
	                <div class="col-sm-6 no-pad">	                	
	                    <div class="user-image" align="center" style="height:295px;width:443px;position:relative;">
	                      <?php
		                        $image = ( $oBabySitter->Account ) ? ( ( $oBabySitter->Account->profile_pic ) ? url('profile_pictures/'.$oBabySitter->Account->profile_pic) :  url('images/no_image.png') ) : url('images/no_image.png');
		                        $path = ( $oBabySitter->Account ) ? ( ( $oBabySitter->Account->profile_pic ) ? base_path('profile_pictures/'.$oBabySitter->Account->profile_pic) : base_path('images/no_image.png') ) : base_path('images/no_image.png');
		                        echo getImage($image,443,295,$path,true);
	                      ?>
	                    </div>
	                </div>
	                <div class="col-sm-6 no-pad">
	                    <div class="user-pad">
	                        <h3>{{ ucFirst($oBabySitter->firstname)." ".ucFirst($oBabySitter->lastname)}}</h3>
	                        <?php echo ( $oBabySitter->Bio ) ? '<p>'.( ( strlen( $oBabySitter->Bio->title ) > 40 ) ? substr($oBabySitter->Bio->title,0,39)."...</p>"  : '<p>'.$oBabySitter->Bio->title.'</p>' ) : ''; ?>
	                        <?php echo ( $oBabySitter->Account ) ? ' <h5 class="white"><i class="glyphicon glyphicon-heart"></i> Age : '.$oBabySitter->Account->age.'</h5>' : ''; ?>
	                        <?php echo ( $oBabySitter->Bio ) ?  '<h5 class="white"><i class="glyphicon glyphicon-map-marker"></i> Less than  '.$oBabySitter->Bio->miles_from_home.' mile </h5>' : ''; ?>
	                        <h5 class="white"><i class="glyphicon glyphicon-lock"></i> Last 
	                        signed in: {{ date('m/d/Y h:i a' , strtotime($oBabySitter->last_logged_in))}}</h5>
	                        <?php echo ( $oBabySitter->Account ) ? '<h5 class="white"><i class="glyphicon glyphicon-ok"></i> Babysitter in '.ucfirst($oBabySitter->Account->city).",".$oBabySitter->Account->state." ".$oBabySitter->Account->pin.".</h5>" : ''; ?> 
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
	                <p>{{ ( $oBabySitter->Bio ) ? ( (strlen($oBabySitter->Bio->experience) > 175 ) ? substr($oBabySitter->Bio->experience,0,174)."..." : $oBabySitter->Bio->experience ) : '' }}</p>
	                <a href="{{ action('BabySittersController@show', [ $oBabySitter->id ]) }}" class="btn btn-md custome_blue_btn view_profile_btn">See Full Profile</a>
	            </div>
	        </div>
	    </div>						    
	@endforeach
@endif