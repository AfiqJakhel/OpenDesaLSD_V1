<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Anjungan
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Anjungan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(!cek_anjungan()): ?>
        <?php echo $__env->make('anjungan::backend.anjungan.peringatan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <?php if(can('u')): ?>
                    <a href="<?php echo e(ci_route('anjungan.form')); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                <?php endif; ?>
                <?php if(can('h')): ?>
                    <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('anjungan.delete')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                            class='fa fa-trash-o'></i>
                        Hapus</a>
                <?php endif; ?>
            </div>
            <div class="box-body">
                <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tabeldata">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="checkall" /></th>
                                <th class="padat">NO</th>
                                <th class="padat">AKSI</th>
                                <th class="padat">IP ADDRESS</th>
                                <th class="padat">MAC ADDRESS</th>
                                <th class="padat">ID PENGUNJUNG</th>
                                <th class="padat">IP ADDRESS PRINTER & PORT</th>
                                <th class="padat">VIRTUAL KEYBOARD</th>
                                <th class="padat">STATUS</th>
                                <th class="padat">PERMOHONAN SURAT TANPA AKUN</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(ci_route('anjungan.datatables')); ?>",
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
                        data: 'ip_address',
                        name: 'ip_address',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'mac_address',
                        name: 'mac_address',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'id_pengunjung',
                        name: 'id_pengunjung',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'ip_address_port_printer',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'keyboard',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'status',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'permohonan_surat_tanpa_akun',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        searchable: true,
                        orderable: true
                    },
                ],
                order: [
                    [3, 'asc']
                ]
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Anjungan\Views/backend/anjungan/index.blade.php ENDPATH**/ ?>