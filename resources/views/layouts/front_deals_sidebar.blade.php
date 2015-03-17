<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    <div class="categories_sidebar">
        <h2>Categories</h2>
        <ul class="nav nav-pills nav-stacked">
            <li class="active" role="presentation"><a href="#">All Deals</a></li>
            @foreach( $deal_categories AS $category )
                <li role="presentation"><a href="{{route('search.categories.show',[$category->id])}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="publish_deal_box">
        <p>Grow Your BUSINESS with <br>
            <strong>TRIBAL SQUARE</strong>
        </p>
        <span>Publish your great deal and get audience instantly.</span>
        <div class="clearfix"></div>
        <a class="btn btn-lg custome_blue_btn col-sm-2" href="#">
            Publish Your Deal<span style="color:#fff; font-size:16px;" class="glyphicon glyphicon-triangle-right"></span>
        </a>
    </div>

    <div class="advrt" align="center">
        <img src="images/advrt_1.jpg" alt="" class="img-responsive">
    </div>

    <div class="current_deals_box">
        <h2>Current Deals</h2>
        <a href="#">See all</a>

        <div class="clearfix"></div>

        <div class="col-item">
            <div class="photo">
                <img src="http://placehold.it/350x260" class="img-responsive" alt="a">
            </div>
            <div class="info">
                <div class="row">
                    <div class="price">
                        <h5>Sample Product</h5>
                    </div>
                    <div class="clearfix"></div>
                    <div class="rating hidden-sm col-md-6">
                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                        </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                        </i><i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="separator clear-left">
                    <p class="btn-add">49$</p>
                    <p class="btn-details">-51%</p>
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>

        <ul class="media-list">
            <li class="media">
                <div class="media-left">
                    <a href="#">
                        <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEyLjUiIHk9IjMyIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                    </a>
                    -51%
                </div>
                <div class="media-body">
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>
                </div>
            </li>
            <li class="media">
                <div class="media-left">
                    <a href="#">
                        <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEyLjUiIHk9IjMyIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                    </a>
                    -74%
                </div>
                <div class="media-body">
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>
                </div>
            </li>
        </ul>

    </div>

    <div class="advrt" align="center">
        <img src="images/advrt_2.jpg" alt="" class="img-responsive">
    </div>

</div>