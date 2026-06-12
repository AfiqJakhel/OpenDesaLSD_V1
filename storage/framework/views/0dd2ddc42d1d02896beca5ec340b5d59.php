<?php echo $__env->make('theme::commons.asset_peta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
.font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
.tab-btn { display:inline-flex;align-items:center;gap:.4rem;padding:.65rem 1.25rem;font-size:.82rem;font-weight:600;color:#6b7280;border-bottom:3px solid transparent;transition:all .2s;white-space:nowrap;cursor:pointer;background:none;border-top:none;border-left:none;border-right:none; }
.tab-btn:hover { color:#0D2247; border-bottom-color:#c8973a55; }
.tab-btn.active { color:#0D2247; border-bottom-color:#c8973a; font-weight:700; }
.prog-card { background:white;border-radius:1.25rem;border:1.5px solid #f3f4f6;padding:1.25rem;transition:all .3s; }
.prog-card:hover { transform:translateY(-3px);box-shadow:0 16px 36px -8px rgba(0,0,0,.12); }
.bid-badge { display:inline-block;font-size:10px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:.25rem .75rem;border-radius:9999px; }
.progress-bar { height:6px;border-radius:9999px;background:#e5e7eb; }
.progress-fill { height:6px;border-radius:9999px;transition:width .8s ease; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height:260px;">
    <div class="absolute inset-0 opacity-10" style="background:url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1600&q=80') center/cover;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10 font-jakarta">
        <nav class="text-white/50 text-xs mb-4 flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <span class="text-white font-semibold">Pembangunan</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[.2em] text-xs uppercase">RPJM 2022–2030</span>
        <h1 class="font-extrabold text-4xl mt-2 mb-3">Program Pembangunan Nagari</h1>
        <p class="text-white/60 text-sm max-w-xl">Rencana dan realisasi pembangunan Nagari Koto Tangah Batu Ampa berdasarkan RPJM Nagari 2022–2030.</p>

        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-8">
            <div class="bg-white/10 backdrop-blur rounded-2xl p-4">
                <div class="text-amber-400 font-extrabold text-xl">5</div>
                <div class="text-white/70 text-xs mt-1">Bidang Program</div>
            </div>
            <div class="bg-white/10 backdrop-blur rounded-2xl p-4">
                <div class="text-amber-400 font-extrabold text-xl">8</div>
                <div class="text-white/70 text-xs mt-1">Tahun RPJM</div>
            </div>
            <div class="bg-white/10 backdrop-blur rounded-2xl p-4">
                <div class="text-amber-400 font-extrabold text-xl">6</div>
                <div class="text-white/70 text-xs mt-1">Jorong Sasaran</div>
            </div>
            <div class="bg-white/10 backdrop-blur rounded-2xl p-4">
                <div class="text-amber-400 font-extrabold text-xl">APBNag</div>
                <div class="text-white/70 text-xs mt-1">Sumber Dana Utama</div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 36L0 18Q720 0 1440 18L1440 36Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-white shadow-sm sticky top-[96px] z-40 border-b border-gray-100 font-jakarta">
    <div class="container mx-auto px-4 max-w-7xl overflow-x-auto">
        <div class="flex">
            <button class="tab-btn active" onclick="showTab('rpjm',this)"><i class="fas fa-map text-[10px]"></i> Program RPJM</button>
            <button class="tab-btn" onclick="showTab('realisasi',this)"><i class="fas fa-hard-hat text-[10px]"></i> Realisasi Fisik</button>
        </div>
    </div>
</div>

<div class="bg-gray-50 min-h-screen py-12 font-jakarta">
<div class="container mx-auto px-4 max-w-7xl">


<div id="tab-rpjm">

    <?php
    $bidang = [
        [
            'nama'  => 'Penyelenggaraan Pemerintahan',
            'icon'  => 'fa-landmark',
            'color' => '#0D2247',
            'bg'    => '#e8edf7',
            'persen'=> 20,
            'program' => [
                ['nama'=>'Peningkatan kapasitas Anggota Bamus Nagari','sasaran'=>'Pemerintah Nagari','tahun'=>'2022-2030'],
                ['nama'=>'Kegiatan kunjungan berkala Pemerintah Nagari ke masyarakat','sasaran'=>'Masyarakat','tahun'=>'2022-2030'],
                ['nama'=>'Pengelolaan Tata Kelola Pemerintahan Nagari','sasaran'=>'Kantor Nagari','tahun'=>'2022-2030'],
            ],
        ],
        [
            'nama'  => 'Pelaksanaan Pembangunan',
            'icon'  => 'fa-hard-hat',
            'color' => '#c8973a',
            'bg'    => '#fdf6e8',
            'persen'=> 45,
            'program' => [
                ['nama'=>'Normalisasi & Perbaikan Saluran Irigasi (Basuang, Lurah Pasia, dll)','sasaran'=>'Semua Jorong','tahun'=>'2022-2030'],
                ['nama'=>'Pembangunan Irigasi (Koto Baru, Guguak Canceh, Ompang Soriak)','sasaran'=>'Area Pertanian','tahun'=>'2022-2030'],
                ['nama'=>'Pembangunan & Pemeliharaan Jalan Lingkungan/Jalan Usaha Tani','sasaran'=>'Semua Jorong','tahun'=>'2022-2030'],
                ['nama'=>'Pembangunan Sarana Air Bersih & Sanitasi Permukiman','sasaran'=>'Kawasan Pemukiman','tahun'=>'2022-2030'],
            ],
        ],
        [
            'nama'  => 'Pembinaan Kemasyarakatan',
            'icon'  => 'fa-users',
            'color' => '#3a7d44',
            'bg'    => '#edf7ee',
            'persen'=> 15,
            'program' => [
                ['nama'=>'Kunjungan berkala Tim PKK Nagari ke Jorong-jorong','sasaran'=>'6 Jorong','tahun'=>'2022-2030'],
                ['nama'=>'Pelatihan Pola Asuh Anak Berdasarkan ABS-SBK','sasaran'=>'Keluarga','tahun'=>'2022-2030'],
                ['nama'=>'Pelatihan Tata Kelola Rumah Tangga untuk Remaja Puteri','sasaran'=>'Remaja & Ibu','tahun'=>'2022-2030'],
                ['nama'=>'Pembinaan Group Kesenian dan Kebudayaan Tingkat Nagari','sasaran'=>'Pemuda & Masyarakat','tahun'=>'2022-2030'],
            ],
        ],
        [
            'nama'  => 'Pemberdayaan Masyarakat',
            'icon'  => 'fa-seedling',
            'color' => '#7c3d8f',
            'bg'    => '#f5edf7',
            'persen'=> 15,
            'program' => [
                ['nama'=>'Pelatihan Kepemimpinan, Kewirausahaan dan UMKM','sasaran'=>'Pelaku Usaha','tahun'=>'2022-2030'],
                ['nama'=>'Pembentukan POSLUHNAG (Pos Penyuluh Nagari)','sasaran'=>'Petani Nagari','tahun'=>'2022-2030'],
                ['nama'=>'Pelatihan Pengolahan Bahan Baku Lokal', 'sasaran'=>'Masyarakat', 'tahun'=>'2022-2030'],
                ['nama'=>'Pelatihan dan Pembinaan Kelompok Tani & Asuransi Tani','sasaran'=>'Kelompok Tani','tahun'=>'2022-2030'],
                ['nama'=>'Pelatihan Teknologi Tepat Guna (TTG)','sasaran'=>'Masyarakat','tahun'=>'2022-2030'],
            ],
        ],
        [
            'nama'  => 'Penanggulangan Bencana & Darurat',
            'icon'  => 'fa-shield-alt',
            'color' => '#b91c1c',
            'bg'    => '#fef2f2',
            'persen'=> 5,
            'program' => [
                ['nama'=>'Pembuatan Jalur Evakuasi Bencana di Nagari','sasaran'=>'Kawasan Rawan','tahun'=>'2022-2030'],
                ['nama'=>'Pelatihan Kader Tanggap Bencana','sasaran'=>'Masyarakat','tahun'=>'2022-2030'],
                ['nama'=>'Pembangunan Sistem Peringatan Dini Bencana','sasaran'=>'Semua Jorong','tahun'=>'2022-2030'],
            ],
        ],
    ];
    ?>

    <div class="mb-10">
        <div class="flex items-center gap-3 mb-2">
            <span class="w-1 h-7 bg-amber-500 rounded-full inline-block"></span>
            <h2 class="font-extrabold text-2xl text-[#0D2247]">Bidang Program RPJM 2022–2030</h2>
        </div>
        <p class="text-gray-400 text-sm ml-4">Nagari Koto Tangah Batu Ampa · Kec. Akabiluru · Kab. Lima Puluh Kota</p>
    </div>

    <div class="space-y-6">
        <?php $__currentLoopData = $bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
            
            <div class="flex items-center gap-4 px-6 py-5 cursor-pointer" onclick="toggleBidang(<?php echo e($i); ?>)"
                 style="border-left:4px solid <?php echo e($b['color']); ?>;">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background:<?php echo e($b['bg']); ?>;">
                    <i class="fas <?php echo e($b['icon']); ?>" style="color:<?php echo e($b['color']); ?>;"></i>
                </div>
                <div class="flex-1">
                    <div class="font-bold text-[#0D2247] text-sm">Bidang <?php echo e($i+1); ?>: <?php echo e($b['nama']); ?></div>
                    <div class="flex items-center gap-3 mt-2">
                        <div class="progress-bar flex-1 max-w-xs">
                            <div class="progress-fill" style="width:<?php echo e($b['persen']); ?>%;background:<?php echo e($b['color']); ?>;"></div>
                        </div>
                        <span class="text-xs font-bold" style="color:<?php echo e($b['color']); ?>;"><?php echo e($b['persen']); ?>% alokasi</span>
                    </div>
                </div>
                <div class="text-xs text-gray-400"><?php echo e(count($b['program'])); ?> program</div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform" id="chevron-<?php echo e($i); ?>"></i>
            </div>

            
            <div id="bidang-<?php echo e($i); ?>" class="hidden border-t border-gray-100">
                <div class="divide-y divide-gray-50">
                    <?php $__currentLoopData = $b['program']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j => $prog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-start gap-4 px-6 py-4 hover:bg-gray-50 transition">
                        <div class="w-7 h-7 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0 mt-0.5"
                             style="background:<?php echo e($b['color']); ?>;"><?php echo e($j+1); ?></div>
                        <div class="flex-1">
                            <p class="text-gray-800 text-sm font-semibold"><?php echo e($prog['nama']); ?></p>
                            <div class="flex items-center gap-3 mt-1.5">
                                <span class="text-[10px] text-gray-400"><i class="fas fa-map-pin mr-1"></i><?php echo e($prog['sasaran']); ?></span>
                                <span class="text-[10px] text-gray-400"><i class="fas fa-clock mr-1"></i><?php echo e($prog['tahun']); ?></span>
                            </div>
                        </div>
                        <span class="bid-badge flex-shrink-0" style="color:<?php echo e($b['color']); ?>;background:<?php echo e($b['bg']); ?>;">
                            <?php echo e(explode(' ', trim($b['nama']))[0]); ?>

                        </span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-8 bg-amber-50 border border-amber-100 rounded-2xl p-5 flex items-start gap-3 text-sm text-amber-800">
        <i class="fas fa-info-circle text-amber-500 mt-0.5 flex-shrink-0"></i>
        <div>Data program bersumber dari <strong>RPJM Nagari Koto Tangah Batu Ampa 2022–2030</strong>.
        Realisasi fisik diperbarui setiap tahun anggaran melalui menu <strong>Admin → Pembangunan</strong>.</div>
    </div>
</div>


<div id="tab-realisasi" style="display:none;">
    <div class="mb-8 flex items-center gap-3">
        <span class="w-1 h-7 bg-amber-500 rounded-full inline-block"></span>
        <h2 class="font-extrabold text-2xl text-[#0D2247]">Realisasi Pembangunan Fisik</h2>
    </div>

    <div id="loading-container" class="py-12 flex justify-center">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#0D2247]"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="pembangunan-list" style="display:none;"></div>

    <div class="mt-10 flex justify-center" id="pagination-container" style="display:none;">
        <?php echo $__env->make('theme::commons.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

</div>
</div>


<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalLokasi" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog relative w-auto pointer-events-none max-w-3xl mx-auto mt-10">
        <div class="modal-content border-none shadow-2xl relative flex flex-col w-full pointer-events-auto bg-white rounded-3xl outline-none overflow-hidden">
            <div class="modal-header bg-[#0D2247] text-white flex items-center justify-between p-5">
                <h5 class="text-xl font-bold font-jakarta modal-title">Lokasi Pembangunan</h5>
                <button type="button" class="text-white/80 hover:text-white bg-transparent border-none text-2xl" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-0"></div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function showTab(tab, el) {
    document.getElementById('tab-rpjm').style.display     = tab==='rpjm'      ? 'block' : 'none';
    document.getElementById('tab-realisasi').style.display = tab==='realisasi' ? 'block' : 'none';
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    if (tab === 'realisasi') loadPembangunan();
}

function toggleBidang(i) {
    var el = document.getElementById('bidang-' + i);
    var ch = document.getElementById('chevron-' + i);
    var hidden = el.classList.contains('hidden');
    el.classList.toggle('hidden', !hidden);
    ch.style.transform = hidden ? 'rotate(180deg)' : '';
}

// Realisasi Fisik via API
var loaded = false;
function loadPembangunan(params) {
    if (!params && loaded) return;
    loaded = true;
    params = params || {};
    const pageSize = <?php echo e(theme_config('jumlah_pembangunan_perhalaman')); ?>;
    var api = `<?php echo e(route('api.pembangunan')); ?>?page[size]=${pageSize}`;
    $('#pagination-container').hide();
    $('#loading-container').show();
    $('#pembangunan-list').hide();
    $.get(api, params, function(data) {
        var list = data.data;
        var $list = $('#pembangunan-list');
        $list.empty();
        $('#loading-container').hide();
        $list.show();
        if (!list.length) {
            $list.removeClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6');
            $list.html('<div class="col-span-4 text-center py-16"><i class="fas fa-hard-hat text-5xl text-gray-200 mb-4"></i><h3 class="font-bold text-gray-500">Belum ada realisasi pembangunan</h3><p class="text-gray-400 text-sm mt-1">Tambahkan melalui Admin → Pembangunan</p></div>');
            return;
        }
        $list.addClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6');
        list.forEach(function(item) {
            var url  = SITE_URL + 'pembangunan/' + item.attributes.slug;
            var ket  = (item.attributes.keterangan || '').substring(0, 80) + '...';
            var mapBtn = '';
            if (item.attributes.lat && item.attributes.lng) {
                mapBtn = `<button type="button" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition flex items-center justify-center" data-bs-toggle="modal" data-bs-target="#modalLokasi" data-lat="${item.attributes.lat}" data-lng="${item.attributes.lng}" data-title="${item.attributes.judul}"><i class="fas fa-map-marker-alt"></i></button>`;
            }
            
            var imgHtml = '';
            if (item.attributes.foto) {
                imgHtml = `<img class="w-full h-full object-cover group-hover:scale-105 transition duration-500" src="${item.attributes.foto}" alt="${item.attributes.judul}">`;
            } else {
                imgHtml = `
                    <div class="w-full h-full bg-gradient-to-br from-gray-50 to-gray-200 flex flex-col items-center justify-center text-gray-400">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center mb-2">
                            <i class="fas fa-hard-hat text-xl text-gray-300"></i>
                        </div>
                        <span class="text-[10px] font-semibold">Tanpa Foto</span>
                    </div>
                `;
            }

            $list.append(`<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition flex flex-col group">
                <div class="relative h-48 overflow-hidden">
                    ${imgHtml}
                    <div class="absolute top-3 right-3 bg-white/90 px-3 py-1 rounded-full text-xs font-bold text-[#0D2247]"><i class="fas fa-calendar-alt mr-1 text-amber-500"></i>${item.attributes.tahun_anggaran}</div>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-bold text-gray-800 leading-snug mb-2 line-clamp-2">${item.attributes.judul}</h3>
                    <p class="text-gray-400 text-xs mb-1"><i class="fas fa-map-marker-alt mr-1"></i>${item.attributes.lokasi||'-'}</p>
                    <p class="text-gray-500 text-sm flex-grow line-clamp-3 mt-2">${ket}</p>
                    <div class="flex gap-2 mt-4 pt-3 border-t border-gray-100">
                        <a href="${url}" class="flex-1 text-center py-2 bg-[#0D2247] text-white text-sm font-semibold rounded-xl hover:bg-[#162e5c] transition">Selengkapnya</a>
                        ${mapBtn}
                    </div>
                </div>
            </div>`);
        });
        $('#pagination-container').show();
        initPagination(data);
    });
}

$('.pagination').on('click', '.btn-page', function() {
    loadPembangunan({'page[number]': $(this).data('page')});
});

$('#modalLokasi').on('shown.bs.modal', function(e) {
    var link = $(e.relatedTarget);
    $(this).find('.modal-title').text(link.data('title'));
    $(this).find('.modal-body').html("<div id='map' style='width:100%;height:450px;border-radius:0 0 1.5rem 1.5rem;'></div>");
    var pos = [link.data('lat'), link.data('lng')];
    if (window.pelapak) window.pelapak.remove();
    window.pelapak = L.map('map').setView(pos, 15);
    getBaseLayers(window.pelapak, setting.mapbox_key, setting.jenis_peta);
    L.marker(pos).addTo(window.pelapak).bindPopup('<b>' + link.data('title') + '</b>').openPopup();
    setTimeout(function(){ window.pelapak.invalidateSize(); }, 100);
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/pembangunan/index.blade.php ENDPATH**/ ?>