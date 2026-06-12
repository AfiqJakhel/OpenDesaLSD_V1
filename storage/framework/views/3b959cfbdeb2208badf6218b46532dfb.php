<?php $__env->startPush('css'); ?>
    <style>
        .radius {
            border-radius: 5px;
        }

        .small-box {
            border-radius: 5px;
            padding-bottom: 27px;
        }

        .small-box .icon {
            top: -5px;
        }

        .small-box:hover {
            transform: scale(1.01);
            transition: 0.3s;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Status IDM Desa
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Status IDM Desa</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.status_desa.navigasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php echo form_open(ci_route('status_desa'), 'class="form-inline" id="mainform" name="mainform"'); ?>

            <label for="tahun">IDM Tahun </label>
            <select class="form-control input-sm" name="tahun" onchange="$('#mainform').submit()">
                <option value="" disabled>Pilih Tahun</option>
                <?php $__currentLoopData = tahun(\App\Models\SettingAplikasi::TAHUN_IDM_MIN); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($thn); ?>" <?= ($tahun === $thn) ? 'selected' : ''; ?>><?php echo e($thn); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if(can('u')): ?>
                <a class="btn btn-social btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Perbarui" <?php echo cek_koneksi_internet() == false || $idm->error_msg === 'Periksa koneksi internet Anda.' ? 'disabled title="Perangkat tidak terhubung dengan jaringan"' : 'href="' . ci_route('status_desa.perbarui_idm', $tahun) . '"'; ?>><i class="fa fa-refresh"></i>Perbarui</a>
                <?php if(empty($idm->error_msg)): ?>
                    <a class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Simpan" href="<?php echo e(ci_route('status_desa.simpan', $tahun)); ?>"><i class="fa fa-check-circle"></i>Simpan</a>
                <?php endif; ?>
            <?php endif; ?>
            </form>
        </div>
        <div class="box-body">
            <?php if($idm->error_msg): ?>
                <div class="alert alert-danger">
                    <?php echo $idm->error_msg; ?>

                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <div class="small-box bg-blue radius">
                                    <div class="inner">
                                        <h3><?php echo e(number_format($idm->SUMMARIES->SKOR_SAAT_INI, 4)); ?></h3>
                                        <p>SKOR IDM SAAT INI</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="small-box bg-yellow radius">
                                    <div class="inner">
                                        <h3><?php echo e($idm->SUMMARIES->STATUS); ?></h3>
                                        <p>STATUS IDM</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion-ios-pulse-strong"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="small-box bg-red radius">
                                    <div class="inner">
                                        <h3><?php echo e(number_format($idm->SUMMARIES->SKOR_MINIMAL, 4)); ?></h2>
                                            <p>SKOR IDM MINIMAL</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="small-box bg-green radius">
                                    <div class="inner">
                                        <h3><?php echo e($idm->SUMMARIES->TARGET_STATUS); ?></h3>
                                        <p>TARGET STATUS</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-arrow-graph-up-right"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped dataTable table-hover">
                                        <tbody>
                                            <tr>
                                                <td width="30%">PROVINSI</td>
                                                <td width="1">:</td>
                                                <td><?php echo e($idm->IDENTITAS[0]->nama_provinsi); ?></td>
                                            </tr>
                                            <tr>
                                                <td>KABUPATEN</td>
                                                <td> : </td>
                                                <td><?php echo e($idm->IDENTITAS[0]->nama_kab_kota); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(strtoupper(setting('sebutan_kecamatan'))); ?></td>
                                                <td> : </td>
                                                <td><?php echo e($idm->IDENTITAS[0]->nama_kecamatan); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(strtoupper(setting('sebutan_desa'))); ?></td>
                                                <td> : </td>
                                                <td><?php echo e($idm->IDENTITAS[0]->nama_desa); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xs-12">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>

                <div class="row">
                    <hr>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                                <thead class="bg-gray color-palette">
                                    <tr>
                                        <th rowspan="2" class="padat">NO</th>
                                        <th rowspan="2">INDIKATOR IDM</th>
                                        <th rowspan="2">SKOR</th>
                                        <th rowspan="2">KETERANGAN</th>
                                        <th rowspan="2" nowrap>KEGIATAN YANG DAPAT DILAKUKAN</th>
                                        <th rowspan="2">+NILAI</th>
                                        <th colspan="6" class="text-center">YANG DAPAT MELAKSANAKAN KEGIATAN</th>
                                    </tr>
                                    <tr>
                                        <th>PUSAT</th>
                                        <th>PROVINSI</th>
                                        <th>KABUPATEN</th>
                                        <th>DESA</th>
                                        <th>CSR</th>
                                        <th>LAINNYA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $idm->ROW; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e(empty($data->NO) && (print 'judul')); ?> ">
                                            <td class="text-center"><?php echo e($data->NO); ?></td>
                                            <td style="min-width: 150px;"><?php echo e($data->INDIKATOR); ?></td>
                                            <td class="padat"><?php echo e($data->SKOR); ?></td>
                                            <td style="min-width: 250px;"><?php echo e($data->KETERANGAN); ?></td>
                                            <td><?php echo e($data->KEGIATAN); ?></td>
                                            <td class="padat"><?php echo e($data->NILAI); ?></td>
                                            <td><?php echo e($data->PUSAT); ?></td>
                                            <td><?php echo e($data->PROV); ?></td>
                                            <td><?php echo e($data->KAB); ?></td>
                                            <td><?php echo e($data->DESA); ?></td>
                                            <td><?php echo e($data->CSR); ?></td>
                                            <td><?php echo e($data->LAINNYA); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php if(!$idm->error_msg): ?>
    <?php $__env->startPush('scripts'); ?>
        <?php echo $__env->make('admin.layouts.components.asset_highcharts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script>
            $(document).ready(function() {

                var tahun = <?php echo e($tahun); ?>;
                var iks = <?php echo e($idm->ROW[35]->SKOR); ?>;
                var ike = <?php echo e($idm->ROW[48]->SKOR); ?>;
                var ikl = <?php echo e($idm->ROW[52]->SKOR); ?>;

                Highcharts.chart('container', {
                    chart: {
                        type: 'pie',
                        options3d: {
                            enabled: true,
                            alpha: 45
                        }
                    },
                    title: {
                        text: 'Indeks Desa Membangun (IDM) ' + tahun
                    },
                    subtitle: {
                        text: 'SKOR : IKS, IKE, IKL'
                    },

                    plotOptions: {
                        series: {
                            colorByPoint: true
                        },
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            showInLegend: true,
                            depth: 45,
                            innerSize: 70,
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.y:,.2f} / {point.percentage:.1f} %'
                            }
                        }
                    },
                    series: [{
                        name: 'SKOR',
                        shadow: 1,
                        border: 1,
                        data: [
                            ['IKS', iks],
                            ['IKE', ike],
                            ['IKL', ikl]
                        ]
                    }]
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/status_desa/idm.blade.php ENDPATH**/ ?>