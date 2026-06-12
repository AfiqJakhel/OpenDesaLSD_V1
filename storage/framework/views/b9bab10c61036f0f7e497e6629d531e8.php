<?php echo $__env->make('admin.layouts.components.validasi_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<form id="validasi" action="<?php echo e($form_action); ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="kategori">Nama Pelapak</label>
            <select class="form-control input-sm select2 required" id="id_pend" name="id_pend" onchange="tampil_telepon($(this).find(':selected'))">
                <option value="">-- Silakan Cari NIK - Nama Penduduk --</option>
                <?php $__currentLoopData = $list_penduduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penduduk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($penduduk->id); ?>" <?= ($main->id_pend == $penduduk->id) ? 'selected' : ''; ?> data-telepon="<?php echo e($penduduk->telepon); ?>"><?php echo e($penduduk->nik . ' - ' . $penduduk->nama); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label" for="nama">No. Telepon</label>
            <input class="form-control input-sm number required" type="text" name="telepon" id="telepon" placeholder="Nomer Telepon" value="<?php echo e($main->telepon); ?>" />
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-social  btn-danger btn-sm pull-left"><i class="fa fa-times"></i> Batal</button>
        <button type="submit" class="btn btn-social  btn-info btn-sm"><i class="fa fa-check"></i> Simpan</button>
    </div>
</form>

<script type="text/javascript">
    function tampil_telepon(elem) {
        var telepon = elem.data('telepon');
        $('#telepon').val(telepon);
    }
</script>
<?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Lapak\Views/backend/pelapak/form.blade.php ENDPATH**/ ?>