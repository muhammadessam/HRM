<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_user')
    </div>

    <div class="panel-body table-responsive">
        <div class="row">
            <div class="col-md-6">
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
                        <th>@lang('quickadmin.users.fields.role')</th>
                        <td field-key='role'>{{ $user->role->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.departments.fields.title')</th>
                        <td field-key='departement'>{{ $user->department->name ?? '' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>