<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_numeral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        <?php echo e($action); ?> Inventaris Peralatan Dan Mesin
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active"><?php echo e($action); ?> Inventaris Peralatan Dan Mesin</li>
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
                    <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => site_url('inventaris_peralatan'), 'label' => 'Daftar Inventaris Peralatan Dan Mesin'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php echo form_open($form_action, 'class="form-horizontal" id="validasi"'); ?>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="nama_barang">Nama Barang / Jenis Barang</label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm select2" id="nama_barang" name="nama_barang" style="width:100%;" onchange="formAction('main')">
                                        <?php $__currentLoopData = $aset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data['nama'] . '_' . $data['golongan'] . '.' . $data['bidang'] . '.' . $data['kelompok'] . '.' . $data['sub_kelompok'] . '.' . $data['sub_sub_kelompok'] . '.' . $hasil); ?>">Kode Reg :
                                                <?php echo e($data['golongan'] . '.' . $data['bidang'] . '.' . $data['kelompok'] . '.' . $data['sub_kelompok'] . '.' . $data['sub_sub_kelompok'] . ' - ' . $data['nama']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="kode_barang">Kode Barang</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="nama_barang_save" id="nama_barang_save">
                                    <input type="hidden" name="kode_desa" id="kode_desa" value="<?php echo e(kode_wilayah($get_kode['kode_desa'])); ?>">
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
                                <label class="col-sm-3 control-label" for="merk">Merk/Type</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php echo e($main->merk); ?>" class="form-control input-sm" id="merk" name="merk" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="ukuran">Ukuran/CC </label>
                                <div class="col-sm-8">
                                    <input maxlength="50" value="<?php echo e($main->ukuran); ?>" class="form-control input-sm" name="ukuran" id="ukuran" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="bahan">Bahan</label>
                                <div class="col-sm-8">
                                    <input maxlength="50" value="<?php echo e($main->bahan); ?>" class="form-control input-sm" name="bahan" id="bahan" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="tahun_pengadaan">Tahun Pembelian</label>
                                <div class="col-sm-4">
                                    <select name="tahun_pengadaan" id="tahun_pengadaan" class="form-control input-sm select2 required">
                                        <?php for($i = date('Y'); $i >= 1945; $i--): ?>
                                            <option <?= ($main->tahun_pengadaan == $i) ? 'selected' : ''; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="no_pabrik">Nomor Pabrik</label>
                                <div class="col-sm-8">
                                    <input maxlength="50" value="<?php echo e($main->no_pabrik); ?>" class="form-control input-sm" name="no_pabrik" id="no_pabrik" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="no_rangka">Nomor Rangka </label>
                                <div class="col-sm-8">
                                    <input maxlength="50" value="<?php echo e($main->no_rangka); ?>" class="form-control input-sm" name="no_rangka" id="no_rangka" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="no_mesin">Nomor Mesin</label>
                                <div class="col-sm-8">
                                    <input maxlength="50" value="<?php echo e($main->no_mesin); ?>" class="form-control input-sm" name="no_mesin" id="no_mesin" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="no_polisi">Nomor Polisi </label>
                                <div class="col-sm-8">
                                    <input maxlength="50" value="<?php echo e($main->no_polisi); ?>" class="form-control input-sm" name="no_polisi" id="no_polisi" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="bpkb">BPKB</label>
                                <div class="col-sm-8">
                                    <input maxlength="50" value="<?php echo e($main->no_bpkb); ?>" class="form-control input-sm" name="no_bpkb" id="no_bpkb" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label required" for="hak_tanah">Penggunaan Barang </label>
                                <div class="col-sm-4">
                                    <select name="penggunaan_barang" id="penggunaan_barang" class="form-control input-sm required" placeholder="Hak Tanah">
                                        <?php $__currentLoopData = unserialize(PENGGUNAAN_BARANG); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php echo e(selected(substr($main->kode_barang, -7, 2), $key)); ?>><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="asal_usul">Asal Usul </label>
                                <div class="col-sm-4">
                                    <select name="asal" id="asal" class="form-control input-sm required">
                                        <option value="">-- Pilih Asal Usul --</option>
                                        <?php $__currentLoopData = ['Bantuan Kabupaten', 'Bantuan Pemerintah', 'Bantuan Provinsi', 'Pembelian Sendiri', 'Sumbangan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

            $('#kode_barang').val($('#kode_desa').val() + "." + $('#penggunaan_barang').val() + "." + $('#tahun_pengadaan').val());

            $("#tahun_pengadaan").change(function() {
                $('#kode_barang').val($('#kode_desa').val() + "." + $('#penggunaan_barang').val() + "." + $('#tahun_pengadaan').val());
            });

            $("#penggunaan_barang").change(function() {
                $('#kode_barang').val($('#kode_desa').val() + "." + $('#penggunaan_barang').val() + "." + $('#tahun_pengadaan').val());
            });

            $('#output').val(numeral($('#harga').val()).format('Rp0,0'));

            $("#nama_barang").change(function() {
                if ($('#register').val().length != 21) {
                    $('#register').val($('#nama_barang').val().split('_').pop());
                    $('#nama_barang_save').val($('#nama_barang').val().slice(0, -16));
                } else {
                    $('#register').val($('#nama_barang').val().split('_').pop() + $('#register').val().slice(-6));
                    $('#nama_barang_save').val($('#nama_barang').val().slice(0, -16));
                }
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/inventaris/peralatan/form.blade.php ENDPATH**/ ?>