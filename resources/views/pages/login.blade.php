@extends('layouts.index')
@section('title', 'Đăng nhập')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5><a href="{{ url('login') }}">Đăng nhập</a> / <a href="{{ url('register') }}">Đăng ký</a></h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Đăng nhập</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!-- Account Area Start -->
    <div class="account-area ptb-80">
        <div class="container">
            <div class="row">
                <form action="{{ url('login') }}" method="post" class="login-side" style=" margin: 0 auto; width: 750px;">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="login-reg">
                        <h3>Đăng nhập</h3>
                        @include('layouts.error')
                        <div class="input-box mb-20">
                            <label class="control-label">E-Mail</label>
                            <input type="text" placeholder="E-Mail" value="" name="email" class="info">
                        </div>
                        <div class="input-box">
                            <label class="control-label">Mật khẩu</label>
                            <input type="password" placeholder="Mật khẩu" value="" name="password" class="info">
                        </div>
                    </div>
                    <div class="frm-action">
                        <div class="input-box tci-box">
                            <button type="submit" class="btn-sub">ĐĂNG NHẬP</button>
                        </div>
                        <span>
                             <input class="remr" type="checkbox"> Lưu mật khẩu
                         </span>
                        <a href="#" class="forgotten forg">Quên mật khẩu</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Account Area End -->

@endsection
