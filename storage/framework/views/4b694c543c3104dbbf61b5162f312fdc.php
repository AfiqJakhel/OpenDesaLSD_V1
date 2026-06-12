<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Pembangunan
        <small><?php echo e($action); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('admin_pembangunan')); ?>">Daftar Pembangunan</a></li>
    <li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo form_open($form_action, 'class="form-horizontal" enctype="multipart/form-data" id="validasi"'); ?>

    <div class="row">
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('admin_pembangunan'), 'label' => 'Daftar Pembangunan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="judul">Nama Kegiatan</label>
                        <div class="col-sm-9">
                            <input
                                id="judul"
                                name="judul"
                                class="form-control input-sm strip_tags judul required"
                                value="<?php echo e(e($main->judul)); ?>"
                                type="text"
                                maxlength="50"
                                minlength="5"
                                maxlength="100"
                                placeholder="Nama Kegiatan Pembangunan"
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="volume">Volume</label>
                        <div class="col-sm-9">
                            <input
                                maxlength="50"
                                class="form-control input-sm strip_tags required"
                                name="volume"
                                id="volume"
                                value="<?php echo e($main->volume); ?>"
                                type="text"
                                placeholder="Volume Pembangunan"
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="waktu">Waktu</label>
                        <div class="col-sm-6">
                            <input
                                maxlength="50"
                                class="form-control number input-sm required"
                                name="waktu"
                                id="waktu"
                                value="<?php echo e($main->waktu); ?>"
                                type="text"
                                placeholder="Lamanya pembangunan"
                            />
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control input-sm select2 required" name="satuan_waktu">
                                <?php $__currentLoopData = $satuan_waktu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?= ($key == $main->satuan_waktu) ? 'selected' : ''; ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="sumber_dana">Sumber Dana</label>
                        <div class="col-sm-9">
                            <select class="form-control input-sm select2" id="sumber_dana" name="sumber_dana" style="width:100%;">
                                <?php $__currentLoopData = $sumber_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?= ($value === $main->sumber_dana) ? 'selected' : ''; ?> value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Tahun Anggaran</label>
                                <div class="col-sm-12">
                                    <select class="form-control input-sm select2" id="tahun_anggaran" name="tahun_anggaran" style="width:100%;">
                                        <?php $__currentLoopData = tahun(1999); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value); ?>" <?= ($value == $main->tahun_anggaran) ? 'selected' : ''; ?>><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Anggaran</label>
                                <div class="col-sm-12">
                                    <input
                                        class="form-control input-sm required bilangan"
                                        name="anggaran"
                                        id="anggaran"
                                        value="<?php echo e($main->anggaran); ?>"
                                        type="text"
                                        placeholder="Anggaran"
                                        readonly
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Sumber Biaya Pemerintah</label>
                                <div class="col-sm-12">
                                    <input
                                        id="sumber_biaya_pemerintah"
                                        name="sumber_biaya_pemerintah"
                                        onkeyup="cek()"
                                        class="form-control input-sm required bilangan"
                                        maxlength="12"
                                        type="text"
                                        placeholder="Sumber Biaya Pemerintah"
                                        value="<?php echo e($main->sumber_biaya_pemerintah); ?>"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Sumber Biaya Provinsi</label>
                                <div class="col-sm-12">
                                    <input
                                        id="sumber_biaya_provinsi"
                                        name="sumber_biaya_provinsi"
                                        onkeyup="cek()"
                                        class="form-control input-sm required bilangan"
                                        maxlength="12"
                                        type="text"
                                        placeholder="Sumber Biaya Provinsi"
                                        value="<?php echo e($main->sumber_biaya_provinsi); ?>"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Sumber Biaya Kab / Kota</label>
                                <div class="col-sm-12">
                                    <input
                                        id="sumber_biaya_kab_kota"
                                        name="sumber_biaya_kab_kota"
                                        class="form-control input-sm required bilangan"
                                        maxlength="12"
                                        onkeyup="cek()"
                                        type="text"
                                        placeholder="Sumber Biaya Kab / Kota"
                                        value="<?php echo e($main->sumber_biaya_kab_kota); ?>"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Sumber Biaya Swadaya</label>
                                <div class="col-sm-12">
                                    <input
                                        id="sumber_biaya_swadaya"
                                        name="sumber_biaya_swadaya"
                                        class="form-control input-sm required bilangan"
                                        maxlength="12"
                                        type="text"
                                        onkeyup="cek()"
                                        placeholder="Sumber Biaya Swadaya"
                                        value="<?php echo e($main->sumber_biaya_swadaya); ?>"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="sifat_proyek">Sifat Proyek</label>
                        <div class="col-sm-9">
                            <select class="form-control input-sm select2 required" id="sifat_proyek" name="sifat_proyek">
                                <option value="">-- Pilih Sifat Proyek --</option>
                                <option value="BARU" <?= ($main->sifat_proyek == 'BARU') ? 'selected' : ''; ?>>BARU</option>
                                <option value="LANJUTAN" <?= ($main->sifat_proyek == 'LANJUTAN') ? 'selected' : ''; ?>>LANJUTAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="pelaksana_kegiatan">Pelaksana Kegiatan</label>
                        <div class="col-sm-9">
                            <input
                                maxlength="50"
                                class="form-control input-sm strip_tags required"
                                name="pelaksana_kegiatan"
                                id="pelaksana_kegiatan"
                                value="<?php echo e($main->pelaksana_kegiatan); ?>"
                                type="text"
                                placeholder="Pelaksana Kegiatan Pembangunan"
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="pelaksana_kegiatan">Lokasi Pembangunan</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="btn-group col-sm-6" data-toggle="buttons">
                                    <label class="btn btn-info btn-sm form-check-label col-sm-6 <?php echo e($main->lokasi ? null : 'active'); ?>">
                                        <input type="radio" name="jenis_lokasi" class="form-check-input" value="1" <?= ($main->lokasi ? false : true) ? 'checked' : ''; ?> autocomplete="off"> Pilih Lokasi
                                    </label>
                                    <label class="btn btn-info btn-sm form-check-label col-sm-6 <?php echo e($main->lokasi ? 'active' : null); ?>">
                                        <input type="radio" name="jenis_lokasi" class="form-check-input" value="2" <?= ($main->lokasi ? true : false) ? 'checked' : ''; ?>> Tulis Manual
                                    </label>
                                </div>
                            </div>
                            <br>
                            <div id="pilih">
                                <select class="form-control input-sm select2 required" id="id_lokasi" name="id_lokasi">
                                    <option value="">-- Pilih Lokasi Pembangunan --</option>
                                    <?php $__currentLoopData = $list_lokasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item['id']); ?>" <?= ($item['id'] == $main->id_lokasi) ? 'selected' : ''; ?>><?php echo e(strtoupper($item['dusun'])); ?> <?php echo e(empty($item['rw']) ? '' : " - RW  {$item['rw']}"); ?> <?php echo e(empty($item['rt']) ? '' : " / RT  {$item['rt']}"); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div id="manual">
                                <textarea id="lokasi" class="form-control input-sm strip_tags required" type="text" placeholder="Lokasi" name="lokasi" rows="3"><?php echo e(e($main->lokasi)); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="manfaat">Manfaat</label>
                        <div class="col-sm-9">
                            <textarea id="manfaat" name="manfaat" class="form-control input-sm strip_tags required" name="manfaat" placeholder="Manfaat" rows="3"><?php echo e(e($main->manfaat)); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="manfaat">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea id="keterangan" class="form-control input-sm strip_tags required" name="keterangan" placeholder="Keterangan" rows="3"><?php echo e(e($main->keterangan)); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Gambar Utama</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php if(is_file(LOKASI_GALERI . $main->foto)): ?>
                        <img class="img-responsive" id="previewImage" src="<?php echo e(to_base64(LOKASI_GALERI . $main->foto)); ?>" alt="Gambar Utama Pembangunan">
                    <?php else: ?>
                        <img class="img-responsive" id="previewImage" src="<?php echo e(asset('images/404-image-not-found.jpg')); ?>" alt="Gambar Utama Pembangunan" />
                    <?php endif; ?>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="file_path">
                        <input type="file" class="hidden" id="file" name="foto" accept=".jpg,.jpeg,.png,.webp">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" id="file_browser"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        var sb_pem = document.getElementById('sumber_biaya_pemerintah');
        var sb_prov = document.getElementById('sumber_biaya_provinsi');
        var sb_kab = document.getElementById('sumber_biaya_kab_kota');
        var sb_swad = document.getElementById('sumber_biaya_swadaya');
        var aggaran = document.getElementById('anggaran');

        function getSum(total, num) {
            return total + Math.round(num);
        }

        function cek() {
            const numbers = [sb_pem.value, sb_prov.value, sb_kab.value, sb_swad.value];
            var biaya = numbers.reduce(getSum, 0);
            document.getElementById('anggaran').value = biaya;
            var total_anggaran = aggaran.value;
        };

        $(document).ready(function() {
            $("form").submit(function(e) {
                const numbers = [sb_pem.value, sb_prov.value, sb_kab.value, sb_swad.value];
                var biaya = numbers.reduce(getSum, 0);
                var total_anggaran = aggaran.value;
                if (biaya > total_anggaran) {
                    alert('Total rincian sumber biaya tidak boleh melebihi anggaran.');
                    e.preventDefault(e);
                }
            });
        });

        function pilih_lokasi(pilih) {
            if (pilih == 1) {
                $('#lokasi').val(null);
                $('#lokasi').removeClass('required');
                $("#manual").hide();
                $("#pilih").show();
                $('#id_lokasi').addClass('required');
            } else {
                $('#id_lokasi').val(null);
                $('#id_lokasi').trigger('change', true);
                $('#id_lokasi').removeClass('required');
                $("#manual").show();
                $('#lokasi').addClass('required');
                $("#pilih").hide();
            }
        }

        $(document).ready(function() {
            var pilih = $('input[name="jenis_lokasi"]:checked').val();
            pilih_lokasi(pilih);
        });

        $('input[name="jenis_lokasi"]').change(function() {
            var pilih = $(this).filter(':checked').val();
            if (pilih == undefined) {
                pilih = 1;
            }
            pilih_lokasi(pilih);
        });

        document.getElementById('file').onchange = function(e) {
            var file = e.target.files[0];
            if (file) {
                var allowedExtensions = document.getElementById('file').accept.split(',');
                var fileExtension = file.name.split('.').pop().toLowerCase();
                if (allowedExtensions.includes('.' + fileExtension)) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var output = document.getElementById('previewImage');
                        output.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan',
                        text: 'Mohon pilih file gambar dengan format ' + document.getElementById('file').accept,
                        timer: 3000,
                    });
                }
            }
        };
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/pembangunan/form.blade.php ENDPATH**/ ?>