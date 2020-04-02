@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.working-periods.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.working_periods.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.working-periods.fields.name').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('starts_at', trans('quickadmin.working-periods.fields.starts-at').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('starts_at', old('starts_at'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('starts_at'))
                        <p class="help-block">
                            {{ $errors->first('starts_at') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('finishes_at', trans('quickadmin.working-periods.fields.finishes-at').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('finishes_at', old('finishes_at'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('finishes_at'))
                        <p class="help-block">
                            {{ $errors->first('finishes_at') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('starts_at_time', trans('quickadmin.working-periods.fields.starts-at-time').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('starts_at_time', old('starts_at_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('starts_at_time'))
                        <p class="help-block">
                            {{ $errors->first('starts_at_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('finishes_at_time', trans('quickadmin.working-periods.fields.finishes-at-time').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('finishes_at_time', old('finishes_at_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('finishes_at_time'))
                        <p class="help-block">
                            {{ $errors->first('finishes_at_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('when_no_in_time', trans('quickadmin.working-periods.fields.when_no_in_time').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('when_no_in_time', old('when_no_in_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('when_no_in_time'))
                        <p class="help-block">
                            {{ $errors->first('when_no_in_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('when_no_out_time', trans('quickadmin.working-periods.fields.when_no_out_time').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('when_no_out_time', old('when_no_out_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('when_no_out_time'))
                        <p class="help-block">
                            {{ $errors->first('when_no_out_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('allowed_in_latency', trans('quickadmin.working-periods.fields.allowed_in_latency').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('allowed_in_latency', old('allowed_in_latency'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'min' => 0]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('allowed_in_latency'))
                        <p class="help-block">
                            {{ $errors->first('allowed_in_latency') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('allowed_out_latency', trans('quickadmin.working-periods.fields.allowed_out_latency').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('allowed_out_latency', old('allowed_out_latency'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'min' => 0]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('allowed_out_latency'))
                        <p class="help-block">
                            {{ $errors->first('allowed_out_latency') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('hours_needed', trans('quickadmin.working-periods.fields.hours-needed').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('hours_needed', old('hours_needed'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('hours_needed'))
                        <p class="help-block">
                            {{ $errors->first('hours_needed') }}
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

            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });

        });
    </script>

@stop