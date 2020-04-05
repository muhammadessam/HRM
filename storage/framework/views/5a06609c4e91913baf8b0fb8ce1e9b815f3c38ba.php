<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.usedVacations.title'); ?></h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.usedVacations.fields.countRemainingDaysPerAnnualVacation'); ?>
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
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
                </div>
            </div>
        </div>
    </div>

    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.users.usedVacations.store', $user->id]]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_create'); ?>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('vacation_id', trans('quickadmin.deservedVacations.title').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('vacation_id', $deservedVacations, old('vacation_id'), ['class' => 'form-control select2', 'required' => 'required']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('vacation_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('vacation_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('starts_at', trans('quickadmin.usedVacations.fields.starts_at') . '*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('starts_at', old('starts_at'), ['class' => 'form-control date', 'placeholder' => '', 'required' => 'required']); ?>

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
                    <?php echo Form::label('ends_at', trans('quickadmin.usedVacations.fields.ends_at') . '*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('ends_at', old('ends_at'), ['class' => 'form-control date', 'required' => true]); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('ends_at')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('ends_at')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('note', trans('quickadmin.usedVacations.fields.note') . '*', ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('note', old('note'), ['class' => 'form-control date', 'required' => true]); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('note')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('note')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##

    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/moment-with-locales.min.js')); ?>"></script>
    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script>
        $(function () {
            moment.updateLocale('en', {
                week: {dow: 1} // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "<?php echo e(config('app.date_format_moment')); ?>",
                locale: "en",
            });

        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/usedVacations/create.blade.php ENDPATH**/ ?>