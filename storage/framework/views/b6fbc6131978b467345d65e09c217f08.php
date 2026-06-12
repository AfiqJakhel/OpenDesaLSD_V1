<?php echo $__env->make('theme::commons.asset_peta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
.font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
.detail-table th { padding: 12px 16px; background: #f8fafc; font-weight: 700; color: #475569; width: 140px; border-bottom: 1px solid #f1f5f9; text-align: left; }
.detail-table td { padding: 12px 16px; color: #1e293b; border-bottom: 1px solid #f1f5f9; font-weight: 500; }
.detail-table tr:last-child th, .detail-table tr:last-child td { border-bottom: none; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 220px;">
    <div class="absolute inset-0 opacity-10" style="background:url('https://images.unsplash.com/photo-1541888087455-163155ab2b4a?w=1600&q=80') center/cover;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-12 relative z-10 font-jakarta">
        <nav class="text-white/50 text-xs mb-4 flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <a href="<?php echo e(site_url('pembangunan')); ?>" class="hover:text-white transition">Pembangunan</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <span class="text-white font-semibold">Detail Realisasi</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[.2em] text-xs uppercase">Realisasi Fisik</span>
        <h1 class="font-extrabold text-3xl md:text-4xl mt-2 mb-2 judul-pembangunan">Memuat...</h1>
        <p class="text-white/60 text-sm max-w-xl"><i class="fas fa-map-marker-alt text-amber-500 mr-2"></i> <span class="lokasi-pembangunan">Memuat lokasi...</span></p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 36L0 18Q720 0 1440 18L1440 36Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-gray-50 min-h-screen py-10 font-jakarta">
    <div class="container mx-auto px-4 max-w-7xl">
        <div id="loading-container" class="py-12 flex justify-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#0D2247]"></div>
        </div>
        
        <div id="detail-pembangunan-container" style="display:none;"></div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    var slug = '<?php echo e($slug); ?>';
    
    // Fallback Image Placeholder yang Elegan
    function getFallbackImage(title) {
        return `
            <div class="w-full h-full min-h-[250px] bg-gradient-to-br from-gray-50 to-gray-200 flex flex-col items-center justify-center text-gray-400 border border-gray-200">
                <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-3">
                    <i class="fas fa-hard-hat text-2xl text-gray-300"></i>
                </div>
                <span class="text-sm font-semibold">Foto Dokumentasi Belum Tersedia</span>
                <span class="text-xs text-gray-400 mt-1">${title}</span>
            </div>
        `;
    }

    function formatRupiahJs(angka, prefix) {
        if(!angka) return '-';
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah   = split[0].substr(0, sisa),
            ribuan   = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function loadPembangunan() {
        const apiPembangunan = '<?php echo e(route('api.pembangunan')); ?>';
        const params = { 'filter[slug]': slug };

        $.get(apiPembangunan, params, function(response) {
            $('#loading-container').hide();
            var container = $('#detail-pembangunan-container');
            container.empty();

            if (response.data.length !== 1) {
                $('.judul-pembangunan').text('Data Tidak Ditemukan');
                container.html('<div class="text-center py-20"><i class="fas fa-exclamation-triangle text-5xl text-gray-300 mb-4"></i><h3 class="text-xl font-bold text-gray-700">Data Tidak Ditemukan</h3><p class="text-gray-500">Pembangunan dengan slug tersebut tidak tersedia.</p><a href="<?php echo e(site_url('pembangunan')); ?>" class="mt-6 inline-block bg-[#0D2247] text-white px-6 py-2 rounded-xl">Kembali</a></div>').show();
                return;
            }

            const pb = response.data[0].attributes;
            const dokumentasi = pb.pembangunan_dokumentasi;

            $('.judul-pembangunan').text(pb.judul);
            $('.lokasi-pembangunan').text(pb.lokasi || 'Lokasi tidak disebutkan');

            var anggaran = formatRupiahJs(pb.anggaran, 'Rp. ');
            var html = '';

            html += `<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">`;
            
            // ── KOLOM KIRI (Info Utama & Peta) ──
            html += `<div class="lg:col-span-2 space-y-6">`;
            
            // Foto Utama
            html += `<div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100">`;
            if (pb.foto) {
                html += `<img class="w-full h-auto object-cover max-h-[450px]" src="${pb.foto}" alt="${pb.judul}" />`;
            } else {
                html += getFallbackImage(pb.judul);
            }
            html += `</div>`;

            // Tabel Detail
            html += `
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <h2 class="font-extrabold text-xl text-[#0D2247] mb-5 flex items-center gap-2"><i class="fas fa-info-circle text-amber-500"></i> Informasi Pembangunan</h2>
                    <div class="overflow-hidden rounded-2xl border border-gray-100">
                        <table class="w-full detail-table text-sm">
                            <tr><th>Nama Kegiatan</th><td>${pb.judul}</td></tr>
                            <tr><th>Lokasi</th><td>${pb.lokasi || '-'}</td></tr>
                            <tr><th>Sumber Dana</th><td><span class="bg-green-50 text-green-700 font-bold px-3 py-1 rounded-full text-xs">${pb.sumber_dana || '-'}</span></td></tr>
                            <tr><th>Tahun Anggaran</th><td>${pb.tahun_anggaran || '-'}</td></tr>
                            <tr><th>Total Anggaran</th><td class="font-bold text-amber-600">${anggaran}</td></tr>
                            <tr><th>Volume/Ukuran</th><td>${pb.volume || '-'}</td></tr>
                            <tr><th>Pelaksana</th><td>${pb.pelaksana_kegiatan || '-'}</td></tr>
                            <tr><th>Keterangan</th><td>${pb.keterangan || '-'}</td></tr>
                        </table>
                    </div>
                </div>
            `;

            // Peta Lokasi
            if (pb.lat && pb.lng) {
                html += `
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                        <h2 class="font-extrabold text-xl text-[#0D2247] mb-5 flex items-center gap-2"><i class="fas fa-map-marked-alt text-amber-500"></i> Peta Lokasi</h2>
                        <div class="rounded-2xl overflow-hidden border border-gray-100">
                            <div id="map-pembangunan" style="height: 350px; width: 100%;"></div>
                        </div>
                    </div>
                `;
            }

            html += `</div>`; // End Kolom Kiri

            // ── KOLOM KANAN (Dokumentasi Progres) ──
            html += `<div class="space-y-6">
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 sticky top-[110px]">
                    <h2 class="font-extrabold text-xl text-[#0D2247] mb-5 flex items-center gap-2"><i class="fas fa-camera text-amber-500"></i> Progres Fisik</h2>
            `;

            if (dokumentasi && dokumentasi.length > 0) {
                html += `<div class="space-y-5">`;
                dokumentasi.forEach((dok) => {
                    html += `
                        <div class="border border-gray-100 rounded-2xl overflow-hidden group">
                            <div class="relative">
                    `;
                    if (dok.gambar) {
                        html += `<img class="w-full h-48 object-cover group-hover:scale-105 transition duration-500" src="${dok.gambar}" alt="Progres ${dok.persentase}%">`;
                    } else {
                        html += `<div class="h-48">` + getFallbackImage(`Progres ${dok.persentase}%`) + `</div>`;
                    }
                    html += `
                                <div class="absolute top-3 left-3 bg-[#0D2247] text-white px-3 py-1 rounded-full text-xs font-bold shadow-md">
                                    Progres ${dok.persentase}
                                </div>
                            </div>
                            <div class="p-3 bg-gray-50 text-center text-xs font-semibold text-gray-600 border-t border-gray-100">
                                Dokumentasi Tahap ${dok.persentase}
                            </div>
                        </div>
                    `;
                });
                html += `</div>`;
            } else {
                html += `
                    <div class="text-center py-10 bg-gray-50 rounded-2xl border border-gray-100 border-dashed">
                        <i class="fas fa-images text-4xl text-gray-300 mb-3"></i>
                        <p class="text-gray-500 font-semibold text-sm">Belum Ada Dokumentasi</p>
                        <p class="text-gray-400 text-xs mt-1">Foto progres pembangunan belum diunggah.</p>
                    </div>
                `;
            }

            html += `
                </div>
            </div>`; // End Kolom Kanan

            html += `</div>`; // End Grid Utama

            container.html(html).show();

            // Init Map jika ada
            if (pb.lat && pb.lng) {
                let lat = pb.lat || config.lat;
                let lng = pb.lng || config.lng;
                let posisi = [lat, lng];
                let zoom = setting.default_zoom || 15;

                let logo = L.icon({
                    iconUrl: setting.icon_pembangunan_peta,
                    iconSize: [30, 40],
                    iconAnchor: [15, 40]
                });

                let options = {
                    maxZoom: setting.max_zoom_peta || 18,
                    minZoom: setting.min_zoom_peta || 5,
                    attributionControl: true
                };

                let map = L.map('map-pembangunan', options).setView(posisi, zoom);
                getBaseLayers(map, setting.mapbox_key, setting.jenis_peta);
                L.marker(posisi, { icon: logo }).addTo(map).bindPopup(`<b>${pb.judul}</b>`).openPopup();
                
                // Fix map size
                setTimeout(function(){ map.invalidateSize(); }, 500);
            }
        });
    }

    loadPembangunan();
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/pembangunan/detail.blade.php ENDPATH**/ ?>