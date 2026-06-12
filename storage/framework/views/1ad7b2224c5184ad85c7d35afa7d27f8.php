<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title'); ?>
    <h1>
        Jam Kerja Kehadiran
        <small><?php echo e($action); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('kehadiran_jam_kerja')); ?>">Daftar Jam Kerja</a></li>
    <li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('kehadiran_jam_kerja'), 'label' => 'Daftar Hari Libur'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <?php echo form_open($form_action, 'class="form-horizontal" id="validasi"'); ?>

        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="jam_mulai">Jam Masuk</label>
                <div class="col-sm-7">
                    <input class="form-control input-sm required" placeholder="Jam Masuk" type="text" id="jammenit_1" name="jam_masuk" value="<?php echo e(date('H:i', strtotime($kehadiran_jam_kerja->jam_masuk))); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="jam_akhir">Jam Keluar</label>
                <div class="col-sm-7">
                    <input class="form-control input-sm required" placeholder="Jam Keluar" type="text" id="jammenit_2" name="jam_keluar" value="<?php echo e(date('H:i', strtotime($kehadiran_jam_kerja->jam_keluar))); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="keterangan">Keterangan</label>
                <div class="col-sm-7">
                    <textarea name="keterangan" class="form-control input-sm" maxlength="300" placeholder="Keterangan" rows="3" style="resize:none;"><?php echo e($kehadiran_jam_kerja->keterangan); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="status">Status</label>
                <div class="btn-group col-sm-7" data-toggle="buttons">
                    <label id="sx3" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?php echo e(jecho($kehadiran_jam_kerja->status, '1', 'active')); ?>">
                        <input type="radio" name="status" class="form-check-input" type="radio" value="1" <?php echo e(jecho($kehadiran_jam_kerja->status, '1', 'checked')); ?>> Hari Kerja
                    </label>
                    <label id="sx4" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label  <?php echo e(jecho($kehadiran_jam_kerja->status != '1', true, 'active')); ?>">
                        <input type="radio" name="status" class="form-check-input" type="radio" value="0" <?php echo e(jecho($kehadiran_jam_kerja->status != '1', true, 'checked')); ?>> Hari Libur
                    </label>
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
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        setTimeout(function() {
            $("#jammenit_2").rules('add', {
                jam_lebih_besar: "input[name='jam_masuk']",
                messages: {
                    jam_lebih_besar: "Jam keluar harus sama atau lebih besar dari jam masuk."
                }
            })
        }, 500);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Kehadiran\Views/backend/jam_kerja/form.blade.php ENDPATH**/ ?>