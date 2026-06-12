<?php if($modal): ?>
    <?php if($buttonOnly): ?>
        <a href="<?php echo e($url); ?>" class="btn <?php echo e($type); ?> btn-sm" <?php echo e($attribut); ?> data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="<?php echo e($judul); ?>" title="<?php echo e($judul); ?>"><i class="<?php echo e($icon); ?>"></i></a>
    <?php else: ?>
        <a
        href="<?php echo e(site_url($url)); ?>"
        class="btn btn-social <?php echo e($type); ?> btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
        title="<?php echo e($judul); ?>"
        data-target="#<?php echo e($modalTarget ?? 'modalBox'); ?>"
        data-remote="false"
        data-toggle="modal"
        data-backdrop="false"
        data-keyboard="false"
        data-title="<?php echo e($judul); ?>"
    ><i class="<?php echo e($icon); ?>"></i>
        <?php echo e($judul); ?></a>   
    <?php endif; ?>
    
<?php else: ?>
    <?php if($buttonOnly): ?>
        <a href="<?php echo e($url); ?>" class="btn <?php echo e($type); ?> btn-sm"  title="<?php echo e($judul); ?>"><i class="<?php echo e($icon); ?>"></i></a>
    <?php else: ?>
        <a href="<?php echo e($file ? base_url($url) : site_url($url)); ?>" class="btn btn-social <?php echo e($type); ?> btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="<?php echo e($judul); ?> Data" <?php if($blank): ?> target="_blank" <?php endif; ?>><i class="<?php echo e($icon); ?> "></i><?php echo e($judul); ?></a>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/layouts/components/buttons/btn.blade.php ENDPATH**/ ?>