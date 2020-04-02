@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.working-periods.title')</h3>
    @can('working_period_create')
        <p>
            <a href="{{ route('admin.working_periods.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

        </p>
    @endcan

    @can('working_period_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.working_periods.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.working_periods.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
        </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($working_periods) > 0 ? 'datatable' : '' }} @can('working_period_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('working_period_delete')
                        @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                    @endcan

                    <th>@lang('quickadmin.working-periods.fields.name')</th>
                    <th>@lang('quickadmin.working-periods.fields.starts-at')</th>
                    <th>@lang('quickadmin.working-periods.fields.finishes-at')</th>
                    <th>@lang('quickadmin.working-periods.fields.starts-at-time')</th>
                    <th>@lang('quickadmin.working-periods.fields.finishes-at-time')</th>
                    <th>@lang('quickadmin.working-periods.fields.when_no_in_time')</th>
                    <th>@lang('quickadmin.working-periods.fields.when_no_out_time')</th>
                    <th>@lang('quickadmin.working-periods.fields.allowed_in_latency')</th>
                    <th>@lang('quickadmin.working-periods.fields.allowed_out_latency')</th>
                    <th>@lang('quickadmin.working-periods.fields.hours-needed')</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($working_periods) > 0)
                    @foreach ($working_periods as $working_period)
                        <tr data-entry-id="{{ $working_period->id }}">
                            @can('working_period_delete')
                                @if ( request('show_deleted') != 1 )<td></td>@endif
                            @endcan

                            <td field-key='name'>{{ $working_period->name }}</td>
                            <td field-key='starts_at'>{{ $working_period->starts_at }}</td>
                            <td field-key='finishes_at'>{{ $working_period->finishes_at }}</td>
                            <td field-key='starts_at_time'>{{ $working_period->starts_at_time }}</td>
                            <td field-key='finishes_at_time'>{{ $working_period->finishes_at_time }}</td>
                            <td field-key='when_no_in_time'>{{ $working_period->when_no_in_time }}</td>
                            <td field-key='when_no_out_time'>{{ $working_period->when_no_out_time }}</td>
                            <td field-key='allowed_in_latency'>{{ $working_period->allowed_in_latency }}</td>
                            <td field-key='allowed_out_latency'>{{ $working_period->allowed_out_latency }}</td>
                            <td field-key='hours_needed'>{{ $working_period->hours_needed }}</td>
                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('working_period_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.working_periods.restore', $working_period->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('working_period_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.working_periods.perma_del', $working_period->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                    @can('working_period_view')
                                        <a href="{{ route('admin.working_periods.show',[$working_period->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('working_period_edit')
                                        <a href="{{ route('admin.working_periods.edit',[$working_period->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('working_period_delete')
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.working_periods.destroy', $working_period->id])) !!}
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
        @can('working_period_delete')
                @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.working_periods.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection