@forelse( $classifieds AS $category=>$items)
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="float:left;">{{$category}}</h3>
            </div>
        </div>
        <div id="{{$category}}" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php $counter = 1; ?>
                @foreach( array_chunk($items,4) as $key=>$chunk)
                <div class="item {{$counter++ == 1 ? 'active' : ''}}">
                    <div class="row">
                        @foreach( $chunk AS $key=>$item )
                        <div class="col-sm-3 col-xs-6">
                            <div class="col-item">
                                <div class="photo">
                                    <a href="{{route('search.classified.show',[$item->id])}}" style="margin-left:0;width:100%;">                                                            
                                        <?php $oItemImages = $item->ClassifiedImages(); ?>
                                        <img style="max-width:350px;height: 260px;" src="{{ Image::url(( $item->ClassifiedImages->count() > 0 ) ? $item->ClassifiedImages->first()->image_path : ( $oItemImages->count() ? $oItemImages->first()->image_path : url('images/no_imgae.png')),350,260) }}" class="img-responsive" alt="{{$item->title}}" />
                                    </a>
                                </div>
                                <div class="info" style="text-align: left;">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <a href="{{route('search.classified.show',[$item->id])}}" style="margin-left:0;width:100%;">
                                                <h5 style="text-indent: 0;">                                                                    
                                                        {{ ( strlen( $item->title ) > 20 ) ? substr($item->title,0,19)."..." : $item->title }}                                                                    
                                                </h5>
                                            </a>
                                        </div>
                                        <div class="price col-md-7">
                                            <h5 style="text-indent: 0; color:#333;">${{$item->price}}</h5>
                                        </div>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @empty
    <h1 class="text-center">No matching classified found!</h1>
@endforelse