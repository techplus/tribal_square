@forelse( $classifieds AS $category=>$items)
<div class="row">
	<div class="row">
        <div class="col-sm-12">
        	<h3 style="float:left;">{{$category}}</h3>
        </div>
    </div>
    @foreach( array_chunk($items,4) as $key=>$chunk)
    	@foreach( $chunk AS $key=>$item )
	    <div class="row user-menu-container square">	
	    	<div class="col-sm-7 user-details"> 
		        <div class="row coralbg white">
		            <div class="col-sm-12 col-md-6 no-pad">
		                <div class="user-image" style="padding-bottom:0">
		                	<a href="{{route('search.classified.show',[$item->id])}}" style="margin-left:0;width:100%;">                                                            
		                        <?php $oItemImages = $item->ClassifiedImages(); ?>
		                    	<div class="BabySitterImg" style="background-image: url('{{ Image::url(( $item->ClassifiedImages->count() > 0 ) ? $item->ClassifiedImages->first()->image_path : ( $oItemImages->count() ? $oItemImages->first()->image_path : url('images/no_imgae.png')),350,260) }});">
		                		</div>
		                	</a>
		            	</div>
		            </div>
		            <div class="col-sm-6 no-pad">
		                <div class="user-pad">
		                    <h3>
		                    	<a href="{{route('search.classified.show',[$item->id])}}" style="color:#000;">
		                    	{{ ( strlen( $item->title ) > 20 ) ? substr($item->title,0,19)."..." : $item->title }}
		                    	</a>
		                    </h3>
		                    <p style="clear:both">Price : ${{$item->price}}</p>	                         
		                    <h5 class="white"><i class="glyphicon glyphicon-ok"></i> Condition: {{$item->condition}}</h5>	                        
		                    <h5 class="white"><i class="glyphicon glyphicon-ok"></i> Make/Manufacturer: {{$item->manufacture}}</h5> 
		                    <h5 class="white"><i class="glyphicon glyphicon-ok"></i> Model Name/Number: {{$item->model_number}}</h5> 
		                    <h5 class="white"><i class="glyphicon glyphicon-ok"></i> Size/Dimension: {{$item->size}}</h5> 
		                </div>
		            </div>
		        </div>
	    	</div>
    		<div class="col-sm-4 user-menu user-pad">
        		<div class="user-menu-content active">
            		<h3> Contact Information : </h3>
            		<h5 class="white"><i class="glyphicon glyphicon-ok"></i> Condition: {{$item->location2}}</h5>
            		<h5 class="white"><i class="glyphicon glyphicon-ok"></i> Telephone: {{$item->phone}}</h5>
            		<h5 class="white"><i class="glyphicon glyphicon-ok"></i> E-mail: {{$item->email}}</h5>
            		<a href="{{route('search.classified.show',[$item->id])}}" class="btn btn-md red_btn view_profile_btn">See Full Detail</a>
        		</div>
   			</div>
		</div>   	
       	@endforeach
    @endforeach
</div>
<br>
@endforeach
    