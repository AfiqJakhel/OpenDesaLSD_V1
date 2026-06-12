<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Keuangan
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Keuangan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <a href="#modal-tambah" data-toggle="modal" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Template</a>
                <a href="<?php echo e(ci_route('keuangan_manual.impor_data')); ?>" class="btn btn-social bg-navy btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Impor Data Keuangan"><i class="fa fa-upload"></i>Impor</a>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-3">
                    <select id="jenis_anggaran" name="jenis_anggaran" class="form-control input-sm select2">
                        <option value="">Pilih Jenis Anggaran</option>
                        <?php $__currentLoopData = $jenis_anggaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <optgroup label="<?php echo e($item->uraian); ?>">
                                <option <?= ($filter['jenis'] == $item->uuid) ? 'selected' : ''; ?> value="<?php echo e($item->uuid); ?>"><?php echo e("{$item->uuid} {$item->uraian}"); ?></option>
                                <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($children->uuid); ?>"><?php echo e("{$children->uuid} {$children->uraian}"); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select id="tahun_anggaran" name="tahun_anggaran" class="form-control input-sm  select2">
                        <option value="">Pilih Tahun Anggaran</option>
                        <?php $__currentLoopData = $tahun_anggaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?= ($filter['tahun'] == $item->tahun) ? 'selected' : ''; ?> value="<?php echo e($item->tahun); ?>"><?php echo e($item->tahun); ?></option>
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
                            <th class="padat">KODE REKENING</th>
                            <th>URAIAN</th>
                            <th>ANGGARAN</th>
                            <th>REALISASI</th>
                        </tr>
                    </thead>
                    <tbody id="dragable">
                    </tbody>
                </table>
            </div>
            </form>
        </div>
    </div>
    <?php echo $__env->make('admin.keuangan.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                orderable: true,
                searching: true,
                paging: false,
                ajax: {
                    url: "<?php echo e(site_url('keuangan_manual/datatables')); ?>",
                    data: function(request) {
                        request.jenis_anggaran = $('#jenis_anggaran').val();
                        request.tahun_anggaran = $('#tahun_anggaran').val();
                    },
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
                        data: 'kode_menjorok',
                        name: 'template.uuid',
                        class: 'text-nowrap',
                    },
                    {
                        data: 'uraian_menjorok',
                        name: 'template.uraian',
                    },
                    {
                        data: 'anggaran',
                        name: 'anggaran',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'realisasi',
                        name: 'realisasi',
                        class: 'text-nowrap'
                    },
                ],
                order: [
                    [2, 'asc']
                ],
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }

            $('#jenis_anggaran, #tahun_anggaran').change(function() {
                TableData.draw();
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/keuangan/index.blade.php ENDPATH**/ ?>