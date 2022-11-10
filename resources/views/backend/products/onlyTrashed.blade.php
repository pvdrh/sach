@extends('backend.layouts.master')
@section('script')

@endsection
@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Sản phẩm đã gớ</li>
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
                        <table id="" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Thể loại</th>
                                <th>Ảnh</th>
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
                                    <td>{{ $product->category->name }}</td>
                                    <td><center><img src="/storage/{{ $product->image }}" alt="" style="width: 150px"></center></td>
                                    <td>{{ $product->origin_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td>{{ $product->discount_percent }}</td>
                                    <td>{!! $product->content !!}</td>
                                    <td>
                                        <form action="{{ route('backend.product.force-delete', $product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a href="{{ route('backend.product.show', $product->id) }}" class="btn btn-primary">Chi tiêt</a>
                                            <a href="{{ route('backend.product.restore', $product->id) }}" class="btn btn-success">khôi phục</a>
                                            <button class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
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

