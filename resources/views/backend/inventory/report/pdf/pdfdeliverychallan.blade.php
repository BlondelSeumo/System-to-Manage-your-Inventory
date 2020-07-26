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
            font-size:10pt;
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

<div>
    <table style="width:100%" class="table">
        <tr>
            <td style="width:30%"></td>
            <td style="width:60%">
                <table style="width:100%" class="table order-bank">
                    <thead>
                    <tr>
                        <td style="width:70%; border-bottom-width:1px;" colspan="2"><span style="text-align:center; border: #000000; font-family:times;font-weight:bold;font-size:15pt;color:#000000; ">Delivery Challan No: {!! $challan->challan_no !!}</span></td>
                    </tr>
                    </thead>
                </table>
            </td>
            <td style="width:10%"></td>
        </tr>
    </table>
</div>

@if(!empty($challan))
    <div class="container">

        <table>

            <tr>

                <td width="50%"><strong>Billed To:</strong><br>
                    {!! $challan->relationship->name !!}<br>
                    {{--                            {!! $invoice->relationship->street !!}<br>--}}
                    {!! $challan->relationship->address !!}<br>
                    {!! $challan->relationship->country !!}

                </td>

                <td width="50%" style="text-align: right">
                    <address>
                        <strong></strong><br>
                        Challan No: {!! $challan->challan_no !!}<br>
                        {{--                            {!! $invoice->relationship->street !!}<br>--}}
                        Challan Date: {!! \Carbon\Carbon::parse($challan->cdate)->format('F d, Y') !!}<br>

                    </address>
                </td>
            </tr>
        </table>

        <div class="row"></div>

        <div class="row">

            <table class="table order-bank">
                <thead>
                <tr class="row-line" style="border-bottom: solid">
                    <th width="15%"><strong>SL</strong></th>
                    <th width="60%"><strong>Item</strong></th>
                    <th width="25%" style="text-align: right"><strong>Quantity</strong></th>
                    {{--<th width="15%" style="text-align: right"><strong>Unit Price</strong></th>--}}
                    {{--<th width="15%" style="text-align: right"><strong>Tax</strong></th>--}}
                    {{--<th width="20%" style="text-align: right"><strong>Totals</strong></th>--}}
                </tr>



                </thead>
                <tbody>
                @foreach($items as $i=>$item)
                    <tr class="row-line" style="line-height: 200%;">
                        <td width="15%" style="border-bottom-width:0.2px;"> {!! $i + 1 !!} </td>
                        <td width="60%" style="border-bottom-width:0.2px;">{!! $item->item->name !!}</td>
                        <td width="25%" style="border-bottom-width:0.2px; text-align: right">{!! number_format($item->quantity,2) !!} {!! $item->item->unit_name  !!}</td>
{{--                        <td width="15%" style="border-bottom-width:0.2px; text-align: right">{{ number_format($item->unit_price,2)}}</td>--}}
{{--                        <td width="15%" style="border-bottom-width:0.2px; text-align: right">{{ number_format($item->tax_total,2)}}</td>--}}
{{--                        <td width="20%" style="border-bottom-width:0.2px; text-align: right">{{ number_format($item->total_price,2)}}</td>--}}
                    </tr>

                @endforeach
                </tbody>
                <tfoot>


                </tfoot>

            </table>
        </div>
    </div>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
