@extends('layouts.index')
@section('title', 'Chi tiết tin tức')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area breadcumb-2 overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Chi tiết bản tin</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a href="{{ url('home') }}" title="Trang chủ">Trang chủ</a></li>
                <li class="active">Chi tiết bản tin</li>
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
                                </div>
                            </div>

                        </aside>
                        <!--single aside end-->
                    </div>
                </div>
                <!--shop sidebar end-->

                <!--main-shop-product start-->
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="single-blog-body">
                        <div class="single-blog sb-2 mb-30">
                            <div class="blog-img pos-rltv">
                                <img src="{{ asset('/uploads/blogs/' . $blog->image) }}" width="570" height="450" alt="">
                            </div>
                            <div class="blog-content">
                                <div class="blog-title">
                                    <h5 class="uppercase font-bold">{{ $blog->title }}</h5>
                                    <div class="like-comments-date">
                                        <ul>
                                            <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>{{ $blog->liked }} Thích</li>
                                            </li>
                                            <li class="blog-date"><a><i class="zmdi zmdi-calendar-alt"></i>{{ date('d/m/Y', strtotime($blog->created_at)) }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog-text">
                                        {!! $blog->summary !!}
                                    </div>
                                </div>
                                <div class="related-post mt-30">
                                    <h5 class="uppercase sb-title">Tin tức liên quan</h5>
                                    <div class="row">
                                        <div class="total-blog-3">
                                            @foreach($relatedBlogs as $relatedBlog)
                                                <div class="col-md-4">
                                                <div class="single-blog">
                                                    <div class="blog-img pos-rltv product-overlay">
                                                        <a href="#"><img width="370" height="270" src="{{ asset('/uploads/blogs/' . $relatedBlog->image) }}" alt=""></a>
                                                    </div>
                                                    <div class="blog-content">
                                                        <div class="blog-title">
                                                            <h5 class="uppercase font-bold"><a href="{{ url('single-blog', $relatedBlog->id) }}">{{ $relatedBlog->title }}</a></h5>
                                                            <div class="like-comments-date">
                                                                <ul>
                                                                    <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>{{ $relatedBlog->liked }} Thích</li>
                                                                    <li class="blog-date"><a><i
                                                                                    class="zmdi zmdi-calendar-alt"></i>{{ date('d/m/Y', strtotime($relatedBlog->created_at)) }}</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-area fix mt-20">
                                    <h5 class="uppercase sb-title">Bình luận</h5>
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
                                        <form action="{{ url('single-blog', $blog->id) }}" method="post">
                                            <div class="col-md-7">
                                                @include('layouts.error')
                                            </div>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            @if(!Auth::check())
                                                <div class="col-md-7">
                                                    <div class="input-box mb-20">
                                                        <input name="full_name" class="info" placeholder="Họ tên (*)" type="text">
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-7">
                                                <div class="input-box mb-20">
                                                    <textarea rows="5" name="message" class="area-tex"
                                                              placeholder="Nội dung bình luận (*)"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <div class="input-box text-right">
                                                    <input name="submit" class="sbumit-btn" value="Đăng"
                                                           type="submit">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--main-shop-product start-->
                </div>
                <!--main-shop-product start-->
            </div>
        </div>
    </div>
    <!--blog main area are end-->

@endsection

