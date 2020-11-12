@extends('admin.layouts.index')
@section('title', 'Danh sách hàng tồn kho')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Trang tổng quan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách hàng tồn kho</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách hàng tồn kho</h6>
            </div>
            @include('admin.layouts.error')
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                    <tr class="text-center">
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventory as $key => $product)
                        <tr class="text-center">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <img src="{{ asset('/uploads/products/' . $product->image) }}" width="100" height="100" alt="">
                            </td>
                            <td>${{ number_format($product->price, 0, '.', '.') }}</td>
                            <td>{{ $product->quantity_in_stock }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
