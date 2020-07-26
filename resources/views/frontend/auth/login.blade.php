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

<body class="  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>

<!-- start topBar -->
@include('frontend.english.partials.topbar')
<!-- end topBar -->

<!-- start navbar -->
@include('frontend.english.partials.middlebar')<!-- end navbar -->

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Login or Register</li>
                </ul><!-- end breadcrumb -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end breadcrumbs -->

<div class="container">

    <div class="row">
        <div class="form-group">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (count($errors))

                <div class="alert alert-success">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('user.authenticate') }}">
                    {!! csrf_field() !!}
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email Address" required autofocus>
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                    </div>



                    <div class="input-group">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="remember" value="1"> Remember Me
                            </label>
                        </div>
                    </div>


                    <div style="margin-top:10px" class="input-group">
                        <!-- Button -->

                        <div class="input-group">
                            <input class="btn btn-primary" style="clear: left; width:180%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>


                        {{--<div class="input-group">--}}
                            {{--<a id="btn-fblogin" href="#" class="btn btn-primary" style="clear: left; width:300%; height: 32px; font-size: 13px;" type="submit" >Login with Facebook</a>--}}

                        {{--</div>--}}
                    </div>


                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account!
                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Sign Up Here
                                </a>
                            </div>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>
    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>
            <div class="panel-body" >
                <form id="signupform" class="form-horizontal" role="form">

                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>



                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="passwd" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="icode" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                            <span style="margin-left:8px;">or</span>
                        </div>
                    </div>

                    <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">

                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                        </div>

                    </div>



                </form>
            </div>
        </div>




    </div>
</div>
<!-- end section -->

<!-- start footer -->
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
