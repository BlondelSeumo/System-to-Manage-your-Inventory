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
                            <li class="active">Approve Requisitions</li>
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

    <div>

        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-4 text-center">
                    <br/>
                    <div><h3>APPROVE PRODUCT REQUISITIONS</h3></div>
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
                    <th>Req No</th>
                    <th>Req Date</th>
                    <th>Req Type</th>
                    <th>product</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


    <!-- editCategoryModal -->

    {{--<div class="modal fade" id="edit-modal" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h4 class="modal-title">Edit Requisitions Data</h4>--}}
                {{--</div>--}}

                {{--<form class="form-horizontal" role="form" action="#" method="POST" >--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="modal-body">--}}

                        {{--<table id="edittable" class="table table-striped edittable">--}}
                            {{--<thead style="background-color: #8eb4cb">--}}
                            {{--<tr>--}}
                                {{--<th>Req No</th>--}}
                                {{--<th>product</th>--}}
                                {{--<th>Quantity</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}

                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<div class="col-md-10 col-md-offset-1">--}}
                            {{--<button type="submit" class="btn btn-primary pull-right">Submit</button>--}}
                            {{--<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


@stop

@push('scripts')

<script>
    $(function() {
        var table= $('#requsistion-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            ajax: 'approve.requisition.data',
            columns: [
                { data: 'refno', name: 'requisitions.refno' },
                { data: 'reqdate', name: 'requisitions.reqdate' },
                { data: 'reqtype', name: 'requisitions.reqtype', orderable: false, searchable: false },
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

            success: function () {
                alert('Requisition Data Approved');
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
                alert('Requisition Data Rejected');
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