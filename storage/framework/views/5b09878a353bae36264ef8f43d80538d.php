<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
<h1>
    Gawai Layanan
    <small><?php echo e($action); ?> Data</small>
</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(ci_route('gawai_layanan')); ?>">Gawai Layanan</a></li>
<li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="box box-info">
    <div class="box-header with-border">
        <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('gawai_layanan'), 'label' => 'Gawai
        Layanan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="box-body">
        <?php echo form_open($form_action, 'class="form-horizontal" id="validasi"'); ?>

        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="ip_address">IP Address</label>
                <div class="col-sm-7">
                    <input id="ip_address" class="form-control input-sm ip_address" type="text"
                        placeholder="IP address statis untuk gawai layanan" onkeyup="wajib()" name="ip_address"
                        value="<?php echo e($gawai_layanan->ip_address ?? null); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="ip_address">Mac Address</label>
                <div class="col-sm-7">
                    <input id="mac_address" class="form-control input-sm mac_address" type="text"
                        placeholder="00:1B:44:11:3A:B7" onkeyup="wajib()" name="mac_address"
                        value="<?php echo e($gawai_layanan->mac_address ?? null); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="id_pengunjung">ID Pengunjung</label>
                <div class="col-sm-7">
                    <input id="id_pengunjung" class="form-control input-sm alfanumerik" type="text" onkeyup="wajib()"
                        placeholder="ad02c373c2a8745d108aff863712fe92" name="id_pengunjung"
                        value="<?php echo e($gawai_layanan->id_pengunjung ?? null); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="ip_address">IP Address Printer</label>
                <div class="col-sm-7">
                    <input class="form-control input-sm ip_address" type="text"
                        placeholder="IP address statis untuk printer gawai layanan" name="printer_ip"
                        value="<?php echo e($gawai_layanan->printer_ip); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="ip_address">Port Address Printer</label>
                <div class="col-sm-7">
                    <input class="form-control input-sm" type="text"
                        placeholder="Port address statis untuk printer gawai layanan" name="printer_port"
                        value="<?php echo e($gawai_layanan->printer_port); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="keterangan">Keterangan</label>
                <div class="col-sm-7">
                    <textarea name="keterangan" class="form-control input-sm" maxlength="300" placeholder="Keterangan"
                        rows="3" style="resize:none;"><?php echo e($gawai_layanan->keterangan); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="keyboard">Keyboard Virtual</label>
                <div class="btn-group col-sm-7" data-toggle="buttons">
                    <label id="sx1"
                        class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?php echo e(jecho($gawai_layanan->keyboard, '1', 'active')); ?>">
                        <input type="radio" name="keyboard" class="form-check-input" type="radio" value="1" <?php echo e(jecho($gawai_layanan->keyboard, '1', 'checked')); ?>> Aktif
                    </label>
                    <label id="sx2"
                        class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?php echo e(jecho($gawai_layanan->keyboard != '1', true, 'active')); ?>">
                        <input type="radio" name="keyboard" class="form-check-input" type="radio" value="0" <?php echo e(jecho($gawai_layanan->keyboard != '1', true, 'checked')); ?>> Tidak Aktif
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="status">Status</label>
                <div class="col-sm-4">
                    <select class="form-control input-sm select2" name="status" id="status">
                        <?php $__currentLoopData = \App\Enums\StatusEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= ($key == ($gawai_layanan->status ?? null)) ? 'selected' : ''; ?>><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i
                class="fa fa-times"></i> Batal</button>
        <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
            Simpan</button>
    </div>
    </form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
            wajib();
        });

        function reset_form() {
            var keyboard = "<?php echo e($gawai_layanan->keyboard); ?>";
            var status = "<?php echo e($gawai_layanan->status); ?>";

            if (keyboard == 1) {
                $("#sx1").addClass('active');
                $("#sx2").removeClass('active');
            } else {
                $("#sx1").removeClass('active');
                $("#sx2").addClass('active');
            }

            if (status == 1) {
                $("#sx3").addClass('active');
                $("#sx4").removeClass('active');
            } else {
                $("#sx3").removeClass('active');
                $("#sx4").addClass('active');
            }
        };

        function wajib() {
            if ($("#ip_address").val().length > 0) {
                // $("#ip_address").addClass('required');
                $("#mac_address").removeClass('required');
                $("#id_pengunjung").removeClass('required');
            } else if ($("#mac_address").val().length > 0) {
                // $("#mac_address").addClass('required');
                $("#ip_address").removeClass('required');
                $("#id_pengunjung").removeClass('required');
            } else if ($("#id_pengunjung").val().length > 0) {
                // $("#id_pengunjung").addClass('required');
                $("#ip_address").removeClass('required');
                $("#mac_address").removeClass('required');
            } else {
                $("#ip_address").addClass('required');
            }
        }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/gawai_layanan/form.blade.php ENDPATH**/ ?>