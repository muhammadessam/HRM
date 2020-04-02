@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.restDays.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.rest_days.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('day', trans('quickadmin.restDays.fields.day').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('day', $days, old('day'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('day'))
                        <p class="help-block">
                            {{ $errors->first('day') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop