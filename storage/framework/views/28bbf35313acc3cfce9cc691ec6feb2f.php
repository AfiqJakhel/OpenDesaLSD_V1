<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Kontak</h3>
        <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?= ($navigasi === 'Penduduk') ? 'active' : ''; ?>"><a href="<?php echo e(ci_route('daftar_kontak/penduduk')); ?>"><i class="fa fa-list-alt"></i> Penduduk</a></li>
            <li class="<?= ($navigasi === 'Eksternal') ? 'active' : ''; ?>"><a href="<?php echo e(ci_route('daftar_kontak')); ?>"><i class="fa fa-external-link"></i> Eksternal</a></li>
            <li class="<?= ($controller === 'grup_kontak') ? 'active' : ''; ?>"><a href="<?php echo e(ci_route('grup_kontak')); ?>"><i class="fa fa-group"></i> Grup</a></li>
        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/daftar_kontak/navigasi.blade.php ENDPATH**/ ?>