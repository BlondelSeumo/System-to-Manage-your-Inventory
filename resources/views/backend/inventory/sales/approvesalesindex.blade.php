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
                            <li class="active">Approve Invoice</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>
@endsection

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div>

        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-4 text-center">
                    <br/>
                    <div><h3>APPROVE SALES INVOICE</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="overflow-x:auto;">
            <table class="table table-striped table-bordered" id="requsistion-table">
                <thead style="background-color: #b0b0b0">
                <tr>
                    <th>Invoice No</th>
                    <th>Invoice Date</th>
                    <th>product</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@stop

@push('scripts')

<script>
    $(function() {
        var table= $('#requsistion-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            ajax: 'approve.invoice.data',
            columns: [
                { data: 'invoiceno', name: 'sales.invoiceno' },
                { data: 'invoicedate', name: 'sales.invoicedate' },
                { data: 'product', name: 'product' },
                { data: 'quantity', name: 'quantity' },
                { data: 'action', name: 'action', orderable: false, searchable: false, printable: false}
            ]
        });

    });

    $('#requsistion-table').on('click', '.btn-approve[data-remote]', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {method: '_POST', submit: true},

            success: function (request, status, error) {
                alert(request);
            },

            error: function (request, status, error) {
                alert(request.responseText);
            }

        }).always(function (data) {
            $('#requsistion-table').DataTable().draw(false);
        });
    });

    $('#requsistion-table').on('click', '.btn-reject[data-remote]', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {method: '_POST', submit: true},

            success: function () {
                alert('Sales Data Rejected');
            },

            error: function (request, status, error) {
                alert(request.responseText);
            }

        }).always(function (data) {
            $('#requsistion-table').DataTable().draw(false);
        });
    });


</script>

@endpush
