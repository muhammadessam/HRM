@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pointingFiles.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.pointing_files.store'], 'files' => true]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('file', trans('quickadmin.pointingFiles.fields.file').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('file', old('file'), ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('file'))
                        <p class="help-block">
                            {{ $errors->first('file') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

