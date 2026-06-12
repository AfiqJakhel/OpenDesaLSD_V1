<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Kontak <?php echo e($navigasi); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Kontak <?php echo e($navigasi); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('admin.daftar_kontak.navigasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if(can('u')): ?>
                        <a href="<?php echo e(ci_route('daftar_kontak.form')); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    <?php endif; ?>
                    <?php if(can('h')): ?>
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('daftar_kontak.delete')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'
                            ></i> Hapus</a>
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
                                    <th>NAMA</th>
                                    <th>TELEPON</th>
                                    <th>EMAIL</th>
                                    <th>TELEGRAM</th>
                                    <th>KIRIM MELALUI</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
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
                ajax: "<?php echo e(ci_route('daftar_kontak.datatables')); ?>",
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
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'telepon',
                        name: 'telepon',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'email',
                        name: 'email',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'telegram',
                        name: 'telegram',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'hubung_warga',
                        name: 'hubung_warga',
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/daftar_kontak/index.blade.php ENDPATH**/ ?>