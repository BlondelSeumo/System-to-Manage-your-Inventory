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
                            <li class="active">Category</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>


{{--    @include('backend.partials.inventorymenu')--}}
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<div class="col-md-10 col-md-offset-1">--}}
        {{--<div class="well text-center" style="height: 50%; background-color: #f0f0ef">--}}
            {{--<p><strong>ADD EDIT UPDATE DELETE CATEGORIES OF PRODUCT</strong></p>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div>

        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-4 text-center">
                    <br/>
                    <div><h3>CATEGORIES OF PRODUCT</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        {{--<div class="col-lg-10 margin-tb">--}}
            <div class="pull-left">
                {{--<input type="hidden" name="addData" id="addData" value={!! $userPr->add !!}>--}}
                {{--<input type="hidden" name="editData" id="editData" value={!! $userPr->edit !!}>--}}
                {{--<input type="hidden" name="deleteData" id="deleteData" value={!! $userPr->delete !!}>--}}
                <button type="button" class="btn btn-new btn-success"><i class="glyphicon glyphicon-plus"></i>New Category</button>
            </div>
        </div>
    </div>

    @include('backend.messages.flashmessage')

    <!-- Create Item Modal -->

    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Add New Category</h3>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin.categories.add') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">


                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="locale" class="col-md-4 control-label">{!! trans('label.language') !!} : </label>
                            <label for="locale" style="text-align: left" class="col-md-6 control-label">{!! $locale !!}</label>

                            {{--<div class="col-md-6">--}}
                                {{--{!! Form::select('locale', array('0' => 'Please Select', 'en-US' => 'English', 'bn-BD' => 'বাংলা'), null , array('id' => 'locale', 'class' => 'form-control')) !!}--}}
                                {{--@if ($errors->has('locale'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('locale') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{!! trans('label.name') !!} : </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('accno') ? ' has-error' : '' }}">
                            <label for="alias" class="col-md-4 control-label">{!! trans('label.glcode') !!} : </label>

                            <div class="col-md-6">
                                <input id="accno" type="text" class="form-control" name="accno" value="">

                                @if ($errors->has('accno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('accno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{!! trans('button.save') !!}</button>
                        <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">{!! trans('button.close') !!}</button>
                    </div>
                </form>
            </div>



        </div>
    </div>



    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-4" style="overflow-x:auto;">
            <table class="table table-bordered table-hover" id="categories-table">
                <thead style="background-color: #b0b0b0">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    {{--<th>Alias</th>--}}
                    <th>Ledger Code </th>
                    <th>Ledger Value</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
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
                            <form id="details-form" class="form-horizontal" role="form" method="POST" action="{{ url('backend.categories.update') }}">
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
                                        {{--<td width="15%"><label for="locale" class="control-label">Language</label></td>--}}
                                        {{--<td width="35%">{!! Form::select('locale', array('0' => 'Please Select', 'en-US' => 'English', 'bn-BD' => 'বাংলা') , null , array('id' => 'locale', 'class' => 'form-control')) !!}</td>--}}
                                        <td width="15%"><label for="name" class="control-label">{!! trans('label.glcode') !!}</label></td>
                                        <td width="35%">{!! Form::text('accno',null , array('id' => 'accno', 'class' => 'form-control')) !!}</td>

                                    </tr>

                                    <tr>
                                        <td width="15%"><label for="name" class="control-label">{!! trans('label.status') !!}</label></td>
                                        <td width="35%">{!! Form::checkbox('status',null,true, array('id'=>'status')) !!}</td>

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

                        {{--Add Titles in other Languages--}}


                        <div class=" row col-md-8">
                            <form id="locale-form" class="form-horizontal" role="form" method="POST" action="{{ url('category.locale.title') }}">
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

    $(document).ready(function(){
        $('#locale-form').css("display", "none");
    });


    function basicdata() {
        $('#details-form').show();
        $('#locale-form').hide();
    }


    function localeform() {
        $('#details-form').hide();
        $('#locale-form').show();
    }


    $(function() {
        var table= $('#categories-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            ajax: 'admin.categories.data',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
//                { data: 'alias', name: 'alias' },
                { data: 'accno', name: 'accno' },
                { data: 'acc_balance', name: 'acc_balance' },
                { data: 'status', name: 'status', orderable: false, searchable: false, printable: false},
                { data: 'action', name: 'action', orderable: false, searchable: false, printable: false}
            ]
        });

        $("body").on("click", ".btn-edit", function (e) {
            e.preventDefault();

            var url = $(this).data('remote');

            //Ajax Load data from ajax
            $.ajax({
                url: url,
                type: "GET",
                dataType: "JSON",

                success: function(data)
                {
                    $(".tabonedata").remove();
//
//                    var trHTML = '';
                    $.each(data, function (i, item) {
//                        trHTML += '<tr class="tabonedata"><td align="left">' + item.productCode + '</td><td>' +  item.name + '</td><td align="right">' + item.onhand + '</td></tr>';


                        $('[id="name"]').val(item.name);
                        $('[id="accno"]').val(item.accno);
                        $('[id="id"]').val(item.id);

                        if(item.status == 1)
                        {
                            $('[id="status"]').prop('checked', true);
                        }


                    });
//
//                    $('#tabonetable').append(trHTML);

                    $('#modal-details').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Product Details'); // Set title to Bootstrap modal title

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });

        });

    });

    $('#categories-table').on('click', '.btn-delete[data-remote]', function (e) {
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
            $('#categories-table').DataTable().draw(false);
        });
    });


    $(document).ready ( function () {
        //replace document below with enclosing container but below will work too
        $(document).on('click', '.btn-new', function () {
//            if(document.getElementById('addData').value == 1)
//            {
                $("#modal-register").modal()
//            }else {
//                alert('You Do Not Have Permission. Please Contact Administrator')
//                return false
//            }
        });
    });


</script>

@endpush
