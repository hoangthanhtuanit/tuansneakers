@extends('layouts.index')
@section('title', 'Giỏi hàng')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Chi tiết giỏ hàng</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
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
                                <li role="presentation" class="active shadow-box"><a href="{{ url('cart') }}"
                                                                                     aria-controls="checkout" role="tab"
                                                                                     data-toggle="tab">Giỏ hàng</a></li>
                                <li role="presentation"><a style="border: none;"><span></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div class="content-tab-product-category pb-70">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="cart">
                                    <!-- cart are start-->
                                    @if($cart_items->count() > 0)
                                        <div class="cart-page-area">
                                            <form method="post" action="#">
                                                <div class="table-responsive mb-20">
                                                    <table class="shop_table-2 cart table">
                                                        <thead>
                                                        <tr>
                                                            <th class="product-thumbnail ">Ảnh</th>
                                                            <th class="product-name ">Tên sản phẩm</th>
                                                            <th class="product-remove ">S/C</th>
                                                            <th class="product-price ">Đơn giá</th>
                                                            <th class="product-quantity">Số lượng</th>
                                                            <th class="product-subtotal ">Thành tiền</th>
                                                            <th class="product-remove">Xoá</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($cart_items as $key => $cart_item)
                                                            <tr class="cart_item">
                                                                <td class="item-img">
                                                                    <a><img
                                                                                src="{{ asset('uploads/products/' . $cart_item->options['img']) }}"
                                                                                alt=""></a>
                                                                </td>
                                                                <td class="item-title"><a>{{ $cart_item->name }} </a>
                                                                </td>
                                                                <td class="product-remove">{{ $cart_item->options['size'].'/'.$cart_item->options['color'] }}</td>
                                                                <td class="item-price">
                                                                    ${{ number_format($cart_item->price, 0, '.', ',') }}</td>
                                                                <td class="item-qty">
                                                                    <div class="cart-quantity">
                                                                        <div class="product-qty">
                                                                            <div class="cart-quantity">
                                                                                <div class="cart-plus-minus">
                                                                                    <div class="dec qtybutton">-</div>
                                                                                    <input value="{{ $cart_item->qty }}"
                                                                                           name="qtybutton"
                                                                                           class="cart-plus-minus-box"
                                                                                           type="text"
                                                                                           onchange="return UpdateCart(this.value,'{{ $cart_item->rowId }}');">
                                                                                    <div class="inc qtybutton">+</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="total-price">
                                                                    <strong>${{ number_format($cart_item->price*$cart_item->qty, 0, '.', ',') }}</strong>
                                                                </td>
                                                                <td class="remove-item"><a
                                                                            href="{{ url('remove-cart', ['id' => $cart_item->rowId]) }}"><i
                                                                                class="fa fa-trash-o"></i></a></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="cart-bottom-area">
                                                    <div class="row">
                                                        <div class="col-md-8 col-sm-7 col-xs-12">
                                                            <div class="update-coupne-area">
                                                                <div class="update-continue-btn text-right pb-20">
                                                                    <a href="{{ url('remove-cart/all') }}"
                                                                       class="btn-def btn2">Xoá giỏ hàng</a>
                                                                    <a href="{{ url('shop') }}" class="btn-def btn2">Tiếp
                                                                        tục mua sắm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-5 col-xs-12">
                                                            <div class="cart-total-area">
                                                                <div class="catagory-title cat-tit-5 mb-20 text-right">
                                                                    <h3>Nội dung thanh toán</h3>
                                                                </div>
                                                                <div class="process-cart-total">
                                                                    <p>Tổng thanh toán <span>${{ $total_price }}</span>
                                                                    </p>
                                                                </div>
                                                                <p>(*) Giá trên đã bao gồm phí giao hàng và thuế
                                                                    GTGT</p>
                                                                <div class="process-checkout-btn text-right">
                                                                    <a class="btn-def btn2"
                                                                       href="{{ url('checkout') }}">Tiến hành thanh
                                                                        toán</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <h4 class="text-left">(*)Không có sản phẩm nào trong giỏ hàng.</h4>
                                @endif
                                <!-- cart are end-->
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

@section('script')
    <script type="text/javascript">
        function UpdateCart(quantity, rowId) {
            $.get(
                '{{ url('update-cart') }}',
                {
                    quantity: quantity,
                    rowId: rowId
                },
                function () {
                    location.reload();
                }
            );
        }
    </script>
@endsection
