<!-- start topBar -->
<div class="topBar inverse">
    <div class="container">
        <ul class="list-inline pull-left hidden-sm hidden-xs">
            <li><span class="text-primary">Have a question?</span> Call +880 4567 8910</li>
        </ul>

        <ul class="topBarNav pull-right">
            <li class="linkdown">
                <a href="javascript:void(0);">
                    <i class="fa fa-usd mr-5"></i>
                    USD
                    <i class="fa fa-angle-down ml-5"></i>
                </a>
                <ul class="w-100">
                    <li><a href="javascript:void(0);"><i class="fa fa-bdt mr-5"></i>BDT</a></li>
                    <li class="active"><a href="javascript:void(0);"><i class="fa fa-usd mr-5"></i>USD</a></li>
                </ul>
            </li>
            <li class="linkdown">
                <a href="frontend.language.{!! config('site.language.english') !!}">
                    <img src="{!! asset('src/common/images/flag-english.jpg') !!}" class="mr-5" alt="">
                    <span class="hidden-xs">
                                English
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>
                </a>
                <ul class="w-100">
                    <li><a href="frontend.language.{!! config('site.language.english') !!}"><img src="{!! asset('src/common/images/flag-english.jpg') !!}" class="mr-5" alt="">English</a></li>
                    <li class="active"><a href="frontend.language.{!! config('site.language.bangla') !!}"><img src="{!! asset('src/common/images/flag-bangladesh.jpg') !!}" class="mr-5" alt="">বাংলা</a></li>
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
                @if (!Auth::guard('user')->check())
                    <ul class="w-150">
                        <li><a href="{{ url('user.login') }}">Login</a></li>
                        <li><a href="{!! url('user.register') !!}">Create Account</a></li>
                        <li class="divider"></li>
                        {{--<li><a href="wishlist.html">Wishlist (5)</a></li>--}}
                        <li><a href="{!! route('cart.view') !!}">My Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                @else
                    <ul class="w-150">
                        <li><a href="#">{!! Auth::guard('user')->user()->name !!}</a></li>
                        <li class="divider"></li>
                        {{--<li><a href="wishlist.html">Wishlist (5)</a></li>--}}
                        <li><a href="{!! route('cart.view') !!}">My Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li>
                            <a href="{{ url('user.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('user.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                @endif
            </li>
            <li class="linkdown">
                <a href="javascript:void(0);">
                    <i class="fa fa-shopping-basket mr-5"></i>
                    <span class="badge">{!! !empty($cart['products']) ? array_get($cart['cart'], 'total_products') : 0 !!}</span>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>
                </a>
                <ul class="cart w-250">
                    <li>
                        <div class="cart-items">
                            <ol class="items">
                                <li>
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="{!! asset('img/products/men_06.jpg') !!}" alt="Sample Product ">
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
                                        <img src="{!! asset('img/products/shoes_01.jpg') !!}" alt="Sample Product ">
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
                                        <img src="{!! asset('img/products/bags_07.jpg') !!}" alt="Sample Product ">
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