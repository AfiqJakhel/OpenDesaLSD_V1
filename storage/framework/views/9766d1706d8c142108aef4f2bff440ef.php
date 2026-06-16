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
    .tugas-card {
        background: white; border-radius: 1.5rem;
        border: 1.5px solid #f3f4f6;
        box-shadow: 0 4px 16px -4px rgba(0,0,0,0.06);
        transition: all 0.25s;
        overflow: hidden;
    }
    .tugas-card:hover { transform: translateY(-2px); box-shadow: 0 12px 32px -8px rgba(0,0,0,0.12); }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 260px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <a href="<?php echo e(site_url('pemerintah')); ?>" class="hover:text-white transition">Pemerintahan</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">Tugas & Fungsi</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Aparatur Nagari</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">Tugas & Fungsi</h1>
        <p class="text-white/70 max-w-xl font-jakarta">Peran dan tanggung jawab setiap jabatan perangkat nagari dalam melayani masyarakat.</p>
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
            <a href="<?php echo e(site_url('pemerintah')); ?>" class="gov-tab">
                <i class="fas fa-users text-[11px]"></i> Aparatur Nagari
            </a>
            <a href="<?php echo e(site_url('sotk')); ?>" class="gov-tab">
                <i class="fas fa-sitemap text-[11px]"></i> Struktur Organisasi
            </a>
            <a href="<?php echo e(site_url('pemerintah/tugas-fungsi')); ?>" class="gov-tab active">
                <i class="fas fa-tasks text-[11px]"></i> Tugas & Fungsi
            </a>
            <a href="<?php echo e(site_url('pemerintah/regulasi')); ?>" class="gov-tab">
                <i class="fas fa-gavel text-[11px]"></i> Regulasi
            </a>
            <a href="<?php echo e(site_url('pemerintah/transparansi')); ?>" class="gov-tab">
                <i class="fas fa-chart-pie text-[11px]"></i> Transparansi
            </a>
        </div>
    </div>
</div>


<div class="bg-gray-50 min-h-screen py-16">
<div class="container mx-auto px-4 max-w-5xl">

    <div class="text-center mb-12">
        <h2 class="font-jakarta font-extrabold text-3xl text-[#0D2247]">Tugas dan Fungsi Jabatan</h2>
        <p class="text-gray-500 mt-3 text-sm max-w-lg mx-auto">Penjelasan ringkas dan mudah dipahami tentang peran setiap jabatan perangkat nagari.</p>
    </div>

    <?php
        $tugas_jabatan = [
            [
                'jabatan' => 'Wali Nagari',
                'icon' => 'fa-star',
                'color' => '#0D2247',
                'bg' => '#0D2247',
                'tugas' => [
                    'Memimpin penyelenggaraan pemerintahan nagari sehari-hari',
                    'Mewakili nagari dalam urusan hukum dan hubungan kelembagaan',
                    'Menetapkan kebijakan strategis untuk pembangunan dan kesejahteraan warga',
                    'Mengkoordinasikan seluruh perangkat nagari agar pelayanan berjalan lancar',
                    'Menyampaikan laporan pertanggungjawaban kepada Badan Permusyawaratan Nagari',
                ],
                'singkat' => 'Kepala pemerintahan nagari yang bertanggung jawab atas seluruh jalannya roda pemerintahan.',
            ],
            [
                'jabatan' => 'Sekretaris Nagari',
                'icon' => 'fa-file-alt',
                'color' => '#1a3a5c',
                'bg' => '#1a3a5c',
                'tugas' => [
                    'Membantu Wali Nagari dalam bidang administrasi pemerintahan',
                    'Menyiapkan rancangan peraturan dan keputusan nagari',
                    'Mengelola arsip, surat-menyurat, dan dokumen nagari',
                    'Mengkoordinasikan kaur (kepala urusan) dan kasi (kepala seksi)',
                    'Menyusun laporan keuangan dan perencanaan nagari',
                ],
                'singkat' => 'Tangan kanan Wali Nagari yang mengelola semua urusan administrasi dan koordinasi antar seksi.',
            ],
            [
                'jabatan' => 'Kaur Keuangan',
                'icon' => 'fa-coins',
                'color' => '#c8973a',
                'bg' => '#c8973a',
                'tugas' => [
                    'Mengelola keuangan nagari — penerimaan dan pengeluaran',
                    'Membukukan seluruh transaksi keuangan secara transparan',
                    'Menyiapkan laporan keuangan dan SPJ (Surat Pertanggungjawaban)',
                    'Memastikan penggunaan dana nagari sesuai dengan APBNag yang telah disahkan',
                    'Berkoordinasi dengan pendamping desa dan Dinas PMD untuk pelaporan',
                ],
                'singkat' => 'Bertanggung jawab atas pengelolaan, pencatatan, dan pelaporan keuangan nagari secara transparan.',
            ],
            [
                'jabatan' => 'Kaur Perencanaan',
                'icon' => 'fa-drafting-compass',
                'color' => '#3a7d44',
                'bg' => '#3a7d44',
                'tugas' => [
                    'Menyusun Rencana Kerja Pemerintah Nagari (RKPNag) tahunan',
                    'Mengkoordinasikan proses musyawarah rencana pembangunan (musrenbang)',
                    'Memantau dan mengevaluasi realisasi program pembangunan',
                    'Menyiapkan data-data perencanaan untuk laporan nagari',
                    'Mengkoordinasikan dengan BPN dalam penetapan prioritas pembangunan',
                ],
                'singkat' => 'Menyiapkan dan mengkoordinasikan rencana kerja dan pembangunan nagari bersama warga.',
            ],
            [
                'jabatan' => 'Kasi Pemerintahan',
                'icon' => 'fa-landmark',
                'color' => '#8b3a2a',
                'bg' => '#8b3a2a',
                'tugas' => [
                    'Melayani urusan administrasi kependudukan (KK, KTP, surat domisili)',
                    'Mengelola data kependudukan dan perubahan administrasi warga',
                    'Membantu proses pembuatan surat-surat resmi nagari',
                    'Mengkoordinasikan kegiatan pemilihan nagari dan kelembagaan',
                    'Menjaga ketertiban dan keamanan lingkungan nagari',
                ],
                'singkat' => 'Melayani urusan administrasi kependudukan dan pemerintahan sehari-hari untuk warga.',
            ],
            [
                'jabatan' => 'Kasi Pelayanan',
                'icon' => 'fa-hands-helping',
                'color' => '#0D2247',
                'bg' => '#0D2247',
                'tugas' => [
                    'Mengelola dan meningkatkan kualitas layanan publik kepada warga',
                    'Memfasilitasi kegiatan sosial, budaya, dan keagamaan nagari',
                    'Menangani permohonan surat dan layanan administrasi warga',
                    'Mengkoordinasikan layanan mandiri dan sistem digital nagari',
                    'Menerima pengaduan masyarakat dan menindaklanjutinya',
                ],
                'singkat' => 'Memastikan warga mendapat pelayanan terbaik, baik secara langsung maupun digital.',
            ],
            [
                'jabatan' => 'Kasi Kesejahteraan',
                'icon' => 'fa-heart',
                'color' => '#1a5c52',
                'bg' => '#1a5c52',
                'tugas' => [
                    'Mengkoordinasikan program kesejahteraan sosial (PKH, BPNT, bantuan lainnya)',
                    'Memantau kondisi warga kurang mampu dan mengusulkan bantuan',
                    'Mengkoordinasikan kegiatan posyandu, kesehatan, dan pendidikan',
                    'Memberdayakan kelompok masyarakat (PKK, karang taruna, dll)',
                    'Memfasilitasi kegiatan ekonomi produktif warga nagari',
                ],
                'singkat' => 'Memastikan program kesejahteraan dan pemberdayaan masyarakat berjalan efektif dan tepat sasaran.',
            ],
            [
                'jabatan' => 'Kepala Jorong',
                'icon' => 'fa-map-marker-alt',
                'color' => '#c8973a',
                'bg' => '#c8973a',
                'tugas' => [
                    'Memimpin penyelenggaraan pemerintahan di tingkat jorong',
                    'Menjadi jembatan komunikasi antara warga jorong dan pemerintah nagari',
                    'Mengelola administrasi warga di wilayah jorong',
                    'Memfasilitasi musyawarah dan penyelesaian masalah di jorong',
                    'Melaporkan kondisi wilayah dan kebutuhan warga kepada nagari',
                ],
                'singkat' => 'Pemimpin pemerintahan tingkat jorong yang menjadi ujung tombak layanan paling dekat dengan warga.',
            ],
        ];
    ?>

    <div class="space-y-6">
        <?php $__currentLoopData = $tugas_jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="tugas-card">
            <div class="grid grid-cols-1 md:grid-cols-4">
                
                <div class="p-7 flex flex-col items-center justify-center text-center" style="background: <?php echo e($item['bg']); ?>11; border-right: 1.5px solid <?php echo e($item['color']); ?>22;">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-white text-xl mb-4 shadow-lg" style="background: <?php echo e($item['color']); ?>;">
                        <i class="fas <?php echo e($item['icon']); ?>"></i>
                    </div>
                    <h3 class="font-jakarta font-extrabold text-sm text-center leading-tight" style="color: <?php echo e($item['color']); ?>;"><?php echo e($item['jabatan']); ?></h3>
                    <p class="text-gray-500 text-xs mt-3 leading-relaxed font-jakarta"><?php echo e($item['singkat']); ?></p>
                </div>
                
                
                <div class="md:col-span-3 p-7">
                    <p class="text-xs font-jakarta font-bold uppercase tracking-widest text-gray-400 mb-4">Tugas & Tanggung Jawab</p>
                    <ul class="space-y-3">
                        <?php $__currentLoopData = $item['tugas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-lg flex-shrink-0 flex items-center justify-center mt-0.5" style="background: <?php echo e($item['color']); ?>18;">
                                <i class="fas fa-check text-[9px]" style="color: <?php echo e($item['color']); ?>;"></i>
                            </div>
                            <span class="text-gray-700 text-sm leading-relaxed font-jakarta"><?php echo e($t); ?></span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="mt-12 bg-[#0D2247]/5 border border-[#0D2247]/10 rounded-3xl p-8 text-center">
        <i class="fas fa-info-circle text-[#0D2247] text-2xl mb-4 block"></i>
        <p class="text-gray-600 text-sm font-jakarta leading-relaxed max-w-lg mx-auto">
            Tugas dan fungsi jabatan mengacu pada <strong>Peraturan Pemerintah No. 43 Tahun 2014</strong> dan Peraturan Nagari yang berlaku. 
            Seluruh perangkat berkomitmen melayani warga dengan sepenuh hati.
        </p>
    </div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/pemerintah/tugas_fungsi.blade.php ENDPATH**/ ?>