<div class="panel panel-default">
    <div class="panel-heading">
        المستخدم
    </div>

    <div class="panel-body table-responsive">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.name'); ?></th>
                        <td field-key='name'><?php echo e($user->name); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.email'); ?></th>
                        <td field-key='email'><?php echo e($user->email); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.role'); ?></th>
                        <td field-key='role'><?php echo e($user->role->name); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.deservedVacations.title'); ?></th>
                        <td field-key='deservedVacations'><?php echo e($user->deservedVacationsStr); ?></td>
                    </tr>
                    <?php if($user->is_working): ?>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.remainingVacations.title'); ?></th>
                            <td field-key='usedVacations'>
                                <table class="table table-bordered table-striped">
                                    <?php $__currentLoopData = $user->remainingDeservedVacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remainingDeservedVacation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($remainingDeservedVacation['vacation']->name); ?></th>
                                            <td field-key='vacation<?php echo e($loop->index); ?>'><?php echo e($remainingDeservedVacation['remaining']); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th>اجازة سنوية</th>
                                        <td field-key='vacation-1'><?php echo e($user->remainingDaysUntilThisMonth); ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.vacation.remainingDaysUntilThisMonth'); ?></th>
                            <td field-key='remainingDaysUntilThisMonth'><?php echo e($user->remainingDaysUntilThisMonth); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.matriculate'); ?></th>
                        <td field-key='matriculate'><?php echo e($user->matriculate); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.identity-number'); ?></th>
                        <td field-key='identity_number'><?php echo e($user->identity_number); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.hire-date'); ?></th>
                        <td field-key='hire_date'><?php echo e($user->hire_date); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\eskanh\eskan\resources\views/admin/usedVacations/user.blade.php ENDPATH**/ ?>