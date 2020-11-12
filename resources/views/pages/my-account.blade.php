@extends('layouts.index')
@section('title', 'Trang cá nhân')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Trang cá nhân</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Trang cá nhân</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!--service idea area are start -->
    <div class="idea-area  ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="idea-tab-menu">
                        <ul class="nav idea-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#creativity" aria-controls="creativity"
                                                                      role="tab" data-toggle="tab">Thông tin cá nhân</a>
                            </li>
                            <li role="presentation"><a href="#devlopment" aria-controls="devlopment" role="tab"
                                                       data-toggle="tab">Đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="idea-tab-content">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="creativity">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-box mb-20">
                                        <label>Họ tên <em>*</em></label>
                                        <input type="text" name="name" value="{{ Auth::user()->full_name }}" class="info" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-box mb-20">
                                        <label>Email <em>*</em></label>
                                        <input type="text" name="email" value="{{ Auth::user()->email }}" class="info" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-box mb-20">
                                        <label>Số điện thoại <em>*</em></label>
                                        <input type="text" name="phone_number" class="info" value="{{ Auth::user()->phone_number }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-box mb-20">
                                        <label>Địa chỉ <em>*</em></label>
                                        <input type="text" name="address" class="info mb-10" value="{{ Auth::user()->address }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="devlopment">
                                <form action="{{ url('check-order') }}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-box mb-20">
                                            <label>Mã bưu phẩm <em>*</em></label>
                                            <input type="text" name="postal_id" value="" class="info">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="input-box">
                                            <input name="submit" class="sbumit-btn" value="Xem" type="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--service idea area are end -->

@endsection