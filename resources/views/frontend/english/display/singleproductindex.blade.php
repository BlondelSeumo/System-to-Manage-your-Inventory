@extends('frontend.master')

@section('content')
<!-- start topBar -->
{{--@include('frontend.english.partials.topbarwhite')--}}

<!-- start navbar -->

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><a href="{!! route('home') !!}">Home</a></li>
                    {{--<li><a href="#">Pages</a></li>--}}
                    <li class="active">Single product</li>
                </ul><!-- end breadcrumb -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end breadcrumbs -->

<!-- start section -->
<section class="section white-backgorund">

    <div class="container">

        <div class="row">
            <!-- start sidebar -->
            <div class="col-sm-4">
                <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                    <div class='carousel-inner'>
                        <div class='item active'>
                            <figure>
                                <img src='{!! asset($product->image) !!}' alt='' />
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
                        <li data-target='.product-slider' data-slide-to='0' class='active'><img src='{!! asset('img/products/men_01.jpg') !!}' alt='' /></li>
                        <li data-target='.product-slider' data-slide-to='1'><img src='{!! asset('img/products/men_02.jpg') !!}' alt='' /></li>
                        <li data-target='.product-slider' data-slide-to='2'><img src='{!! asset('img/products/men_03.jpg') !!}' alt='' /></li>
                        <li data-target='.product-slider' data-slide-to='3'><img src='{!! asset('img/products/men_04.jpg') !!}' alt='' /></li>
                        <li data-target='.product-slider' data-slide-to='4'><img src='{!! asset('img/products/men_05.jpg') !!}' alt='' /></li>
                    </ol><!-- end carousel-indicators -->
                </div><!-- end carousel -->
            </div><!-- end col -->
            <!-- end sidebar -->
            {!! Form::open(['route' => ['cart.add', $product->id], 'data-remote']) !!}
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="title">{!! $product->name !!}</h2>
                        <p class="text-gray alt-font">Product code: {!! $product->product_code !!}</p>

                        <ul class="list list-inline">
                            {{--<li><h6 class="text-danger text-xs">{!! $product->unit_price !!}</h6></li>--}}
                            <li><h5 class="text-primary">{!! $product->retail_price->getAmount() !!}</h5></li>
                            <li>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star-half-o text-warning"></i>
                            </li>
                            <li><a href="javascript:void(0);">(4 reviews)</a></li>
                        </ul>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5"><hr class="spacer-10 no-border">

                <div class="row">
                    <div class="col-sm-12">
                        <p>{!! $product->description_short !!}</p>
                        @foreach($product->description as $desc)
                        <ul class="list alt-list">
                            <li><i class="fa fa-check"></i> {!! $desc->description !!}</li>
                            {{--<li><i class="fa fa-check"></i> Cras aliquet venenatis sapien fringilla.</li>--}}
                            {{--<li><i class="fa fa-check"></i> Duis luctus erat vel pharetra aliquet.</li>--}}
                        </ul>
                        @endforeach
                        <hr class="spacer-15">
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
                        <hr class="spacer-15">

                        <ul class="list list-inline">

                                <li>

                                    <button type="SUBMIT" class="btn btn-default btn-lg round"><i class="fa fa-shopping-basket mr-5"></i>Add to Cart</button>

                                </li>

                            <li><button type="button" class="btn btn-gray btn-lg round"><i class="fa fa-heart mr-5"></i>Add to Wishlist</button></li>
                            <li>Share this product: </li>
                            <li>
                                <ul class="social-icons style1">
                                    <li class="facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                    <li class="pinterest"><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
            {!! Form::close() !!}
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->

<!-- start section -->
<section class="section light-backgorund">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs style1 text-center" role="tablist">
                    <li role="presentation" class="active"><a href="#additional_info" aria-controls="tab" role="tab" data-toggle="tab">Additional Info</a></li>
                    <li role="presentation"><a href="#reviews" aria-controls="profile" role="tab" data-toggle="tab">Reviews (4)</a></li>
                </ul><!-- end nav-tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="additional_info">
                        <h5>Additional Info</h5>
                        <p>Vestibulum tellus justo, vulputate ac nunc eu, laoreet pellentesque erat.
                            Nulla in fringilla ex. Nulla finibus rutrum lorem vehicula facilisis.
                            Sed ornare congue mi, et volutpat diam. Suspendisse eget augue id magna placerat dignissim.
                            Fusce at turpis neque. Nullam commodo consequat risus et iaculis.
                        </p>

                        <hr class="spacer-15">

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Dimensions</dt>
                                    <dd>120 x 75 x 90 cm</dd>
                                    <dt>Colors</dt>
                                    <dd>white, black, brown</dd>
                                    <dt>Materials</dt>
                                    <dd>cotton</dd>
                                </dl>
                            </div><!-- end col -->
                            <div class="col-sm-12 col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Weight</dt>
                                    <dd>1.65 kg</dd>
                                    <dt>Manufacturer</dt>
                                    <dd>Istanbul</dd>
                                </dl>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end tab-pane -->
                    <div role="tabpanel" class="tab-pane fade" id="reviews">
                        <h5>4 Review for "Lorem ipsum dolor sit amet"</h5>

                        <hr class="spacer-10 no-border">

                        <div class="comments">
                            <div class="comment-image">
                                <figure>
                                    <img src="{!! asset('img/products/men_01.jpg') !!}" alt="" />
                                </figure>
                            </div><!-- end comments-image -->
                            <div class="comment-content">
                                <div class="comment-content-head">
                                    <h6 class="comment-title">Lorem ipsum dolor sit</h6>
                                    <ul class="list list-inline comment-meta">
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </li>
                                    </ul>
                                </div><!-- end comment-content-head -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae sequi ipsa fugit officia eos! Sapiente laboriosam molestiae praesentium ducimus culpa. Magnam, odit, optio. Possimus similique eligendi explicabo, dolore, beatae sequi.</p>
                                <cite>Joe Doe</cite>
                            </div><!-- end comment-content -->
                        </div><!-- end comments -->

                        <div class="comments">
                            <div class="comment-image">
                                <figure>
                                    <img src="img/team/team_02.jpg" alt="" />
                                </figure>
                            </div><!-- end comments-image -->
                            <div class="comment-content">
                                <div class="comment-content-head">
                                    <h6 class="comment-title">Lorem ipsum dolor sit</h6>
                                    <ul class="list list-inline comment-meta">
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star-half-o text-warning"></i>
                                        </li>
                                    </ul>
                                </div><!-- end comment-content-head -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae sequi ipsa fugit officia eos! Sapiente laboriosam molestiae praesentium ducimus culpa. Magnam, odit, optio.</p>
                                <cite>Joe Doe</cite>
                            </div><!-- end comment-content -->
                        </div><!-- end comments -->

                        <div class="comments">
                            <div class="comment-image">
                                <figure>
                                    <img src="img/team/team_03.jpg" alt="" />
                                </figure>
                            </div><!-- end comments-image -->
                            <div class="comment-content">
                                <div class="comment-content-head">
                                    <h6 class="comment-title">Lorem ipsum dolor sit</h6>
                                    <ul class="list list-inline comment-meta">
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star-o text-warning"></i>
                                        </li>
                                    </ul>
                                </div><!-- end comment-content-head -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae sequi ipsa fugit officia eos! Sapiente laboriosam molestiae praesentium ducimus culpa. Magnam, odit, optio.</p>
                                <cite>Jane Doe</cite>
                            </div><!-- end comment-content -->
                        </div><!-- end comments -->

                        <div class="comments">
                            <div class="comment-image">
                                <figure>
                                    <img src="img/team/team_04.jpg" alt="" />
                                </figure>
                            </div><!-- end comments-image -->
                            <div class="comment-content">
                                <div class="comment-content-head">
                                    <h6 class="comment-title">Lorem ipsum dolor sit</h6>
                                    <ul class="list list-inline comment-meta">
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star-half-empty text-warning"></i>
                                            <i class="fa fa-star-o text-warning"></i>
                                        </li>
                                    </ul>
                                </div><!-- end comment-content-head -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae sequi ipsa fugit officia eos! Sapiente laboriosam molestiae praesentium ducimus culpa. Magnam, odit, optio.</p>
                                <cite>John Doe</cite>
                            </div><!-- end comment-content -->
                        </div><!-- end comments -->

                        <hr class="spacer-30">

                        <h5>Add a review</h5>
                        <p>How do you rate this product?</p>

                        <hr class="spacer-5 no-border">

                        <form>
                            <input type="text" class="rating rating-loading" value="5" data-size="sm" title="">
                        </form>

                        <hr class="spacer-10 no-border">

                        <div class="form-group">
                            <label for="reviewName">Name</label>
                            <input type="text" id="reviewName" class="form-control input-md" placeholder="Your Name">
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <label for="reviewEmail">E-mail</label>
                            <input type="text" id="reviewEmail" class="form-control input-md" placeholder="Your E-mail">
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <label for="reviewMessage">Review</label>
                            <textarea id="reviewMessage" rows="5" class="form-control" placeholder="Your review"></textarea>
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-default round btn-md" value="Submit Review">
                        </div><!-- end form-group -->
                    </div><!-- end tab-pane -->
                </div><!-- end tab-content -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->

<!-- start section -->
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="mb-20">You May Also Like</h4>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-sm-12">
                <div id="owl-demo" class="owl-carousel column-4 owl-theme">
                    <div class="item">
                        <div class="thumbnail store style3">
                            <div class="header">
                                <div class="badges">
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
                                        <img src="img/products/bags_09.jpg" alt="">
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
                                    <span class="amount text-primary">$59.99</span>
                                </div>
                            </div><!-- end caption -->
                        </div><!-- end thumbnail -->
                    </div><!-- end item -->

                    <div class="item">
                        <div class="thumbnail store style3">
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
                                        <img class="front" src="img/products/fashion_01.jpg" alt="">
                                        <img class="back" src="img/products/fashion_02.jpg" alt="">
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
                                    <small class="amount off text-danger">$68.99</small>
                                    <span class="amount text-primary">$59.99</span>
                                </div>
                            </div><!-- end caption -->
                        </div><!-- end thumbnail -->
                    </div><!-- end item -->

                    <div class="item">
                        <div class="thumbnail store style3">
                            <div class="header">
                                <div class="badges">
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
                                        <img src="img/products/hoseholds_02.jpg" alt="">
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
                                    <span class="amount text-primary">$59.99</span>
                                </div>
                            </div><!-- end caption -->
                        </div><!-- end thumbnail -->
                    </div><!-- end item -->

                    <div class="item">
                        <div class="thumbnail store style3">
                            <div class="header">
                                <div class="badges">
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
                                        <img src="img/products/kids_05.jpg" alt="">
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
                                    <span class="amount text-primary">$59.99</span>
                                </div>
                            </div><!-- end caption -->
                        </div><!-- end thumbnail -->
                    </div><!-- end item -->

                    <div class="item">
                        <div class="thumbnail store style3">
                            <div class="header">
                                <div class="badges">
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
                                        <img src="img/products/men_06.jpg" alt="">
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
                                    <span class="amount text-primary">$59.99</span>
                                </div>
                            </div><!-- end caption -->
                        </div><!-- end thumbnail -->
                    </div><!-- end item -->
                </div><!-- end owl carousel -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->

<!-- start footer -->
<footer class="footer light">
    <div class="container">
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
                <p class="text-sm">&COPY; 2017. Made with <i class="fa fa-heart text-danger"></i> by <a href="javascript:void(0);">Spider IT Limited.</a></p>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</footer>

@endsection