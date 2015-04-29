Dear {{$firstname}}, <br><br>

You have been added as an admin on TribalSquare. Your credentials are <br>

Email: {{$email}}<br>
Password: {{$password}}<br>
Login Link: <a href="{{action('Auth\AuthController@getIndex')}}">{{action('Auth\AuthController@getIndex')}}</a>
