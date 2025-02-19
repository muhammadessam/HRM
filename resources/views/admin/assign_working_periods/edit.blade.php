@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.assign-working-periods.title')</h3>
    {!! Form::open(['method' => 'PUT', 'route' => ['admin.assign_working_periods.update', $user->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', trans('quickadmin.users.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('user_id', $user->name, ['class' => 'form-control', 'required' => '', 'readonly' => 'readonly']) !!}
                    {!! Form::hidden('user_id', $user->id, ['class' => 'form-control', 'readonly' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('working_period_id', trans('quickadmin.working-periods.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('working_period_id[]', $workingPeriods, $user->workingPeriods, ['class' => 'form-control select2', 'required' => '', 'multiple' => 'multiple']) !!}
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