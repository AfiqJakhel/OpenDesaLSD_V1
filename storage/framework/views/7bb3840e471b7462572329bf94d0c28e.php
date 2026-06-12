<?php echo $__env->make('admin.pengaturan_surat.asset_tinymce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.jquery_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>Daftar Program Bantuan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Daftar Program Bantuan</li>
<?php $__env->stopSection(); ?>

<style>
    .aksi .btn {
        margin-right: 3px;
    }
</style>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if (isset($component)) { $__componentOriginal7a3eb12988970aebf81945dcf52d7c46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a3eb12988970aebf81945dcf52d7c46 = $attributes; } ?>
<?php $component = App\View\Components\TambahButton::resolve(['url' => 'program_bantuan/create'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php if (isset($component)) { $__componentOriginaldb2f7ce310ca2979922f0bfb538809f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldb2f7ce310ca2979922f0bfb538809f7 = $attributes; } ?>
<?php $component = App\View\Components\ImporButton::resolve(['modal' => 'true','judul' => '\'Impor Program Bantuan\'','url' => 'program_bantuan/impor'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('impor-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ImporButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldb2f7ce310ca2979922f0bfb538809f7)): ?>
<?php $attributes = $__attributesOriginaldb2f7ce310ca2979922f0bfb538809f7; ?>
<?php unset($__attributesOriginaldb2f7ce310ca2979922f0bfb538809f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldb2f7ce310ca2979922f0bfb538809f7)): ?>
<?php $component = $__componentOriginaldb2f7ce310ca2979922f0bfb538809f7; ?>
<?php unset($__componentOriginaldb2f7ce310ca2979922f0bfb538809f7); ?>
<?php endif; ?>
                    
                    <?php if(can('h')): ?>
                        <a href="<?php echo e(site_url('program_bantuan/bersihkan_data')); ?>" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Bersihkan Data Peserta Tidak Valid"><i class="fa fa-wrench"></i>Bersihkan Data
                            Peserta Tidak Valid</a>
                    <?php endif; ?>
                    <?php if($tampil != 0): ?>
                        <?php if (isset($component)) { $__componentOriginalc11c7292aaa9235aebed7379ae351e6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc11c7292aaa9235aebed7379ae351e6a = $attributes; } ?>
<?php $component = App\View\Components\KembaliButton::resolve(['judul' => 'Kembali ke Daftar Program Bantuan','url' => '/program_bantuan'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('kembali-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\KembaliButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc11c7292aaa9235aebed7379ae351e6a)): ?>
<?php $attributes = $__attributesOriginalc11c7292aaa9235aebed7379ae351e6a; ?>
<?php unset($__attributesOriginalc11c7292aaa9235aebed7379ae351e6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc11c7292aaa9235aebed7379ae351e6a)): ?>
<?php $component = $__componentOriginalc11c7292aaa9235aebed7379ae351e6a; ?>
<?php unset($__componentOriginalc11c7292aaa9235aebed7379ae351e6a); ?>
<?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row mepet">
                                    <?php echo $__env->make('admin.layouts.components.select_status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col-sm-2">
                                        <select class="form-control input-sm select2" name="sasaran" id="sasaran">
                                            <option value="">Pilih Sasaran</option>
                                            <?php $__currentLoopData = $list_sasaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <hr class="batas">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped dataTable table-hover tabel-daftar" id="tabeldata">
                                                <thead class="bg-gray disabled color-palette">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Aksi</th>
                                                        <th>Nama Program</th>
                                                        <th>Asal Dana</th>
                                                        <th>Jumlah Peserta</th>
                                                        <th>Masa Berlaku</th>
                                                        <th>Sasaran</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.program_bantuan.impor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#status').val('1').trigger('change');

            let filterColumn = <?php echo json_encode($filterColumn); ?>

            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('program_bantuan.datatables')); ?>",
                    data: function(req) {
                        req.status = $('#status').val();
                        req.sasaran = $('#sasaran').val();
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
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'asaldana',
                        name: 'asaldana',
                        class: 'padat',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'peserta_count',
                        name: 'peserta_count',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tampil_tanggal',
                        name: 'tampil_tanggal',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'sasaran',
                        name: 'sasaran',
                        class: 'padat',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'status_masa_aktif',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                ],
                aaSorting: [],
            });

            $('#status').change(function() {
                TableData.draw();
            });

            $('#sasaran').change(function() {
                TableData.draw();
            });

            if (filterColumn) {
                if (filterColumn['status'] > 0) {
                    $('#status').val(filterColumn['status'])
                    $('#status').trigger('change')
                }
                if (filterColumn['sasaran'] > 0) {
                    $('#sasaran').val(filterColumn['sasaran'])
                    $('#sasaran').trigger('change')
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/program_bantuan/program.blade.php ENDPATH**/ ?>