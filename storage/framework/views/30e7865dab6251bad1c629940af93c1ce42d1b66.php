<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.reports.vacations.title'); ?></h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.vacations.fields.user_name'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.vacations.fields.department'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.vacations.fields.deserved_vacations'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.vacations.fields.used_vacations'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.vacations.fields.balance'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php if(count($users) > 0): ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(auth()->user()->hasRole(1)): ?>
                        <tr data-entry-id="<?php echo e($user->id); ?>">
                            <td field-key='name'><?php echo e($user->name); ?></td>
                            <td field-key='department'><?php echo e($user->department->name); ?></td>
                            <td field-key='deserved_vacations'><?php echo e($user->deserved_vacations_str); ?></td>
                            <td field-key='used_vacations'><?php echo e($user->used_vacations_str); ?></td>
                            <td field-key='balance'><?php echo e($user->remainingDaysUntilThisMonth); ?></td>
                        </tr>
                    <?php elseif($user->role->id ==4): ?>    

                        <tr data-entry-id="<?php echo e($user->id); ?>">
                            <td field-key='name'><?php echo e($user->name); ?></td>
                            <td field-key='department'><?php echo e($user->department->name); ?></td>
                            <td field-key='deserved_vacations'><?php echo e($user->deserved_vacations_str); ?></td>
                            <td field-key='used_vacations'><?php echo e($user->used_vacations_str); ?></td>
                            <td field-key='balance'><?php echo e($user->remainingDaysUntilThisMonth); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                    </tr>
                <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ensraf\resources\views/admin/reports/vacations/index.blade.php ENDPATH**/ ?>