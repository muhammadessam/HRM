<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.aids.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_create')): ?>
        <p>
            <a href="<?php echo e(route('admin.aids.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>

        </p>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($aids) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                <tr>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_delete')): ?>
                        <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                    <?php endif; ?>

                    <th><?php echo app('translator')->getFromJson('quickadmin.aids.fields.name'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.aids.fields.starts_at'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.aids.fields.ends_at'); ?></th>
                    <?php if( request('show_deleted') == 1 ): ?>
                        <th>&nbsp;</th>
                    <?php else: ?>
                        <th>&nbsp;</th>
                    <?php endif; ?>
                </tr>
                </thead>

                <tbody>
                <?php if(count($aids) > 0): ?>
                    <?php $__currentLoopData = $aids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($aid->id); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_delete')): ?>
                                <?php if( request('show_deleted') != 1 ): ?><td></td><?php endif; ?>
                            <?php endif; ?>

                            <td field-key='name'><?php echo e($aid->name); ?></td>
                            <td field-key='starts_at'><?php echo e($aid->starts_at); ?></td>
                            <td field-key='ends_at'><?php echo e($aid->ends_at); ?></td>
                            <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.aids.restore', $aid->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.aids.perma_del', $aid->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            <?php else: ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_view')): ?>
                                        <a href="<?php echo e(route('admin.aids.show',[$aid->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_edit')): ?>
                                        <a href="<?php echo e(route('admin.aids.edit',[$aid->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_delete')): ?>
                                        <?php echo Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.aids.destroy', $aid->id])); ?>

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
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_delete')): ?>
                <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.aids.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/aids/index.blade.php ENDPATH**/ ?>