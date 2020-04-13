<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.vacation.title'); ?></h3>
    
    <?php echo Form::model($vacation, ['method' => 'PUT', 'route' => ['admin.vacations.update', $vacation->id]]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('name', trans('quickadmin.vacation.fields.name').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('name')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('days', trans('quickadmin.vacation.fields.days').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::number('days', old('days'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('days')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('days')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('repetition', trans('quickadmin.vacation.fields.repetition').'*', ['class' => 'control-label']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('repetition')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('repetition')); ?>

                        </p>
                    <?php endif; ?>
                    <div>
                        <label>
                            <?php echo Form::radio('repetition', 'y', false, ['required' => '']); ?>

                            Yearly
                        </label>
                    </div>
                    <div>
                        <label>
                            <?php echo Form::radio('repetition', 'c', false, ['required' => '']); ?>

                            Per Case
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('accumulated', trans('quickadmin.vacation.fields.accumulated').'*', ['class' => 'control-label']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('accumulated')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('accumulated')); ?>

                        </p>
                    <?php endif; ?>
                    <div>
                        <label>
                            <?php echo Form::radio('accumulated', 'y', false, ['required' => '']); ?>

                            Yes
                        </label>
                    </div>
                    <div>
                        <label>
                            <?php echo Form::radio('accumulated', 'n', false, ['required' => '']); ?>

                            No
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('salary_affected', trans('quickadmin.vacation.fields.salary-affected').'*', ['class' => 'control-label']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('salary_affected')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('salary_affected')); ?>

                        </p>
                    <?php endif; ?>
                    <div>
                        <label>
                            <?php echo Form::radio('salary_affected', 'y', false, ['required' => '']); ?>

                            Yes
                        </label>
                    </div>
                    <div>
                        <label>
                            <?php echo Form::radio('salary_affected', 'n', false, ['required' => '']); ?>

                            No
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('can_be_exceeded', trans('quickadmin.vacation.fields.can-be-exceeded').'*', ['class' => 'control-label']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('can_be_exceeded')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('can_be_exceeded')); ?>

                        </p>
                    <?php endif; ?>
                    <div>
                        <label>
                            <?php echo Form::radio('can_be_exceeded', 'y', false, ['required' => '']); ?>

                            Yes
                        </label>
                    </div>
                    <div>
                        <label>
                            <?php echo Form::radio('can_be_exceeded', 'n', false, ['required' => '']); ?>

                            No
                        </label>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/vacations/edit.blade.php ENDPATH**/ ?>