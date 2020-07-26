@if(!empty($categories))
    <ul class="nav navbar-nav navbar-right">

        @foreach($categories as $category)
        <li class="dropdown right">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <span class="hidden-sm">{!! $category->name !!}</span><i class="fa fa-bars ml-5"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Mens</a>
                    <ul class="dropdown-menu">
                        <li><a href="category.html">Shirts</a></li>
                        <li><a href="category.html">Coats & Jackets</a></li>
                        <li><a href="category.html">Underwear</a></li>
                        <li><a href="category.html">Sunglasses</a></li>
                        <li><a href="category.html">Socks</a></li>
                        <li><a href="category.html">Belts</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Womens</a>
                    <ul class="dropdown-menu">
                        <li><a href="category.html">Bresses</a></li>
                        <li><a href="category.html">T-shirts</a></li>
                        <li><a href="category.html">Skirts</a></li>
                        <li><a href="category.html">Jeans</a></li>
                        <li><a href="category.html">Pullover</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);">Kids</a></li>
                <li><a href="javascript:void(0);">Fashion</a></li>
                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">SportWear</a>
                    <ul class="dropdown-menu">
                        <li><a href="category.html">Shoes</a></li>
                        <li><a href="category.html">Bags</a></li>
                        <li><a href="category.html">Pants</a></li>
                        <li><a href="category.html">SwimWear</a></li>
                        <li><a href="category.html">Bicycles</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);">Bags</a></li>
                <li><a href="javascript:void(0);">Shoes</a></li>
                <li><a href="javascript:void(0);">HouseHolds</a></li>
                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Technology</a>
                    <ul class="dropdown-menu">
                        <li><a href="category.html">TV</a></li>
                        <li><a href="category.html">Camera</a></li>
                        <li><a href="category.html">Speakers</a></li>
                        <li><a href="category.html">Mobile</a></li>
                        <li><a href="category.html">PC</a></li>
                    </ul>
                </li>
            </ul><!-- end ul dropdown-menu -->
        </li><!-- end dropdown -->
    </ul><!-- end navbar-right -->
@endif