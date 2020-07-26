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
    <link rel="shortcut icon" href="{!! asset('img/favicon.ico') !!}" type="image/x-icon">
    <link rel="icon" href="{!! asset('img/favicon.ico') !!}" type="image/x-icon">

    <!-- css files -->
    <link href="{!! asset('src/common/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('src/common/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('src/common/css/owl.carousel.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('src/common/css/owl.theme.default.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('src/common/css/animate.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('src/common/css/swiper.css') !!}" rel="stylesheet" type="text/css" />


    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link href="{!! asset('src/common/css/default.css') !!}" rel="stylesheet" type="text/css" />
{{--    <link href="{!! asset('src/frontend/css/style.css') !!}" rel="stylesheet" type="text/css" />--}}


    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">

</head>

<body>
<div id="app">
    @include('frontend.english.partials.topbar')
    @yield('content')
</div>



    <script type="text/javascript" src="{!! asset('src/common/js/jquery-3.2.1.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/common/js/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/common/js/owl.carousel.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/common/js/jquery.downCount.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/common/js/nouislider.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/common/js/jquery.sticky.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/common/js/pace.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/common/js/star-rating.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/common/js/wow.min.js') !!}"></script>
    {{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>--}}
    {{--<script type="text/javascript" src="src/common/js/gmaps.js"></script>--}}
    <script type="text/javascript" src="{!! asset('src/common/js/swiper.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/common/js/main.js') !!}"></script>


    <script>
        jQuery(function($) {
            $('.navbar-vertical .dropdown').hover(function() {
                $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

            }, function() {
                $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

            });

            $('.navbar-vertical .dropdown > a').click(function(){
                location.href = this.href;
            });

        });
    </script>

@stack('scripts')

</body>
</html>