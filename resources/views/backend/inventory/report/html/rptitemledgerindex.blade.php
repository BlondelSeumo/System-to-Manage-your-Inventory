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
                            <li class="active">Product Ledger</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>
@endsection

@section('content')

    @include('backend.messages.flashmessage')


    <div class="container spark-screen fullpage">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <br/>
                <div><h3>Print Preview Product Ledger</h3></div>
                <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                <br/>


                <div class="div">
                    <br/>
                    {!! Form::open(['url'=>'product.ledger.index', 'method' => 'GET']) !!}

                    <table width="50%" class="table table-responsive table-hover" >

                        <tr>
                            <td width="5%"><label for="type" class="control-label">Product</label></td>
                            <td width="10%">{!! Form::select('product_id',(['' => 'Please Select'] + $products), null , array('id' => 'product_id', 'class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td width="5%"><label for="type" class="control-label" >From Date</label></td>
                            <td width="10%">{!! Form::text('fromdate', \Carbon\Carbon::now()->format('d/m/Y'), array('id' => 'fromdate', 'class' => 'form-control','required','readonly')) !!}</td>

                        </tr>
                        <tr>
                            <td width="5%"><label for="type" class="control-label" >To Date</label></td>
                            <td width="10%">{!! Form::text('todate', \Carbon\Carbon::now()->format('d/m/Y'), array('id' => 'todate', 'class' => 'form-control','required','readonly')) !!}</td>

                        </tr>


                        <tr>
                            <td width="10%"><button name="action" type="submit" value="preview" class="btn btn-info btn-reject pull-left">Preview</button></td>
                            <td width="10%"><button name="action" type="submit" value="print" class="btn btn-primary btn-approve pull-right">Print</button></td>
                        </tr>

                    </table>

                    {!! Form::close() !!}

                </div>
            </div>
            <div style="width: 5px"></div>

            {{--<div class="col-md-2 col-md-offset-1">--}}
                {{--<article>--}}
                    {{--<h1>Help Tips</h1>--}}
                    {{--<p>Enter 8 then you will get the Challan list. Write more to get the list small and the select your expected challan number</p>--}}
                {{--</article>--}}

                {{--<p><strong>Note:</strong> The article tag is not supported in Internet Explorer 8 and earlier versions.</p>--}}
            {{--</div>--}}
        </div>
    </div>

    @if(!empty($data))

        <table class="table table-responsive table-hover table-bordered" width="80%">
            <thead style="background-color: #8eb4cb">
                <tr>
                    <th colspan="5" style="background-color: transparent">{!! $item->name !!} : From {!!\Carbon\Carbon::parse($fromdate)->format('d/m/Y') !!} To {!! \Carbon\Carbon::parse($todate)->format('d/m/Y') !!}</th>
                </tr>

                <tr>
                    <th>Date</th>
                    <th>Ref No</th>
                    <th>Description</th>
                    <th style="text-align: right">In</th>
                    <th style="text-align: right">Out</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="3" style="font-weight: bold">Opening Balance</td>
                <td align="right" style="font-weight: bold">{!! number_format($openingqty,2) !!}</td>
                <td style="font-weight: bold">{!! $item->unit_name !!}</td>
            </tr>

            @foreach($data as $row)
                <tr>
                    <td>{!! \Carbon\Carbon::parse($row->tr_date)->format('d/m/Y') !!}</td>
                    <td>{!! $row->refno !!}</td>
                    <td>{!! $row->reftype !!}</td>
                    <td align="right">{!! $row->received !!}</td>
                    <td align="right">{!! $row->delevered !!}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="font-weight: bold">Periodic Total</td>
                    <td align="right" style="font-weight: bold">{!! $periodsum->received !!}</td>
                    <td align="right" style="font-weight: bold">{!! $periodsum->delevered !!}</td>
                </tr>
                <tr>
                    <td colspan="4" style="font-weight: bold">Current Balance</td>
                    <td align="right" style="font-weight: bold">{!! number_format($balance,2) !!}{!! $item->unit_name !!}</td>
                </tr>
            </tfoot>

        </table>
    @endif

@stop

@push('scripts')

<script>

    $(document).ready(function() {
        //Date picker

        var minday = new Date();

        $('#fromdate').datepicker({
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: 'dd/mm/yy',
            maxDate: minday
        });

        $('#todate').datepicker({
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: 'dd/mm/yy',
            maxDate: minday
        });

    });

</script>

@endpush
