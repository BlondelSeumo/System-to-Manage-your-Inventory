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
                            <li><a href="{!! url('admin.product.index') !!}">Products</a></li>
                            <li class="active">Add Products</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>
@endsection

@section('content')

    <script type="text/javascript">

        $(document).ready(function() {
//            $('select[name="locale"]').on('change', function() {
//                var locale = $(this).val();
//                if(locale) {
//                    $.ajax({
//                        url: '/language/ajax/' + locale,
//                        type: "GET",
//                        dataType: "json",
//                        success:function(data) {
//                            $('select[name="category_id"]').empty();
//                            $.each(data, function(key, value) {
//                                $('select[name="category_id"]').append('<option value="'+ key +'">'+ value +'</option>');
//                            });
//                        }
//                    });
//                }else{
//                    $('select[name="category_id"]').empty();
//                }
//            });


            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: '/category/ajax/' + category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="subcategory_id"]').empty();
                }
            });


        });

    </script>


    @include('backend.messages.flashmessage')

    <div>

        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-4 text-center">
                    <br/>
                    <div><h3>ADD NEW PRODUCT</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>
                </div>

            </div>
        </div>
    </div>


    <div class="row col-md-8" style="border-right: solid; overflow: scroll; height: 700px">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/product.data.new') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <label for="locale" class="col-md-3 control-label">{!! trans('label.language') !!} : </label>
                <label for="locale" style="text-align: left" class="col-md-8 control-label">{!! $locale !!}</label>
            </div>

            <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Name <span style="color: red">*</span></label>

                <div class="col-md-8">
                    <input id="name" type="text" class="form-control" name="name" value=""  autocomplete="off">

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            <div class="row form-group">
                <label for="hascolor" class="col-md-3 control-label">Have Size & Color</label>
                <input type="checkbox" name="varient" id="varient" value="0" />



                <div class="row mycheckboxdiv form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                    <label for="size_id" class="col-md-3 control-label">Size </label>

                    <div class="col-md-3">
                        {!! Form::select('size_id', $sizes , null , array('id' => 'size_id', 'class' => 'form-control','placeholder' => 'Select Size...')) !!}
                        {{--<input id="size" type="text" class="form-control" name="size" value="" >--}}

                    </div>
                    <label for="color_id" class="col-md-2 control-label">Color </label>
                    <div class="col-md-3">
                        {!! Form::select('color_id', $colors , null , array('id' => 'color_id', 'class' => 'form-control','placeholder' => 'Select Color...')) !!}
                        {{--<input id="color" type="text" class="form-control" name="color" value="">--}}

                    </div>

                </div>

            </div>




            {{--<div id="mycheckboxdiv" style="display:none">--}}
            {{--This content should appear when the checkbox is checked--}}
            {{--</div>--}}


            <div class="row form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                <label for="sku" class="col-md-3 control-label">SKU <span style="color: red">*</span></label>

                <div class="col-md-4">
                    <input id="sku" type="text" class="form-control" name="sku" value="" required autofocus autocomplete="off">

                    @if ($errors->has('sku'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="col-md-1">

                    {!! Form::checkbox('autosku', null, false, array('id'=>'autosku','form-control','big' )) !!}
                </div>
                <label for="autosku" class="col-md-3 control-label" style="text-align: left">SKU Autogenerated</label>
            </div>

            {{--<div class="row form-group{{ $errors->has('relationship_id') ? ' has-error' : '' }}">--}}
                {{--<label for="relationship_id" class="col-md-3 control-label">Suppliers</label>--}}

                {{--<div class="col-md-8">--}}
                    {{--{!! Form::select('relationship_id', $suppliers , null , array('id' => 'relationship_id', 'class' => 'form-control','placeholder' => 'Select Suppliers...')) !!}--}}
                    {{--@if ($errors->has('relationship_id'))--}}
                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('relationship_id') }}</strong>--}}
                                        {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="row form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                <label for="category_id" class="col-md-3 control-label">Category<span style="color: red">*</span></label>

                <div class="col-md-8">
                    {!! Form::select('category_id', $categories , null , array('id' => 'category_id', 'class' => 'form-control','placeholder' => 'Select Category...')) !!}
                    @if ($errors->has('category_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('subcategory_id') ? ' has-error' : '' }}">
                <label for="subcategory_id" class="col-md-3 control-label">Sub Category<span style="color: red">*</span></label>

                <div class="col-md-8">
                    {!! Form::select('subcategory_id', $subcategories , null , array('id' => 'subcategory_id', 'class' => 'form-control','placeholder' => 'Select Category...')) !!}
                    @if ($errors->has('subcategory_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('subcategory_id') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="row  form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                <label for="brand_id" class="col-md-3 control-label">Brand</label>

                <div class="col-md-8">
                    {!! Form::select('brand_id', $brands , null , array('id' => 'brand_id', 'class' => 'form-control','placeholder' => 'Select Brand...')) !!}
                    @if ($errors->has('brand_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('brand_id') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('unit_name') ? ' has-error' : '' }}">
                <label for="unit_name" class="col-md-3 control-label">Unit<span style="color: red">*</span></label>

                <div class="col-md-7">
                    {!! Form::select('unit_name', $units , null , array('id' => 'unit_name', 'class' => 'form-control','placeholder' => 'Select Unit...')) !!}
                    @if ($errors->has('unit_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('unit_name') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="col-md-1">

                    <button type="button" class="btn btn-default btn-primary" data-toggle="modal" data-target="#modal-unit"><i class="glyphicon glyphicon-plus-sign"></i></button>
                </div>
            </div>

            <div class="row form-group{{ $errors->has('model_id') ? ' has-error' : '' }}">
                <label for="model_id" class="col-md-3 control-label">Model</label>

                <div class="col-md-8">
                    {!! Form::select('model_id', $models, null , array('id' => 'model_id', 'class' => 'form-control','placeholder' => 'Select a Model...')) !!}
                    @if ($errors->has('model_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('model_id') }}</strong>
                                    </span>
                    @endif
                </div>

            </div>

            <div class="row form-group{{ $errors->has('tax_id') ? ' has-error' : '' }}">
                <label for="taxgrp_code" class="col-md-3 control-label">Tax</label>

                <div class="col-md-8">
                    {!! Form::select('tax_id',$taxes, null , array('id' => 'tax_id', 'class' => 'form-control','placeholder' => 'Select Tax...')) !!}
                    @if ($errors->has('tax_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('tax_id') }}</strong>
                                    </span>
                    @endif
                </div>

            </div>

            {{--******************* NEEDED IF TAX GROUP ACTIVE********************************--}}

            {{--<div class="row form-group{{ $errors->has('taxgrp_code') ? ' has-error' : '' }}">--}}
            {{--<label for="taxgrp_code" class="col-md-3 control-label">Tax Group</label>--}}

            {{--<div class="col-md-8">--}}
            {{--{!! Form::select('taxgrp_code',$taxes, null , array('id' => 'taxgrp_code', 'class' => 'form-control','placeholder' => 'Select Tax Group...')) !!}--}}
            {{--@if ($errors->has('taxgrp_code'))--}}
            {{--<span class="help-block">--}}
            {{--<strong>{{ $errors->first('taxgrp_code') }}</strong>--}}
            {{--</span>--}}
            {{--@endif--}}
            {{--</div>--}}

            {{--</div>--}}

            {{--*****************************************************--}}
            {{--<div class="row form-group{{ $errors->has('godown_id') ? ' has-error' : '' }}">--}}
                {{--<label for="godown_id" class="col-md-3 control-label">Godown</label>--}}

                {{--<div class="col-md-8">--}}
                    {{--{!! Form::select('godown_id', $godowns , null , array('id' => 'godown_id', 'class' => 'form-control','placeholder' => 'Select Godown...')) !!}--}}
                    {{--@if ($errors->has('godown_id'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('godown_id') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div class="row form-group{{ $errors->has('rack_id') ? ' has-error' : '' }}">--}}

                {{--<label for="rack_id" class="col-md-3 control-label">Rack</label>--}}

                {{--<div class="col-md-8">--}}
                    {{--{!! Form::select('rack_id', $racks , null , array('id' => 'rack_id', 'class' => 'form-control','placeholder' => 'Select Rack...')) !!}--}}
                    {{--@if ($errors->has('rack_id'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('rack_id') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}

            {{--</div>--}}



            {{--<div class="row form-group{{ $errors->has('unit_price') ? ' has-error' : '' }}">--}}
                {{--<label for="unit_price" class="col-md-3 control-label">Unit Price<span style="color: red">*</span></label>--}}

                {{--<div class="col-md-8">--}}
                    {{--<input id="unit_price" type="text" class="form-control" name="unit_price" value="">--}}

                    {{--@if ($errors->has('unit_price'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('unit_price') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}



            {{--<div class="row form-group{{ $errors->has('initialPrice') ? ' has-error' : '' }}">--}}
                {{--<label for="initialPrice" class="col-md-3 control-label">Initial Cost Price</label>--}}

                {{--<div class="col-md-8">--}}
                    {{--<input id="initialPrice" type="text" class="form-control" name="initialPrice" value="">--}}

                    {{--@if ($errors->has('initialPrice'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('initialPrice') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div class="row form-group{{ $errors->has('wholesalePrice') ? ' has-error' : '' }}">--}}
                {{--<label for="wholesalePrice" class="col-md-3 control-label">Whole Sale Price</label>--}}

                {{--<div class="col-md-8">--}}
                    {{--<input id="wholesalePrice" type="text" class="form-control" name="wholesalePrice" value="">--}}

                    {{--@if ($errors->has('wholesalePrice'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('wholesalePrice') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div class="row form-group{{ $errors->has('retailPrice') ? ' has-error' : '' }}">--}}
                {{--<label for="retailPrice" class="col-md-3 control-label">Retail Price</label>--}}

                {{--<div class="col-md-8">--}}
                    {{--<input id="retailPrice" type="text" class="form-control" name="retailPrice" value="">--}}

                    {{--@if ($errors->has('retailPrice'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('retailPrice') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="row form-group{{ $errors->has('reorder_point') ? ' has-error' : '' }}">

                <label for="reorder_point" class="col-md-3 control-label">Re Order Point</label>

                <div class="col-md-8">
                    <input id="reorder_point" type="text" class="form-control" name="reorder_point" value="">

                    @if ($errors->has('reorder_point'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('reorder_point') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            {{--<div class="row form-group{{ $errors->has('openingQty') ? ' has-error' : '' }}">--}}
                {{--<label for="openingQty" class="col-md-3 control-label">Initial Stock On Hand</label>--}}

                {{--<div class="col-md-8">--}}
                    {{--<input id="openingQty" type="text" class="form-control" name="openingQty" value="">--}}

                    {{--@if ($errors->has('openingQty'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('openingQty') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row form-group{{ $errors->has('openingValue') ? ' has-error' : '' }}">--}}
                {{--<label for="openingValue" class="col-md-3 control-label">Initial Stock Value</label>--}}

                {{--<div class="col-md-8">--}}
                    {{--<input id="openingValue" type="text" class="form-control" name="openingValue" value="">--}}

                    {{--@if ($errors->has('openingValue'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('openingValue') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}



            <div class="row form-group{{ $errors->has('description_short') ? ' has-error' : '' }}">
                <label for="description_short" class="col-md-3 control-label">Description Short</label>

                <div class="col-md-8">
                    {!! Form::textarea('description_short',null,['id'=>'description_short','size' => '50x6','class'=>'field']) !!}
                    @if ($errors->has('description_short'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('description_short') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            <div class="row form-group{{ $errors->has('description_long') ? ' has-error' : '' }}">
                <label for="description_long" class="col-md-3 control-label">Description Long</label>

                <div class="col-md-8">
                    {!! Form::textarea('description_long',null,['id'=>'description_long','size' => '50x6','class'=>'field']) !!}
                    @if ($errors->has('description_long'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('description_long') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>




                <!-- bootstrap-imageupload. -->
                <div class="imageupload panel panel-default col-md-10 col-md-offset-1">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">Upload Image(400X520 JPG 24 COLOR)</h3>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default active">File</button>
                            <button type="button" class="btn btn-default">URL</button>
                        </div>
                    </div>
                    <div class="file-tab panel-body">
                        <label class="btn btn-default btn-file">
                            <span>Browse</span>
                            <!-- The file is stored here. -->
                            <input name="imagePath" type="file" name="image-file">
                        </label>
                        <button type="button" class="btn btn-default">Remove</button>
                    </div>
                    <div class="url-tab panel-body">
                        <div class="input-group">
                            <input type="text" class="form-control hasclear" placeholder="Image URL">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-default">Remove</button>
                        <!-- The URL is stored here. -->
                        <input type="hidden" name="image-url">
                    </div>
                </div>




            {{--<div class="row form-group{{ $errors->has('imagePath') ? ' has-error' : '' }}">--}}
                {{--<label for="imagePath" class="col-md-3 control-label">Image</label>--}}

                {{--<div class="col-md-8">--}}
                    {{--<input type="file" name="imagePath" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">--}}

                    {{--@if ($errors->has('imagePath'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('imagePath') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-10 col-md-offset-1">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
            </div>

        </form>

    </div>

    <div style="width: 5px"></div>

    <div class="col-md-2 col-md-offset-1">
        <article>
            <h1>Help Tips</h1>
            <p>Insert All the related data to the related input fields</p>
        </article>

        <p><strong>Note:</strong> Please upload image size width = 400px and Height=520px</p>
    </div>


    <!-- Modal -->
    <!-- Create Unit Modal -->

    <div class="modal fade" id="modal-unit" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-unit-label">Add New Unit</h3>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/unit.new') }}">
                    {{ csrf_field() }}

                    <div class="modal-body">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Unit Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" autofocus required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('formalName') ? ' has-error' : '' }}">
                            <label for="formalName" class="col-md-4 control-label">Formal Name</label>

                            <div class="col-md-6">
                                <input id="formalName" type="text" class="form-control" name="formalName" value="" required>

                                @if ($errors->has('formalName'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('formalName') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('noOfDecimalplaces') ? ' has-error' : '' }}">
                            <label for="noOfDecimalplaces" class="col-md-4 control-label">Decimal Places</label>

                            <div class="col-md-6">
                                <input id="noOfDecimalplaces" type="text" class="form-control" name="noOfDecimalplaces" value="" required>

                                @if ($errors->has('noOfDecimalplaces'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('noOfDecimalplaces') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            <button type="button" class="btn btn-danger pull-left">Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- End Unit Modal -->
@stop

@push('scripts')

<script>

    var $imageupload = $('.imageupload');
    $imageupload.imageupload();


    $(document).ready(function(){


        $('.mycheckboxdiv').css("display", "none");

        $('#varient').change(function(){
            if(this.checked) {
                $(this).next().show();
            } else {
                $(this).next().hide();
            }
        });


        $(document).on('click', '.btn-danger', function () {

            window.location.href = "admin.home";
        });

    });




</script>

@endpush

