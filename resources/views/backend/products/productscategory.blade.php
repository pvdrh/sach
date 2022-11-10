@extends('backend.layouts.master')
@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $categoryName }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá gốc</th>
                                <th>Giá bán</th>
                                <th>Giảm giá(%)</th>
                                <th>Mô tả</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->origin_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td>{{ $product->discount_percent }}</td>
                                    <td>{{ $product->content }}</td>
                                    <td>
                                        <a href="">
                                            <button class="btn btn-primary">Chi tiết</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-danger">Xóa</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
                        </table>
                        <br>
{{--                        <div style="float: right">{!! $products->links() !!}</div>--}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
@endsection

