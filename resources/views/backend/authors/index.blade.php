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
                    <li class="breadcrumb-item"><a href="#">Trang trủ</a></li>
                    <li class="breadcrumb-item active">Danh sách tác giả</li>
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
                                <th>Tên Tác giả</th>
                                <th>Số sản phẩm</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->id }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ count($author->products) }}</td>
                                    <td>
                                        <form action="{{ route('backend.authors.destroy', $author->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
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
