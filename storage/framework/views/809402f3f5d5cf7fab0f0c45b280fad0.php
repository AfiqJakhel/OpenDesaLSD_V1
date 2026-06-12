

<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    .lembaga-card {
        background: white; border-radius: 1.5rem; overflow: hidden;
        border: 1.5px solid #f3f4f6;
        box-shadow: 0 4px 16px -4px rgba(0,0,0,0.07);
        transition: all 0.3s;
    }
    .lembaga-card:hover { transform: translateY(-4px); box-shadow: 0 16px 32px -8px rgba(0,0,0,0.14); }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 280px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <a href="<?php echo e(site_url('pemerintah')); ?>" class="hover:text-white transition">Pemerintahan</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">Lembaga Desa</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Pemerintahan</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">Lembaga Desa</h1>
        <p class="text-white/70 max-w-xl font-jakarta">Daftar lembaga kemasyarakatan yang aktif di Nagari Koto Tangah Batu Ampa.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-gray-50 min-h-screen py-16">
<div class="container mx-auto px-4 max-w-7xl">

    <?php if(isset($lembaga) && $lembaga->count() > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $lembaga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="lembaga-card group">
                <div class="h-48 overflow-hidden bg-gradient-to-br from-[#0D2247] to-[#1a3a5c] relative">
                    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=800&q=80'); background-size: cover; background-position: center;"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i class="fas fa-university text-white text-3xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <span class="inline-block text-[11px] font-bold uppercase tracking-widest text-white bg-[#c8973a] px-3 py-1.5 rounded-full mb-3 font-jakarta">
                        <?php echo e($item->kelompokMaster->kelompok ?? 'Lembaga'); ?>

                    </span>
                    <h3 class="font-jakarta font-bold text-gray-800 text-lg mb-2"><?php echo e($item->nama); ?></h3>
                    
                    <?php if($item->ketua): ?>
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-100">
                            <div class="w-10 h-10 bg-[#0D2247]/5 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-[#0D2247] text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-jakarta">Ketua</p>
                                <p class="font-jakarta font-bold text-sm text-gray-800"><?php echo e($item->ketua->nama); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="space-y-2 text-sm text-gray-600 mb-4">
                        <?php if($item->keterangan): ?>
                            <p class="line-clamp-2"><?php echo e($item->keterangan); ?></p>
                        <?php endif; ?>
                    </div>

                    <a href="<?php echo e(site_url('data-lembaga/' . $item->slug)); ?>" class="inline-flex items-center gap-2 text-[#0D2247] font-jakarta font-bold text-sm hover:gap-3 transition-all">
                        Lihat Detail <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-3xl p-4 md:p-8 text-center border border-gray-100 shadow-md">
            <?php echo $__env->make('theme::partials.empty_state', [
                'title'       => 'Lembaga Desa',
                'description' => 'Data lembaga kemasyarakatan belum tersedia. Silakan hubungi operator nagari untuk informasi lebih lanjut.',
                'icon'        => 'fa-university',
                'back_url'    => site_url('pemerintah'),
                'back_label'  => 'Kembali ke Pemerintahan'
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/lembaga/index.blade.php ENDPATH**/ ?>