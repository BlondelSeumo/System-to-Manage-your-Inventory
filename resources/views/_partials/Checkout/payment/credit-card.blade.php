{{--<div class="container">--}}
    <div class='row'>
        <div class='col-md-8'></div>
        <div class='col-md-8'>
            <form accept-charset="UTF-8" action="{{ $route }}" class="require-validation" id="payment-form" method="post">
            {{--{!! Form::open(['url' => 'checkout', 'method' => 'POST', 'id' =>'checkout-form']) !!}--}}
            <div class='form-row'>
                <div class='col-xs-12 form-group required'>
                    <label class='control-label'>Name on Card</label>
                    <input name="card-holder-name" class='form-control' size='4' type='text' value="Shahin">
                </div>
            </div>
            <div class='form-row'>
                <div class='col-xs-12 form-group card required'>
                    <label class='control-label'>Card Number</label>
                    <input autocomplete='off' id="card-number" class='form-control card-number' size='20' type='text' value="4242424242424242">
                </div>
            </div>
            <div class='form-row'>
                <div class='col-xs-4 form-group cvc required'>
                    <label class='control-label'>CVC</label>
                    <input autocomplete='off' id="card-cvc" class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' value="311">
                </div>
                <div class='col-xs-4 form-group expiration required'>
                    <label class='control-label'>Expiration</label>
                    <input class='form-control card-expiry-month' id="card-expiry-month" placeholder='MM' size='2' type='text' value="10">
                </div>
                <div class='col-xs-4 form-group expiration required'>
                    <label class='control-label'> </label>
                    <input class='form-control card-expiry-year' id="card-expiry-year" placeholder='YYYY' size='4' type='text' value="2018">
                </div>
            </div>
            <div class='form-row'>
                <div class='col-md-12'>
                    <div class='form-control total btn btn-info'>
                        Total:
                        <span class='amount'>{{ format_money($cart['cart']['grand_total']) }}$</span>
                    </div>
                </div>
            </div>
            <div class='form-row'>
                <div class='col-md-12 form-group'>
                    <button class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>
                </div>
            </div>

            <div class='form-row'>
                <div class='col-md-12 error form-group hide'>
                    <div class='alert-danger alert'>
                        Please correct the errors and try again.
                    </div>
                </div>
            </div>
            {!! csrf_field() !!}
            {{--{!! Form::close() !!}--}}
       </form>
       </div>
        <div class='col-md-4'></div>
    </div>
{{--</div>--}}

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{!! asset('/src/js/checkout.js') !!}"></script>

{{--<form accept-charset="UTF-8" action="{{ $route }}" class="require-validation" id="payment-form" method="post">--}}
    {{--{!! Form::token() !!}--}}
    {{--<div class='form-row'>--}}
        {{--<div class='col-xs-10 form-group required'>--}}
            {{--<label class='control-label' for="cardName">Name on Card</label>--}}
            {{--<input id="cardName" name="cardName" class='form-control' size='4' type='text' required>--}}
            {{--<input type="text" name="card-holder-name" class="form-control" id="card-holder-name" placeholder="Card Holder's Name" required>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class='form-row'>--}}
        {{--<div class='col-xs-10 form-group card'>--}}
            {{--<label class='control-label' for="cardNo">Card Number</label>--}}
            {{--<input id="cardNo" name="cardNo" autocomplete='off' class='form-control' size='20' type='text' required>--}}
            {{--<input type="text" class="form-control" autocomplete='off' id="card-number" size="20" placeholder="Card Number" required>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class='form-row'>--}}
        {{--<div class='col-xs-3 form-group cvc required'>--}}
            {{--<label for="cvc" class='control-label'>CVC</label>--}}
            {{--<input id="cvc" name="cvc" autocomplete='off' class='form-control' placeholder='ex. 311' size='4' type='text' required>--}}
            {{--<input type="text" class="form-control" autocomplete='off' id="card-cvc" placeholder="Security Code ex. 311" size='4' required>--}}
        {{--</div>--}}
        {{--<div class='col-xs-4 form-group expiration'>--}}
            {{--<label class='control-label'>Expiration</label>--}}
            {{--{!! Form::selectMonth('month', null, ['class' => 'form-control required']) !!}--}}
        {{--</div>--}}
        {{--<div class='col-xs-3 form-group expiration'>--}}
            {{--<label class='control-label'>Year</label>--}}
            {{--{!! Form::selectYear('year', date('Y'), 2025, null, ['class' => 'form-control required']) !!}--}}
            {{--{!! Form::hidden('grandTotal', format_money($cart['cart']['grand_total']) ) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@if(isset($hideSubmitButton))--}}

        {{--<div class="form-group col-md-10 m-t-20">--}}
            {{--<button class="btn btn-primary pull-right btn-block" type="submit">--}}
                {{--proceed to Payment<i class="fa fa-arrow-right"></i>--}}
            {{--</button>--}}
        {{--</div>--}}

    {{--@else--}}
        {{--<div class="form-group col-md-10 m-t-20">--}}
            {{--<button class="btn btn-primary pull-right btn-block" type="submit">--}}
                {{--proceed to order page tt<i class="fa fa-arrow-right"></i>--}}
            {{--</button>--}}
        {{--</div>--}}
    {{--@endif--}}
{{--</form>--}}
{{--@if(isset($hideSubmitButton))--}}
    {{--<div class="form-group col-md-10 m-t-20">--}}
        {{--<a href="{{ $secondRoute }}">--}}
            {{--<button class="btn btn-primary pull-right btn-block">--}}
                {{--proceed to order page&nbsp;<i class="fa fa-arrow-right"></i>--}}
            {{--</button>--}}
        {{--</a>--}}
    {{--</div>--}}
{{--@endif--}}