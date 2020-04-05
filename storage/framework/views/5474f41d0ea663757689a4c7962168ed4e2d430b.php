<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <?php if(session('alert')): ?>
        <?php $__env->startComponent('components.alert'); ?>
            <?php $__env->slot('type'); ?>
                <?php echo e(session('alert')['type']); ?>

            <?php $__env->endSlot(); ?>
            <?php $__env->slot('msg'); ?>
                <?php echo e(session('alert')['msg']); ?>

            <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    <?php endif; ?>

    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.pointingFiles.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pointing_files_create')): ?>
        <p>
            <a href="<?php echo e(route('admin.pointing_files.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
        </p>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($pointingFiles) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pointing_files_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.pointingFiles.fields.name'); ?></th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pointing_files_view')): ?>
                    <th></th>
                    <?php endif; ?>
                </tr>
                </thead>

                <tbody>
                <?php if(count($pointingFiles) > 0): ?>
                    <?php $__currentLoopData = $pointingFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pointingFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($pointingFile->id); ?>">
                            <td field-key='id'><?php echo e($pointingFile->id); ?></td>
                            <td field-key='name'><?php echo e($pointingFile->name); ?></td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pointing_files_view')): ?>
                            <td field-key='download'>
                                <a href="<?php echo e(asset('storage/pointing_files/' . $pointingFile->file)); ?>" class="btn btn-success" target="_blank"><?php echo app('translator')->getFromJson('quickadmin.qa_download'); ?></a>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/pointing_files/index.blade.php ENDPATH**/ ?>