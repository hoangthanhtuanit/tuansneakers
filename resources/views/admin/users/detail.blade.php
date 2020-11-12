@extends('admin.layouts.index')
@section('title', 'Chi tiết quản trị viên')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/user/index') }}">Tài khoản</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Chi tiết tài khoản</h6>
                        <a href="{{ url('admin/user/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <form method="post" action="#" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ tên</label>
                                <input type="text" disabled class="form-control" name="full_name" value="{{ $user->full_name }}" placeholder="Nhập họ tên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                <p>
                                    <img width="100" height="100" src="{{ asset('/uploads/users/' . $user->avatar) }}" alt="">
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" disabled class="form-control" name="email" value="{{ $user->email }}" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" disabled class="form-control" name="address" value="{{ $user->address }}" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" disabled class="form-control" name="phone_number" value="{{ $user->phone_number }}" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                @php
                                    $selected_dis = '';
                                    $selected_act = '';
                                    switch ($user->gander) {
                                        case 0: $selected_dis = 'selected'; break;
                                        case 1: $selected_act = 'selected'; break;
                                    }
                                @endphp
                                <label for="exampleInputEmail1">Giới tính</label>
                                <select name="status" id="select" class="form-control" disabled>
                                    <option value="0" {{ $selected_dis }}>Nữ</option>
                                    <option value="1" {{ $selected_act }}>Nam</option>
                                </select>
                            </div>
                            <div class="form-group">
                                @php
                                    $selected_cus = '';
                                    $selected_emp = '';
                                    $selected_act = '';
                                    switch ($user->level) {
                                        case 0: $selected_cus = 'selected'; break;
                                        case 1: $selected_emp = 'selected'; break;
                                        case 2: $selected_act = 'selected'; break;
                                    }
                                @endphp
                                <label for="exampleInputEmail1">Quyền tài khoản</label>
                                <select name="status" id="select" class="form-control" disabled>
                                    <option value="0" {{ $selected_cus }}>Khách hàng</option>
                                    <option value="1" {{ $selected_emp }}>Nhân viên</option>
                                    <option value="2" {{ $selected_act }}>Quản trị viên</option>
                                </select>
                            </div>
                            <div class="form-group">
                                @php
                                    $selected_dis = '';
                                    $selected_act = '';
                                    switch ($user->confirmed) {
                                        case 0: $selected_dis = 'selected'; break;
                                        case 1: $selected_act = 'selected'; break;
                                    }
                                @endphp
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="status" id="select" class="form-control" disabled>
                                    <option value="0" {{ $selected_dis }}>Disable</option>
                                    <option value="1" {{ $selected_act }}>Active</option>
                                </select>
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
