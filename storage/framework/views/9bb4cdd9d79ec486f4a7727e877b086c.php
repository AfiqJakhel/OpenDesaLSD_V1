<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/font-awesome.min.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .map-card-wrapper {
            background: white;
            border-radius: 1.5rem;
            padding: 1rem;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);
            border: 1px solid #f3f4f6;
            margin-bottom: 2rem;
            position: relative;
        }

        .map-container-inner {
            position: relative;
            width: 100%;
            height: calc(100vh - 250px);
            min-height: 500px;
            border-radius: 1rem;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            z-index: 10;
        }

        #map_canvas {
            width: 100%;
            height: 100% !important;
            position: relative;
            z-index: 1;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 min-h-screen py-16">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <div class="mb-6">
            <h1 class="font-jakarta font-extrabold text-3xl md:text-4xl text-gray-800 mb-2">Peta Desa</h1>
            <nav class="text-gray-500 text-sm font-jakarta flex items-center gap-2">
                <a href="<?php echo e(site_url('/')); ?>" class="hover:text-[#0D2247] transition">Beranda</a>
                <i class="fas fa-chevron-right text-[9px]"></i>
                <span class="text-[#0D2247] font-semibold">Peta Lokasi</span>
            </nav>
        </div>

        
        <div class="map-card-wrapper">
            <div class="map-container-inner">
                <div id="map_canvas"></div>
            </div>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
                <small class="text-gray-500 block mb-1 font-jakarta uppercase tracking-wider font-bold text-xs">Nama <?php echo e(ucwords(setting('sebutan_desa'))); ?></small>
                <strong class="text-xl text-gray-800 font-jakarta"><?php echo e($nama_desa ?? '-'); ?></strong>
            </div>
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
                <small class="text-gray-500 block mb-1 font-jakarta uppercase tracking-wider font-bold text-xs"><?php echo e(ucwords(setting('sebutan_kecamatan'))); ?></small>
                <strong class="text-xl text-gray-800 font-jakarta"><?php echo e($kecamatan ?? '-'); ?></strong>
            </div>
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
                <small class="text-gray-500 block mb-1 font-jakarta uppercase tracking-wider font-bold text-xs"><?php echo e(ucwords(setting('sebutan_kabupaten'))); ?></small>
                <strong class="text-xl text-gray-800 font-jakarta"><?php echo e($kabupaten ?? '-'); ?></strong>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(theme_asset('js/helper.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet-providers.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if(!empty($lat) && !empty($lng)): ?>
                var posisi = [<?php echo e($lat); ?>, <?php echo e($lng); ?>];
                var zoom = <?php echo e($zoom ?: 10); ?>;
            <?php else: ?>
                var posisi = [-1.0546279422758742, 116.71875000000001];
                var zoom = 10;
            <?php endif; ?>

            var options = {
                maxZoom: <?php echo e(setting('max_zoom_peta')); ?>,
                minZoom: <?php echo e(setting('min_zoom_peta')); ?>,
            };

            var map = L.map('map_canvas', options).setView(posisi, zoom);

            //Menampilkan BaseLayers Peta
            var baseLayers = getBaseLayers(map, "<?php echo e(setting('mapbox_key')); ?>", "<?php echo e(setting('jenis_peta')); ?>");

            L.control.layers(baseLayers, null, {
                position: 'topright',
                collapsed: true
            }).addTo(map);

            <?php if(!empty($lat) && !empty($lng)): ?>
                var kantor_desa = L.marker(posisi).addTo(map);
            <?php endif; ?>

            setTimeout(function () {
                map.invalidateSize();
            }, 200);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/peta/index.blade.php ENDPATH**/ ?>