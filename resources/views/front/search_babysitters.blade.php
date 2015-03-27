@extends('layouts.front')
@section('content')	
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
			              <h5>{{ $iTotal }} Babysitters Found</h5>
			              <img src="http://placehold.it/450x60" alt="" class="img-responsive">
			            </div>
			            <div class="babysitter-container">
			            	@include('front.sub_babysitters')	
			            </div>
			            <input type="hidden" name="offset" value="{{ $iOffset }}">
			            <input type="hidden" name="limit" value="{{ $iLimit }}">
			           	<div class="clearfix"></div>

						    <div class="row">
						      <div class="container">
						        <div class="bottom_advrt" align="center">
						            <a href="#" class="btn btn-md custome_blue_btn">
						            <span class="glyphicon glyphicon-refresh"></span>
						            Load More</a>
						            <div class="clearfix"></div><br>
						          <img class="img-responsive" alt="" src="http://placehold.it/1170x160">
						        </div>
						      </div>
						    </div>
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
   		var ioffset = $('.offset').val();
   		var ilimit = $('.limit').val();
   		var 
   		$.ajax({
   			url : url("search/babysitters/paginated-baby-sitters"),
   			data : {}
   		});
   });   
});
</script>

@endsection