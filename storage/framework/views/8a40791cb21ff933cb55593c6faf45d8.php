<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title'); ?>
    <h1>
        Hari Libur Kehadiran
        <small><?php echo e($action); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('kehadiran_hari_libur')); ?>">Daftar Hari Libur</a></li>
    <li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('kehadiran_hari_libur'), 'label' => 'Daftar Hari Libur'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo form_open($form_action, 'class="form-horizontal" id="validasi"'); ?>

        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="tanggal">Tanggal</label>
                <div class="col-sm-7">
                    <input class="form-control input-sm datepicker required" placeholder="Tanggal Hari Libur" type="text" name="tanggal" value="<?php echo e($kehadiran_hari_libur->tanggal); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="keterangan">Keterangan</label>
                <div class="col-sm-7">
                    <textarea name="keterangan" class="form-control input-sm" maxlength="300" placeholder="Keterangan" rows="3" style="resize:none;"><?php echo e($kehadiran_hari_libur->keterangan); ?></textarea>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
        </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Kehadiran\Views/backend/hari_libur/form.blade.php ENDPATH**/ ?>