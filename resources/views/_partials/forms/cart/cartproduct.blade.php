@extends('frontend.english.pagemaster')


@section('content')

    {{--    @include('frontend.english.partials.middlebar',['categories'=>$categories, 'subcategories'=>$subcategories])--}}

    {{--    @include('frontend.english.partials.sectionnavbar')--}}


    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul>
                        <li><a href="{!! route('home') !!}">Home</a></li>
                        {{--<li><a href="#">Pages</a></li>--}}
                        <li class="active">Cart</li>
                    </ul><!-- end breadcrumb -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumbs -->


    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p style="text-align: center" class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->

    <div class="container">
        <div class="row m-b-20 ">
            <h1>Your Shopping cart
                <span class="text text-info text-small">[{{ array_get($cart['cart'], 'total_products') > 1 ? array_get($cart['cart'], 'total_products') .' '. str_plural('item') : array_get($cart['cart'], 'total_products') .' '. str_singular('items') }}
                    ]</span>
            </h1>
            <hr/>
            <div class="col-md-4">
                {!! Form::open(['url' => route('cart.removeAllProducts'), 'method' => 'DELETE', 'data-remote']) !!}
                <button class="btn btn-warning p-all-10" type="submit" data-confirm="Are you sure you want to do this?">
                    <i class="fa fa-trash"></i>&nbsp;Empty cart
                </button>
                {!! Form::close() !!}

            </div>
            @include('_partials.Checkout.displayCheckoutButton', ['offset' => 4])
            @include('_partials.forms.cart.shopping-cart-data', ['includePromoSection' => true, 'useAjax' => true, 'ignoreParentDiv' => false, 'displayOrderSummary' => true])
        </div>
        <hr/>
        {{--        @include('_partials.Checkout.displayCheckoutButton')--}}
        <h2>View more products below</h2>
        <section class="section m-b-20 ">
            <h2 class="section-title">Featured Tablets</h2>

            {{--@include('_partials.data.home-page.featured-products', ['data' => $featuredTablets])--}}
        </section>
    </div>

    <script>
        $(function() {
            setInterval(function(){
                $('.alert').slideUp(500);
            }, 2000);
        });
    </script>
@stop

