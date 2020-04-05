<?php $__env->startSection('style'); ?>
    <style>
        .granted {
            color: green;
            font-weight: bold;
        }
        .revoked {
            color: red;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.roles.title'); ?></h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?>
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.roles.fields.title'); ?></th>
                            <td field-key='title'><?php echo e($role->name); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <?php $__currentLoopData = $permissionGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo app('translator')->getFromJson('quickadmin.' . $groupNames[$loop->index] . '.title'); ?>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <?php $__currentLoopData = $permissionGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2">
                                    <p class="<?php echo e($role->hasPermissionTo($permission) ? 'granted' : 'revoked'); ?>">
                                        <?php echo app('translator')->getFromJson('quickadmin.permissions.types.' . $permission->name); ?>
                                    </p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="users">
<table class="table table-bordered table-striped <?php echo e(count($users) > 0 ? 'datatable' : ''); ?>">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.email'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.role'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.matriculate'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.identity-number'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.sex'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.salary'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.hire-date'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.phone'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.address'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.birth-date-h'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.birth-date-m'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.situation'); ?></th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        <?php if(count($users) > 0): ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-entry-id="<?php echo e($user->id); ?>">
                    <td field-key='name'><?php echo e($user->name); ?></td>
                                <td field-key='email'><?php echo e($user->email); ?></td>
                                <td field-key='role'><?php echo e($user->role->title ?? ''); ?></td>
                                <td field-key='matriculate'><?php echo e($user->matriculate); ?></td>
                                <td field-key='identity_number'><?php echo e($user->identity_number); ?></td>
                                <td field-key='sex'><?php echo e($user->sex); ?></td>
                                <td field-key='salary'><?php echo e($user->salary); ?></td>
                                <td field-key='hire_date'><?php echo e($user->hire_date); ?></td>
                                <td field-key='phone'><?php echo e($user->phone); ?></td>
                                <td field-key='address'><?php echo e($user->address); ?></td>
                                <td field-key='birth_date_h'><?php echo e($user->birth_date_h); ?></td>
                                <td field-key='birth_date_m'><?php echo e($user->birth_date_m); ?></td>
                                <td field-key='situation'><?php echo e($user->situation); ?></td>
                                                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_view')): ?>
                                    <a href="<?php echo e(route('admin.users.show',[$user->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_edit')): ?>
                                    <a href="<?php echo e(route('admin.users.edit',[$user->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
<?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $user->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="20"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="<?php echo e(route('admin.roles.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('quickadmin.qa_back_to_list'); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/roles/show.blade.php ENDPATH**/ ?>