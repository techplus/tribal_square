<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tribal Square :: Home</title>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/jquery.screwdefaultbuttonsV2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/script.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
    $(function(){
      $('.fancy-radio').screwDefaultButtons({
        image: 'url("{{asset('/images/radio.png')}}")',
        width: 38,
        height: 42
      });
    });
  </script>

  </head>
  <body class="{{$body_class or 'signin_body'}}">
    @if( Auth::check() && ( Request::url() != url('auth/select-user-type') || Request::url() != url('login/select-user-type') ) )
        <div class="active" id="wrapper">
    @endif

            @yield('content')

    @if( Auth::check() )
        </div>
    @endif

<div class="row footer_wrap">
  <div class="container">
    <div class="footer">
      <div class="footer_nav">
        <a href="#">Contact</a> |
        <a href="#">Terms and Service</a> |
        <a href="#">About Us</a> |
        <a href="#">Blog</a> |
        <a href="#">Advertise with us</a>
      </div>
      <p>@2015 TribalSquare All rights reserved.</p>
    </div>
  </div>
</div>


  </body>
</html>