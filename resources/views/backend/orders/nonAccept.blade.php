@extends('backend.layouts.master')

@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Đơn hàng chưa xác nhận</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('backend.dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                            </svg> Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đơn hàng chưa xác nhận</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $('#ordersNonAcceptTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/orders/get-non-accept',
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
        $('#ordersNonAcceptTable').on('click', '.order-accept', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'put',
                url: '/orders/accept/' + id,
                success: function (res) {
                    if (!res.error) {
                        $('#ordersNonAcceptTable').DataTable().ajax.reload();
                        toastr.success(res.message);
                    }else{
                        toastr.error(res.message);
                    }
                }
            })
        });
        $('#ordersNonAcceptTable').on('click', '.order-delete', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'delete',
                url: '/orders/delete/' + id,
                success: function (res) {
                    if (!res.error) {
                        $('#ordersNonAcceptTable').DataTable().ajax.reload();
                        toastr.success(res.message);
                    }else{
                        toastr.error(res.message);
                    }
                }
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
                        <table id="ordersNonAcceptTable" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th>Tên người nhận</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Số sản phẩm</th>
                                <th>Giao hàng</th>
                                <th>Hóa đơn</th>
                                <th style="text-align: center">Hành động</th>
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


