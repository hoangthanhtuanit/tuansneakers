@extends('layouts.index')
@section('title', 'Blog')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area breadcumb-2 overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Tin tức</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a href="{{ url('home') }}" title="Trang chủ">Trang chủ</a></li>
                <li class="active">Tin tức</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!--blog main area are start-->
    <div class="shop-main-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <!--shop sidebar start-->
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="shop-sidebar blog-sidebar">

                        <!--single aside start-->
                        <aside class="single-aside catagories-aside">
                            <div class="heading-title aside-title pos-rltv">
                                <h5 class="uppercase">Danh mục tin tức</h5>
                            </div>
                            <div class="product-cat" id="cat-treeview">
                                <ul>
                                    <li class="closed"><a>Giày nam (05)</a>
                                    </li>
                                    <li class="closed"><a>Giày nữ (10)</a>
                                    </li>
                                    <li class="closed"><a>Phụ kiện (07)</a>
                                    </li>
                                    <li class="closed"><a>Làm đẹp (06)</a>
                                    </li>
                                    <li class="closed"><a>Thể thao</a></li>
                                    <li class="closed"><a>Khác</a></li>
                                </ul>
                            </div>
                        </aside>
                        <!--single aside end-->

                        <!--single aside start-->
                        <aside class="single-aside tag-aside">
                            <div class="heading-title aside-title pos-rltv">
                                <h5 class="uppercase">Tags</h5>
                            </div>
                            <ul class="tag-filter mt-30">
                                <li><a>Fashion</a></li>
                                <li><a>Women</a></li>
                                <li><a>Winter</a></li>
                                <li><a>Street Style</a></li>
                                <li><a>Style</a></li>
                                <li><a>Shop</a></li>
                                <li><a>Collection</a></li>
                                <li><a>Spring 2016</a></li>
                            </ul>
                        </aside>
                        <!--single aside end-->

                        <!--single aside start-->
                        <aside class="single-aside product-aside">
                            <div class="heading-title aside-title pos-rltv">
                                <h5 class="uppercase">Sản phẩm bán chạy</h5>
                            </div>
                            <div class="recent-prodcut-wraper total-rectnt-slider">
                                <div class="single-rectnt-slider">
                                    <!-- single product start-->
                                    @foreach($hotProducts as $hotProduct)
                                    <!-- single product start-->
                                        <div class="single-product recent-single-product">
                                            <div class="product-img">
                                                <div class="single-prodcut-img pos-rltv">
                                                    <a href="{{ url('product', ['id' => $hotProduct->id]) }}"> <img alt="" class="primary-image"
                                                                                                                    src="{{ asset('/uploads/products/' . $hotProduct->image) }}">
                                                    </a>
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
                                @endforeach
                                    <!-- single product end-->
                                </div>
                            </div>

                        </aside>
                        <!--single aside end-->
                    </div>
                </div>
                <!--shop sidebar end-->

                <!--main-shop-product start-->
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="single-blog sb-2 mb-30">
                                    <div class="blog-img">
                                        <a href="{{ url('single-blog', $blog->id) }}"><img width="370" height="270" alt="" src="{{ asset('/uploads/blogs/' . $blog->image) }}"></a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-title">
                                            <h6 class="uppercase font-bold"><a href="{{ url('single-blog', $blog->id) }}">{{ $blog->title }}</a>
                                            </h6>
                                            <div class="like-comments-date">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>{{ $blog->liked }} Like
                                                    </li>
                                                    <li class="blog-date"><a><i class="zmdi zmdi-calendar-alt"></i>{{ date('d/m/Y', strtotime($blog->created_at)) }}</a></li>
                                                </ul>
                                            </div>
                                            <a class="read-more montserrat" href="{{ url('single-blog', $blog->id) }}">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="pagination-btn text-center">
                                    <ul class="page-numbers">
                                        <li>
                                            {{ $blogs->links() }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <!--main-shop-product start-->
            </div>
        </div>
    </div>
    <!--blog main area are end-->

@endsection
