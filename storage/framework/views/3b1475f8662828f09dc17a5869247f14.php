<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_colorpicker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        select {
            font-family: fontAwesome
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Shortcut
        <small><?php echo e($action); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('shortcut')); ?>">Shortcut</a></li>
    <li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('shortcut'), 'label' => 'Shortcut'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
                <?php echo form_open($form_action, 'id="validasi"'); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input name="judul" class="form-control input-sm required judul" maxlength="50" type="text" value="<?php echo e($shortcut->judul); ?>">
                        <code>Isi dengan [Desa] untuk menyesuaikan sebutan desa berdasarkan pengaturan
                            aplikasi.</code>
                    </div>
                    <div class="form-group">
                        <label>Query</label>
                        <select class="form-control select2 required" id="raw_query" name="raw_query" data-placeholder="Pilih Query">
                            <option value=""></option>
                            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?= ($key === $shortcut->raw_query) ? 'selected' : ''; ?> data-link="<?php echo e($value['link']); ?>">Jumlah <?php echo e($key); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Icon</label>
                                <select class="form-control select2-ikon required" id="icon" name="icon" data-placeholder="Pilih Icon">
                                    <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($icon); ?>" <?= ($icon === $shortcut->icon) ? 'selected' : ''; ?>>
                                            <?php echo e($icon); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Warna</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control input-sm required" name="warna" placeholder="Pilih Warna" value="<?php echo e($shortcut->warna); ?>">
                                    <div class="input-group-addon input-sm"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tampil</label>
                                <select class="form-control select2" name="status">
                                    <?php $__currentLoopData = \App\Enums\StatusEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?= ($key == $shortcut->status) ? 'selected' : ''; ?>>
                                            <?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                        Simpan</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h4 class="box-title">Preview</h4>
                </div>
            </div>
            <div id="isi-warna" class="small-box <?php echo e($shortcut->status == 1 ? '' : 'tp02'); ?>" style="background-color: <?php echo e($shortcut->warna ?? '#00c0ef'); ?>; border-radius: 5px;">
                <div class="inner">
                    <h3 id="isi-count" class="text-white"><?php echo e($shortcut->count ?? '0'); ?></h3>
                    <p id="isi-judul" class="text-white"><?php echo e($shortcut->judul ?? 'Judul'); ?></p>
                </div>
                <div class="icon">
                    <i id="isi-icon" class="faa <?php echo e($shortcut->icon ?? 'fa-user'); ?>"></i>
                </div>
                <a id="isi-link" href="<?php echo e(site_url($shortcut->link ?? 'shortcut')); ?>" class="small-box-footer text-white" style="border-radius:  0 0 5px 5px">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?= asset('js/custom-select2.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('.judul').on('keyup', function() {
                var judul = $(this).val();
                $('#isi-judul').text(judul);
            });

            $('#raw_query').on('change', function() {
                link = SITE_URL + $(this).find('option:selected').data('link');

                $('#isi-link').attr('href', link)
            });

            $('#icon').on('change', function() {
                var icon = $(this).val();
                $('#isi-icon').removeClass().addClass('faa ' + icon);
            });

            $('input[name="warna"]').on('change', function() {
                var warna = $(this).val();
                $('#isi-warna').css('background-color', warna);
            });

            $('select[name="status"]').on('change', function() {
                var status = $(this).val();
                if (status == 1) {
                    $('#isi-warna').removeClass('tp02');
                } else {
                    $('#isi-warna').addClass('tp02');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/shortcut/form.blade.php ENDPATH**/ ?>