<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_numeral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        <?php echo e($action); ?> Inventaris Tanah
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active"><?php echo e($action); ?> Inventaris Tanah</li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-sm-3">
            <?php echo $__env->make('admin.inventaris.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-sm-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => site_url('inventaris_tanah'), 'label' => 'Daftar Inventaris Tanah'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php echo form_open($form_action, 'class="form-horizontal" id="validasi"'); ?>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="nama_barang">Nama Barang / Jenis Barang</label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm select2" id="nama_barang" name="nama_barang" onchange="formAction('main')">
                                        <?php $__currentLoopData = $aset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option data-nama="<?php echo e($data['nama']); ?>" value="<?php echo e($data['nama'] . '_' . $data['golongan'] . '.' . $data['bidang'] . '.' . $data['kelompok'] . '.' . $data['sub_kelompok'] . '.' . $data['sub_sub_kelompok'] . '.' . $hasil); ?>" <?= ($main->nama_barang == $data['nama']) ? 'selected' : ''; ?>>Kode Reg
                                                : <?php echo e($data['golongan'] . '.' . $data['bidang'] . '.' . $data['kelompok'] . '.' . $data['sub_kelompok'] . '.' . $data['sub_sub_kelompok'] . ' - ' . $data['nama']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="kode_barang">Kode Barang</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="nama_barang_save" id="nama_barang_save" value="<?php echo e($main->nama_barang); ?>">
                                    <input maxlength="50" value="<?php echo e($main->kode_barang); ?>" class="form-control input-sm required" name="kode_barang" id="kode_barang" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="nomor_register">Nomor Register</label>
                                <div class="col-sm-5">
                                    <input maxlength="50" value="<?php echo e($main->register); ?>" class="form-control input-sm required" name="register" id="register" type="text" />
                                </div>
                                <div class="col-sm-3">
                                    <?php if($action == 'Ubah'): ?>
                                        <a style="cursor: pointer;" id="view_modal" name="view_modal">Lihat Kode yang terdaftar</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="luas">Luas Tanah</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input value="<?php echo e($main->luas); ?>" class="form-control input-sm number required" id="luas" name="luas" type="text" />
                                        <span class="input-group-addon input-sm" id="koefisien_dasar_bangunan-addon">M<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="tahun_pengadaan">Tahun Pengadaan</label>
                                <div class="col-sm-4">
                                    <select name="tahun_pengadaan" id="tahun_pengadaan" class="form-control input-sm required">
                                        <?php for($i = date('Y'); $i >= 1945; $i--): ?>
                                            <option value="<?php echo e($i); ?>" <?= (date('Y', strtotime($main->tanggal_dokument ?? 'now')) == $i) ? 'selected' : ''; ?>><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="letak">Letak / Alamat </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control input-sm required" name="letak" id="letak"><?php echo e($main->letak); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="hak">Hak Tanah </label>
                                <div class="col-sm-4">
                                    <select name="hak" id="hak" class="form-control input-sm required">
                                        <?php $__currentLoopData = ['Hak Pakai', 'Hak Pengelolaan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?= ($item == $main->hak) ? 'selected' : ''; ?> value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label required" for="penggunaan_barang">Penggunaan Barang </label>
                                <div class="col-sm-4">
                                    <select name="penggunaan_barang" id="penggunaan_barang" class="form-control input-sm required" placeholder="Hak Tanah">
                                        <?php $__currentLoopData = unserialize(PENGGUNAAN_BARANG); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php echo e(selected(substr($main->kode_barang, -7, 2), $key)); ?>><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="tanggal_sertifikat">Tanggal Sertifikat</label>
                                <div class="col-sm-4">
                                    <input maxlength="50" value="<?php echo e(date('d-m-Y', strtotime($main->tanggal_sertifikat ?? 'now'))); ?>" class="form-control input-sm datepicker required" name="tanggal_sertifikat" id="tanggal_sertifikat" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="no_sertifikat">Nomor Sertifikat</label>
                                <div class="col-sm-8">
                                    <input maxlength="50" class="form-control input-sm required" name="no_sertifikat" id="no_sertifikat" type="text" value="<?php echo e($main->no_sertifikat); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="penggunaan">Penggunaan </label>
                                <div class="col-sm-4">
                                    <select name="penggunaan" id="penggunaan" class="form-control input-sm required">
                                        <option value="">-- Pilih Kegunaan --</option>
                                        <?php $__currentLoopData = ['Industri', 'Jalan', 'Komersial', 'Permukiman', 'Tanah Publik', 'Tanah Kosong', 'Perkebunan', 'Pertanian']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?= ($item == $main->penggunaan) ? 'selected' : ''; ?> value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="asal_usul">Asal Usul </label>
                                <div class="col-sm-4">
                                    <select name="asal" id="asal" class="form-control input-sm required">
                                        <option value="">-- Pilih Asal Usul --</option>
                                        <?php $__currentLoopData = ['Bantuan Kabupaten', 'Bantuan Pemerintah', 'Bantuan Provinsi', 'Pembelian Sendiri', 'Sumbangan', 'Hak Adat', 'Hibah']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?= ($item == $main->asal) ? 'selected' : ''; ?> value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="harga">Harga</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm" id="koefisien_dasar_bangunan-addon">Rp</span>
                                        <input onkeyup="price()" value="<?php echo e($main->harga); ?>" class="form-control input-sm number required" id="harga" name="harga" type="text" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm required" id="output" name="output" placeholder="" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="keterangan">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea rows="5" class="form-control input-sm required" name="keterangan" id="keterangan"><?php echo e($main->keterangan); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!$view_mark): ?>
                    <div class="box-footer">
                        <div class="col-xs-12">
                            <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    </div>
                <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="opensidInventaris" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="opensidInventaris">Kode Yang Terdaftar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-group">
                                <?php $__currentLoopData = $kd_reg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(strlen($reg->register) == 21): ?>
                                        <li class="list-group-item" data-position-id="123">
                                            <div class="companyPosItem">
                                                <span class="companyPosLabel"><?php echo e(substr($reg->register, -6)); ?></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var id = "<?php echo e($main->id); ?>";
            var view = "<?php echo e($view_mark); ?>";
            if (1 == view) {
                $('#validasi').find('input, select, textarea').attr('disabled', 'disabled');
            }

            var kode_desa = "<?php echo e(kode_wilayah($get_kode['kode_desa'])); ?>";
            $('#kode_barang').val(kode_desa + "." + $('#penggunaan_barang').val() + "." + $('#tahun_pengadaan').val());
            $("#tahun_pengadaan").change(function() {
                $('#kode_barang').val(kode_desa + "." + $('#penggunaan_barang').val() + "." + $('#tahun_pengadaan').val());
            });

            $("#penggunaan_barang").change(function() {
                $('#kode_barang').val(kode_desa + "." + $('#penggunaan_barang').val() + "." + $('#tahun_pengadaan').val());
            });
            price();

            $("#nama_barang").change(function() {
                if ($('#register').val().length != 21) {
                    $('#register').val($('#nama_barang').val().split('_').pop());
                } else {
                    $('#register').val($('#nama_barang').val().split('_').pop() + $('#register').val().slice(-6));
                }
                $('#nama_barang_save').val($('#nama_barang').find(':selected').data('nama'));
            });

            if (!id) {
                $("#tahun_pengadaan").change();
                $("#penggunaan_barang").change();
                $("#nama_barang").change();
            }
        });

        function price() {
            $('#output').val(numeral($('#harga').val()).format('Rp0,0'));
        }

        $("#view_modal").click(function(event) {
            $('#modal').modal("show");
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/inventaris/tanah/form.blade.php ENDPATH**/ ?>