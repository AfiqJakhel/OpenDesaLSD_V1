<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    .gov-tab {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        font-size: 0.8125rem; font-weight: 600;
        color: #6b7280;
        border-bottom: 3px solid transparent;
        transition: all 0.2s;
        white-space: nowrap;
        text-decoration: none;
    }
    .gov-tab:hover { color: #0D2247; border-bottom-color: #c8973a55; }
    .gov-tab.active { color: #0D2247; border-bottom-color: #c8973a; font-weight: 700; }
    
    /* Bar chart sederhana untuk anggaran */
    .budget-bar-track {
        height: 14px; background: #f3f4f6; border-radius: 9999px; overflow: hidden;
    }
    .budget-bar-fill {
        height: 100%; border-radius: 9999px;
        transition: width 1.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 260px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <a href="<?php echo e(site_url('pemerintah')); ?>" class="hover:text-white transition">Pemerintahan</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">Transparansi</span>
        </nav>
        <span class="text-accent font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Keuangan Nagari</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">Transparansi Anggaran</h1>
        <p class="text-white/70 max-w-xl font-jakarta">Ringkasan APBNag dan realisasi anggaran tahun berjalan untuk keterbukaan informasi kepada warga.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="white"/>
        </svg>
    </div>
</section>


<div class="bg-white shadow-sm sticky top-[96px] z-40 border-b border-gray-100">
    <div class="container mx-auto px-4 max-w-7xl overflow-x-auto scrollbar-none">
        <div class="flex">
            <a href="<?php echo e(site_url('pemerintah')); ?>" class="gov-tab"><i class="fas fa-users text-[11px]"></i> Aparatur Nagari</a>
            <a href="<?php echo e(site_url('sotk')); ?>" class="gov-tab"><i class="fas fa-sitemap text-[11px]"></i> Struktur Organisasi</a>
            <a href="<?php echo e(site_url('pemerintah/tugas-fungsi')); ?>" class="gov-tab"><i class="fas fa-tasks text-[11px]"></i> Tugas & Fungsi</a>
            <a href="<?php echo e(site_url('pemerintah/regulasi')); ?>" class="gov-tab"><i class="fas fa-gavel text-[11px]"></i> Regulasi</a>
            <a href="<?php echo e(site_url('pemerintah/transparansi')); ?>" class="gov-tab active"><i class="fas fa-chart-pie text-[11px]"></i> Transparansi</a>
        </div>
    </div>
</div>


<div class="bg-gray-50 min-h-screen py-16">
<div class="container mx-auto px-4 max-w-6xl">

    <?php
        // Coba ambil dari sistem APBDesa OpenSID
        $apbdesa_data = null;
        try {
            // OpenSID menyimpan diapbdesa / apb_desa
            $tahun_anggaran = date('Y');
        } catch (\Exception $e) {}
        
        // Data ilustrasi APBNag (representatif untuk Nagari kecil di Sumbar)
        $apb = [
            'tahun' => date('Y'),
            'total_pendapatan' => 987500000,
            'total_belanja' => 987500000,
            'realisasi_pendapatan' => 764250000,
            'realisasi_belanja' => 698400000,
            
            'pendapatan' => [
                ['label' => 'Dana Desa (APBN)', 'anggaran' => 680000000, 'realisasi' => 526500000, 'color' => '#0D2247'],
                ['label' => 'ADD (Alokasi Dana Desa)', 'anggaran' => 214500000, 'realisasi' => 175000000, 'color' => '#c8973a'],
                ['label' => 'Bagi Hasil Pajak/Retribusi', 'anggaran' => 58000000, 'realisasi' => 42750000, 'color' => '#3a7d44'],
                ['label' => 'Pendapatan Asli Nagari (PAN)', 'anggaran' => 35000000, 'realisasi' => 20000000, 'color' => '#8b3a2a'],
            ],
            
            'belanja' => [
                ['label' => 'Bidang Penyelenggaraan Pemerintahan', 'anggaran' => 285000000, 'realisasi' => 241500000, 'color' => '#0D2247'],
                ['label' => 'Bidang Pembangunan Nagari', 'anggaran' => 452000000, 'realisasi' => 298400000, 'color' => '#c8973a'],
                ['label' => 'Bidang Kemasyarakatan', 'anggaran' => 145000000, 'realisasi' => 108300000, 'color' => '#3a7d44'],
                ['label' => 'Bidang Pemberdayaan Masyarakat', 'anggaran' => 75000000, 'realisasi' => 36200000, 'color' => '#8b3a2a'],
                ['label' => 'Bidang Penanggulangan Bencana', 'anggaran' => 30500000, 'realisasi' => 14000000, 'color' => '#1a5c52'],
            ],
        ];
        
        $pct_realisasi_pendapatan = round(($apb['realisasi_pendapatan'] / $apb['total_pendapatan']) * 100);
        $pct_realisasi_belanja = round(($apb['realisasi_belanja'] / $apb['total_belanja']) * 100);
    ?>

    
    <div class="flex items-center justify-between mb-10 flex-wrap gap-4">
        <div>
            <h2 class="font-jakarta font-extrabold text-3xl text-[#0D2247]">APBNag <?php echo e($apb['tahun']); ?></h2>
            <p class="text-gray-500 text-sm mt-1">Diperbarui: <?php echo e(date('d F Y')); ?></p>
        </div>
        <div class="flex items-center gap-3">
            <span class="bg-amber-50 border border-amber-200 text-amber-700 text-xs px-4 py-2 rounded-xl font-jakarta font-semibold">
                <i class="fas fa-info-circle mr-1"></i> Data ilustrasi — perbarui via Admin → APBDesa
            </span>
            <a href="<?php echo e(site_url('apbdesa')); ?>" class="bg-[#0D2247] text-white text-xs px-4 py-2 rounded-xl font-jakarta font-bold hover:bg-[#162d5a] transition">
                APBDesa Lengkap →
            </a>
        </div>
    </div>

    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-12">
        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-md text-center">
            <div class="text-[10px] font-jakarta font-bold uppercase tracking-widest text-gray-400 mb-2">Total APBNag</div>
            <div class="font-jakarta font-extrabold text-[#0D2247] text-xl leading-tight">Rp <?php echo e(number_format($apb['total_pendapatan'] / 1000000, 1)); ?> Jt</div>
            <div class="text-gray-400 text-xs mt-1">Tahun <?php echo e($apb['tahun']); ?></div>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-md text-center">
            <div class="text-[10px] font-jakarta font-bold uppercase tracking-widest text-gray-400 mb-2">Realisasi Pendapatan</div>
            <div class="font-jakarta font-extrabold text-[#3a7d44] text-xl leading-tight"><?php echo e($pct_realisasi_pendapatan); ?>%</div>
            <div class="text-gray-400 text-xs mt-1">Rp <?php echo e(number_format($apb['realisasi_pendapatan'] / 1000000, 1)); ?> Jt</div>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-md text-center">
            <div class="text-[10px] font-jakarta font-bold uppercase tracking-widest text-gray-400 mb-2">Realisasi Belanja</div>
            <div class="font-jakarta font-extrabold text-[#c8973a] text-xl leading-tight"><?php echo e($pct_realisasi_belanja); ?>%</div>
            <div class="text-gray-400 text-xs mt-1">Rp <?php echo e(number_format($apb['realisasi_belanja'] / 1000000, 1)); ?> Jt</div>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-md text-center">
            <div class="text-[10px] font-jakarta font-bold uppercase tracking-widest text-gray-400 mb-2">Sisa Anggaran</div>
            <div class="font-jakarta font-extrabold text-[#8b3a2a] text-xl leading-tight">Rp <?php echo e(number_format(($apb['total_belanja'] - $apb['realisasi_belanja']) / 1000000, 1)); ?> Jt</div>
            <div class="text-gray-400 text-xs mt-1">Belum terealisasi</div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">

        
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-md">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-jakarta font-bold text-[#0D2247] text-lg flex items-center gap-2">
                    <i class="fas fa-arrow-down text-[#3a7d44] text-sm"></i> Pendapatan
                </h3>
                <span class="text-sm font-jakarta font-extrabold text-[#3a7d44]"><?php echo e($pct_realisasi_pendapatan); ?>% terealisasi</span>
            </div>
            
            
            <div class="mb-6 p-4 bg-green-50 rounded-2xl">
                <div class="flex justify-between text-xs font-jakarta mb-2">
                    <span class="text-gray-600 font-semibold">Realisasi Total</span>
                    <span class="font-bold text-[#3a7d44]">Rp <?php echo e(number_format($apb['realisasi_pendapatan'] / 1000000, 1)); ?> Jt / <?php echo e(number_format($apb['total_pendapatan'] / 1000000, 1)); ?> Jt</span>
                </div>
                <div class="budget-bar-track">
                    <div class="budget-bar-fill" style="width: <?php echo e($pct_realisasi_pendapatan); ?>%; background: linear-gradient(90deg, #3a7d44, #5ab46b);"></div>
                </div>
            </div>

            <div class="space-y-5">
                <?php $__currentLoopData = $apb['pendapatan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $pct = round(($item['realisasi'] / $item['anggaran']) * 100);
                ?>
                <div>
                    <div class="flex justify-between items-start mb-2 gap-2">
                        <span class="text-xs font-jakarta font-semibold text-gray-700 leading-tight flex-1"><?php echo e($item['label']); ?></span>
                        <span class="text-xs font-jakarta font-extrabold flex-shrink-0" style="color: <?php echo e($item['color']); ?>;"><?php echo e($pct); ?>%</span>
                    </div>
                    <div class="budget-bar-track">
                        <div class="budget-bar-fill" style="width: <?php echo e($pct); ?>%; background: <?php echo e($item['color']); ?>;"></div>
                    </div>
                    <div class="flex justify-between mt-1 text-[10px] text-gray-400 font-jakarta">
                        <span>Realisasi: Rp <?php echo e(number_format($item['realisasi'] / 1000000, 1)); ?> Jt</span>
                        <span>Target: Rp <?php echo e(number_format($item['anggaran'] / 1000000, 1)); ?> Jt</span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-md">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-jakarta font-bold text-[#0D2247] text-lg flex items-center gap-2">
                    <i class="fas fa-arrow-up text-[#c8973a] text-sm"></i> Belanja
                </h3>
                <span class="text-sm font-jakarta font-extrabold text-[#c8973a]"><?php echo e($pct_realisasi_belanja); ?>% terealisasi</span>
            </div>
            
            
            <div class="mb-6 p-4 bg-amber-50 rounded-2xl">
                <div class="flex justify-between text-xs font-jakarta mb-2">
                    <span class="text-gray-600 font-semibold">Realisasi Total</span>
                    <span class="font-bold text-[#c8973a]">Rp <?php echo e(number_format($apb['realisasi_belanja'] / 1000000, 1)); ?> Jt / <?php echo e(number_format($apb['total_belanja'] / 1000000, 1)); ?> Jt</span>
                </div>
                <div class="budget-bar-track">
                    <div class="budget-bar-fill" style="width: <?php echo e($pct_realisasi_belanja); ?>%; background: linear-gradient(90deg, #c8973a, #e0b060);"></div>
                </div>
            </div>

            <div class="space-y-5">
                <?php $__currentLoopData = $apb['belanja']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $pct = round(($item['realisasi'] / $item['anggaran']) * 100);
                ?>
                <div>
                    <div class="flex justify-between items-start mb-2 gap-2">
                        <span class="text-xs font-jakarta font-semibold text-gray-700 leading-tight flex-1"><?php echo e($item['label']); ?></span>
                        <span class="text-xs font-jakarta font-extrabold flex-shrink-0" style="color: <?php echo e($item['color']); ?>;"><?php echo e($pct); ?>%</span>
                    </div>
                    <div class="budget-bar-track">
                        <div class="budget-bar-fill" style="width: <?php echo e($pct); ?>%; background: <?php echo e($item['color']); ?>;"></div>
                    </div>
                    <div class="flex justify-between mt-1 text-[10px] text-gray-400 font-jakarta">
                        <span>Realisasi: Rp <?php echo e(number_format($item['realisasi'] / 1000000, 1)); ?> Jt</span>
                        <span>Pagu: Rp <?php echo e(number_format($item['anggaran'] / 1000000, 1)); ?> Jt</span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <div class="bg-[#0D2247] rounded-3xl p-10 text-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <h3 class="font-jakarta font-bold text-xl mb-3">Komitmen Transparansi</h3>
                <p class="text-white/70 text-sm leading-relaxed font-jakarta">
                    Nagari Koto Tangah Batu Ampa berkomitmen mewujudkan <strong class="text-white">pengelolaan keuangan yang transparan dan akuntabel</strong>. 
                    Setiap penggunaan dana nagari dapat dipertanggungjawabkan kepada masyarakat dan pemerintah daerah.
                </p>
            </div>
            <div class="flex flex-col gap-3">
                <a href="<?php echo e(site_url('apbdesa')); ?>" class="flex items-center gap-3 bg-white/10 hover:bg-white/20 rounded-2xl p-4 transition group">
                    <div class="w-10 h-10 bg-accent rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-invoice-dollar text-white text-sm"></i>
                    </div>
                    <div>
                        <p class="font-jakarta font-bold text-sm">APBDesa Lengkap</p>
                        <p class="text-white/50 text-xs">Lihat detail anggaran</p>
                    </div>
                    <i class="fas fa-arrow-right text-white/30 ml-auto group-hover:text-white/70 transition"></i>
                </a>
                <a href="<?php echo e(site_url('informasi-publik')); ?>" class="flex items-center gap-3 bg-white/10 hover:bg-white/20 rounded-2xl p-4 transition group">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-pdf text-white text-sm"></i>
                    </div>
                    <div>
                        <p class="font-jakarta font-bold text-sm">Dokumen Publik</p>
                        <p class="text-white/50 text-xs">Laporan dan SK nagari</p>
                    </div>
                    <i class="fas fa-arrow-right text-white/30 ml-auto group-hover:text-white/70 transition"></i>
                </a>
            </div>
        </div>
    </div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/pemerintah/transparansi.blade.php ENDPATH**/ ?>