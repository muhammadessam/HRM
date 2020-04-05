<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.assign_aids.title'); ?></h3>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_aid_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.assign_aid_deps.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new_dep'); ?></a>
    </p>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_deps_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($assignedDepartments) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_aid_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                        <th></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.departments.fields.title'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.aids.title'); ?></th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($assignedDepartments) > 0): ?>
                        <?php $__currentLoopData = $assignedDepartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignedDepartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($assignedDepartment->id); ?>">
                                <td></td>
                                <td field-key='name'><?php echo e($assignedDepartment->name); ?></td>
                                <td field-key='workingPeriods'><?php echo e($assignedDepartment->aidsStr); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_aid_edit')): ?>
                                    <a href="<?php echo e(route('admin.assign_aid_deps.edit',[$assignedDepartment->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_aid_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.assign_aid_deps.destroy', $assignedDepartment->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_aid_create')): ?>
        <p>
            <a href="<?php echo e(route('admin.assign_aids.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new_user'); ?></a>

        </p>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_users_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($assignedUsers) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_aid_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                        <th></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.title'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.aids.title'); ?></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(count($assignedUsers) > 0): ?>
                        <?php $__currentLoopData = $assignedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignedUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($assignedUser->id); ?>">
                                <td></td>
                                <td field-key='name'><?php echo e($assignedUser->name); ?></td>
                                <td field-key='workingPeriod'><?php echo e($assignedUser->aidsStr); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_aid_edit')): ?>
                                    <a href="<?php echo e(route('admin.assign_aids.edit',[$assignedUser->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_aid_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.assign_aids.destroy', $assignedUser->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/assign_aids/index.blade.php ENDPATH**/ ?>