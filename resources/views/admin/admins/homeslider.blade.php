@extends('layouts.admin')
@section('content')
<style type="text/css">
    .error{
            border:1px solid #f00 !important;
}
hello
{
    display: none !important;
}
</style>
    <script type="text/javascript" src="{{ asset('/js/admin/jquery.validate.js') }}"></script>
    <div class="form-group alert alert-success" style="{{ (Session::has('success')) ? '' : 'display:none;' }}">  
        {{ Session::pull('success') }}
        <span class="glyphicon glyphicon-remove pull-right" onclick="hideSuccess($(this));" style="cursor:pointer;"></span>     
        </div>

    <div class="panel panel-default">
        
        <div class="panel-heading">
            Home Slider
        </div>
        
        <div class="panel-body">
            <div class="col-md-12">
               
                @if( session('success') )
                    <div class="alert alert-success">
                        <p>{{session('success')}}</p>
                    </div>
                @endif

                <?php //dd($aSubscriptionplan); ?>

                <div class="table-responsive">
                 @if( $errors->any() )
                    <div class="alert alert-danger">
                        @foreach( $errors->all() AS $msg)
                            <p>{{$msg}}</p>
                        @endforeach
                    </div>
                @endif   

                <?php // dd($aHomeSlider); ?> 

                <form action="{{action('Admin\HomesliderController@store')}}" method="post" enctype="multipart/form-data" id="frmslider1">
                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                  <div class="modal-body">   
                    <?php $loop = 1; ?>               
                    @foreach($aHomeSlider as $oHome)
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Image <?php echo $loop; ?></label>
                        <div class="col-sm-10">
                            <input type="file" name="slider_img_<?php echo $oHome->id; ?>" class="cat-name required" aria-required="true" value="{{ $oHome->image_path }}">

                        </div>
                        <div class="col-sm-10" style="margin-top:10px;">
                            <span class="help-block">Recommended size is 733 X 344</span>
                            <img src="{{ $oHome->image_path }}" width="100" height="100">
                        </div>
                    </div>
                    <div class="col-xs-12"> <br> </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;"></label>
                        <div class="col-sm-10">
                            <input type="text" name="slidertitle_<?php echo $oHome->id; ?>" class="cat-name form-control required" aria-required="true" placeholder="Slider Title" value="<?php echo $oHome->slidertitle; ?>">
                        </div>
                    </div>
                    <div class="col-xs-12"> <br> </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;"></label>
                        <div class="col-sm-10">
                            <input type="text" name="link_<?php echo $oHome->id; ?>" class="cat-name form-control required" aria-required="true" placeholder="Slider Link" value="<?php echo $oHome->link; ?>">
                            <span class="help-block">ex. http://example.com</span>
                        </div>
                    </div>
                    <div class="col-xs-12"> <hr> </div>
                     <?php $loop++;?>
                    
                     @endforeach

                    <input type="hidden" name="id" class="cat-id" value="">
                  </div>
                  <div class="col-sm-12">
                        <label class="col-sm-2 control-label" style="text-align: left;"></label>
                        <div class="col-sm-4">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
              </form> 
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="modal-plan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New</h4>
              </div>
              <form class="form-horizontal" name="frmPlan" id="frmPlan" method="post">
                  <div class="modal-body">                  
                    <div class="form-group alert alert-danger" style="display:none;">  
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" style="text-align: left;"></label>
                        <div class="col-sm-8">
                            <input type="text" name="amount" id="amount" class="plan-amount form-control required">
                        </div>
                    </div>
                    <input type="hidden" name="id" class="plan-id" value="">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save">
                  </div>
              </form>
            </div><!-- /.modal-content -->
</div>

<script>
function hideSuccess($this)
{
    $this.parents('.form-group').hide();
}
$(document).ready(function(){
    
    $('#frmslider').validate({
                rules:{},
                submitHandler:function(form)
                {
                   form.submit();
                   return false;
                }
            });
           
});
    </script>
    
  
@endsection