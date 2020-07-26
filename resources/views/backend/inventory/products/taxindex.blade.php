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
                            <li class="active">Taxes</li>
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
                    <div><h3>PRODUCT TAXES</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
            <div class="pull-left">
                <input type="hidden" name="addData" id="addData" value={!! 1 !!}>
                {{--<input type="hidden" name="editData" id="editData" value={!! $userPr->edit !!}>--}}
                {{--<input type="hidden" name="deleteData" id="deleteData" value={!! $userPr->delete !!}>--}}
                <button type="button" class="btn btn-new btn-success"><i class="glyphicon glyphicon-plus"></i>New TAXES</button>
            </div>
        </div>
    </div>

    <!-- Create Item Modal -->

    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Add New TAXES</h3>
                </div>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('admin.tax.add') }}">
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
                            <label for="name" class="col-md-4 control-label">TAX Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('applicableOn') ? ' has-error' : '' }}">
                            <label for="applicableOn" class="col-md-4 control-label">Applicable On</label>

                            <div class="col-md-6">
                                {!! Form::select('applicable_on', array('0' => 'Please Select', 'S' => 'Sales', 'P' => 'Purchase', 'B' => 'Both'), null , array('id' => 'applicable_on', 'class' => 'form-control')) !!}
                                @if ($errors->has('applicable_on'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('applicable_on') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                            <label for="rate" class="col-md-4 control-label">Fixed Amt / Rate (%)</label>

                            <div class="col-md-6">
                                <input id="rate" type="text" class="form-control" name="rate" value="" required>

                                @if ($errors->has('rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('calculating_mode') ? ' has-error' : '' }}">
                            <label for="calculating_mode" class="col-md-4 control-label">Calculating Mode</label>

                            <div class="col-md-6">
                                {!! Form::select('calculating_mode', array('0' => 'Please Select', 'P' => 'Purcentage', 'F' => 'Fixed'), null , array('id' => 'calculating_mode', 'class' => 'form-control')) !!}
                                @if ($errors->has('calculating_mode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('calculating_mode') }}</strong>
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
                        {{--<div class="col-md-10 col-md-offset-1">--}}
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                        {{--</div>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('backend.messages.flashmessage')

    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1" style="overflow-x:auto;">
            <table class="table table-bordered table-hover" id="users-table">
                <thead style="background-color: #b0b0b0">
                <tr>
                    <th>Code</th>
                    <th>Tax Name</th>
                    <th>Applicable On</th>
                    <th>Rate</th>
                    <th>Mode</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1" style="overflow-x:auto;">
            <p>Applicable On : S = Sales; P = Purchase; B = Both</p>
            <p style="text-align: left">Calculating Mode: P = Percentage; F = Fixed </p>
        </div>
    </div>


    {{--Update Data Modal--}}

    <div class="modal" id="modal-details">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="sidebar-nav">
                                <div class="navbar navbar-default" role="navigation">
                                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li><a href="#details-form" onclick="basicdata()"><strong>Details</strong></a></li>
                                            <li><a href="#locale-form" onclick="localeform()">Titles</a></li>

                                        </ul>
                                    </div><!--/.nav-collapse -->
                                </div>
                            </div>
                        </div>

                        <div class=" row col-md-8">
                            <form id="details-form" class="form-horizontal" role="form" method="POST" action="{{ url('backend.units.update') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id">
                                <div class="spark-screen">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <br/>
                                            <div><h3>Basic Information</h3></div>
                                            <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                                            <br/>
                                        </div>
                                        <div style="width: 5px"></div>
                                    </div>
                                </div>

                                <table width="100%" class="table table-sm table-responsive">
                                    <tbody>
                                    <tr>
                                        {{--<td width="15%"><label for="locale" class="control-label">Language</label></td>--}}
                                        {{--<td width="35%">{!! Form::select('locale', array('0' => 'Please Select', 'en-US' => 'English', 'bn-BD' => 'বাংলা') , null , array('id' => 'locale', 'class' => 'form-control')) !!}</td>--}}
                                        <td width="15%"><label for="name" class="control-label">{!! trans('label.name') !!}</label></td>
                                        <td width="35%">{!! Form::text('name',null , array('id' => 'name', 'class' => 'form-control')) !!}</td>

                                    </tr>

                                    <tr>
                                        <td width="15%"><label for="name" class="control-label">{!! trans('label.formal_name') !!}</label></td>
                                        <td width="35%">{!! Form::text('formal_name',null , array('id' => 'formal_name', 'class' => 'form-control')) !!}</td>

                                    </tr>

                                    <tr>
                                        <td width="15%"><label for="name" class="control-label">{!! trans('label.no_of_decimal_place') !!}</label></td>
                                        <td width="35%">{!! Form::text('no_of_decimal_places',null , array('id' => 'no_of_decimal_places', 'class' => 'form-control')) !!}</td>

                                    </tr>

                                    {{--<tr>--}}
                                    {{--<td width="15%"><label for="name" class="control-label">{!! trans('label.status') !!}</label></td>--}}
                                    {{--<td width="35%">{!! Form::checkbox('status',null,true, array('id'=>'status')) !!}</td>--}}

                                    {{--</tr>--}}


                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="submit" class="btn btn-primary pull-right">{!! trans('button.submit') !!}</button>
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{!! trans('button.close') !!}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{--Add Titles in other Languages--}}


                        <div class=" row col-md-8">
                            <form id="locale-form" class="form-horizontal" role="form" method="POST" action="{{ url('unit.locale.title') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id">
                                <div class="spark-screen">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <br/>
                                            <div><h3>Category names in other languages</h3></div>
                                            <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                                            <br/>
                                        </div>
                                        <div style="width: 5px"></div>
                                    </div>
                                </div>

                                <table width="100%" class="table table-sm table-responsive">
                                    <tbody>
                                    <tr>
                                        <td width="15%"><label for="locale" class="control-label">{!! trans('label.locale') !!}</label></td>
                                        <td width="85%">{!! Form::select('locale', $locales , array('id' => 'locale', 'class' => 'form-control')) !!}</td>

                                    </tr>
                                    <tr>
                                        <td width="15%"><label for="locale" class="control-label">{!! trans('label.title') !!}</label></td>
                                        <td width="85%">{!! Form::text('name',null , array('id' => 'name 	', 'class' => 'form-control')) !!}</td>

                                    </tr>
                                    <tr>
                                        <td width="15%"><label for="description" class="control-label">{!! trans('label.description') !!}</label></td>
                                        <td width="85%">{!! Form::text('description',null , array('id' => 'locale-description', 'class' => 'form-control')) !!}</td>

                                    </tr>

                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="submit" class="btn btn-primary pull-right">{!! trans('button.submit') !!}</button>
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{!! trans('button.close') !!}</button>
                                    </div>
                                </div>
                            </form>
                        </div>




                    </div>
                </div>
                <div class="modal-footer">
                    {{--<p>This is Modal Footer</p>--}}
                    {{--<a href="#" data-dismiss="modal" class="btn">Close</a>--}}
                    {{--<a href="#" class="btn btn-primary">Save changes</a>--}}
                </div>
            </div>
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
            ajax: 'admin.tax.data',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'applicable_on', name: 'applicable_on' },
                { data: 'rate', name: 'rate' },
                { data: 'calculating_mode', name: 'calculating_mode' },
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
            data: {method: '_DELETE', submit: true},

            error: function (request, status, error) {
                alert(request.responseText);
            }

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

