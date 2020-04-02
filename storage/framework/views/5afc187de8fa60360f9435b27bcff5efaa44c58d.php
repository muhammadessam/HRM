<tr data-index="<?php echo e($index); ?>">
    <td><?php echo Form::text('experiences['.$index.'][name]', old('experiences['.$index.'][name]', isset($field) ? $field->name: ''), ['class' => 'form-control']); ?></td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger"><?php echo app('translator')->getFromJson('quickadmin.qa_delete'); ?></a>
    </td>
</tr><?php /**PATH /home/eskanaho/public_html/resources/views/admin/users/experiences_row.blade.php ENDPATH**/ ?>