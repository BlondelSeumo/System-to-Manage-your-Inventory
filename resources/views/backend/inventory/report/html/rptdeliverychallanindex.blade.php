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
                            <li class="active">Delivery Challan</li>
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
                <div><h3>Print Preview Sales Invoice</h3></div>
                <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                <br/>


                <div class="div">
                    <br/>
                    {!! Form::open(['url'=>'print.challan.index', 'method' => 'GET']) !!}

                    <table width="50%" class="table table-responsive table-hover" >

                        <tr>
                            <td width="5%"><label for="type" class="control-label">Customer Name</label></td>
                            <td width="10%">{!! Form::select('relationship_id',(['' => 'Please Select'] + $customers), null , array('id' => 'relationship_id', 'class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td width="5%"><label for="type" class="control-label" >Challan Date</label></td>
                            <td width="10%">{!! Form::text('challandate', \Carbon\Carbon::now()->format('d/m/Y'), array('id' => 'challandate', 'class' => 'form-control','required','readonly')) !!}</td>

                        </tr>
                        <tr>
                            <td width="5%"><label for="challan_no" class="control-label">Challan No</label></td>
                            <td width="10%">{!! Form::text('challan_no', null, array('id' => 'challan_no', 'class' => 'challan_no form-control','required')) !!}</td>
                            {!! Form::hidden('id', null, array('id' => 'id')) !!}
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

            <div class="col-md-2 col-md-offset-1">
                <article>
                    <h1>Help Tips</h1>
                    <p>Enter 8 then you will get the Challan list. Write more to get the list small and the select your expected challan number</p>
                </article>

                {{--<p><strong>Note:</strong> The article tag is not supported in Internet Explorer 8 and earlier versions.</p>--}}
            </div>
        </div>
    </div>

@stop

@push('scripts')

<script>

    $(document).ready(function() {
        //Date picker

        var minday = new Date();

        $('#challandate').datepicker({
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: 'dd/mm/yy',
            maxDate: minday
        });
    });

    $( function() {
        $( "#challan_no" ).autocomplete({
            source: "delivery.autocomplete",

            select: function(event, ui) {

                $("#id").val(ui.id);
            }
        });
    });

</script>

@endpush
