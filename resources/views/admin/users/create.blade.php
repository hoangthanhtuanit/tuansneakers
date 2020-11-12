@extends('admin.layouts.index')
@section('title', 'Thêm mới quản trị viên')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/user/index') }}">Tài khoản</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Thêm mới tài khoản</h6>
                        <a href="{{ url('admin/user/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/user/create') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ tên</label>
                                <input type="text" class="form-control" name="full_name" value="{{ old('full_name') ? old('full_name') : '' }}" placeholder="Nhập họ tên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                <input type="file" class="form-control" name="avatar">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : '' }}" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') ? old('password') : '' }}" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="re_password" value="{{ old('re_password') ? old('re_password') : '' }}" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : '' }}" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : '' }}" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giới tính</label>
                                <select name="gender" id="select" class="form-control">
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quyền tài khoản</label>
                                <select name="level" id="select" class="form-control">
                                    <option value="0">Khách hàng</option>
                                    <option value="1">Nhân viên</option>
                                    <option value="2">Quản trị viên</option>
                                </select>
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
