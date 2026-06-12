<?php if($modal): ?>
<a href="<?php echo e(site_url($url)); ?>"
class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
title="<?php echo e($judul ? $judul : 'Impor Data'); ?>"
data-target="#impor"
data-remote="false"
data-toggle="modal"
data-backdrop="false"
data-keyboard="false"
><i class="fa fa-upload"></i> Impor</a>
<?php else: ?>
<a href="<?php echo e($url); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Impor</a>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/layouts/components/tombol_impor.blade.php ENDPATH**/ ?>