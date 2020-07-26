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
                            <li class="active">Receive</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>
@endsection

@section('content')


    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('backend.messages.flashmessage')

    <div>

        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <br/>
                    <div><h3>Receive Against Purchase Order : {!! $refno !!}</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>


                    <div class="search" id="search">
                        <br/>
                        {!! Form::open(['url'=>'receive.product.index', 'method' => 'GET']) !!}

                        <table width="50%" class="table table-responsive table-hover" >

                            <tr>
                                <td width="5%"><label for="type" class="control-label">Purchase Ref No :</label></td>
                                <td width="10%">{!! Form::select('refno',(['' => 'Please Select'] + $purchase), null , array('id' => 'refno', 'class' => 'form-control')) !!}</td>
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
        {!! Form::open(['url'=>'receive.product.post']) !!}
        {{ csrf_field() }}
        {!! Form::hidden('refno',$refno) !!}
        <div class="form-group col-md-12" style="background-color: rgba(177, 245, 174, 0.33)">
            {!! Form::label('items', 'Items', ['class' => 'control-label']) !!}
            <div class="table-responsive">
                <table class="table table-bordered" id="items">
                    <thead>
                    <tr style="background-color: #f9f9f9;">
                        <th width="40%" class="text-left">Product</th>
                        <th width="20%" class="text-left">Purchased</th>
                        <th width="20%" class="text-right">Receive</th>
                        <th width="20%" class="text-right">Return</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($data->items as $i=>$row)

                        <tr id="item-row-{{ $item_row }}">
                            <td>
                               <span>{!! $row->item->name !!}</span>
                                <input value="{!! $row->product_id !!}" name="item[{{ $item_row }}][item_id]" type="hidden" id="item-id-{{ $item_row }}">
                                <input value="{!! $row->id !!}" name="item[{{ $item_row }}][tr_id]" type="hidden" id="item-trid-{{ $item_row }}">
                                <input name="item[{{ $item_row }}][quantity]" type="hidden" id="item-quantity-{{ $item_row }}" value="{!! $row->quantity !!}">
                                <input name="item[{{ $item_row }}][price]" type="hidden" id="item-price-{{ $item_row }}" value="{!! $row->unit_price !!}">
                                <input name="item[{{ $item_row }}][tax_id]" type="hidden" id="item-tax_id-{{ $item_row }}" value="{!! $row->tax_id !!}">

                            </td>
                            <td>
                                <span>{!! $row->quantity !!}</span>
                            </td>
                            <td>
                                <input class="form-control receive text-right" required="required" name="item[{{ $i }}][receive]" type="text" id="item-receive-{{ $item_row }}" value="{!! $row->quantity !!}">
                            </td>

                            <td>
                                <input class="form-control text-right" required="required" name="item[{{ $item_row }}][return]" type="text" id="item-return-{{ $item_row }}"value="{!! 0 !!}" readonly>
                            </td>

                        </tr>
                        <?php $item_row++; ?>
                    @endforeach


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

        $(document).on('keyup', '#items tbody .form-control', function(){
            returned();
        });
    });

    function returned() {

        for(i=0; i< item_row; i++)
        {
            document.getElementById('item-return-'+ i).value = document.getElementById('item-quantity-'+ i).value - document.getElementById('item-receive-'+ i).value
        }

    }

    $(function (){
        $(document).on("focus", "input:text", function() {
            $(this).select();
        });
    });

</script>

@endpush