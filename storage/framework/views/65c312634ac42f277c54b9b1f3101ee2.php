<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        PRODUK
        <small>Daftar Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Produk</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('lapak::backend.navigasi', $navigasi, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(request('id_pend')): ?>
                <?php
                    $pelapakTerpilih = collect($pelapak)->firstWhere('id_pend', request('id_pend'));
                    $id_pelapak = $pelapakTerpilih ? $pelapakTerpilih->id : '';
                ?>
                <?php if (isset($component)) { $__componentOriginal7a3eb12988970aebf81945dcf52d7c46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a3eb12988970aebf81945dcf52d7c46 = $attributes; } ?>
<?php $component = App\View\Components\TambahButton::resolve(['url' => 'lapak_admin/produk_form?id_pelapak=' . $id_pelapak] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\HapusButton::resolve(['url' => 'lapak_admin/produk_delete_all','confirmDelete' => true,'selectData' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <?php
            $listCetakUnduh = [
                [ 'url' => "lapak_admin/produk/dialog/cetak", 'judul' => "Cetak", 'icon' => 'fa fa-print'],
                [ 'url' => "lapak_admin/produk/dialog/unduh", 'judul' => "Unduh", 'icon' => 'fa fa-download']
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
                    <div class="col-sm-3">
                        <select class="form-control input-sm select2" id="id_pend" name="id_pend">
                            <option value="">Pilih Pelapak</option>
                            <?php $__currentLoopData = $pelapak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pel->id_pend); ?>" <?= ($pel->id_pend == request('id_pend')) ? 'selected' : ''; ?>><?php echo e($pel->nik . ' - ' . $pel->pelapak); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control input-sm select2" id="id_produk_kategori" name="id_produk_kategori">
                            <option value="">Pilih Kategori</option>
                            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($kat->id); ?>"><?php echo e($kat->kategori); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <hr class="batas">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable table-hover tabel-daftar" id="tabel-produk">
                        <thead class="bg-gray disabled color-palette">
                            <tr>
                                <th><input type="checkbox" id="checkall" /></th>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Pelapak</th>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Satuan</th>
                                <th>Potongan</th>
                                <th>Deskripsi</th>
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
            let tabel_produk = $('#tabel-produk').DataTable({
                'processing': true,
                'serverSide': true,
                'autoWidth': false,
                'pageLength': 10,
                'order': [
                    [6, 'desc']
                ],
                'columnDefs': [{
                        'orderable': false,
                        'targets': [0, 1, 2]
                    },
                    {
                        'className': 'padat',
                        'targets': [0, 1, 2, 7, 8]
                    },
                    {
                        'className': 'dt-nowrap',
                        'targets': [9],
                        'width': '30%'
                    },
                    {
                        'targets': [0, 2],
                        'visible': <?php echo e(request('id_pend') ? 'true' : 'false'); ?>

                    }
                ],
                'ajax': {
                    'url': "<?php echo e(ci_route('lapak_admin/produk')); ?>",
                    'method': 'get',
                    'data': function(d) {
                        d.status = $('#status').val();
                        d.id_pend = $('#id_pend').val();
                        d.id_produk_kategori = $('#id_produk_kategori').val();
                    }
                },
                'columns': [
                    {
                        data: 'ceklist',
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
                        searchable: false,
                        'data': 'pelapak'
                    },
                    {
                        'data': 'nama'
                    },
                    {
                        'name': 'pk.kategori',
                        'data': 'kategori'
                    },
                    {
                        'data': 'harga',
                        'render': $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
                    },
                    {
                        'data': 'satuan'
                    },
                    {
                        'name': 'potongan',
                        'data': function(data) {
                            return `${(data.tipe_potongan == 1) ? data.potongan + '%' : 'Rp. ' + formatRupiah(data.potongan.toString())}`
                        }
                    },
                    {
                        name: 'deskripsi',
                        'data': 'deskripsi',
                        'render': function(data) {
                            return data.length > 150 ? data.substr(0, 150) + '…' : data;
                        }
                    }
                ],
                'language': {
                    'url': "<?php echo e(base_url('/assets/bootstrap/js/dataTables.indonesian.lang')); ?>"
                }
            });

            $('#status').on('select2:select', function(e) {
                tabel_produk.ajax.reload();
            });

            $('#id_pend').on('select2:select', function(e) {
                tabel_produk.ajax.reload();
            });

            $('#id_produk_kategori').on('select2:select', function(e) {
                tabel_produk.ajax.reload();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Lapak\Views/backend/produk/index.blade.php ENDPATH**/ ?>