<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.working-periods.title'); ?></h3>

    <?php echo Form::model($working_period, ['method' => 'PUT', 'route' => ['admin.working_periods.update', $working_period->id]]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('name', trans('quickadmin.working-periods.fields.name').'*', ['class' => 'control-label']); ?>

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
                    <?php echo Form::label('starts_at', trans('quickadmin.working-periods.fields.starts-at').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('starts_at', old('starts_at'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('starts_at')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('starts_at')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('finishes_at', trans('quickadmin.working-periods.fields.finishes-at').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('finishes_at', old('finishes_at'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('finishes_at')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('finishes_at')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('starts_at_time', trans('quickadmin.working-periods.fields.starts-at-time').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('starts_at_time', old('starts_at_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('starts_at_time')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('starts_at_time')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('finishes_at_time', trans('quickadmin.working-periods.fields.finishes-at-time').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('finishes_at_time', old('finishes_at_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('finishes_at_time')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('finishes_at_time')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('when_no_in_time', trans('quickadmin.working-periods.fields.when_no_in_time').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('when_no_in_time', old('when_no_in_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('when_no_in_time')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('when_no_in_time')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('when_no_out_time', trans('quickadmin.working-periods.fields.when_no_out_time').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('when_no_out_time', old('when_no_out_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('when_no_out_time')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('when_no_out_time')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('allowed_in_latency', trans('quickadmin.working-periods.fields.allowed_in_latency').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::number('allowed_in_latency', old('allowed_in_latency'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'min' => 0]); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('allowed_in_latency')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('allowed_in_latency')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('allowed_out_latency', trans('quickadmin.working-periods.fields.allowed_out_latency').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::number('allowed_out_latency', old('allowed_out_latency'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'min' => 0]); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('allowed_out_latency')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('allowed_out_latency')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('hours_needed', trans('quickadmin.working-periods.fields.hours-needed').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('hours_needed', old('hours_needed'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']); ?>

                  
                    <p class="help-block"></p>
                    <?php if($errors->has('hours_needed')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('hours_needed')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##

    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/moment-with-locales.min.js')); ?>"></script>
    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script>
        $(function(){
            moment.updateLocale('en', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "<?php echo e(config('app.date_format_moment')); ?>",
                locale: "en",
            });

            $('.timepicker').datetimepicker({
                format: "<?php echo e(config('app.time_format_moment')); ?>",
            });

        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/working_periods/edit.blade.php ENDPATH**/ ?>