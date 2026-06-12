<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.jquery_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title'); ?>
    <h1>
        Pengaturan Paket Tambahan
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active"><a href="<?php echo e(ci_route('plugin')); ?>">Pengaturan Paket Tambahan</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li <?php echo $act_tab == 1 ? 'class="active"' : ''; ?>><a href="<?php echo e(ci_route('plugin')); ?>">Paket Tersedia</a></li>
            <?php if(can('u')): ?>
                <li <?php echo $act_tab == 2 ? 'class="active"' : ''; ?>><a href="<?php echo e(ci_route('plugin.installed')); ?>">Paket Terpasang</a></li>
                <?php if(! config_item('demo_mode')): ?>
                    <li <?php echo $act_tab == 3 ? 'class="active"' : ''; ?>><a href="<?php echo e(ci_route('plugin.pendaftaran')); ?>">Form Pendaftaran</a></li>
                    <li <?php echo $act_tab == 4 ? 'class="active"' : ''; ?>><a href="<?php echo e(ci_route('plugin.pemesanan')); ?>">Riwayat Pemesanan</a></li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
        <div class="tab-content">
            <?php echo $__env->make($content, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/plugin/index.blade.php ENDPATH**/ ?>