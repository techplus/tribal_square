<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tribal Square :: Home</title>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- if(in_array(Request::url(), $oRoutesCheck)) -->
    @if(Request::route()->getActionName() == 'App\Http\Controllers\Auth\PasswordController@getReset' || Request::url() == url('advertisewithus') || Request::url() == url('/') || Request::url() == url('/auth') || Request::url() == url('/register') || Request::url() == url('/password') || Request::url() == url('/privacypolicy') || Request::url() == url('/terms') || Request::url() == url('/refundpolicy') || Request::url() == url('/register/step2'))
      <link href="{{asset('/css/style.css')}}" rel="stylesheet">
      <link href="{{asset('/css/style_home.css')}}" rel="stylesheet"
    @else
      <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    @endif
    
    <script src="{{asset('/js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/jquery.screwdefaultbuttonsV2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/script.js') }}" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script> 
    <script type="text/javascript">       
                
        var autocomplete1;          
        function autocompleteHomePage() {
          // Create the autocomplete object, restricting the search
          // to geographical location types.
          autocomplete1 = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete1')),
                  { types: ['geocode'] });       
              
        }            
                   
    $(function(){
      $('.fancy-radio').screwDefaultButtons({
        image: 'url("{{asset('/images/radio.png')}}")',
        width: 38,
        height: 42
      });
      // Stop carousel
      $('.carousel').carousel({
        interval: false
      });
      $('.styledRadio').parent().on('click',function(){
        $(this).children('.styledRadio').trigger('click');
      });
      $('.menu-links').on('click',function(){
        $('#frmMenuLinks').find('.type').val($(this).data('type'));
        $('#frmMenuLinks').submit();
      });            
      autocompleteHomePage();
    });      
  </script>
  <style>
    .login_subnav .link-active{
        color:#AC1919;
        font-weight: bold;
        /*text-decoration: underline;        */
    }
     .header_search input{
      width : 44%;
    }
    .header_search input[type="submit"]{
      border-radius: 15px !important;
      width:10%;  
      margin-left:5px;
    }    
  </style>
  </head>
  <body class="{{$body_class or 'signin_body'}}">
    @if( Auth::check() && ( Request::url() != url('auth/select-user-type') || Request::url() != url('login/select-user-type') ) )
        <div class="active" id="wrapper1">
    @endif
            @yield('content')
    @if( Auth::check() )
        </div>
    @endif
    <!-- if(in_array(Request::url(), $oRoutesCheck)) -->
    @if( Request::url() == url('advertisewithus') || Request::url() == url('contact-us') || Request::url() == url('/') || Request::url() == url('/auth') || Request::url() == url('/register') || Request::url() == url('/password') || Request::url() == url('/privacypolicy') || Request::url() == url('/terms') || Request::url() == url('/refundpolicy') || Request::url() == url('/register/step2') )
      <div class="container">
        <div class="col-xs-12" style="color:#ac1919;font-weight:bold;margin-bottom:15px;"> 
        Inspire Change In Africa. Join Us & Support 
          <a href="http://www.selfless4africa.org/" target="_blank">www.selfless4africa.org</a>
        </div>
      </div>

<div class="row footer_wrap">
  <div class="container">
    <div class="footer_links">
      <a href="{{action('HomeController@getContactUs')}}">Contact</a> |
      <?php
      foreach( $aFooterData AS $fLink ) 
      {    
          if($fLink->id == '1')
          {
            $dashBoardLink = action('HomeController@getPrivacypolicy');
          }
          elseif($fLink->id == '2')
          {
            $dashBoardLink = action('HomeController@getTerms');
          }
          elseif($fLink->id == '3')
          {
            $dashBoardLink = action('HomeController@getRefundpolicy');
          }
         echo "<a href=$dashBoardLink>$fLink->content_title</a> | ";  
      }
      ?>
      <a href="{{action('HomeController@getAdvertisewithus')}}">Advertise with us</a>
    </div>
    <div class="copyright">
      @2015 TribalSquare All rights reserved.
    </div>
  </div>
</div>    
@else
 <div class="row footer_wrap"> 
  <div class="footer">
    <div class="footer_nav">
      <a href="{{action('HomeController@getContactUs')}}">Contact</a> |
      <a href="{{action('HomeController@getPrivacypolicy')}}">Privacy Policy</a> |
      <a href="{{action('HomeController@getTerms')}}">Terms and Services</a> |
      <a href="{{action('HomeController@getRefundpolicy')}}">Refund Policy</a> |
      <a href="{{action('HomeController@getAdvertisewithus')}}">Advertise with us</a>
      </div>
      <p>@2015 TribalSquare All rights reserved.</p>
  </div>  
  </div> 
@endif

  </body>
</html>
