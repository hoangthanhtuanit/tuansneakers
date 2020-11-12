@extends('layouts.index')
@section('title', 'Đơn hàng')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Đơn hàng của tôi</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Chi tiết đơn hàng</li>
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
                                                                    <td class="cgt-des text-center">{{ $product_info->quantity }}</td>
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