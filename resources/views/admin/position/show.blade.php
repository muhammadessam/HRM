@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.departments.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.departments.fields.name')</th>
                            <td field-key='name'>{{ $department->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-periods.title')</th>
                            <td field-key='workingPeriods'>{{ $department->workingPeriodsStr }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.qa_department_chefs')</th>
                            <td field-key='users'>{{ $department->usersStr }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.departments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


