@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.vacation.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.vacation.fields.name')</th>
                            <td field-key='name'>{{ $vacation->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vacation.fields.days')</th>
                            <td field-key='days'>{{ $vacation->days }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vacation.fields.repetition')</th>
                            <td field-key='repetition'>{{ $vacation->repetition }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vacation.fields.accumulated')</th>
                            <td field-key='accumulated'>{{ $vacation->accumulated }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vacation.fields.salary-affected')</th>
                            <td field-key='salary_affected'>{{ $vacation->salary_affected }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vacation.fields.can-be-exceeded')</th>
                            <td field-key='can_be_exceeded'>{{ $vacation->can_be_exceeded }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.vacations.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


