<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        <h1>Teks Berjalan
            <small><?php echo e($teks ? 'Ubah' : 'tambah'); ?> Data</small>
        </h1>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('teks_berjalan')); ?>">Teks Berjalan</a></li>
    <?php echo e($teks ? 'Ubah' : 'tambah'); ?> Data
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo form_open($form_action, 'class="form-horizontal" id="validasi"'); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('teks_berjalan'), 'label' => 'Teks Berjalan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="isi_teks_berjalan">Isi teks berjalan</label>
                    <textarea id="teks" class="form-control input-sm required" placeholder="Isi teks berjalan" name="teks" rows="5" style="resize:none;"><?php echo e($teks['teks']); ?></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="control-label">Tipe</label>
                    <select class="form-control select2" id="tipe" name="tipe">
                        <option value="1" <?= (in_array($teks['tipe'], [null, '1'])) ? 'selected' : ''; ?>>Internal</option>
                        <option value="2" <?= (in_array($teks['tipe'], ['2'])) ? 'selected' : ''; ?>>Eksternal</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12" id="internal" style="display: <?php echo e(in_array($teks['tipe'], ['2']) ? 'none' : ''); ?>">
                <div class="form-group">
                    <label class="control-label">Tautan ke artikel</label>
                    <select class="form-control select2 " id="tautan_internal" name="tautan_internal">
                        <option value="">-- Cari Judul Artikel --</option>
                        <?php $__currentLoopData = $list_artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($artikel['id']); ?>" <?= ($artikel['id'] == $teks['tautan']) ? 'selected' : ''; ?>>
                                <?php echo e(tgl_indo($artikel['tgl_upload']) . ' | ' . $artikel['judul']); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12" id="eksternal" style="display: <?php echo e(in_array($teks['tipe'], [null, '1']) ? 'none' : ''); ?>">
                <div class="form-group">
                    <label class="control-label">Tautan Luar</label>
                    <input class="form-control input-sm required url short_url" placeholder="Contoh: https://opendesa.id" id="tautan_eksternal" name="tautan_eksternal" value="<?= $teks['tautan'] ?>"></input>
                </div>
            </div>
            <div class="col-md-12" id="box_judul_tautan" style="display: <?php echo e($teks['tautan'] ? '' : 'none'); ?>">
                <div class="form-group">
                    <label class="control-label">Judul tautan</label>
                    <input
                        <?php echo e($teks['tautan'] ? '' : 'disabled'); ?>

                        class="form-control input-sm required"
                        placeholder="Judul tautan ke artikel atau url"
                        name="judul_tautan"
                        id="input_judul_tautan"
                        value="<?php echo e($teks['judul_tautan']); ?>"
                        maxlength="150"
                    />
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Status</label>
                    <select class="form-control select2" id="status" name="status">
                        <?php $__currentLoopData = \App\Enums\StatusEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= ($key == $teks['status']) ? 'selected' : ''; ?>>
                                <?php echo e($data); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class='box-footer'>
            <button type='reset' class='btn btn-social  btn-danger btn-sm'><i class='fa fa-times'></i>
                Batal</button>
            <button type='submit' class='btn btn-social  btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
        </div>
    </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            tipe(<?= $teks['tipe'] ?: 1 ?>);

            $('#tipe').on('change', function() {
                tipe(this.value);
            });

            $('#tautan_internal').on('change', function() {
                tautan(this.value);
            });

            function tipe(param) {

                if (param == 1) {
                    $('#internal').show();
                    $('#eksternal').hide();
                    $("#tautan_internal").addClass("required");
                    $("#tautan_eksternal").removeClass("required url short_url");
                } else {
                    $('#internal').hide();
                    $('#eksternal').show();
                    $("#tautan_internal").removeClass("required");
                    $("#tautan_eksternal").addClass("required url short_url");
                    tautan(true);
                }
            }

            function tautan(params) {
                if (params == "") {
                    $('#box_judul_tautan').hide();
                    $('#input_judul_tautan').prop("disabled", true);
                } else {
                    $('#box_judul_tautan').show();
                    $('#input_judul_tautan').prop("disabled", false);
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/web/teks_berjalan/form.blade.php ENDPATH**/ ?>