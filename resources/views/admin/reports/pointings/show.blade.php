@extends('layouts.app')

@section('content')
    @if(auth()->id() !== $user->id)
        @include('components.user_simple', compact('user'))
    @endif

    <h3 class="page-title">@lang('quickadmin.reports.pointings.title')</h3>

    <div class="search-box">
        <form>
            <div class="form-group row">
                <div class="col-md-3">
                    {!! Form::label('start_date', trans('quickadmin.reports.pointings.fields.start_date'), ['class' => 'control-label']) !!}
                    {!! Form::text('start_date', request('start_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::label('end_date', trans('quickadmin.reports.pointings.fields.end_date'), ['class' => 'control-label']) !!}
                    {!! Form::text('end_date', request('end_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                </div>
            </div>
            <input type="submit" value="@lang('quickadmin.qa_search')" class="btn btn-success">
        </form>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">@lang("quickadmin.qa_summary")</div>
        <div class="panel-body">
            <table class="table table-bordered col-md-6">
                <tr>
                    <th>@lang('quickadmin.reports.total_presence_days')</th>
                    <td>{{ $totalPresenceDays }}</td>
                </tr>
                <tr>
                    <th>@lang('quickadmin.reports.total_absence_days')</th>
                    <td>{{ $totalAbsenceDays }}</td>
                </tr>
                <tr>
                    <th>@lang('quickadmin.pointings.fields.total_rest_days')</th>
                    <td>{{$totalRestDays}}</td>
                </tr>
                <tr>
                    <th>@lang('quickadmin.reports.total_work_hours')</th>
                    <td>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $totalWorkHours,
                        'minutes' => $totalWorkMinutes
                        ]) }}
                    </td>
                </tr>
                <tr>
                    <th>@lang('quickadmin.reports.total_effective_working_hours')</th>
                    <td>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $totalEffectiveWorkingHours,
                        'minutes' => $totalEffectiveWorkingMinutes
                        ]) }}
                    </td>
                </tr>
                <tr>
                    <th>@lang('quickadmin.reports.total_latency_hours')</th>
                    <td>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $totalLatencyHours,
                        'minutes' => $totalLatencyMinutes
                        ]) }}

                    </td>
                </tr>
                 <tr>
                    <th>@lang('quickadmin.pointings.fields.plus_sum')</th>
                    <td>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => intdiv($totalPlusMinutes, 60),
                        'minutes' => ($totalPlusMinutes % 60)
                        ]) }}

                    </td>
                </tr>
                <tr>
                    <th>@lang('quickadmin.pointings.fields.diff_working_hours')</th>
                    <td>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $totalWorkHours-$totalEffectiveWorkingHours,
                        'minutes' => $totalWorkMinutes-$totalEffectiveWorkingMinutes
                        ]) }}

                    </td>
                </tr>
                
                
                
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th>@lang('quickadmin.pointings.fields.day')</th>
                    <th>@lang('quickadmin.pointings.fields.supposed_in')</th>
                    <th>@lang('quickadmin.pointings.fields.in')</th>
                    <th>@lang('quickadmin.pointings.fields.in_latency')</th>
                    <th>@lang('quickadmin.pointings.fields.in_plus')</th>
                    <th>@lang('quickadmin.pointings.fields.supposed_out')</th>
                    <th>@lang('quickadmin.pointings.fields.out')</th>
                    <th>@lang('quickadmin.pointings.fields.out_latency')</th>
                    <th>@lang('quickadmin.pointings.fields.out_plus')</th>
                    <th>@lang('quickadmin.pointings.fields.latency_sum')</th>
                    <th>@lang('quickadmin.pointings.fields.plus_sum')</th>
                    <th>@lang('quickadmin.pointings.fields.effective_working_hours')</th>
                    <th>@lang('quickadmin.pointings.fields.needed_working_hours')</th>
                    <th>@lang('quickadmin.pointings.fields.diff_working_hours')</th>
                    <th>@lang('quickadmin.pointings.fields.presence')</th>
                    <th>@lang('quickadmin.pointings.fields.manual_add')</th>
                    <th>@lang('quickadmin.pointings.fields.reason')</th>
                </tr>
                </thead>

                <tbody>
                @if ($pointings->count() > 0)
                    @foreach ($pointings as $pointing)
                        <tr data-entry-id="{{ $pointing->id }}" data-color="{{ $pointing->color }}">
                            <td field-key='day'>{{ $pointing->day_name . ' ' . $pointing->day }}</td>
                            <td field-key='supposed_in'>{{ $pointing->supposed_in }}</td>
                            <td field-key='in'>{{ $pointing->in }}</td>
                            <td field-key='in_latency'>{{ $pointing->in_latency }}</td>
                            <td field-key='in_plus'>{{ $pointing->in_plus }}</td>
                            <td field-key='supposed_out'>{{ $pointing->supposed_out }}</td>
                            <td field-key='out'>{{ $pointing->out }}</td>
                            <td field-key='out_latency'>{{ $pointing->out_latency }}</td>
                            <td field-key='out_plus'>{{ $pointing->out_plus }}</td>
                            <td field-key='latency_sum'>{{ $pointing->latency_sum }}</td>
                            <td field-key='plus_sum'>{{ $pointing->plus_sum }}</td>
                            <td field-key='effective_working_hours'>{{ $pointing->effective_working_hours }}</td>
                            <td field-key='needed_working_hours'>{{ $pointing->needed_working_hours }}</td>
                            <td field-key='diff_working_hours'>{{ $pointing->diff_working_hours }}</td>
                            <td field-key='presence'>{{ $pointing->presence_title }}</td>
                            <td field-key="manual">{{ $pointing->manual  }}</td>
                            <td field-key="reason">{{ $pointing->reason  }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('td', nRow).css('color', nRow.getAttribute('data-color'));
                },
                "order": [],
                "columnDefs": [{
                    "defaultContent": "-",
                    "targets": "_all",
                    "orderable": false
                }],
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ],
                pageLength: 10,
            });
        })
    </script>

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
