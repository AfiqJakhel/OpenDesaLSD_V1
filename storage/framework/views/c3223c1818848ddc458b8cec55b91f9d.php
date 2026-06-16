<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_peta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Lokasi Pelapak
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(site_url('lapak_admin/pelapak')); ?>"> Pelapak</a></li>
    <li class="active">Lokasi Pelapak <?php echo e($pelapak->pelapak); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <form id="validasi" action="<?php echo e($form_action); ?>" method="POST" class="form-horizontal">
            <div class="box-body">
                <div id="tampil-map"></div>
            </div>
            <div class='box-footer'>
                <input type="hidden" name="zoom" id="zoom" value="<?php echo e($lokasi['zoom']); ?>" />
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="lat">Latitude</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control input-sm lat" name="lat" id="lat" value="<?php echo e($lokasi['lat']); ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="lng">Longitude</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control input-sm lng" name="lng" id="lng" value="<?php echo e($lokasi['lng']); ?>" />
                    </div>
                </div>

                <?php if (isset($component)) { $__componentOriginalc11c7292aaa9235aebed7379ae351e6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc11c7292aaa9235aebed7379ae351e6a = $attributes; } ?>
<?php $component = App\View\Components\KembaliButton::resolve(['judul' => 'Kembali','url' => '/lapak_admin/pelapak'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <a href="#" class="btn btn-social  btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" download="OpenSID.gpx" id="exportGPX"><i class='fa fa-download'></i> Ekspor ke GPX</a>
                <button type="reset" class="btn btn-social  btn-danger btn-sm" id="reset-peta"><i class="fa fa-times"></i> Reset</button>
                <button type="submit" class="btn btn-social  btn-info btn-sm pull-right"><i class='fa fa-check'></i> Simpan</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        window.onload = function() {
            var posisi = [<?php echo e($lokasi['lat'] . ',' . $lokasi['lng']); ?>];
            var zoom = <?php echo e($lokasi['zoom']); ?>;

            //Inisialisasi tampilan peta
            var peta_lapak = L.map('tampil-map', pengaturan_peta).setView(posisi, zoom);

            //1. Menampilkan overlayLayers Peta Semua Wilayah
            var marker_desa = [];
            var marker_dusun = [];
            var marker_rw = [];
            var marker_rt = [];

            //WILAYAH DESA
            <?php if(!empty($desa['path'])): ?>
                set_marker_desa(marker_desa, <?php echo json_encode($desa, JSON_THROW_ON_ERROR); ?>, "<?php echo e(ucwords(setting('sebutan_desa')) . ' ' . $desa['nama_desa']); ?>", "<?php echo e(favico_desa()); ?>");
            <?php endif; ?>

            //WILAYAH DUSUN
            <?php if(!empty($dusun_gis)): ?>
                set_marker_multi(marker_dusun, '<?php echo addslashes(json_encode($dusun_gis, JSON_THROW_ON_ERROR)); ?>', '#FFFF00', '<?php echo e(ucwords(setting('sebutan_dusun'))); ?>', 'dusun');
            <?php endif; ?>

            //WILAYAH RW
            <?php if(!empty($rw_gis)): ?>
                set_marker(marker_rw, '<?php echo addslashes(json_encode($rw_gis, JSON_THROW_ON_ERROR)); ?>', '#8888dd', 'RW', 'rw');
            <?php endif; ?>


            //WILAYAH RT
            <?php if(!empty($rt_gis)): ?>
                set_marker(marker_rt, '<?php echo addslashes(json_encode($rt_gis, JSON_THROW_ON_ERROR)); ?>', '#008000', 'RT', 'rt');
            <?php endif; ?>

            //2. Menampilkan overlayLayers Peta Semua Wilayah
            <?php if(!empty($wil_atas['path'])): ?>
                var overlayLayers = overlayWil(marker_desa, marker_dusun, marker_rw, marker_rt, "<?php echo e(ucwords(setting('sebutan_desa'))); ?>", "<?php echo e(ucwords(setting('sebutan_dusun'))); ?>");
            <?php else: ?>
                var overlayLayers = {};
            <?php endif; ?>

            //Menampilkan BaseLayers Peta
            var baseLayers = getBaseLayers(peta_lapak, MAPBOX_KEY, JENIS_PETA);

            showCurrentPoint(posisi, peta_lapak);

            <?php if(can('u')): ?>
                //Export/Import Peta dari file GPX
                L.Control.FileLayerLoad.LABEL = '<img class="icon-map" src="<?php echo e(asset('images/gpx.png')); ?>" alt="file icon"/>';
                L.Control.FileLayerLoad.TITLE = 'Impor GPX/KML';
                controlGpxPoint = eximGpxPoint(peta_lapak);
            <?php endif; ?>

            //Menambahkan zoom scale ke peta
            L.control.scale().addTo(peta_lapak);
            L.control.layers(baseLayers, overlayLayers, {
                position: 'topleft',
                collapsed: true
            }).addTo(peta_lapak);

            // Reset peta type point
            resetPoint(peta_lapak, posisi, zoom);

        }; //EOF window.onload
    </script>
    <script src="<?php echo e(asset('js/leaflet.filelayer.js')); ?>"></script>
    <script src="<?php echo e(asset('js/togeojson.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Lapak\Views/backend/pelapak/maps.blade.php ENDPATH**/ ?>