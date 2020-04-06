<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.working-periods.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_create')): ?>
        <p>
            <a href="<?php echo e(route('admin.working_periods.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>

        </p>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_delete')): ?>
        <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.working_periods.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->getFromJson('quickadmin.qa_all'); ?></a></li> |
            <li><a href="<?php echo e(route('admin.working_periods.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->getFromJson('quickadmin.qa_trash'); ?></a></li>
        </ul>
        </p>
    <?php endif; ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($working_periods) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                <tr>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_delete')): ?>
                        <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                    <?php endif; ?>

                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.name'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.starts-at'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.finishes-at'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.starts-at-time'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.finishes-at-time'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.when_no_in_time'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.when_no_out_time'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.allowed_in_latency'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.allowed_out_latency'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.fields.hours-needed'); ?></th>
                    <?php if( request('show_deleted') == 1 ): ?>
                        <th>&nbsp;</th>
                    <?php else: ?>
                        <th>&nbsp;</th>
                    <?php endif; ?>
                </tr>
                </thead>

                <tbody>
                <?php if(count($working_periods) > 0): ?>
                    <?php $__currentLoopData = $working_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $working_period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($working_period->id); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_delete')): ?>
                                <?php if( request('show_deleted') != 1 ): ?><td></td><?php endif; ?>
                            <?php endif; ?>

                            <td field-key='name'><?php echo e($working_period->name); ?></td>
                            <td field-key='starts_at'><?php echo e($working_period->starts_at); ?></td>
                            <td field-key='finishes_at'><?php echo e($working_period->finishes_at); ?></td>
                            <td field-key='starts_at_time'><?php echo e($working_period->starts_at_time); ?></td>
                            <td field-key='finishes_at_time'><?php echo e($working_period->finishes_at_time); ?></td>
                            <td field-key='when_no_in_time'><?php echo e($working_period->when_no_in_time); ?></td>
                            <td field-key='when_no_out_time'><?php echo e($working_period->when_no_out_time); ?></td>
                            <td field-key='allowed_in_latency'><?php echo e($working_period->allowed_in_latency); ?></td>
                            <td field-key='allowed_out_latency'><?php echo e($working_period->allowed_out_latency); ?></td>
                            <td field-key='hours_needed'><?php echo e($working_period->hours_needed); ?></td>
                            <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.working_periods.restore', $working_period->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.working_periods.perma_del', $working_period->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            <?php else: ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_view')): ?>
                                        <a href="<?php echo e(route('admin.working_periods.show',[$working_period->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_edit')): ?>
                                        <a href="<?php echo e(route('admin.working_periods.edit',[$working_period->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_delete')): ?>
                                        <?php echo Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.working_periods.destroy', $working_period->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_delete')): ?>
                <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.working_periods.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/working_periods/index.blade.php ENDPATH**/ ?>