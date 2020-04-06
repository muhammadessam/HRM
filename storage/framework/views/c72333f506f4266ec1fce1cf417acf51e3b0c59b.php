<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.reports.pointings.title'); ?></h3>
<div class="search-box">
        <form>
            <div class="form-group row">
                <div class="col-md-3">
                    <?php echo Form::label('start_date', trans('quickadmin.reports.pointings.fields.start_date'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('start_date', request('start_date'), ['class' => 'form-control date', 'placeholder' => '']); ?>

                </div>
                <div class="col-md-3">
                    <?php echo Form::label('end_date', trans('quickadmin.reports.pointings.fields.end_date'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('end_date', request('end_date'), ['class' => 'form-control date', 'placeholder' => '']); ?>

                </div>
            </div>
            <input type="submit" value="<?php echo app('translator')->getFromJson('quickadmin.qa_search'); ?>" class="btn btn-success">
        </form>
    </div>
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
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_presence_days'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_absence_days'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.total_rest_days'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_work_hours'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_effective_working_hours'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_latency_hours'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.plus_sum'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.diff_working_hours'); ?></th>

                    
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php if(count($users) > 0): ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(auth()->user()->hasRole(1)): ?>
                           <tr data-entry-id="<?php echo e($user->id); ?>">
                            <td field-key='name'><?php echo e($user->name); ?></td>
                            <td field-key='department'><?php echo e($user->department->name); ?></td>
                            <td field-key='totalPresenceDays'><?php echo e($user->totalPresenceDays); ?></td>
                            <td field-key='totalAbsenceDays'><?php echo e($user->totalAbsenceDays); ?></td>
                            <td field-key='totalRestDays'><?php echo e($user->totalRestDays); ?></td>
                            <td field-key='WorkHours'><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalWorkHours,
                        'minutes' => $user->totalWorkMinutes
                        ])); ?></td>
                            <td field-key='EffectiveWorkingHours'><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalEffectiveWorkingMinutes
                        ])); ?></td>
                            <td field-key='totalLatencyHours'><?php echo e(trans('quickadmin.format.hours_minutes', [
                        
                         'hours' => $user->totalLatencyHours,
                        'minutes' => $user->totalLatencyMinutes
                        ])); ?></td>
                        <td><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => intdiv($user->totalPlusMinutes, 60),
                        'minutes' => ($user->totalPlusMinutes % 60)
                        ])); ?>


                         </td>
                        <td><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalWorkHours-$user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalWorkMinutes-$user->totalEffectiveWorkingMinutes
                        ])); ?>


                          </td>
                            
                            <td>
                                <a href="<?php echo e(route('admin.reports.pointings.show', $user->id)); ?>" class="btn btn-xs btn-primary">
                                    <?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?>
                                </a>
                            </td>
                        </tr> 
                    <?php elseif($user->role->id ==4): ?>
                            <tr data-entry-id="<?php echo e($user->id); ?>">
                            <td field-key='name'><?php echo e($user->name); ?></td>
                            <td field-key='department'><?php echo e($user->department->name); ?></td>
                            <td field-key='totalPresenceDays'><?php echo e($user->totalPresenceDays); ?></td>
                            <td field-key='totalAbsenceDays'><?php echo e($user->totalAbsenceDays); ?></td>
                            <td field-key='WorkHours'><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalWorkHours,
                        'minutes' => $user->totalWorkMinutes
                        ])); ?></td>
                            <td field-key='EffectiveWorkingHours'><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalEffectiveWorkingMinutes
                        ])); ?></td>
                            <td field-key='totalLatencyHours'><?php echo e(trans('quickadmin.format.hours_minutes', [
                        
                         'hours' => $user->totalLatencyHours,
                        'minutes' => $user->totalLatencyMinutes 
                        ])); ?></td>
                        <td><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => intdiv($user->totalPlusMinutes, 60),
                        'minutes' => ($user->totalPlusMinutes % 60)
                        ])); ?>


                         </td>
                        <td><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $user->totalWorkHours-$user->totalEffectiveWorkingHours,
                        'minutes' => $user->totalWorkMinutes-$user->totalEffectiveWorkingMinutes
                        ])); ?>


                          </td>
                            
                            <td>
                                <a href="<?php echo e(route('admin.reports.pointings.show', $user->id)); ?>" class="btn btn-xs btn-primary">
                                    <?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?>
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        
                        <td colspan="8"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
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
                    
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="//cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo e(url('adminlte/plugins/datetimepicker/moment-with-locales.min.js')); ?>"></script>
    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
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
     <script>
        $(function () {
            moment.updateLocale('en', {
                week: {dow: 1} // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "<?php echo e(config('app.date_format_moment')); ?>",
                locale: "en",
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/reports/pointings/index.blade.php ENDPATH**/ ?>