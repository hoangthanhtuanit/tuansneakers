<header class="header-area header-wrapper">
    <div class="header-top-bar black-bg clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="login-register-area">
                        @if(Auth::check())
                            <ul>
                                <li><a href="{{ url('my-account') }}">Chào, {{ Auth::user()->full_name }}</a></li>
                                <li><a href="{{ url('logout') }}">Đăng xuất</a></li>
                            </ul>
                        @else
                            <ul>
                                <li><a href="{{ url('login') }}">Đăng nhập</a></li>
                                <li><a href="{{ url('register') }}">Đăng ký</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 hidden-xs">
                    <div class="social-search-area text-center">
                        <div class="social-icon socile-icon-style-2">
                            <ul>
                                <li><a href="https://www.facebook.com/tuansneakers" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a title="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a title="dribble"><i class="fa fa-dribbble"></i></a></li>
                                <li><a title="behance"><i class="fa fa-behance"></i></a></li>
                                <li><a title="rss"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="cart-currency-area login-register-area text-right">
                        <ul>
                            <li>
                                <div class="header-cart">
                                    <div class="cart-icon"><a href="{{ url('cart') }}">Giỏ<i
                                                    class="zmdi zmdi-shopping-cart"></i></a> <span>{{ count(Cart::content()) }}</span></div>
                                    <div class="cart-content-wraper">
                                        @if(count(Cart::content()) > 0)
                                            @foreach(Cart::content() as $cart_item)
                                                <div class="cart-single-wraper">
                                                    <div class="cart-img">
                                                        <a><img src="{{ asset('uploads/products/' . $cart_item->options['img']) }}" alt=""></a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <div class="cart-name"><a>{{ $cart_item->name }}</a></div>
                                                        <div class="cart-price">${{ number_format($cart_item->price, 0, '.', ',') }}</div>
                                                        <div class="cart-qty"> Qty: <span>{{ $cart_item->qty }}</span></div>
                                                    </div>
                                                    <div class="remove"><a href="{{ url('remove-cart', ['id' => $cart_item->rowId]) }}"><i class="zmdi zmdi-close"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="cart-subtotal"> Tổng tiền: <span>${{ Cart::total(0, 3) }}</span></div>
                                            <div class="cart-check-btn">
                                                <div class="view-cart"><a class="btn-def" href="{{ url('cart') }}">Giỏ hàng</a>
                                                </div>
                                                <div class="check-btn"><a class="btn-def"
                                                                          href="{{ url('checkout') }}">Thanh toán</a></div>
                                            </div>
                                        @else
                                            <div class="cart-single-wraper">
                                                <div class="cart-img"></div>
                                                <h6 class="text-center">(*)Không có sản phẩm nào trong giỏ hàng.</h6>
                                                <div class="cart-content">
                                                    <div class="cart-name"></div>
                                                    <div class="cart-price"></div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="header-middle-area">
        <div class="container">
            <div class="full-width-mega-dropdown">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <div class="logo ptb-20"><a href="{{ url('home') }}">
                                <img src="images/logo/logo.png" alt="main logo"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-10 hidden-xs">
                        <nav id="primary-menu">
                            <ul class="main-menu">
                                @php
                                    $homez = Request::is('home') ? 'current' : '';
                                    $homea = Request::is('home') ? 'active' : '';
                                    $shopz = Request::is('shop') ? 'current' : '';
                                    $shopa = Request::is('shop') ? 'active' : '';
                                    $categoryz = Request::is('category/*') ? 'current' : '';
                                    $categorya = Request::is('category/*') ? 'active' : '';
                                    $blogz = Request::is('blog') ? 'current' : '';
                                    $bloga = Request::is('blog') ? 'active' : '';
                                    $aboutz = Request::is('about-us') ? 'current' : '';
                                    $abouta = Request::is('about-us') ? 'active' : '';
                                    $contactz = Request::is('contact') ? 'current' : '';
                                    $contacta = Request::is('contact') ? 'active' : '';
                                @endphp
                                <li class="{{ $homez }}"><a class="{{ $homea }}" href="{{ url('home') }}">Trang chủ</a></li>
                                <li class="mega-parent {{ $shopz }} {{ $categoryz }}"><a class="{{ $categorya }} {{ $shopa }}" href="{{ url('shop') }}">Sản phẩm</a>
                                    <div class="mega-menu-area mma-0">
                                        <ul class="single-mega-item coloum-3">
                                            <li class="menu-title uppercase">Giày Sneaker</li>
                                            @foreach($categories as $category)
                                                <li><a href="{{ url('category', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="{{ $blogz }}"><a class="{{ $bloga }}" href="{{ url('blog') }}">Blog</a></li>
                                <li class="{{ $aboutz }}"><a class="{{ $abouta }}" href="{{ url('about-us') }}">Về chúng tôi</a></li>
                                <li class="{{ $contactz }}"><a class="{{ $contacta }}" href="{{ url('contact') }}">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <div class="search-box global-table">
                            <div class="global-row">
                                <div class="global-cell">
                                    <form action="{{ url('search') }}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="input-box">
                                            <input class="single-input" placeholder="Tìm kiếm" name="key" type="text">
                                            <button class="src-btn"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- mobile-menu-area start -->
                    <div class="mobile-menu-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <nav id="dropdown">
                                        <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="shop.html">Man</a>
                                                <ul class="single-mega-item">
                                                    <li><a href="shop.html">Shirt 01</a></li>
                                                    <li><a href="shop.html">Shirt 02</a></li>
                                                    <li><a href="shop.html">Shirt 03</a></li>
                                                    <li><a href="shop.html">Shirt 04</a></li>
                                                    <li><a href="shop.html">Pant 01</a></li>
                                                    <li><a href="shop.html">Pant 02</a></li>
                                                    <li><a href="shop.html">Pant 03</a></li>
                                                    <li><a href="shop.html">Pant 04</a></li>
                                                    <li><a href="shop.html">T-Shirt 01</a></li>
                                                    <li><a href="shop.html">T-Shirt 02</a></li>
                                                    <li><a href="shop.html">T-Shirt 03</a></li>
                                                    <li><a href="shop.html">T-Shirt 04</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Shop</a>
                                                <ul class="single-mega-item">
                                                    <li><a href="shop.html">Sharee 01</a></li>
                                                    <li><a href="shop.html">Sharee 02</a></li>
                                                    <li><a href="shop.html">Sharee 03</a></li>
                                                    <li><a href="shop.html">Sharee 04</a></li>
                                                    <li><a href="shop.html">Sharee 05</a></li>
                                                    <li><a href="shop.html">Lahenga 01</a></li>
                                                    <li><a href="shop.html">Lahenga 02</a></li>
                                                    <li><a href="shop.html">Lahenga 03</a></li>
                                                    <li><a href="shop.html">Lahenga 04</a></li>
                                                    <li><a href="shop.html">Lahenga 05</a></li>
                                                    <li><a href="shop.html">Sandel 01</a></li>
                                                    <li><a href="shop.html">Sandel 02</a></li>
                                                    <li><a href="shop.html">Sandel 03</a></li>
                                                    <li><a href="shop.html">Sandel 04</a></li>
                                                    <li><a href="shop.html">Sandel 05</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a>
                                                <ul class="single-mega-item coloum-4">
                                                    <li><a href="about-us.html" target="_blank">About-us</a></li>
                                                    <li><a href="blog.html" target="_blank">Blog</a></li>
                                                    <li><a href="blog-right.html" target="_blank">Blog-Right</a>
                                                    </li>
                                                    <li><a href="single-blog.html" target="_blank">Single Blog</a>
                                                    </li>
                                                    <li class="menu-title uppercase">pages-02</li>
                                                    <li><a href="cart.html" target="_blank">Cart</a></li>
                                                    <li><a href="checkout.html" target="_blank">Checkout</a></li>
                                                    <li><a href="compare.html" target="_blank">Compare</a></li>
                                                    <li><a href="complete-order.html" target="_blank">Complete
                                                            Order</a></li>
                                                    <li><a href="contact-us.html" target="_blank">Contact US</a>
                                                    </li>
                                                    <li class="menu-title uppercase">pages-03</li>
                                                    <li><a href="login.html" target="_blank">Login</a></li>
                                                    <li><a href="my-account.html" target="_blank">My Account</a>
                                                    </li>
                                                    <li class="menu-title uppercase">pages-03</li>
                                                    <li><a href="shop.html" target="_blank">Shop</a></li>
                                                    <li><a href="single-product.html" target="_blank">Single
                                                            Prodcut</a></li>
                                                    <li><a href="wishlist.html" target="_blank">Wishlist</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="about-us.html">about</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--mobile menu area end-->
                </div>
            </div>
        </div>
    </div>
</header>
