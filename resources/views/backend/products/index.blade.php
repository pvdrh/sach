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
                        <table id="productsTable" class="table table-bordered table-striped" style="width: 100%">
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
