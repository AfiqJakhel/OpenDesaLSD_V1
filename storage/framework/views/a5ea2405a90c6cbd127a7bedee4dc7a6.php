<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Pengelompokan Rumah Tangga
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(ci_route('rtm')); ?>">Daftar Rumah Tangga</a></li>
    <li class="active">Daftar Anggota Rumah Tangga</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u') && (string) $kepala_kk['status_dasar'] === '1'): ?>
                <a
                    href="<?php echo e(ci_route('rtm.ajax_add_anggota', $kk)); ?>"
                    data-remote="false"
                    data-toggle="modal"
                    data-target="#modalBox"
                    data-title="Tambah Anggota Rumah Tangga"
                    title="Tambah Anggota Dari Penduduk Yang Sudah Ada"
                    class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                ><i class='fa fa-plus'></i> Tambah Anggota</a>
            <?php endif; ?>
            <?php if(can('h')): ?>
                <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?php echo e(ci_route('rtm.delete_all_anggota', $kk)); ?>')" class="btn btn-social	btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                        class='fa fa-trash-o'
                    ></i> Hapus</a>
            <?php endif; ?>
            <a href="<?php echo e(ci_route('rtm.kartu_rtm', $kk)); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-book"></i> Kartu Rumah Tangga</a>
            <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('rtm'), 'label' => 'Daftar Rumah Tangga'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <div class="box-body">
            <h5><b>Rincian Keluarga</b></h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover tabel-rincian">
                    <tbody>
                        <tr>
                            <td width="20%">Nomor Rumah Tangga (RT)</td>
                            <td width="1%">:</td>
                            <td><?php echo e($kepala_kk['no_kk']); ?></td>
                        </tr>
                        <tr>
                            <td>Kepala Rumah Tangga</td>
                            <td>:</td>
                            <td><?php echo e($kepala_kk['nama']); ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo e($kepala_kk['alamat_wilayah']); ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah KK</td>
                            <td>:</td>
                            <td><?php echo e($kepala_kk['jumlah_kk']); ?> </td>
                        </tr>
                        <tr>
                            <td>Jumlah Anggota</td>
                            <td>:</td>
                            <td><?php echo e(count($main)); ?> </td>
                        </tr>
                        <tr>
                            <td>BDT</td>
                            <td>:</td>
                            <td><?php echo e($kepala_kk['bdt'] ?? '-'); ?> </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if($program['programkerja']): ?>
                                    <?php echo anchor("peserta_bantuan/peserta/3/{$kepala_kk['no_kk']}", 'Program Bantuan', 'target="_blank"'); ?>

                                <?php else: ?>
                                    Program Bantuan
                                <?php endif; ?>
                            </td>
                            <td>:</td>
                            <td>
                                <?php if($program['programkerja']): ?>
                                    <?php $__currentLoopData = $program['programkerja']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo anchor("peserta_bantuan/data_peserta/{$item['id']}", '<span class="label label-success">' . $item['bantuan']['nama'] . '</span>&nbsp;', 'target="_blank"'); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-body">
            <h5><b>Daftar Anggota</b></h5>
            <form id="mainform" name="mainform" method="post">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                        <thead class="bg-gray disabled color-palette">
                            <tr>
                                <?php if(can('h')): ?>
                                    <th><input type="checkbox" id="checkall" /></th>
                                <?php endif; ?>
                                <th>No</th>
                                <?php if(can('u')): ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                                <th>NIK</th>
                                <th>Nomor KK</th>
                                <th width="25%">Nama</th>
                                <th>Jenis Kelamin</th>
                                <th width="35%">Alamat</th>
                                <th>Hubungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($main): ?>
                                <?php $__currentLoopData = $main; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php if(can('u')): ?>
                                            <td class="padat"><input type="checkbox" name="id_cb[]" value="<?php echo e($data['id']); ?>" /></td>
                                        <?php endif; ?>
                                        <td class="padat"><?php echo e($key + 1); ?></td>
                                        <?php if(can('u')): ?>
                                            <td class="aksi">
                                                <?php if(can('u')): ?>
                                                    <a href="<?php echo e(ci_route("penduduk.form.{$data['id']}")); ?>" class="btn bg-orange btn-sm" title="Ubah Biodata Penduduk"><i class="fa fa-edit"></i></a>
                                                    <a
                                                        href="<?php echo e(ci_route("rtm.edit_anggota.{$kk}", $data['id'])); ?>"
                                                        data-remote="false"
                                                        data-toggle="modal"
                                                        data-target="#modalBox"
                                                        data-title="Ubah Hubungan Rumah Tangga"
                                                        title="Ubah Hubungan Rumah Tangga"
                                                        class="btn bg-navy btn-sm"
                                                    ><i class="fa fa-link"></i></a>
                                                <?php endif; ?>
                                                <?php if(can('h')): ?>
                                                    <a href="#" data-href="<?php echo e(ci_route("rtm.delete_anggota.{$kk}", $data['id'])); ?>" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                        <td><?php echo e($data['nik']); ?></td>
                                        <td><?php echo e($data['keluarga']['no_kk']); ?></td>
                                        <td nowrap><?php echo e(strtoupper($data['nama'])); ?></td>
                                        <td><?php echo e(strtoupper(App\Enums\JenisKelaminEnum::valueOf($data['sex']))); ?></td>
                                        <td><?php echo e($data['alamat_wilayah']); ?> </td>
                                        <td nowrap><?php echo e(strtoupper(App\Enums\HubunganRTMEnum::valueOf($data['rtm_level']))); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td class="text-center" colspan="9">Data Tidak Tersedia</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/penduduk/rtm/anggota.blade.php ENDPATH**/ ?>