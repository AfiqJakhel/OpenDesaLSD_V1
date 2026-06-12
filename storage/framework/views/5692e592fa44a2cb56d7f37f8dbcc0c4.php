<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        <?php echo e(strtoupper($judul)); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Laporan Penduduk</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if ($__env->exists('admin.layouts.components.buttons.tambah', [
                        'modal' => true,
                        'url' => $routePath . '/form',
                    ])) echo $__env->make('admin.layouts.components.buttons.tambah', [
                        'modal' => true,
                        'url' => $routePath . '/form',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if(can('h')): ?>
                        <a href="#confirm-delete" title="Hapus" onclick="deleteAllBox('mainform','<?php echo e(ci_route($routePath . '.delete')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'
                            ></i> Hapus
                        </a>
                    <?php endif; ?>
                    <?php if(can('u')): ?>
                        <?php if(setting('sinkronisasi_opendk')): ?>
                            <a href="#" title="Kirim Ke OpenDK" id="kirim" onclick="formAction('mainform','<?php echo e(ci_route($routePath . '.kirim')); ?>')"
                                class="btn btn-social btn-primary btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block aksi-terpilih" title="Kirim Ke OpenDK"
                            ><i class="fa fa-random"></i> Kirim Ke OpenDK</a>
                        <?php else: ?>
                            <a href="#" title="API Key Belum Ditentukan" class="btn btn-social btn-primary btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" disabled><i class="fa fa-random"></i> Kirim Ke OpenDK</a>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <select class="form-control input-sm select2" id="filter-tahun">
                                <option value="">Semua Tahun</option>
                                <?php $__currentLoopData = $tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($thn->tahun); ?>"><?php echo e($thn->tahun); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tabel-daftar" id="tabel-data">
                            <thead class="bg-gray">
                                <tr>
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Judul</th>
                                    <th><?php echo e($kolom); ?></th>
                                    <th>Tahun</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Kirim</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            let TableData = $('#tabel-data').DataTable({
                'processing': true,
                'serverSide': true,
                'autoWidth': false,
                'pageLength': 10,
                'order': [
                    [5, 'desc'],
                    [4, 'desc']
                ],
                'columnDefs': [{
                        'orderable': false,
                        'targets': [0, 1, 2]
                    },
                    {
                        'className': 'padat',
                        'targets': [0, 1, 4, 5, 6, 7]
                    },
                    {
                        'className': 'aksi',
                        'targets': [2]
                    },
                ],
                'ajax': {
                    'url': "<?php echo e(ci_route($routePath . '.datatables')); ?>",
                    'method': 'POST',
                    'data': function(d) {}
                },
                'columns': [{
                        'data': 'ceklist'
                    },
                    {
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        'data': 'aksi'
                    },
                    {
                        'data': 'judul'
                    },
                    {
                        'data': 'semester'
                    },
                    {
                        'data': 'tahun'
                    },
                    {
                        'data': 'updated_at'
                    },
                    {
                        'data': 'kirim'
                    },
                ],
            });

            $('#kirim').on('click', function() {
                $('#loading').modal({
                    backdrop: 'static',
                    keyboard: false
                }).show();
            });


            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }
            $('#filter-tahun').change(function() {
                TableData.column(5).search($(this).val()).draw()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/opendk/index.blade.php ENDPATH**/ ?>