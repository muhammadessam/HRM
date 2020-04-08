@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    @can('user_create')
    <p>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('user_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                         @if(auth()->user()->hasRole(1))
                            <tr data-entry-id="{{ $user->id }}">
                                @can('user_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $user->name }}</td>
                                <td field-key='email'>{{ $user->email }}</td>
                                <td field-key='role'>{{ $user->role->name ?? '' }}</td>
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
                                        <a href="{{ route('admin.users.usedVacations.index',[$user->id]) }}" class="btn btn-xs btn-bitbucket">@lang('quickadmin.usedVacations.title')</a>
                                    @endcan
                                    @can('user_edit')
                                        <a href="{{ route('admin.users.pointings.index',[$user->id]) }}" class="btn btn-xs btn-warning">@lang('quickadmin.pointings.title')</a>
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
                         @elseif($user->role->id ==4) 
                            <tr data-entry-id="{{ $user->id }}">
                                @can('user_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $user->name }}</td>
                                <td field-key='email'>{{ $user->email }}</td>
                                <td field-key='role'>{{ $user->role->name ?? '' }}</td>
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
                                        <a href="{{ route('admin.users.usedVacations.index',[$user->id]) }}" class="btn btn-xs btn-bitbucket">@lang('quickadmin.usedVacations.title')</a>
                                    @endcan
                                    @can('user_edit')
                                        <a href="{{ route('admin.users.pointings.index',[$user->id]) }}" class="btn btn-xs btn-warning">@lang('quickadmin.pointings.title')</a>
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
@endif

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
@endsection
@section('javascript')
    <script>
        @can('user_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
        @endcan

    </script>
@endsection