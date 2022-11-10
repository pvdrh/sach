@extends('backend.layouts.master')

@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chi tiết đơn hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('script')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6">
                            <table id="ordersNonAcceptTable" class="table table-bordered table-striped" style="width: 100%">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <th>Phê duyệt</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Tên người nhận</th>
                                    <td>{{ $order->customer_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $order->customer_email }}</td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <td>{{ $order->customer_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ</th>
                                    <td>{{ $order->customer_address }}</td>
                                </tr>
                                <tr>
                                    <th>Giao hàng</th>
                                    <td>
                                        @if($order->shipping == 'shipping1')
                                            Free ship
                                        @elseif($order->shipping == 'shipping2')
                                            Giao hàng nhanh
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Thời gian order</th>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            </table>
                        </div>
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



