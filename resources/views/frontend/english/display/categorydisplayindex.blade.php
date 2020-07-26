@extends('frontend.master')
@section('content')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul>
                        <li><a href="{!! route('home') !!}">Home</a></li>
                        {{--<li><a href="#">Pages</a></li>--}}
                        <li class="active">Category</li>
                    </ul><!-- end breadcrumb -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumbs -->

    <!-- start section -->
    <section class="section white-backgorund">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="row column-4">



                        @foreach($products as $i => $item)
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail store style1">
                                <div class="header">
                                    <div class="badges">
                                        <span class="product-badge top right danger-background text-white semi-circle">-{!! $item->discount !!}</span>
                                    </div>
                                    <figure class="layer">
                                        <a href="javascript:void(0);">
                                            <img src="{!! asset($item->image) !!}" alt="">
                                        </a>
                                    </figure>
                                    <div class="icons">
                                        <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                        <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                        <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h6 class="regular"><a href="{!! url('display/single/product/'.$item->id) !!}">{!! $item->name !!}</a></h6>
                                    <div class="price">
                                        <small class="amount off">{!! $item->retail_price->getAmount() !!}</small>
                                        <span class="amount text-primary">{!! $item->retail_price->getAmount() !!}</span>
                                    </div>
                                    <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                </div><!-- end caption -->
                            </div><!-- end thumbnail -->
                        </div><!-- end col -->

                        @endforeach



                    <hr class="spacer-10 no-border">

                </div><!-- end col -->
            </div><!-- end row -->

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
                                                    <img src='{!! asset($products[$i]->image) !!}' alt='' />
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
                                            <li data-target='.product-slider' data-slide-to='5'><img src='{!! asset('img/products/men_06.jpg') !!}' alt='' /></li>
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
        </div>
        </div><!-- end container -->
    </section>
    <!-- end section -->



@endsection