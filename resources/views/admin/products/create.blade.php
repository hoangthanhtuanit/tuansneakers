@extends('admin.layouts.index')
@section('title', 'Thêm mới sản phẩm')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/product/index') }}">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Thêm mới sản phẩm</h6>
                        <a href="{{ url('admin/product/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/product/create') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhà cung cấp</label>
                                <select name="supplier_id" id="" class="form-control">
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            @for($i = 1; $i<= 3; $i++)
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh chi tiết sản phẩm {{ $i }}</label>
                                    <input type="file" class="form-control" name="imageProduct[]">
                                </div>
                            @endfor
                            <div class="form-group">
                                <label for="exampleInputEmail1">Màu sản phẩm</label>
                                <input type="text" class="form-control" name="color" placeholder="Nhập màu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="text" class="form-control" name="quantity_in_stock" placeholder="Nhập số lượng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" class="form-control" name="price" placeholder="Nhập giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giảm giá</label>
                                <input type="text" class="form-control" name="discount" placeholder="Nhập phần trăm giảm giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả ngắn</label>
                                <input type="text" class="form-control" name="summary" placeholder="Nhập mô tả ngắn">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chi tiết sản phẩm</label>
                                <textarea name="description" id="text-content" cols="20" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="status" id="select" class="form-control">
                                    <option value="0">Disable</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" name="save" value="Thêm mới">
                                <input type="reset" class="btn btn-warning" value="Nhập lại">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->

    </div>
    <!---Container Fluid-->

@endsection
