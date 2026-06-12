<table class="title" leaflet-browser-print-content width="100%" style="border: solid 1px grey; text-align: center;">
    <tr>
        <td align="center"></td>
    </tr>
    <tr>
        <?php if($wilayah == $nama_wilayah): ?>
            <td align="center"><img src="<?php echo e(gambar_desa($wil_atas['logo'])); ?>" alt="logo" class="logo_mandiri"></td>
        <?php elseif(in_array($wilayah, [ucwords(setting('sebutan_dusun')), 'RW', 'RT'])): ?>
            <td align="center"><img src="<?php echo e(gambar_desa($logo['logo'])); ?>" alt="logo" class="logo_mandiri"></td>
        <?php else: ?>
            <td align="center"><img src="<?php echo e(gambar_desa($desa['logo'])); ?>" alt="logo" class="logo_mandiri"></td>
        <?php endif; ?>
    </tr>
    <tr>
        <td>
            <?php if($wilayah == $nama_wilayah): ?>
                <h5 class="title text-center">PEMERINTAH <?php echo e(strtoupper(setting('sebutan_kabupaten'))); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper($wil_atas['nama_kabupaten'])); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper(setting('sebutan_kecamatan'))); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper($wil_atas['nama_kecamatan'])); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper(setting('sebutan_desa'))); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper($wil_atas['nama_desa'])); ?></h5>
            <?php else: ?>
                <h5 class="title text-center">PEMERINTAH <?php echo e(strtoupper(setting('sebutan_kabupaten'))); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper($desa['nama_kabupaten'])); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper(setting('sebutan_kecamatan'))); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper($desa['nama_kecamatan'])); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper(setting('sebutan_desa'))); ?></h5>
                <h5 class="title text-center"><?php echo e(strtoupper($desa['nama_desa'])); ?></h5>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
    <tr>
        <td>
            <?php if($wilayah == $nama_wilayah): ?>
                <h3 class="title text-center">PETA WILAYAH</h3>
                <h3 class="title text-center"><?php echo e(strtoupper(setting('sebutan_desa'))); ?></h3>
                <h3 class="title text-center"><?php echo e(strtoupper($wil_atas['nama_desa'])); ?></h3>
            <?php elseif($wilayah == ucwords(setting('sebutan_dusun'))): ?>
                <h3 class="title text-center">PETA WILAYAH</h3>
                <h3 class="title text-center"><?php echo e(strtoupper(setting('sebutan_dusun'))); ?></h3>
                <h3 class="title text-center"><?php echo e(strtoupper($wil_ini['dusun'])); ?></h3>
            <?php elseif($wilayah == 'RW'): ?>
                <h3 class="title text-center">PETA WILAYAH</h3>
                <h3 class="title text-center">RW <?php echo e($wil_ini['rw']); ?></h3>
                <h3 class="title text-center"><?php echo e(strtoupper(setting('sebutan_dusun'))); ?> <?php echo e(strtoupper($wil_ini['dusun'])); ?></h3>
            <?php elseif($wilayah == 'RT'): ?>
                <h3 class="title text-center">PETA WILAYAH</h3>
                <h3 class="title text-center">RT <?php echo e($wil_ini['rt']); ?> RW <?php echo e($wil_ini['rw']); ?> </h3>
                <h3 class="title text-center"><?php echo e(strtoupper(setting('sebutan_dusun'))); ?> <?php echo e(strtoupper($wil_ini['dusun'])); ?></h3>
            <?php else: ?>
                <h3 class="title text-center">PETA WILAYAH</h3>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo e(asset('images/kompas.png')); ?>" alt="OpenSID"></td>
    </tr>
</table>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/gis/cetak_peta.blade.php ENDPATH**/ ?>