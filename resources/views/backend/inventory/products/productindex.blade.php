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
                            <li class="active">Products</li>
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
                    <div><h3>PRODUCTS</h3></div>
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
                <button type="button" class="btn btn-new btn-success"><i class="glyphicon glyphicon-plus"></i>New Product</button>
            </div>
        </div>
    </div>

    <!-- Update Item Modal -->


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
                                            <li><a href="#image-form" onclick="basicimage()"><strong>Image</strong></a></li>
                                            <li><a href="#quantity-form" onclick="quantity()">Quantity & Price</a></li>
                                            <li><a href="#desc-form" onclick="descpn()">Description</a></li>

                                            <li><a href="#locale-form" onclick="localeform()">Titles</a></li>

                                        </ul>
                                    </div><!--/.nav-collapse -->
                                </div>
                            </div>
                        </div>

                        <div class=" row col-md-8">
                            <form id="details-form" class="form-horizontal" role="form" method="POST" action="{{ url('product.details.update') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id" value="">
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
                                            <td width="15%"><label for="locale" class="control-label">Language</label></td>
                                            <td width="35%"><label for="locale" class="control-label">{!! $locale !!}</label></td>
                                            {{--<td width="35%">{!! Form::select('locale', array('0' => 'Please Select', 'en-US' => 'English', 'bn-BD' => 'বাংলা') , null , array('id' => 'locale', 'class' => 'form-control')) !!}</td>--}}
                                            <td width="15%"><label for="name" class="control-label">Name</label></td>
                                            <td width="35%">{!! Form::text('name',null , array('id' => 'name', 'class' => 'form-control')) !!}</td>

                                        </tr>
                                        <tr>
                                            <td width="15%"><label for="category_id" class="control-label">Category</label></td>
                                            <td width="35%">{!! Form::select('category_id', $categories , null , array('id' => 'category_id', 'class' => 'form-control')) !!}</td>
                                            <td width="15%"><label for="subcategory_id" class="control-label">Sub Category</label></td>
                                            <td width="35%">{!! Form::select('subcategory_id', $subcategories , null , array('id' => 'subcategory_id', 'class' => 'form-control')) !!}</td>

                                        </tr>

                                        <tr>
                                            <td width="15%"><label for="brand_id" class="control-label">Brand</label></td>
                                            <td width="35%">{!! Form::select('brand_id', $brands , null , array('id' => 'brand_id', 'class' => 'form-control')) !!}</td>
                                            <td width="15%"><label for="unit_name" class="control-label">Unit</label></td>
                                            <td width="35%">{!! Form::select('unit_name', $units , null , array('id' => 'unit_name', 'class' => 'form-control')) !!}</td>

                                        </tr>

                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <form id="image-form" class="form-horizontal" role="form" method="POST" action="{{ url('product.image.update') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Product Image</label>
                                <input type="hidden" name="id" id="id" value="">

                                <div class="col-md-6" id="prod-image">

                                    <img src="" class="imagepreview" style="width: 100%;" >

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>

                        {{--Product Quantity and price related--}}

                        <div class=" row col-md-8">
                            <form id="quantity-form" class="form-horizontal" role="form" method="POST" action="{{ url('product.details.update') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id" value="">

                                <div class="spark-screen">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <br/>
                                            <div><h3>Price & Quantity Related Information</h3></div>
                                            <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                                            <br/>
                                        </div>
                                        <div style="width: 5px"></div>


                                    </div>
                                </div>

                                <table width="100%" class="table table-sm table-responsive">
                                    <tbody>
                                        <tr>
                                            <td width="25%"><label for="unit_price" class="control-label">Unit Price</label></td>
                                            <td width="25%" align="right">{!! Form::text('unit_price',null , array('id' => 'unit_price', 'class' => 'form-control text-right')) !!}</td>
                                            <td width="25%"><label for="buy_price" class="control-label">Buy Price</label></td>
                                            <td width="25%" align="right">{!! Form::text('buy_price',null , array('id' => 'buy_price', 'class' => 'form-control text-right')) !!}</td>
                                        </tr>
                                        <tr>
                                            <td width="25%"><label for="retail_price" class="control-label">Retail Price</label></td>
                                            <td width="25%" align="right">{!! Form::text('retail_price',null , array('id' => 'retail_price', 'class' => 'form-control text-right')) !!}</td>
                                            <td width="25%"><label for="wholesale_price" class="control-label">Wholesale Price</label></td>
                                            <td width="25%" align="right">{!! Form::text('wholesale_price',null , array('id' => 'wholesale_price', 'class' => 'form-control text-right')) !!}</td>
                                        </tr>

                                        <tr>
                                            <td width="25%"><label for="opening_qty" class="control-label">Opening Stock</label></td>
                                            <td width="25%" align="right">{!! Form::text('opening_qty',null , array('id' => 'opening_qty', 'class' => 'form-control text-right')) !!}</td>
                                            <td width="25%"><label for="opening_value" class="control-label">Opening Price</label></td>
                                            <td width="25%" align="right">{!! Form::text('opening_value',null , array('id' => 'opening_value', 'class' => 'form-control text-right')) !!}</td>
                                        </tr>

                                    </tbody>
                                    <tfoot></tfoot>
                                </table>


                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        {{--*****************************************************--}}


                        <div class=" row col-md-8">
                            <form id="desc-form" class="form-horizontal" role="form" method="POST" action="{{ url('product.details.update') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id" value="">
                                <div class="spark-screen">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <br/>
                                            <div><h3>Description</h3></div>
                                            <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                                            <br/>
                                        </div>
                                        <div style="width: 5px"></div>
                                    </div>
                                </div>

                                <table width="100%" class="table table-sm table-responsive">
                                    <tbody>
                                    <tr>
                                        <td width="15%"><label for="description_short" class="control-label">Description</label></td>
                                        <td width="85%">{!! Form::text('description_short',null , array('id' => 'description_short', 'class' => 'form-control')) !!}</td>

                                    </tr>
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        {{--Add Titles in other Languages--}}


                        <div class=" row col-md-8">
                            <form id="locale-form" class="form-horizontal" role="form" method="POST" action="{{ url('product.locale.title') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id" value="">
                                <div class="spark-screen">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <br/>
                                            <div><h3>Product name in other language</h3></div>
                                            <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                                            <br/>
                                        </div>
                                        <div style="width: 5px"></div>
                                    </div>
                                </div>

                                <table width="100%" class="table table-sm table-responsive">
                                    <tbody>
                                    <tr>
                                        <td width="15%"><label for="locale" class="control-label">Language</label></td>
                                        <td width="85%">{!! Form::select('locale', $locales , array('id' => 'locale', 'class' => 'form-control')) !!}</td>

                                    </tr>
                                    <tr>
                                        <td width="15%"><label for="locale" class="control-label">Title</label></td>
                                        <td width="85%">{!! Form::text('name',null , array('id' => 'name 	', 'class' => 'form-control')) !!}</td>

                                    </tr>
                                    <tr>
                                        <td width="15%"><label for="description" class="control-label">Description</label></td>
                                        <td width="85%">{!! Form::text('description',null , array('id' => 'locale-description', 'class' => 'form-control')) !!}</td>

                                    </tr>

                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>




                    </div>
                </div>
                <div class="modal-footer">
                    <p>This is Modal Footer</p>
                    {{--<a href="#" data-dismiss="modal" class="btn">Close</a>--}}
                    {{--<a href="#" class="btn btn-primary">Save changes</a>--}}
                </div>
            </div>
        </div>
    </div>

    @include('backend.messages.flashmessage')

    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="overflow-x:auto;">
            <table class="table table-bordered table-hover" id="users-table">
                <thead style="background-color: #b0b0b0">
                <tr>
                    <th>id</th>
                    {{--<th>Image</th>--}}
                    <th>Name</th>
                    <th>Category</th>
                    {{--<th>Subcategory</th>--}}
                    {{--<th>Brand</th>--}}
                    <th>Unit</th>
                    <th>Price</th>
                    <th>In Hand</th>
                    <th>Status</th>
                    <th>Action</th>
                    {{--<th>Language</th>--}}
                </tr>
                </thead>
            </table>
        </div>


    </div>

@stop

@push('scripts')

<script>

    $(document).ready(function(){
        $('#image-form').css("display", "none");
        $('#quantity-form').css("display", "none");
        $('#desc-form').css("display", "none");
        $('#locale-form').css("display", "none");


    });


    function basicdata() {
        $('#details-form').show();
        $('#image-form').hide();
        $('#quantity-form').hide();
        $('#desc-form').hide();
        $('#locale-form').hide();
    }

    function basicimage() {
        $('#quantity-form').hide();
        $('#details-form').hide();
        $('#desc-form').hide();
        $('#locale-form').hide();
        $('#image-form').show();

    }

    function quantity() {
        $('#details-form').hide();
        $('#image-form').hide();
        $('#desc-form').hide();
        $('#locale-form').hide();
        $('#quantity-form').show();
    }

    function descpn() {
        $('#details-form').hide();
        $('#image-form').hide();
        $('#quantity-form').hide();
        $('#locale-form').hide();
        $('#desc-form').show();
    }

    function localeform() {
        $('#details-form').hide();
        $('#image-form').hide();
        $('#quantity-form').hide();
        $('#desc-form').hide();
        $('#locale-form').show();
    }

    $(function() {
        var table= $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            ajax: 'admin.product.data',
            columns: [
                { data: 'product_code', name: 'products.product_code' },
//                { data: 'showimage', name: 'showimage', orderable: false, searchable: false, printable: false },
                { data: 'title', name: 'title' },
                { data: 'category.name', name: 'category.name' },
//                { data: 'subcategory.name', name: 'subcategory.name' },
//                { data: 'brand.name', name: 'brand.name', defaultContent: '' },
                { data: 'unit_name', name: 'products.unit_name' },
                { data: 'unit_price', name: 'products.unit_price' },
                { data: 'onhand', name: 'products.onhand' },
                { data: 'status', name: 'status', orderable: false, searchable: false, printable: false},
                { data: 'action', name: 'action', orderable: false, searchable: false, printable: false}
//                { data: 'locale', name: 'locale', orderable: false, searchable: false, printable: false}
            ]
        });

        $("body").on("click", ".btn-edit", function (e) {
            e.preventDefault();

//            var nTds = $('td', this)
//            var id = $(nTds[0]).text()

            var url = $(this).data('remote');

//            alert(id);

            //Ajax Load data from ajax
            $.ajax({
//                url : 'product/ajax_details/' + id,
                url: url,
                type: "GET",
                dataType: "JSON",

                success: function(data)
                {
                    $(".tabonedata").remove();
//
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML += '<tr class="tabonedata"><td align="left">' + item.productCode + '</td><td>' +  item.name + '</td><td align="right">' + item.onhand + '</td></tr>';

                        $('.imagepreview').attr('src', item.image);

                        $('[id="unit_price"]').val(item.unit_price);
                        $('[id="buy_price"]').val(item.buy_price);
                        $('[id="retail_price"]').val(item.retail_price);
                        $('[id="wholesale_price"]').val(item.wholesale_price);

                        $('[id="name"]').val(item.name);
                        $('[id="category_id"]').val(item.category_id);
                        $('[id="subcategory_id"]').val(item.subcategory_id);
                        $('[id="brand_id"]').val(item.brand_id);

                        $('[id="opening_qty"]').val(item.opening_qty);
                        $('[id="opening_value"]').val(item.opening_value);

                        $('[id="unit_name"]').val(item.unit_name);
                        $('[id="locale"]').val(item.locale);

                        $('[id="id"]').val(item.id);

                        $('[id="description"]').val(item.name);
                    });
//
                    $('#tabonetable').append(trHTML);

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
                window.location.href = "product.create.form";
            }else {
                alert('You Do Not Have Permission. Please Contact Administrator')
                return false
            }
        });
    });


</script>

@endpush

