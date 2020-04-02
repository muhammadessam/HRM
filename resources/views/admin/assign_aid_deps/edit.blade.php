@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.assign_aid_deps.title')</h3>
    {!! Form::open(['method' => 'PUT', 'route' => ['admin.assign_aid_deps.update', $department->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('department_id', trans('quickadmin.departments.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('department_id', $department->name, ['class' => 'form-control', 'required' => '', 'readonly' => 'readonly']) !!}
                    {!! Form::hidden('department_id', $department->id, ['class' => 'form-control', 'readonly' => '']) !!}
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
                    {!! Form::label('aid_id', trans('quickadmin.aids.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('aid_id[]', $aids, $department->aids, ['class' => 'form-control select2', 'required' => '', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('aid_id'))
                        <p class="help-block">
                            {{ $errors->first('aid_id') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop