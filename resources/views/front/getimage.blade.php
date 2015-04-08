<?php function getImage($image,$width,$height,$path,$absolute = false)
	{		
		// Set the width of the area and height of the area
		$inputwidth = $width;
		$inputheight = $height;

		// Get the width and height of the Image
		list($width,$height) = getimagesize($path);

		// So then if the image is wider rather than taller, set the width and figure out the height
		if (($width/$height) > ($inputwidth/$inputheight)) {
		        $outputwidth = $inputwidth;
		        $outputheight = ($inputwidth * $height)/ $width;
		    }
		// And if the image is taller rather than wider, then set the height and figure out the width
		    elseif (($width/$height) < ($inputwidth/$inputheight)) {
		        $outputwidth = ($inputheight * $width)/ $height;
		        $outputheight = $inputheight;
		    }
		// And because it is entirely possible that the image could be the exact same size/aspect ratio of the desired area, so we have that covered as well
		    elseif (($width/$height) == ($inputwidth/$inputheight)) {
		        $outputwidth = $inputwidth;
		        $outputheight = $inputheight;
		        }

		    if( $absolute )    
		    {
		    	$top = 0;
		    	$remainheight = (float) number_format( ($inputheight - $outputheight) , 2);
		    	if( $remainheight != 0 OR  $remainheight != 0.00 )
		    		$top = (float)number_format(( $remainheight / 2 ), 2);
		    	$left = 0;
		    	$remainwidth = (float) number_format( ($inputwidth - $outputwidth) , 2);
		    	if( $remainwidth != 0 OR  $remainwidth != 0.00 )
		    		$left = (float)number_format(( $remainwidth / 2 ), 2);

		    }
		// Echo out the results and done
		return '<img class="img-responsive img-custom" src="'.$image.'"  style="'.($absolute ? 'position:absolute;left:'.$left.'px;;height:'.$outputheight.'px;width:'.$outputwidth.'px;top:'.$top."px;" : '' ).'">';
	} ?>