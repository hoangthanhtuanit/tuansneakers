@extends('admin.layouts.index')
@section('title', 'Cập nhật quản trị viên')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/user/index') }}">Quản trị viên</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Cập nhật quản trị viên</h6>
                        <a href="{{ url('admin/user/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/user/update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ tên</label>
                                <input type="text" class="form-control" name="full_name" value="{{ old('full_name') ? old('full_name') : $user->full_name }}" placeholder="Nhập họ tên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                <p>
                                    <img width="100" height="100" src="{{ asset('/uploads/users/' . $user->avatar) }}" alt="">
                                </p>
                                <input type="file" class="form-control" name="avatar">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label> &nbsp;
                                <input type="checkbox" id="changePassword" name="changePassword" title="Chọn để thay đổi mật khẩu">
                                <input type="password" disabled class="form-control password" name="password" value="{{ old('password') ? old('password') : $user->password }}" placeholder="Đây là mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                                <input type="password" disabled class="form-control password" name="re_password" value="{{ old('re_password') ? old('re_password') : $user->password }}" placeholder="Đây là mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : $user->address }}" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : $user->phone_number }}" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                @php
                                    $selected_wo = '';
                                    $selected_ma = '';
                                    switch ($user->gender) {
                                        case 0: $selected_wo = 'selected'; break;
                                        case 1: $selected_ma = 'selected'; break;
                                    }
                                @endphp
                                <label for="exampleInputEmail1">Giới tính</label>
                                <select name="gender" id="select" class="form-control">
                                    <option value="0" {{ $selected_wo }}>Nữ</option>
                                    <option value="1" {{ $selected_ma }}>Nam</option>
                                </select>
                            </div>
                            <div class="form-group">
                                @php
                                    $selected_ad = '';
                                    $selected_em = '';
                                    switch ($user->level) {
                                        case 0: $selected_em = 'selected'; break;
                                        case 1: $selected_ad = 'selected'; break;
                                    }
                                @endphp
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="level" id="select" class="form-control">
                                    <option value="0" {{ $selected_em }}>Nhân viên</option>
                                    <option value="1" {{ $selected_ad }}>Quản trị viên</option>
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
                                <select name="status" id="select" class="form-control">
                                    <option value="0" {{ $selected_dis }}>Disable</option>
                                    <option value="1" {{ $selected_act }}>Active</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" name="save" value="Lưu">
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

@section('script')
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection
