@extends('backend.layouts.master')

@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Đơn hàng đã giao</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Quản lí đơn hàng</a></li>
                    <li class="breadcrumb-item active">Đơn hàng đã giao</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $('#ordersSuccessTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/orders/get-success',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'customer_name', name: 'customer_name' },
                    { data: 'customer_email', name: 'email' },
                    { data: 'customer_phone', name: 'phone' },
                    { data: 'customer_address', name: 'address' },
                    { data: 'products_count', name: 'products_count' },
                    { data: 'shipping', name: 'shipping' },
                    { data: 'money', name: 'money' },
                    { data: 'action' },
                ]
            })
        });
    </script>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="ordersSuccessTable" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên người nhận</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Số sản phẩm</th>
                                <th>Giao hàng</th>
                                <th>Hóa đơn</th>
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


