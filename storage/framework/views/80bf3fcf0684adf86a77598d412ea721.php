<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Pengaturan <?php echo e($utama ? 'Modul' : 'Submodul'); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php if(!$utama): ?>
        <li><a href="<?php echo e(ci_route('modul')); ?>">Daftar Modul</a></li>
    <?php endif; ?>
    <li class="active">Pengaturan <?php echo e($utama ? 'Modul' : 'Submodul'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form id="validasi" action="<?php echo e($form_action); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="box box-primary">
            <div class="box-header with-border">
                <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('modul'), 'label' => 'Daftar Modul'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if($item['parent'] != '0'): ?>
                    <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('modul.index', $item['parent']), 'label' => 'Daftar Sub Modul'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="pamong_nama">
                        <?php if($item['parent'] != '0'): ?>
                            Nama Sub Modul
                        <?php else: ?>
                            Nama Modul
                        <?php endif; ?>
                    </label>
                    <div class="col-sm-6">
                        <input type="hidden" name="modul" value="1">
                        <input type="hidden" name="parent" value="<?php echo e($item['parent']); ?>">
                        <input
                            id="modul"
                            name="modul"
                            class="form-control input-sm strip_tags required"
                            type="text"
                            placeholder="Nama Modul/Sub Modul"
                            value="<?php echo e($item['modul']); ?>"
                            minlength="3"
                            maxlength="50"
                        />
                        <label class="error" id="tag_error" style="display: none;">Tidak boleh ada tag.</label>
                        <code>Isi dengan [Desa] untuk menyesuaikan sebutan desa berdasarkan pengaturan aplikasi.</code>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="ikon">Ikon</label>
                    <div class="col-sm-6">
                        <select class="form-control select2-ikon required" id="ikon" name="ikon" data-placeholder="Pilih Icon">
                            <?php $__currentLoopData = $list_icon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($icon); ?>" <?= ($icon == $item['ikon']) ? 'selected' : ''; ?>><?php echo $icon; ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-lg-4 control-label" for="status">Status</label>
                    <div class="btn-group col-xs-12 col-sm-7" data-toggle="buttons">
                        <label id="sx3" class="btn btn-info btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if($item['raw_aktif'] == '1' || $item['raw_aktif'] == null): ?> active <?php endif; ?>">
                            <input
                                id="g1"
                                type="radio"
                                name="aktif"
                                class="form-check-input"
                                type="radio"
                                value="1"
                                <?= ($item['raw_aktif'] == '1' || $item['raw_aktif'] == null) ? 'checked' : ''; ?>
                                autocomplete="off"
                            > Aktif
                        </label>
                        <label id="sx4" class="btn btn-info btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if($item['raw_aktif'] == '2'): ?> active <?php endif; ?>">
                            <input
                                id="g2"
                                type="radio"
                                name="aktif"
                                class="form-check-input"
                                type="radio"
                                value="2"
                                <?= ($item['raw_aktif'] == '2') ? 'checked' : ''; ?>
                                autocomplete="off"
                            > Tidak Aktif
                        </label>
                    </div>
                </div>
            </div>
            <div class='box-footer'>
                <?php echo batal(); ?>

                <button type='submit' class='btn btn-social btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/custom-select2.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/pengaturan/modul/form.blade.php ENDPATH**/ ?>