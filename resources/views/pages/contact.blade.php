@extends('layouts.index')
@section('title', 'Liên hệ')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area breadcumb-3 overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Chi tiết liên hệ</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Liên hệ</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!--map area start-->
    <div class="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.79753635634!2d105.77254361476356!3d21.04078558599191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b5534fb3bf%3A0x70d71b071349fa94!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gRGV2cHJvIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1592396067360!5m2!1svi!2s"
                width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
    </div>
    <!--map area end-->

    <!--contact info are start-->
    <div class="contact-info ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-12">
                            @include('layouts.error')
                        </div>
                        <form id="contact-form" action="{{ url('contact') }}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col-md-6">
                                <div class="input-box mb-20">
                                    <input name="full_name" class="info" placeholder="Họ tên (*)" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box mb-20">
                                    <input name="email" class="info" placeholder="Email (*)" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box mb-20">
                                    <input name="phone_number" class="info" placeholder="Số điện thoại (*)" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box mb-20">
                                    <input name="address" class="info" placeholder="Địa chỉ (*)" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-box mb-20">
                                    <textarea name="message" class="area-tex"
                                              placeholder="Nội dung liên hệ (*)"></textarea>
                                </div>
                            </div>
                            <p class="form-messege"></p>
                            <div class="col-xs-12">
                                <div class="input-box">
                                    <input name="submit" class="sbumit-btn" value="Gửi" type="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="single-footer contact-us contact-us-2">
                        <div class="heading-title text-center mb-50">
                            <h5 class="uppercase">Thông tin liên hệ</h5>
                        </div>
                        <ul class="contact-info">
                            <li>
                                <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>
                                <div class="contact-text">
                                    <p><span>+84 (81) 6990996</span><br><span>+84 (36) 4081626</span></p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>
                                <div class="contact-text">
                                    <p><span><a>tuansneakerservice@gmail.com</a></span><span><a>hoangthanhtuanit@gmail.com</a></span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"> <i class="zmdi zmdi-pin-drop"></i> </div>
                                <div class="contact-text">
                                    <p><span>147, Phố Mai Dịch,</span><span> Quận Cầu Giấy, Hà Nội</span></p>
                                </div>
                            </li>
                        </ul>
                        <div class="social-icon-wraper mt-25">
                            <div class="social-icon socile-icon-style-1">
                                <ul>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-glass"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-dribbble"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-whatsapp"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-blogger"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact info are end-->

@endsection
