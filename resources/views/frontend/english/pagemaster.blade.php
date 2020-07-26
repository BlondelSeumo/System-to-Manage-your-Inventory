<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Shopping</title>

    <link href="{!! asset('src/common/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{!! asset('src/common/js/jquery-3.2.1.min.js') !!}"></script>



    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="{!! asset('src/common/css/default.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('src/frontend/css/style.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('src/frontend/css/main.css') !!}" rel="stylesheet" type="text/css" />



    {{--<!-- start-smoth-scrolling -->--}}
    {{--<script type="text/javascript" src="/helper/js/move-top.js"></script>--}}
    {{--<script type="text/javascript" src="/helper/js/easing.js"></script>--}}



    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body>
<div id="app">
    @include('frontend.english.partials.topbar')
    @yield('content')
</div>



</body>
</html>

@section('scripts')



    <script type="text/javascript" src="{!! asset('src/common/js/bootstrap.min.js') !!}"></script>




@show