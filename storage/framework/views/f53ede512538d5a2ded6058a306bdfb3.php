<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

    /* Masonry Grid */
    .masonry-grid { columns: 1; column-gap: 1rem; }
    @media (min-width: 640px)  { .masonry-grid { columns: 2; } }
    @media (min-width: 1024px) { .masonry-grid { columns: 3; } }
    @media (min-width: 1280px) { .masonry-grid { columns: 4; } }
    .masonry-item { break-inside: avoid; margin-bottom: 1rem; display: block; }

    /* Album Card */
    .album-card { position: relative; border-radius: 1.25rem; overflow: hidden; cursor: pointer;
        background: #0D2247; box-shadow: 0 4px 16px -4px rgba(0,0,0,.15);
        transition: transform .3s, box-shadow .3s; display: block; }
    .album-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px -8px rgba(0,0,0,.25); }
    .album-card img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .6s; }
    .album-card:hover img { transform: scale(1.06); }
    .album-overlay { position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(13,34,71,.88) 0%, rgba(13,34,71,.2) 55%, transparent 100%);
        display: flex; flex-direction: column; justify-content: flex-end; padding: 1.25rem; }
    .album-overlay-hover { position: absolute; inset: 0;
        background: rgba(13,34,71,.5); opacity: 0; transition: opacity .3s;
        display: flex; align-items: center; justify-content: center; }
    .album-card:hover .album-overlay-hover { opacity: 1; }

    /* Photo Card */
    .photo-card { position: relative; border-radius: 1rem; overflow: hidden;
        cursor: pointer; box-shadow: 0 4px 12px -4px rgba(0,0,0,.12);
        transition: transform .3s, box-shadow .3s; display: block; }
    .photo-card:hover { transform: translateY(-3px); box-shadow: 0 16px 32px -8px rgba(0,0,0,.22); }
    .photo-card img { width: 100%; display: block; transition: transform .5s; }
    .photo-card:hover img { transform: scale(1.07); }
    .photo-overlay { position: absolute; inset: 0;
        background: rgba(13,34,71,.6); opacity: 0; transition: opacity .3s;
        display: flex; align-items: center; justify-content: center; }
    .photo-card:hover .photo-overlay { opacity: 1; }

    /* No-image Album Placeholder */
    .album-no-img { width: 100%; height: 100%; background: linear-gradient(135deg,#0D2247 0%,#1a3a6e 100%);
        display: flex; align-items: center; justify-content: center; }

    /* Custom Lightbox */
    #lightbox-overlay {
        display: none;
        position: fixed; inset: 0; z-index: 9999;
        background: rgba(0,0,0,0.92);
        align-items: center; justify-content: center;
        flex-direction: column;
    }
    #lightbox-overlay.active { display: flex; }
    #lightbox-overlay img {
        max-width: 96vw;
        max-height: 92vh;
        width: auto;
        height: auto;
        object-fit: contain;
        border-radius: .5rem;
        box-shadow: 0 32px 80px rgba(0,0,0,.8);
    }
    #lightbox-caption {
        color: rgba(255,255,255,.8);
        font-size: .9rem;
        margin-top: .75rem;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    #lightbox-close {
        position: fixed; top: 1.25rem; right: 1.5rem;
        width: 2.5rem; height: 2.5rem;
        background: rgba(255,255,255,.12);
        border: none; border-radius: 50%;
        color: white; font-size: 1.25rem;
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: background .2s;
    }
    #lightbox-close:hover { background: rgba(255,255,255,.25); }
    #lightbox-prev, #lightbox-next {
        position: fixed; top: 50%; transform: translateY(-50%);
        width: 3rem; height: 3rem;
        background: rgba(255,255,255,.12);
        border: none; border-radius: 50%;
        color: white; font-size: 1.2rem;
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: background .2s;
    }
    #lightbox-prev { left: 1rem; }
    #lightbox-next { right: 1rem; }
    #lightbox-prev:hover, #lightbox-next:hover { background: rgba(255,255,255,.25); }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden font-jakarta" style="min-height:220px;">
    <div class="absolute inset-0 opacity-10"
         style="background-image:url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1600&q=70');background-size:cover;background-position:center;">
    </div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10">
        
        <nav class="flex items-center gap-2 text-xs mb-5">
            <a href="<?php echo e(site_url('/')); ?>" class="text-white/60 hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px] text-white/30"></i>
            <?php if(isset($parent)): ?>
                <a href="<?php echo e(site_url('galeri')); ?>" class="text-white/60 hover:text-white transition">Galeri</a>
                <i class="fas fa-chevron-right text-[8px] text-white/30"></i>
                <span class="text-white font-semibold"><?php echo e($title); ?></span>
            <?php else: ?>
                <span class="text-white font-semibold">Galeri</span>
            <?php endif; ?>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <?php if(isset($parent)): ?>
                    <div class="flex items-center gap-3 mb-2">
                        <a href="<?php echo e(site_url('galeri')); ?>"
                           class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition">
                            <i class="fas fa-arrow-left text-sm"></i>
                        </a>
                        <span class="text-amber-400 font-bold tracking-widest text-[10px] uppercase">Album</span>
                    </div>
                    <h1 class="text-4xl font-extrabold drop-shadow-md"><?php echo e($title); ?></h1>
                    <?php if(isset($photos)): ?>
                        <p class="text-white/60 text-sm mt-2"><?php echo e($photos->count()); ?> foto dalam album ini</p>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="text-amber-400 font-bold tracking-widest text-[10px] uppercase block mb-2">Dokumentasi Nagari</span>
                    <h1 class="text-4xl font-extrabold drop-shadow-md">Galeri & Album</h1>
                    <?php if(isset($albums)): ?>
                        <p class="text-white/60 text-sm mt-2"><?php echo e($albums->count()); ?> album tersedia</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 36L0 18Q720 0 1440 18L1440 36Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-gray-50 min-h-screen font-jakarta">
<div class="container mx-auto px-4 max-w-7xl py-10">

    <?php if(isset($parent)): ?>
        
        <?php if(isset($photos) && $photos->count() > 0): ?>
            <div class="masonry-grid">
                <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="masonry-item">
                        <a class="photo-card block"
                           onclick="openLightbox(<?php echo e($loop->index); ?>, event)"
                           data-index="<?php echo e($loop->index); ?>"
                           data-src="<?php echo e($foto->photo_url); ?>"
                           data-caption="<?php echo e($foto->nama ?? ''); ?>">
                            <img src="<?php echo e($foto->photo_url); ?>"
                                 alt="<?php echo e($foto->nama ?? 'Foto Galeri'); ?>"
                                 loading="lazy"
                                 onerror="this.closest('.masonry-item').style.display='none'">
                            <div class="photo-overlay">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                    <i class="fas fa-search-plus text-white text-lg"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-24">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-images text-4xl text-gray-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">Album Masih Kosong</h3>
                <p class="text-gray-400 text-sm max-w-xs mx-auto">Belum ada foto dalam album ini. Silakan unggah melalui panel admin.</p>
                <a href="<?php echo e(site_url('galeri')); ?>" class="inline-flex items-center gap-2 mt-8 text-primary font-bold hover:underline">
                    <i class="fas fa-arrow-left"></i> Kembali ke Galeri
                </a>
            </div>
        <?php endif; ?>

    <?php else: ?>
        
        <?php if(isset($albums) && $albums->count() > 0): ?>
            <div class="masonry-grid">
                <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $heights = [220, 280, 240, 200, 260, 220, 240, 200];
                        $h = $heights[$idx % count($heights)];
                    ?>
                    <div class="masonry-item">
                        <a href="<?php echo e($album->detail_url); ?>" class="album-card block" style="height:<?php echo e($h); ?>px;" title="<?php echo e($album->nama); ?>">
                            <?php if($album->thumb_url): ?>
                                <img src="<?php echo e($album->thumb_url); ?>"
                                     alt="<?php echo e($album->nama); ?>"
                                     style="height:<?php echo e($h); ?>px;"
                                     loading="lazy"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="album-no-img" style="display:none; height:<?php echo e($h); ?>px;">
                                    <i class="fas fa-images text-white/30 text-5xl"></i>
                                </div>
                            <?php else: ?>
                                <div class="album-no-img" style="height:<?php echo e($h); ?>px;">
                                    <i class="fas fa-images text-white/30 text-5xl"></i>
                                </div>
                            <?php endif; ?>

                            <div class="album-overlay">
                                <div class="text-white font-bold text-sm leading-tight mb-1 truncate"><?php echo e($album->nama); ?></div>
                                <div class="flex items-center gap-2 text-white/70 text-[11px]">
                                    <i class="fas fa-images text-amber-400"></i>
                                    <span><?php echo e($album->children->count()); ?> foto</span>
                                    <i class="fas fa-arrow-right text-xs ml-auto"></i>
                                </div>
                            </div>

                            <div class="album-overlay-hover">
                                <div class="text-center">
                                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="fas fa-folder-open text-white text-xl"></i>
                                    </div>
                                    <span class="text-white font-semibold text-sm">Buka Album</span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-24">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-images text-4xl text-gray-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Album</h3>
                <p class="text-gray-400 text-sm max-w-xs mx-auto">Belum ada album galeri yang dipublikasikan.</p>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</div>
</div>


<div id="lightbox-overlay" onclick="closeLightboxOnBg(event)">
    <button id="lightbox-close" onclick="closeLightbox()" title="Tutup">&times;</button>
    <button id="lightbox-prev" onclick="changeLightbox(-1)" title="Sebelumnya">&#8249;</button>
    <img id="lightbox-img" src="" alt="">
    <div id="lightbox-caption"></div>
    <button id="lightbox-next" onclick="changeLightbox(1)" title="Berikutnya">&#8250;</button>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Data semua foto untuk navigasi lightbox
    const lightboxPhotos = [
        <?php if(isset($photos) && $photos->count() > 0): ?>
            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            { src: '<?php echo e(addslashes($foto->photo_url)); ?>', caption: '<?php echo e(addslashes($foto->nama ?? '')); ?>' },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    ];

    let currentLightboxIdx = 0;

    function openLightbox(idx, event) {
        if (event) event.preventDefault();
        currentLightboxIdx = idx;
        showLightboxPhoto(idx);
        document.getElementById('lightbox-overlay').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function showLightboxPhoto(idx) {
        const photo = lightboxPhotos[idx];
        if (!photo) return;
        const imgEl = document.getElementById('lightbox-img');
        const capEl = document.getElementById('lightbox-caption');
        imgEl.src = '';
        imgEl.src = photo.src;
        capEl.textContent = photo.caption;
        // Sembunyikan tombol navigasi jika hanya 1 foto
        document.getElementById('lightbox-prev').style.display = lightboxPhotos.length <= 1 ? 'none' : 'flex';
        document.getElementById('lightbox-next').style.display = lightboxPhotos.length <= 1 ? 'none' : 'flex';
    }

    function closeLightbox() {
        document.getElementById('lightbox-overlay').classList.remove('active');
        document.body.style.overflow = '';
    }

    function closeLightboxOnBg(event) {
        if (event.target.id === 'lightbox-overlay') closeLightbox();
    }

    function changeLightbox(dir) {
        currentLightboxIdx = (currentLightboxIdx + dir + lightboxPhotos.length) % lightboxPhotos.length;
        showLightboxPhoto(currentLightboxIdx);
    }

    // Tutup dengan tombol Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') changeLightbox(-1);
        if (e.key === 'ArrowRight') changeLightbox(1);
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/galeri/index.blade.php ENDPATH**/ ?>