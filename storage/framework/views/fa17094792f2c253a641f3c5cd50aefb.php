<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Uraian Singkat</label>
    <div class="col-sm-6">
        <input name="attr[uraian]" class="form-control input-sm" type="text" value="<?php echo e($dokumen['attr']['uraian']); ?>"></input>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Jenis Peraturan</label>
    <div class="col-sm-6">
        <select class="form-control input-sm select2-tags required" name="attr[jenis_peraturan]" style="width: 100%;">
            <option value=''>-- Pilih Jenis Peraturan --</option>
            <?php $__currentLoopData = $jenis_peraturan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item); ?>" <?= ($item == $dokumen['attr']['jenis_peraturan']) ? 'selected' : ''; ?>>
                    <?php echo e($item); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Nomor Ditetapkan</label>
    <div class="col-sm-6">
        <input name="attr[no_ditetapkan]" class="form-control input-sm nomor_sk" type="text" value="<?php echo e($dokumen['attr']['no_ditetapkan']); ?>"></input>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Tgl Ditetapkan</label>
    <div class="col-sm-6">
        <div class="input-group input-group-sm date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input id="tgl_1" name="attr[tgl_ditetapkan]" class="form-control input-sm required" type="text" value="<?php echo e($dokumen['attr']['tgl_ditetapkan']); ?>"></input>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Tgl Kesepakatan</label>
    <div class="col-sm-6">
        <div class="input-group input-group-sm date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input id="tgl_2" name="attr[tgl_kesepakatan]" class="form-control input-sm" type="text" value="<?php echo e($dokumen['attr']['tgl_kesepakatan']); ?>"></input>
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
            <input id="tgl_3" name="attr[tgl_lapor]" class="form-control input-sm" type="text" value="<?php echo e($dokumen['attr']['tgl_lapor']); ?>"></input>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">No. Diundangkan Dlm Lembaran
        <?php echo e(ucwords(setting('sebutan_desa'))); ?>

    </label>
    <div class="col-sm-6">
        <input name="attr[no_lembaran_desa]" class="form-control input-sm nomor_sk" type="text" value="<?php echo e($dokumen['attr']['no_lembaran_desa']); ?>"></input>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Tgl Diundangkan Dlm Lembaran
        <?php echo e(ucwords(setting('sebutan_desa'))); ?>

    </label>
    <div class="col-sm-6">
        <div class="input-group input-group-sm date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input id="tgl_4" name="attr[tgl_lembaran_desa]" class="form-control input-sm" type="text" value="<?php echo e($dokumen['attr']['tgl_lembaran_desa']); ?>"></input>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">No. Diundangkan Dlm Berita
        <?php echo e(ucwords(setting('sebutan_desa'))); ?>

    </label>
    <div class="col-sm-6">
        <input name="attr[no_berita_desa]" class="form-control input-sm nomor_sk" type="text" value="<?php echo e($dokumen['attr']['no_berita_desa']); ?>"></input>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Tgl Diundangkan Dlm Berita
        <?php echo e(ucwords(setting('sebutan_desa'))); ?>

    </label>
    <div class="col-sm-6">
        <div class="input-group input-group-sm date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input id="tgl_5" name="attr[tgl_berita_desa]" class="form-control input-sm" type="text" value="<?php echo e($dokumen['attr']['tgl_berita_desa']); ?>"></input>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Keterangan</label>
    <div class="col-sm-6">
        <input name="attr[keterangan]" class="form-control input-sm" type="text" value="<?php echo e($dokumen['attr']['keterangan']); ?>"></input>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/layouts/components/kades/_perdes.blade.php ENDPATH**/ ?>