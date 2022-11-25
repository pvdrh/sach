@extends('backend.layouts.master')
@section('script')
    {{--<script>--}}
    {{--    $(document).ready(function () {--}}
    {{--        $('#productsTable').DataTable({--}}
    {{--            dom: 'lifrtp',--}}
    {{--            processing: true,--}}
    {{--            serverSide: true,--}}
    {{--            ajax: '/admin/products/get-data',--}}
    {{--            columns: [--}}
    {{--                { data: 'DT_RowIndex', searchable: false},--}}
    {{--                { data: 'name', name: 'product_name', searchable: true},--}}
    {{--                { data: 'category_id', name: 'category_name'},--}}
    {{--                { data: 'content', name: 'product_content'},--}}
    {{--                { data: 'action', name: 'product_action'}--}}
    {{--            ]--}}
    {{--        });--}}
    {{--    });--}}
    {{--</script>--}}
@endsection
@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-house" viewBox="0 0 16 16">
                                <path
                                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                            </svg>
                            Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
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
                    <div style="padding: 20px 0px 0px 20px">
                        <a class="btn btn-success" href="{{route('backend.product.create')}}"><i
                                class="fa fa-btn fa-plus"></i> Thêm mới</a>
                        <a class="btn btn-primary" href="{{route('backend.product.export')}}"><i class="fa fa-btn fa-file-excel"></i> Xuất Excel</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th>Tên sản phẩm</th>
                                <th style="text-align: center">Thể loại</th>
                                <th style="text-align: center">Ảnh</th>
                                <th>Giá gốc</th>
                                <th>Giá bán</th>
                                <th style="text-align: center">Giảm giá(%)</th>
                                <th>Mô tả</th>
                                <th>Tác giả</th>
                                <th style="text-align: center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td style="text-align: center">{{ $product->id }}</td>
                                    <td>
                                        <a href="{{ route('backend.product.show', $product->id) }}">{{ $product->name }}</a>
                                    </td>
                                    <td style="text-align: center">{{ $product->category ? $product->category->name : 'Đang cập nhật' }}</td>
                                    <td style="text-align: center;">
                                        @if ($product->image)
                                        <img
                                            style="width: 160px;height: 200px;object-fit: cover;"
                                            src="/{{$product->image}}">
                                        @else
                                            <img style="width: 160px;height: 200px;object-fit: cover;" src="/frontend/img/product-default.jpg"></img>
                                    @endif</td>
                                    <td>{{ number_format($product->origin_price) }} VND</td>
                                    <td>{{ number_format($product->sale_price) }} VND</td>
                                    <td style="text-align: center">{{ $product->discount_percent }} </td>
                                    <td>{{ $product->content }} </td>
                                    <td>{{ $product->author ? $product->author->name : 'Đang cập nhật' }} </td>
                                    {{--                                    <td>{{ $user->email }}</td>--}}
                                    {{--                                    <td>{{ $user->phone ?: 'Đang cập nhật' }}</td>--}}
                                    {{--                                    <td>{{ $user->address ?: 'Đang cập nhật'}}</td>--}}
                                    {{--                                    <td style="text-align: center">--}}
                                    {{--                                        @if($user->role == 0)--}}
                                    {{--                                            <b>Quản trị viên</b>--}}
                                    {{--                                        @elseif($user->role == 1)--}}
                                    {{--                                            Nhân viên--}}
                                    {{--                                        @endif--}}
                                    {{--                                    </td>--}}
                                    <td style="text-align: center">
                                        <form action="{{ route('backend.product.destroy', $product->id) }}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Xóa
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
@endsection
