<!-- start navbar -->
<div class="navbar yamm navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-3" class="navbar-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="javascript:void(0);" class="navbar-brand visible-xs">
                <img src="img/logo.png" alt="logo">
            </a>
        </div>
        <div id="navbar-collapse-3" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!-- Home -->
                {{--<li class="dropdown active"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Home<i class="fa fa-angle-down ml-5"></i></a>--}}
                <li><a href="{!! route('home') !!}">Home</a></li>
                </li><!-- end li dropdown -->
                <!-- Features -->
                <li class="dropdown left"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Features<i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="headers.html">Headers</a></li>
                        <li><a href="footers.html">Footers</a></li>
                        <li><a href="sliders.html">Sliders</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="grid.html">Grid</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Dropdown Level 1</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Dropdown Level</a></li>
                                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Dropdown Level 2</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Dropdown Level</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- end ul dropdown-menu -->
                </li><!-- end li dropdown -->
                <!-- Pages -->
                <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages<i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- Content container to add padding -->
                            <div class="yamm-content">
                                <div class="row">
                                    <ul class="col-sm-3">
                                        <li class="title">
                                            <h6>Contact Pages</h6>
                                        </li>
                                        <li><a href="display.contactus.index">Contact Us</a></li>
                                    </ul><!-- end ul col -->
                                    <ul class="col-sm-3">
                                        <li class="title">
                                            <h6>About us Pages</h6>
                                        </li>
                                        <li><a href="display.aboutus.index">About Us</a></li>
                                        <li class="title">
                                            <h6>Blog Pages</h6>
                                        </li>
                                        <li><a href="blog-v1.html">Blog Version 1</a></li>
                                        <li><a href="blog-v2.html">Blog Version 2</a></li>
                                        <li><a href="blog-v3.html">Blog Version 3</a></li>
                                        <li><a href="blog-article-v1.html">Blog article</a></li>
                                    </ul><!-- end ul col -->
                                    <ul class="col-sm-3">
                                        <li class="title">
                                            <h6>User account</h6>
                                        </li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="login-register.html">Login or Register</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="user-information.html">User Information</a></li>
                                        <li><a href="order-list.html">Order List</a></li>
                                        <li><a href="order-confirmation.html">Order Confirmation <span class="label primary-background">1.1</span></a></li>
                                        <li><a href="forgot-password.html">Forgot Password</a></li>
                                    </ul><!-- end ul col -->
                                    <ul class="col-sm-3">
                                        <li class="title">
                                            <h6>Other Pages</h6>
                                        </li>
                                        <li><a href="help.html">Help</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="blank-page.html">Blank Page <span class="label primary-background">1.1</span></a></li>
                                        <li><a href="404-error.html">404 Error</a></li>
                                        <li><a href="500-error.html">500 Error</a></li>
                                        <li><a href="coming-soon.html">Coming soon</a></li>
                                        <li><a href="subscribe.html">Subscribe</a></li>
                                    </ul><!-- end ul col -->
                                </div><!-- end row -->
                            </div><!-- end yamn-content -->
                        </li><!-- end li -->
                    </ul><!-- end ul dropdown-menu -->
                </li><!-- end li dropdown -->
                <!-- elements -->
                <li><a href="elements.html">Elements</a></li>
                <!-- Collections -->
                <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Collections<i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3">
                                        <a href="javascript:void(0);">
                                            <figure class="zoom-out">
                                                <img alt="" src="img/banners/collection_01.JPG">
                                            </figure>
                                        </a>
                                    </div><!-- end col -->
                                    <div class="col-xs-12 col-sm-3">
                                        <a href="javascript:void(0);">
                                            <figure class="zoom-in">
                                                <img alt="" src="img/banners/collection_02.JPG">
                                            </figure>
                                        </a>
                                    </div><!-- end col -->
                                    <div class="col-xs-12 col-sm-3">
                                        <a href="javascript:void(0);">
                                            <figure class="zoom-out">
                                                <img alt="" src="img/banners/collection_03.JPG">
                                            </figure>
                                        </a>
                                    </div><!-- end col -->
                                    <div class="col-xs-12 col-sm-3">
                                        <a href="javascript:void(0);">
                                            <figure class="zoom-in">
                                                <img alt="" src="img/banners/collection_04.JPG">
                                            </figure>
                                        </a>
                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <hr class="spacer-20 no-border">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-3">
                                        <h6>Pellentes que nec diam lectus</h6>
                                        <p>Proin pulvinar libero quis auctor pharet ra. Aenean fermentum met us orci, sedf eugiat augue pulvina r vitae. Nulla dolor nisl, molestie nec aliquam vitae, gravida sodals dolor...</p>
                                        <button type="button" class="btn btn-default round btn-md">Read more</button>
                                    </div><!-- end col -->
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="thumbnail store style1">
                                            <div class="header">
                                                <div class="badges">
                                                    <span class="product-badge top left white-backgorund text-primary semi-circle">Sale</span>
                                                    <span class="product-badge top right text-primary">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </span>
                                                </div>
                                                <figure class="layer">
                                                    <img src="img/products/men_01.jpg" alt="">
                                                </figure>
                                                <div class="icons">
                                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                                    <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                                <div class="price">
                                                    <small class="amount off">$68.99</small>
                                                    <span class="amount text-primary">$59.99</span>
                                                </div>
                                                <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                            </div><!-- end caption -->
                                        </div><!-- end thumbnail -->
                                    </div><!-- end col -->
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="thumbnail store style1">
                                            <div class="header">
                                                <div class="badges">
                                                    <span class="product-badge top left white-backgorund text-primary semi-circle">Sale</span>
                                                    <span class="product-badge top right text-primary">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </span>
                                                </div>
                                                <figure class="layer">
                                                    <img src="img/products/women_01.jpg" alt="">
                                                </figure>
                                                <div class="icons">
                                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                                    <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                                <div class="price">
                                                    <small class="amount off">$68.99</small>
                                                    <span class="amount text-primary">$59.99</span>
                                                </div>
                                                <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                            </div><!-- end caption -->
                                        </div><!-- end thumbnail -->
                                    </div><!-- end col -->
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="thumbnail store style1">
                                            <div class="header">
                                                <div class="badges">
                                                    <span class="product-badge top left white-backgorund text-primary semi-circle">Sale</span>
                                                    <span class="product-badge top right text-primary">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </span>
                                                </div>
                                                <figure class="layer">
                                                    <img src="img/products/kids_01.jpg" alt="">
                                                </figure>
                                                <div class="icons">
                                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                                    <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                                <div class="price">
                                                    <small class="amount off">$68.99</small>
                                                    <span class="amount text-primary">$59.99</span>
                                                </div>
                                                <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                            </div><!-- end caption -->
                                        </div><!-- end thumbnail -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end yamm-content -->
                        </li><!-- end li -->
                    </ul><!-- end dropdown-menu -->
                </li><!-- end dropdown -->
            </ul><!-- end navbar-nav -->


            {{--@include('frontend.english.partials.rightmenu',['categories'=>$categories, 'subcategories'=>$subcategories])--}}
        </div><!-- end navbar collapse -->
    </div><!-- end container -->
</div><!-- end navbar -->