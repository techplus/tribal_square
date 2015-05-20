@extends('layouts.admin')
@section('content')
    <script type="text/javascript" src="{{ asset('/js/admin/jquery.validate.js') }}"></script>
    <div class="form-group alert alert-success" style="{{ (Session::has('success')) ? '' : 'display:none;' }}">  
        {{ Session::pull('success') }}
        <span class="glyphicon glyphicon-remove pull-right" onclick="hideSuccess($(this));" style="cursor:pointer;"></span>     
        </div>

    <div class="panel panel-default">
        
        <div class="panel-heading">
            Subscription Fees
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
                    <table class="vTable table table-stripped">
                        <thead>
                            <th>Subscription Name</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($aSubscriptionplan as $oSub )
                                <tr data-id="{{ $oSub->id }}" data-name="{{ $oSub->name }}">
                                    <td><?php if($oSub->name == "Standard Baby Sitter") { echo "Babysitter Subscription Fee";}else{ echo "Provider Subscription Fee"; } ?></td>
                                    <td><input type="text" name="amount" id="amount" class="plan-amount form-control required" value="{{ $oSub->amount }}"></td>
                                    <td>
                                        <a href="javascript:;" class="edit-category">Save</a> 
                                        <!-- <a href="javascript:;" class="delete-category">delete</a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

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
    $('.edit-category').on('click',function()
    {  
        var $this = $(this);
        var id = $this.parents('tr').data('id');
        var plan_name = $this.parents('tr').data('name');
        var plan_amount = $(this).parents('tr').find('.plan-amount').val();

        if(plan_amount == "" || !$.isNumeric(plan_amount))
        {
          $(this).parents('tr').find('.plan-amount').css("border","1px solid #f00");
          return false;
        }
        

       // alert(id);
       // alert(plan_amount);
        // $('#modal-plan').find('.plan-id').val(id);
        // $('#modal-plan').find('.plan-amount').val(plan_amount);
        // $('#modal-plan').find('h4').html('Edit ' + plan_name + ' Plan Amount');
        // $('#modal-plan').find('.control-label').html('Amount');
        // $('#modal-plan').modal('show');
        $.ajax({
                url : "{{ url('admin/settings') }}" + "/" + $this.parents('tr').data('id'),
                type : "put",
                data : {'id':id,'amount':plan_amount},
               // dataType : "json",
                success : function  (resp) {
                       // console.log(resp.id);
                        if( resp.id )
                        {
                           window.location.reload();
                          // $('#modal-plan').modal('hide');   
                        }
                        else
                        {
                            
                        }
                }
            });
        

    });
    $('#frmPlan').on('submit',function(e){
                e.preventDefault();
    })

    $('#frmPlan').validate({
                rules:{},
                submitHandler:function()
                {
                    if( $('#modal-plan').find('.plan-id').val().length > 0 )
                    {
                        $.ajax({
                            url : "{{ url('admin/settings') }}" + "/" + $('#modal-plan').find('.plan-id').val(),
                            type : "put",
                            data : $('#frmPlan').serialize(),
                            dataType : "json",
                            success : function  (resp) {
                                    console.log(resp.id);
                                    if( resp.id )
                                    {
                                       window.location.reload();
                                       $('#modal-plan').modal('hide');   
                                    }
                                    else
                                    {
                                        
                                    }
                            }
                        });
                    }
                    return false;
                }
            });
           
});
    </script>
    
  
@endsection