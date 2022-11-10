@extends('frontend.layouts.master')
@section('breadcrumb')
{{--    <div id="breadcrumb">--}}
{{--        <div class="container">--}}
{{--            <ul class="breadcrumb">--}}
{{--                <li><a href="#">Home</a></li>--}}
{{--                <li class="active"></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('content')
    <!-- HOME -->
{{--    @dd($listCategories)--}}
    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->
                    <a href="">
                        <div class="banner banner-1">
                            <img src="https://cdn0.fahasa.com/media/magentothem/banner7/920x420_phienchodocu.png" alt="">
                        </div>
                    </a>
                    <!-- /banner -->

                    <!-- banner -->
                    <a href="">
                        <div class="banner banner-1">
                            <img src="https://cdn0.fahasa.com/media/magentothem/banner7/MSAT_mainbanner_920x420.jpg" alt="">
                        </div>
                    </a>
                    <!-- /banner -->

                    <!-- banner -->
                    <a href="">
                        <div class="banner banner-1">
                            <img src="https://cdn0.fahasa.com/media/magentothem/banner7/920x420_TruyenThongChuongTrinh.jpg" alt="">
                        </div>
                    </a>
                    <!-- /banner -->
                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOME -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="https://cdn0.fahasa.com/media/wysiwyg/Thang-12-2020/Freeship-310x210.png" alt="">
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="https://cdn0.fahasa.com/media/wysiwyg/Thang-12-2020/Flash-sale-310x210.png" alt="">
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                    <a class="banner banner-1" href="#">
                        <img src="https://cdn0.fahasa.com/media/wysiwyg/Thang-11-2020/do-choi-resize-310x210.png" alt="">
                    </a>
                </div>
                <!-- /banner -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <a href="{{ route('frontend.product.new') }}">
                            <h2 class="title">Sản phẩm mới</h2>
                        </a>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->
                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                            <!-- Product Single -->
                            @foreach($products_new as $product)
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            <span>New</span>
                                            @if($product->discount_percent)
                                                <span class="sale">-{{ $product->discount_percent }}%</span>
                                            @endif
                                        </div>
                                        <a href="{{ route('frontend.product-page.index', $product->slug) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem</a>
                                        <img src="/{{ $product->image }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
                                        <h4 class="product-price" style="color: #F8694A">{{ number_format($product->sale_price) }}đ</h4>
                                        <p>@if($product->discount_percent != 0) <del class="">{{ number_format($product->origin_price) }}đ</del>@endif</p>
                                        <span>Đã bán: {{ $product->sold }}</span>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o empty"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /Product Single -->
                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <a href="{{ route('frontend.product.hot') }}">
                        <div class="section-title">
                            <h2 class="title">Bán chạy nhất</h2>
                        </div>
                    </a>
                </div>
                <!-- section title -->
                @foreach($products_hot as $product)
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    @if($product->discount_percent)
                                        <span class="sale">-{{ $product->discount_percent }}%</span>
                                    @endif
                                </div>
                                <a href="{{ route('frontend.product-page.index', $product->slug) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem</a>
                                <img src="/{{ $product->image }}" alt="">
                            </div>
                            <div class="product-body">
                                <h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
                                <h4 class="product-price" style="color: #F8694A">{{ number_format($product->sale_price) }}đ</h4>
                                <p>@if($product->discount_percent != 0) <del class="">{{ number_format($product->origin_price) }}đ</del>@endif</p>
                                <span>Đã bán: {{ $product->sold }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /container -->
    </div>

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">top Manga</h2>
                    </div>
                </div>
                <!-- section title -->
                @foreach($products_manga as $product)
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    @if($product->discount_percent)
                                        <span class="sale">-{{ $product->discount_percent }}%</span>
                                    @endif
                                </div>
                                <a href="{{ route('frontend.product-page.index', $product->slug) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem</a>
                                <img src="/{{ $product->image }}" alt="">
                            </div>
                            <div class="product-body">
                                <h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
                                <h4 class="product-price" style="color: #F8694A">{{ number_format($product->sale_price) }}đ</h4>
                                <p>@if($product->discount_percent != 0) <del class="">{{ number_format($product->origin_price) }}đ</del>@endif</p>
                                <span>Đã bán: {{ $product->sold }}</span>
{{--                                <div class="product-rating">--}}
{{--                                    <i class="fa fa-star"></i>--}}
{{--                                    <i class="fa fa-star"></i>--}}
{{--                                    <i class="fa fa-star"></i>--}}
{{--                                    <i class="fa fa-star"></i>--}}
{{--                                    <i class="fa fa-star-o empty"></i>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Gợi ý cho bạn</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                @foreach($products_rb as $product)
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    @if($product->discount_percent)
                                        <span class="sale">-{{ $product->discount_percent }}%</span>
                                    @endif
                                </div>
                                <a href="{{ route('frontend.product-page.index', $product->slug) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem</a>
                                <img src="/{{ $product->image }}" alt="">
                            </div>
                            <div class="product-body">
                                <h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
                                <h4 class="product-price" style="color: #F8694A">{{ number_format($product->sale_price) }}đ</h4>
                                <p>@if($product->discount_percent != 0) <del class="">{{ number_format($product->origin_price) }}đ</del>@endif</p>
                                <span>Đã bán: {{ $product->sold }}</span>
                                {{--                                <div class="product-rating">--}}
                                {{--                                    <i class="fa fa-star"></i>--}}
                                {{--                                    <i class="fa fa-star"></i>--}}
                                {{--                                    <i class="fa fa-star"></i>--}}
                                {{--                                    <i class="fa fa-star"></i>--}}
                                {{--                                    <i class="fa fa-star-o empty"></i>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
            @endforeach
                <!-- /Product Single -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
