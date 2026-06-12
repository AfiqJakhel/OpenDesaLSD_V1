<div id="isi_popup_rw">
    <?php $__currentLoopData = $rw_gis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_rw => $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="isi_popup_rw_<?php echo e($key_rw); ?>" style="visibility: hidden;">
            <?php
                $link = underscore($rw['dusun']) . '/' . underscore($rw['rw']);
                $data_title = " RW {$rw['rw']} {$wilayah} {$rw['dusun']}";
            ?>
            <div id="content">
                <h5 id="firstHeading" class="firstHeading">Wilayah RW <?php echo e($rw['rw'] . ' ' . ucwords(setting('sebutan_dusun')) . ' ' . $rw['dusun']); ?></h5>
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
                    <div id="bodyContent">
                        <div class="card card-body">
                            <ol class="list-unstyled">
                                <?php $__currentLoopData = $list_ref; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?= ($lap == $key) ? 'active' : ''; ?>"><a href="<?php echo e(ci_route("statistik_web.chart_gis_rw.{$key}.{$link}")); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Statistik Penduduk <?php echo e($data_title); ?>"><?php echo e($value); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ol>
                        </div>
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
                                <li class="<?= ($lap == $key) ? 'active' : ''; ?>"><a href="<?php echo e(ci_route("statistik_web.chart_gis_rw.{$key}.{$link}")); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Statistik Bantuan RW <?php echo e($data_title); ?>"><?php echo e($value); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/gis/content_rw.blade.php ENDPATH**/ ?>