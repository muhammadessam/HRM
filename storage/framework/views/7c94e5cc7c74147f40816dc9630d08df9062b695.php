<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.users.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
        
    </p>
    <?php endif; ?>

    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($users) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?> dt-select <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <?php endif; ?>

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
                         <?php if(auth()->user()->hasRole(1)): ?>
                            <tr data-entry-id="<?php echo e($user->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
                                    <td></td>
                                <?php endif; ?>

                                <td field-key='name'><?php echo e($user->name); ?></td>
                                <td field-key='email'><?php echo e($user->email); ?></td>
                                <td field-key='role'><?php echo e($user->role->name ?? ''); ?></td>
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
                                        <a href="<?php echo e(route('admin.users.usedVacations.index',[$user->id])); ?>" class="btn btn-xs btn-bitbucket"><?php echo app('translator')->getFromJson('quickadmin.usedVacations.title'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_edit')): ?>
                                        <a href="<?php echo e(route('admin.users.pointings.index',[$user->id])); ?>" class="btn btn-xs btn-warning"><?php echo app('translator')->getFromJson('quickadmin.pointings.title'); ?></a>
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
                         <?php elseif($user->role->id ==4): ?> 
                            <tr data-entry-id="<?php echo e($user->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
                                    <td></td>
                                <?php endif; ?>

                                <td field-key='name'><?php echo e($user->name); ?></td>
                                <td field-key='email'><?php echo e($user->email); ?></td>
                                <td field-key='role'><?php echo e($user->role->name ?? ''); ?></td>
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
                                        <a href="<?php echo e(route('admin.users.usedVacations.index',[$user->id])); ?>" class="btn btn-xs btn-bitbucket"><?php echo app('translator')->getFromJson('quickadmin.usedVacations.title'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_edit')): ?>
                                        <a href="<?php echo e(route('admin.users.pointings.index',[$user->id])); ?>" class="btn btn-xs btn-warning"><?php echo app('translator')->getFromJson('quickadmin.pointings.title'); ?></a>
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
<?php endif; ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
            window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.users.mass_destroy')); ?>';
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/users/index.blade.php ENDPATH**/ ?>