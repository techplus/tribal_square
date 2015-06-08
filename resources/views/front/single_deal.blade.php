@foreach( $oDeals AS $oDeal )
<div class="col-sm-4 col-lg-3 col-md-4 col-xs-6">
    <div class="col-item">
        <div class="photo">
            <a href="{{route('search.deals.show',[$oDeal->id])}}"
               style="margin-left:0;width:100%;">
                <?php /*<div class="user-image" align="center" style="height:260px;width:346px;position:relative;">
                                                <?php
                                                    $oDealsImages = $oDeal->DealImages();
                                                    $image = ( $oDeal->DealImages->count() > 0 ) ? $oDeal->DealImages->first()->image_path : ( $oDealsImages->count()  ? $oDealsImages->first()->image_path : url('images/no_image.png'));
                                                    $path =  ( $oDeal->DealImages->count() > 0 ) ? base_path('uploads/'.pathinfo($oDeal->DealImages->first()->image_path,PATHINFO_BASENAME)) : ( $oDealsImages->count()  ? base_path('uploads/'.pathinfo( $oDealsImages->first()->image_path,PATHINFO_BASENAME)) : base_path('images/no_image.png'));
                                                    echo getImage($image,340,260,$path,true);

                                            </div>*/ ?>
                <?php
                $oDealsImages = $oDeal->DealImages();
                ?>
                <img alt="{{$oDeal->title}}" style="height:185px;"
                     class="img-responsive"
                     src="{{Image::url(( $oDeal->DealImages->count() > 0 ) ? $oDeal->DealImages->first()->image_path : ( $oDealsImages->count()  ? $oDealsImages->first()->image_path : url('images/no_image.png')),350,185)}}">
            </a>
        </div>
        <div class="info custom_info">
            <div class="row" style="float:left; height:28px;">
                <div class="price custom_price">
                    <a href="{{route('search.deals.show',[$oDeal->id])}}"
                       style="width:100%;" align="left">
                        <h5 style="text-indent: 0;font-size: 15px;">{{ ( strlen( $oDeal->title ) > 15 ) ? substr($oDeal->title,0,14)."..." : $oDeal->title }}</h5>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="separator">
                <p class="btn-add strike_through"><span
                            style="float:left; text-transform:none;">{{ ( strlen( $oDeal->city ) > 10 ) ? substr($oDeal->city,0,9)."..." : $oDeal->city }}</span>${{$oDeal->original_price}}
                </p>

                <p class="btn-details">${{$oDeal->new_price}}
                </p>
            </div>
            <div class="clearfix">
            </div>
        </div>
    </div>

</div>
@endforeach