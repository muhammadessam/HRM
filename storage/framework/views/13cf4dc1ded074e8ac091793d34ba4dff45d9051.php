<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo app('translator')->getFromJson('quickadmin.qa_user'); ?>
    </div>

    <div class="panel-body table-responsive">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.matriculate'); ?></th>
                        <td field-key='matriculate'><?php echo e($user->matriculate); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.name'); ?></th>
                        <td field-key='name'><?php echo e($user->name); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.role'); ?></th>
                        <td field-key='role'><?php echo e($user->role->name); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('quickadmin.departments.fields.title'); ?></th>
                        <td field-key='departement'><?php echo e($user->department->name ?? ''); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\eskanh\eskan\resources\views/components/user_simple.blade.php ENDPATH**/ ?>