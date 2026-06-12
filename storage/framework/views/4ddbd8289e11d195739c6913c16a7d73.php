<div class="btn-group btn-group-vertical">
    <a class="btn btn-social <?php echo e($type); ?> btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="<?php echo e($icon); ?>"></i> <?php echo e($judul); ?></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(site_url($value['url'])); ?>" class="btn btn-social btn-block btn-sm"
                title="<?php echo e($value['judul']); ?>" <?php if($value['target']): ?>
                target="_blank" <?php endif; ?> <?php if($value['modal']): ?> data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="<?php echo e($value['judul']); ?>"
                <?php endif; ?>>
                <i class="<?php echo e($value['icon']); ?>"></i> <?php echo e($value['judul']); ?>

            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/layouts/components/buttons/split.blade.php ENDPATH**/ ?>