@if(!empty($categories))
<div class="middleBar">
    <div class="container">
        <div class="row display-table">
            <div class="col-sm-3 vertical-align text-left hidden-xs">
                <a href="javascript:void(0);">
                    <img width="160" src="img/logo-big.png" style="height: 50px; width: 80px" alt="" />
                </a>
            </div><!-- end col -->
            <div class="col-sm-7 vertical-align text-center">
                <form>
                    <div class="row grid-space-1">
                        <div class="col-sm-6">
                            <input type="text" name="keyword" class="form-control input-lg" placeholder="Search">
                        </div><!-- end col -->
                        <div class="col-sm-3">
                            <select class="form-control input-lg" name="category">
                                <option value="all">All Categories</option>

                                @foreach($categories as $category)
                                    <optgroup label="{!! $category->name !!}">
                                        @foreach($subcategories as $subcategory)
                                            @if($category->id == $subcategory->category_id)
                                                <option value="{!! $subcategory->id !!}">{!! $subcategory->name !!}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div><!-- end col -->
                        <div class="col-sm-3">
                            <input type="submit"  class="btn btn-default btn-block btn-lg" value="Search">
                        </div><!-- end col -->
                    </div><!-- end row -->
                </form>
            </div><!-- end col -->
            <div class="col-sm-2 vertical-align header-items hidden-xs">
                <div class="header-item mr-5">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Wishlist">
                        <i class="fa fa-heart-o"></i>
                        <sub>32</sub>
                    </a>
                </div>
                <div class="header-item">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Compare">
                        <i class="fa fa-refresh"></i>
                        <sub>2</sub>
                    </a>
                </div>
            </div><!-- end col -->
        </div><!-- end  row -->
    </div><!-- end container -->
</div><!-- end middleBar -->
@endif