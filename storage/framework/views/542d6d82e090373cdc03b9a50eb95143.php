<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        <?php echo e($kat_nama); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active"><?php echo e($kat_nama); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if (isset($component)) { $__componentOriginal7a3eb12988970aebf81945dcf52d7c46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a3eb12988970aebf81945dcf52d7c46 = $attributes; } ?>
<?php $component = App\View\Components\TambahButton::resolve(['url' => 'dokumen/form'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\HapusButton::resolve(['url' => 'dokumen/delete','confirmDelete' => true,'selectData' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        [ 'url' => "dokumen/dialog_cetak/cetak", 'judul' => "Cetak", 'icon' => 'fa fa-print'],
                        [ 'url' => "dokumen/dialog_cetak/unduh", 'judul' => "Unduh", 'icon' => 'fa fa-download']
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
                    <?php if (isset($component)) { $__componentOriginal0fd673fce629071b3dc828d9abc34190 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0fd673fce629071b3dc828d9abc34190 = $attributes; } ?>
<?php $component = App\View\Components\BtnButton::resolve(['judul' => 'Ekspor','icon' => 'fa fa-download','type' => 'bg-blue','modal' => 'true','url' => 'dokumen/ekspor'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('btn-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BtnButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0fd673fce629071b3dc828d9abc34190)): ?>
<?php $attributes = $__attributesOriginal0fd673fce629071b3dc828d9abc34190; ?>
<?php unset($__attributesOriginal0fd673fce629071b3dc828d9abc34190); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0fd673fce629071b3dc828d9abc34190)): ?>
<?php $component = $__componentOriginal0fd673fce629071b3dc828d9abc34190; ?>
<?php unset($__componentOriginal0fd673fce629071b3dc828d9abc34190); ?>
<?php endif; ?>
                </div>
                <div class="box-body">
                    <div class="row mepet">
                        <div class="col-sm-2">
                            <select id="status" class="form-control input-sm select2">
                                <option value="">Pilih Status</option>
                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <hr class="batas">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped dataTable table-hover" id="tabeldata">
                            <thead class="bg-gray disabled color-palette">
                                <tr>
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Judul</th>
                                    <th>Kategori Info Publik</th>
                                    <th>Tahun</th>
                                    <th nowrap>Aktif</th>
                                    <th nowrap>Dimuat Pada </th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Tanggal Retensi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>

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
                    url: "<?php echo e(ci_route('dokumen.datatables')); ?>",
                    data: function(req) {
                        req.status = $('#status').val();
                    }
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
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'infoPublic',
                        name: 'infoPublic',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tahun',
                        name: 'tahun',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'aktif',
                        name: 'aktif',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'dimuat',
                        name: 'tgl_upload',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'retensi',
                        name: 'retensi',
                        searchable: false,
                        orderable: true
                    },
                ],
                aaSorting: [],
                order: [
                    [7, 'desc']
                ],
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }

            $('#status').change(function() {
                TableData.draw()
            })

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/dokumen/informasi_publik/index.blade.php ENDPATH**/ ?>