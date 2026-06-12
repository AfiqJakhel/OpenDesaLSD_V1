<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $tipe = str_replace('_master', '', $ci->controller); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Kategori <?php echo e(ucfirst($tipe)); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?= site_url($tipe) ?>"> Daftar <?= ucfirst($tipe) ?></a></li>
    <li class="active">Kategori <?php echo e(ucfirst($tipe)); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php echo $__env->make('admin.layouts.components.buttons.tambah', ['url' => "{$ci->controller}/form"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.layouts.components.buttons.hapus', [
                'url' => "{$ci->controller}/delete_all",
                'confirmDelete' => true,
                'selectData' => true,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => site_url($tipe), 'label' => 'Daftar ' . ucfirst($tipe)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="box-body">
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover tabel-daftar" id="tabeldata">
                    <thead class="bg-gray">
                        <tr>
                            <th class="padat"><input type="checkbox" id="checkall" /></th>
                            <th class="padat">No</th>
                            <th class="aksi">Aksi</th>
                            <th class="padat">Kategori <?php echo e(ucfirst($tipe)); ?></th>
                            <th>Deskripsi <?php echo e(ucfirst($tipe)); ?></th>
                            <th class="padat">Jumlah <?php echo e(ucfirst($tipe)); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e($ci->controller); ?>",
                },
                columns: [{
                        data: 'ceklist',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
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
                        data: 'kelompok',
                        name: 'kelompok',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                ],
                order: [
                    [3, 'asc']
                ],
                pageLength: 25,
                createdRow: function(row, data, dataIndex) {
                    if (data.jenis == 0 || data.jenis == 1) {
                        $(row).addClass('select-row');
                    }
                }
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
                TableData.column(7).visible(false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/kelompok_master/index.blade.php ENDPATH**/ ?>