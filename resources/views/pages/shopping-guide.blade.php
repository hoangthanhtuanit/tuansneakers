@extends('layouts.index')
@section('title', 'Hướng dẫn mua hàng')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area breadcumb-3 overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Hướng dẫn mua hàng</h5> </div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Hướng dẫn mua hàng</li>
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
                        <h5 class="uppercase">Hướng dẫn mua hàng</h5>
                    </div>
                </div>
                <div class="about-us-wrap">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="about-des">
                            <div class="entry-content"><p class="text-justify">Quý Khách hàng có thể chọn một trong hai cách sau:</p><p><strong>Cách thứ nhất:&nbsp;</strong>Gọi điện thoại đến số hotline nhân viên của công ty sẽ tư vấn và hỗ trợ cho khác hàng tất cả các thông tin về sản phẩm và dịch vụ..<br> <strong><br> Cách thứ hai:&nbsp;</strong>Đặt hàng qua website:<br> Bước 1: Bấm vào nút “mua hàng” để đưa sản phẩm vào giỏ hàng sau khi đã lựa chọn sản phẩm mình muốn mua<br> Bước 2: Sau khi chọn xong sản phẩm đặt mua, điền các thông tin theo yêu cầu của chúng tôi: size, màu sắc, số lượng ….<br> Bước 3: Bấm nút “Gửi”<br> Đơn hàng của bạn đã hoàn tất và được chuyển tới chúng tôi. Chúng tôi&nbsp; sẽ xử lý và liên lạc lại với bạn để thực hiện giao dịch.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-us-area end-->

@endsection

