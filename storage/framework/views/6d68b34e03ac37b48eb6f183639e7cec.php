<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title'); ?>
    <h1>
        Pembangunan
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Pembangunan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <a href="<?php echo e(ci_route('admin_pembangunan.form')); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select id="tahun" class="form-control input-sm select2">
                        <option value="">Pilih Tahun</option>
                        <?php $__currentLoopData = $tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($item->tahun_anggaran); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <hr class="batas">
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th class="padat">NO</th>
                            <th class="padat">AKSI</th>
                            <th>NAMA KEGIATAN</th>
                            <th>SUMBER DANA</th>
                            <th>ANGGARAN</th>
                            <th>PERSENTASE</th>
                            <th>VOLUME</th>
                            <th>TAHUN</th>
                            <th>PELAKSANA</th>
                            <th>LOKASI</th>
                            <th class="padat">GAMBAR</th>
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
                ajax: {
                    url: "<?php echo e(ci_route('admin_pembangunan.datatables')); ?>",
                    data: function(req) {
                        req.tahun = $('#tahun').val();
                    }
                },
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
                        data: 'judul',
                        name: 'judul',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'sumber_dana',
                        name: 'sumber_dana',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'anggaran',
                        name: 'anggaran',
                        render: $.fn.dataTable.render.number('.', ',', 0, 'Rp '),
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'persentase',
                        name: 'persentase',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'volume',
                        name: 'volume',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'tahun_anggaran',
                        name: 'tahun_anggaran',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'pelaksana_kegiatan',
                        name: 'pelaksana_kegiatan',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'alamat',
                        name: 'wilayah.dusun',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        searchable: false,
                        orderable: false
                    },
                ],
                order: [
                    [7, 'desc']
                ]
            });

            $('#tahun').change(function() {
                TableData.draw()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/pembangunan/index.blade.php ENDPATH**/ ?>