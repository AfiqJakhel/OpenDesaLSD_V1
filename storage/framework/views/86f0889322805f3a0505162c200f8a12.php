<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Kategori Informasi Publik</label>
    <div class="col-sm-6">
        <select name="kategori_info_publik" class="form-control select2 input-sm required">
            <option value="">Pilih Kategori Informasi Publik</option>
            <?php $__currentLoopData = $list_kategori_publik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>" <?= ($dokumen['kategori_info_publik'], $key) ? 'selected' : ''; ?>>
                    <?php echo e($value); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-4" for="nama">Tahun</label>
    <div class="col-sm-6">
        <input name="tahun" maxlength="4" class="form-control input-sm number required" type="text" placeholder="Contoh: 2019" value="<?php echo e($dokumen['tahun']); ?>"></input>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/layouts/components/kades/_informasi_publik.blade.php ENDPATH**/ ?>