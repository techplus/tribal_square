<div style="margin-left:15px;color:#999;font-size:15px;">
    Hello {{ $user->firstname }} {{ $user->lastname }},<br><br>
    Welcome to tribal square<br><br>
    Your account information : <br><br>
    Sign in Email : {{$user->email}}<br>
    <h3 style="color:#76de10">Just one click and you're in.</h3>
    Click the link below to validate your email and you'll be automatically signed in to your new account. If you have completed all the steps of the registration process your profile will be active and searchable.
    <br>
    Use this link to validate your email address: <br>
    <a href="{{ action('Auth\RegisterController@getStep2')."?code=".$user->verfication_code  }}">Click here</a><br><br>
    We look forward to to help you.<br><br>

    Regards,<br>
    Support Team<br>
    Tribal Square
</div>

