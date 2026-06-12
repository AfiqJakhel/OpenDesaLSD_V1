<div id="isi_popup_rt">
    <?php $__currentLoopData = $rt_gis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_rt => $rt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="isi_popup_rt_<?php echo e($key_rt); ?>" style="visibility: hidden;">
            <?php
                $link = underscore($rt['dusun']) . '/' . underscore($rt['rw']) . '/' . underscore($rt['rt']);
                $data_title = " RT {$rt['rt']} RW {$rt['rw']} {$wilayah} {$rt['dusun']}";
            ?>
            <div id="content">
                <h5 id="firstHeading" class="firstHeading">Wilayah RT <?php echo e($rt['rt']); ?> RW <?php echo e($rt['rw'] . ' ' . ucwords(setting('sebutan_dusun')) . ' ' . $rt['dusun']); ?></h5>
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
                                    <li class="<?= ($lap == $key) ? 'active' : ''; ?>"><a href="<?php echo e(ci_route("statistik_web.chart_gis_rt.{$key}.{$link}")); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Statistik Penduduk <?php echo e($data_title); ?>"><?php echo e($value); ?></a></li>
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
                                <li class="<?= ($lap == $key) ? 'active' : ''; ?>"><a href="<?php echo e(ci_route("statistik_web.chart_gis_rt.{$key}.{$link}")); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Statistik Bantuan <?php echo e($data_title); ?>"><?php echo e($value); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/gis/content_rt.blade.php ENDPATH**/ ?>