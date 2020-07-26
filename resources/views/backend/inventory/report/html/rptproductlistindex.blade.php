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
                            <li class="active">Product List</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>
@endsection

@section('content')

    @include('backend.messages.flashmessage')

    <div>
        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <br/>
                    <div><h3>Stock Item List as on : {!! $date !!}</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>


                    <div class="search" id="search">
                        <br/>
                        {!! Form::open(['url'=>'product.list.index', 'method' => 'GET']) !!}

                        <table width="50%" class="table table-responsive table-hover" >

                            <tr>
                                <td width="5%"><label for="type" class="control-label">Date</label></td>
                                <td width="15%">{!!  Form::text('reportdate', \Carbon\Carbon::now()->format('d/m/Y') , array('id' => 'reportdate', 'class' => 'form-control','required','readonly')) !!}</td>
                                {{--<td width="10%"><button name="submittype" type="submit" value="print" class="btn btn-primary btn-approve pull-right">Submit</button></td>--}}
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
            </div>
        </div>
    </div>

    @if(!empty($data))
        <table class="table table-bordered table-responsive table-hover">
            <thead style="background-color: #8eb4cb">
                <tr>
                    <th>SL</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th class="text-right">Opening</th>
                    <th class="text-right">Purchase</th>
                    <th class="text-right">Sold</th>
                    <th class="text-right">On Hand</th>
                    <th class="text-right">Committed</th>
                    <th class="text-right">Available</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $i=>$item)
            <tr>
                <td>{!! $i+1 !!}</td>
                <td>{!! $item->product_code !!}</td>
                <td>{!! $item->name !!}</td>
                <td align="right">{!! number_format($item->opening_qty,0) !!}</td>
                <td align="right">{!! number_format($item->received_qty,0) !!}</td>
                <td align="right">{!! number_format($item->sell_qty,0) !!}</td>
                <td align="right">{!! number_format($item->onhand,0) !!}</td>
                <td align="right">{!! number_format($item->committed,0) !!}</td>
                <td align="right">{!! number_format($item->onhand,0) - $item->committed !!}</td>
                <td>{!! $item->unit_name !!}</td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
                <td colspan="7"></td>
            </tfoot>
        </table>

    @endif

@endsection

@push('scripts')

<script type="text/javascript">

    $(document).ready(function() {
        //Date picker
        var minday = new Date();

        $('#reportdate').datepicker({
            numberOfMonths: 1,
            showButtonPanel: true,
            minDate: minday,
            dateFormat: 'dd/mm/yy',
            maxDate: minday
        });
    });

</script>
