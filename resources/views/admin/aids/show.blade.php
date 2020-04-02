@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.aids.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.aids.fields.name')</th>
                            <td field-key='name'>{{ $aid->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.aids.fields.starts_at')</th>
                            <td field-key='starts_at'>{{ $aid->starts_at }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.aids.fields.ends_at')</th>
                            <td field-key='ends_at'>{{ $aid->ends_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.aids.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop