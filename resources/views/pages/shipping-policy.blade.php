@extends('layouts.index')
@section('title', 'Chính sách vận chuyển')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area breadcumb-3 overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Chính sách vận chuyển</h5> </div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Chính sách vận chuyển</li>
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
                        <h5 class="uppercase">Chính sách vận chuyển</h5>
                    </div>
                </div>
                <div class="about-us-wrap">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="about-des">
                            <div class="entry-content"><p>Thông thường sau khi nhận được thông tin đặt hàng chúng tôi sẽ xử lý đơn hàng trong vòng 24h và phản hồi lại thông tin cho khách hàng về việc thanh toán và giao nhận. Thời gian giao hàng thường trong khoảng từ 3-5 ngày kể từ ngày chốt đơn hàng hoặc theo thỏa thuận với khách khi đặt hàng. Tuy nhiên, cũng có trường hợp việc giao hàng kéo dài hơn nhưng chỉ xảy ra trong những tình huống bất khả kháng như sau:</p><ul><li>Nhân viên công ty sẽ liên lạc với khách hàng qua điện thoại không được nên không thể giao hàng.</li><li>Địa chỉ giao hàng bạn cung cấp không chính xác hoặc khó tìm.</li><li>Số lượng đơn hàng của công ty tăng đột biến khiến việc xử lý đơn hàng bị chậm.</li><li>Đối tác cung cấp nguyên liệu cho công ty chậm hơn dự kiến khiến việc giao hàng bị chậm lại hoặc đối tác vận chuyển giao hàng bị chậm chỉ vận chuyển phân phối cho đại lý hoặc khách hàng có nhu cầu lớn, lâu dài. Vì thế công ty đa phần sẽ hỗ trợ chi phí vận chuyển như một cách chăm sóc đại lý cua mình. Đối với khách lẻ nếu có nhu cầu sử dụng lớn vui lòng liên hệ trực tiếp để thỏa thuận hợp đồng cũng như phí vận chuyển.</li></ul></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-us-area end-->

@endsection

