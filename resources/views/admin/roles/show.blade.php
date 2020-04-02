@extends('layouts.app')

@section('style')
    <style>
        .granted {
            color: green;
            font-weight: bold;
        }
        .revoked {
            color: red;
        }
    </style>
@stop

@section('content')
    <h3 class="page-title">@lang('quickadmin.roles.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.roles.fields.title')</th>
                            <td field-key='title'>{{ $role->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            @foreach($permissionGroups as $permissionGroup)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('quickadmin.' . $groupNames[$loop->index] . '.title')
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            @foreach($permissionGroup as $permission)
                                <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2">
                                    <p class="{{ $role->hasPermissionTo($permission) ? 'granted' : 'revoked' }}">
                                        @lang('quickadmin.permissions.types.' . $permission->name)
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="users">
<table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <th>@lang('quickadmin.users.fields.role')</th>
                        <th>@lang('quickadmin.users.fields.matriculate')</th>
                        <th>@lang('quickadmin.users.fields.identity-number')</th>
                        <th>@lang('quickadmin.users.fields.sex')</th>
                        <th>@lang('quickadmin.users.fields.salary')</th>
                        <th>@lang('quickadmin.users.fields.hire-date')</th>
                        <th>@lang('quickadmin.users.fields.phone')</th>
                        <th>@lang('quickadmin.users.fields.address')</th>
                        <th>@lang('quickadmin.users.fields.birth-date-h')</th>
                        <th>@lang('quickadmin.users.fields.birth-date-m')</th>
                        <th>@lang('quickadmin.users.fields.situation')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($users) > 0)
            @foreach ($users as $user)
                <tr data-entry-id="{{ $user->id }}">
                    <td field-key='name'>{{ $user->name }}</td>
                                <td field-key='email'>{{ $user->email }}</td>
                                <td field-key='role'>{{ $user->role->title ?? '' }}</td>
                                <td field-key='matriculate'>{{ $user->matriculate }}</td>
                                <td field-key='identity_number'>{{ $user->identity_number }}</td>
                                <td field-key='sex'>{{ $user->sex }}</td>
                                <td field-key='salary'>{{ $user->salary }}</td>
                                <td field-key='hire_date'>{{ $user->hire_date }}</td>
                                <td field-key='phone'>{{ $user->phone }}</td>
                                <td field-key='address'>{{ $user->address }}</td>
                                <td field-key='birth_date_h'>{{ $user->birth_date_h }}</td>
                                <td field-key='birth_date_m'>{{ $user->birth_date_m }}</td>
                                <td field-key='situation'>{{ $user->situation }}</td>
                                                                <td>
                                    @can('user_view')
                                    <a href="{{ route('admin.users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('user_edit')
                                    <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('user_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="20">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.roles.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


