@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.assign_aids.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.assign_aids.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', trans('quickadmin.users.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2', 'required' => '']) !!}
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
                    {!! Form::label('aid_id', trans('quickadmin.aids.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('aid_id[]', $aids, old('aid_id[]'), ['class' => 'form-control select2', 'required' => '', 'multiple' => 'multiple']) !!}
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