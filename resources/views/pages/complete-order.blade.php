@extends('layouts.index')
@section('title', 'Hoá đơn')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Chi tiết hoá đơn</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Chi tiết hoá đơn</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!--cart-checkout-area start -->
    <div class="cart-checkout-area  pt-30">
        <div class="container">
            <div class="row">
                <div class="product-area">
                    <div class="title-tab-product-category">
                        <div class="col-md-12 text-center pb-60">
                            <ul class="nav heading-style-3" role="tablist">
                                <li role="presentation"><a style="border: none;"><span></span></a></li>
                                <li role="presentation" class="active shadow-box"><a href="{{ url('complete-oder') }}"
                                                                                     aria-controls="checkout" role="tab"
                                                                                     data-toggle="tab">Hoá
                                        đơn</a></li>
                                <li role="presentation"><a style="border: none;"><span></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div class="content-tab-product-category pb-70">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane  fade in active" id="complete-order">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            @if(session('success'))
                                                <div class="alert alert-success">
                                                    <h3 style="color: #244ec9">Quý khách đã đặt hàng thành
                                                        công!</h3>
                                                    <div class="explain-email">
                                                        <ul>
                                                            <li>
                                                                Hóa đơn mua hàng của Quý khách đã được chuyển
                                                                đến địa chỉ email đặt hàng của Quý
                                                                khách.
                                                            </li>
                                                            <li>
                                                                Sản phẩm sẽ được chuyển đến địa chỉ đặt hàng sau
                                                                2 - 5 ngày tính từ thời điểm Quý
                                                                khách nhận được thông báo này.
                                                            </li>
                                                            <br>
                                                            <li>
                                                                Trụ sở chính: 147 - Phố Mai Dịch - Quận Cầu Giấy
                                                                - TP Hà Nội
                                                            </li>
                                                            <br>
                                                            <li>
                                                                Hot line: 0364081626
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="checkout-payment-area">
                                                <div class="checkout-total mt20">
                                                    <h3>Đơn hàng của bạn</h3>
                                                    <div class="table-responsive">
                                                        <table class="checkout-area table">
                                                            <thead>
                                                            <tr class="cart_item check-heading text-center">
                                                                <td class="ctg-type">Sản phẩm</td>
                                                                <td class="ctg-type">Số lượng</td>
                                                                <td class="cgt-des">Đơn giá</td>
                                                                <td class="cgt-des">Thành tiền</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($products_info as $product_info)
                                                                <tr class="cart_item check-item prd-name">
                                                                    <td class="ctg-type">
                                                                        <img width="100" height="100" src="{{ asset('uploads/products/' . $product_info->products->image) }}"
                                                                                alt="">&nbsp;&nbsp;&nbsp;
                                                                        {{ $product_info->products->name }}
                                                                    </td>
                                                                    <td class="ctg-type text-center">{{ $product_info->quantity }}</td>
                                                                    <td class="cgt-des text-center">
                                                                        ${{ number_format($product_info->price, 0, '.', ',') }}</td>
                                                                    <td class="cgt-des text-center">
                                                                        ${{ number_format($product_info->price * $product_info->quantity, 0, '.', ',') }}</td>
                                                                </tr>
                                                            @endforeach
                                                            <tr class="cart_item">
                                                                <td class="ctg-type crt-total">Tổng thanh toán</td>
                                                                <td class="cgt-des prc-total">
                                                                    ${{ number_format($orderx->total_price, 0, '.', ',') }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @php
                                                    $payment_text = '';
                                                    switch ($orderx->payment){
                                                        case 0: $payment_text = 'Nhận hàng thanh toán'; break;
                                                        case 1: $payment_text = 'Chuyển khoản'; break;
                                                        case 2: $payment_text = 'Tiền mặt'; break;
                                                    }
                                                @endphp
                                                <div class="payment-section mt-20 clearfix">
                                                    <div class="pay-toggle">
                                                        <div class="pay-type-total">
                                                            <h5 style="font-weight: bold">Phương thức thanh toán
                                                                <span class="payment-x">{{ $payment_text }}</span>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="payment-section mt-20 clearfix">
                                                    <div class="pay-toggle">
                                                        <div class="pay-type-total">
                                                            <h5 style="font-weight: bold">Tình trạng đơn hàng
                                                                @if($orderx->status == 0)
                                                                    <span class="order-status order-wait">Chờ xử lý</span>
                                                                @elseif($orderx->status == 1)
                                                                    <span class="order-status order-action">Đang chuyển hàng</span>
                                                                @elseif($orderx->status == 2)
                                                                    <span class="order-status order-success">Đã nhận hàng</span>
                                                                @else
                                                                    <span class="order-status order-danger">Đã huỷ</span>
                                                                @endif
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--cart-checkout-area end-->

@endsection