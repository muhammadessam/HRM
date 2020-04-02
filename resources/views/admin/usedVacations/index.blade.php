@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    @if(auth()->id() !== $user->id)
        @component('admin.usedVacations.user', ['user' => $user])@endcomponent
    @endif

    <h3 class="page-title">@lang('quickadmin.usedVacations.title')</h3>
    @can('usedVacation_create')
    <p>
        <a href="{{ route('admin.users.usedVacations.create', [$user->id]) }}" class="btn btn-success">
            @lang('quickadmin.qa_add_new')
        </a>
    </p>
    @endcan

    @can('usedVacation_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.users.usedVacations.index', [$user->id]) }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.users.usedVacations.index', [$user->id]) }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($usedVacations) > 0 ? 'datatable' : '' }} @can('usedVacation_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan" id="dt">
                <thead>
                    <tr>
                        @can('usedVacation_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.vacation.fields.title')</th>
                        <th>@lang('quickadmin.usedVacations.fields.starts_at')</th>
                        <th>@lang('quickadmin.usedVacations.fields.ends_at')</th>
                        <th>@lang('quickadmin.usedVacations.fields.days')</th>
                        <th>@lang('quickadmin.usedVacations.fields.note')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($usedVacations) > 0)
                        @foreach ($usedVacations as $usedVacation)
                            <tr data-entry-id="{{ $usedVacation->id }}">
                                @can('usedVacation_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='name'>{{ $usedVacation->vacation->name }}</td>
                                <td field-key='starts_at'>{{ $usedVacation->starts_at }}</td>
                                <td field-key='ends_at'>{{ $usedVacation->ends_at }}</td>
                                <td field-key='days'>{{ $usedVacation->days }}</td>
                                <td field-key='days'>{{ $usedVacation->note }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('usedVacation_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.usedVacations.restore', $user->id, $usedVacation->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('usedVacation_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.usedVacations.perma_del', $user->id, $usedVacation->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('usedVacation_edit')
                                    <a href="{{ route('admin.users.usedVacations.edit', [$user->id, $usedVacation->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('usedVacation_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.usedVacations.destroy', $user->id, $usedVacation->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('usedVacation_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.users.usedVacations.mass_destroy', $user->id) }}'; @endif
        @endcan

    </script>
@endsection