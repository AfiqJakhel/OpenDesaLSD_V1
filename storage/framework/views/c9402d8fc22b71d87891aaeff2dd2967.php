<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>Pengaturan
        <?php echo e($kat_nama); ?> Di
        <?php echo e(ucwords(setting('sebutan_desa'))); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(site_url('dokumen_sekretariat/perdes/' . $kat)); ?>"> Daftar
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
<?php $component = App\View\Components\KembaliButton::resolve(['judul' => 'Kembali ke Daftar '.e($kat_nama).' Di '.e(ucwords(setting('sebutan_desa'))).'','url' => 'dokumen_sekretariat/perdes/'.e($kat).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <input type="hidden" name="link_redirect" id="link_redirect">
        <div class="box-body">
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama">Judul Dokumen</label>
                <div class="col-sm-6">
                    <input name="nama" class="form-control input-sm peraturan_desa required" type="text" maxlength="200" value="<?php echo e($dokumen['nama']); ?>"></input>
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
            <div id="d-dokumen" style="display: <?php echo e($dokumen['tipe'] == 2 ? 'none' : ''); ?>;">
                <?php if($dokumen['satuan']): ?>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Dokumen</label>
                        <div class="col-sm-4">
                            <input type="hidden" name="old_file" value="">
                            <i class="fa fa-file-pdf-o pop-up-pdf" aria-hidden="true" style="font-size: 60px;" data-title="Berkas <?php echo e($dokumen['nomor_surat']); ?>" data-url="<?php echo e(site_url("{$controller}/berkas/{$dokumen['id']}/1/1/1")); ?>"></i>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="upload">Unggah Dokumen</label>
                    <div class="col-sm-6">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control <?php echo e($dokumen['tipe'] == 2 || $dokumen['tipe'] ? 'opsional' : 'required'); ?>" id="file_path" name="satuan">
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
            <div id="d-url" class="form-group" style="display: <?php echo e($dokumen['tipe'] == 2 ? '' : 'none'); ?>;">
                <label class="control-label col-sm-4" for="nama">Link/URL Dokumen</label>
                <div class="col-sm-6">
                    <input id="url" name="url" class="form-control input-sm <?php echo e($dokumen['tipe'] == 2 ? 'required' : ''); ?>" type="text" value="<?php echo e($dokumen['url']); ?>"></input>
                </div>
            </div>
            <input name="kategori" type="hidden" value="<?php echo e($dokumen['kategori'] ?: $kat); ?>">

            <?php echo $__env->make($isi, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                Simpan</button>
        </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/custom-select2.js')); ?>"></script>
    <script>
        document.getElementById('link_redirect').value = document.referrer;
        $('#tipe').on('change', function() {
            if (this.value == 1) {
                $('#d-dokumen').show();
                $('#d-url').hide();
                $("#file_path").addClass("required");
                $("#url").removeClass("required");
            } else {
                $('#d-dokumen').hide();
                $('#d-url').show();
                $("#file_path").removeClass("required");
                $("#url").addClass("required");
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/dokumen/buku_kades/form.blade.php ENDPATH**/ ?>