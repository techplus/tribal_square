$(document).ready(function () {
   
  
   $('.box').hover(
        function(){
            $(this).find('.boxspan').slideDown(250); //.fadeIn(250)
            // $(this).find('.boxup span').hide();
        },
        function(){
            $(this).find('.boxspan').slideUp(250); //.fadeOut(205)
            // $(this).find('.boxup span').show();
        }
    ); 

  // Sticky Footer 
  $(window).resize(function(){
    var footerHeight = $('.footer_wrap').outerHeight();
    var stickFooterPush = $('.push').height(footerHeight);

    $('.wrapper').css({'marginBottom':'-' + footerHeight + 'px'});
  });

  $(window).resize();
  // Sticky Footer      

  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
  });

  //$(".dealTitle").click(function () {
 	//  $(".dealTitle").removeClass('active_slide');
	//  $(this).addClass('active_slide');
  //
  //  var imgLink = $(this).data('link');
  //  $('.deal_banner_wrap a').attr('href', imgLink);
  //});

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $('.banner_left a:eq(0)').click();

  $('.box').find('.boxspan').hide(); 

});
