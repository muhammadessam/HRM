<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.assign-working-periods.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.assign_working_periods.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_create'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('user_id', trans('quickadmin.users.fields.title').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('user_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('user_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('working_period_id', trans('quickadmin.working-periods.title').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('working_period_id[]', $workingPeriods, old('working_period_id[]'), ['class' => 'form-control select2', 'required' => '', 'multiple' => 'multiple']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('working_period_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('working_period_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/assign_working_periods/create.blade.php ENDPATH**/ ?>