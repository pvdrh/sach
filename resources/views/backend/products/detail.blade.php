@extends('backend.layouts.master')
@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chi tiết sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang trủ</a></li>
                    <li class="breadcrumb-item active">Chi tiết</li>
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
                        <div class="row">
                            <div class="col-2">
                                <img src="/storage/{{ $product->image }}" alt="" style="width: 100%">
                            </div>
                            <div class="col-5">
                                <form action="">
                                    <table style="cell">
                                        <tr>
                                            <th>Tên sản phẩm: </th>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mô tả </th>
                                            <td>{{ $product->content }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tác giả</th>
                                            <td>{{ $product->author->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Thể loại</th>
                                            <td>{{ $product->category->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>NXB</th>
                                            <td>{{ $product->publishing_company->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Giá bìa</th>
                                            <td>{{ $product->origin_price }}đ</td>
                                        </tr>
                                        <tr>
                                            <th>Giá bán ra</th>
                                            <td>{{ $product->sale_price }}đ</td>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái</th>
                                            <td>
                                                @if($product->staus == 0) Còn hàng
                                                @elseif($product->staus == 1) Hết hàng
                                                @elseif($product->satus == 2) Dừng bán
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Người tạo</th>
                                            <td>{{ $product->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ngày tạo</th>
                                            <td>{{ $product->created_at }}</td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
@endsection


