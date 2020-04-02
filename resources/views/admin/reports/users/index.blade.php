@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reports.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                <tr>
                    <th>@lang('quickadmin.reports.vacations.fields.user_name')</th>
                    <th>@lang('quickadmin.reports.vacations.fields.department')</th>
                    <th>@lang('quickadmin.users.fields.hire-date')</th>
                    <th>@lang('quickadmin.users.fields.email')</th>
                    <th>@lang('quickadmin.users.fields.role')</th>
                    <th>@lang('quickadmin.users.fields.matriculate')</th>
                    <th>@lang('quickadmin.users.fields.identity-number')</th>
                    <th>@lang('quickadmin.users.fields.sex')</th>
                    <th>@lang('quickadmin.users.fields.salary')</th>
                    <th>@lang('quickadmin.users.fields.phone')</th>
                    <th>@lang('quickadmin.users.fields.address')</th>
                    <th>@lang('quickadmin.users.fields.situation')</th>
                    <th>@lang('quickadmin.users.fields.nationality')</th>
                    <th>@lang('quickadmin.users.fields.birth-date-h')</th>
                    <th>@lang('quickadmin.users.fields.birth-date-m')</th>
                </tr>
                </thead>

                <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                    @if(auth()->user()->hasRole(1))
                    <tr data-entry-id="{{ $user->id }}">
                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='department'>{{ $user->department->name }}</td>
                            <td field-key="hire-date">{{ $user->hire_date }}</td>
                            <td field-key="email">{{ $user->email }}</td>
                            <td field-key="role">{{ $user->role ? $user->role->name : '-' }}</td>
                            <td field-key="matriculate">{{ $user->matriculate }}</td>
                            <td field-key="identity-number">{{ $user->identity_number }}</td>
                            <td field-key="sex">@if($user->sex)@lang('quickadmin.users.sex.' . $user->sex)@endif</td>
                            <td field-key="salary">{{ $user->salary }}</td>
                            <td field-key="phone">{{ $user->phone }}</td>
                            <td field-key="address">{{ $user->address }}</td>
                            <td field-key="situation">{{ $user->situation }}</td>
                            <td field-key="nationality">{{ $user->nationality }}</td>
                            <td field-key="birth-date-h">{{ $user->birth_date_h }}</td>
                            <td field-key="birth-date-h">{{ $user->birth_date_h }}</td>
                        </tr>
                    @elseif($user->role->id ==4)
                        <tr data-entry-id="{{ $user->id }}">
                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='department'>{{ $user->department->name }}</td>
                            <td field-key="hire-date">{{ $user->hire_date }}</td>
                            <td field-key="email">{{ $user->email }}</td>
                            <td field-key="role">{{ $user->role ? $user->role->name : '-' }}</td>
                            <td field-key="matriculate">{{ $user->matriculate }}</td>
                            <td field-key="identity-number">{{ $user->identity_number }}</td>
                            <td field-key="sex">@if($user->sex)@lang('quickadmin.users.sex.' . $user->sex)@endif</td>
                            <td field-key="salary">{{ $user->salary }}</td>
                            <td field-key="phone">{{ $user->phone }}</td>
                            <td field-key="address">{{ $user->address }}</td>
                            <td field-key="situation">{{ $user->situation }}</td>
                            <td field-key="nationality">{{ $user->nationality }}</td>
                            <td field-key="birth-date-h">{{ $user->birth_date_h }}</td>
                            <td field-key="birth-date-h">{{ $user->birth_date_h }}</td>
                        </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script src="//cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                },
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ],
                pageLength: 10,
            } );
        } );
    </script>
@stop
