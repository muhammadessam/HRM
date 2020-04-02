@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    <a class="btn btn-success" role="button" href="{{ route('admin.users.pointings.index', $user->id) }}">
        @lang('quickadmin.pointings.title')
    </a>
    <a class="btn btn-success" role="button" href="{{ route('admin.users.usedVacations.index', $user->id) }}">
        @lang('quickadmin.usedVacations.title')
    </a>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#basic" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.basic')</a>
                    </li>
                    <li>
                        <a href="#skills" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.skills')</a>
                    </li>
                    <li>
                        <a href="#hiring" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.hiring')</a>
                    </li>
                    <li>
                        <a href="#contract" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.contract')</a>
                    </li>
                    <li>
                        <a href="#attachment" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.attachments')</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="basic">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('quickadmin.users.fields.matriculate')</th>
                                <td field-key='matriculate'>{{ $user->matriculate }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.name')</th>
                                <td field-key='name'>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.identity-number')</th>
                                <td field-key='identity_number'>{{ $user->identity_number }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.birth-date-h')</th>
                                <td field-key='birth_date_h'>{{ $user->birth_date_h }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.birth-date-m')</th>
                                <td field-key='birth_date_m'>{{ $user->birth_date_m }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.sex')</th>
                                <td field-key='sex'>@lang('quickadmin.users.sex.' . $user->sex)</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.situation')</th>
                                <td field-key='situation'>{{ $user->situation }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.nationality')</th>
                                <td field-key='nationality'>{{ $user->nationality }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.address')</th>
                                <td field-key='address'>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.phone')</th>
                                <td field-key='phone'>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.email')</th>
                                <td field-key='email'>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.role')</th>
                                <td field-key='role'>{{ $user->role->name }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="skills">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('quickadmin.degrees.fields.title')</th>
                                <td field-key='degree'>{{ $user->degree->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.specialties.fields.title')</th>
                                <td field-key='specialty'>{{ $user->specialty->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.courses.title')</th>
                                <td field-key='courses'>{{ $user->coursesStr }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.experiences.title')</th>
                                <td field-key='experieces'>{{ $user->experiencesStr }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="hiring">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('quickadmin.users.fields.hire-date')</th>
                                <td field-key='hire_date'>{{ $user->hire_date }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.salary')</th>
                                <td field-key='salary'>{{ $user->salary }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.departments.fields.title')</th>
                                <td field-key='departement'>{{ $user->department->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.deservedVacations.title')</th>
                                <td field-key='deservedVacations'>{{ $user->deservedVacationsStr }}</td>
                            </tr>
                            @if($user->is_working)
                                <tr>
                                <th>@lang('quickadmin.remainingVacations.title')</th>
                                <td field-key='usedVacations'>
                                    <table class="table table-bordered table-striped">
                                        @foreach($user->remainingDeservedVacations as $remainingDeservedVacation)
                                            <tr>
                                                <th>{{ $remainingDeservedVacation['vacation']->name }}</th>
                                                <td field-key='vacation{{ $loop->index }}'>{{ $remainingDeservedVacation['remaining'] }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th>اجازة سنوية</th>
                                            <td field-key='vacation-1'>{{ $user->remainingDaysUntilThisMonth }}</td>
                                        </tr>
                                    </table>
                                </td>
                                </tr>
                                <tr>
                                    <th>@lang('quickadmin.vacation.remainingDaysUntilThisMonth')</th>
                                    <td field-key='remainingDaysUntilThisMonth'>{{ $user->remainingDaysUntilThisMonth }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>@lang('quickadmin.working-periods.title')</th>
                                <td field-key='workingPeriods'>{{ $user->workingPeriodsStr }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.aids.title')</th>
                                <td field-key='aids'>{{ $user->aidsStr }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.restDays.title')</th>
                                <td field-key='restDays'>{{ $user->restDaysStr }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="contract">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('quickadmin.users.fields.hire-end')</th>
                                <td field-key='hire_end'>{{ $user->hire_end }}</td>
                            </tr>
                            <tr>
                                <th>@lang('quickadmin.users.fields.end-reason')</th>
                                <td field-key='end_reason'>{{ $user->end_reason }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="attachment">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('quickadmin.attachments.fields.name')</th>
                                <th>@lang('quickadmin.qa_download')</th>
                            </tr>
                            @foreach($user->attachments as $attachment)
                                <tr>
                                    <td>{{ $attachment->name }}</td>
                                    <td>
                                        <a href="{{ $attachment->link }}" class="btn btn-success" role="button" target="_blank">@lang('quickadmin.qa_download')</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                </div>
            </div>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    
    <script>
        $(function () {
            moment.updateLocale('{{ App::getLocale() }}', {
                week: {dow: 1} // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });

        });
    </script>

@stop
