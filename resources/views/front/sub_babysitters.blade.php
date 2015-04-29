@if( !empty($aBabySitters) )
@foreach( $aBabySitters as $oBabySitter )	
    <div class="clearfix"></div>
		<div class="row user-menu-container square">
	        <div class="col-sm-7 user-details">
	            <div class="row coralbg white">
	                <div class="col-sm-6 no-pad">
	                    <div class="user-image">
                        	<img style="width:100%;max-width: 275px;height: 275px;margin-top: 16px;margin-left:50px;" src="{{ Image::url(( $oBabySitter->Account ) ? ( ( $oBabySitter->Account->profile_pic ) ? url('profile_pictures/'.$oBabySitter->Account->profile_pic) :  url('images/no_image.png') ) : url('images/no_image.png'),275,275) }}" class="img-responsive thumbnail">
                    	</div>
	                </div>
	                <div class="col-sm-6 no-pad">
	                    <div class="user-pad">
	                        <h3><a href="{{ action('BabySittersController@show', [ $oBabySitter->id ]) }}" style="color:#000;">{{ ucFirst($oBabySitter->firstname)." ".ucFirst($oBabySitter->lastname)}}</a></h3>
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