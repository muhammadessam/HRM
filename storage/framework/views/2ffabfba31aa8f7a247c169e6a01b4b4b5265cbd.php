<?php $__env->startSection('content'); ?>
    <div id="app">
        <example-component></example-component>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ensraf\resources\views/admin/users/leaving_coming_show.blade.php ENDPATH**/ ?>