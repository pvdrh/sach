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
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="/storage/{{ \Illuminate\Support\Facades\Auth::user()->avatar }}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>

                            <p class="text-muted text-center">
                                @if( \Illuminate\Support\Facades\Auth::user()->role == 0)
                                    Administrator
                                @elseif(\Illuminate\Support\Facades\Auth::user()->role == 1)
                                    Quản lí
                                @endif
                            </p>
                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
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
                                            <label for="name">Họ tên:</label>
                                            <input type="text" name="name" value="{{ $user->name }}">
                                        </td>
                                        <td>
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" value="{{ $user->email }}">
                                        </td>
                                        <td>
                                            <label for="phone">Số điện thoại:</label>
                                            <input type="text" name="phone" value="{{ $user->phone }}">
                                        </td>
                                        <td>
                                            <label for="address">Địa chỉ:</label>
                                            <input type="text" name="address" value="{{ $user->address }}">
                                        </td>
                                        <td>
                                            <label for="name">Vị trí:</label>
                                            @if($user->role == 0)
                                                <p>Administrator</p>
                                            @elseif($user->role == 1)
                                                <p>Quản lí</p>
                                            @endif
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
