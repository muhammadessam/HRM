<?php $__env->startSection('content'); ?>
    <?php if(auth()->id() !== $user->id): ?>
        <?php echo $__env->make('components.user_simple', compact('user'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

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
        <div class="panel-heading"><?php echo app('translator')->getFromJson("quickadmin.qa_summary"); ?></div>
        <div class="panel-body">
            <table class="table table-bordered col-md-6">
                <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_presence_days'); ?></th>
                    <td><?php echo e($totalPresenceDays); ?></td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_absence_days'); ?></th>
                    <td><?php echo e($totalAbsenceDays); ?></td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.total_rest_days'); ?></th>
                    <td><?php echo e($totalRestDays); ?></td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_work_hours'); ?></th>
                    <td><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $totalWorkHours,
                        'minutes' => $totalWorkMinutes
                        ])); ?>

                    </td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_effective_working_hours'); ?></th>
                    <td><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $totalEffectiveWorkingHours,
                        'minutes' => $totalEffectiveWorkingMinutes
                        ])); ?>

                    </td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.reports.total_latency_hours'); ?></th>
                    <td><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $totalLatencyHours,
                        'minutes' => $totalLatencyMinutes
                        ])); ?>


                    </td>
                </tr>
                 <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.plus_sum'); ?></th>
                    <td><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => intdiv($totalPlusMinutes, 60),
                        'minutes' => ($totalPlusMinutes % 60)
                        ])); ?>


                    </td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.diff_working_hours'); ?></th>
                    <td><?php echo e(trans('quickadmin.format.hours_minutes', [
                        'hours' => $totalWorkHours-$totalEffectiveWorkingHours,
                        'minutes' => $totalWorkMinutes-$totalEffectiveWorkingMinutes
                        ])); ?>


                    </td>
                </tr>
                
                
                
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.day'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.supposed_in'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.in'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.in_latency'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.in_plus'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.supposed_out'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.out'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.out_latency'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.out_plus'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.latency_sum'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.plus_sum'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.effective_working_hours'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.needed_working_hours'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.diff_working_hours'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.presence'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.manual_add'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.reason'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php if($pointings->count() > 0): ?>
                    <?php $__currentLoopData = $pointings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pointing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($pointing->id); ?>" data-color="<?php echo e($pointing->color); ?>">
                            <td field-key='day'><?php echo e($pointing->day_name . ' ' . $pointing->day); ?></td>
                            <td field-key='supposed_in'><?php echo e($pointing->supposed_in); ?></td>
                            <td field-key='in'><?php echo e($pointing->in); ?></td>
                            <td field-key='in_latency'><?php echo e($pointing->in_latency); ?></td>
                            <td field-key='in_plus'><?php echo e($pointing->in_plus); ?></td>
                            <td field-key='supposed_out'><?php echo e($pointing->supposed_out); ?></td>
                            <td field-key='out'><?php echo e($pointing->out); ?></td>
                            <td field-key='out_latency'><?php echo e($pointing->out_latency); ?></td>
                            <td field-key='out_plus'><?php echo e($pointing->out_plus); ?></td>
                            <td field-key='latency_sum'><?php echo e($pointing->latency_sum); ?></td>
                            <td field-key='plus_sum'><?php echo e($pointing->plus_sum); ?></td>
                            <td field-key='effective_working_hours'><?php echo e($pointing->effective_working_hours); ?></td>
                            <td field-key='needed_working_hours'><?php echo e($pointing->needed_working_hours); ?></td>
                            <td field-key='diff_working_hours'><?php echo e($pointing->diff_working_hours); ?></td>
                            <td field-key='presence'><?php echo e($pointing->presence_title); ?></td>
                            <td field-key="manual"><?php echo e($pointing->manual); ?></td>
                            <td field-key="reason"><?php echo e($pointing->reason); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##

    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/moment-with-locales.min.js')); ?>"></script>
    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('td', nRow).css('color', nRow.getAttribute('data-color'));
                },
                "order": [],
                "columnDefs": [{
                    "defaultContent": "-",
                    "targets": "_all",
                    "orderable": false
                }],
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ],
                pageLength: 10,
            });
        })
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ensraf\resources\views/admin/reports/pointings/show.blade.php ENDPATH**/ ?>