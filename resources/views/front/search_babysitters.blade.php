@extends('layouts.front')
@section('content')	
<style>
	.spin {
  		 -webkit-animation: spin .5s infinite linear;
  		 -moz-animation: spin .5s infinite linear;
  		 -o-animation: spin .5s infinite linear;
  		 animation: spin .5s infinite linear;
    	 -webkit-transform-origin: 50% 58%;
         transform-origin:50% 58%;
         -ms-transform-origin:50% 58%; /* IE 9 */
	}
	@-moz-keyframes spin {
	  from {
	    -moz-transform: rotate(0deg);
	  }
	  to {
	    -moz-transform: rotate(360deg);
	  }
	}

	@-webkit-keyframes spin {
	  from {
	    -webkit-transform: rotate(0deg);
	  }
	  to {
	    -webkit-transform: rotate(360deg);
	  }
	}

	@keyframes spin {
	  from {
	    transform: rotate(0deg);
	  }
	  to {
	    transform: rotate(360deg);
	  }
	}
</style>
	<div class="page-wrap">
		<div id="page-content-wrapper">
			<div class="row header_wrap">
				@include('layouts.front_navbar')
			 	<!-- Keep all page content within the page-content inset div! -->
			      <div class="page-content">
			        <div class="row">
			          <div class="col-sm-12">
			            <h1>Babysitters</h1>
			            <br><br>

			            <div class="Babysitters_sub_header">
			              <h5><span class="total-baby-sitters">{{ $iTotal }}</span> Babysitters Found</h5>
			              <img src="http://placehold.it/450x60" alt="" class="img-responsive">
			            </div>
			            <div class="babysitter-container">
			            	@include('front.sub_babysitters')	
			            </div>
			            <input type="hidden" name="offset" class="offset" value="{{ $iOffset }}">
			            <input type="hidden" name="limit" class="limit" value="{{ $iLimit }}">
			           	<div class="clearfix"></div>
			           	@if( $iOffset < $iTotal )
						    <div class="row load-more-parent">
						      <div class="container">
						        <div class="bottom_advrt" align="center">
						            <a href="javascript:;" class="btn btn-md custome_blue_btn load-more">
						            <span class="glyphicon glyphicon-refresh"></span>
						            Load More</a>
						            <div class="clearfix"></div><br>
						          <img class="img-responsive" alt="" src="http://placehold.it/1170x160">
						        </div>
						      </div>
						    </div>
						@endif
      					</div>
    				</div>
 				 </div>
			</div>
		</div>
<script>
 $(document).ready(function() {
    var $btnSets = $('#responsive'),
    $btnLinks = $btnSets.find('a');
 
    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });
});

$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.view').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
   
   $('.load-more').on('click',function(){
   		var iOffset = $('.offset').val();
   		var iLimit = $('.limit').val();
   		var total = $('.total-baby-sitters').html();
   		
   		if( parseInt(iOffset) <= parseInt(total) )
   		{
	   		$.ajax({
	   			beforeSend: function(){
	   				$('.load-more').find('span').addClass('spin');
	   			},
	   			url : '{{ url("search/babysitters/paginated-baby-sitters") }}',
	   			data : {offset:iOffset,limit:iLimit},
	   			type : "post",
	   			dataType : "json",
	   			success : function(resp)
	   			{
	   				if( resp.html )
	   				{	
	   					$('.babysitter-container').append(resp.html);	   					
	   					if( parseInt(resp.iOffset)  >= parseInt(resp.iTotal) )
	   					{
	   						$('.load-more-parent').hide();
	   					}
	   				}
	   				$('.offset').val(resp.iOffset);	   				
	   				$('.total-baby-sitters').val(resp.iTotal);
	   			},
	   			complete:function()
	   			{
	   				if( $('.load-more').length > 0 ) 
	   					$('.load-more').find('span').removeClass('spin');
	   			}
	   		});
   		}
   });   
});
</script>

@endsection