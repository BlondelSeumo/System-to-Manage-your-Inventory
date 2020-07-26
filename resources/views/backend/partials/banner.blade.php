{{--<div style="background-color:#8eb4cb">--}}
    {{--<table class="table table-responsive">--}}
        {{--<tr>--}}
            {{--<td width="10%"><img src="src/images/logo.jpg" style="width:150px;height:60px;" class="img-responsive"></td>--}}
            {{--<td width="80%">@if(Auth::guard('admin')->check())--}}

                    {{--<h1 style="color: #bf6030; text-align: center"><strong>{!! get_company_name() !!}</strong></h1>--}}
                {{--@else--}}

                    {{--<h1><strong>Spider IT Limited</strong></h1>--}}
                    {{--<img src="src/images/{!! $comp_code !!}.jpeg" class="img-responsive">--}}
                {{--@endif--}}
            {{--</td>--}}
            {{--<td width="10%"><ul class="nav navbar-nav navbar-right">--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                            {{--<strong>{{ Auth::guard('admin')->user()->name }}</strong>    <span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li>--}}
                                {{--<a href="{{ url('/logout') }}"--}}
                                   {{--onclick="event.preventDefault();--}}
        {{--document.getElementById('logout-form').submit();">--}}
                                    {{--Logout--}}
                                {{--</a>--}}

                                {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
                                    {{--{{ csrf_field() }}--}}
                                {{--</form>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</td>--}}
        {{--</tr>--}}

    {{--</table>--}}
{{--</div>--}}



<div style="background-color: #f1f1f1">
    <div class="col-md-12 col-sm-6" style="background-color: #ffffff">
        <div class="row" style="background-color: #ffffff">

            <div class="col-md-4 col-sm-2 col-xs-3">
                <img src="{!! asset('src/images/logo.jpg') !!}" class="img-responsive">
            </div>

            <div class="col-md-6 col-sm-2 col-xs-6">
                {{--@if(Auth::guard('admin')->check())--}}
                    @auth('admin')

                    <h1 style="color: #bf6030"><strong>{!! get_company_name() !!}</strong></h1>
                    @endauth
                {{--@else--}}
                @guest('admin')
                    <h1><strong>Spider IT Limited</strong></h1>
                    <img src="src/images/{!! $comp_code !!}.jpeg" class="img-responsive">
                {{--@endif--}}
                @endguest
            </div>

            <div class="col-md-2 col-sm-2 col-xs-2">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Auth::guard('admin')->check())
                        <li><a href="{{ url('/login') }}"><strong>LOGIN</strong></a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <strong>{{ Auth::guard('admin')->user()->name }}</strong>    <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url(Request::segment(1),'logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url(Request::segment(1),'logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>