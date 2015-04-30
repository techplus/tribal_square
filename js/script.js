$(document).ready(function () {
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
  });

  $(".dealTitle").click(function () {
 	  $(".dealTitle").removeClass('active_slide');	
	  $(this).addClass('active_slide');
   
    var imgLink = $(this).data('link');
    $('.deal_banner_wrap a').attr('href', imgLink);
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $('.banner_left a:eq(0)').click();

});
