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
                            {{--<li><a href="#">Pages</a></li>--}}
                            <li class="active">Product Model</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>
@endsection

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-4 text-center">
                    <br/>
                    <div><h3>PRODUCT MODELS</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pull-left">
                <input type="hidden" name="addData" id="addData" value={!! 1 !!}>
                {{--<input type="hidden" name="editData" id="editData" value={!! $userPr->edit !!}>--}}
                {{--<input type="hidden" name="deleteData" id="deleteData" value={!! $userPr->delete !!}>--}}
                <button type="button" class="btn btn-new btn-success">New Model</button>
            </div>
        </div>
    </div>

    <!-- Create Item Modal -->

    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Add New Model</h3>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('admin.model.add') }}">
                    {{ csrf_field() }}

                    <div class="modal-body">

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="locale" class="col-md-4 control-label">Language</label>

                            <div class="col-md-6">
                                {!! Form::select('locale', array('0' => 'Please Select', 'en-US' => 'English', 'bn-BD' => 'বাংলা'), null , array('id' => 'locale', 'class' => 'form-control')) !!}
                                @if ($errors->has('locale'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('locale') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Product Model</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="" required>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('backend.messages.flashmessage')

    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="overflow-x:auto;">
            <table class="table table-bordered table-hover" id="users-table">
                <thead style="background-color: #b0b0b0">
                <tr>
                    <th>Code</th>
                    <th>Model</th>
                    <th>Description</th>
                    <th>Active</th>
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
        var table= $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            ajax: 'admin.model.data',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'status', name: 'status',orderable: false, searchable: false, printable: false},
                { data: 'action', name: 'action', orderable: false, searchable: false, printable: false}
            ]
        });
    });

    $('#users-table').on('click', '.btn-delete[data-remote]', function (e) {
        e.preventDefault();

        if(document.getElementById('deleteData').value == 0)
        {
            alert('You Do Not Have Permission. Please Contact Administrator')
            return false
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
        }).always(function (data) {
            $('#users-table').DataTable().draw(false);
        });
    });

    $('#users-table').on('click', '.btn-edit', function (e) {
        e.preventDefault();

        if(document.getElementById('editData').value == 0)
        {
            alert('You Do Not Have Edit Permission. Please Contact Administrator')
            return false
        }
    });

    $(document).ready ( function () {
        //replace document below with enclosing container but below will work too
        $(document).on('click', '.btn-new', function () {
            if(document.getElementById('addData').value == 1)
            {
                $("#modal-register").modal()
            }else {
                alert('You Do Not Have Permission. Please Contact Administrator')
                return false
            }
        });
    });


</script>

@endpush
