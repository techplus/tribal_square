@extends('layouts.front')

@section('content')
 @include('front.getimage')
    <div class="page-wrap">
        <div class="row header_wrap new_header_wrap">
            @include('layouts.front_navbar')
            
            <?php $search = session('search'); ?>
            @if( $search['cat'] == '' )
                
            <div class="row all_service_wrap">
                <h1 class="col-xs-12 custom_heading_top">Category</h1>
                @if( isset( $subcategories ) AND $subcategories->count() > 0 )
                    @foreach($subcategories as $category)
                    <?php
                        if($category->name == 'African Restaurants')
                          {
                            $imgLink = url('images/restaurant.png');
                          }
                          elseif($category->name == 'African Caterers')
                          {
                            $imgLink = url('images/catering.png');
                          }
                          elseif($category->name == 'African Entertainers/dj')
                          {
                             $imgLink = url('images/entertainers.png');
                          }
                          elseif($category->name == 'African tailors')
                          {
                             $imgLink = url('images/restaurant.png');
                          }
                          elseif($category->name == 'Hair Braiding')
                          {
                             $imgLink = url('images/img-5.png');
                          }
                          elseif($category->name == 'Fashion Jewellery')
                          {
                             $imgLink = url('images/img-6.png');
                          }
                          elseif($category->name == 'African Store')
                          {
                             $imgLink = url('images/img-7.png');
                          }
                          elseif($category->name == 'Churches / Groups')
                          {
                             $imgLink = url('images/img-8.png');
                          }
                          elseif($category->name == 'Upcoming African Events')
                          {
                             $imgLink = url('images/img-9.png');
                          }
                          elseif($category->name == 'Import / Export Shipping')
                          {
                             $imgLink = url('images/img-10.png');
                          }
                          elseif($category->name == 'Immigration Lawyers')
                          {
                             $imgLink = url('images/img-11.png');
                          }
                          elseif($category->name == 'Arts & Crafts')
                          {
                             $imgLink = url('images/img-12.png');
                          }
                          else
                          {
                            $imgLink = url('images/restaurant.png');
                          }
                    ?>
                    <div class="col-xs-6 col-sm-4 service-wrapper">
                        <a class="linkcolor" href="{{ route('search.categories.show',[ $category->id ]) }}?type=classified">
                        <!-- <a class="linkcolor" href="{{ route('search.classified.show',[ $category->id ]) }}?type=classified"> -->
                        <img class="img-responsive" src="{{$imgLink}}">
                            <div class="description">
                                <h4>{{ $category->name }}</h4>  
                            </div>
                        </a>
                    </div>
                   @endforeach
                @endif   
            </div>
            
            <div class="row post_need_container" align="center">
                <div class="col-xs-12 col-sm-4 col-sm-offset-4 service-wrapper">
                    <img src="{{url('images/banner.png')}}" class="img-responsive">
                    <div class="description">
                      <a href="#"><h4>post your need</h4></a>  
                    </div>
                </div>
            </div>
            <div class="row post_need_container profit_content">
                5% of our profit supports <a href="http://www.selfless4africa.org/" target="_blank">www.selfless4africa.org</a> ..S4A inspiring change in Africa
            </div> 
           
            @else
                
                @include('front.search_classified_items')

            @endif                
            
            

        </div>
    </div>
@stop

<style>
    html, body {
        height: 100%;
    }
    .page-wrap {
      min-height: 100%;
      /* equal to footer height */
        margin-bottom: -49px; 
    }
    .page-wrap:after {
      content: "";
      display: block;
    }
    .footer_wrap, .page-wrap:after {
        height: 49px; 
    }
    .footer_wrap {
      background: orange;
    }
</style>