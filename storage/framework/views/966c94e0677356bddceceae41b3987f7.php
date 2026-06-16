<form id="validasi" action="<?php echo e($form_action); ?>" method="post" target="_blank">
    <div class="modal-body">
        <?php if($sensor_nik): ?>
            <div class="row">
                <div class="col-sm-12">
                    <label for="nama">Centang kotak berikut apabila NIK/No. KK ingin disensor</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="sensor_nik" class="form-check-input" id="privasi_nik">
                            <label class="form-check-label" for="privasi_nik">Sensor NIK/No. KK</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="pamong_ttd">Laporan Ditandatangani</label>
            <select class="form-control input-sm select2 required" name="pamong_ttd">
                <option value="">Pilih Staf <?php echo e(ucwords(setting('sebutan_pemerintah_desa'))); ?></option>
                <?php $__currentLoopData = $pamong; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data['pamong_id']); ?>" <?= ($pamong_ttd['pamong_id'] == $data['pamong_id']) ? 'selected' : ''; ?>><?php echo e($data['pamong_nama']); ?> (<?php echo e($data['pamong_jabatan']); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pamong_ketahui">Laporan Diketahui</label>
            <select class="form-control input-sm select2 required" name="pamong_ketahui">
                <option value="">Pilih Staf <?php echo e(ucwords(setting('sebutan_pemerintah_desa'))); ?></option>
                <?php $__currentLoopData = $pamong; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data['pamong_id']); ?>" <?= ($pamong_ketahui['pamong_id'] == $data['pamong_id']) ? 'selected' : ''; ?>><?php echo e($data['pamong_nama']); ?> (<?php echo e($data['pamong_jabatan']); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <?php echo batal(); ?>

        <button type="submit" class="btn btn-social btn-info btn-sm"><i class='fa fa-check'></i> <?php echo e(ucwords($aksi)); ?></button>
    </div>
</form>
<?php echo $__env->make('admin.layouts.components.validasi_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    $(document).ready(function() {
        $('.modal:visible').find('form').validate()

        $('#validasi').submit(function() {
            if (!$(this).valid()) {
                return false
            }
            $('#modalBox').modal('hide')
        })
    })
</script>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/layouts/components/ttd_pamong.blade.php ENDPATH**/ ?>