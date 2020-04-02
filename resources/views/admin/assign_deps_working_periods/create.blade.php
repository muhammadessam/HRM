@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.assign-deps-working-periods.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.assign_deps_working_periods.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('department_id', trans('quickadmin.departments.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('department_id'))
                        <p class="help-block">
                            {{ $errors->first('department_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('working_period_id', trans('quickadmin.working-periods.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('working_period_id[]', $workingPeriods, old('working_period_id[]'), ['class' => 'form-control select2', 'required' => '', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('working_period_id'))
                        <p class="help-block">
                            {{ $errors->first('working_period_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop