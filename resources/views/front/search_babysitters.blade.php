@extends('layouts.front')
@section('content') 
<style>
  .spin {
    -webkit-animation: spin .5s infinite linear;
    -moz-animation: spin .5s infinite linear;
    -o-animation: spin .5s infinite linear;
    animation: spin .5s infinite linear;
    -webkit-transform-origin: 50% 58%;
    transform-origin:50% 58%;
    -ms-transform-origin:50% 58%; /* IE 9 */
  }
  @-moz-keyframes spin {
    from {
      -moz-transform: rotate(0deg);
    }
    to {
      -moz-transform: rotate(360deg);
    }
  }

  @-webkit-keyframes spin {
    from {
      -webkit-transform: rotate(0deg);
    }
    to {
      -webkit-transform: rotate(360deg);
    }
  }

  @keyframes spin {
    from {
      transform: rotate(0deg);
    }
    to {
      transform: rotate(360deg);
    }
  }
</style>
<link href="{{asset('/js/raty/jquery.raty.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset("/js/raty/jquery.raty.js")}}"></script>
  <div class="page-wrap">
    <div id="page-content-wrapper">
      <div class="row header_wrap new_header_wrap">
        @include('layouts.front_navbar')
        <!-- Keep all page content within the page-content inset div! -->
              <!-- breadcumbs -->
              <div class="page-content" style="clear: both;">
                <div class="pagination_wrap">
                    <div class="col-sm-12 col-xs-12" style="padding-left: 0;">
                      <ol class="breadcrumb custom_breadcrumb" style="background-color: transparent; margin-top: 6px;">
                          <li><a href="#">Home</a></li>
                          <li class="active">BabySitter</li>
                      </ol>
                      <div class="clearfix"></div>
                  </div>
              </div>  
              <!-- breadcumbs -->
              <div class="row">
                <div class="col-sm-4 col-lg-3">
                <div class="refine_result_wrap">
                    <h3>Refine Results</h3>
                    <form action="{{route('search.store')}}" method="post">
                        <input type="hidden" name="type" value="baby_sitter">
                        <?php //var_dump($aSearch); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keywords</label>
                            <input type="text" class="form-control" placeholder="Search by keywords, etc." name="keywords" value="<?php if(isset($aSearch['fkeywords']) == 'keywords') { echo $aSearch['term']; } ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Near</label>
                            <input type="text" class="form-control" placeholder="30303" name="near" value="<?php if(isset($aSearch['near'])) { echo $aSearch['near']; }  ?>">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="miles">
                              <option value="">Select miles</option> 
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '10'){echo "selected"; } } ?> value="10">10 miles</option>  
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '20'){echo "selected"; } } ?> value="20">20 miles</option>
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '30'){echo "selected"; } } ?> value="30">30 miles</option>
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '40'){echo "selected"; } } ?> value="40">40 miles</option>
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '50'){echo "selected"; } } ?> value="50">50 miles</option>
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '60'){echo "selected"; } } ?> value="60">60 miles</option>
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '70'){echo "selected"; } } ?> value="70">70 miles</option>
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '80'){echo "selected"; } } ?> value="80">80 miles</option>
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '90'){echo "selected"; } } ?> value="90">90 miles</option>
                              <option <?php if(isset($aSearch['miles'])) { if ($aSearch['miles'] == '100'){echo "selected"; } } ?> value="100">100 miles</option>
                            </select>
                        </div>
                        <?php //var_dump($aNationality); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nationality</label>
                            <select class="form-control" name="nationality">
                              <option value="">Select Nationality</option>
                              @if( $aNationality->count() > 0 )
                                @foreach( $aNationality AS $oN )
                                  <option value="{{ $oN->id }}" <?php if(isset($aSearch['nationality'])) { if ($aSearch['nationality'] == $oN->id){echo "selected"; } } ?> >{{ $oN->name }}</option>
                                @endforeach
                              @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Religion</label>
                            <select class="form-control" name="religion">
                              <option value="">Select Religion</option>
                              @if( $aReligion->count() > 0 )
                                @foreach( $aReligion AS $oR )
                                  <option value="{{ $oR->id }}" <?php if(isset($aSearch['religion'])) { if ($aSearch['religion'] == $oR->id){echo "selected"; } } ?>>{{ $oR->name }}</option>
                                @endforeach
                              @endif  
                            </select>
                        </div>
                        <!-- <div class="checkbox">
                          <label>
                            <input type="checkbox" value="">
                            Has photo
                          </label>
                        </div> -->
                         <div class="form-group">
                            <label for="exampleInputEmail1">Hourly rate</label><br>
                            <div class="form-inline">
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputName2">From</label>
                                    <input type="text" class="form-control" style="width: 50%;" name="from_rate" value="<?php if(isset($aSearch['from_rate'])) { echo $aSearch['from_rate']; }  ?>">
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputName2">To</label>
                                    <input type="text" class="form-control" style="width: 50%;" name="to_rate" value="<?php if(isset($aSearch['to_rate'])) { echo $aSearch['to_rate']; }  ?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- <input type="button" class="green_btn btn btn-md btn-block" value="Search"> -->
                        <input type="submit" name="search" class="green_btn btn btn-md btn-block" value="Search">
                        <div class="clearfix"></div><br>
                    </form>
                    <div class="addImg">
                        <?php $firstAd = $left_ads->filter(function($q){return preg_match('/1$/',$q->type);})->first(); ?>
                        @if( $firstAd && !empty($firstAd->link ) )
                            <a target="_blank" href="{{$firstAd ? $firstAd->link : url( '#' ) }}">
                                @endif
                                <img height="250" width="300" src="{{$firstAd ? $firstAd->image : url('images/advrt_1.jpg')}}" alt="" class="img-responsive">
                                @if( $firstAd && !empty($firstAd->link ) )
                            </a>
                        @endif<br>
                            <?php $secondAd = $left_ads->filter(function($q){return preg_match('/2$/',$q->type);})->first(); ?>
                            @if( $secondAd && !empty( $secondAd->link ) )
                                <a target="_blank" href="{{$secondAd ? $secondAd->link : url( '#' ) }}">
                                    @endif
                                    <img height="250" width="300" src="{{$secondAd ? $secondAd->image : url( 'images/advrt_2.jpg' ) }}" alt="" class="img-responsive">
                                    @if( $secondAd && !empty( $secondAd->link ) )
                                </a>
                            @endif<br>
                    </div>
                </div>
            </div>
                <div class="col-sm-8 col-lg-9">
                  <h1>Babysitters/Nannies</h1>
                  <br><br>

                  <div class="Babysitters_sub_header">
                    <h5><span class="total-baby-sitters">{{ $iTotal }}</span> Babysitters Found</h5>
                      <?php $firstAd = $babysitter_ads->filter(function($q){return preg_match('/1$/',$q->type);})->first(); ?>
                      @if( $firstAd && !empty($firstAd->link))
                          <a target="_blank" href="{{$firstAd ? $firstAd->link : url('#')}}">
                              @endif
                              <img height="60" width="450" src="{{$firstAd ? $firstAd->image : 'http://placehold.it/1170x160' }}" alt="" class="img-responsive">
                              @if( $firstAd && !empty($firstAd->link))
                          </a>
                      @endif
                  </div>
                  <div class="clearfix hidden-xs"></div>
                  <div class="babysitter-container">
                    @include('front.sub_babysitters') 
                  </div>
                  <!-- <div class="clearfix"></div> -->

                  <!-- Load More... -->
                  <input type="hidden" name="offset" class="offset" value="{{ $iOffset }}">
                  <input type="hidden" name="limit" class="limit" value="{{ $iLimit }}">
                  <!-- <div class="clearfix"></div> -->
                  @if( $iOffset < $iTotal )
                    <div class="row load-more-parent">
                      <!-- <div class="container"> -->
                        <div class="bottom_advrt" align="center">
                            <a href="javascript:;" class="btn btn-md custome_blue_btn load-more">
                            <span class="glyphicon glyphicon-refresh"></span>
                            Load More</a>
                            <div class="clearfix"></div><br>
                          <!-- <img class="img-responsive" alt="" src="http://placehold.it/1170x160"> -->
                        </div>
                      <!-- </div> -->
                    </div>
                  @endif
                  <div class="row">
                      <?php $secondAd = $babysitter_ads->filter(function($q){return preg_match('/2$/',$q->type);})->first(); ?>
                        <div class="bottom_advrt" align="center" style="margin-top: 50px;">
                            @if( $secondAd && !empty($secondAd->link))
                                <a target="_blank" href="{{$secondAd ? $secondAd->link : url('#')}}">
                            @endif
                                <img height="160" width="1170" src="{{$secondAd ? $secondAd->image : 'http://placehold.it/1170x160' }}" alt="" class="img-responsive">
                            @if( $secondAd && !empty($secondAd->link))
                                </a>
                            @endif
                        </div>
                    </div>
                  <!-- Load More... -->
                </div>
          </div>
        </div>
      </div>
    </div>
<script>
 $(document).ready(function() {
    var $btnSets = $('#responsive'),
    $btnLinks = $btnSets.find('a');
 
    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });
});

$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();
    $('div.raty').raty({
        score: function() {
            return $(this).attr('data-score');
        },
        starHalf: '{{asset('/js/raty/images/star-half.png')}}',
        starOff: '{{asset('/js/raty/images/star-off.png')}}',
        starOn: '{{asset('/js/raty/images/star-on.png')}}',
        readOnly:true
    });
    $('.view').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
   
   $('.load-more').on('click',function(){
      var iOffset = $('.offset').val();
      var iLimit = $('.limit').val();
      var total = $('.total-baby-sitters').html();
      
      if( parseInt(iOffset) <= parseInt(total) )
      {
        $.ajax({
          beforeSend: function(){
            $('.load-more').find('span').addClass('spin');
          },
          url : '{{ url("search/babysitters/paginated-baby-sitters") }}',
          data : {offset:iOffset,limit:iLimit},
          type : "post",
          dataType : "json",
          success : function(resp)
          {
            if( resp.html )
            { 
              $('.babysitter-container').append(resp.html);   
              $('div.raty').raty({
                  score: function() {
                      return $(this).attr('data-score');
                  },
                  starHalf: '{{asset('/js/raty/images/star-half.png')}}',
                  starOff: '{{asset('/js/raty/images/star-off.png')}}',
                  starOn: '{{asset('/js/raty/images/star-on.png')}}',
                  readOnly:true
              });          
              if( parseInt(resp.iOffset)  >= parseInt(resp.iTotal) )
              {
                $('.load-more-parent').hide();
              }
            }
            $('.offset').val(resp.iOffset);           
            $('.total-baby-sitters').val(resp.iTotal);
          },
          complete:function()
          {
            if( $('.load-more').length > 0 ) 
              $('.load-more').find('span').removeClass('spin');
          }
        });
      }
   });   
});
</script>

@endsection