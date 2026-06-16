<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>Pengaturan
        <?php echo e($kat_nama); ?> Di
        <?php echo e(ucwords(setting('sebutan_desa'))); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(ci_route('dokumen')); ?>"> Daftar
            <?php echo e($kat_nama); ?>

        </a></li>
    <li class="active">Pengaturan
        <?php echo e($kat_nama); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <?php echo form_open_multipart($form_action, 'class="form-horizontal" id="validasi"'); ?>

        <div class="box-header with-border">
            <?php if (isset($component)) { $__componentOriginalc11c7292aaa9235aebed7379ae351e6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc11c7292aaa9235aebed7379ae351e6a = $attributes; } ?>
<?php $component = App\View\Components\KembaliButton::resolve(['judul' => 'Kembali ke Daftar '.e($kat_nama).' Di '.e(ucwords(setting('sebutan_desa'))).'','url' => 'dokumen'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('kembali-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\KembaliButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc11c7292aaa9235aebed7379ae351e6a)): ?>
<?php $attributes = $__attributesOriginalc11c7292aaa9235aebed7379ae351e6a; ?>
<?php unset($__attributesOriginalc11c7292aaa9235aebed7379ae351e6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc11c7292aaa9235aebed7379ae351e6a)): ?>
<?php $component = $__componentOriginalc11c7292aaa9235aebed7379ae351e6a; ?>
<?php unset($__componentOriginalc11c7292aaa9235aebed7379ae351e6a); ?>
<?php endif; ?>

        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama">Judul Dokumen</label>
                <div class="col-sm-6">
                    <input name="nama" class="form-control input-sm nomor_sk required" type="text" maxlength="200" value="<?php echo e($dokumen['nama']); ?>"></input>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama">Tipe Dokumen</label>
                <div class="col-sm-6">
                    <select name="tipe" id="tipe" class="form-control input-sm required">
                        <option value="1" <?= ($dokumen['tipe'] == 1) ? 'selected' : ''; ?>>File</option>
                        <option value="2" <?= ($dokumen['tipe'] == 2) ? 'selected' : ''; ?>>URL</option>
                    </select>
                </div>
            </div>
            <div id="d-unggahn" style="display: <?php echo e($dokumen['tipe'] == 2 ? 'none' : ''); ?>;">
                <?php if($dokumen['satuan']): ?>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Dokumen</label>
                        <div class="col-sm-4">
                            <i class="fa fa-file-pdf-o pop-up-pdf" aria-hidden="true" style="font-size: 60px;" data-title="Berkas <?php echo e($dokumen['nomor_surat']); ?>" data-url="<?php echo e(ci_route('dokumen.tampilkan_berkas', [$dokumen['id'], 0, 1])); ?>"></i>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="upload">Unggah Dokumen</label>
                    <div class="col-sm-6">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control <?php echo e($dokumen['tipe'] == 2 || $dokumen['tipe'] ? '' : 'required'); ?>" id="file_path" name="satuan">
                            <input id="file" type="file" class="hidden" name="satuan" accept=".jpg,.jpeg,.png,.pdf" />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info" id="file_browser"><i class="fa fa-search"></i>
                                    Browse</button>
                            </span>
                        </div>
                        <?php if($dokumen): ?>
                            <p class="small">(Kosongkan jika tidak ingin mengubah dokumen)</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Retensi Dokumen</label>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <input
                                class="form-control input-sm"
                                placeholder="Jumlah (0-31)"
                                type="number"
                                name="retensi_number"
                                id="retensi_number"
                                min="0"
                                max="31"
                                value="<?php echo e($dokumen['retensi_number'] ?? 0); ?>"
                                <?php if($readonly): ?> disabled <?php endif; ?>
                            >
                            <label class="help-block error" style="display: none"></label>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control input-sm" name="retensi_unit" id="retensi_unit" <?php if($readonly): ?> disabled <?php endif; ?>>
                                <option value="hari" <?php echo e(isset($dokumen) && $dokumen['retensi_unit'] == 'hari' ? 'selected' : ''); ?>>Hari
                                </option>
                                <option value="minggu" <?php echo e(isset($dokumen) && $dokumen['retensi_unit'] == 'minggu' ? 'selected' : ''); ?>>Minggu
                                </option>
                                <option value="bulan" <?php echo e(isset($dokumen) && $dokumen['retensi_unit'] == 'bulan' ? 'selected' : ''); ?>>Bulan
                                </option>
                                <option value="tahun" <?php echo e(isset($dokumen) && $dokumen['retensi_unit'] == 'tahun' ? 'selected' : ''); ?>>Tahun
                                </option>
                            </select>
                        </div>
                    </div>
                    <label class="control-label text-danger">Nilai harus antara 0 hingga 31. Isi 0 jika tidak
                        digunakan.</label>
                </div>
            </div>
            <div id="d-url" class="form-group" style="display: <?php echo e($dokumen['tipe'] == 2 ? '' : 'none'); ?>;">
                <label class="control-label col-sm-4" for="nama">Link/URL Dokumen</label>
                <div class="col-sm-6">
                    <input id="url" name="url" class="form-control input-sm <?php echo e($dokumen['tipe'] == 2 ? 'required' : ''); ?>" type="text" value="<?php echo e($dokumen['url']); ?>"></input>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama">Kategori Informasi Publik</label>
                <div class="col-sm-6">
                    <select name="kategori_info_publik" class="form-control select2 input-sm required">
                        <option value="">Pilih Kategori Informasi Publik</option>
                        <?php $__currentLoopData = $list_kategori_publik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= ($dokumen['kategori_info_publik'] == $key) ? 'selected' : ''; ?>><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Keterangan</label>
                <div class="col-sm-6">
                    <textarea
                        name="keterangan"
                        class="form-control input-sm"
                        maxlength="300"
                        placeholder="Keterangan"
                        rows="3"
                        style="resize:none;"
                        <?php if($readonly): ?> disabled <?php endif; ?>
                    ><?php echo e($dokumen['keterangan'] ?? ''); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama">Tahun</label>
                <div class="col-sm-6">
                    <input name="tahun" maxlength="4" class="form-control input-sm number required" type="text" placeholder="Contoh: 2019" value="<?= $dokumen['tahun'] ?>"></input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="tanggal">Tanggal Terbit</label>
                <div class="col-sm-6">
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon" style="border-radius: 5px 0 0 5px">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input
                            type="text"
                            name="published_at"
                            value="<?php echo e($dokumen['published_at'] ? tgl_indo_out($dokumen['published_at']) : date('d-m-Y')); ?>"
                            class="form-control input-sm datepicker required"
                            title="Tanggal Terbit"
                            placeholder="Masukan Tanggal Terbit"
                            style="border-radius: 0 5px 5px 0"
                            <?= ($readonly) ? 'disabled' : ''; ?>
                            required
                        >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="status">Status Terbit</label>
                <div class="btn-group col-sm-6" data-toggle="buttons">
                    <label id="sx3" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (!empty($dokumen) ? $dokumen['status'] == 1 : true) ? 'active' : ''; ?>" <?= ($readonly) ? 'disabled' : ''; ?>>
                        <input type="radio" name="status" class="form-check-input" value="1" <?= (!empty($dokumen) ? $dokumen['status'] == 1 : true) ? 'checked' : ''; ?> <?php if($readonly): ?> disabled <?php endif; ?>>
                        Ya
                    </label>
                    <label id="sx4" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (!empty($dokumen) ? $dokumen['status'] == 0 : false) ? 'active' : ''; ?>" <?= ($readonly) ? 'disabled' : ''; ?>>
                        <input type="radio" name="status" class="form-check-input" value="0" <?= (!empty($dokumen) ? $dokumen['status'] == 0 : false) ? 'checked' : ''; ?> <?php if($readonly): ?> disabled <?php endif; ?>>
                        Tidak
                    </label>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <?php echo batal(); ?>

            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                Simpan</button>
        </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#tipe').on('change', function() {
            if (this.value == 1) {
                $('#d-unggahn').show();
                $('#d-url').hide();
                $("#file_path").addClass("required");
                $("#url").removeClass("required");
            } else {
                $('#d-unggahn').hide();
                $('#d-url').show();
                $("#file_path").removeClass("required");
                $("#url").addClass("required");
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/dokumen/informasi_publik/form.blade.php ENDPATH**/ ?>