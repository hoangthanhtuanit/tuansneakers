@extends('admin.layouts.index')
@section('title', 'Danh sách đơn hàng')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Trang tổng quan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
            </div>
            @include('admin.layouts.error')
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                    <tr class="text-center">
                        <th>Mã ĐH</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->postal_id }}</td>
                            <td>
                                <ul style="list-style: none;">
                                    <li>Họ tên: {{ $order->full_name }}</li>
                                    <li>SĐT: {{ $order->phone_number }}</li>
                                    <li>Email: {{ $order->email }}</li>
                                    <li>Địa chỉ: {{ $order->address }}</li>
                                </ul>
                            </td>
                            <td>${{ number_format($order->total_price, 0, '.', ',') }}</td>
                            <td>
                                @php
                                    $status_a = '';
                                    $status_b = '';
                                    $status_c = '';
                                    $status_d = '';
                                    switch ($order->status) {
                                    case 0:
                                        $status_a = 'Chờ xử lý';
                                        break;
                                    case 1:
                                        $status_b = 'Đang chuyển hàng';
                                        break;
                                    case 2:
                                        $status_c = 'Đã nhận hàng';
                                        break;
                                    case 3:
                                        $status_d = 'Đã huỷ';
                                        break;
                                    }
                                @endphp
                                <span class="badge badge-warning">{{ $status_a }}</span>
                                <span class="badge badge-info">{{ $status_b }}</span>
                                <span class="badge badge-success">{{ $status_c }}</span>
                                <span class="badge badge-danger">{{ $status_d }}</span>
                            </td>
                            <td>
                                <div class="table-data-feature text-center">
                                    <div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary">Xử lý</button>
                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Xử lý</span>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(81px, 38px, 0px);">
                                            @if($order->status == 0)
                                                <a class="dropdown-item" href="{{ url('admin/order/handling', ['process', $order->id]) }}">Chuyển hàng</a>
                                                <a class="dropdown-item" href="{{ url('admin/order/handling', ['success', $order->id]) }}">Đã nhận hàng</a>
                                                <a class="dropdown-item" href="{{ url('admin/order/handling', ['cancel', $order->id]) }}">Hủy</a>
                                                <div class="dropdown-divider"></div>
                                            @elseif ($order->status == 1)
                                                <a class="dropdown-item" href="{{ url('admin/order/handling', ['success', $order->id]) }}">Đã nhận hàng</a>
                                                <a class="dropdown-item" href="{{ url('admin/order/handling', ['cancel', $order->id]) }}">Hủy</a>
                                                <div class="dropdown-divider"></div>
                                            @endif
                                            <a class="dropdown-item" href="{{ url('admin/order/detail', [$order->id]) }}">Xem chi tiết</a>
                                            @if(Auth::user()->level == 2)
                                                    <a class="dropdown-item" onclick="return confirm('Bạn có muốn tiếp tục xóa không?')" href="{{ url('admin/order/delete', [$order->id]) }}">Xóa</a>
                                            @endif
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
