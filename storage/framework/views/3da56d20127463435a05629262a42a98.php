<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Data Anggota <?php echo e($tipe); ?>

    </h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(site_url(str_replace('_anggota', '', $controller))); ?>"> Daftar <?php echo e($tipe); ?></a></li>
    <li class="active">Data Anggota <?php echo e($tipe); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo form_open_multipart($form_action, 'class="form-horizontal" id="validasi"'); ?>

    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('admin.layouts.components.ambil_foto', [
                'id_sex' => $pend['id_sex'],
                'foto' => $pend['foto'] ?? $pend['foto_anggota'],
                'lokasiFoto' => $pend['foto'] && $tipe === 'Kelompok' ? LOKASI_FOTO_KELOMPOK : ($pend['foto'] ? LOKASI_FOTO_LEMBAGA : LOKASI_USER_PICT),
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => site_url($controller . '/detail/' . $kelompok), 'label' => 'Anggota ' . $tipe], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="id_penduduk">Nama Anggota</label>
                        <div class="col-sm-8">
                            <select class="form-control input-sm required" id="kelompok_penduduk" name="id_penduduk" data-kelompok="<?php echo e($kelompok); ?>" data-tipe="<?php echo e(strtolower($tipe)); ?>" onchange="loadDataPenduduk(this)">
                                <option value="">-- Silakan Masukan NIK / Nama --</option>
                                <?php if($pend): ?>
                                    <option value="<?php echo e($pend['id_penduduk']); ?>" selected>NIK :
                                        <?php echo e($pend['nik'] . ' - ' . $pend['nama'] . ' - ' . $pend['alamat']); ?>

                                    </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="data_penduduk_desa"></div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="no_anggota">Nomor Anggota</label>
                        <div class="col-sm-8">
                            <input id="no_anggota" class="form-control input-sm number required" type="text" placeholder="Nomor Anggota" name="no_anggota" value="<?php echo e($pend['no_anggota']); ?>">
                            <p><code>*Pastikan nomor anggota belum pernah dipakai.</code></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php if(!empty($pend)): ?>
                            <input type="hidden" name="jabatan_lama" value="<?php echo e($pend['jabatan']); ?>">
                        <?php endif; ?>
                        <label class="col-sm-4 control-label" for="jabatan">Jabatan</label>
                        <div class="col-sm-8">
                            <select class="form-control input-sm select2-tags required" id="jabatan" name="jabatan">
                                <option option value="">-- Silakan Pilih Jabatan --</option>
                                <?php $__currentLoopData = $list_jabatan1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?= ($key == $pend['jabatan']) ? 'selected' : ''; ?>>
                                        <?php echo e($value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $list_jabatan2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value['jabatan']); ?>" <?= ($value['jabatan'] == $pend['jabatan']) ? 'selected' : ''; ?>>
                                        <?php echo e($value['jabatan']); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="no_sk_jabatan">Nomor SK Jabatan</label>
                        <div class="col-sm-8">
                            <input id="no_sk_jabatan" class="form-control input-sm nomor_sk" type="text" placeholder="Nomor SK Jabatan" name="no_sk_jabatan" value="<?php echo e($pend['no_sk_jabatan']); ?>">
                        </div>
                    </div>
                    <?php if($tipe == 'Lembaga'): ?>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nomor SK Pengangkatan</label>
                            <div class="col-sm-5">
                                <input name="nmr_sk_pengangkatan" class="form-control input-sm" type="text" maxlength="30" placeholder="Nomor SK Pengangkatan" value="<?php echo e($pend['nmr_sk_pengangkatan']); ?>"></input>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class="col-sm-4 control-label">Tanggal SK Pengangkatan</label>
                            <div class="col-sm-5">
                                <div class="input-group input-group-sm date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control input-sm pull-right tgl_1" name="tgl_sk_pengangkatan" type="text" value="<?php echo e(tgl_indo_out($pend['tgl_sk_pengangkatan'])); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nomor SK Pemberhentian</label>
                            <div class="col-sm-5">
                                <input name="nmr_sk_pemberhentian" class="form-control input-sm" type="text" placeholder="Nomor SK Pemberhentian" value="<?php echo e($pend['nmr_sk_pemberhentian']); ?>"></input>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class="col-sm-4 control-label">Tanggal SK Pemberhentian</label>
                            <div class="col-sm-5">
                                <div class="input-group input-group-sm date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control input-sm pull-right tgl_1" name="tgl_sk_pemberhentian" type="text" value="<?php echo e(tgl_indo_out($pend['tgl_sk_pemberhentian'])); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Masa Jabatan (Usia/Periode)</label>
                            <div class="col-sm-5">
                                <input name="periode" class="form-control input-sm" type="text" placeholder="Contoh: 6 Tahun Periode Pertama (2015 s/d 2021)" value="<?php echo e($pend['periode']); ?>"></input>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="keterangan">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea name="keterangan" class="form-control input-sm" maxlength="300" placeholder="Keterangan" rows="5"><?php echo e($pend['keterangan']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                        Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.components.capture', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/custom-select2.js')); ?>"></script>
    <script>
        var penduduk = "<?php echo e($pend['id_penduduk']); ?>";
        var id_anggota = "<?php echo e($pend['id']); ?>";
        var kategori = "<?php echo e($tipe); ?>";

        if (penduduk) {
            document.addEventListener("DOMContentLoaded", function() {
                var selectElement = document.getElementById("kelompok_penduduk");
                loadDataPenduduk(selectElement);
                $('#kelompok_penduduk').prop('disabled', true);
            });
        }

        function loadDataPenduduk(elm) {
            let _val = $(elm).val()
            let _pendudukDesaElm = $(elm).closest('.penduduk_desa')
            _pendudukDesaElm.find('.data_penduduk_desa').empty()
            if (!$.isEmptyObject(_val)) {
                $.get('<?php echo e(ci_route('kelompok_anggota.anggota')); ?>', {
                    id_penduduk: _val,
                    id_anggota: id_anggota,
                    kategori: kategori
                }, function(data) {
                    $('.data_penduduk_desa').html(data.html)
                    $('#foto').attr('src', data.foto);
                }, 'json')
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/kelompok/anggota/form.blade.php ENDPATH**/ ?>