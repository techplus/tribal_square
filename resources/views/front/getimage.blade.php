<?php function getImage($image,$width,$height,$path)
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
		// Echo out the results and done
		return '<img class="img-responsive" src="'.$image.'" width="'.$outputwidth.'" height="'.$outputheight.'">';
	} ?>