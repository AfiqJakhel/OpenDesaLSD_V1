<div id="isi_popup" style="visibility: hidden;">
    <div id="content">
        <h5 id="firstHeading" class="firstHeading">Wilayah <?php echo e($wilayah); ?></h5>
        <div id="bodyContent">
            <?php
                $link = underscore($desa['nama_desa']);
                $data_title = "{$wilayah}";
            ?>

            <p><a
                    href="#collapseStatPenduduk"
                    class="btn btn-social bg-navy btn-sm btn-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block btn-modal"
                    title="Statistik Penduduk"
                    data-toggle="collapse"
                    data-target="#collapseStatPenduduk"
                    aria-expanded="false"
                    aria-controls="collapseStatPenduduk"
                ><i class="fa fa-bar-chart"></i>Statistik Penduduk</a></p>
            <div class="collapse box-body no-padding" id="collapseStatPenduduk">
                <div class="card card-body">
                    <ol class="list-unstyled">
                        <?php $__currentLoopData = $list_ref; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?= ($lap == $key) ? 'active' : ''; ?>"><a href="<?php echo e(ci_route("statistik_web.chart_gis_desa.{$key}.{$link}")); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Statistik Penduduk <?php echo e($data_title); ?>"><?php echo e($value); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </div>
            </div>

            <p><a
                    href="#collapseStatBantuan"
                    class="btn btn-social bg-navy btn-sm btn-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block btn-modal"
                    title="Statistik Bantuan"
                    data-toggle="collapse"
                    data-target="#collapseStatBantuan"
                    aria-expanded="false"
                    aria-controls="collapseStatBantuan"
                ><i class="fa fa-heart"></i>Statistik Bantuan</a></p>
            <div class="collapse box-body no-padding" id="collapseStatBantuan">
                <div class="card card-body">
                    <ol class="list-unstyled">
                        <?php $__currentLoopData = $list_bantuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?= ($lap == $key) ? 'active' : ''; ?>"><a href="<?php echo e(ci_route("statistik_web.chart_gis_desa.{$key}.{$link}")); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Statistik Bantuan <?php echo e($data_title); ?>"><?php echo e($value); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/gis/content_desa.blade.php ENDPATH**/ ?>