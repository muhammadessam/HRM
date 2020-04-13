<?php $__env->startSection('content'); ?>

    <table class="table">
        <caption>
            <h3>notifications</h3>
        </caption>
        <tr>
            <th>اسم الموظف</th>
            <th>نوع الاشعار</th>
            <th>الوقت</th>
            <th>التاريخ</th>
        </tr>
        <?php $__currentLoopData = $nots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($not->user->name); ?></td>
                <td>
                    <?php if($not->type == "in"): ?>
                        تسجيل حضور
                    <?php endif; ?>
                    <?php if($not->type == "out"): ?>
                        تسجيل انصراف
                    <?php endif; ?>
                    <?php if($not->type == "in_req"): ?>
                         اذن دخول
                    <?php endif; ?>
                    <?php if($not->type == "out_req"): ?>
                        اذن خروج
                    <?php endif; ?>
                </td>
                <td><?php echo e($not->time); ?></td>
                <td><?php echo e($not->date); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/notification.blade.php ENDPATH**/ ?>