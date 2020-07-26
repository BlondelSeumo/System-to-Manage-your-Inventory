<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(Request::segment(1) == 'accounts')
        <title>Accounts Management System</title>
    @endif
    @if(Request::segment(1) == 'admin')
        <title>Inventory Management System</title>
    @endif


    {{--<link href="/src/backend/css/fixed.css" rel="stylesheet" type="text/css" />--}}



    {{--<link rel="stylesheet" type="text/css" href="src/common/css/bootstrap.min.css" />--}}

    <link href="{!! asset('src/common/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />

    <link href="{!! asset('src/common/css/bootstrap-imageupload.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('src/common/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('src/backend/css/jquery.dataTables.min.css') !!}" rel="stylesheet" type="text/css" />



    {{--<link href="src/common/css/bootstrap-imageupload.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" type="text/css" href="src/common/css/font-awesome.min.css" />--}}
    {{--<link rel="stylesheet" type="text/css" href="src/backend/css/jquery.dataTables.min.css" />--}}



    {{--<link rel="stylesheet" type="text/css" href="src/common/css/pages.css" />--}}
    <link href="{!! asset('src/common/css/pages.css') !!}" rel="stylesheet" type="text/css" />

    <!-- jQuery -->

    <script type="text/javascript" src="{!! asset('src/backend/smartmenus-1.0.1/libs/jquery/jquery.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('src/common/jquery-ui-1.12.1/jquery-ui.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('src/backend/smartmenus-1.0.1/jquery.smartmenus.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('src/common/js/bootstrap.min.js') !!}"></script>

    {{--<script type="text/javascript" src="src/backend/smartmenus-1.0.1/libs/jquery/jquery.js"></script>--}}
    {{--<script type="text/javascript" src="src/common/jquery-ui-1.12.1/jquery-ui.js"></script>--}}

    <!-- SmartMenus jQuery plugin -->
    {{--<script type="text/javascript" src="src/backend/smartmenus-1.0.1/jquery.smartmenus.js"></script>--}}
    {{--<script type="text/javascript" src="src/common/js/bootstrap.min.js"></script>--}}

    <!-- SmartMenus jQuery init -->
    <script type="text/javascript">
        $(function() {
            $('#main-menu').smartmenus({
                subMenusSubOffsetX: 1,
                subMenusSubOffsetY: -8
            });
        });
    </script>

    {{--<link href="src/common/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" />--}}
    <link href="{!! asset('src/common/jquery-ui-1.12.1/jquery-ui.css') !!}" rel="stylesheet" type="text/css" />

    <!-- SmartMenus core CSS (required) -->
    {{--<link href="src/backend/smartmenus-1.0.1/css/sm-core-css.css" rel="stylesheet" type="text/css" />--}}
    <link href="{!! asset('src/backend/smartmenus-1.0.1/css/sm-core-css.css') !!}" rel="stylesheet" type="text/css" />


    <!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
    {{--<link href="../src/backend/smartmenus-1.0.1/css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />--}}
    <link href="{!! asset('src/backend/smartmenus-1.0.1/css/sm-blue/sm-blue.css') !!}" rel="stylesheet" type="text/css" />
    {{--<link href="../src/backend/smartmenus-1.0.1/css/sm-mint/sm-mint.css" rel="stylesheet" type="text/css" />--}}
    <link href="{!! asset('src/backend/smartmenus-1.0.1/css/sm-mint/sm-mint.css') !!}" rel="stylesheet" type="text/css" />
    {{--<link href="../src/backend/smartmenus-1.0.1/css/sm-simple/sm-simple.css" rel="stylesheet" type="text/css" />--}}
    <link href="{!! asset('src/backend/smartmenus-1.0.1/css/sm-simple/sm-simple.css') !!}" rel="stylesheet" type="text/css" />
    {{--<link href="../src/backend/smartmenus-1.0.1/css/sm-clean/sm-clean.css" rel="stylesheet" type="text/css" />--}}
    <link href="{!! asset('src/backend/smartmenus-1.0.1/css/sm-clean/sm-clean.css') !!}" rel="stylesheet" type="text/css" />
    {{--<link href="../src/backend/smartmenus-1.0.1/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">--}}
    <link href="{!! asset('src/backend/smartmenus-1.0.1/css/jquery.smartmenus.bootstrap.css') !!}" rel="stylesheet" type="text/css" />

    <style type="text/css">
        @media (min-width: 768px) {
            #main-menu > li {
                float: none;
                display: table-cell;
                width: 1%;
                text-align: center;
            }
        }
    </style>

</head>
<body>

<div class="col-md-12">
    @yield('banner')
</div>

<div class="container">

    <div class="row">

    </div>

    <div class="row">
        @yield('menu')
    </div>

    <div class="row fullpage">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>

</div>


{{--<script type="text/javascript" src="../src/backend/DataTables-1.10.12/media/js/jquery.dataTables.min.js"></script>--}}
<script type="text/javascript" src="{!! asset('src/backend/DataTables-1.10.12/media/js/jquery.dataTables.min.js') !!}"></script>

{{--<script type="text/javascript" src="../src/backend/DataTables-1.10.12/media/js/dataTables.jqueryui.min.js"></script>--}}
<script type="text/javascript" src="{!! asset('src/backend/DataTables-1.10.12/media/js/dataTables.jqueryui.min.js') !!}"></script>

{{--<script src="../src/common/js/bootstrap-imageupload.js"></script>--}}
<script type="text/javascript" src="{!! asset('src/common/js/bootstrap-imageupload.js') !!}"></script>

{{--<script type="text/javascript" src="../src/Buttons-1.2.2/js/dataTables.buttons.min.js"></script>--}}
{{--<script src="../vendor/datatables/buttons.server-side.js"></script>--}}
{{--<script src="https://datatables.yajrabox.com/js/handlebars.js"></script>--}}
<script>
    function resize() {
        var n = $("body").width() / 45 + "pt";
        var t = $("body").width() / 75 + "pt";
        $("h1").css('fontSize', n);
        $("h3").css('fontSize', t);
    }
    $(window).on("resize", resize);
    $(document).ready(resize);
</script>

@stack('scripts')

</body>
</html>