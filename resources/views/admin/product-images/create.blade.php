@extends('admin.layouts.index')
@section('title', 'Thêm mới ảnh sản phẩm')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/product-image/index') }}">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Thêm mới ảnh sản phẩm</h6>
                        <a href="{{ url('admin/customer/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/product-image/create') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <select name="product_id" id="" class="form-control">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh 1 sản phẩm</label>
                                <input type="file" class="form-control" name="image_1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh 2 sản phẩm</label>
                                <input type="file" class="form-control" name="image_2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh 3 sản phẩm</label>
                                <input type="file" class="form-control" name="image_3">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh 4 sản phẩm</label>
                                <input type="file" class="form-control" name="image_4">
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
