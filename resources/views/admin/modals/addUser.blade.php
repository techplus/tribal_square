<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">{{ $title }}</h4>
</div>

<form action="" name="frmUser" id="frmUser"  method="post" class="form-horizontal">
    <div class="modal-body" style="float:left;">
        <input type="hidden" value="{{csrf_token()}}" name="_token">
        <input type="hidden" name="user_type" value="{{ $type }}">
        <div class="form-group col-sm-11 col-xs-12 {{$errors->has('firstname') ? 'has-error' : '' }}">
            <input type="text" class="form-control login_input" name="firstname" placeholder="First Name" value="">
        </div>
        <div class="form-group col-sm-11 col-xs-12 {{$errors->has('lastname') ? 'has-error' : '' }}">
            <input type="text" class="form-control login_input" placeholder="Last Name" name="lastname" value="">
        </div>
        <div class="form-group col-sm-11 col-xs-12 {{$errors->has('email') ? 'has-error' : '' }}">
            <input type="email" class="form-control login_input" placeholder="Email" name="email" value="">
        </div>
        <div class="form-group col-sm-11 col-xs-12 {{$errors->has('password') ? 'has-error' : '' }}">
            <input type="password" class="form-control login_input" placeholder="Password" name="password">
        </div>
        <div class="form-group col-sm-11 col-xs-12">
            <input type="password" class="form-control login_input" placeholder="Confirm Password" name="password_confirmation">
        </div>
        <div style="display:none;" class="paypalid form-group col-sm-11 col-xs-12">
            <input type="text" class="form-control login_input" placeholder="Paypal ID" name="paypalid">
        </div>
        <div class="form-group col-sm-11 col-xs-12 g-recaptcha-response-parent">
            {!! app('captcha')->display(); !!}
        </div>
        <div class="col-sm-11 col-xs-12 signup_chkbox">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="agreement" value="1"> I agree to the <a href="{{action('HomeController@getTerms')}}" target="_blank"> Terms of Use </a> and <a target="_blank" href="{{action('HomeController@getPrivacypolicy')}}"> Privacy Statement.</a>
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-right save-user">Save</button>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 5px;">Close</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $('input').unbind('keyup').bind('keyup',function(){
            $(this).removeClass('error');
            $(this).removeClass('valid');
            $(this).siblings('.help-block').remove();
        });
        $('.save-user').unbind('click').bind('click',function(){
            $.ajax({
                url : "{{ action('Auth\RegisterController@postIndex') }}",
                data : $('#frmUser').serialize(),
                type : "post",
                success : function(data)
                {
                    window.location = "{{ route('admin.babysitters.index') }}?status=pending";
                },
                error : function(err)
                {
                    var obj = $.parseJSON(err.responseText);
                    $('p.help-block').remove();
                    $('input').removeClass('error');
                    $('.g-recaptcha-response-error').remove();
                    $.each(obj,function(key,value){
                        if( key == 'g-recaptcha-response')
                        {
                            $('<div class="col-sm-11 col-xs-12 g-recaptcha-response-error"><p class="text-danger help-block">Captcha validation failed!</p></div>').insertAfter('.g-recaptcha-response-parent');
                        }
                        else if( $('input[name="'+key+'"]').length > 0 ) {
                            $('input[name="' + key + '"]').addClass('error');
                            $('input[name="' + key + '"]').parent().append('<p class="help-block">' + value + '</p>');
                        }
                    });
                    $('.g-recaptcha-response-parent').html(obj.captcha);
                }
            });
        });
    });
</script>
