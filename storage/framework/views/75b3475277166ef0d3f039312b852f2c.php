<?php echo $__env->make('admin.layouts.components.validasi_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<form id="validasi" action="<?php echo e($form_action); ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="kategori">Kategori Produk</label>
            <input class="form-control input-sm required nama_produk" type="text" name="kategori" placeholder="Kategori Produk" value="<?php echo e($main->kategori); ?>" />
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-social  btn-danger btn-sm pull-left"><i class="fa fa-times"></i> Batal</button>
        <button type="submit" class="btn btn-social  btn-info btn-sm"><i class="fa fa-check"></i> Simpan</button>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Lapak\Views/backend/kategori/form.blade.php ENDPATH**/ ?>