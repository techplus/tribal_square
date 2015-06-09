<div class="col-xs-12 text-right" style="padding-top:5px;">
  <div class="btn-group groupbtn ">
    <button type="button" selected="selected" id="list-view" class="btn btn-default pull-right" data-toggle="tooltip" title="" data-original-title="List"><i class="fa fa-th-list"></i></button>
    <button type="button" id="grid-view" class="btn btn-default pull-right" data-toggle="tooltip" title="" data-original-title="Grid"><i class="fa fa-th"></i></button>
  </div>
</div>

<div class ="thumbview">
   @include('front.search_classified_items_thumbview')
</div>

<div class ="galleryview">
  @include('front.search_classified_items_galleryview')
</div>    

<script type="text/javascript">
    $(document).ready(function () {
       $('.thumbview').show();
       $('.galleryview').hide();

       $('#list-view').on('click',function() {
           $('.galleryview').show();
           $('.thumbview').hide();
        }); 
       $('#grid-view').on('click',function() {
           $('.galleryview').hide();
           $('.thumbview').show();
        });
    });
</script>