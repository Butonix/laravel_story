<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <a href="{{ url('banner/1') }}"><img src="{{ url('images/banner/Banner1.jpg') }}" alt="..."></a>
                </div>
                <div class="item">
                    <a href="{{ url('banner/2') }}"><img src="{{ url('images/banner/Banner2.jpg') }}" alt="..."></a>
                </div>
                <div class="item">
                    <a href="{{ url('banner/3') }}"><img src="{{ url('images/banner/Banner3.jpg') }}" alt="..."></a>
                </div>

            </div>

            <!-- Controls -->
            <a class="left slide-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left fa-1x"></i>
            </a>
            <a class="right slide-control" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right fa-1x"></i>
            </a>
        </div>
    </div>
</div>
