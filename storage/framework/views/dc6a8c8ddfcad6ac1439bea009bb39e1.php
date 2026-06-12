<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.jquery_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Dokumentasi Pembangunan
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Dokumentasi Pembangunan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <a href="<?php echo e(ci_route('pembangunan_dokumentasi.form-dokumentasi', $pembangunan->id)); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            <?php endif; ?>
            <a href='<?php echo e(ci_route('pembangunan_dokumentasi.dialog', "{$pembangunan->id}/cetak")); ?>' class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox"
                data-title="Cetak Data"
            ><i class="fa fa-print "></i> Cetak</a>
            <a
                href='<?php echo e(ci_route('pembangunan_dokumentasi.dialog', "{$pembangunan->id}/unduh")); ?>'
                title="Unduh Data"
                class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                data-remote="false"
                data-toggle="modal"
                data-target="#modalBox"
                data-title="Unduh Data"
            ><i class="fa fa-download"></i></i> Unduh</a>
            <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('admin_pembangunan'), 'label' => 'Daftar Pembangunan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="box-body">
            <h5 class="text-bold">Rincian Dokumentasi Pembangunan</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover tabel-rincian">
                    <tbody>
                        <tr>
                            <td width="20%">Nama Kegiatan</td>
                            <td width="1">:</td>
                            <td><?php echo e($pembangunan->judul); ?></td>
                        </tr>
                        <tr>
                            <td>Sumber Dana</td>
                            <td> : </td>
                            <td><?php echo e($pembangunan->sumber_dana); ?></td>
                        </tr>
                        <tr>
                            <td>Lokasi Pembangunan</td>
                            <td> : </td>
                            <td><?php echo e($pembangunan->alamat); ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td> : </td>
                            <td><?php echo e($pembangunan->keterangan); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr style="margin-bottom: 5px; margin-top: -5px;">
        <div class="box-body">
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th class="padat">NO</th>
                            <th class="padat">AKSI</th>
                            <th class="padat">GAMBAR</th>
                            <th>PERSENTASE</th>
                            <th>KETERANGAN</th>
                            <th>TANGGAL REKAM</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </form>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(ci_route('pembangunan_dokumentasi.datatables-dokumentasi')); ?>/<?php echo e($pembangunan->id); ?>",
                columns: [{
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'aksi',
                        class: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'persentase',
                        name: 'persentase',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        searchable: true,
                        orderable: true
                    },
                ],
                order: [
                    [3, 'asc']
                ]
            });

            if (ubah == 0) {
                TableData.column(1).visible(false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/pembangunan/dokumentasi/index.blade.php ENDPATH**/ ?>