@extends('layouts.inspinia.inspinia')
@section('content') 
     <link href="{{ url('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">    
     <link href="{{asset('inspinia/css/plugins/jQueryUI/jquery-ui.min.css')}}" rel="stylesheet"> 
     <link href="{{ url('inspinia/js/plugins/token/jquery.tagsinput.min.css')}}" rel="stylesheet">   
     <div class="row">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Skills and Abilities</h5>                            
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" name="frmBabySitter">                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Languages Spoken</label>                                   
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-sm-12">                                      
                                        <input name="languages_spoken" id="languages_spoken" value="" class="form-control">
                                    </div>
                                </div>                               
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Homework Help</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                     <?php $aHomeworkHelp = Config::get('HomeworkHelp'); ?>                                      
                                        @if( count( $aHomeworkHelp ) > 0 )
                                            @foreach( $aHomeworkHelp as $key => $sElement )
                                                <div class="col-sm-6" style="padding-top: 0.5%"> 
                                                    <input type="checkbox" class="required i-checks" name="homework_help" value="{{ $key }}">&nbsp;&nbsp;{{ $sElement }}&nbsp;&nbsp;&nbsp;                                        
                                                </div>
                                            @endforeach                                                
                                        @endif  
                                </div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Additional Services</label>                                   
                                    </div>
                                </div>                                
                                <div class="form-group">                                    
                                     <?php $aAdditionalService = Config::get('AdditionalServices'); ?>                                      
                                        @if( count( $aAdditionalService ) > 0 )
                                            @foreach( $aAdditionalService as $key => $sElement )
                                                <div class="col-sm-12" style="padding-top: 0.5%"> 
                                                    <input type="checkbox" class="required i-checks" name="addtional_services" value="{{ $key }}">&nbsp;&nbsp;{{ $sElement }}&nbsp;&nbsp;&nbsp;                                        
                                                </div>
                                            @endforeach                                                
                                        @endif  
                                </div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">References</label>                                   
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-sm-6">                                      
                                        <input type="text" name="reference_name" class="form-control required" placeholder="Reference Name">
                                    </div>
                                    <div class="col-sm-6">                                      
                                        <input type="text" name="reference_relationship" class="form-control required" placeholder="Reference Relationship">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-sm-12">                                        
                                        <button class="btn btn-primary" type="button">Save & Continue</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>        
     </div>
    <!-- iCheck -->
    <script src="{{ url('inspinia/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{asset('inspinia/js/plugins/token/jquery.tagsinput.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({      
                checkboxClass: 'icheckbox_square-green',         
                radioClass: 'iradio_square-green',
            });   
            $('#languages_spoken' ).tagsInput({
                autocomplete_url: '{{route('languages.index')}}',
                'height':'70px',
                'width':'100%',
                'defaultText':'Add Languages',
                'onAddTag':function(tag){
                    console.log(tag);
                    $.ajax({
                        url: '{{url('languages')}}',
                        type: 'post',
                        data: {name:tag}
                    })
                },
                'delimiter': [','],
                'minChars' : 3,
            });       
        });
    </script>
@endsection