<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.reports.users.title'); ?></h3>

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
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.hire-date'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.email'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.role'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.matriculate'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.identity-number'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.sex'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.salary'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.phone'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.address'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.situation'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.nationality'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.birth-date-h'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.birth-date-m'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php if(count($users) > 0): ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(auth()->user()->hasRole(1)): ?>
                    <tr data-entry-id="<?php echo e($user->id); ?>">
                            <td field-key='name'><?php echo e($user->name); ?></td>
                            <td field-key='department'><?php echo e($user->department->name); ?></td>
                            <td field-key="hire-date"><?php echo e($user->hire_date); ?></td>
                            <td field-key="email"><?php echo e($user->email); ?></td>
                            <td field-key="role"><?php echo e($user->role ? $user->role->name : '-'); ?></td>
                            <td field-key="matriculate"><?php echo e($user->matriculate); ?></td>
                            <td field-key="identity-number"><?php echo e($user->identity_number); ?></td>
                            <td field-key="sex"><?php if($user->sex): ?><?php echo app('translator')->getFromJson('quickadmin.users.sex.' . $user->sex); ?><?php endif; ?></td>
                            <td field-key="salary"><?php echo e($user->salary); ?></td>
                            <td field-key="phone"><?php echo e($user->phone); ?></td>
                            <td field-key="address"><?php echo e($user->address); ?></td>
                            <td field-key="situation"><?php echo e($user->situation); ?></td>
                            <td field-key="nationality"><?php echo e($user->nationality); ?></td>
                            <td field-key="birth-date-h"><?php echo e($user->birth_date_h); ?></td>
                            <td field-key="birth-date-h"><?php echo e($user->birth_date_h); ?></td>
                        </tr>
                    <?php elseif($user->role->id ==4): ?>
                        <tr data-entry-id="<?php echo e($user->id); ?>">
                            <td field-key='name'><?php echo e($user->name); ?></td>
                            <td field-key='department'><?php echo e($user->department->name); ?></td>
                            <td field-key="hire-date"><?php echo e($user->hire_date); ?></td>
                            <td field-key="email"><?php echo e($user->email); ?></td>
                            <td field-key="role"><?php echo e($user->role ? $user->role->name : '-'); ?></td>
                            <td field-key="matriculate"><?php echo e($user->matriculate); ?></td>
                            <td field-key="identity-number"><?php echo e($user->identity_number); ?></td>
                            <td field-key="sex"><?php if($user->sex): ?><?php echo app('translator')->getFromJson('quickadmin.users.sex.' . $user->sex); ?><?php endif; ?></td>
                            <td field-key="salary"><?php echo e($user->salary); ?></td>
                            <td field-key="phone"><?php echo e($user->phone); ?></td>
                            <td field-key="address"><?php echo e($user->address); ?></td>
                            <td field-key="situation"><?php echo e($user->situation); ?></td>
                            <td field-key="nationality"><?php echo e($user->nationality); ?></td>
                            <td field-key="birth-date-h"><?php echo e($user->birth_date_h); ?></td>
                            <td field-key="birth-date-h"><?php echo e($user->birth_date_h); ?></td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                    </tr>
                <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/reports/users/index.blade.php ENDPATH**/ ?>