<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.pointingFiles.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.pointing_files.store'], 'files' => true]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_create'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('file', trans('quickadmin.pointingFiles.fields.file').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::file('file', old('file'), ['class' => 'form-control', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('file')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('file')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eskanaho/public_html/resources/views/admin/pointing_files/create.blade.php ENDPATH**/ ?>