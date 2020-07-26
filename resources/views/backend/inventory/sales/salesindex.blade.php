@extends('backend.layouts.master')
@section('title')
    <title>Application Users</title>
@endsection
@section('banner')
    @include('backend.partials.banner')
@endsection

@section('menu')
    <div class="col-md-10 col-md-offset-1" style="background-color: #7ebb7b">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <ul>
                            <li><a href="{!! url('admin/home') !!}">Home</a></li>
                            <li class="active">Sales</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>
@endsection

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div>

        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-4 text-center">
                    <br/>
                    <div><h3>Sales Invoice</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>
                </div>
            </div>
        </div>
    </div>

    @include('backend.messages.flashmessage')

    <div class="col-sm-10 text-left col-sm-offset-1">

        {!! Form::open(['url'=>'sales.invoice.create']) !!}
        {{ csrf_field() }}

        <table class="table table-sm table-responsive">
            <tbody>
            <tr>
                <td><label for="relationship_id" class="control-label">Customer</label></td>
                <td>{!! Form::select('relationship_id', $customers , null , array('id' => 'relationship_id', 'class' => 'col-md-6 form-control','placeholder' => 'Select Suppliers...')) !!}</td>
                <td><button type="button" class="btn btn-default btn-primary" data-toggle="modal" data-target="#modal-unit"><i class="glyphicon glyphicon-plus-sign"></i></button></td>
                <td><label for="pdate" class="control-label">Invoice Date</label></td>
                <td>{!! Form::text('date', \Carbon\Carbon::now()->format('d/m/Y') , array('id' => 'date', 'class' => 'form-control','required','readonly')) !!}</td>
                <td align="right"><label for="orderNo" class="control-label">Order No</label></td>
                <td align="right">{!! Form::text('invoiceno','SI'.$sinumber , array('id' => 'invoiceno', 'class' => 'form-control')) !!}</td>
            </tr>
            <tr>
                <td align="right"><label for="paid_amt" class="control-label">Payment</label></td>
                <td colspan="2" align="right">{!! Form::text('paid_amt',0.00 , array('id' => 'paid_amt', 'class' => 'form-control text-right')) !!}</td>
                <td align="right"><label for="discount" class="control-label">Discount</label></td>
                <td align="right">{!! Form::text('discount',0.00 , array('id' => 'discount', 'class' => 'form-control text-right')) !!}</td>
                <td align="right"><label for="due_amt" class="control-label">Due</label></td>
                <td class="text-right"><span id="due-amt">0</span></td>
                {{--                <td align="right">{!! Form::text('due_amt',0 , array('id' => 'due_amt', 'class' => 'form-control text-right')) !!}</td>--}}
            </tr>
            <tr>
                <td><label for="description" class="control-label">Remarks</label></td>
                <td colspan="6">{!! Form::text('description', null , array('id' => 'description', 'class' => 'form-control')) !!}</td>
            </tr>
            </tbody>
            <tfoot></tfoot>
        </table>


        <div class="form-group col-md-12" style="background-color: rgba(177, 245, 174, 0.33)">
            {!! Form::label('items', 'Items', ['class' => 'control-label']) !!}
            <div class="table-responsive">
                <table class="table table-bordered" id="items">
                    <thead>
                    <tr style="background-color: #f9f9f9;">
                        <th width="5%"  class="text-center">Action</th>
                        <th width="40%" class="text-left">Product</th>
                        <th width="5%" class="text-center">Quantity</th>
                        <th width="10%" class="text-right">Unit Price</th>
                        <th width="10%" class="text-right">Tax</th>
                        <th width="10%" class="text-right">Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $item_row = 0; ?>
                    <tr id="item-row-{{ $item_row }}">
                        <td class="text-center" style="vertical-align: middle;">
                            <button type="button" onclick="$(this).tooltip('destroy'); $('#item-row-{{ $item_row }}').remove(); totalItem();" data-toggle="tooltip" title="{{ trans('general.delete') }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                        <td>
                            {{--<input class="form-control typeahead" required="required" placeholder="{{ trans('general.form.enter', ['field' => trans_choice('invoices.item_name', 1)]) }}" name="item[{{ $item_row }}][name]" type="text" id="item-name-{{ $item_row }}" autocomplete="off">--}}
                            <input class="form-control typeahead" required="required" placeholder="{{ trans('general.form.enter', ['field' => trans_choice('purchase.item_name', 1)]) }}" name="item[{{ $item_row }}][name]" type="text" id="item-name-{{ $item_row }}" autocomplete="off">
                            <input name="item[{{ $item_row }}][item_id]" type="hidden" id="item-id-{{ $item_row }}">
                        </td>
                        <td>
                            <input class="form-control text-center" required="required" name="item[{{ $item_row }}][quantity]" type="text" id="item-quantity-{{ $item_row }}">
                        </td>
                        <td>
                            <input class="form-control text-right" required="required" name="item[{{ $item_row }}][price]" type="text" id="item-price-{{ $item_row }}">
                        </td>
                        <td>
                            {!! Form::select('item[' . $item_row . '][tax]',$taxes , null, ['id'=> 'item-tax-'. $item_row, 'class' => 'form-control', 'placeholder' => trans('general.form.select.field', ['field' => trans_choice('general.taxes', 1)])]) !!}
                        </td>
                        <td class="text-right" style="vertical-align: middle;">
                            <span id="item-total-{{ $item_row }}">0</span>
                        </td>
                    </tr>
                    <?php $item_row++; ?>
                    <tr id="addItem">
                        <td class="text-center"><button type="button" onclick="addItem();" data-toggle="tooltip" title="{{ trans('general.add') }}" class="btn btn-xs btn-primary" data-original-title="{{ trans('general.add') }}"><i class="fa fa-plus"></i></button></td>
                        <td class="text-right" colspan="5"></td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="5"><strong>{{ trans('purchase.sub_total') }}</strong></td>
                        <td class="text-right"><span id="sub-total">0</span></td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="5"><strong>{{ trans_choice('general.taxes', 1) }}</strong></td>
                        <td class="text-right"><span id="tax-total">0</span></td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="5"><strong>{{ trans('purchase.total') }}</strong></td>
                        <td class="text-right"><span id="grand-total">0</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-6">
            {!! Form::submit('SUBMIT',['class'=>'btn btn-primary button-control']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['url'=>'admin.home', 'method' => 'GET']) !!}

        <div class="col-md-6">
            {!! Form::submit('EXIT',['class'=>'btn btn-primary button-control pull-right']) !!}
        </div>
        {!! Form::close() !!}

    </div>

@endsection

@push('scripts')

<script type="text/javascript">
    var item_row = '{{ $item_row }}';

    function addItem() {
        html  = '<tr id="item-row-' + item_row + '">';
        html += '  <td class="text-center" style="vertical-align: middle;">';
        html += '      <button type="button" onclick="$(this).tooltip(\'destroy\'); $(\'#item-row-' + item_row + '\').remove(); totalItem();" data-toggle="tooltip" title="{{ trans('general.delete') }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
        html += '  </td>';
        html += '  <td>';
        html += '      <input class="form-control typeahead" required="required" placeholder="{{ trans('general.form.enter', ['field' => trans_choice('purchase.item_name', 1)]) }}" name="item[' + item_row + '][name]" type="text" id="item-name-' + item_row + '" autocomplete="off">';
        html += '      <input name="item[' + item_row + '][item_id]" type="hidden" id="item-id-' + item_row + '">';
        html += '  </td>';
        html += '  <td>';
        html += '      <input class="form-control text-center" required="required" name="item[' + item_row + '][quantity]" type="text" id="item-quantity-' + item_row + '">';
        html += '  </td>';
        html += '  <td>';
        html += '      <input class="form-control text-right" required="required" name="item[' + item_row + '][price]" type="text" id="item-price-' + item_row + '">';
        html += '  </td>';

        html += '  <td>';
        html += '      <select class="form-control select" name="item[' + item_row + '][tax]" id="item-tax-' + item_row + '">';
        html += '         <option selected="selected" value="">{{ trans('general.form.select.field', ['field' => trans_choice('general.taxes', 1)]) }}</option>';
        @foreach($taxes as $tax_key => $tax_value)
                html += '         <option value="{{ $tax_key }}">{{ $tax_value }}</option>';
        @endforeach
                html += '      </select>';
        html += '  </td>';

        html += '  <td class="text-right" style="vertical-align: middle;">';
        html += '      <span id="item-total-' + item_row + '">0</span>';
        html += '  </td>';

        $('#items tbody #addItem').before(html);
        //$('[rel=tooltip]').tooltip();

        $('[data-toggle="tooltip"]').tooltip('hide');

                item_row++;
    }

    $(document).ready(function(){
        //Date picker
        var minday = new Date();

        $('#pdate').datepicker({
            numberOfMonths: 1,
            showButtonPanel: true,
            minDate: minday,
            dateFormat: 'dd/mm/yy',
            maxDate: minday
        });

        var autocomplete_path = "{{ url('autocomplete.productlist') }}";

        $(document).on('click', '.form-control.typeahead', function() {
            input_id = $(this).attr('id').split('-');

            item_id = parseInt(input_id[input_id.length-1]);

            $(this).typeahead({
                minLength: 3,
                displayText:function (data) {
                    return data.name;
                },
                source: function (query, process) {
                    $.ajax({
                        url: autocomplete_path,
                        type: 'GET',
                        dataType: 'JSON',
                        data: 'query=' + query ,
                        success: function(data) {
                            return process(data);
                        }
                    });
                },
                afterSelect: function (data) {
                    $('#item-id-' + item_id).val(data.item_id);
                    $('#item-quantity-' + item_id).val('1');
                    $('#item-price-' + item_id).val(data.unit_price);

                    $('#item-tax-' + item_id).val(data.tax_id);

                    // This event Select2 Stylesheet
                    $('#item-tax-' + item_id).trigger('change');

                    $('#item-total-' + item_id).html(data.total);

                    totalItem();
                }
            });
        });

        $(document).on('change', '#items tbody select', function(){
            totalItem();
        });

        $(document).on('keyup', '#items tbody .form-control', function(){
            totalItem();
        });

        {{--$(document).on('change', '#customer_id', function (e) {--}}
            {{--$.ajax({--}}
                {{--url: '{{ url("incomes/customers/currency") }}',--}}
                {{--type: 'GET',--}}
                {{--dataType: 'JSON',--}}
                {{--data: 'customer_id=' + $(this).val(),--}}
                {{--success: function(data) {--}}
                    {{--$('#currency_code').val(data.currency_code);--}}

                    {{--// This event Select2 Stylesheet--}}
                    {{--$('#currency_code').trigger('change');--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    });

    function totalItem() {
        $.ajax({
            url: '{{ url("products/totalItem") }}',
            type: 'POST',
            dataType: 'JSON',
            data: $('#currency_code, #paid_amt, #discount,  #items input[type=\'text\'],#items input[type=\'hidden\'], #items textarea, #items select'),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(data) {
                if (data) {
                    $.each( data.items, function( key, value ) {
                        $('#item-total-' + key).html(value);
                    });

                    $('#sub-total').html(data.sub_total);
                    $('#tax-total').html(data.tax_total);
                    $('#grand-total').html(data.grand_total);
                    $('#due-amt').html(data.due_amt);

                }
            }
        });
    }

    $(function (){
        $(document).on("focus", "input:text", function() {
            $(this).select();
        });
    });

</script>

@endpush

