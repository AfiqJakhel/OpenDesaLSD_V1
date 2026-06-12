<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Kategori
        <small>Daftar Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Kategori</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('lapak::backend.navigasi', $navigasi, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php if (isset($component)) { $__componentOriginal7a3eb12988970aebf81945dcf52d7c46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a3eb12988970aebf81945dcf52d7c46 = $attributes; } ?>
<?php $component = App\View\Components\TambahButton::resolve(['modal' => 'true','url' => 'lapak_admin/kategori_form/'.$main->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tambah-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TambahButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a3eb12988970aebf81945dcf52d7c46)): ?>
<?php $attributes = $__attributesOriginal7a3eb12988970aebf81945dcf52d7c46; ?>
<?php unset($__attributesOriginal7a3eb12988970aebf81945dcf52d7c46); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a3eb12988970aebf81945dcf52d7c46)): ?>
<?php $component = $__componentOriginal7a3eb12988970aebf81945dcf52d7c46; ?>
<?php unset($__componentOriginal7a3eb12988970aebf81945dcf52d7c46); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal27eceb85e0e48badafeabec05cfe7eea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27eceb85e0e48badafeabec05cfe7eea = $attributes; } ?>
<?php $component = App\View\Components\HapusButton::resolve(['url' => 'lapak_admin/kategori_delete_all','confirmDelete' => true,'selectData' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('hapus-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\HapusButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27eceb85e0e48badafeabec05cfe7eea)): ?>
<?php $attributes = $__attributesOriginal27eceb85e0e48badafeabec05cfe7eea; ?>
<?php unset($__attributesOriginal27eceb85e0e48badafeabec05cfe7eea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27eceb85e0e48badafeabec05cfe7eea)): ?>
<?php $component = $__componentOriginal27eceb85e0e48badafeabec05cfe7eea; ?>
<?php unset($__componentOriginal27eceb85e0e48badafeabec05cfe7eea); ?>
<?php endif; ?>
            <?php
            $listCetakUnduh = [
                [ 'url' => "lapak_admin/kategori/dialog/cetak", 'judul' => "Cetak", 'icon' => 'fa fa-print'],
                [ 'url' => "lapak_admin/kategori/dialog/unduh", 'judul' => "Unduh", 'icon' => 'fa fa-download']
            ];
            ?>
            <?php if (isset($component)) { $__componentOriginal8efe3807774add4f16598e058556e738 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8efe3807774add4f16598e058556e738 = $attributes; } ?>
<?php $component = App\View\Components\SplitButton::resolve(['judul' => 'Cetak/Unduh','list' => $listCetakUnduh,'icon' => 'fa fa-arrow-circle-down','type' => 'bg-purple'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('split-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SplitButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8efe3807774add4f16598e058556e738)): ?>
<?php $attributes = $__attributesOriginal8efe3807774add4f16598e058556e738; ?>
<?php unset($__attributesOriginal8efe3807774add4f16598e058556e738); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8efe3807774add4f16598e058556e738)): ?>
<?php $component = $__componentOriginal8efe3807774add4f16598e058556e738; ?>
<?php unset($__componentOriginal8efe3807774add4f16598e058556e738); ?>
<?php endif; ?>
        </div>
        <form id="mainform" name="mainform" method="post">
            <div class="box-body">
                <div class="row mepet">
                    <div class="col-sm-2">
                        <select class="form-control input-sm select2" id="status" name="status">
                            <option value="">Pilih Status</option>
                            <option value="1" selected>Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <hr class="batas">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable table-hover tabel-daftar" id="tabel-kategori">
                        <thead class="bg-gray disabled color-palette">
                            <tr>
                                <th><input type="checkbox" id="checkall" /></th>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Kategori</th>
                                <th>Jumlah Produk</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            let tabel_produk = $('#tabel-kategori').DataTable({
                'processing': true,
                'serverSide': true,
                'autoWidth': false,
                'pageLength': 10,
                'order': [
                    [3, 'desc']
                ],
                'columnDefs': [{
                        'orderable': false,
                        'targets': [0, 1, 2]
                    },
                    {
                        'searchable': false,
                        'targets': [0, 1, 2, 4]
                    },
                    {
                        'className': 'padat',
                        'targets': [0, 1, 4]
                    },
                    {
                        'className': 'aksi',
                        'targets': [2]
                    }
                ],
                'ajax': {
                    'url': "<?php echo e(ci_route('lapak_admin/kategori')); ?>",
                    'method': 'get',
                    'data': function(d) {
                        d.status = $('#status').val();
                    }
                },
                'columns': [{
                        data: 'ceklist',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        orderable: false,
                        searchable: false,
                        'data': 'DT_RowIndex'
                    },
                    {
                        data: 'aksi',
                        class: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        'data': 'kategori'
                    },
                    {
                        'data': 'jumlah'
                    },
                ],
                'language': {
                    'url': "<?php echo e(base_url('/assets/bootstrap/js/dataTables.indonesian.lang')); ?>"
                }
            });

            if (hapus == 0) {
                tabel_produk.column(0).visible(false);
            }

            if (ubah == 0) {
                tabel_produk.column(2).visible(false);
            }

            $('#status').on('select2:select', function(e) {
                tabel_produk.ajax.reload();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Lapak\Views/backend/kategori/index.blade.php ENDPATH**/ ?>