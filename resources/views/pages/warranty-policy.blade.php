@extends('layouts.index')
@section('title', 'Bảo mật thông tin')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area breadcumb-3 overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Chính sách bảo hành</h5> </div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Chính sách bảo hành</li>
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
                        <h5 class="uppercase">Chính sách bảo hành</h5>
                    </div>
                </div>
                <div class="about-us-wrap">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="about-des">
                            <div class="entry-content"><p style="text-align: justify;">Hàng lỗi hỏng do vận chuyển, phản hồi ngay khi nhận hàng: đổi mới, miễn phí vận chuyển</p><p style="text-align: justify;">Hàng có lỗi kỹ thuật sản xuất, nhầm mặt hàng, số lượng, phản hồi ngay khi nhận hàng: đổi mới, bổ sung, miễn phí vận chuyển</p><p style="text-align: justify;">Hàng đã mở nắp và qua sử dụng: không hỗ trợ đổi trả.</p><p style="text-align: justify;">Khách hàng có kích ứng về da với sản phẩm: hoàn tiền và nhận lại sản phẩm.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-us-area end-->

@endsection

