@extends('frontend.layouts.master')
@section('breadcrumb')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Trang trủ</a></li>
                <li class="active">Sản phẩm</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
@endsection

@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Nhà xuất bản:</h3>
                        <ul class="list-links">
                            <li><a href="{{ route('frontend.product.publishing', 1) }}">Kim Đồng</a></li>
                            <li><a href="{{ route('frontend.product.publishing', 2) }}">Nhã Nam</a></li>
                            <li><a href="{{ route('frontend.product.publishing', 3) }}">Đại học sư phạm</a></li>
                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Giá</h3>
                        <ul class="list-links">
                            <li><a href="#">Cao -> thấp</a></li>
                            <li><a href="#">Thấp -> cao</a></li>
                            <li><a href="#">< 100,000đ</a></li>
                            <li><a href="#">< 100,000đ</a></li>
                        </ul>
                    </div>
                    <!-- aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top tác giả</h3>
                        <ul class="list-links">
                            <li><a href="{{ route('frontend.product.author', 2) }}">Oda Eiichiro</a></li>
                            <li><a href="{{ route('frontend.product.author', 1) }}">Aoyama Ghoso</a></li>
                            <li><a href="{{ route('frontend.product.author', 3) }}">Nguyễn Nhật Ánh</a></li>
                            <li><a href="{{ route('frontend.product.author', 4) }}">Lê Bích</a></li>
                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Thể loại bán chạy</h3>
                        <ul class="list-links">
                            <li><a href="{{ route('frontend.product.category', 2) }}">Truyện tranh</a></li>
                            <li><a href="{{ route('frontend.product.category', 1) }}">Trinh thám</a></li>
                            <li><a href="{{ route('frontend.product.category', 3) }}">Văn học</a></li>
                            <li><a href="{{ route('frontend.product.category', 4) }}">Tiểu thuyết</a></li>
                        </ul>
                    </div>
                    <!-- /aside widget -->
                </div>
                <!-- /ASIDE -->

                <!-- MAIN -->
                <div id="main" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">
                                <a href="#"><i class="fa fa-th-large"></i></a>
                                <a href="#" class="active"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="sort-filter">
                                <span class="text-uppercase">Sắp xếp theo:</span>
                                <select class="input" id="order-select">
                                    <option value="0">HOT</option>
                                    <option value="0">Giá cao -> thấp</option>
                                    <option value="0">Giá thấp -> cao</option>
                                </select>
                                <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                            </div>
                        </div>
                        <div class="pull-right">
                            {!! $products->links() !!}
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->
                        <div class="row">
                            <!-- Product Single -->
                            @if(count($products) == 0)
                                <center>Không có sản phẩm</center>
                            @else
                                @foreach($products as $product)
                                    <!-- Product Single -->
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <div class="product product-single">
                                            <div class="product-thumb">
                                                <div class="product-label">
                                                    @if($product->discount_percent != 0)
                                                        <span class="sale">-{{ $product->discount_percent }}%</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('frontend.product-page.index', $product->slug) }}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem</button></a>
                                                <img src="/{{ $product->image }}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">{{ $product->sale_price }} @if($product->discount_percent != 0) <del class="product-old-price">{{ $product->origin_price }}</del>@endif</h3>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o empty"></i>
                                                </div>
                                                <h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
                                                <span>Đã bán: {{ $product->sold }}</span>
                                                <div class="product-btns">
                                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Product Single -->
                                @endforeach
                            @endif
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /STORE -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">
                                <a href="#"><i class="fa fa-th-large"></i></a>
                                <a href="#" class="active"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="sort-filter">
                                <span class="text-uppercase">Sắp xếp theo:</span>
                                <select class="input">
                                    <option value="0">HOT</option>
                                    <option value="0">Giá cao -> thấp</option>
                                    <option value="0">Giá thấp -> cao</option>
                                </select>
                                <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                            </div>
                        </div>
                        <div class="pull-right">
                            {!! $products->links() !!}
                        </div>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
