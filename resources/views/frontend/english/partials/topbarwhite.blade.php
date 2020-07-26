<!-- start topBar -->
<div class="topBar">
    <div class="container">
        <ul class="list-inline pull-left hidden-sm hidden-xs">
            <li><i class="fa fa-phone mr-5"></i>+123 4567 8910</li>
            <li><i class="fa fa-envelope mr-5"></i>sales@yourdomain.com</li>
        </ul>

        <ul class="topBarNav pull-right">
            <li class="linkdown">
                <a href="javascript:void(0);">
                    <i class="fa fa-usd mr-5"></i>
                    USD
                    <i class="fa fa-angle-down ml-5"></i>
                </a>
                <ul class="w-100">
                    <li><a href="javascript:void(0);"><i class="fa fa-eur mr-5"></i>EUR</a></li>
                    <li class="active"><a href="javascript:void(0);"><i class="fa fa-usd mr-5"></i>USD</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-gbp mr-5"></i>GBP</a></li>
                </ul>
            </li>
            <li class="linkdown">
                <a href="frontend.language.{!! config('site.language.english') !!}">
                    <img src="src/common/images/flag-english.jpg" class="mr-5" alt="">
                    <span class="hidden-xs">
                                English
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>
                </a>
                <ul class="w-100">
                    <li><a href="frontend.language.{!! config('site.language.english') !!}"><img src="src/common/images/flag-english.jpg" class="mr-5" alt="">English</a></li>
                    <li class="active"><a href="frontend.language.{!! config('site.language.bangla') !!}"><img src="src/common/images/flag-bangladesh.jpg" class="mr-5" alt="">বাংলা</a></li>
                    {{--<li><a href="javascript:void(0);"><img src="img/flags/flag-german.jpg" class="mr-5" alt="">German</a></li>--}}
                    {{--<li><a href="javascript:void(0);"><img src="img/flags/flag-spain.jpg" class="mr-5" alt="">Spain</a></li>--}}
                </ul>
            </li>
            <li class="linkdown">
                <a href="javascript:void(0);">
                    <i class="fa fa-user mr-5"></i>
                    <span class="hidden-xs">
                                My Account
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>
                </a>
                <ul class="w-150">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Create Account</a></li>
                    <li class="divider"></li>
                    <li><a href="wishlist.html">Wishlist (5)</a></li>
                    <li><a href="cart.html">My Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                </ul>
            </li>
            <li class="linkdown">
                <a href="javascript:void(0);">
                    <i class="fa fa-shopping-basket mr-5"></i>
                    <span class="hidden-xs">
                                Cart<sup class="text-primary">(3)</sup>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>
                </a>
                <ul class="cart w-250">
                    <li>
                        <div class="cart-items">
                            <ol class="items">
                                <li>
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="img/products/men_06.jpg" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <div class="close-icon">
                                            <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                        </div>
                                        <p class="product-name">
                                            <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a>
                                        </p>
                                        <strong>1</strong> x <span class="price text-primary">$59.99</span>
                                    </div><!-- end product-details -->
                                </li><!-- end item -->
                                <li>
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="img/products/shoes_01.jpg" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <div class="close-icon">
                                            <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                        </div>
                                        <p class="product-name">
                                            <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a>
                                        </p>
                                        <strong>1</strong> x <span class="price text-primary">$39.99</span>
                                    </div><!-- end product-details -->
                                </li><!-- end item -->
                                <li>
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="img/products/bags_07.jpg" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <div class="close-icon">
                                            <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                        </div>
                                        <p class="product-name">
                                            <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a>
                                        </p>
                                        <strong>1</strong> x <span class="price text-primary">$29.99</span>
                                    </div><!-- end product-details -->
                                </li><!-- end item -->
                            </ol>
                        </div>
                    </li>
                    <li>
                        <div class="cart-footer">
                            <a href="cart.html" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View Cart</a>
                            <a href="checkout.html" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div><!-- end container -->
</div>
<!-- end topBar -->