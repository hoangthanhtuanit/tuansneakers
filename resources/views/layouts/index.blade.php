<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/icons/favicon.ico">
    <!-- Place favicon.ico in the root directory -->
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link href="css/toastr.css" rel="stylesheet"/>
    <!-- Theme main style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="css/style-customizer.css">
    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    @if(Session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{ session('toastr.type') }}";
            var MESSAGE = "{{ session('toastr.message') }}";
        </script>
    @endif
</head>

<body>
<!-- Body main wrapper start -->
<div class="wrapper home-one">

    <!-- Start of header area -->
    @include('layouts.header')
    <!-- End of header area -->

    @yield('content')

    @include('layouts.footer')


    <!-- QUICKVIEW PRODUCT -->
        <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <div class="product-images">
                                <!--modal tab start-->
                                <div class="portfolio-thumbnil-area-2">
                                    <div class="tab-content active-portfolio-area-2">
                                        <div role="tabpanel" class="tab-pane active" id="view1">
                                            <div class="product-img">
                                                <a href="#"><img src="images/product/01.jpg"
                                                                 alt="Single portfolio"/></a>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="view2">
                                            <div class="product-img">
                                                <a href="#"><img src="images/product/02.jpg"
                                                                 alt="Single portfolio"/></a>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="view3">
                                            <div class="product-img">
                                                <a href="#"><img src="images/product/03.jpg"
                                                                 alt="Single portfolio"/></a>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="view4">
                                            <div class="product-img">
                                                <a href="#"><img src="images/product/04.jpg"
                                                                 alt="Single portfolio"/></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-more-views-2">
                                        <div class="thumbnail-carousel-modal-2" data-tabs="tabs">
                                            <a href="#view1" aria-controls="view1" data-toggle="tab"><img
                                                    src="images/product/01.jpg" alt=""/></a>
                                            <a href="#view2" aria-controls="view2" data-toggle="tab"><img
                                                    src="images/product/02.jpg" alt=""/></a>
                                            <a href="#view3" aria-controls="view3" data-toggle="tab"><img
                                                    src="images/product/03.jpg" alt=""/></a>
                                            <a href="#view4" aria-controls="view4" data-toggle="tab"><img
                                                    src="images/product/04.jpg" alt=""/></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--modal tab end-->
                            <!-- .product-images -->
                            <div class="product-info">
                                <h1>Aenean eu tristique</h1>
                                <div class="price-box-3">
                                    <div class="s-price-box"><span class="new-price">$160.00</span> <span
                                            class="old-price">$190.00</span></div>
                                </div>
                                <a href="shop.html" class="see-all">See all features</a>
                                <div class="quick-add-to-cart">
                                    <form method="post" class="cart">
                                        <div class="numbers-row">
                                            <input type="number" id="french-hens" value="3" min="1"></div>
                                        <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="quick-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                    fringilla augue nec est tristique auctor. Donec non est at libero.Lorem ipsum dolor
                                    sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.
                                    Donec non est at libero.Nam fringilla tristique auctor.
                                </div>
                                <div class="social-sharing-modal">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons-modal">
                                            <li><a target="_blank" title="Facebook" href="#"
                                                   class="facebook m-single-icon"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a target="_blank" title="Twitter" href="#"
                                                   class="twitter m-single-icon"><i class="fa fa-twitter"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#"
                                                   class="pinterest m-single-icon"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li><a target="_blank" title="Google +" href="#"
                                                   class="gplus m-single-icon"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li><a target="_blank" title="LinkedIn" href="#"
                                                   class="linkedin m-single-icon"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- .product-info -->
                        </div>
                        <!-- .modal-product -->
                    </div>
                    <!-- .modal-body -->
                </div>
                <!-- .modal-content -->
            </div>
            <!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<!-- Bootstrap framework js -->
<script src="js/bootstrap.min.js"></script>
<!-- Slider js -->
<script src="js/slider/jquery.nivo.slider.pack.js"></script>
<script src="js/slider/nivo-active.js"></script>
<!-- counterUp-->
<script src="js/jquery.countdown.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="js/plugins.js"></script>
<script src="js/toastr.min.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="dbzAAkpN"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="js/main.js"></script>
@yield('script')
<script type="text/javascript">
    if (typeof TYPE_MESSAGE != "undefined") {
        switch (TYPE_MESSAGE) {
            case 'success':
                toastr.success(MESSAGE);
                break;
            case 'error':
                toastr.error(MESSAGE);
                break;
        }
    }
</script>
</body>
</html>
