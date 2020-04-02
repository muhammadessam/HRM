<tr data-index="<?php echo e($index); ?>">
    <td><?php echo Form::text('courses['.$index.'][name]', old('courses['.$index.'][name]', isset($field) ? $field->name: ''), ['class' => 'form-control']); ?></td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger"><?php echo app('translator')->getFromJson('quickadmin.qa_delete'); ?></a>
    </td>
</tr><?php /**PATH D:\eskanh\eskan\resources\views/admin/users/courses_row.blade.php ENDPATH**/ ?>