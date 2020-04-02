@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.vacation.title')</h3>
    
    {!! Form::model($vacation, ['method' => 'PUT', 'route' => ['admin.vacations.update', $vacation->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.vacation.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('days', trans('quickadmin.vacation.fields.days').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('days', old('days'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('days'))
                        <p class="help-block">
                            {{ $errors->first('days') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('repetition', trans('quickadmin.vacation.fields.repetition').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('repetition'))
                        <p class="help-block">
                            {{ $errors->first('repetition') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('repetition', 'y', false, ['required' => '']) !!}
                            Yearly
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('repetition', 'c', false, ['required' => '']) !!}
                            Per Case
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('accumulated', trans('quickadmin.vacation.fields.accumulated').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('accumulated'))
                        <p class="help-block">
                            {{ $errors->first('accumulated') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('accumulated', 'y', false, ['required' => '']) !!}
                            Yes
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('accumulated', 'n', false, ['required' => '']) !!}
                            No
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('salary_affected', trans('quickadmin.vacation.fields.salary-affected').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('salary_affected'))
                        <p class="help-block">
                            {{ $errors->first('salary_affected') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('salary_affected', 'y', false, ['required' => '']) !!}
                            Yes
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('salary_affected', 'n', false, ['required' => '']) !!}
                            No
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('can_be_exceeded', trans('quickadmin.vacation.fields.can-be-exceeded').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('can_be_exceeded'))
                        <p class="help-block">
                            {{ $errors->first('can_be_exceeded') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('can_be_exceeded', 'y', false, ['required' => '']) !!}
                            Yes
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('can_be_exceeded', 'n', false, ['required' => '']) !!}
                            No
                        </label>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

