@extends('layouts.index')
@section('title', 'Chi tiết sản phẩm')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Chi tiết sản phẩm</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">chi tiết sản phẩm</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!--single-protfolio-area are start-->
    <div class="single-protfolio-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="portfolio-thumbnil-area">
                        <div class="product-more-views">
                            <div class="tab_thumbnail" data-tabs="tabs">
                                <div class="thumbnail-carousel">
                                    <ul>
                                        <li class="active">
                                            <a href="#view11" class="shadow-box" aria-controls="view11"
                                               data-toggle="tab"><img
                                                        src="{{ asset('/uploads/products/' . $product->image) }}"
                                                        alt=""/></a>
                                        </li>
                                        @foreach($product_images as $key => $product_image)
                                            <li>
                                                <a href="#{{ $key }}" class="shadow-box" aria-controls="{{ $key }}"
                                                   data-toggle="tab"><img
                                                            src="{{ asset('/uploads/image-products/' . $product_image->image) }}"
                                                            alt=""/></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content active-portfolio-area pos-rltv">
                            <div role="tabpanel" class="tab-pane active" id="view11">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group"
                                       href="{{ asset('/uploads/products/' . $product->image) }}"><img
                                                src="{{ asset('/uploads/products/' . $product->image) }}"
                                                alt="Single portfolio"/></a>
                                </div>
                            </div>
                            @foreach($product_images as $key => $product_image)
                                <div role="tabpanel" class="tab-pane" id="{{ $key }}">
                                    <div class="product-img">
                                        <a class="fancybox" data-fancybox-group="group"
                                           href="{{ asset('/uploads/image-products/' . $product_image->image) }}"><img
                                                    src="{{ asset('/uploads/image-products/' . $product_image->image) }}"
                                                    alt="Single portfolio"/></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="single-product-description">
                        <div class="sp-top-des">
                            <h3>{{ $product->name }}</h3>
                            <div class="prodcut-ratting-price">
                                <div class="prodcut-price">
                                    @if($product->discount > 0)
                                        <div class="new-price">
                                            ${{ number_format($product->price * (100 - $product->discount) /100, 0, '.', ',') }}
                                        </div>
                                        <div class="old-price">
                                            <del>
                                                ${{ number_format($product->price, 0, '.', ',') }}
                                            </del>
                                        </div>
                                    @else
                                        <div class="new-price">
                                            ${{ number_format($product->price, 0, '.', ',') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="sp-des">
                            <p>{{ $product->summary }}</p>
                        </div>
                        <form action="{{ url('add-cart', $product->id) }}" method="GET">
                            <div class="sp-bottom-des">
                                <div class="single-product-option">
                                    <div class="sort product-type">
                                        <label>Màu: </label> {{ $product->color }}
                                    </div>
                                    <div class="sort product-type">
                                        <label>Kích thước: </label>
                                        <select name="size" id="input-sort-size">
                                            @foreach($sizes as $size)
                                                <option value="{{ $size->size }}">{{ $size->size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="quantity-area">
                                    <label>Số lượng :</label>
                                    <div class="cart-quantity">
                                        <div class="product-qty">
                                            <div class="cart-quantity">
                                                <div class="cart-plus-minus">
                                                    <div class="dec qtybutton">-</div>
                                                    <input type="text" value="1" name="qtybutton"
                                                           class="cart-plus-minus-box">
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="social-icon socile-icon-style-1">
                                    <ul>
                                        <li>
                                            <button type="submit" data-tooltip="Thêm vào giỏ"
                                                    class="add-cart add-cart-text btn-addcart"
                                                    data-placement="left" tabindex="0">Thêm vào giỏ
                                                <i class="fa fa-cart-plus"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <a href="{{ url('wishlist', ['id' => $product->id]) }}"
                                               data-tooltip="Yêu thích" class="w-list" tabindex="0">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--single-protfolio-area are start-->

    <!--descripton-area start -->
    <div class="descripton-area">
        <div class="container">
            <div class="row">
                <div class="product-area tab-cars-style">
                    <div class="title-tab-product-category">
                        <div class="col-md-12 text-center">
                            <ul class="nav mb-40 heading-style-2" role="tablist">
                                <li role="presentation"><a href="#newarrival" aria-controls="newarrival" role="tab"
                                                           data-toggle="tab">Mô tả</a></li>
                                <li role="presentation" class="active"><a href="#bestsellr" aria-controls="bestsellr"
                                                                          role="tab" data-toggle="tab">Nhận xét</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div class="content-tab-product-category">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fix fade in" id="newarrival">
                                    <div class="review-wraper">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fix fade in active" id="bestsellr">
                                    <div class="review-wraper">
                                        <div class="comments-area fix mt-20">
                                            <div class="comments-body">
                                                <ul>
                                                    @foreach($comments as $comment)
                                                        <li class="signle-comments">
                                                            @if(empty($comment->customer_id))
                                                                <img width="64" height="64" src="images/blog/author.jpg" alt="">
                                                            @else
                                                                <img width="64" height="64" src="{{ asset('/uploads/users/' . $comment->users->avatar) }}" alt="">
                                                            @endif
                                                            <div class="commets-text">
                                                                <h5>{{ $comment->full_name }}</h5>
                                                                <span>{{ date('H:i, d/m/Y', strtotime($comment->created_at)) }}</span>
                                                                <p>{{ $comment->message }}</p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="leave-through-area clearfix mt-40">
                                            <div class="row">
                                                <form action="{{ url('product', $product->id) }}" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    @if(!Auth::check())
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
                                                    @endif
                                                    <div class="col-md-12">
                                                        <div class="input-box mb-20">
                                                    <textarea name="message" class="area-tex"
                                                              placeholder="Nội dung bình luận (*)"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="input-box text-center">
                                                            <input name="submit" class="sbumit-btn" value="Đăng"
                                                                   type="submit">
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                        {{--<div class="fb-comments" data-href="https://www.facebook.com/tuansneakers" data-numposts="5" data-width="100%"></div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--descripton-area end-->

    <!--new arrival area start-->
    <div class="new-arrival-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="heading-title heading-style pos-rltv mb-50 text-center">
                        <h5 class="uppercase">Hàng giảm giá</h5>
                    </div>
                </div>
                <div class="clearfix"></div>
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
                                        <a href=""> <img alt=""
                                                         src="{{ asset('/uploads/products/' . $saleProduct->image) }}"
                                                         class="primary-image"></a>
                                    </div>
                                    <div class="product-icon socile-icon-tooltip text-center">
                                        <ul>
                                            <li><a href="" data-tooltip="Mua hàng" class="add-cart"
                                                   data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                            <li><a href="{{ url('wishlist', ['id' => $saleProduct->id]) }}"
                                                   data-tooltip="Yêu thích" class="w-list"><i class="fa fa-heart-o"></i></a>
                                            </li>
                                            <li><a href="{{ url('product', ['id' => $saleProduct->id]) }}"
                                                   data-tooltip="Xem chi tiết" class="q-view" data-toggle="modal"
                                                   data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-text">
                                    <div class="prodcut-name"><a
                                                href="{{ url('product', ['id' => $saleProduct->id]) }}">{{ $saleProduct->name }}</a>
                                    </div>
                                    <div class="prodcut-ratting-price">
                                        <div class="prodcut-price">
                                            @if($saleProduct->discount > 0)
                                                <div class="new-price">
                                                    ${{ number_format($saleProduct->price*(100-$saleProduct->discount)/100, 0, '.', ',') }}
                                                </div>
                                                <div class="old-price">
                                                    <del>${{ number_format($saleProduct->price, 0, '.', ',') }}</del>
                                                </div>
                                            @else
                                                <div class="new-price">
                                                    ${{ number_format($saleProduct->price, 0, '.', ',') }}
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

@endsection
