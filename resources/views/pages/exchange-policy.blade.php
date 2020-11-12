@extends('layouts.index')
@section('title', 'Chính sách đổi trả')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area breadcumb-3 overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Chính sách đổi trả</h5> </div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Chính sách đổi trả</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!-- about-us-area start-->
    <div class="about-us-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="heading-title heading-style pos-rltv mb-50 text-center">
                        <h5 class="uppercase">Chính sách đổi trả</h5>
                    </div>
                </div>
                <div class="about-us-wrap">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="about-des">
                            <div class="entry-content"><p>Trong các trường hợp sau, hãy liên hệ ngay với chúng tôi để được đổi trả hàng trong thời gian sớm nhất:</p><p>Sản phẩm bị lỗi, hỏng hoặc do vận chuyển.</p><p>Gửi sai sản phẩm.</p><p>Lỗi do nhầm lẫn của nhân viên tư vấn</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-us-area end-->

@endsection