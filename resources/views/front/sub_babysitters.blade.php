<?php 
function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}
?>

@if( !empty($aBabySitters) )
@foreach( $aBabySitters as $oBabySitter )	
    <!-- <div class="clearfix"></div> --> 
    	<div class="row user-menu-container square">
	        <div class="col-sm-7 user-details"> 
	            <div class="row coralbg white">
	                <div class="col-sm-12 col-md-6 no-pad">
	                    <div class="user-image" style="padding-bottom:0">
                        	<div class="BabySitterImg" style="background-image: url('{{ Image::url(( $oBabySitter->Account ) ? ( ( $oBabySitter->Account->profile_pic ) ? url('profile_pictures/'.$oBabySitter->Account->profile_pic) :  url('images/no_image.png') ) : url('images/no_image.png'),275,275) }}');">
                        	</div>
                    	</div>
	                </div>
	                <div class="col-sm-6 no-pad">
	                    <div class="user-pad">
	                        <h3><a href="{{ action('BabySittersController@show', [ $oBabySitter->id ]) }}" style="color:#000;">{{ ucFirst($oBabySitter->firstname)." ".ucfirst(substr($oBabySitter->lastname,0,1))."."}}</a></h3>
	                        <?php echo ( $oBabySitter->Bio ) ? '<p style="clear:both">'.( ( strlen( $oBabySitter->Bio->title ) > 25 ) ? substr($oBabySitter->Bio->title,0,24)."...</p>"  : '<p style="clear:both">'.$oBabySitter->Bio->title.'</p>' ) : ''; ?>
	                        <?php echo ( $oBabySitter->Account ) ? ' <h5 class="white"><i class="glyphicon glyphicon-heart"></i> Age : '.$oBabySitter->Account->age.'</h5>' : ''; ?>
	                        <?php echo ( $oBabySitter->Bio ) ?  '<h5 class="white"><i class="glyphicon glyphicon-map-marker"></i> Less than  '.$oBabySitter->Bio->miles_from_home.' mile </h5>' : ''; ?>
	                        <h5 class="white"><i class="glyphicon glyphicon-lock"></i> Last 
	                        signed in: {{ time_elapsed_string(strtotime($oBabySitter->last_logged_in),true) }} <!-- date('m/d/Y h:i a' , strtotime($oBabySitter->last_logged_in))}} --></h5>
	                        <?php 
	                        	$addres = ucfirst($oBabySitter->Account->city).", ".$oBabySitter->Account->state." ".$oBabySitter->Account->pin;
	                        	$lenAdd = strlen(preg_replace('/\s\s+/', ' ',$addres));
	                        	if($lenAdd > 20){ $a = substr($addres,0,20)."..."; }
	                        	else{$a = $addres;}
	                        ?>
	                        <?php echo ( $oBabySitter->Account ) ? '<h5 class="white"><i class="glyphicon glyphicon-ok"></i> '.$a."</h5>" : ''; ?> 
	                        <?php echo ( $oBabySitter->Bio ) ? '<h5 class="white"><i class="glyphicon glyphicon-ok"></i> Rate : $'.$oBabySitter->Bio->average_rate_from.' - $'.$oBabySitter->Bio->average_rate_to."</h5>" : ''; ?> 
	                        <?php echo ( $oBabySitter->nationality ) ? '<h5 class="white"><i class="glyphicon glyphicon-ok"></i> Nationality '.ucfirst($oBabySitter->Account->nationality).".</h5>" : ''; ?> 
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
	                <a href="{{ action('BabySittersController@show', [ $oBabySitter->id ]) }}" class="btn btn-md red_btn view_profile_btn">See Full Profile</a>
	            </div>
	        </div>
	    </div>						    
	@endforeach
@endif