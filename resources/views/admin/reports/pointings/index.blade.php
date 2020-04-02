@extends('layouts.app')

@section('content')
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
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                <tr>
                    <th>@lang('quickadmin.reports.vacations.fields.user_name')</th>
                    <th>@lang('quickadmin.reports.vacations.fields.department')</th>
                    <th>@lang('quickadmin.reports.total_presence_days')</th>
                    <th>@lang('quickadmin.reports.total_absence_days')</th>
                    <th>@lang('quickadmin.pointings.fields.total_rest_days')</th>
                    <th>@lang('quickadmin.reports.total_work_hours')</th>
                    <th>@lang('quickadmin.reports.total_effective_working_hours')</th>
                    <th>@lang('quickadmin.reports.total_latency_hours')</th>
                    <th>@lang('quickadmin.pointings.fields.plus_sum')</th>
                    <th>@lang('quickadmin.pointings.fields.diff_working_hours')</th>

                    {{-- <th>@lang('quickadmin.users.fields.hire-date')</th>
                    <th>@lang('quickadmin.users.fields.email')</th>
                    <th>@lang('quickadmin.users.fields.role')</th>
                    <th>@lang('quickadmin.users.fields.matriculate')</th>
                    <th>@lang('quickadmin.users.fields.identity-number')</th>
                    <th>@lang('quickadmin.users.fields.sex')</th>
                    <th>@lang('quickadmin.users.fields.salary')</th>
                    <th>@lang('quickadmin.users.fields.phone')</th>
                    <th>@lang('quickadmin.users.fields.address')</th>
                    <th>@lang('quickadmin.users.fields.situation')</th>
                    <th>@lang('quickadmin.users.fields.nationality')</th>
                    <th>@lang('quickadmin.users.fields.birth-date-h')</th>
                    <th>@lang('quickadmin.users.fields.birth-date-m')</th> --}}
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                    @if(auth()->user()->hasRole(1))
                           <tr data-entry-id="{{ $user->id }}">
                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='department'>{{ $user->department->name }}</td>
                            <td field-key='totalPresenceDays'>{{ $user->totalPresenceDays }}</td>
                            <td field-key='totalAbsenceDays'>{{ $user->totalAbsenceDays }}</td>
                            <td field-key='totalRestDays'>{{ $user->totalRestDays }}</td>
                            <td field-key='WorkHours'>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalWorkHours,
                        'minutes' => $user->totalWorkMinutes
                        ]) }}</td>
                            <td field-key='EffectiveWorkingHours'>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalEffectiveWorkingMinutes
                        ]) }}</td>
                            <td field-key='totalLatencyHours'>{{ trans('quickadmin.format.hours_minutes', [
                        {{-- 'hours' => $user->totalWorkHours - $user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalWorkMinutes - $user->totalEffectiveWorkingMinutes --}}
                         'hours' => $user->totalLatencyHours,
                        'minutes' => $user->totalLatencyMinutes
                        ]) }}</td>
                        <td>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => intdiv($user->totalPlusMinutes, 60),
                        'minutes' => ($user->totalPlusMinutes % 60)
                        ]) }}

                         </td>
                        <td>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalWorkHours-$user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalWorkMinutes-$user->totalEffectiveWorkingMinutes
                        ]) }}

                          </td>
                            {{-- <td field-key="hire-date">{{ $user->hire_date }}</td>
                            <td field-key="email">{{ $user->email }}</td>
                            <td field-key="role">{{ $user->role ? $user->role->name : '-' }}</td>
                            <td field-key="matriculate">{{ $user->matriculate }}</td>
                            <td field-key="identity-number">{{ $user->identity_number }}</td>
                            <td field-key="sex">@if($user->sex)@lang('quickadmin.users.sex.' . $user->sex)@endif</td>
                            <td field-key="salary">{{ $user->salary }}</td>
                            <td field-key="phone">{{ $user->phone }}</td>
                            <td field-key="address">{{ $user->address }}</td>
                            <td field-key="situation">{{ $user->situation }}</td>
                            <td field-key="nationality">{{ $user->nationality }}</td>
                            <td field-key="birth-date-h">{{ $user->birth_date_h }}</td>
                            <td field-key="birth-date-h">{{ $user->birth_date_h }}</td> --}}
                            <td>
                                <a href="{{ route('admin.reports.pointings.show', $user->id) }}" class="btn btn-xs btn-primary">
                                    @lang('quickadmin.qa_view')
                                </a>
                            </td>
                        </tr> 
                    @elseif($user->role->id ==4)
                            <tr data-entry-id="{{ $user->id }}">
                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='department'>{{ $user->department->name }}</td>
                            <td field-key='totalPresenceDays'>{{ $user->totalPresenceDays }}</td>
                            <td field-key='totalAbsenceDays'>{{ $user->totalAbsenceDays }}</td>
                            <td field-key='WorkHours'>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalWorkHours,
                        'minutes' => $user->totalWorkMinutes
                        ]) }}</td>
                            <td field-key='EffectiveWorkingHours'>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalEffectiveWorkingMinutes
                        ]) }}</td>
                            <td field-key='totalLatencyHours'>{{ trans('quickadmin.format.hours_minutes', [
                        {{-- 'hours' => $user->totalWorkHours - $user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalWorkMinutes - $user->totalEffectiveWorkingMinutes --}}
                         'hours' => $user->totalLatencyHours,
                        'minutes' => $user->totalLatencyMinutes 
                        ]) }}</td>
                        <td>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => intdiv($user->totalPlusMinutes, 60),
                        'minutes' => ($user->totalPlusMinutes % 60)
                        ]) }}

                         </td>
                        <td>{{ trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalWorkHours-$user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalWorkMinutes-$user->totalEffectiveWorkingMinutes
                        ]) }}

                          </td>
                            {{-- <td field-key="hire-date">{{ $user->hire_date }}</td>
                            <td field-key="email">{{ $user->email }}</td>
                            <td field-key="role">{{ $user->role ? $user->role->name : '-' }}</td>
                            <td field-key="matriculate">{{ $user->matriculate }}</td>
                            <td field-key="identity-number">{{ $user->identity_number }}</td>
                            <td field-key="sex">@if($user->sex)@lang('quickadmin.users.sex.' . $user->sex)@endif</td>
                            <td field-key="salary">{{ $user->salary }}</td>
                            <td field-key="phone">{{ $user->phone }}</td>
                            <td field-key="address">{{ $user->address }}</td>
                            <td field-key="situation">{{ $user->situation }}</td>
                            <td field-key="nationality">{{ $user->nationality }}</td>
                            <td field-key="birth-date-h">{{ $user->birth_date_h }}</td>
                            <td field-key="birth-date-h">{{ $user->birth_date_h }}</td> --}}
                            <td>
                                <a href="{{ route('admin.reports.pointings.show', $user->id) }}" class="btn btn-xs btn-primary">
                                    @lang('quickadmin.qa_view')
                                </a>
                            </td>
                        </tr>
                    @endif
                        
                    @endforeach
                @else
                    <tr>
                        {{-- <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td> --}}
                        <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    {{-- <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th> --}}
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script src="//cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                },
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ],
                pageLength: 10,
            } );
        } );
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
