@extends('backend.layouts.master')

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
                            <li><a href="{!! url('accounts/home') !!}">Home</a></li>
                            <li class="active">Company</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
    </div>
@endsection
@section('content')

    @include('backend.messages.flashmessage')

    <div>

        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-4 text-center">
                    <br/>
                    <div><h3>Company Settings</h3></div>
                    <div style="background-color: #ff0000;height: 2px">&nbsp;</div>
                    <br/>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-10 text-left col-sm-offset-1">

        {!! Form::open(['url'=>'accounts/company/config']) !!}

        <div class="well">
            <div class="form-group">
                {!! Form::label('company_id','Company Code: '.$comp->id, array('class' => 'col-sm-6 control-label')) !!}
                {!! Form::label('comp_name','Company Name: '.$comp->comp_name, array('class' => 'col-sm-6 control-label')) !!}
            </div>
        </div>

        <div class="well col-md-6">

            <div class="form-group{{ $errors->has('cashAcc') ? ' has-error' : '' }}">

                <label for="cashAcc" class="col-md-6 control-label pull-left">Cash Account Group:</label>

                <div class="col-md-4">
                    {!! Form::text('cashAcc', $comp->cash, array('id' => 'cashAcc', 'class' => 'form-control','readonly')) !!}
                    @if ($errors->has('cashAcc'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('cashAcc') }}</strong>
                                </span>
                    @endif
                </div>
            </div>

        </div>
        <div class="well col-md-6">
            <div class="form-group{{ $errors->has('bankAcc') ? ' has-error' : '' }}">

                <label for="bankAcc" class="col-md-6 control-label pull-left">Cash Account Group:</label>

                <div class="col-md-4">
                    {!! Form::text('bankAcc', $comp->bank, array('id' => 'bankAcc', 'class' => 'form-control','readonly')) !!}
                    @if ($errors->has('bankAcc'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('bankAcc') }}</strong>
                                </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="well col-md-6">

            <div class="form-group{{ $errors->has('salesAcc') ? ' has-error' : '' }}">

                <label for="salesAcc" class="col-md-6 control-label pull-left">Sales Account Group:</label>

                <div class="col-md-4">
                    {!! Form::text('salesAcc', $comp->sales, array('id' => 'salesAcc', 'class' => 'form-control','readonly')) !!}
                    @if ($errors->has('salesAcc'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('salesAcc') }}</strong>
                                </span>
                    @endif
                </div>
            </div>

        </div>
        <div class="well col-md-6">
            <div class="form-group{{ $errors->has('purchaseAcc') ? ' has-error' : '' }}">

                <label for="purchaseAcc" class="col-md-6 control-label pull-left">Purchase Account Group:</label>

                <div class="col-md-4">
                    {!! Form::text('purchaseAcc', $comp->purchase, array('id' => 'purchaseAcc', 'class' => 'form-control','readonly')) !!}
                    @if ($errors->has('purchaseAcc'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('purchaseAcc') }}</strong>
                                </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="well col-md-6">

            <div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">

                <label for="project" class="col-md-6 control-label pull-left">Has Project ?</label>

                <div class="col-md-4">
                    {!! Form::checkbox('project', $comp->id, $comp->project) !!}
                    {!! Form::hidden('id', $comp->id, array('id' => 'id',)) !!}
                    @if ($errors->has('project'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('project') }}</strong>
                                </span>
                    @endif
                </div>
            </div>

        </div>
        <div class="well col-md-6">
            <div class="form-group{{ $errors->has('inventory') ? ' has-error' : '' }}">

                <label for="inventory" class="col-md-6 control-label pull-left">Has Inventory ?</label>

                <div class="col-md-4">
                    {!! Form::checkbox('inventory', $comp->id, $comp->inventory) !!}
                    @if ($errors->has('inventory'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('inventory') }}</strong>
                                </span>
                    @endif
                </div>
            </div>
        </div>


        <div class="well col-md-6">

            <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">

                <label for="currency" class="col-md-6 control-label pull-left">Select Currency</label>

                <div class="col-md-4">
                    {!! Form::select('currency',get_currency_list(), $comp->currency , array('id' => 'currency', 'class' => 'form-control')) !!}
                    @if ($errors->has('currency'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('currency') }}</strong>
                                </span>
                    @endif
                </div>
            </div>
        </div>


        <div class="well col-md-6">

            <div class="form-group{{ $errors->has('fp_start') ? ' has-error' : '' }}">

                <label for="fp_start" class="col-md-6 control-label pull-left">Start Date Of Fiscal Period</label>

                <div class="col-md-4">
                    {!! Form::text('fp_start',\Carbon\Carbon::parse($comp->fpstartdate)->format('d/m/Y'), array('id' => 'fp_start', 'class' => 'form-control')) !!}
                    @if ($errors->has('fp_start'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('fp_start') }}</strong>
                                </span>
                    @endif
                </div>
            </div>
        </div>

        @if($comp->posted == false)

            <div class="col-md-6">
                {!! Form::submit('SUBMIT',['class'=>'btn btn-primary button-control','name'=>'action', 'value'=>'NEW']) !!}
            </div>
        @endif

        @if($comp->posted == true)

            <div class="col-md-6">
                {!! Form::submit('UPDATE',['class'=>'btn btn-primary button-control','name'=>'action', 'value'=>'UPDATE']) !!}
            </div>
        @endif
        {!! Form::close() !!}

        {!! Form::open(['url'=>'home', 'method' => 'GET']) !!}

        <div class="col-md-6">
            {!! Form::submit('EXIT',['class'=>'btn btn-primary button-control pull-right']) !!}
        </div>
        {!! Form::close() !!}
        {{--</div>--}}

    </div>

@endsection

@push('scripts')

<script>

    $(function() {
        $("#fp_start").datepicker({dateFormat: "dd/mm/yy"}).val();
    });

</script>

@endpush