@extends('admin.layouts.index')
@section('title', 'Danh sách sản phẩm')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Trang tổng quan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
                <a href="{{ url('admin/product/create') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-plus fa-sm"></i> Thêm mới</h6></a>
            </div>
            @include('admin.layouts.error')
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="text-center">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <img src="{{ asset('/uploads/products/' . $product->image) }}" width="100" height="100" alt="">
                            </td>
                            <td>${{ number_format($product->price, 0, '.', '.') }}</td>
                            <td>{{ $product->quantity_in_stock }}</td>
                            <td>
                                @php
                                    $status_a = '';
                                    $status_d = '';
                                    switch ($product->status) {
                                    case 0:
                                        $status_d = 'Disable';
                                        break;
                                    case 1:
                                        $status_a = 'Active';
                                        break;
                                    }
                                @endphp
                                <span class="badge badge-success">{{ $status_a }}</span>
                                <span class="badge badge-secondary">{{ $status_d }}</span>
                            </td>
                            <td>
                                <div class="table-data-feature text-center">
                                    <div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary">Xử lý</button>
                                        <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Xử lý</span>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(81px, 38px, 0px);">
                                            @if($product->status == 0)
                                                <a class="dropdown-item"
                                                   href="{{ url('admin/product/active', ['active', $product->id]) }}">Kích
                                                    hoạt</a>
                                            @else
                                                <a class="dropdown-item"
                                                   href="{{ url('admin/product/active', ['disable', $product->id]) }}">Vô hiệu
                                                    hóa</a>
                                            @endif
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"
                                               href="{{ url('admin/product/image-detail', $product->id) }}">Xem ảnh</a>
                                            <a class="dropdown-item"
                                               href="{{ url('admin/product/update', $product->id) }}">Cập nhật</a>
                                            <a class="dropdown-item"
                                               onclick="return confirm('Bạn có muốn tiếp tục xóa không?')"
                                               href="{{ url('admin/product/delete', $product->id) }}">Xóa</a>
                                        </div>
                                    </div>
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
