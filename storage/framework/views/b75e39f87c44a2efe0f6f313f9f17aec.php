<?php
    $social_media = [
        'facebook' => ['color' => 'bg-blue-600', 'icon' => 'fa-facebook-f'],
        'twitter' => ['color' => 'bg-blue-400', 'icon' => 'fa-twitter'],
        'instagram' => ['color' => 'bg-pink-500', 'icon' => 'fa-instagram'],
        'telegram' => ['color' => 'bg-blue-500', 'icon' => 'fa-telegram'],
        'whatsapp' => ['color' => 'bg-green-500', 'icon' => 'fa-whatsapp'],
        'youtube' => ['color' => 'bg-red-500', 'icon' => 'fa-youtube'],
    ];

    foreach ($sosmed as $social) {
        if ($social['link']) {
            $social_media[strtolower($social['nama'])]['link'] = $social['link'];
        }
    }
?>

<footer class="bg-gradient-to-b from-[#0D1B2A] to-[#0a1420] text-white/70 mt-auto border-t border-white/5">
    <div class="w-full px-8 lg:px-16 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-10">
            <!-- Kolom Kiri: Logo & Info Desa -->
            <div class="space-y-6">
                <a href="<?php echo e(site_url('/')); ?>" class="inline-flex items-center gap-4 group">
                    <div class="w-14 h-14 bg-white/10 rounded-2xl p-2 group-hover:bg-white/15 transition-all duration-300 flex items-center justify-center">
                        <img src="<?php echo e(gambar_desa($desa['logo'])); ?>" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h2 class="text-white font-bold text-lg uppercase tracking-tight leading-tight"><?php echo e(setting('sebutan_desa')); ?> <?php echo e($desa['nama_desa']); ?></h2>
                        <p class="text-white/50 text-xs tracking-wide"><?php echo e($desa['nama_kabupaten']); ?></p>
                    </div>
                </a>
                
                <div class="space-y-3">
                    <div class="flex items-start gap-3 text-sm">
                        <div class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-map-marker-alt text-accent"></i>
                        </div>
                        <div>
                            <p class="text-white/80 leading-relaxed">Pauah Sangik, Jl. Raya Simpang Batu Hampar No.KM 1</p>
                            <p class="text-white/60 text-xs mt-1">Kec. Akabiluru, Sumatera Barat</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-semibold text-sm mb-3 uppercase tracking-wider">Navigasi Cepat</h3>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="<?php echo e(site_url('profil-desa')); ?>" class="text-xs text-white/60 hover:text-accent transition flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px]"></i> Profil Nagari
                        </a>
                        <a href="<?php echo e(site_url('pemerintahan')); ?>" class="text-xs text-white/60 hover:text-accent transition flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px]"></i> Pemerintahan
                        </a>
                        <a href="<?php echo e(site_url('layanan-mandiri')); ?>" class="hidden text-xs text-white/60 hover:text-accent transition flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px]"></i> Layanan Mandiri
                        </a>
                        <a href="<?php echo e(site_url('berita')); ?>" class="text-xs text-white/60 hover:text-accent transition flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px]"></i> Berita
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kolom Tengah: Kontak & Sosial Media -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-white font-semibold text-lg mb-4 uppercase tracking-wider flex items-center gap-2">
                        <div class="w-1 h-5 bg-accent rounded-full"></div>
                        Hubungi Kami
                    </h3>
                    
                    <div class="space-y-4">
                        <!-- Email -->
                        <a href="mailto:<?php echo e($desa['email_desa'] ?? ''); ?>" class="flex items-center gap-4 group">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent/20 to-accent/5 rounded-xl flex items-center justify-center group-hover:from-accent/30 group-hover:to-accent/10 transition-all duration-300">
                                <i class="fas fa-envelope text-accent text-lg"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-white/50 uppercase tracking-wider font-medium mb-0.5">Email</p>
                                <p class="text-sm text-white/90 group-hover:text-white transition"><?php echo e($desa['email_desa'] ?? 'kontak@desa.id'); ?></p>
                            </div>
                        </a>

                        <!-- Telepon -->
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500/20 to-blue-500/5 rounded-xl flex items-center justify-center">
                                <i class="fas fa-phone text-blue-400 text-lg"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-white/50 uppercase tracking-wider font-medium mb-0.5">Telepon</p>
                                <p class="text-sm text-white/90"><?php echo e($desa['telepon'] ?? '-'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-white font-semibold text-lg mb-4 uppercase tracking-wider">Media Sosial</h3>
                    <div class="flex flex-wrap gap-3">
                        <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($sm['link'])): ?>
                                <a href="<?php echo e($sm['link']); ?>" target="_blank" class="w-11 h-11 bg-white/5 hover:bg-accent rounded-xl flex items-center justify-center hover:text-white transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-accent/20 group">
                                    <i class="fab <?php echo e($sm['icon']); ?> text-base"></i>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Statistik Pengunjung -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-white font-semibold text-lg mb-4 uppercase tracking-wider flex items-center gap-2">
                        <div class="w-1 h-5 bg-accent rounded-full"></div>
                        Statistik Pengunjung
                    </h3>
                    
                    <div class="max-w-xs bg-gradient-to-br from-white/5 to-white/[0.02] backdrop-blur-sm rounded-xl p-3 border border-white/10 shadow-xl">
                        <div class="space-y-3">
                            <!-- Hari Ini -->
                            <div class="flex items-center justify-between pb-3 border-b border-white/10">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500/20 to-blue-500/5 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-calendar-day text-blue-400 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-white/50 uppercase tracking-wider font-medium">Hari Ini</p>
                                        <p class="text-lg font-bold text-white"><?php echo e(number_format($statistik_pengunjung['hari_ini'] ?? 0)); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Kemarin -->
                            <div class="flex items-center justify-between pb-3 border-b border-white/10">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500/20 to-purple-500/5 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-calendar-minus text-purple-400 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-white/50 uppercase tracking-wider font-medium">Kemarin</p>
                                        <p class="text-lg font-bold text-white"><?php echo e(number_format($statistik_pengunjung['kemarin'] ?? 0)); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 bg-gradient-to-br from-accent/30 to-accent/10 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-users text-accent text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-white/50 uppercase tracking-wider font-medium">Total</p>
                                        <p class="text-lg font-bold text-accent"><?php echo e(number_format($statistik_pengunjung['total'] ?? 0)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Bar -->
        <div class="pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xs text-white/40 text-center md:text-left">
                    &copy; <?php echo e(date('Y')); ?> <span class="text-white/60 font-semibold"><?php echo e(setting('sebutan_desa')); ?> <?php echo e($desa['nama_desa']); ?></span>. All rights reserved.
                </p>
                <div class="flex items-center gap-6 text-xs">
                    <a href="https://opensid.my.id" target="_blank" class="text-white/40 hover:text-accent transition flex items-center gap-2">
                        <i class="fas fa-code text-[10px]"></i>
                        <span>OpenSID <?php echo e(ambilVersi()); ?></span>
                    </a>
                    <?php if(setting('tte')): ?>
                        <img src="<?php echo e(asset('assets/images/bsre.png?v', false)); ?>" alt="BSRE" class="h-5 opacity-40 hover:opacity-100 transition" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php echo $__env->make('theme::commons.back_to_top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/commons/footer.blade.php ENDPATH**/ ?>