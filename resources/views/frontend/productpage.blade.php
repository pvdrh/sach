@extends('frontend.layouts.master')
@section('breadcrumb')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('frontend.home.index')}}">Trang chủ</a></li>
                <li class="active">{{ $product->name }}</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
@endsection

@section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            <div class="product-view">
                                <img src="/{{ $product->image }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <div class="product-label">
                                @if($product->discount_percent != 0)
                                    <span class="sale">-{{ $product->discount_percent }}%</span>
                                @endif
                            </div>
                            <h2 class="product-name">{{ $product->name }}</h2>
                            <h3 class="product-price">{{ number_format($product->sale_price) }}
                                VND @if($product->discount_percent != 0)
                                    <del class="product-old-price">{{ number_format($product->origin_price) }} VND</del>
                                @endif</h3>
                            <p style="font-size: 18px; font-family: 'system-ui'">
                                <strong>Trạng thái:</strong>
                                @if($product->status == 0)
                                    Tạm khóa
                                @elseif($product->status == 1)
                                    Còn hàng
                                @elseif($product->status == 2)
                                    Hết hàng
                                @endif
                            </p>
                            <p style="font-size: 18px; font-family: 'system-ui'"><strong>Tác
                                    giả:</strong> {{ $product->author ? $product->author->name : 'Đang cập nhật' }}</p>
                            <p style="font-size: 18px; font-family: 'system-ui'"><strong>Nhà xuất
                                    bản:</strong> {{ $product->publishing_company ? $product->publishing_company->name : 'Đang cập nhật' }}
                            </p>
                            <p style="font-size: 18px; font-family: 'system-ui'">{{ $product->content }}</p>
                            <div class="product-options">
                            </div>

                            <div class="product-btns">
                                @if($product->status == 1)
                                    <a href="{{ route('frontend.cart.add', $product->id) }}"
                                       class="primary-btn add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm vào giỏ hàng
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
@endsection
