@extends('backend.layouts.master')
@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chỉnh sửa sản phẩm</h1>
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
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('backend.product.update', $product->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="" placeholder="Điền tên sản phẩm " name="name" value="{{ $product->name }}">
                                @error('name')
                                <p style="color: #ff0000">*{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select class="form-control select2" style="width: 100%;" name="category_id">
                                    <option value="">--Chọn danh mục---</option>
                                    @foreach($categories as $category)
                                        @if($category->id == $product->category_id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @endif
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <p style="color: red">*{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tác giả</label>
                                <select class="form-control select2" style="width: 100%;" name="author_id">
                                    <option value="">--Chọn tác giả---</option>
                                    @foreach($authors as $author)
                                        @if($author->id == $product->author_id)
                                            <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                                        @endif
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                <p style="color: red">*{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nhà xuất bản</label>
                                <select class="form-control select2" style="width: 100%;" name="publishing_company_id">
                                    <option value="">--Chọn NXB---</option>
                                    @foreach($publishings as $publishing)
                                        @if($publishing->id == $product->publishing_company_id)
                                            <option value="{{ $publishing->id }}" selected>{{ $publishing->name }}</option>
                                        @endif
                                            <option value="{{ $publishing->id }}">{{ $publishing->name }}</option>
                                    @endforeach
                                </select>
                                @error('publishing_company_id')
                                <p style="color: red">*{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Giá khuyến mại</label>
                                        <input type="text" class="form-control" placeholder="Điền giá khuyến mại" name="sale_price" value="{{ $product->sale_price }}">
                                        @error('sale_price')
                                        <p style="color: red">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Giá bán</label>
                                        <input type="text" class="form-control" placeholder="Điền giá gốc" name="origin_price" value="{{ $product->origin_price }}">
                                        @error('origin_price')
                                        <p style="color: red">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>% giảm giá</label>
                                        <input type="text" class="form-control" placeholder="%" name="discount_percent" value="{{ $product->discount_percent }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea class="textarea" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="content">{{ $product->content }}</textarea>
                                @error('content')
                                <p style="color: red">*{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Chọn tệp</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái sản phẩm</label>
                                <select class="form-control select2" style="width: 100%;" name="status">
                                    <option value="">--Chọn trạng thái---</option>
                                    <option value="0" @if($product->status == 0) selected @endif>Còn hàng</option>
                                    <option value="1" @if($product->status == 1) selected @endif>Hết hàng</option>
                                    <option value="2" @if($product->status == 2) selected @endif>Dừng bán</option>
                                </select>
                                @error('status')
                                <p style="color: red">*{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger">Huỷ bỏ</button>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
