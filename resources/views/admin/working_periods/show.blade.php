@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.working-periods.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.name')</th>
                            <td field-key='name'>{{ $working_period->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.starts-at')</th>
                            <td field-key='starts_at'>{{ $working_period->starts_at }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.finishes-at')</th>
                            <td field-key='finishes_at'>{{ $working_period->finishes_at }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.starts-at-time')</th>
                            <td field-key='starts_at_time'>{{ $working_period->starts_at_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.finishes-at-time')</th>
                            <td field-key='finishes_at_time'>{{ $working_period->finishes_at_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.when_no_in_time')</th>
                            <td field-key='when_no_in_time'>{{ $working_period->when_no_in_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.when_no_out_time')</th>
                            <td field-key='when_no_out_time'>{{ $working_period->when_no_out_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.allowed_in_latency')</th>
                            <td field-key='allowed_in_latency'>{{ $working_period->allowed_in_latency }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.allowed_out_latency')</th>
                            <td field-key='allowed_out_latency'>{{ $working_period->allowed_out_latency }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.fields.hours-needed')</th>
                            <td field-key='hours_needed'>{{ $working_period->hours_needed }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.working_periods.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });

            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });

        });
    </script>

@stop