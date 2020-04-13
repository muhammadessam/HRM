<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.vacation.title'); ?></h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?>
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.vacation.fields.name'); ?></th>
                            <td field-key='name'><?php echo e($vacation->name); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.vacation.fields.days'); ?></th>
                            <td field-key='days'><?php echo e($vacation->days); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.vacation.fields.repetition'); ?></th>
                            <td field-key='repetition'><?php echo e($vacation->repetition); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.vacation.fields.accumulated'); ?></th>
                            <td field-key='accumulated'><?php echo e($vacation->accumulated); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.vacation.fields.salary-affected'); ?></th>
                            <td field-key='salary_affected'><?php echo e($vacation->salary_affected); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.vacation.fields.can-be-exceeded'); ?></th>
                            <td field-key='can_be_exceeded'><?php echo e($vacation->can_be_exceeded); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="<?php echo e(route('admin.vacations.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('quickadmin.qa_back_to_list'); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/vacations/show.blade.php ENDPATH**/ ?>