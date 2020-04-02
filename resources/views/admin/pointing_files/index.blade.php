@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    @if(session('alert'))
        @component('components.alert')
            @slot('type')
                {{ session('alert')['type'] }}
            @endslot
            @slot('msg')
                {{ session('alert')['msg'] }}
            @endslot
        @endcomponent
    @endif

    <h3 class="page-title">@lang('quickadmin.pointingFiles.title')</h3>
    @can('pointing_files_create')
        <p>
            <a href="{{ route('admin.pointing_files.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($pointingFiles) > 0 ? 'datatable' : '' }} @can('pointing_files_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('quickadmin.pointingFiles.fields.name')</th>
                    @can('pointing_files_view')
                    <th></th>
                    @endcan
                </tr>
                </thead>

                <tbody>
                @if (count($pointingFiles) > 0)
                    @foreach ($pointingFiles as $pointingFile)
                        <tr data-entry-id="{{ $pointingFile->id }}">
                            <td field-key='id'>{{ $pointingFile->id }}</td>
                            <td field-key='name'>{{ $pointingFile->name }}</td>
                            @can('pointing_files_view')
                            <td field-key='download'>
                                <a href="{{ asset('storage/pointing_files/' . $pointingFile->file) }}" class="btn btn-success" target="_blank">@lang('quickadmin.qa_download')</a>
                            </td>
                            @endcan
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