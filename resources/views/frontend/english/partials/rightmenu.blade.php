@if(!empty($categories))
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown right">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <span class="hidden-sm">Category</span><i class="fa fa-bars ml-5"></i>
            </a>
            <ul class="dropdown-menu">
                @foreach($categories as $category)
                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">{!! $category->name !!}</a>
                    <ul class="dropdown-menu">
                        @foreach($subcategories as $subcategory)
                            @if($category->id == $subcategory->category_id)
                                <li><a href="category.html">{!! $subcategory->name !!}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul><!-- end ul dropdown-menu -->
        </li><!-- end dropdown -->
    </ul><!-- end navbar-right -->
@endif