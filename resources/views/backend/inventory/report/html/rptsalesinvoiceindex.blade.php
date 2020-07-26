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


    <div class="container spark-screen fullpage">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <br/>
                <div><h3>Print Preview Sales Invoice</h3></div>
                <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                <br/>


                <div class="div">
                    <br/>
                    {!! Form::open(['url'=>'print.invoice.index', 'method' => 'GET']) !!}

                    <table width="50%" class="table table-responsive table-hover" >

                        <tr>
                            <td width="5%"><label for="type" class="control-label">Customer Name</label></td>
                            <td width="10%">{!! Form::select('relationship_id',(['' => 'Please Select'] + $customers), null , array('id' => 'relationship_id', 'class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td width="5%"><label for="type" class="control-label" >Invoice Date</label></td>
                            <td width="10%">{!! Form::text('invoicedate', null, array('id' => 'invoicedate', 'class' => 'form-control','required','readonly')) !!}</td>

                        </tr>
                        <tr>
                            <td width="5%"><label for="invoiceno" class="control-label">Invoice No</label></td>
                            <td width="10%">{!! Form::text('invoiceno', null, array('id' => 'invoiceno', 'class' => 'invoiceno form-control','required')) !!}</td>
                            {!! Form::hidden('id', null, array('id' => 'id')) !!}
                        </tr>

                        <tr>
                            <td width="10%"><button name="submittype" type="submit" value="preview" class="btn btn-info btn-reject pull-left">Preview</button></td>
                            <td width="10%"><button name="submittype" type="submit" value="print" class="btn btn-primary btn-approve pull-right">Print</button></td>
                        </tr>

                    </table>

                    {!! Form::close() !!}

                </div>
            </div>
            <div style="width: 5px"></div>

            <div class="col-md-2 col-md-offset-1">
                <article>
                    <h1>Help Tips</h1>
                    <p>Enter 6 then you will get the invoice list. Write more to get the list small and the select your expected invoice number</p>
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

        $('#invoicedate').datepicker({
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: 'dd/mm/yy',
            maxDate: minday
        });
    });

    $( function() {
        $( "#invoiceno" ).autocomplete({
            source: "invoice.autocomplete",

            select: function(event, ui) {

                $("#id").val(ui.item.id);
            }
        });
    });

</script>

@endpush
