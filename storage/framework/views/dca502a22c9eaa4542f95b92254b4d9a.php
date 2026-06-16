<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
/* ─── Base ─── */
.font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

/* ─── Org Chart Wrapper ─── */
.org-wrap { overflow-x: auto; padding: 2rem 1rem 3rem; }
.org-tree { display:flex; flex-direction:column; align-items:center; gap:0; min-width:900px; }

/* ─── Node ─── */
.node {
    display:flex; flex-direction:column; align-items:center;
    padding:.7rem 1rem; border-radius:.75rem; border:2px solid;
    text-align:center; transition:transform .2s,box-shadow .2s;
    cursor:default; min-width:120px; max-width:155px;
}
.node:hover { transform:translateY(-3px); box-shadow:0 12px 28px -6px rgba(0,0,0,.18); }
.node-title { font-size:9px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; margin-bottom:5px; line-height:1.3; }
.node-name  { font-size:10.5px; font-weight:600; line-height:1.35; }
.node-sub   { font-size:9px; font-weight:400; margin-top:3px; opacity:.7; }

.node-wali    { background:#0D2247; border-color:#0D2247; color:white; }
.node-advisory{ background:#c8973a; border-color:#b0802e; color:white; }
.node-sekdes  { background:#1a5c52; border-color:#144a42; color:white; }
.node-kasi    { background:white; border-color:#0D2247; color:#0D2247; box-shadow:0 4px 16px -4px rgba(13,34,71,.12); }
.node-kaur    { background:white; border-color:#3a7d44; color:#3a7d44; box-shadow:0 4px 16px -4px rgba(58,125,68,.12); }
.node-staf    { background:#f9fafb; border-color:#d1d5db; color:#374151; font-style:italic; }
.node-jorong  { background:white; border-color:#7c3d8f; color:#7c3d8f; box-shadow:0 4px 16px -4px rgba(124,61,143,.12); }

.v-line { width:2px; background:#cbd5e1; margin:0 auto; }
.org-col { display:flex; flex-direction:column; align-items:center; }
.legend-dot { width:12px; height:12px; border-radius:3px; flex-shrink:0; }

/* ─── Print Modal Overlay ─── */
.print-modal {
    display:none; position:fixed; inset:0; background:rgba(0,0,0,.55);
    z-index:9999; align-items:center; justify-content:center;
}
.print-modal.open { display:flex; }
.print-box {
    background:white; border-radius:1.5rem; width:96vw; max-width:1100px;
    max-height:92vh; overflow:auto; padding:2rem;
    box-shadow:0 40px 80px -20px rgba(0,0,0,.4);
    font-family:'Plus Jakarta Sans',sans-serif;
}

/* ─── PRINT MEDIA ─── */
@media print {
    /* Sembunyikan semua kecuali #print-area */
    body > *:not(#print-root) { display:none !important; }
    #print-root { display:block !important; }

    /* Reset ukuran kertas */
    @page {
        size: A4 landscape;
        margin: 10mm 8mm;
    }

    body, html { margin:0; padding:0; }

    #print-root {
        width:100%; font-family:'Plus Jakarta Sans',sans-serif;
    }
    #print-root .print-header {
        text-align:center; margin-bottom:14px;
        border-bottom:2px solid #0D2247; padding-bottom:10px;
    }
    #print-root .print-header h1 { font-size:14pt; font-weight:800; color:#0D2247; margin:0; }
    #print-root .print-header p  { font-size:9pt; color:#555; margin:3px 0 0; }

    /* Paksa org-tree muat di kertas */
    #print-root .org-tree {
        min-width: 0 !important;
        transform-origin: top center;
        transform: scale(0.82);
    }
    #print-root .org-wrap { overflow:visible; padding:0; }
    #print-root .node { break-inside:avoid; }
    #print-root .no-print { display:none !important; }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div id="print-root" style="display:none;">
    <div class="print-header">
        <h1>Struktur Organisasi Pemerintah Nagari</h1>
        <p>Koto Tangah Batu Ampa · Kecamatan Akabiluru · Kabupaten Lima Puluh Kota · Provinsi Sumatera Barat</p>
    </div>
    
    <div id="print-chart-target"></div>
</div>


<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height:180px;">
    <div class="absolute inset-0 opacity-10" style="background:url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=1400') center/cover;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10 font-jakarta">
        <nav class="text-white/50 text-xs mb-3 flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <a href="<?php echo e(site_url('pemerintah')); ?>" class="hover:text-white transition">Pemerintahan</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <span class="text-white font-semibold">Struktur Organisasi</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[.2em] text-xs uppercase">Pemerintahan</span>
        <h1 class="font-extrabold text-3xl md:text-4xl mt-2 mb-2">Struktur Organisasi Nagari</h1>
        <p class="text-white/60 text-sm">Koto Tangah Batu Ampa · Kec. Akabiluru · Kab. Lima Puluh Kota</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 36L0 18Q720 0 1440 18L1440 36Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-white shadow-sm sticky top-[96px] z-40 border-b border-gray-100 font-jakarta no-print">
    <div class="container mx-auto px-4 max-w-7xl overflow-x-auto scrollbar-none">
        <div class="flex">
            <a href="<?php echo e(site_url('pemerintah')); ?>" style="display:inline-flex;align-items:center;gap:.45rem;padding:.7rem 1.4rem;font-size:.8rem;font-weight:600;color:#6b7280;border-bottom:3px solid transparent;white-space:nowrap;text-decoration:none;"><i class="fas fa-users text-[10px]"></i> Aparatur Nagari</a>
            <a href="<?php echo e(site_url('struktur-organisasi-dan-tata-kerja')); ?>" style="display:inline-flex;align-items:center;gap:.45rem;padding:.7rem 1.4rem;font-size:.8rem;font-weight:700;color:#0D2247;border-bottom:3px solid #c8973a;white-space:nowrap;text-decoration:none;"><i class="fas fa-sitemap text-[10px]"></i> Struktur Organisasi</a>
            <a href="<?php echo e(site_url('pemerintah/tugas-fungsi')); ?>" style="display:inline-flex;align-items:center;gap:.45rem;padding:.7rem 1.4rem;font-size:.8rem;font-weight:600;color:#6b7280;border-bottom:3px solid transparent;white-space:nowrap;text-decoration:none;"><i class="fas fa-tasks text-[10px]"></i> Tugas &amp; Fungsi</a>
            <a href="<?php echo e(site_url('pemerintah/regulasi')); ?>" style="display:inline-flex;align-items:center;gap:.45rem;padding:.7rem 1.4rem;font-size:.8rem;font-weight:600;color:#6b7280;border-bottom:3px solid transparent;white-space:nowrap;text-decoration:none;"><i class="fas fa-gavel text-[10px]"></i> Regulasi</a>
            <a href="<?php echo e(site_url('pemerintah/transparansi')); ?>" style="display:inline-flex;align-items:center;gap:.45rem;padding:.7rem 1.4rem;font-size:.8rem;font-weight:600;color:#6b7280;border-bottom:3px solid transparent;white-space:nowrap;text-decoration:none;"><i class="fas fa-chart-pie text-[10px]"></i> Transparansi</a>
        </div>
    </div>
</div>

<div class="bg-gray-50 min-h-screen py-12">
<div class="container mx-auto px-4 max-w-7xl font-jakarta">
    
    
    <div class="org-wrap bg-white rounded-3xl shadow-lg border border-gray-100 p-6 text-center">
    <div id="sotk-chart-inner">
        <!-- GAMBAR SOTK DARI USER -->
        <img src="<?php echo e(base_url('assets/images/sotk-nagari.png')); ?>" alt="Struktur Organisasi Nagari" class="mx-auto w-full max-w-5xl rounded-xl shadow-sm border border-gray-200">
    </div>

    
    <div class="text-center mt-8 no-print">
        <button onclick="printSOTK()" class="inline-flex items-center gap-2 bg-[#0D2247] text-white px-6 py-3 rounded-xl font-bold text-sm hover:bg-[#162e5c] transition shadow-md">
            <i class="fas fa-print"></i> Cetak Struktur Organisasi
        </button>
        <p class="text-gray-400 text-xs mt-2">Dicetak dalam orientasi <strong>Landscape A4</strong></p>
    </div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function printSOTK() {
    // Ambil konten chart
    var chartHTML = document.getElementById('sotk-chart-inner').innerHTML;

    // Pastikan path gambar menjadi absolute URL agar tidak hilang saat print
    chartHTML = chartHTML.replace(
        /src="([^"]+)"/g,
        function(_, src){ 
            if(src.startsWith('http')) return 'src="' + src + '"';
            return 'src="<?php echo e(base_url()); ?>' + src.replace(/^\/+/, '') + '"'; 
        }
    );

    // Buka jendela baru
    var w = window.open('', '_blank', 'width=1200,height=800');
    w.document.write(`<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Struktur Organisasi Nagari Koto Tangah Batu Ampa</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
@page { size: A4 landscape; margin: 15mm 15mm; }
* { box-sizing: border-box; margin: 0; padding: 0; }
body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: white;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}

.print-header { text-align: center; padding-bottom: 10px; margin-bottom: 14px; border-bottom: 2.5px solid #0D2247; }
.print-header h1 { font-size: 16pt; font-weight: 800; color: #0D2247; margin-bottom: 3px; }
.print-header p { font-size: 10pt; color: #555; }

.org-tree-wrap { width: 100%; display: flex; justify-content: center; align-items: center; }
img { max-width: 100%; max-height: 135mm; width: auto; height: auto; object-fit: contain; border-radius: 8px; }

/* Footer */
.print-footer {
    text-align: center; margin-top: 14px; font-size: 9pt; color: #777;
    border-top: 1px solid #e5e7eb; padding-top: 8px;
}
</style>
</head>
<body>
<div class="print-header">
    <h1>Struktur Organisasi Pemerintah Nagari</h1>
    <p>Koto Tangah Batu Ampa &bull; Kecamatan Akabiluru &bull; Kabupaten Lima Puluh Kota &bull; Provinsi Sumatera Barat</p>
</div>

<div class="org-tree-wrap">
    ${chartHTML}
</div>

<div class="print-footer">
    Dicetak pada: ${new Date().toLocaleDateString('id-ID')} &bull; Nagari Koto Tangah Batu Ampa
</div>

<script>
    // Auto print setelah gambar dan layout siap
    window.onload = function() {
        setTimeout(function() { window.print(); window.close(); }, 800);
    };
<\/script>
</body>
</html>`);
    w.document.close();
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/sotk/index.blade.php ENDPATH**/ ?>