<div class="panel panel-default">
    <div class="panel-heading">
        المستخدم
    </div>

    <div class="panel-body table-responsive">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>@lang('quickadmin.users.fields.name')</th>
                        <td field-key='name'>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <td field-key='email'>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.users.fields.role')</th>
                        <td field-key='role'>{{ $user->role->name }}</td>
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
                        <th>@lang('quickadmin.users.fields.matriculate')</th>
                        <td field-key='matriculate'>{{ $user->matriculate }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.users.fields.identity-number')</th>
                        <td field-key='identity_number'>{{ $user->identity_number }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.users.fields.hire-date')</th>
                        <td field-key='hire_date'>{{ $user->hire_date }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>