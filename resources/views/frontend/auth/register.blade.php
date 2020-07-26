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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('user/saveregister') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                            <label for="town" class="col-md-4 control-label">Home Town</label>

                            <div class="col-md-6">
                                <input id="town" type="text" class="form-control" name="town" value="{{ old('town') }}" required>

                                @if ($errors->has('town'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="home_address" class="col-md-4 control-label">Home Address (where you live):</label>
                            <div class="col-md-6">
                                <textarea id="home_address" name="home_address" rows="4"
                                          placeholder="Enter your home address" maxlength="100" required
                                          class="form-control">{{ old('home_address') }}</textarea>
                                @if($errors->has('home_address'))
                                    <span class="wow flash error-msg">{{ $errors->first('home_address') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone number:</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">+88</span>
                                    <input type="text" id="phone" name="phone" placeholder="712345678" maxlength="11" required
                                           value="{{ old('phone') }}" class="form-control">
                                </div>
                                @if($errors->has('phone'))
                                    <span class="wow flash error-msg">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="col-md-6">--}}
                            {{--<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>--}}
                        {{--</div>--}}



                        <div class="field-row form-group">
                            <input type="checkbox" name="accept">

                            <span>I agree to the <a href="{{ route('terms') }}" target="_blank">Terms and conditions</a> </span>
                            <br/>
                            @if($errors->has('accept'))
                                <span class="wow flash error-msg">{{ $errors->first('accept') }}</span>
                            @endif
                        </div>


                        {{--@if(!isset($recaptcha))--}}
                            {{--<p class="text text-danger">We've detected unusual request activity from your IP address--}}
                                {{--of {{ Request::getClientIp() }}. You'll need to prove that youre not a robot</p>--}}
                            {{--@include('_partials.forms.authentication.recaptcha')--}}
                        {{--@endif--}}


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create My Account
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
<script src='https://www.google.com/recaptcha/api.js'></script>
