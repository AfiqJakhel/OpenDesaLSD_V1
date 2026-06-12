<?php $__env->startSection('layout'); ?>
    <div class="w-full text-gray-700">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme::template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/layouts/home.blade.php ENDPATH**/ ?>