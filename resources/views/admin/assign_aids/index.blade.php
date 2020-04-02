@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.assign_aids.title')</h3>

    @can('assign_aid_create')
    <p>
        <a href="{{ route('admin.assign_aid_deps.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new_dep')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_deps_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($assignedDepartments) > 0 ? 'datatable' : '' }} @can('assign_aid_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        <th></th>
                        <th>@lang('quickadmin.departments.fields.title')</th>
                        <th>@lang('quickadmin.aids.title')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($assignedDepartments) > 0)
                        @foreach ($assignedDepartments as $assignedDepartment)
                            <tr data-entry-id="{{ $assignedDepartment->id }}">
                                <td></td>
                                <td field-key='name'>{{ $assignedDepartment->name }}</td>
                                <td field-key='workingPeriods'>{{ $assignedDepartment->aidsStr }}</td>
                                <td>
                                    @can('assign_aid_edit')
                                    <a href="{{ route('admin.assign_aid_deps.edit',[$assignedDepartment->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('assign_aid_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.assign_aid_deps.destroy', $assignedDepartment->id])) !!}
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

    @can('assign_aid_create')
        <p>
            <a href="{{ route('admin.assign_aids.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new_user')</a>

        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_users_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($assignedUsers) > 0 ? 'datatable' : '' }} @can('assign_aid_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        <th></th>
                        <th>@lang('quickadmin.users.fields.title')</th>
                        <th>@lang('quickadmin.aids.title')</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($assignedUsers) > 0)
                        @foreach ($assignedUsers as $assignedUser)
                            <tr data-entry-id="{{ $assignedUser->id }}">
                                <td></td>
                                <td field-key='name'>{{ $assignedUser->name }}</td>
                                <td field-key='workingPeriod'>{{ $assignedUser->aidsStr }}</td>
                                <td>
                                    @can('assign_aid_edit')
                                    <a href="{{ route('admin.assign_aids.edit',[$assignedUser->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('assign_aid_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.assign_aids.destroy', $assignedUser->id])) !!}
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