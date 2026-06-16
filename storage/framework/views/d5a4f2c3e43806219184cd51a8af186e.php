<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
.font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

/* Tab Nav */
.gov-tab {
    display: inline-flex; align-items: center; gap: .45rem;
    padding: .7rem 1.4rem; font-size: .8rem; font-weight: 600;
    color: #6b7280; border-bottom: 3px solid transparent;
    transition: all .2s; white-space: nowrap; cursor: pointer; text-decoration: none;
}
.gov-tab:hover  { color: #0D2247; border-bottom-color: #c8973a55; }
.gov-tab.active { color: #0D2247; border-bottom-color: #c8973a; font-weight: 700; }

/* Card Wali */
.card-wali {
    background: linear-gradient(135deg, #0D2247 0%, #1a3866 100%);
    border-radius: 2rem; overflow: hidden;
    box-shadow: 0 24px 56px -12px rgba(13,34,71,.45);
}
/* Card biasa */
.card-perangkat {
    background: white; border-radius: 1.25rem; overflow: hidden;
    border: 1.5px solid #f3f4f6;
    box-shadow: 0 4px 16px -4px rgba(0,0,0,.07);
    transition: all .3s;
}
.card-perangkat:hover { transform: translateY(-5px); box-shadow: 0 18px 40px -8px rgba(0,0,0,.14); }

/* Badge jabatan */
.badge-jabatan {
    display: inline-block; font-size: 10px; font-weight: 700;
    letter-spacing: .08em; text-transform: uppercase;
    padding: .3rem .85rem; border-radius: 9999px;
}

/* Social icon */
.soc-btn {
    width: 36px; height: 36px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: .8rem; transition: all .2s;
}

/* Sambutan quote */
.quote-mark { font-family: Georgia, serif; font-size: 80px; line-height: 1; color: rgba(13,34,71,.06); }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<?php
use App\Models\Pamong;
use App\Enums\StatusEnum;

// Ambil langsung dari DB
$semua = Pamong::aktif()->urut()->get();

$wali       = null;
$perangkat  = collect();

foreach ($semua as $p) {
    $jabatan = optional($p->jabatan)->nama ?? '';
    $isWali  = stripos($jabatan, 'wali') !== false
            || stripos($jabatan, 'kepala desa') !== false
            || optional($p->jabatan)->id == optional(kades())->id;

    $foto = AmbilFoto($p->foto_staff, '', $p->pamong_sex ?? null);
    $ms   = is_array($p->media_sosial) ? $p->media_sosial : [];

    $record = [
        'nama'     => $p->pamong_nama,
        'jabatan'  => $jabatan,
        'niap'     => $p->pamong_niap ?? '',
        'foto'     => $foto,
        'sosmed'   => $ms,
    ];

    if ($isWali && !$wali) {
        $wali = $record;
    } else {
        $perangkat->push($record);
    }
}

// Pisah kepala jorong
$jorong   = $perangkat->filter(fn($p) => stripos($p['jabatan'], 'jorong') !== false
                                       || stripos($p['jabatan'], 'dusun') !== false);
$staf     = $perangkat->reject(fn($p) => stripos($p['jabatan'], 'jorong') !== false
                                       || stripos($p['jabatan'], 'dusun') !== false);

// Warna badge per jenis jabatan
function badgeColor(string $jabatan): array {
    if (stripos($jabatan, 'sekretaris') !== false) return ['#1a3866', '#e8edf7'];
    if (stripos($jabatan, 'kaur') !== false)       return ['#c8973a', '#fdf6e8'];
    if (stripos($jabatan, 'kasi') !== false)       return ['#3a7d44', '#edf7ee'];
    if (stripos($jabatan, 'jorong') !== false
     || stripos($jabatan, 'dusun') !== false)      return ['#7c3d8f', '#f5edf7'];
    return ['#0D2247', '#e8edf7'];
}
?>


<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height:240px;">
    <div class="absolute inset-0 opacity-10" style="background:url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=1600&q=80') center/cover;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10 font-jakarta">
        <nav class="text-white/50 text-xs mb-4 flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <span class="text-white font-semibold">Pemerintahan</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[.2em] text-xs uppercase">Nagari Koto Tangah Batu Ampa</span>
        <h1 class="font-extrabold text-4xl md:text-5xl mt-2 mb-2">Pemerintahan Nagari</h1>
        <p class="text-white/60 text-sm max-w-lg">Aparatur, regulasi, dan transparansi anggaran Nagari Koto Tangah Batu Ampa — Kec. Akabiluru, Kab. Lima Puluh Kota</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 40L0 20Q720 0 1440 20L1440 40Z" fill="white"/>
        </svg>
    </div>
</section>


<div class="bg-white shadow-sm sticky top-[96px] z-40 border-b border-gray-100">
    <div class="container mx-auto px-4 max-w-7xl overflow-x-auto scrollbar-none">
        <div class="flex font-jakarta">
            <a href="<?php echo e(site_url('pemerintah')); ?>"                  class="gov-tab active"><i class="fas fa-users text-[10px]"></i> Aparatur Nagari</a>
            <a href="<?php echo e(site_url('sotk')); ?>"                        class="gov-tab"><i class="fas fa-sitemap text-[10px]"></i> Struktur Organisasi</a>
            <a href="<?php echo e(site_url('pemerintah/tugas-fungsi')); ?>"     class="gov-tab"><i class="fas fa-tasks text-[10px]"></i> Tugas &amp; Fungsi</a>
            <a href="<?php echo e(site_url('pemerintah/regulasi')); ?>"         class="gov-tab"><i class="fas fa-gavel text-[10px]"></i> Regulasi</a>
            <a href="<?php echo e(site_url('pemerintah/transparansi')); ?>"     class="gov-tab"><i class="fas fa-chart-pie text-[10px]"></i> Transparansi</a>
        </div>
    </div>
</div>

<div class="bg-gray-50 pb-24">
<div class="container mx-auto px-4 max-w-7xl py-14 font-jakarta space-y-16">

    
    <div class="text-center">
        <span class="text-amber-500 font-bold tracking-[.2em] text-xs uppercase">Aparatur</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-1">Perangkat Nagari</h2>
        <p class="text-gray-400 text-sm mt-2">Melayani 9.969 jiwa · 3.196 KK · 6 Jorong</p>
    </div>

    
    <?php if($wali): ?>
    <div class="flex justify-center">
        <div class="card-wali w-full max-w-2xl">
            <div class="flex flex-col md:flex-row items-center gap-0">
                
                <div class="md:w-56 w-full flex-shrink-0 relative" style="min-height:220px;">
                    <?php if($wali['foto']): ?>
                        <img src="<?php echo e($wali['foto']); ?>" alt="<?php echo e($wali['nama']); ?>"
                             class="w-full h-full object-cover" style="min-height:220px;">
                    <?php else: ?>
                        <div class="w-full flex items-center justify-center bg-white/10" style="min-height:220px;">
                            <i class="fas fa-user text-white/30 text-6xl"></i>
                        </div>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-[#0D2247] hidden md:block"></div>
                </div>
                
                <div class="flex-1 p-8 text-white">
                    <div class="inline-flex items-center gap-2 bg-amber-500/20 text-amber-400 px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest mb-4">
                        <i class="fas fa-star text-[9px]"></i> <?php echo e($wali['jabatan']); ?>

                    </div>
                    <h3 class="font-extrabold text-2xl text-white mb-1"><?php echo e($wali['nama']); ?></h3>
                    <?php if($wali['niap']): ?>
                    <p class="text-white/40 text-xs mb-4">NIAP: <?php echo e($wali['niap']); ?></p>
                    <?php endif; ?>
                    <p class="text-white/60 text-sm leading-relaxed mb-5">
                        Memimpin Nagari Koto Tangah Batu Ampa dalam mewujudkan visi <em>"Nagari yang Madani, Sejahtera dan Berbudaya"</em> berlandaskan ABS-SBK.
                    </p>
                    
                    <?php if(!empty($wali['sosmed'])): ?>
                    <div class="flex gap-2">
                        <?php $__currentLoopData = $wali['sosmed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($val): ?>
                        <a href="<?php echo e($val); ?>" target="_blank"
                           class="soc-btn bg-white/10 hover:bg-white/20 text-white/70 hover:text-white">
                            <i class="fab fa-<?php echo e($key); ?>"></i>
                        </a>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <div class="flex gap-2">
                        <span class="soc-btn bg-white/10 text-white/30 cursor-default"><i class="fab fa-whatsapp"></i></span>
                        <span class="soc-btn bg-white/10 text-white/30 cursor-default"><i class="fas fa-envelope"></i></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="flex justify-center -mt-8">
        <div class="w-px h-10 bg-gray-300"></div>
    </div>
    <?php endif; ?>

    
    <?php if($staf->count()): ?>
    <div>
        <h3 class="font-bold text-[#0D2247] text-lg mb-6 flex items-center gap-3">
            <span class="w-1 h-6 bg-amber-500 rounded-full inline-block"></span>
            Staf &amp; Perangkat Nagari
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            <?php $__currentLoopData = $staf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php [$fgColor, $bgColor] = badgeColor($p['jabatan']); ?>
            <div class="card-perangkat group">
                <div class="h-48 overflow-hidden bg-gray-100 relative">
                    <?php if($p['foto']): ?>
                        <img src="<?php echo e($p['foto']); ?>" alt="<?php echo e($p['nama']); ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center" style="background:<?php echo e($fgColor); ?>15;">
                            <i class="fas fa-user text-5xl" style="color:<?php echo e($fgColor); ?>30;"></i>
                        </div>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                </div>
                <div class="p-5 text-center">
                    <span class="badge-jabatan mb-3" style="color:<?php echo e($fgColor); ?>;background:<?php echo e($bgColor); ?>;">
                        <?php echo e($p['jabatan']); ?>

                    </span>
                    <h4 class="font-bold text-gray-800 text-sm mt-2 leading-snug"><?php echo e($p['nama']); ?></h4>
                    <?php if($p['niap']): ?>
                    <p class="text-gray-400 text-[11px] mt-1">NIAP: <?php echo e($p['niap']); ?></p>
                    <?php endif; ?>
                    <?php if(!empty($p['sosmed'])): ?>
                    <div class="flex justify-center gap-2 mt-3">
                        <?php $__currentLoopData = $p['sosmed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($val): ?>
                        <a href="<?php echo e($val); ?>" target="_blank"
                           class="soc-btn bg-gray-50 hover:text-white transition"
                           style="color:<?php echo e($fgColor); ?>;--hover-bg:<?php echo e($fgColor); ?>;"
                           onmouseover="this.style.background='<?php echo e($fgColor); ?>';this.style.color='white';"
                           onmouseout="this.style.background='';this.style.color='<?php echo e($fgColor); ?>';">
                            <i class="fab fa-<?php echo e($key); ?>"></i>
                        </a>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>

    
    <?php if($jorong->count()): ?>
    <div>
        <h3 class="font-bold text-[#0D2247] text-lg mb-6 flex items-center gap-3">
            <span class="w-1 h-6 bg-[#7c3d8f] rounded-full inline-block"></span>
            Kepala Jorong
        </h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            <?php $__currentLoopData = $jorong; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card-perangkat group text-center">
                <div class="h-32 overflow-hidden bg-purple-50 relative">
                    <?php if($j['foto']): ?>
                        <img src="<?php echo e($j['foto']); ?>" alt="<?php echo e($j['nama']); ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center bg-[#7c3d8f]/5">
                            <i class="fas fa-map-pin text-3xl text-[#7c3d8f]/20"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="p-4">
                    <span class="badge-jabatan text-[9px]" style="color:#7c3d8f;background:#f5edf7;">
                        <?php echo e(str_replace('Kepala Jorong ', '', $j['jabatan'])); ?>

                    </span>
                    <p class="font-bold text-gray-800 text-xs mt-2 leading-snug"><?php echo e($j['nama']); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>



</div>
</div>


<div class="bg-white border-t border-gray-100">
<div class="container mx-auto px-4 max-w-7xl py-16 font-jakarta">

    <div class="text-center mb-12">
        <span class="text-amber-500 font-bold tracking-[.2em] text-xs uppercase">Dari Pimpinan</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-2">Sambutan Wali Nagari</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
        
        <div class="flex flex-col items-center text-center">
            <div class="w-48 h-48 rounded-3xl overflow-hidden shadow-2xl ring-4 ring-[#0D2247]/10 mb-5">
                <?php if($wali && $wali['foto']): ?>
                    <img src="<?php echo e($wali['foto']); ?>" alt="<?php echo e($wali['nama'] ?? 'Wali Nagari'); ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full bg-[#0D2247] flex items-center justify-center">
                        <span class="text-white font-extrabold text-4xl">SA</span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="bg-[#0D2247] text-white rounded-2xl px-6 py-4 w-full">
                <div class="text-[10px] font-bold uppercase tracking-widest text-white/50 mb-1">Wali Nagari</div>
                <div class="font-extrabold text-lg"><?php echo e($wali['nama'] ?? 'Syamsul Akmal'); ?></div>
                <div class="text-white/60 text-xs mt-1">Nagari Koto Tangah Batu Ampa</div>
                <div class="text-white/60 text-xs">Periode RPJM 2022–2030</div>
            </div>
            <div class="mt-4 bg-amber-50 border border-amber-100 rounded-2xl p-4 w-full text-left">
                <div class="text-[10px] font-bold uppercase tracking-widest text-amber-600 mb-2">Sekilas Nagari</div>
                <div class="space-y-1.5 text-xs text-gray-600">
                    <div class="flex justify-between"><span>Penduduk</span><span class="font-bold text-[#0D2247]">9.969 Jiwa</span></div>
                    <div class="flex justify-between"><span>KK</span><span class="font-bold text-[#0D2247]">3.196 KK</span></div>
                    <div class="flex justify-between"><span>Jorong</span><span class="font-bold text-[#0D2247]">6 Jorong</span></div>
                    <div class="flex justify-between"><span>Luas</span><span class="font-bold text-[#0D2247]">2.244 Ha</span></div>
                    <div class="flex justify-between"><span>Ketinggian</span><span class="font-bold text-[#0D2247]">570–611 Mdpl</span></div>
                </div>
            </div>
        </div>

        
        <div class="lg:col-span-2">
            <div class="relative">
                <div class="quote-mark absolute -top-4 -left-2 select-none">&ldquo;</div>
                <div class="relative z-10 space-y-5 text-gray-600 leading-loose text-base">
                    <p>Assalamu'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT yang telah melimpahkan rahmat dan karunia-Nya. Shalawat serta salam senantiasa tercurahkan kepada Nabi Muhammad SAW beserta keluarga dan sahabatnya.</p>
                    <p>Atas nama segenap Pemerintah Nagari Koto Tangah Batu Ampa, saya menyambut dengan penuh kebanggaan kehadiran website resmi nagari kita. Nagari Koto Tangah Batu Ampa adalah nagari yang <strong class="text-[#0D2247]">kaya akan potensi</strong> — dari sawah produktif 455 Ha, perkebunan 895 Ha, wisata <em>Kolam Tando PLTA Batang Agam</em>, hingga kekayaan adat dan budaya Minangkabau yang luhur.</p>
                    <p>Melalui RPJM Nagari 2022–2030, kami berkomitmen mewujudkan visi <em class="text-[#0D2247] font-semibold">"Nagari yang Madani, Sejahtera dan Berbudaya berlandaskan Adat Basandi Syarak', Syarak' Basandi Kitabullah."</em> Komitmen ini diwujudkan melalui pembangunan infrastruktur terencana, layanan publik digital, pemberdayaan ekonomi, dan pelestarian nilai ABS-SBK.</p>
                    <p>Kami mengundang seluruh warga, perantau, dan masyarakat luas untuk berpartisipasi aktif. Aspirasi Anda adalah energi terbesar bagi kemajuan nagari kita. <strong class="text-[#0D2247]">Bersama kita bangun nagari yang madani, sejahtera, dan berbudaya.</strong></p>
                    <p class="italic text-gray-400">Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-gray-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-[#0D2247] rounded-xl flex items-center justify-center text-white font-extrabold flex-shrink-0">SA</div>
                <div>
                    <div class="font-extrabold text-[#0D2247]"><?php echo e($wali['nama'] ?? 'Syamsul Akmal'); ?></div>
                    <div class="text-gray-500 text-sm">Wali Nagari Koto Tangah Batu Ampa</div>
                    <div class="text-gray-400 text-xs">Kec. Akabiluru · Kab. Lima Puluh Kota · Sumatera Barat</div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/pemerintah/index.blade.php ENDPATH**/ ?>