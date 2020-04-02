<tr data-index="<?php echo e($index); ?>">
    <td>
        <?php echo Form::text('attachmentNames['.$index.'][name]', null, ['class' => 'form-control', 'required' => '']); ?>

    </td>
    <td>
        <?php echo Form::file('attachmentFiles['.$index.'][name]', null, ['class' => 'form-control', 'required' => '']); ?>

    </td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger"><?php echo app('translator')->getFromJson('quickadmin.qa_delete'); ?></a>
    </td>
</tr><?php /**PATH /home/eskanaho/public_html/resources/views/admin/users/attachments_row.blade.php ENDPATH**/ ?>