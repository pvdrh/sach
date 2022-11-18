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
                <h1 class="m-0 text-dark">Danh sách tác giả</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Trang chủ</a></li>
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
                        <a class="btn btn-success" href="{{ route('backend.authors.create') }}"> Thêm mới</a>
                    </div>
                    <div class="card-body">
                        <table id="" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th>Tên Tác giả</th>
                                <th>Số sản phẩm</th>
                                <th style="text-align: center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td style="text-align: center">{{ $author->id }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ count($author->products) }}</td>
                                    <td style="text-align: center">
                                        <form action="{{ route('backend.authors.destroy', $author->id) }}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a href="{{ route('backend.authors.edit', $author->id) }}"
                                               class="btn btn-primary">Cập nhật</a>
                                            <button class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
                        </table>
                        <br>
                        <div style="float: right">{!! $authors->links() !!}</div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
@endsection
