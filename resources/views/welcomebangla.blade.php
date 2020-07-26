<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Commerce Welcome Page</title>
    <meta charset="utf-8">
    <meta name="description" content="Plus E-Commerce Template">
    <meta name="author" content="Diamant Gjota" />
    <meta name="keywords" content="plus, html5, css3, template, ecommerce, e-commerce, bootstrap, responsive, creative" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="src/common/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="src/common/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="src/common/css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="src/common/css/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" href="src/common/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="src/common/css/swiper.css" />

    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="src/common/css/default.css" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">

</head>
<body>

@include('frontend.english.partials.topbar')

@include('frontend.english.partials.middlebar')



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
                <li class="dropdown active"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Home<i class="fa fa-angle-down ml-5"></i></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="home-v1.html">Home - Version 1</a></li>
                        <li><a href="home-v2.html">Home - Version 2</a></li>
                        <li><a href="home-v3.html">Home - Version 3</a></li>
                        <li class="active"><a href="home-v4.html">Home - Version 4 <span class="label primary-background">1.1</span></a></li>
                        <li><a href="home-v5.html">Home - Version 5 <span class="label primary-background">1.1</span></a></li>
                        <li><a href="home-v6.html">Home - Version 6 <span class="label primary-background">1.2</span></a></li>
                        <li><a href="home-v7.html">Home - Version 7 <span class="label primary-background">1.3</span></a></li>
                    </ul><!-- end ul dropdown-menu -->
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
                                            <h6>Shop Pages</h6>
                                        </li>
                                        <li><a href="shop-sidebar-left.html">Sidebar Left</a></li>
                                        <li><a href="shop-sidebar-right.html">Sidebar Right</a></li>
                                        <li><a href="shop-filter-top.html">Filters Top</a></li>
                                        <li><a href="shop-full-width-sidebar-left.html">Full Width Sidebar Left</a></li>
                                        <li><a href="shop-full-width-sidebar-right.html">Full Width Sidebar Right</a></li>
                                        <li><a href="shop-full-width-filter-top.html">Full Width Filters Top</a></li>
                                        <li><a href="category.html">Category <span class="label primary-background">1.1</span></a></li>
                                        <li><a href="shop-single-product-v1.html">Single product</a></li>
                                        <li><a href="shop-single-product-v2.html">Single product <span class="label primary-background">1.3</span></a></li>
                                        <li class="title">
                                            <h6>Contact Pages</h6>
                                        </li>
                                        <li><a href="contact-v1.html">Contact Us Version 1</a></li>
                                        <li><a href="contact-v2.html">Contact Us Version 2</a></li>
                                    </ul><!-- end ul col -->
                                    <ul class="col-sm-3">
                                        <li class="title">
                                            <h6>About us Pages</h6>
                                        </li>
                                        <li><a href="about-us-v1.html">About Us Version 1</a></li>
                                        <li><a href="about-us-v2.html">About Us Version 2</a></li>
                                        <li><a href="about-us-v3.html">About Us Version 3</a></li>
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


            @include('frontend.english.partials.rightmenu',['categories'=>$categories, 'subcategories'=>$subcategories])
        </div><!-- end navbar collapse -->
    </div><!-- end container -->
</div><!-- end navbar -->

<!-- start section -->
<section class="section light-backgorund">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                @include('frontend.english.partials.leftmenu',['categories'=>$categories, 'subcategories'=>$subcategories])

                <hr class="spacer-20 no-border">

                <div class="widget hidden-xs">
                    <h6 class="subtitle text-uppercase">Bestsellers</h6>

                    <ul class="items">
                        <li>
                            <a href="shop-single-product-v1.html" class="product-image">
                                <img src="img/products/men_01.jpg" alt="Sample Product ">
                            </a>
                            <div class="product-details">
                                <p class="product-name">
                                    <a href="shop-single-product-v1.html">Printed Summer Dress</a>
                                </p>
                                <span class="price text-primary">$19.99</span>
                                <div class="rate text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </li><!-- end item -->
                        <li>
                            <a href="shop-single-product-v1.html" class="product-image">
                                <img src="img/products/women_02.jpg" alt="Sample Product ">
                            </a>
                            <div class="product-details">
                                <p class="product-name">
                                    <a href="shop-single-product-v1.html">Printed Summer Dress</a>
                                </p>
                                <span class="price text-primary">$29.99</span>
                                <div class="rate text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </li><!-- end item -->
                        <li>
                            <a href="shop-single-product-v1.html" class="product-image">
                                <img src="img/products/bags_06.jpg" alt="Sample Product ">
                            </a>
                            <div class="product-details">
                                <p class="product-name">
                                    <a href="shop-single-product-v1.html">Printed Summer Dress</a>
                                </p>
                                <span class="price text-primary">$15.99</span>
                                <div class="rate text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </li><!-- end item -->
                        <li>
                            <a href="shop-single-product-v1.html" class="product-image">
                                <img src="img/products/bags_01.jpg" alt="Sample Product ">
                            </a>
                            <div class="product-details">
                                <p class="product-name">
                                    <a href="shop-single-product-v1.html">Printed Summer Dress</a>
                                </p>
                                <span class="price text-primary">$45.99</span>
                                <div class="rate text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </li><!-- end item -->
                        <li>
                            <a href="shop-single-product-v1.html" class="product-image">
                                <img src="img/products/technology_03.jpg" alt="Sample Product ">
                            </a>
                            <div class="product-details">
                                <p class="product-name">
                                    <a href="shop-single-product-v1.html">Printed Summer Dress</a>
                                </p>
                                <span class="price text-primary">$45.99</span>
                                <div class="rate text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </li><!-- end item -->
                    </ul>
                </div><!-- end widget -->
            </div><!-- end col -->
            <div class="col-sm-8 col-md-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel slider owl-theme">
                            <div class="item">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="img/slider/slider_10.jpg" alt=""/>
                                    </a>
                                </figure>
                            </div><!-- end item -->
                            <div class="item">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="img/slider/slider_09.jpg" alt=""/>
                                    </a>
                                </figure>
                            </div><!-- end item -->
                            <div class="item">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="img/slider/slider_08.jpg" alt=""/>
                                    </a>
                                </figure>
                            </div><!-- end item -->
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-20 no-border">

                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="ml-5 mb-20 text-uppercase"><span class="text-primary">Newest</span> Products</h6>
                    </div><!-- end col -->
                    <div class="col-sm-12">
                        <div class="owl-carousel column-3 owl-theme">
                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/technology_03.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/technology_02.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                        <ul class="countdown-product">
                                            <li>
                                                <span class="days">00</span>
                                                <p>Days</p>
                                            </li>
                                            <li>
                                                <span class="hours">00</span>
                                                <p>Hours</p>
                                            </li>
                                            <li>
                                                <span class="minutes">00</span>
                                                <p>Mins</p>
                                            </li>
                                            <li>
                                                <span class="seconds">00</span>
                                                <p>Secs</p>
                                            </li>
                                        </ul><!-- end countdown -->
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge top left primary-background text-white semi-circle">Sale</span>
                                            <span class="product-badge top right text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img class="front" src="img/products/men_03.jpg" alt="">
                                                <img class="back" src="img/products/men_04.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/shoes_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge top right danger-background text-white semi-circle">-20%</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/women_03.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->


<!-- start section -->
{{--<section class="section dark-background">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-4">--}}
{{--<div class="icon-boxes style2 info-background">--}}
{{--<div class="icon">--}}
{{--<i class="fa fa-life-ring text-white"></i>--}}
{{--</div><!-- end icon -->--}}
{{--<div class="box-content">--}}
{{--<h6 class="alt-font text-white text-uppercase">Support 24/7</h6>--}}
{{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
{{--</div>--}}
{{--</div><!-- icon-box -->--}}
{{--</div><!-- end col -->--}}
{{--<div class="col-sm-4">--}}
{{--<div class="icon-boxes style2 warning-background">--}}
{{--<div class="icon">--}}
{{--<i class="fa fa-gift text-white"></i>--}}
{{--</div><!-- end icon -->--}}
{{--<div class="box-content">--}}
{{--<h6 class="alt-font text-white text-uppercase">Gift cards</h6>--}}
{{--<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
{{--</div>--}}
{{--</div><!-- icon-box -->--}}
{{--</div><!-- end col -->--}}
{{--<div class="col-sm-4">--}}
{{--<div class="icon-boxes style2 danger-background">--}}
{{--<div class="icon">--}}
{{--<i class="fa fa-credit-card text-white"></i>--}}
{{--</div><!-- end icon -->--}}
{{--<div class="box-content">--}}
{{--<h6 class="alt-font text-white text-uppercase">Payment 100% Secure</h6>--}}
{{--<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
{{--</div>--}}
{{--</div><!-- icon-box -->--}}
{{--</div><!-- end col -->--}}
{{--</div><!-- end row -->--}}
{{--</div><!-- end container -->--}}
{{--</section>--}}
<!-- end section -->


<!-- start section -->
<section class="section white-background">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs style1" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#featured" aria-controls="featured" role="tab" data-toggle="tab"><h6 class="text-uppercase">Featured</h6></a>
                    </li>
                    <li role="presentation">
                        <a href="#special" aria-controls="special" role="tab" data-toggle="tab"><h6 class="text-uppercase">Special</h6></a>
                    </li>
                    <li role="presentation">
                        <a href="#bestsellers" aria-controls="bestsellers" role="tab" data-toggle="tab"><h6 class="text-uppercase">Bestsellers</h6></a>
                    </li>
                </ul><!-- nav-tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="featured">
                        <div class="row column-4">
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge top left primary-background text-white semi-circle">Sale</span>
                                            <span class="product-badge top right text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img class="front" src="img/products/men_01.jpg" alt="">
                                                <img class="back" src="img/products/men_02.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge top right danger-background text-white semi-circle">-20%</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/women_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge bottom left warning-background text-white semi-circle">Out of Stock</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/bags_01.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge bottom right info-background text-white semi-circle">New</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/fashion_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/hoseholds_05.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/kids_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/shoes_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/technology_02.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end tab -->
                    <div role="tabpanel" class="tab-pane fade" id="special">
                        <div class="row column-4">
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge top left primary-background text-white semi-circle">Sale</span>
                                            <span class="product-badge top right text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img class="front" src="img/products/men_02.jpg" alt="">
                                                <img class="back" src="img/products/men_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge top right danger-background text-white semi-circle">-20%</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/women_04.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge bottom left warning-background text-white semi-circle">Out of Stock</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/bags_02.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge bottom right info-background text-white semi-circle">New</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/fashion_02.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/hoseholds_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/kids_02.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/shoes_02.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/technology_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end tab -->
                    <div role="tabpanel" class="tab-pane fade" id="bestsellers">
                        <div class="row column-4">
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge top left primary-background text-white semi-circle">Sale</span>
                                            <span class="product-badge top right text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img class="front" src="img/products/men_03.jpg" alt="">
                                                <img class="back" src="img/products/men_04.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge top right danger-background text-white semi-circle">-20%</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/women_03.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge bottom left warning-background text-white semi-circle">Out of Stock</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/bags_03.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge bottom right info-background text-white semi-circle">New</span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/fashion_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/hoseholds_03.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/kids_03.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/shoes_01.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="img/products/technology_03.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end tab -->
                </div><!-- end tab content -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-10 no-border"/>

        <div class="row">
            <div class="col-sm-6">
                <div class="box-banner-img">
                    <figure>
                        <a href="javascript:void(0);">
                            <img src="img/banners/banner_04.jpg" alt=""/>
                        </a>
                    </figure>
                </div><!-- end box-banner-img -->
            </div><!-- end col -->
            <div class="col-sm-6">
                <div class="box-banner-img">
                    <figure>
                        <a href="javascript:void(0);">
                            <img src="img/banners/banner_05.jpg" alt=""/>
                        </a>
                    </figure>
                </div><!-- end box-banner-img -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->


<!-- start section -->
<section class="primary-background">
    <div class="container">
        <div class="box-banner-wide primary-background">
            <div class="row">
                <div class="col-sm-4 vertical-align">
                    <h2 class="alt-font text-uppercase text-white">
                        Free <span class="regular">Delivery days!</span>
                    </h2>
                </div><!-- end col -->
                <div class="col-sm-4 vertical-align">
                    <p class="mt-20">Typi non habent claritatem insitam, est usus legentis in iis qui facit eorum claritatem.</p>
                </div><!-- end col -->
                <div class="col-sm-4 vertical-align text-right">
                    <a target="_blank" href="https://wrapbootstrap.com/theme/plus-responsive-e-commerce-template-WB0R2CN86" class="btn btn-light semi-circle btn-md">Purchase</a>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end box-banner-wide -->
    </div><!-- end container -->
</section>
<!-- end section -->

<!-- start section -->
<section>
    <div class="container">
        <!-- Modal Product Quick View -->
        <div class="modal fade productQuickView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5>Lorem ipsum dolar sit amet</h5>
                    </div><!-- end modal-header -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                                    <div class='carousel-inner'>
                                        <div class='item active'>
                                            <figure>
                                                <img src='img/products/men_01.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NrmMk1Myrxc"></iframe>
                                            </div>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <figure>
                                                <img src='img/products/men_03.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <figure>
                                                <img src='img/products/men_04.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <figure>
                                                <img src='img/products/men_05.jpg' alt=''/>
                                            </figure>
                                        </div><!-- end item -->

                                        <!-- Arrows -->
                                        <a class='left carousel-control' href='.product-slider' data-slide='prev'>
                                            <span class='fa fa-angle-left'></span>
                                        </a>
                                        <a class='right carousel-control' href='.product-slider' data-slide='next'>
                                            <span class='fa fa-angle-right'></span>
                                        </a>
                                    </div><!-- end carousel-inner -->

                                    <!-- thumbs -->
                                    <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                        <li data-target='.product-slider' data-slide-to='0' class='active'><img src='img/products/men_01.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='1'><img src='img/products/men_02.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='2'><img src='img/products/men_03.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='3'><img src='img/products/men_04.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='4'><img src='img/products/men_05.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='5'><img src='img/products/men_06.jpg' alt='' /></li>
                                    </ol><!-- end carousel-indicators -->
                                </div><!-- end carousel -->
                            </div><!-- end col -->
                            <div class="col-sm-7">
                                <p class="text-gray alt-font">Product code: 1032446</p>

                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star-half-o text-warning"></i>
                                <span>(12 reviews)</span>
                                <h4 class="text-primary">$79.00</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                <hr class="spacer-10">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="select">
                                            <option value="" selected>Color</option>
                                            <option value="red">Red</option>
                                            <option value="green">Green</option>
                                            <option value="blue">Blue</option>
                                        </select>
                                    </div><!-- end col -->
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="select">
                                            <option value="">Size</option>
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                            <option value="">XL</option>
                                            <option value="">XXL</option>
                                        </select>
                                    </div><!-- end col -->
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control" name="select">
                                            <option value="" selected>QTY</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                            <option value="">7</option>
                                        </select>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <hr class="spacer-10">
                                <ul class="list list-inline">
                                    <li><button type="button" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Add to Cart</button></li>
                                    <li><button type="button" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Add to Wishlist</button></li>
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end modal-body -->
                </div><!-- end modal-content -->
            </div><!-- end modal-dialog -->
        </div><!-- end productRewiew -->
    </div><!-- end container -->
</section>
<!-- end section -->

<!-- start section brands -->
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-wrap">
                    <h2 class="title lines">Our brands</h2>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->

        <div id="owl-demo" class="owl-carousel column-5 owl-theme">
            <div class="item">
                <figure class="zoom-out">
                    <img src="img/brands/brand_01.jpg" alt="">
                </figure>
            </div><!-- end item -->
            <div class="item">
                <figure class="zoom-out">
                    <img src="img/brands/brand_02.jpg" alt="">
                </figure>
            </div><!-- end item -->
            <div class="item">
                <figure class="zoom-out">
                    <img src="img/brands/brand_03.jpg" alt="">
                </figure>
            </div><!-- end item -->
            <div class="item">
                <figure class="zoom-out">
                    <img src="img/brands/brand_04.jpg" alt="">
                </figure>
            </div><!-- end item -->
            <div class="item">
                <figure class="zoom-out">
                    <img src="img/brands/brand_01.jpg" alt="">
                </figure>
            </div><!-- end item -->
            <div class="item">
                <figure class="zoom-out">
                    <img src="img/brands/brand_02.jpg" alt="">
                </figure>
            </div><!-- end item -->
            <div class="item">
                <figure class="zoom-out">
                    <img src="img/brands/brand_03.jpg" alt="">
                </figure>
            </div><!-- end item -->
            <div class="item">
                <figure class="zoom-out">
                    <img src="img/brands/brand_04.jpg" alt="">
                </figure>
            </div><!-- end item -->
        </div><!-- end owl carousel -->

        <hr class="spacer-50 no-border">

        <div class="row">
            <div class="col-sm-12">
                <div class="box-banner-wide light-backgorund">
                    <div class="row">
                        <div class="col-sm-8 vertical-align" style="width: 100%;">
                            <h4 class="alt-font text-uppercase text-dark"><span class="text-warning">Do You love us?</span> Purchase this theme!</h4>
                            <p>Typi non habent claritatem insitam, est usus legentis in iis qui facit eorum claritatem.</p>
                        </div><!-- end col -->
                        <div class="col-sm-4 vertical-align" style="width: 100%;">
                            <a href="#" class="btn btn-warning semi-circle btn-md">Purchase</a>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end box-banner-wide -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-50 no-border">

        <div class="row column-3">
            <div class="col-sm-6 col-md-4">
                <div class="icon-boxes style1">
                    <div class="icon">
                        <i class="fa fa-commenting-o text-warning"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="thin">Need Help?</h6>
                        <h5 class="text-warning">Use our chat!</h5>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-6 col-md-4">
                <div class="icon-boxes style1">
                    <div class="icon">
                        <i class="fa fa-phone text-info"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="thin">Quick question?</h6>
                        <h5 class="text-info">Call - 123 456 789!</h5>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-6 col-md-4">
                <div class="icon-boxes style1">
                    <div class="icon">
                        <i class="fa fa-envelope-o text-primary"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="thin">or send us e-mail</h6>
                        <h5 class="text-primary">Info@domain.net</h5>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->

@include('frontend.english.partials.footer')


<!-- JavaScript Files -->
<script type="text/javascript" src="src/common/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="src/common/js/bootstrap.min.js"></script>
<script type="text/javascript" src="src/common/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="src/common/js/jquery.downCount.js"></script>
<script type="text/javascript" src="src/common/js/nouislider.min.js"></script>
<script type="text/javascript" src="src/common/js/jquery.sticky.js"></script>
<script type="text/javascript" src="src/common/js/pace.min.js"></script>
<script type="text/javascript" src="src/common/js/star-rating.min.js"></script>
<script type="text/javascript" src="src/common/js/wow.min.js"></script>
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>--}}
{{--<script type="text/javascript" src="src/common/js/gmaps.js"></script>--}}
<script type="text/javascript" src="src/common/js/swiper.min.js"></script>
<script type="text/javascript" src="src/common/js/main.js"></script>

</body>
</html>