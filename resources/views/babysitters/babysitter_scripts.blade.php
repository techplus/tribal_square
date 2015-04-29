<link href="{{ url('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
<link href="{{ url('inspinia/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
<script src="{{ asset('inspinia/js/plugins/validate/jquery.validate.min.js') }}"></script>
<script src="{{ url('inspinia/js/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ url('inspinia/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script>
	$(document).ready(function(){
		$('.i-checks').iCheck({      
            checkboxClass: 'icheckbox_square-green',         
            radioClass: 'iradio_square-green',
        });
        $('.chkTxt').on('click',function(){        	        	        
        	if( $(this).parent().find('.i-checks').parent().hasClass('checked') )
        	{
        		$(this).parent().find('.i-checks').iCheck('uncheck');
        	}
        	else
        	{
				$(this).parent().find('.i-checks').iCheck('check');
        	}
		});
		/*$('.rdTxt').on('click',function(){        	
        	        	
        	if( $(this).parent().find('.i-checks').parent().hasClass('checked') )
        	{
        		$(this).siblings('.iradio_square-green').find('.i-checks').iCheck('uncheck');
        		$(this).parent().find('.i-checks').iCheck('uncheck');
        	}
        	else
        	{
				$(this).parent().find('.i-checks').iCheck('check');
        	}
		});*/
	});	
</script>
<style>
	.chkTxt{
		cursor:pointer;
	}
</style>