@extends('layouts.index')
@section('title', 'Danh mục sản phẩm')

@section('content')

    <!--breadcumb area start -->
    <div class="breadcumb-area breadcumb-2 overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Danh mục sản phẩm</h5></div>
            <ol class="breadcrumb">
                <li class="home"><a title="Trang chủ" href="{{ url('home') }}">Trang chủ</a></li>
                <li class="active">Sản phẩm</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!--shop main area are start-->
    <div class="shop-main-area ptb-70">
        <div class="container">
            <div class="row">
                <!--shop sidebar start-->
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="row">
                        <div class="shop-sidebar">
                            <!--single aside start-->
                            <aside class="single-aside search-aside search-box">
                                <form action="#">
                                    <div class="input-box">
                                        <input class="single-input" placeholder="Tìm kiếm..." type="text">
                                        <button type="submit" class="src-btn sb-2"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </aside>
                            <!--single aside end-->

                            <!--single aside start-->
                            <aside class="single-aside catagories-aside">
                                <div class="heading-title aside-title pos-rltv">
                                    <h5 class="uppercase">Danh mục sản phẩm</h5>
                                </div>
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                        @foreach($categories as $key => $category)
                                            <li class="closed"><a
                                                        href="{{ url('category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                            <!--single aside end-->
                        </div>
                    </div>
                </div>
                <!--shop sidebar end-->

                <!--main-shop-product start-->
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="shop-wraper">
                        <div class="col-xs-12">
                            <div class="shop-area-top">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="sort product-type pull-right">
                                            @php
                                                $vdefault = Request::get('sort') == 'default' ? 'selected' : '';
                                                $v1 = Request::get('sort') == 1 ? 'selected' : '';
                                                $v2 = Request::get('sort') == 2 ? 'selected' : '';
                                                $v3 = Request::get('sort') == 3 ? 'selected' : '';
                                                $v4 = Request::get('sort') == 4 ? 'selected' : '';
                                            @endphp
                                            @foreach($categories as $category)
                                                <form action="{{ url('category', [$category->id]) }}" id="form-sort"
                                                      method="get">
                                                    @endforeach
                                                    <label>Sắp xếp</label>
                                                    <select class="input-sort" name="sort">
                                                        <option value="default" {{ $vdefault }}>Mặc định</option>
                                                        <option value="1" {{ $v1 }}>Tên (A - Z)</option>
                                                        <option value="2" {{ $v2 }}>Tên (Z - A)</option>
                                                        <option value="3" {{ $v3 }}>Giá (Thấp &gt; Cao)</option>
                                                        <option value="4" {{ $v4 }}>Giá (Cao &gt; Thấp)</option>
                                                    </select>
                                                </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 hidden-md hidden-sm hidden-xs">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="shop-total-product-area clearfix mt-35">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--tab grid are start-->
                                <div role="tabpanel" class="tab-pane fade in active" id="grid">
                                    <div class="total-shop-product-grid">
                                        @foreach($products as $product)
                                            <div class="col-md-4 col-sm-6 item">
                                                <!-- single product start-->
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        @if($product->discount > 0)
                                                            <div class="product-label red">
                                                                <div class="new">Sale</div>
                                                            </div>
                                                        @endif
                                                        <div class="single-prodcut-img  product-overlay pos-rltv">
                                                            <a href="{{ url('product', ['id' => $product->id]) }}"> <img
                                                                        alt=""
                                                                        src="{{ asset('/uploads/products/' . $product->image) }}"
                                                                        class="primary-image"></a>
                                                        </div>
                                                        <div class="product-icon socile-icon-tooltip text-center">
                                                            <ul>
                                                                <li><a href="#" data-tooltip="Thêm vào giỏ"
                                                                       class="add-cart" data-placement="left"><i
                                                                                class="fa fa-cart-plus"></i></a></li>
                                                                <li>
                                                                    <a href="{{ url('wishlist', ['id' => $product->id]) }}"
                                                                       data-tooltip="Yêu thích" class="w-list"><i
                                                                                class="fa fa-heart-o"></i></a></li>
                                                                <li>
                                                                    <a href="{{ url('product', ['id' => $product->id]) }}"
                                                                       data-tooltip="Xem chi tiết" class="q-view"><i
                                                                                class="fa fa-eye"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-text">
                                                        <div class="prodcut-name">
                                                            <a href="{{ url('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                        </div>
                                                        <div class="prodcut-ratting-price">
                                                            <div class="prodcut-price">
                                                                @if($product->discount > 0)
                                                                    <div class="new-price">
                                                                        ${{ number_format($product->price*(100-$product->discount)/100, 0, '.', ',') }}
                                                                    </div>
                                                                    <div class="old-price">
                                                                        <del>
                                                                            ${{ number_format($product->price, 0, '.', ',') }}</del>
                                                                    </div>
                                                                @else
                                                                    <div class="new-price">
                                                                        ${{ number_format($product->price, 0, '.', ',') }}
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
                                <!--shop grid are end-->

                                <!--shop product list start-->
                                <!--shop product list end-->
                                <!--pagination start-->
                                @if(!empty($products->links()))
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="pagination-btn text-center">
                                            <ul class="page-numbers">
                                                <li>
                                                    {{ $products->links() }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            @endif
                            <!--pagination end-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--main-shop-product start-->
            </div>
        </div>
    </div>
    <!--shop main area are end-->

@endsection

@section('script')

    <script>
        $(function () {
            $('.input-sort').change(function () {
                $('#form-sort').submit();
            });
        });
    </script>

@endsection