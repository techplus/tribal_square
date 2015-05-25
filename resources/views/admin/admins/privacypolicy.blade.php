@extends('layouts.admin')
@section('content')
<style type="text/css">
.inputwrap
  {
    float: left !important;
    width: 100% !important;
  }
</style>
    
<script type="text/javascript" src="{{ asset('/js/admin/jquery-1.3.2.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/js/admin/jquery.wysiwyg.css') }}" type="text/css" />
<script type="text/javascript" src="{{ asset('/js/admin/jquery.wysiwyg.js') }}"></script>
  
    <div class="form-group alert alert-success" style="{{ (Session::has('success')) ? '' : 'display:none;' }}">  
        {{ Session::pull('success') }}
        <span class="glyphicon glyphicon-remove pull-right" onclick="hideSuccess($(this));" style="cursor:pointer;"></span>     
        </div>

    <div class="panel panel-default">
        
        <div class="panel-heading">
            {{  $aContentPrivacy['content_title'] }}
        </div>
        
        <div class="panel-body">
            <div class="col-md-12">
               
                @if( session('success') )
                    <div class="alert alert-success">
                        <p>{{session('success')}}</p>
                    </div>
                @endif

                <?php   //var_dump($aContentPrivacy);
                  //  echo $aContentPrivacy['content_title'];
                ?>
                <form action="{{route('admin.privacy-policy.update',[$aContentPrivacy['id']])}}" method="post">
                   <input type="hidden" value="{{csrf_token()}}" name="_token"> 
                   <input type="hidden" value="PUT" name="_method"> 
                <div class="table-responsive">
                    <div class="form-group inputwrap">
                        <label class="col-sm-4 control-label" style="text-align: left;">Title</label>
                        <div class="col-sm-8">
                            <input type="text" name="content_title" id="content_title" class="cat-name form-control required" aria-required="true" value="{{ $aContentPrivacy['content_title'] }}">
                        </div>
                    </div>

                    <div class="form-group inputwrap">
                        <label class="col-sm-4 control-label" style="text-align: left;">Description</label>
                        <div class="col-sm-8">
                             <textarea class="form-control wysiwyg" rows="5" name="descriptions" id="descriptions">
                                {{ $aContentPrivacy['descriptions'] }}
                             </textarea>
                        </div>
                    </div>
                    <div class="form-group inputwrap">
                        <label class="col-sm-4 control-label" style="text-align: left;"></label>
                        <div class="col-sm-4">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>    
                   

                <!-- <form action="{{action('Auth\RegisterController@postIndex')}}" method="post">
                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                  <div class="modal-body">                  
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Babysitter Subscription Fee</label>
                        <div class="col-sm-4">
                            <input type="text" name="babysitterfee" id="babysitterfee" class="cat-name form-control required" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Provider Subscription Fee</label>
                        <div class="col-sm-4">
                            <input type="text" name="providefee" id="providefee" class="cat-name form-control required" aria-required="true">
                        </div>
                    </div>
                    <input type="hidden" name="id" class="cat-id" value="">
                  </div>
                  <div class="col-sm-12">
                        <label class="col-sm-2 control-label" style="text-align: left;"></label>
                        <div class="col-sm-4">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
              </form> -->
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
    $('.wysiwyg').wysiwyg();

    
           
});
    </script>
    
  
@endsection