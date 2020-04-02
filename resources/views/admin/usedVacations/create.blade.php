@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.usedVacations.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.usedVacations.fields.countRemainingDaysPerAnnualVacation')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        @foreach($user->remainingDeservedVacations as $remainingDeservedVacation)
                            <tr>
                                <th>{{ $remainingDeservedVacation['vacation']->name }}</th>
                                <td field-key='vacation{{ $loop->index }}'>{{ $remainingDeservedVacation['remaining'] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th>اجازة سنوية</th>
                            <td field-key='vacation-1'>{{ $user->remainingDaysUntilThisMonth }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.usedVacations.store', $user->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('vacation_id', trans('quickadmin.deservedVacations.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('vacation_id', $deservedVacations, old('vacation_id'), ['class' => 'form-control select2', 'required' => 'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('vacation_id'))
                        <p class="help-block">
                            {{ $errors->first('vacation_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('starts_at', trans('quickadmin.usedVacations.fields.starts_at') . '*', ['class' => 'control-label']) !!}
                    {!! Form::text('starts_at', old('starts_at'), ['class' => 'form-control date', 'placeholder' => '', 'required' => 'required']) !!}
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
                    {!! Form::label('ends_at', trans('quickadmin.usedVacations.fields.ends_at') . '*', ['class' => 'control-label']) !!}
                    {!! Form::text('ends_at', old('ends_at'), ['class' => 'form-control date', 'required' => true]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ends_at'))
                        <p class="help-block">
                            {{ $errors->first('ends_at') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('note', trans('quickadmin.usedVacations.fields.note') . '*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('note', old('note'), ['class' => 'form-control date', 'required' => true]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('note'))
                        <p class="help-block">
                            {{ $errors->first('note') }}
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
        $(function () {
            moment.updateLocale('en', {
                week: {dow: 1} // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "en",
            });

        });
    </script>
@stop

