@extends('admin.layouts.index')
@section('title', 'Danh sách ảnh sản phẩm')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Trang tổng quan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách ảnh sản phẩm</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách ảnh sản phẩm</h6>
                <a href="{{ url('admin/product-image/create') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-plus fa-sm"></i> Thêm mới</h6></a>
            </div>
            @include('admin.layouts.error')
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh 1</th>
                        <th>Ảnh 2</th>
                        <th>Ảnh 3</th>
                        <th>Ảnh 4</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr class="text-center">
                            <td>{{ $image->product_id }}</td>
                            <td>{{ $image->products->name }}</td>
                            <td><img src="{{ asset('/uploads/product-images/' . $image->image_1) }}" width="100" height="100" alt=""></td>
                            <td><img src="{{ asset('/uploads/product-images/' . $image->image_2) }}" width="100" height="100" alt=""></td>
                            <td><img src="{{ asset('/uploads/product-images/' . $image->image_3) }}" width="100" height="100" alt=""></td>
                            <td><img src="{{ asset('/uploads/product-images/' . $image->image_4) }}" width="100" height="100" alt=""></td>
                            <td>
                                @php
                                    /** @var TYPE_NAME $image */
                                    $link_delete = 'admin/product-image/delete/' . $image->product_id;
                                @endphp
                                <div class="table-data-feature text-center">
                                    <a onclick="return confirm('Bạn có muốn tiếp tục xóa không?')" class="item"
                                       href="{{ url($link_delete) }}" title="Xóa">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
