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
                            <li class="active">Products Dexcription</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>
@endsection

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    @include('backend.messages.flashmessage')

    <div class="container spark-screen fullpage">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <br/>
                <div><h3>Add Edit Product Description</h3></div>
                <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                <br/>


                <div class="div">
                    <br/>
                    {!! Form::open(['url'=>'product.desc.index', 'method' => 'GET']) !!}

                    <table width="50%" class="table table-responsive table-hover" >

                        <tr>
                            <td width="5%"><label for="name" class="control-label">Product</label></td>
                            <td width="35%">{!! Form::text('name', null, array('id' => 'name', 'class' => 'form-control typeahead','required','autocomplete'=>'off','autofocus')) !!}</td>
                            {!! Form::hidden('id', null, array('id' => 'id')) !!}
                            <td width="10%"><button name="submittype" type="submit" value="print" class="btn btn-primary btn-approve pull-right">Submit</button></td>
                        </tr>

                    </table>

                    {!! Form::close() !!}

                </div>
            </div>
            <div style="width: 5px"></div>

            <div class="col-md-2 col-md-offset-1">
                <article>
                    <h1>Help Tips</h1>
                    <p>Start Writting Product Name, Drop Down will display. Then Select the required Item</p>
                </article>

                <p><strong>Note:</strong> After Selecting Pres Submit Button</p>
            </div>
        </div>
    </div>

    @if(!empty($descdata))
        {!! Form::open(['url'=>'product.desc.post']) !!}
            <div class="col-md-8 col-md-offset-2">


            <div class="panel panel-default padding-left">
            <div class="panel-heading">{!! $product->name !!}</div>
                {!! Form::hidden('product_id', $product->id, array('id' => 'product_id')) !!}

                <table width="60%" class="table table-responsive table-hover">

                    <thead>
                        <tr>
                            <th>Description</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($descdata  as $p=>$row)
                            <tr style="background-color: {{ $p % 2 == 0 ? '#ffffff': '#afafaf' }};">
                                {!! Form::hidden('rowid[]', $row->id, array('id' => 'rowid')) !!}
                                <td>{!! Form::text('description[]', $row->description, array('id' => 'description', 'class' => 'form-control','autocomplete'=>'off','autofocus')) !!}</td>
                            </tr>
                        @endforeach

                        @for($i=0; $i< 10; $i++)
                            <tr style="background-color: {{ $i % 2 == 0 ? '#b3e6ff': '#ffffff' }};">
                                {!! Form::hidden('rowid[]', null, array('id' => 'rowid')) !!}
                                <td>{!! Form::text('description[]', null, array('id' => 'description', 'class' => 'form-control','autocomplete'=>'off')) !!}</td>
                            </tr>

                        @endfor



                    <tr>
                        <td><strong>Special Note</strong></td>
                    </tr>

                            @if(!empty($notedata))
                                <tr>
                                    <td>{!! Form::text('spnote', $notedata->description, array('id' => 'spnote', 'class' => 'form-control')) !!}</td>
                                        {!! Form::hidden('lineid', $notedata->id, array('id' => 'lineid')) !!}
                                </tr>
                                @else
                                <tr>
                                    <td>{!! Form::text('spnote', null , array('id' => 'spnote', 'class' => 'form-control')) !!}</td>
                                    {!! Form::hidden('lineid', null, array('id' => 'lineid')) !!}
                                </tr>
                            @endif
                    </tbody>
                    <tfoot>
                        <td width="10%"><button type="submit" class="btn btn-primary btn-approve pull-left">Submit</button>
                        <button type="submit" class="btn btn-primary btn-approve pull-right">Exit</button></td>
                    </tfoot>
                </table>
            </div>
            </div>
        {!! Form::close() !!}

    @endif



@stop

@push('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        var autocomplete_path = "{{ url('admin.product.list') }}";

        $(document).on('click', '.form-control.typeahead', function() {
//            input_id = $(this).attr('id').split('-');
//            item_id = parseInt(input_id[input_id.length-1]);

            $(this).typeahead({
                minLength: 2,
                displayText:function (data) {
                    return data.name;
                },
                source: function (query, process) {
                    $.ajax({
                        url: autocomplete_path,
                        type: 'GET',
                        dataType: 'JSON',
                        data: 'query=' + query ,
                        success: function(data) {
                            return process(data);
                        }
                    });
                },
                afterSelect: function (data) {
                    $('#id').val(data.item_id);
                }
            });
        });

    });
</script>

@endpush
