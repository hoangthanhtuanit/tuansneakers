@extends('admin.layouts.index')
@section('title', 'Chi tiết đơn hàng')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/order/index') }}">Danh sách đơn hàng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
                <a href="{{ url('admin/order/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
            </div>
            @include('admin.layouts.error')
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Màu</th>
                        <th>Kích thước</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Khuyến mãi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_details as $order_detail)
                        <tr>
                            <td>{{ $order_detail->id }}</td>
                            <td>{{ $order_detail->products->name }}</td>
                            <td>{{ $order_detail->color }}</td>
                            <td>{{ $order_detail->size }}</td>
                            <td>{{ $order_detail->quantity }}</td>
                            <td>${{ number_format($order_detail->price, 0, '.', ',') }}</td>
                            <td>{{ $order_detail->discount }}%</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
