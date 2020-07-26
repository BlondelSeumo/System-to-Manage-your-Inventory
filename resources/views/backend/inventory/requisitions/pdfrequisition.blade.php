@extends('backend.layouts.pdfmaster')

@section('content')

    <div>
        <table style="width:100%">
            <tr>
                <td style="width:30%"></td>
                <td style="width:60%">
                    <table style="width:100%" class="order-bank">
                        <thead>
                        <tr>
                            <td style="width:70%; border-bottom-width:1px;" colspan="2"><span style="text-align:center; border: #000000; font-family:times;font-weight:bold;font-size:15pt;color:#000000; ">REQUISITION NO: {!! $refno !!}</span></td>
                        </tr>
                        </thead>
                    </table>
                </td>
                <td style="width:10%"></td>
            </tr>
        </table>
    </div>

    <div class="blank-space"></div>

    @if(!empty($data))
        <table class="table order-bank" width="90%" cellpadding="2">

            <thead>
            <tr class="row-line">
                <th width="10%" style="text-align: left; font-size: 10px">SL No</th>
                <th width="10%" style="text-align: left; font-size: 10px">Item Code</th>
                <th width="40%" style="text-align: left; font-size: 10px">Item Name</th>
                <th width="20%" style="text-align: right; font-size: 10px">Quantity</th>
                <th width="20%" style="text-align: center; font-size: 10px">Unit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data->items as $i=>$item)
                <tr>
                    <td width="10%" style="border-bottom-width:1px; font-size:10pt; text-align: left">{!! $i+1 !!}</td>
                    <td width="10%" style="border-bottom-width:1px; font-size:10pt; text-align: left">{!! $item->item->product_code !!}</td>
                    <td width="40%" style="border-bottom-width:1px; font-size:10pt; text-align: left">{!! $item->item->name !!}</td>
                    <td width="20%" style="border-bottom-width:1px; font-size:10pt; text-align: right">{!! number_format($item->quantity,2) !!}</td>
                    <td width="20%" style="border-bottom-width:1px; font-size:10pt; text-align: center">{!! $item->item->unit_name !!}</td>
                </tr>

            @endforeach
            </tbody>
            <tfoot>
            <tr style="line-height: 200%">
                <td colspan="5" style="border-bottom-width:0.2px; font-size:10pt;"></td>
            </tr>
            </tfoot>

        </table>
    @endif
@stop