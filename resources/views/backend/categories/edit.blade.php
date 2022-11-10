@extends('backend.layouts.master')
@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật danh mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('backend.category.update', $category_edit->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" id="" placeholder="Điền tên sản phẩm " name="name" value="{{ $category_edit->name }}">
                                @error('name')
                                <p style="color: #ff0000">*{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control select2" style="width: 100%;" name="parent_id">
                                    <option value="">--Chọn danh mục---</option>
                                    <option value="0">NULL</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $category_edit->parent_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <p style="color: red">*{{ $message }}</p>
                                @enderror
                            </div>
                        <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="reset" class="btn btn-danger">Huỷ bỏ</button>
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
