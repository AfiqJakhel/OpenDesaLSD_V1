<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Uraian Singkat</label>
    <div class="col-sm-6">
        <input name="attr[uraian]" class="form-control input-sm" type="text" value="<?php echo e($dokumen['attr']['uraian']); ?>"></input>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Nomor Keputusan
        <?php echo e(setting('sebutan_kepala_desa')); ?>

    </label>
    <div class="col-sm-6">
        <input name="attr[no_kep_kades]" class="form-control input-sm nomor_sk" type="text" value="<?php echo e($dokumen['attr']['no_kep_kades']); ?>"></input>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Tgl Keputusan
        <?php echo e(setting('sebutan_kepala_desa')); ?>

    </label>
    <div class="col-sm-6">
        <div class="input-group input-group-sm date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input id="tgl_1" name="attr[tgl_kep_kades]" class="form-control input-sm required" type="text" value="<?php echo e($dokumen['attr']['tgl_kep_kades']); ?>"></input>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Nomor Dilaporkan</label>
    <div class="col-sm-6">
        <input name="attr[no_lapor]" class="form-control input-sm nomor_sk" type="text" value="<?php echo e($dokumen['attr']['no_lapor']); ?>"></input>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Tgl Dilaporkan</label>
    <div class="col-sm-6">
        <div class="input-group input-group-sm date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input id="tgl_2" name="attr[tgl_lapor]" class="form-control input-sm" type="text" value="<?php echo e($dokumen['attr']['tgl_lapor']); ?>"></input>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Keterangan</label>
    <div class="col-sm-6">
        <textarea name="attr[keterangan]" class="form-control input-sm required" style="height: 200px;"><?php echo e($dokumen['attr']['keterangan']); ?></textarea>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/layouts/components/kades/_sk_kades.blade.php ENDPATH**/ ?>