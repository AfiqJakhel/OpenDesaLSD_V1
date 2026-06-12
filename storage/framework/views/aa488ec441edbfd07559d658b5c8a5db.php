<?php
    $post = $single_artikel;
    $alt_slug = PREMIUM ? 'artikel' : 'first';
?>
<?php echo $__env->make('theme::commons.asset_highcharts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    .article-content { font-family: 'Plus Jakarta Sans', sans-serif; line-height: 1.8; color: #334155; }
    .article-content p { margin-bottom: 1.5rem; }
    .article-content h1, .article-content h2, .article-content h3 { color: #0D2247; font-weight: 800; margin-top: 2rem; margin-bottom: 1rem; }
    .article-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; }
    .article-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1.5rem; }
    .article-content a { color: #2563eb; text-decoration: none; font-weight: 600; }
    .article-content a:hover { text-decoration: underline; }
    .article-content img { border-radius: 1rem; margin: 2rem auto; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); max-width: 100%; height: auto; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($post): ?>
        
        <section class="relative bg-[#0D2247] text-white overflow-hidden py-16 md:py-20 font-jakarta">
            <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1585829365295-ab7cd400c167?w=1600&q=80'); background-size: cover; background-position: center;"></div>
            <div class="container mx-auto px-4 max-w-4xl relative z-10 text-center">
                
                <nav class="text-white/60 text-xs md:text-sm mb-6 flex justify-center items-center gap-2">
                    <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
                    <i class="fas fa-chevron-right text-[8px]"></i>
                    <?php if($post['kategori']): ?>
                        <a href="<?php echo e(site_url("{$alt_slug}/kategori/{$post['kat_slug']}")); ?>" class="hover:text-white transition"><?php echo e($post['kategori']); ?></a>
                    <?php else: ?>
                        <span class="text-white">Artikel</span>
                    <?php endif; ?>
                </nav>
                
                
                <?php if($post['kategori']): ?>
                    <span class="inline-block bg-accent text-white font-bold tracking-widest text-[10px] md:text-xs uppercase px-4 py-1.5 rounded-full mb-4 shadow-lg"><?php echo e($post['kategori']); ?></span>
                <?php endif; ?>
                
                
                <h1 class="font-extrabold text-3xl md:text-5xl lg:text-5xl leading-tight md:leading-tight mb-6 drop-shadow-lg"><?php echo e($post['judul']); ?></h1>
                
                
                <div class="flex flex-wrap justify-center items-center gap-4 text-xs md:text-sm text-white/80 font-medium">
                    <span class="flex items-center gap-1.5"><div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-white"><i class="fas fa-user text-[10px]"></i></div> <?php echo e($post['owner']); ?></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-white/30"></span>
                    <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt"></i> <?php echo e($post['tgl_upload_local']); ?></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-white/30"></span>
                    <span class="flex items-center gap-1.5"><i class="far fa-eye"></i> Dibaca <?php echo e(hit($post['hit'])); ?> kali</span>
                </div>
            </div>
            
            <div class="absolute bottom-0 left-0 right-0">
                <svg viewBox="0 0 1440 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
                    <path d="M0 36L0 18Q720 0 1440 18L1440 36Z" fill="#ffffff"/>
                </svg>
            </div>
        </section>

        
        <section class="bg-white py-12 pb-24 font-jakarta">
            <div class="container mx-auto px-4 max-w-4xl">
                
                
                <?php if($post['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar'])): ?>
                    <div class="mb-10 -mt-20 relative z-20">
                        <a href="<?php echo e(base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar'])); ?>" data-fancybox="images" class="block rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                            <img src="<?php echo e(base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar'])); ?>" alt="<?php echo e($post['judul']); ?>" class="w-full h-auto object-cover hover:scale-105 transition duration-700">
                        </a>
                    </div>
                <?php endif; ?>
                
                
                <article class="article-content text-lg mb-12">
                    <?php echo $post['isi']; ?>

                </article>

                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 my-8">
                    <?php for($i = 1; $i <= 3; $i++): ?>
                        <?php if($post['gambar' . $i] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar' . $i])): ?>
                            <a href="<?php echo e(base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar' . $i])); ?>" data-fancybox="images" class="block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition">
                                <img src="<?php echo e(base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar' . $i])); ?>" alt="<?php echo e($post['judul']); ?>" class="w-full h-40 object-cover hover:scale-110 transition duration-500">
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                
                <?php if($post['dokumen']): ?>
                    <?php 
                        $is_pdf = strtolower(pathinfo($post['dokumen'], PATHINFO_EXTENSION)) == 'pdf';
                        $doc_url = base_url(LOKASI_DOKUMEN . $post['dokumen']);
                    ?>
                    
                    <?php if($is_pdf): ?>
                        <div class="mb-10 border border-gray-200 rounded-2xl overflow-hidden shadow-lg bg-white">
                            <div class="bg-gray-50 px-5 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-3">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-sm">Pratinjau Dokumen</h4>
                                        <p class="text-xs text-gray-500 truncate max-w-xs"><?php echo e($post['dokumen']); ?></p>
                                    </div>
                                </div>
                                <a href="<?php echo e(site_url('first/unduh_dokumen_artikel/' . $post['id'])); ?>" class="w-full sm:w-auto text-center bg-blue-600 text-white font-bold px-5 py-2 rounded-xl hover:bg-blue-700 transition shadow text-sm">
                                    <i class="fas fa-download mr-1.5"></i> Unduh PDF
                                </a>
                            </div>
                            
                            <div class="w-full bg-gray-100 flex justify-center" style="height: 75vh; min-height: 500px;">
                                <iframe src="<?php echo e($doc_url); ?>" width="100%" height="100%" style="border: none;">
                                    Browser Anda tidak mendukung iframe PDF. <a href="<?php echo e($doc_url); ?>">Unduh PDF</a>
                                </iframe>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 mb-10 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center text-xl flex-shrink-0 shadow-md">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Dokumen Lampiran</h4>
                                    <p class="text-xs text-gray-500 truncate max-w-xs"><?php echo e($post['dokumen']); ?></p>
                                </div>
                            </div>
                            <a href="<?php echo e(site_url('first/unduh_dokumen_artikel/' . $post['id'])); ?>" class="w-full sm:w-auto text-center bg-blue-600 text-white font-bold px-6 py-2.5 rounded-xl hover:bg-blue-700 transition shadow hover:shadow-lg text-sm">
                                <i class="fas fa-download mr-2"></i> Unduh Dokumen
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                
                <div class="border-t border-gray-100 pt-8">
                    <?php echo $__env->make('theme::commons.share', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="mt-12">
                        <?php echo $__env->make('theme::partials.artikel.comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

            </div>
        </section>
    <?php else: ?>
        <div class="py-24">
            <?php echo $__env->make('theme::commons.404', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme::layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/artikel/detail.blade.php ENDPATH**/ ?>