@extends('backend.layouts.master')
@section('header-content')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách người dùng</h1>
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
    <!-- Content -->
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div style="padding: 20px 0px 0px 20px; display: flex">
                        <a class="btn btn-success" href="{{route('backend.user.create')}}"><i
                                class="fa fa-btn fa-plus"></i> Thêm mới</a>
                        <div style="padding: 5px">
                            <form role="search" method="get" action="{{route('backend.user.index')}}">
                                <input value="{{$search}}" type="text" name="q">
                                <button style="margin-left: 5px" type="submit" class="btn btn-default">
                                    <i
                                        class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th style="text-align: center">Quyền</th>
                                <th style="text-align: center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td style="text-align: center">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone ?: 'Đang cập nhật' }}</td>
                                    <td>{{ $user->address ?: 'Đang cập nhật'}}</td>
                                    <td style="text-align: center">
                                        @if($user->role == 0)
                                            <b>Quản trị viên</b>
                                        @elseif($user->role == 1)
                                            Nhân viên
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        <form action="{{ route('backend.user.destroy', $user->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a href="{{ route('backend.user.show', $user->id) }}"
                                               class="btn btn-primary"><i class="fa fa-btn fa-edit"></i> Cập
                                                nhật</a>
                                            @if ($user->is_protected == 0)
                                                <button class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Xóa
                                                </button>
                                            @endif
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
                        </table>
                        <br>
                        <div style="float: right">{!! $users->links() !!}</div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
@endsection
