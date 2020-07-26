@if(!empty($categories))
<div class="navbar-vertical">
    <ul class="nav nav-stacked">
        <li class="header">
            <h6 class="text-uppercase">Categories <i class="fa fa-navicon pull-right"></i></h6>
        </li>
        @foreach($categories as $category)
            <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    {!! $category->name !!} <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="dropdown-menu">
                    @foreach($subcategories as $subcategory)
                        @if($category->id == $subcategory->category_id)
                            <li><a href="javascript:void(0);">{!! $subcategory->name !!}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div><!-- end navbar-vertical -->
@endif