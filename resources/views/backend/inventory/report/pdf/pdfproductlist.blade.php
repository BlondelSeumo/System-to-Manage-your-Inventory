<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    {{--<link rel="stylesheet" type="text/css" href="src/common/css/bootstrap.min.css" />--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<script type="text/javascript" src="src/common/js/bootstrap.min.js"></script>--}}

    <style>
        table.table {
            width:100%;
            margin:0;
            background-color: #ffffff;
        }

        table.order-bank {
            width:100%;
            margin:0;
        }
        table.order-bank th{
            padding:5px;
        }
        table.order-bank td {
            padding:5px;
            background-color: #ffffff;
        }
        tr.row-line th {
            border-bottom-width:1px;
            border-top-width:1px;
            border-right-width:1px;
            border-left-width:1px;
        }
        tr.row-line td {
            border-bottom:none;
            border-bottom-width:1px;
            font-size:8pt;
        }
        th.first-cell {
            text-align:left;
            border:1px solid red;
            color:blue;
        }
        div.order-field {
            width:100%;
            backgroundr: #ffdab9;
            border-bottom:1px dashed black;
            color:black;
        }
        div.blank-space {
            width:100%;
            height: 50%;
            margin-bottom: 100px;
            line-height: 10%;
        }
    </style>
</head>
<body>

<table border="0" cellpadding="0" class="table">

    <tr>
        {{--<td width="33%"><img src=  "/home/mumanupolyester/public_html/accounts/images/mumanu_b.jpg" style="width:250px;height:60px;"></td>--}}
        <td width="100%"><h1 style="text-align: center; font-size:20pt; color: #bf6030"><strong>{!! get_company_name() !!}</strong></h1></td>

    </tr>
    <tr>
        <td colspan="3"><span style="line-height: 100%; text-align:center; font-family:times;font-weight:bold;font-size:15pt;color:black;">{!! get_company_address() !!}</span></td>
    </tr>
    <hr style="height: 2px">


</table>

<div class="row"></div>
<div class="row"></div>

<div>
    <table style="width:100%" class="table">
        <tr>
            <td style="width:30%"></td>
            <td style="width:60%">
                <table style="width:100%" class="table order-bank">
                    <thead>
                    <tr>
                        <td style="width:70%; border-bottom-width:1px;" colspan="2"><span style="text-align:center; border: #000000; font-family:times;font-weight:bold;font-size:15pt;color:#000000; ">Product List</span></td>
                    </tr>
                    </thead>
                </table>
            </td>
            <td style="width:10%"></td>
        </tr>
    </table>
</div>



{{--<div style="text-align:center"><span style="line-height: 40%; text-align:center; font-family:times;font-weight:bold;font-size:15pt;color:black;">COMMERCIAL INVOICE</span></div>--}}
{{--<hr style="height: 2px">--}}
{{--<title>Invoice</title>--}}

{{--<div class="blank-space"></div>--}}

@if(!empty($data))

<div class="container">
    <table class="table order-bank" width="100%" cellpadding="2">

        <thead>
        <tr class="row-line">
            <th width="5%" style="text-align: left; font-size: 10px">SL No</th>
            <th width="9%" style="text-align: left; font-size: 10px">Product Code</th>
            <th width="25%" style="text-align: center; font-size: 10px">Product Name</th>
            <th width="8%" style="text-align: right; font-size: 10px">Opening</th>
            <th width="10%" style="text-align: right; font-size: 10px">Purchased</th>
            <th width="10%" style="text-align: right; font-size: 10px">Sold</th>
            <th width="10%" style="text-align: right; font-size: 10px">On Hand</th>
            <th width="8%" style="text-align: right; font-size: 10px">Committed</th>
            <th width="10%" style="text-align: right; font-size: 10px">Available</th>
            <th width="5%" style="text-align: right; font-size: 10px">Unit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $i=>$item)
            <tr class="row-line" style="line-height: 200%">
                <td width="5%">{!! $i+1 !!}</td>
                <td width="9%">{!! $item->product_code !!}</td>
                <td width="25%">{!! $item->name !!}</td>
                <td width="8%" align="right">{!! number_format($item->opening_qty,0) !!}</td>
                <td width="10%" align="right">{!! number_format($item->received_qty,0) !!}</td>
                <td width="10%" align="right">{!! number_format($item->sell_qty,0) !!}</td>
                <td width="10%" align="right">{!! number_format($item->onhand,0) !!}</td>
                <td width="8%" align="right">{!! number_format($item->committed,0) !!}</td>
                <td width="10%" style="text-align: right">{!! number_format($item->onhand,0) - $item->committed !!}</td>
                <td width="5%">{!! $item->unit_name !!}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        {{--<tr style="line-height: 200%">--}}
        {{--<td style="border-bottom-width:0.2px; font-size:10pt;"></td>--}}
        {{--<td style="border-bottom-width:0.2px; font-size:10pt;" >Total</td>--}}
        {{--<td style="border-bottom-width:0.2px; font-size:10pt; text-align: center">{!! $totalbelcount !!}</td>--}}
        {{--<td style="border-bottom-width:0.2px; font-size:10pt; text-align: right">{!!number_format($totalgrosswt,2) !!}</td>--}}
        {{--<td style="border-bottom-width:0.2px; font-size:10pt; text-align: right">{!! number_format($totalnetwt,2) !!}</td>--}}
        {{--</tr>--}}
        </tfoot>

    </table>
</div>

@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
