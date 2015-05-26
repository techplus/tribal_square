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

<script type="text/javascript" src="{{ asset('/js/admin/wysiwyg.image.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/wysiwyg.link.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/wysiwyg.table.js') }}"></script>


    <div class="form-group alert alert-success" style="{{ (Session::has('success')) ? '' : 'display:none;' }}">  
        {{ Session::pull('success') }}
        <span class="glyphicon glyphicon-remove pull-right" onclick="hideSuccess($(this));" style="cursor:pointer;"></span>     
        </div>

    <div class="panel panel-default">
        
        <div class="panel-heading">
           {{  $aContentTerms['content_title'] }}
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
                <form action="{{route('admin.terms.update',[$aContentTerms['id']])}}" method="post">
                   <input type="hidden" value="{{csrf_token()}}" name="_token"> 
                   <input type="hidden" value="PUT" name="_method"> 
                <div class="table-responsive">
                    <div class="form-group inputwrap">
                        <label class="col-sm-4 control-label" style="text-align: left;">Title</label>
                        <div class="col-sm-8">
                            <input type="text" name="content_title" id="content_title" class="cat-name form-control required" aria-required="true" value="{{ $aContentTerms['content_title'] }}" readonly>
                        </div>
                    </div>

                    <div class="form-group inputwrap">
                        <label class="col-sm-4 control-label" style="text-align: left;">Description</label>
                        <div class="col-sm-8">
                             <textarea class="form-control wysiwyg" rows="5" name="descriptions" id="wysiwyg">
                                {{ $aContentTerms['descriptions'] }}
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
</script>

<script type="text/javascript">
(function($) {
    $(document).ready(function() {
        $('#wysiwyg').wysiwyg({
          controls: {
            bold          : { visible : true },
            italic        : { visible : true },
            underline     : { visible : true },
            strikeThrough : { visible : true },
            
            justifyLeft   : { visible : true },
            justifyCenter : { visible : true },
            justifyRight  : { visible : true },
            justifyFull   : { visible : true },

            indent  : { visible : true },
            outdent : { visible : true },

            subscript   : { visible : true },
            superscript : { visible : true },
            
            undo : { visible : true },
            redo : { visible : true },
            
            insertOrderedList    : { visible : true },
            insertUnorderedList  : { visible : true },
            insertHorizontalRule : { visible : true },

            h4: {
                visible: true,
                className: 'h4',
                command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
                arguments: ($.browser.msie || $.browser.safari) ? '<h4>' : 'h4',
                tags: ['h4'],
                tooltip: 'Header 4'
            },
            h5: {
                visible: true,
                className: 'h5',
                command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
                arguments: ($.browser.msie || $.browser.safari) ? '<h5>' : 'h5',
                tags: ['h5'],
                tooltip: 'Header 5'
            },
            h6: {
                visible: true,
                className: 'h6',
                command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
                arguments: ($.browser.msie || $.browser.safari) ? '<h6>' : 'h6',
                tags: ['h6'],
                tooltip: 'Header 6'
            },
            
            cut   : { visible : true },
            copy  : { visible : true },
            paste : { visible : true },
            html  : { visible: true },
            increaseFontSize : { visible : true },
            decreaseFontSize : { visible : true },
            exam_html: {
                exec: function() {
                    this.insertHtml('<abbr title="exam">Jam</abbr>');
                    return true;
                },
                visible: true
            }
          },
          events: {
            click: function(event) {
                if ($("#click-inform:checked").length > 0) {
                    event.preventDefault();
                    alert("You have clicked jWysiwyg content!");
                }
            }
          }
        });

        $('#wysiwyg').wysiwyg("insertHtml", "");
    });
})(jQuery);
</script>
  
@endsection