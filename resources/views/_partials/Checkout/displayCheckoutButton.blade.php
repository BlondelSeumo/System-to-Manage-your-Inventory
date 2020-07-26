<div class="col-md-4 col-md-offset-{{ isset($offset) ? $offset : 8 }} m-b-20">
    @if(!Auth::guard('user')->check())
        <a href="{{ route('home') }}">
            <button class="btn btn-primary p-all-10">
                <i class="fa fa-arrow-left"></i>&nbsp;Keep shopping
            </button>
        </a>
        <a href="{{ route('checkout.step1') }}">
            <button class="btn btn-success pull-right p-all-10">
                Proceed to checkout guest &nbsp;<i class="fa fa-arrow-right"></i>
            </button>
        </a>
    @else
        <a href="{{ route('home') }}">
            <button class="btn btn-primary p-all-10">
                <i class="fa fa-arrow-left"></i>&nbsp;Keep shopping
            </button>
        </a>
        <a href="{{ route('u.checkout.step2') }}">
            <button class="btn btn-success pull-right p-all-10">
                Proceed to checkout User<i class="fa fa-arrow-right"></i>
            </button>
        </a>
    @endif
</div>
