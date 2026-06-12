<?php $__env->startSection('title'); ?>
    <h1>
        Jabatan Pengurus
        <small><?php echo e($action); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('pengurus')); ?>"> Pengurus</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('pengurus.jabatan')); ?>">Daftar Jabatan Pengurus</a></li>
    <li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div id="umum-sidebar" class="col-sm-3">
            <?php echo $__env->make('admin.layouts.components.side_bukudesa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div id="umum-content" class="col-sm-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('pengurus.jabatan'), 'label' => 'Daftar Jabatan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="box-body">
                    <?php echo form_open($form_action, 'id="validasi"'); ?>

                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label">Nama Jabatan</label>
                            <input type="text" class="form-control input-sm nama_terbatas required" id="nama" name="nama" placeholder="Nama Jabatan" value="<?php echo e($jabatan->nama); ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tupoksi Jabatan</label>
                            <textarea name="tupoksi" class="form-control input-sm editor required" rows="5" placeholder="Tupoksi Jabatan"><?php echo e($jabatan->tupoksi); ?></textarea>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tinymce-72/tinymce.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '.editor',
                promotion: false,
                height: 700,
                theme: 'silver',
                plugins: [
                    'advlist', 'autolink', 'lists', 'charmap', 'hr', 'pagebreak',
                    'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'insertdatetime',
                    'nonbreaking',
                    'table', 'contextmenu', 'directionality', 'emoticons', 'paste', 'textcolor',
                ],
                toolbar1: "removeformat | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | blocks fontfamily fontsizeinput",
                image_advtab: true,
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'
                ],
                skin: 'tinymce-5',
                relative_urls: false,
                remove_script_host: false
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/jabatan/form.blade.php ENDPATH**/ ?>