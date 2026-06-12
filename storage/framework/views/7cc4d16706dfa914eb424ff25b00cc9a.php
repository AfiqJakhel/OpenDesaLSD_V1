<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title'); ?>
    <h1>
        Alasan Keluar Kehadiran
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Alasan Keluar Kehadiran</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <?php if (isset($component)) { $__componentOriginal7a3eb12988970aebf81945dcf52d7c46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a3eb12988970aebf81945dcf52d7c46 = $attributes; } ?>
<?php $component = App\View\Components\TambahButton::resolve(['url' => 'kehadiran_keluar/form'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <?php endif; ?>
            <?php if(can('h')): ?>
            <?php if (isset($component)) { $__componentOriginal27eceb85e0e48badafeabec05cfe7eea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27eceb85e0e48badafeabec05cfe7eea = $attributes; } ?>
<?php $component = App\View\Components\HapusButton::resolve(['confirmDelete' => 'true','selectData' => 'true','url' => 'kehadiran_keluar/delete_all'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <th>ALASAN</th>
                            <th>KETERANGAN</th>
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
                ajax: "<?php echo e(ci_route('kehadiran_keluar.datatables')); ?>",
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
                        data: 'alasan',
                        name: 'alasan',
                        searchable: true,
                        orderable: true
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Kehadiran\Views/backend/alasan_keluar/index.blade.php ENDPATH**/ ?>