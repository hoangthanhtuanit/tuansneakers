@extends('layouts.index')
@section('title', 'Trang chủ')

@section('content')

    <!--slider area start-->
    <div class="slider-area pos-rltv carosule-pagi cp-line">
        <div class="active-slider">
            @foreach($banners as $banner)
            <div class="single-slider pos-rltv">
                <div class="slider-img"><img width="1920" height="600" src="{{ asset('/uploads/banners/' . $banner->image) }}" alt=""></div>
            </div>
            @endforeach
        </div>
    </div>
    <!--slider area start-->

    <!--delivery service start-->
    <div class="delivery-service-area ptb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-service shadow-box text-center">
                        <img src="images/icons/garantee.png" alt="">
                        <h5>Cam kết chất lượng</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-service shadow-box text-center">
                        <img src="images/icons/coupon.png" alt="">
                        <h5>Khuyến mãi</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-service shadow-box text-center">
                        <img src="images/icons/delivery.png" alt="">
                        <h5>Giao hàng nhanh</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-service shadow-box text-center">
                        <img src="images/icons/support.png" alt="">
                        <h5>Hỗ trợ 24/7</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--delivery service start-->

    <!--testimonial-area-start-->
    <div class="testimonial-area overlay ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center" style="height: 28px;">
                    <div class="heading-title color-lightgrey mb-40 text-center">
                        <h3 class="uppercase">WELCOME TO TUAN SNEAKERS</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonial-area-end-->

    <!--new arrival area start-->
    <div class="new-arrival-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="heading-title heading-style pos-rltv mb-50 text-center">
                        <h5 class="uppercase">Hàng mới về</h5>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="total-new-arrival new-arrival-slider-active carsoule-btn">
                    @foreach($newProducts as $newProduct)
                    <div class="col-md-3">
                        <!-- single product start-->
                        <div class="single-product">
                            <div class="product-img">
                                <div class="product-label">
                                    <div class="new">New</div>
                                </div>
                                <div class="single-prodcut-img  product-overlay pos-rltv">
                                    <a href="{{ url('product', ['id' => $newProduct->id]) }}"> <img alt="" src="{{ asset('/uploads/products/' . $newProduct->image) }}" class="primary-image">
                                    </a>
                                </div>
                                <div class="product-icon socile-icon-tooltip text-center">
                                    <ul>
                                        <li><a href="#" data-tooltip="Mua hàng" class="add-cart"
                                               data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                        <li><a href="{{ url('wishlist', ['id' => $newProduct->id]) }}" data-tooltip="Yêu thích" class="w-list"><i
                                                    class="fa fa-heart-o"></i></a></li>
                                        <li><a href="{{ url('product', ['id' => $newProduct->id]) }}" data-tooltip="Xem chi tiết" class="q-view"><i
                                                    class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-text">
                                <div class="prodcut-name"><a href="{{ url('product', ['id' => $newProduct->id]) }}">{{ $newProduct->name }}</a></div>
                                <div class="prodcut-ratting-price">
                                    <div class="prodcut-price">
                                        @if($newProduct->discount > 0)
                                            <div class="new-price">
                                                ${{ number_format($newProduct->price*(100-$newProduct->discount)/100, 0, '.', ',') }}
                                            </div>
                                            <div class="old-price">
                                                <del>${{ number_format($newProduct->price, 0, '.', ',') }}</del>
                                            </div>
                                        @else
                                            <div class="new-price">
                                                ${{ number_format($newProduct->price, 0, '.', ',') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single product end-->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--new arrival area end-->

    <!--banner area start-->
    <div class="banner-area pt-70">
        <div class="container">
            <div class="row">
                @foreach($randomProducts as $randomProduct)
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="single-banner gray-bg">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="sb-img text-center">
                                    <img width="237" height="404" src="{{ asset('/uploads/products/' . $randomProduct->image) }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="sb-content mt-60">
                                    <div class="banner-text">
                                        <h5 class="lato">FLASH SALE</h5>
                                        <h2 class="montserrat">{{ $randomProduct->name }}</h2>
                                        <h3 class="montserrat new-price">${{ number_format($randomProduct->price*(100-$randomProduct->discount)/100, 0, '.', ',') }}</h3>
                                        <h4 class="montserrat old-price"><del>${{ number_format($randomProduct->price, 0, '.', ',') }}</del></h4>
                                        <p>{{ $randomProduct->summary }}</p>
                                        <a class="btn-def btn2" href="{{ url('product', ['id' => $randomProduct->id]) }}">Xem ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--discunt-featured-onsale-area start -->
    <div class="discunt-featured-onsale-area pt-60">
        <div class="container">
            <div class="row">
                <div class="product-area tab-cars-style">
                    <div class="title-tab-product-category">
                        <div class="col-md-12 text-center">
                            <ul class="nav mb-40 heading-style-2" role="tablist">
                                <li role="presentation" class="active"><a href="#newarrival" aria-controls="newarrival"
                                                                          role="tab" data-toggle="tab">Hàng giảm giá</a>
                                </li>
                                <li role="presentation"><a href="#bestsellr" aria-controls="bestsellr" role="tab"
                                                           data-toggle="tab">Hàng bán chạy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content-tab-product-category">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="newarrival">
                                <div class="total-new-arrival new-arrival-slider-active carsoule-btn">
                                    @foreach($saleProducts as $saleProduct)
                                    <div class="col-md-3">
                                        <!-- single product start-->
                                        <div class="single-product">
                                            <div class="product-img">
                                                <div class="product-label">
                                                    <div class="new">Sale</div>
                                                </div>
                                                <div class="single-prodcut-img  product-overlay pos-rltv">
                                                    <a href="{{ url('product', ['id' => $saleProduct->id]) }}"> <img alt=""
                                                                                        src="{{ asset('/uploads/products/' . $saleProduct->image) }}"
                                                                                        class="primary-image">
                                                    </a>
                                                </div>
                                                <div class="product-icon socile-icon-tooltip text-center">
                                                    <ul>
                                                        <li><a href="#" data-tooltip="Mua hàng" class="add-cart"
                                                               data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                        <li><a href="{{ url('wishlist', ['id' => $saleProduct->id]) }}" data-tooltip="Yêu thích" class="w-list"><i
                                                                        class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{ url('product', ['id' => $saleProduct->id]) }}" data-tooltip="Xem chi tiết" class="q-view"><i
                                                                        class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-text">
                                                <div class="prodcut-name"><a href="{{ url('product', ['id' => $saleProduct->id]) }}">{{ $saleProduct->name }}</a></div>
                                                <div class="prodcut-ratting-price">
                                                    <div class="prodcut-price">
                                                        <div class="new-price">
                                                            ${{ number_format($saleProduct->price*(100-$saleProduct->discount)/100, 0, '.', ',') }}
                                                        </div>
                                                        <div class="old-price">
                                                            <del>${{ number_format($saleProduct->price, 0, '.', ',') }}</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end-->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane  fade in" id="bestsellr">
                                <div class="total-new-arrival new-arrival-slider-active carsoule-btn">
                                    @foreach($hotProducts as $hotProduct)
                                    <div class="col-md-3">
                                        <!-- single product start-->
                                        <div class="single-product">
                                            <div class="product-img">
                                                <div class="product-label">
                                                    <div class="new">Hot</div>
                                                </div>
                                                <div class="single-prodcut-img  product-overlay pos-rltv">
                                                    <a href="{{ url('product', ['id' => $hotProduct->id]) }}"> <img alt=""
                                                                                        src="{{ asset('/uploads/products/' . $hotProduct->image) }}"
                                                                                        class="primary-image">
                                                    </a>
                                                </div>
                                                <div class="product-icon socile-icon-tooltip text-center">
                                                    <ul>
                                                        <li><a href="#" data-tooltip="Mua hàng" class="add-cart"
                                                               data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                        <li><a href="{{ url('wishlist', ['id' => $hotProduct->id]) }}" data-tooltip="Yêu thích" class="w-list"><i
                                                                        class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{ url('product', ['id' => $hotProduct->id]) }}" data-tooltip="Xem chi tiết" class="q-view"><i
                                                                        class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-text">
                                                <div class="prodcut-name"><a href="{{ url('product', ['id' => $hotProduct->id]) }}">{{ $hotProduct->name }}</a></div>
                                                <div class="prodcut-ratting-price">
                                                    <div class="prodcut-price">
                                                        @if($hotProduct->discount > 0)
                                                            <div class="new-price">
                                                                ${{ number_format($hotProduct->price*(100-$hotProduct->discount)/100, 0, '.', ',') }}
                                                            </div>
                                                            <div class="old-price">
                                                                <del>${{ number_format($hotProduct->price, 0, '.', ',') }}</del>
                                                            </div>
                                                        @else
                                                            <div class="new-price">
                                                                ${{ number_format($hotProduct->price, 0, '.', ',') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end-->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--discunt-featured-onsale-area end-->

    <!--testimonial-area-start-->
    <div class="testimonial-area overlay ptb-70 mt-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="heading-title color-lightgrey mb-40 text-center">
                        <h5 class="uppercase">Testimonial</h5>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="total-testimonial active-slider carosule-pagi pagi-03">
                        <div class="single-testimonial">
                            <div class="testimonial-img">
                                <img width="150" height="150" src="images/team/ceo1.jpg" alt="">
                            </div>
                            <div class="testimonial-content color-lightgrey">
                                <div class="name-degi pos-rltv">
                                    <h5>Kasper Rorsted</h5>
                                    <p>CEO Adidas</p>
                                </div>
                                <div class="testi-text">
                                    <p>Thương mại điện tử và thương mại điện tử thông qua di động là tương lai của công ty chúng tôi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="testimonial-img">
                                <img width="150" height="150" src="images/team/ceo4.jpg" alt="">
                            </div>
                            <div class="testimonial-content color-lightgrey">
                                <div class="name-degi pos-rltv">
                                    <h5>Mark Parker</h5>
                                    <p>CEO Nike</p>
                                </div>
                                <div class="testi-text">
                                    <p>Sứ mệnh của Nike là “mang niềm cảm hứng và cải tiến đến cho mọi vận động viên trên thế giới”.</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="testimonial-img">
                                <img width="150" height="150" src="images/team/ceo3.jpg" alt="">
                            </div>
                            <div class="testimonial-content color-lightgrey">
                                <div class="name-degi pos-rltv">
                                    <h5>Marco Bizzarri</h5>
                                    <p>CEO Gucci</p>
                                </div>
                                <div class="testi-text">
                                    <p>Thương mại điện tử và thương mại điện tử thông qua di động là tương lai của công ty chúng tôi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonial-area-end-->

    <!--new-arrival on-sale Top-ratted area start-->
    <div class="arrival-ratted-sale-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="heading-title heading-style pos-rltv mb-50 text-center">
                        <h5 class="uppercase">Hàng mới về</h5>
                    </div>
                    <div class="ctg-slider-active">
                        @foreach($newProducts as $newProduct)
                        <div class="single-ctg new-arrival-ctg">
                            <div class="single-ctg-item">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="product-ctg-img pos-rltv product-overlay">
                                            <a href="{{ url('product', ['id' => $newProduct->id]) }}"><img src="{{ asset('/uploads/products/' . $newProduct->image) }}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="product-ctg-content">
                                            <p>{{ $newProduct->name }}</p>
                                            @if($newProduct->discount > 0)
                                                <div class="new-price">
                                                    ${{ number_format($newProduct->price*(100-$newProduct->discount)/100, 0, '.', ',') }}
                                                </div>
                                                <div class="old-price">
                                                    <del>${{ number_format($newProduct->price, 0, '.', ',') }}</del>
                                                </div>
                                            @else
                                                <div class="new-price">
                                                    ${{ number_format($newProduct->price, 0, '.', ',') }}
                                                </div>
                                            @endif
                                            <div class="social-icon socile-icon-style-1 mt-15">
                                                <ul>
                                                    <li><a href="#" data-tooltip="Mua hàng" class="add-cart"
                                                           data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                    <li><a href="{{ url('wishlist', ['id' => $newProduct->id]) }}" data-tooltip="Yêu thích" class="w-list"><i
                                                                    class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="{{ url('product', ['id' => $newProduct->id]) }}" data-tooltip="Xem chi tiết" class="q-view"><i
                                                                    class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-ctg on-sale-ctg">
                        <div class="heading-title heading-style pos-rltv mb-50 text-center">
                            <h5 class="uppercase">Hàng giảm giá</h5>
                        </div>
                        <div class="ctg-slider-active">
                            @foreach($saleProducts as $saleProduct)
                            <div class="single-ctg new-arrival-ctg">
                                <div class="single-ctg-item">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="product-ctg-img pos-rltv product-overlay">
                                                <a href="{{ url('product', ['id' => $saleProduct->id]) }}"><img src="{{ asset('/uploads/products/' . $saleProduct->image) }}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="product-ctg-content">
                                                <p>{{ $saleProduct->name }}</p>
                                                <div class="new-price">
                                                    ${{ number_format($saleProduct->price*(100-$saleProduct->discount)/100, 0, '.', ',') }}
                                                </div>
                                                <div class="old-price">
                                                    <del>${{ number_format($saleProduct->price, 0, '.', ',') }}</del>
                                                </div>
                                                <div class="social-icon socile-icon-style-1 mt-15">
                                                    <ul>
                                                        <li><a href="#" data-tooltip="Mua hàng" class="add-cart"
                                                               data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                        <li><a href="{{ url('wishlist', ['id' => $saleProduct->id]) }}" data-tooltip="Yêu thích" class="w-list"><i
                                                                        class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{ url('product', ['id' => $saleProduct->id]) }}" data-tooltip="Xem chi tiết" class="q-view"><i
                                                                        class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-ctg top-rated-ctg">
                        <div class="heading-title heading-style pos-rltv mb-50 text-center">
                            <h5 class="uppercase">Hàng bán chạy</h5>
                        </div>
                        <div class="ctg-slider-active">
                            @foreach($hotProducts as $hotProduct)
                            <div class="single-ctg new-arrival-ctg">
                                <div class="single-ctg-item">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="product-ctg-img pos-rltv product-overlay">
                                                <a href="{{ url('product', ['id' => $hotProduct->id]) }}"><img src="{{ asset('/uploads/products/' . $hotProduct->image) }}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="product-ctg-content">
                                                <p>{{ $hotProduct->name }}</p>
                                                @if($hotProduct->discount > 0)
                                                    <div class="new-price">
                                                        ${{ number_format($hotProduct->price*(100-$hotProduct->discount)/100, 0, '.', ',') }}
                                                    </div>
                                                    <div class="old-price">
                                                        <del>${{ number_format($hotProduct->price, 0, '.', ',') }}</del>
                                                    </div>
                                                @else
                                                    <div class="new-price">
                                                        ${{ number_format($hotProduct->price, 0, '.', ',') }}
                                                    </div>
                                                @endif
                                                <div class="social-icon socile-icon-style-1 mt-15">
                                                    <ul>
                                                        <li><a href="#" data-tooltip="Mua hàng" class="add-cart"
                                                               data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                        <li><a href="{{ url('wishlist', ['id' => $hotProduct->id]) }}" data-tooltip="Yêu thích" class="w-list"><i
                                                                        class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{ url('product', ['id' => $hotProduct->id]) }}" data-tooltip="Xem chi tiết" class="q-view"><i
                                                                        class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--new-arrival on-sale Top-ratted area end-->

    <!--brand area are start-->
    <div class="brand-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="total-brand">
                    <div class="col-md-3">
                        <div class="single-brand shadow-box"><a><img src="images/brand/01.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-brand shadow-box"><a><img src="images/brand/02.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-brand shadow-box"><a><img src="images/brand/03.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-brand shadow-box"><a><img src="images/brand/04.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-brand shadow-box"><a><img src="images/brand/05.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-brand shadow-box"><a><img src="images/brand/06.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area are start-->

    <!--blog area are start-->
    <div class="blog-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="heading-title heading-style pos-rltv mb-50 text-center">
                        <h5 class="uppercase">Blog</h5>
                    </div>
                </div>
                <div class="total-blog">
                    @foreach($blogs as $blog)
                        <div class="col-md-4">
                            <div class="single-blog">
                                <div class="blog-img pos-rltv product-overlay">
                                    <a href="{{ url('single-blog', $blog->id) }}"><img width="370" height="270" src="{{ asset('/uploads/blogs/' . $blog->image) }}" alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-title">
                                        <h5 class="uppercase font-bold"><a href="{{ url('single-blog', $blog->id) }}">{{ $blog->title }}</a></h5>
                                        <div class="like-comments-date">
                                            <ul>
                                                <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>{{ $blog->liked }} Thích</li>
                                                <li class="blog-date"><a><i class="zmdi zmdi-calendar-alt"></i>{{ date('d/m/Y', strtotime($blog->created_at)) }}</a></li>
                                            </ul>
                                        </div>
                                        <a class="read-more montserrat" href="{{ url('single-blog', $blog->id) }}">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--blog area are end-->

@endsection
