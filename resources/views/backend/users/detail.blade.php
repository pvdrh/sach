@extends('backend.layouts.master')
@section('script')
@endsection
@section('header-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang trủ</a></li>
                        <li class="breadcrumb-item active">Thông tin tài khoản</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('backend.user.update', $user->id) }}" method="POST">
                                @csrf
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <td>
                                            <label for="email">Email:</label>
                                            <input readonly type="email" name="email" value="{{ $user->email }}">
                                        </td>
                                        <td>
                                            <label for="name">Họ tên:</label>
                                            <input type="text" name="name" value="{{ $user->name }}">
                                        </td>
                                        <td>
                                            <label for="phone">Số điện thoại:</label>
                                            <input type="text" max="10" name="phone" value="{{ $user->phone }}">
                                        </td>
                                        <td>
                                            <label for="address">Địa chỉ:</label>
                                            <input type="text" name="address" value="{{ $user->address }}">
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                            </form>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
