@extends('layouts.index')
@section('title', 'Thanh toán')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Thanh toán</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Thanh toán</li>
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
                                <li role="presentation" class="active shadow-box"><a href="{{ url('checkout') }}"
                                                                                     aria-controls="checkout" role="tab"
                                                                                     data-toggle="tab">Thanh
                                        toán</a></li>
                                <li role="presentation"><a style="border: none;"><span></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div class="content-tab-product-category pb-70">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane  fade in active" id="checkout">
                                    <!-- Checkout are start-->
                                    <div class="checkout-area">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    @if(!Auth::check())
                                                        <div class="coupne-customer-area mb50">
                                                            <div class="panel-group" id="accordion" role="tablist"
                                                                 aria-multiselectable="true">
                                                                <div class="panel panel-checkout">
                                                                    <div class="panel-heading" role="tab"
                                                                         id="headingTwo">
                                                                        <h4 class="panel-title">
                                                                            <img src="images/icons/acc.jpg" alt="">
                                                                            Bạn đã có tài khoản?
                                                                            <a class="collapsed" role="button"
                                                                               data-toggle="collapse"
                                                                               data-parent="#accordion"
                                                                               href="#collapseTwo"
                                                                               aria-expanded="false"
                                                                               aria-controls="collapseTwo">
                                                                                Đăng nhập để tiến hành thanh toán
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseTwo"
                                                                         class="panel-collapse collapse"
                                                                         role="tabpanel"
                                                                         aria-labelledby="headingTwo">
                                                                        <div class="panel-body">
                                                                            <div class="sm-des pb20">i
                                                                                Nếu bạn đã mua sắm với chúng tôi
                                                                                trước đây,
                                                                                vui lòng nhập thông tin của bạn vào
                                                                                các ô
                                                                                bên dưới. Nếu bạn là khách hàng mớ,
                                                                                vui lòng
                                                                                tiếp tục với phần Thanh toán & Giao
                                                                                hàng.
                                                                            </div>
                                                                            <div class="first-last-area">
                                                                                <div class="input-box mtb-20">
                                                                                    <label>Tài khoản hoặc
                                                                                        Email</label>
                                                                                    <input type="email"
                                                                                           placeholder="Địa chỉ email"
                                                                                           class="info"
                                                                                           name="email">
                                                                                </div>
                                                                                <div class="input-box mb-20">
                                                                                    <label>Mật khẩu</label>
                                                                                    <input type="password"
                                                                                           placeholder="Nhập mật khẩu"
                                                                                           class="info"
                                                                                           name="password">
                                                                                </div>
                                                                                <div class="frm-action cc-area">
                                                                                    <div class="input-box tci-box">
                                                                                        <a href="#"
                                                                                           class="btn-def btn2">Đăng
                                                                                            nhập</a>
                                                                                    </div>
                                                                                    <span>
                                                                                    <input type="checkbox" class="remr"> Remember me
                                                                                </span>
                                                                                    <a class="forgotten forg"
                                                                                       href="#">Forgotten
                                                                                        Password</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="billing-details">
                                                                @if(Auth::check())
                                                                    <div class="contact-text right-side">
                                                                        <h2>Chi tiết thanh toán</h2>
                                                                        <form action="checkout" method="post">
                                                                            <input type="hidden" name="_token"
                                                                                   value="{{csrf_token()}}">
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Họ và tên
                                                                                            <em>*</em></label>
                                                                                        <input type="text"
                                                                                               name="full_name"
                                                                                               class="info"
                                                                                               value="{{ Auth::user()->full_name }}"
                                                                                               placeholder="Họ và tên">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Địa chỉ
                                                                                            <em>*</em></label>
                                                                                        <input type="text"
                                                                                               name="address"
                                                                                               class="info"
                                                                                               value="{{ Auth::user()->address }}"
                                                                                               placeholder="Địa chỉ">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Email
                                                                                            <em>*</em></label>
                                                                                        <input type="text"
                                                                                               name="email"
                                                                                               class="info"
                                                                                               value="{{ Auth::user()->email }}"
                                                                                               placeholder="Email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Số điện
                                                                                            thoại<em>*</em></label>
                                                                                        <input type="text"
                                                                                               name="phone_number"
                                                                                               class="info"
                                                                                               value="{{ Auth::user()->phone_number }}"
                                                                                               placeholder="Số điện thoại">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <label>Phương thức thanh
                                                                                        toán<em>*</em></label>
                                                                                    <div class="custom-payment-section payment-section mb-20">
                                                                                        <div class="pay-toggle">
                                                                                            <div class="pay-type-total">
                                                                                                <div class="pay-type">
                                                                                                    <input type="radio"
                                                                                                           checked
                                                                                                           value="0"
                                                                                                           name="payment">
                                                                                                    <label for="pay-toggle01">Nhận
                                                                                                        hàng thanh
                                                                                                        toán</label>
                                                                                                </div>
                                                                                                <div class="pay-type">
                                                                                                    <input type="radio"
                                                                                                           name="payment"
                                                                                                           value="1">
                                                                                                    <label for="pay-toggle02">Chuyển
                                                                                                        khoản</label>
                                                                                                </div>
                                                                                                <div class="pay-type">
                                                                                                    <input type="radio"
                                                                                                           name="payment"
                                                                                                           value="2">
                                                                                                    <label for="pay-toggle02">Tiền
                                                                                                        mặt</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12 form">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Ghi chú</label>
                                                                                        <textarea name="note"
                                                                                                  placeholder="Ghi chú về đơn hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."
                                                                                                  class="area-tex"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <input class="custom-checkout"
                                                                                               type="submit"
                                                                                               value="THANH TOÁN">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @else
                                                                    <div class="contact-text right-side">
                                                                        <h2>Chi tiết thanh toán</h2>
                                                                        <form action="checkout" method="post">
                                                                            <input type="hidden" name="_token"
                                                                                   value="{{csrf_token()}}">
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Họ và tên
                                                                                            <em>*</em></label>
                                                                                        <input type="text"
                                                                                               name="full_name"
                                                                                               class="info"
                                                                                               placeholder="Họ và tên">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Địa chỉ
                                                                                            <em>*</em></label>
                                                                                        <input type="text"
                                                                                               name="address"
                                                                                               class="info"
                                                                                               placeholder="Địa chỉ">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Email
                                                                                            <em>*</em></label>
                                                                                        <input type="text"
                                                                                               name="email"
                                                                                               class="info"
                                                                                               placeholder="Email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Số điện
                                                                                            thoại<em>*</em></label>
                                                                                        <input type="text"
                                                                                               name="phone_number"
                                                                                               class="info"
                                                                                               placeholder="Số điện thoại">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <label>Phương thức thanh
                                                                                        toán<em>*</em></label>
                                                                                    <div class="custom-payment-section payment-section mb-20">
                                                                                        <div class="pay-toggle">
                                                                                            <div class="pay-type-total">
                                                                                                <div class="pay-type">
                                                                                                    <input type="radio"
                                                                                                           checked
                                                                                                           value="0"
                                                                                                           name="payment">
                                                                                                    <label for="pay-toggle01">Nhận
                                                                                                        hàng thanh
                                                                                                        toán</label>
                                                                                                </div>
                                                                                                <div class="pay-type">
                                                                                                    <input type="radio"
                                                                                                           name="payment"
                                                                                                           value="1">
                                                                                                    <label for="pay-toggle02">Chuyển
                                                                                                        khoản</label>
                                                                                                </div>
                                                                                                <div class="pay-type">
                                                                                                    <input type="radio"
                                                                                                           name="payment"
                                                                                                           value="2">
                                                                                                    <label for="pay-toggle02">Tiền
                                                                                                        mặt</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12 form">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Ghi chú</label>
                                                                                        <textarea name="note"
                                                                                                  placeholder="Ghi chú về đơn hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."
                                                                                                  class="area-tex"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <input class="custom-checkout"
                                                                                               type="submit"
                                                                                               value="THANH TOÁN">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="billing-details">
                                                                <div class="contact-text right-side">
                                                                    <h2>Chi tiết hoá đơn</h2>
                                                                    <div class="checkout-payment-area">
                                                                        <div class="checkout-total mt20">
                                                                            <div class="table-responsive">
                                                                                <table class="checkout-area table">
                                                                                    <thead>
                                                                                    <tr class="cart_item check-heading">
                                                                                        <td class="ctg-type">Sản
                                                                                            phẩm
                                                                                        </td>
                                                                                        <td class="cgt-des">Đơn giá
                                                                                        </td>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    @foreach($cart_items as $cart_item)
                                                                                        <tr class="cart_item check-item prd-name">
                                                                                            <td class="ctg-type">{{ $cart_item->name }}
                                                                                                * {{ $cart_item->qty }}
                                                                                            </td>
                                                                                            <td class="cgt-des">
                                                                                                ${{ number_format($cart_item->price, 0, '.', ',') }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    <tr class="cart_item">
                                                                                        <td class="ctg-type crt-total">
                                                                                            Tổng tiền
                                                                                        </td>
                                                                                        <td class="cgt-des prc-total">
                                                                                            ${{ $total_price }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
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
                                    <!-- Checkout are end-->
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
