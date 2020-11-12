@extends('admin.layouts.index')
@section('title', 'Xử lý đơn hàng')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/order/index') }}">Danh sách đơn hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Xử lý đơn hàng</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Xư lý đơn hàng</h6>
                        <a href="{{ url('admin/order/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/order/handling', ['id' => $order->id]) }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                @php
                                    $selected_0 = '';
                                    $selected_1 = '';
                                    $selected_2 = '';
                                    $selected_3 = '';
                                    switch ($order->status) {
                                        case 0: $selected_0 = 'selected'; break;
                                        case 1: $selected_1 = 'selected'; break;
                                        case 2: $selected_2 = 'selected'; break;
                                        case 3: $selected_3 = 'selected'; break;
                                    }
                                @endphp
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="status" id="select" class="form-control">
                                    <option value="0" {{ $selected_0 }}>Chờ xử lý</option>
                                    <option value="1" {{ $selected_1 }}>Đang chuyển hàng</option>
                                    <option value="2" {{ $selected_2 }}>Đã nhận hàng</option>
                                    <option value="3" {{ $selected_3 }}>Đã huỷ</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" name="save" value="Lưu">
                                <input type="reset" class="btn btn-warning" value="Nhập lại">
                                <button class="btn btn-danger"><a style="text-decoration: none; color: #fff;" href="{{ url('admin/order/detail', [$order->id]) }}">Chi tiết đơn hàng</a></button>
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