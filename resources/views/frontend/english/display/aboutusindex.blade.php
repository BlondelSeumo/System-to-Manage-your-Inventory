<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plus - E-Commerce Template</title>
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

@include('frontend.english.partials.topbarwhite')

@include('frontend.english.partials.sectionnavbar')

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><a href="{!! route('home') !!}">Home</a></li>
                    <li class="active">About Us</li>
                </ul><!-- end breadcrumb -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end breadcrumbs -->

<!-- start section -->
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="title-wrap">
                    <h2 class="title lines">About Us</h2>
                    <p class="lead">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-sm-4">
                <figure>
                    <img src="img/blog/blog_01.jpg" alt="" />
                </figure>
                <h5>Lorem ipsum dolor sit</h5>
                <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            </div><!-- end col -->
            <div class="col-sm-4">
                <figure>
                    <img src="img/blog/blog_02.jpg" alt="" />
                </figure>
                <h5>Consectetur adipiscing</h5>
                <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            </div><!-- end col -->
            <div class="col-sm-4">
                <figure>
                    <img src="img/blog/blog_03.jpg" alt="" />
                </figure>
                <h5>Lorem ipsum dolor sit</h5>
                <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-100">

        <div class="row">
            <div class="col-sm-12">
                <h4 class="mb-20">Our Store Locations</h4>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row column-4">
            <div class="col-sm-6 col-md-3">
                <div class="icon-boxes style2 light-backgorund">
                    <div class="box-content text-left">
                        <h6 class="alt-font">Istanbul</h6>
                        <p>
                            77 Mass. Ave., E14/E15
                            <br>
                            Seattle, MA 02139-4307 USA
                        </p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-6 col-md-3">
                <div class="icon-boxes style2 light-backgorund">
                    <div class="box-content text-left">
                        <h6 class="alt-font">New York</h6>
                        <p>
                            77 Mass. Ave., E14/E15
                            <br>
                            Seattle, MA 02139-4307 USA
                        </p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-6 col-md-3">
                <div class="icon-boxes style2 light-backgorund">
                    <div class="box-content text-left">
                        <h6 class="alt-font">London</h6>
                        <p>
                            77 Mass. Ave., E14/E15
                            <br>
                            Seattle, MA 02139-4307 USA
                        </p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-6 col-md-3">
                <div class="icon-boxes style2 light-backgorund">
                    <div class="box-content text-left">
                        <h6 class="alt-font">Paris</h6>
                        <p>
                            77 Mass. Ave., E14/E15
                            <br>
                            Seattle, MA 02139-4307 USA
                        </p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->

<!-- start section -->
<section class="section image-background layer-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-8 col-sm-offset-2">
                <p class="lead text-dark">If you have any questions or concerns, please send us a message, and we'll get you an answare as soon as posible</p>
                <a href="display.contactus.index" class="btn btn-default semi-circle btn-md"><i class="fa fa-envelope mr-5"></i> Send a message</a>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->

<!-- start footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="icon-boxes style1">
                    <div class="icon">
                        <i class="fa fa-truck text-gray"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="alt-font text-light text-uppercase">Free Shipping</h6>
                        <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-3">
                <div class="icon-boxes style1">
                    <div class="icon">
                        <i class="fa fa-life-ring text-gray"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="alt-font text-light text-uppercase">Support 24/7</h6>
                        <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-3">
                <div class="icon-boxes style1">
                    <div class="icon">
                        <i class="fa fa-gift text-gray"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="alt-font text-light text-uppercase">Gift cards</h6>
                        <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-3">
                <div class="icon-boxes style1">
                    <div class="icon">
                        <i class="fa fa-credit-card text-gray"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="alt-font text-light text-uppercase">Payment 100% Secure</h6>
                        <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-30">

        <div class="row">
            <div class="col-sm-3">
                <h5 class="title">Plus</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit, libero a molestie consectetur, sapien elit lacinia mi.</p>

                <hr class="spacer-10 no-border">

                <ul class="social-icons">
                    <li class="facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                    <li class="dribbble"><a href="javascript:void(0);"><i class="fa fa-dribbble"></i></a></li>
                    <li class="linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                    <li class="youtube"><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a></li>
                    <li class="behance"><a href="javascript:void(0);"><i class="fa fa-behance"></i></a></li>
                </ul>
            </div><!-- end col -->
            <div class="col-sm-3">
                <h5 class="title">My Account</h5>
                <ul class="list alt-list">
                    <li><a href="my-account.html"><i class="fa fa-angle-right"></i>My Account</a></li>
                    <li><a href="wishlist.html"><i class="fa fa-angle-right"></i>Wishlist</a></li>
                    <li><a href="cart.html"><i class="fa fa-angle-right"></i>My Cart</a></li>
                    <li><a href="checkout.html"><i class="fa fa-angle-right"></i>Checkout</a></li>
                </ul>
            </div><!-- end col -->
            <div class="col-sm-3">
                <h5 class="title">Information</h5>
                <ul class="list alt-list">
                    <li><a href="about-us-v1.html"><i class="fa fa-angle-right"></i>About Us</a></li>
                    <li><a href="faq.html"><i class="fa fa-angle-right"></i>FAQ</a></li>
                    <li><a href="privacy-policy.html"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>
                    <li><a href="contact-v1.html"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                </ul>
            </div><!-- end col -->
            <div class="col-sm-3">
                <h5 class="title">Payment Methods</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <ul class="list list-inline">
                    <li class="text-white"><i class="fa fa-cc-visa fa-2x"></i></li>
                    <li class="text-white"><i class="fa fa-cc-paypal fa-2x"></i></li>
                    <li class="text-white"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                    <li class="text-white"><i class="fa fa-cc-discover fa-2x"></i></li>
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-30">

        <div class="row text-center">
            <div class="col-sm-12">
                <p class="text-sm">&COPY; 2017. Made with <i class="fa fa-heart text-danger"></i> by <a href="javascript:void(0);">DiamondCreative.</a></p>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</footer>
<!-- end footer -->


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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="src/common/js/gmaps.js"></script>
<script type="text/javascript" src="src/common/js/swiper.min.js"></script>
<script type="text/javascript" src="src/common/js/main.js"></script>

</body>
</html>