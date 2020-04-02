@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pointings.fields.manual_add')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.pointings.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', trans('quickadmin.users.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control', 'required' => '']) !!}
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
                    {!! Form::label('day', trans('quickadmin.pointings.fields.day').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('day', old('day'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('day'))
                        <p class="help-block">
                            {{ $errors->first('day') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('period', trans('quickadmin.pointings.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('period', $periods, old('period'), ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('period'))
                        <p class="help-block">
                            {{ $errors->first('period') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('in', trans('quickadmin.pointings.fields.in').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('in', old('in'), ['class' => 'form-control time', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('in'))
                        <p class="help-block">
                            {{ $errors->first('in') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('out', trans('quickadmin.pointings.fields.out').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('out', old('out'), ['class' => 'form-control time', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('out'))
                        <p class="help-block">
                            {{ $errors->first('out') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('reason', trans('quickadmin.pointings.fields.reason'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('reason', old('reason'), ['class' => 'form-control time']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('reason'))
                        <p class="help-block">
                            {{ $errors->first('reason') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('en', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "en",
            });

            $('.time').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
                locale: "en",
            });

        });
    </script>

@stop