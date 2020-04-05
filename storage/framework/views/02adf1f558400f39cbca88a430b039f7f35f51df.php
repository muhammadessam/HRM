<?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr data-index="<?php echo e($attachment->id); ?>">
        <?php echo Form::hidden('attachment_ids[]', $attachment->id); ?>


        <td><?php echo e($attachment->name); ?></td>
        <td>
            <a href="<?php echo e($attachment->link); ?>" class="btn btn-success" role="button" target="_blank"><?php echo app('translator')->getFromJson('quickadmin.qa_download'); ?></a>
        </td>
        <td>
            <a href="#" class="remove btn btn-xs btn-danger"><?php echo app('translator')->getFromJson('quickadmin.qa_delete'); ?></a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/users/attachments_row_edit.blade.php ENDPATH**/ ?>