<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $tipe = ucfirst(str_replace('_master', '', $ci->controller)); ?>

<?php $__env->startSection('title'); ?>
    <h1>Kategori <?php echo e($tipe); ?>

        <small><?php echo e($action); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?= site_url(strtolower($tipe)) ?>"><?= $tipe ?></a></li>
    <li><a href="<?= site_url($ci->controller) ?>"> Kategori <?= $tipe ?></a></li>
    <li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => site_url($ci->controller), 'label' => 'Kategori ' . $tipe], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="nama">Klasifikasi/Kategori <?= $tipe ?></label>
                    <div class="col-sm-8">
                        <input id="kelompok" class="form-control input-sm required judul" type="text" placeholder="Kategori <?= $tipe ?>" name="kelompok" value="<?= $kelompok_master->kelompok ?>"></input>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="Deskripsi">Deskripsi <?= $tipe ?></label>
                    <div class="col-sm-8">
                        <textarea name="deskripsi" class="form-control input-sm" placeholder="Deskripsi <?= $tipe ?>" rows="5"><?= $kelompok_master->deskripsi ?></textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/kelompok_master/form.blade.php ENDPATH**/ ?>