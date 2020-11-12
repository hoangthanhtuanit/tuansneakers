@extends('layouts.index')
@section('title', 'Đăng ký')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5><a href="{{ url('login') }}">Đăng nhập</a> / <a href="{{ url('register') }}">Đăng ký</a></h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Đăng ký</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!-- Account Area Start -->
    <div class="account-area ptb-80">
        <div class="container">
            <div class="row">
                <form action="{{ url('register') }}" method="post" enctype="multipart/form-data" style=" margin: 0 auto; width: 750px;">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="login-reg">
                        <h3>Đăng ký</h3>
                        <div class="input-box mb-20">
                            <label class="control-label">Họ tên</label>
                            <input type="text" class="info" placeholder="Họ tên" value="{{ old('full_name') ? old('full_name') : '' }}" name="full_name">
                        </div>
                        <div class="input-box mb-20">
                            <label class="control-label">Ảnh đại diện</label>
                            <input type="file" class="info" name="avatar">
                        </div>
                        <div class="input-box mb-20">
                            <label class="control-label">E-Mail</label>
                            <input type="email" class="info" placeholder="E-Mail" value="{{ old('email') ? old('email') : '' }}" name="email">
                        </div>
                        <div class="input-box">
                            <label class="control-label">Mật khẩu</label>
                            <input type="password" class="info" placeholder="Mật khẩu" value="{{ old('password') ? old('password') : '' }}" name="password">
                        </div>
                        <div class="input-box">
                            <label class="control-label">Nhập lại mật khẩu</label>
                            <input type="password" class="info" placeholder="Nhập lại mật khẩu" value="{{ old('re_password') ? old('re_password') : '' }}" name="re_password">
                        </div>
                        <div class="input-box mb-20">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" class="info" placeholder="Địa chỉ" value="{{ old('address') ? old('address') : '' }}" name="address">
                        </div>
                        <div class="input-box mb-20">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" class="info" placeholder="Số điện thoại" value="{{ old('phone_number') ? old('phone_number') : '' }}" name="phone_number">
                        </div>
                        <div class="input-box mb-20">
                            <label for="exampleInputEmail1">Giới tính</label>
                            <select name="gender" id="select">
                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                        </div>
                    </div>
                    <div class="frm-action">
                        <div class="input-box tci-box">
                            <button type="submit" class="btn-sub">ĐĂNG KÝ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Account Area End -->

@endsection