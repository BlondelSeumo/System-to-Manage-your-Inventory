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
                            <li class="active">Purchase</li>
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

    @include('backend.messages.flashmessage')

    <div>

        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <br/>
                    <div><h3>Edit Sales : {!! $invoiceno !!}</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>


                    <div class="search" id="search">
                        <br/>
                        {!! Form::open(['url'=>'edit.invoice.index', 'method' => 'GET']) !!}

                        <table width="50%" class="table table-responsive table-hover" >

                            <tr>
                                <td width="5%"><label for="type" class="control-label">Invoice No</label></td>
                                <td width="10%">{!! Form::select('invoiceno',(['' => 'Please Select'] + $sales), null , array('id' => 'invoiceno', 'class' => 'form-control')) !!}</td>
                                <td width="10%"><button name="submittype" type="submit" value="print" class="btn btn-primary btn-approve pull-right">Submit</button></td>
                            </tr>

                        </table>

                        {!! Form::close() !!}

                    </div>
                </div>

                <div style="width: 5px"></div>
            </div>
        </div>
    </div>
    <?php $item_row = 0; ?>
    @if(!empty($data))
        {!! Form::open(['url'=>'edit.invoice.update']) !!}
        {{ csrf_field() }}
        {!! Form::hidden('invoiceno',$invoiceno) !!}
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

                    @foreach($data->items as $i=>$row)

                        <tr id="item-row-{{ $item_row }}">
                            <td class="text-center" style="vertical-align: middle;">
                                <button type="button" onclick="$(this).tooltip('destroy'); $('#item-row-{{ $item_row }}').remove(); totalItem();" data-toggle="tooltip" title="{{ trans('general.delete') }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                            <td>
                                <input class="form-control typeahead" required="required" value="{!! $row->item->name !!}" name="item[{{ $item_row }}][name]" type="text" id="item-name-{{ $item_row }}" autocomplete="off">
                                <input value="{!! $row->product_id !!}" name="item[{{ $item_row }}][item_id]" type="hidden" id="item-id-{{ $item_row }}">
                                <input value="{!! $row->id !!}" name="item[{{ $item_row }}][tr_id]" type="hidden" id="item-trid-{{ $item_row }}">
                            </td>
                            <td>
                                <input name="item[{{ $item_row }}][old_quantity]" type="hidden" id="item-old-quantity-{{ $item_row }}" value="{!! $row->quantity !!}">
                                <input class="form-control text-center" required="required" name="item[{{ $item_row }}][quantity]" type="text" id="item-quantity-{{ $item_row }}" value="{!! $row->quantity !!}">
                            </td>
                            <td>
                                <input class="form-control text-right" required="required" name="item[{{ $item_row }}][price]" type="text" id="item-price-{{ $item_row }}" value="{!! $row->unit_price !!}">
                            </td>
                            <td>
                                {!! Form::select('item[' . $item_row . '][tax]',$taxes , $row->tax_id, ['id'=> 'item-tax-'. $item_row, 'class' => 'form-control', 'placeholder' => trans('general.form.select.field', ['field' => trans_choice('general.taxes', 1)])]) !!}
                            </td>
                            <td class="text-right" style="vertical-align: middle;">
                                <span id="item-total-{{ $item_row }}">0</span>
                            </td>
                        </tr>
                        <?php $item_row++; ?>
                    @endforeach

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

    @endif

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
        html += '      <input name="item[' + item_row + '][tr_id]" type="hidden" id="item-trid-' + item_row + '">';
        html += '      <input name="item[' + item_row + '][old_quantity]" type="hidden" id="item-old-quantity-' + item_row + '">';
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

        {{--$('#item-row-' + item_row + ' .select').select2({--}}
                {{--placeholder: "{{ trans('general.form.select.field', ['field' => trans_choice('general.taxes', 1)]) }}"--}}
                {{--});--}}


                {{--$('#item-row-' + item_row + ' .select2').select2({--}}
                {{--placeholder: "{{ trans('general.form.select.field', ['field' => trans_choice('general.taxes', 1)]) }}"--}}
                {{--});--}}

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


                {{--$(".select2").select2({--}}
                {{--placeholder: "{{ trans('general.form.select.field', ['field' => trans_choice('general.taxes', 1)]) }}"--}}
                {{--});--}}


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

                    totalItem();0
                }
            });
        });

        $(document).on('change', '#items tbody select', function(){
            totalItem();
        });

        $(document).on('keyup', '#items tbody .form-control', function(){
            totalItem();
        });

        $(document).on('change', '#customer_id', function (e) {
            $.ajax({
                url: '{{ url("incomes/customers/currency") }}',
                type: 'GET',
                dataType: 'JSON',
                data: 'customer_id=' + $(this).val(),
                success: function(data) {
                    $('#currency_code').val(data.currency_code);

                    // This event Select2 Stylesheet
                    $('#currency_code').trigger('change');
                }
            });
        });
    });

    function totalItem() {
        $.ajax({
            url: '{{ url("products/totalItem") }}',
            type: 'POST',
            dataType: 'JSON',
            data: $('#currency_code, #items input[type=\'text\'],#items input[type=\'hidden\'], #items textarea, #items select'),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(data) {
                if (data) {
                    $.each( data.items, function( key, value ) {
                        $('#item-total-' + key).html(value);
                    });

                    $('#sub-total').html(data.sub_total);
                    $('#tax-total').html(data.tax_total);
                    $('#grand-total').html(data.grand_total);
                }
            }
        });
    }
</script>

@endpush