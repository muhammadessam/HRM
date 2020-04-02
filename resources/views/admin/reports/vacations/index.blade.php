@extends('layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css">
@stop

@section('content')
    <h3 class="page-title">@lang('quickadmin.reports.vacations.title')</h3>

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
                    <th>@lang('quickadmin.reports.vacations.fields.deserved_vacations')</th>
                    <th>@lang('quickadmin.reports.vacations.fields.used_vacations')</th>
                    <th>@lang('quickadmin.reports.vacations.fields.balance')</th>
                </tr>
                </thead>

                <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                    @if(auth()->user()->hasRole(1))
                        <tr data-entry-id="{{ $user->id }}">
                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='department'>{{ $user->department->name }}</td>
                            <td field-key='deserved_vacations'>{{ $user->deserved_vacations_str }}</td>
                            <td field-key='used_vacations'>{{ $user->used_vacations_str }}</td>
                            <td field-key='balance'>{{ $user->remainingDaysUntilThisMonth }}</td>
                        </tr>
                    @elseif($user->role->id ==4)    

                        <tr data-entry-id="{{ $user->id }}">
                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='department'>{{ $user->department->name }}</td>
                            <td field-key='deserved_vacations'>{{ $user->deserved_vacations_str }}</td>
                            <td field-key='used_vacations'>{{ $user->used_vacations_str }}</td>
                            <td field-key='balance'>{{ $user->remainingDaysUntilThisMonth }}</td>
                        </tr>
                    @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
                <tfoot class="text-primary">
                <tr>
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