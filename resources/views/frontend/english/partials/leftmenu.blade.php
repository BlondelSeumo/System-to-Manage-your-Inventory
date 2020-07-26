{{--@if(!empty($categories))--}}
{{--<div class="navbar-vertical">--}}
    {{--<ul class="nav nav-stacked">--}}
        {{--<li class="header">--}}
            {{--<h6 class="text-uppercase">Categories <i class="fa fa-navicon pull-right"></i></h6>--}}
        {{--</li>--}}
        {{--@foreach($categories as $category)--}}
            {{--<li>--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--{!! $category->name !!} <i class="fa fa-angle-right pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--@foreach($subcategories as $subcategory)--}}
                        {{--@if($category->id == $subcategory->category_id)--}}
                            {{--<li><a href="javascript:void(0);">{!! $subcategory->name !!}</a></li>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
{{--</div><!-- end navbar-vertical -->--}}
{{--@endif--}}



@if(!empty($categories))
    <div class="navbar-vertical">
        <ul class="nav nav-stacked">
            <li class="header">
                <h6 class="text-uppercase">Categories <i class="fa fa-navicon pull-right"></i></h6>
            </li>
            @foreach($categories as $category)
                <li class="dropdown active">
{{--                    <a target="_blank" href="{!! url('display.category.index') !!}" class="dropdown-toggle" data-toggle="dropdown" >--}}
                    <a target="_blank" href="display/categories/{!! $category->id !!}" class="dropdown-toggle" data-toggle="dropdown" >
                        {!! $category->name !!} <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="dropdown-menu mega-menu" style="min-width: 800px; line-height: 200%">
                        @foreach($sbcalias as $k=>$sba)
                            @if($sba->category_id == $category->id)
                                <div class="column-1-3">
                                    <h2>{!! $sba->alias !!}</h2>
                                    @foreach($subcategories as $subcategory)
                                        @if($category->id === $subcategory->category_id and $sba->alias ===$subcategory->alias )
                                            <li><a href="{!! url('display.subcategory.index') !!}">{!! $subcategory->name !!}</a></li>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div><!-- end navbar-vertical -->
@endif