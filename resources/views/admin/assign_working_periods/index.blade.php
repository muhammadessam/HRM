@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.assign-working-periods.title')</h3>

    @can('assign_working_period_create')
    <p>
        <a href="{{ route('admin.assign_deps_working_periods.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new_dep')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_deps_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($assignedDepartments) > 0 ? 'datatable' : '' }} @can('assign_working_period_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        <th></th>
                        <th>@lang('quickadmin.departments.fields.title')</th>
                        <th>@lang('quickadmin.working-periods.title')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($assignedDepartments) > 0)
                        @foreach ($assignedDepartments as $assignedDepartment)
                            <tr data-entry-id="{{ $assignedDepartment->id }}">
                                <td></td>
                                <td field-key='name'>{{ $assignedDepartment->name }}</td>
                                <td field-key='workingPeriods'>{{ $assignedDepartment->workingPeriodsStr }}</td>
                                <td>
                                    @can('assign_working_period_edit')
                                    <a href="{{ route('admin.assign_deps_working_periods.edit',[$assignedDepartment->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('assign_working_period_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.assign_deps_working_periods.destroy', $assignedDepartment->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @can('assign_working_period_create')
        <p>
            <a href="{{ route('admin.assign_working_periods.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new_user')</a>

        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_users_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($assignedUsers) > 0 ? 'datatable' : '' }} @can('assign_working_period_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        <th></th>
                        <th>@lang('quickadmin.users.fields.title')</th>
                        <th>@lang('quickadmin.working-periods.fields.title')</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($assignedUsers) > 0)
                        @foreach ($assignedUsers as $assignedUser)
                            <tr data-entry-id="{{ $assignedUser->id }}">
                                <td></td>
                                <td field-key='name'>{{ $assignedUser->name }}</td>
                                <td field-key='workingPeriod'>{{ $assignedUser->workingPeriodsStr }}</td>
                                <td>
                                    @can('assign_working_period_edit')
                                    <a href="{{ route('admin.assign_working_periods.edit',[$assignedUser->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('assign_working_period_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.assign_working_periods.destroy', $assignedUser->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop