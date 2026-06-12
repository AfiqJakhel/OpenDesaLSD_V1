<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
.font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
.stat-card {
    background: white; border-radius: 1.25rem;
    padding: 1.5rem 1.75rem; border: 1.5px solid #f3f4f6;
    box-shadow: 0 4px 20px -4px rgba(0,0,0,.07);
    transition: all .25s;
}
.stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 28px -6px rgba(0,0,0,.12); }
.chart-card { background: white; border-radius: 1.25rem; border: 1.5px solid #f3f4f6; box-shadow: 0 4px 16px -4px rgba(0,0,0,.07); overflow: hidden; }
.chart-header { padding: 1.1rem 1.5rem; border-bottom: 1px solid #f3f4f6; display: flex; align-items: center; gap: .65rem; }
.bar-h { height: 9px; border-radius: 9999px; }

/* Tabel modern */
.tbl-modern { width: 100%; border-collapse: separate; border-spacing: 0; }
.tbl-modern thead th {
    background: #0D2247; color: white;
    padding: .7rem 1rem; font-size: .78rem; font-weight: 700;
    text-align: center; position: sticky; top: 0; z-index: 1;
}
.tbl-modern thead th:first-child { text-align: left; padding-left: 1.25rem; border-radius: .5rem 0 0 0; }
.tbl-modern thead th:last-child { border-radius: 0 .5rem 0 0; }
.tbl-modern tbody td { padding: .6rem 1rem; font-size: .82rem; border-bottom: 1px solid #f9fafb; text-align: center; }
.tbl-modern tbody td:first-child { text-align: left; padding-left: 1.25rem; }
.tbl-modern tbody tr:hover td { background: #f9fafb; }
.tbl-modern tfoot td {
    background: #0D224712; padding: .7rem 1rem;
    font-weight: 800; font-size: .82rem; text-align: center;
    border-top: 2px solid #0D224730;
}
.tbl-modern tfoot td:first-child { text-align: left; padding-left: 1.25rem; color: #0D2247; }

/* Level indent */
.row-level-1 td:first-child { padding-left: 2rem !important; }
.row-level-2 td:first-child { padding-left: 3.5rem !important; }
.row-level-1 { background: #f8fafc; }
.row-level-2 { background: #f0f5ff; }

/* Loading skeleton */
.skeleton { background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%); background-size: 200% 100%; animation: shimmer 1.5s infinite; border-radius: 6px; }
@keyframes shimmer { 0% { background-position: 200% 0; } 100% { background-position: -200% 0; } }

/* Summary pill */
.badge-lk { background: #dbeafe; color: #1d4ed8; }
.badge-pr { background: #fce7f3; color: #9d174d; }
.badge-total { background: #f0fdf4; color: #166534; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height:200px;">
    <div class="absolute inset-0" style="background:url('https://images.unsplash.com/photo-1524661135-423995f22d0b?w=1400&q=70') center/cover;opacity:.08;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10 font-jakarta">
        <nav class="flex items-center gap-2 text-white/50 text-xs mb-4">
            <a href="<?php echo e(site_url()); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">Data Wilayah</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[.2em] text-xs uppercase">
            <i class="fas fa-map-marked-alt mr-1"></i>Wilayah Administratif
        </span>
        <h1 class="font-extrabold text-4xl mt-2 mb-1">Data Wilayah</h1>
        <p class="text-white/60 text-sm">
            <?php echo e(identitas('nama_desa')); ?> &middot; Kec. <?php echo e(identitas('nama_kecamatan')); ?> &middot; Kab. <?php echo e(identitas('nama_kabupaten')); ?>

        </p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 36L0 18Q720 0 1440 18L1440 36Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

<div class="bg-gray-50 min-h-screen">
<div class="container mx-auto px-4 max-w-7xl py-10 space-y-8 font-jakarta">

    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4" id="summary-cards">
        
        <?php for($s = 0; $s < 4; $s++): ?>
        <div class="stat-card">
            <div class="skeleton h-3 w-24 mb-3"></div>
            <div class="skeleton h-9 w-20 mb-2"></div>
            <div class="skeleton h-3 w-16"></div>
        </div>
        <?php endfor; ?>
    </div>

    
    <div class="chart-card">
        <div class="chart-header justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-[#0D2247]/5 flex items-center justify-center">
                    <i class="fas fa-table text-[#0D2247] text-sm"></i>
                </div>
                <h2 class="font-bold text-[#0D2247] text-sm">Rekapitulasi Wilayah Administratif</h2>
            </div>
            <div id="tbl-loading" class="flex items-center gap-2 text-xs text-gray-400">
                <svg class="animate-spin h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
                Memuat data...
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="tbl-modern" id="tabelWilayah">
                <thead>
                    <tr>
                        <th class="text-left">Wilayah / Ketua</th>
                        <th>KK</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Total Jiwa</th>
                    </tr>
                </thead>
                <tbody id="tbody-wilayah">
                    <tr>
                        <td colspan="5" class="py-16 text-center">
                            <div class="flex flex-col items-center gap-3 text-gray-400">
                                <svg class="animate-spin h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                </svg>
                                <span class="text-sm">Memuat data wilayah...</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot id="tfoot-wilayah"></tfoot>
            </table>
        </div>
    </div>

    
    <div class="chart-card">
        <div class="chart-header">
            <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center">
                <i class="fas fa-info-circle text-indigo-500 text-sm"></i>
            </div>
            <h2 class="font-bold text-[#0D2247] text-sm">Keterangan Warna Level Wilayah</h2>
        </div>
        <div class="p-5 flex flex-wrap gap-4">
            <div class="flex items-center gap-2">
                <div class="w-5 h-5 rounded bg-white border-2 border-[#0D2247]"></div>
                <span class="text-sm text-gray-700 font-semibold">Jorong / Dusun (Level 1)</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-5 h-5 rounded bg-[#f8fafc] border-2 border-blue-200"></div>
                <span class="text-sm text-gray-700 font-semibold">RW (Level 2)</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-5 h-5 rounded bg-[#f0f5ff] border-2 border-indigo-200"></div>
                <span class="text-sm text-gray-700 font-semibold">RT (Level 3)</span>
            </div>
        </div>
    </div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const apiUrl = '<?php echo e(route('api.wilayah.administratif')); ?>';

    fetch(apiUrl)
        .then(r => r.json())
        .then(json => {
            renderData(json.data || []);
        })
        .catch(() => {
            document.getElementById('tbody-wilayah').innerHTML = `
                <tr><td colspan="5" class="py-12 text-center text-gray-400">
                    <i class="fas fa-exclamation-triangle text-2xl mb-2 block text-amber-400"></i>
                    Gagal memuat data wilayah.
                </td></tr>`;
            document.getElementById('tbl-loading').innerHTML = '';
        });

    function renderData(wilayah) {
        document.getElementById('tbl-loading').innerHTML = '';

        if (!wilayah.length) {
            document.getElementById('tbody-wilayah').innerHTML =
                '<tr><td colspan="5" class="py-12 text-center text-gray-400">Belum ada data wilayah.</td></tr>';
            return;
        }

        let rows = '';
        let grandKK = 0, grandLK = 0, grandPR = 0;
        let noJorong = 1;

        wilayah.forEach(function (item) {
            const attr = item.attributes;
            const kk   = attr.keluarga_aktif_count       || 0;
            const lk   = attr.penduduk_pria_count        || 0;
            const pr   = attr.penduduk_wanita_count      || 0;
            const tot  = attr.penduduk_pria_wanita_count || (lk + pr);
            const namaJorong = (attr.sebutan_dusun ? attr.sebutan_dusun + ' ' : '') + (attr.dusun || '-');
            const ketua      = attr.kepala_nama ? ' <span class="text-gray-400 text-xs font-normal">/ ' + attr.kepala_nama.trim() + '</span>' : '';

            grandKK += kk; grandLK += lk; grandPR += pr;

            rows += `<tr>
                <td>
                    <div class="flex items-center gap-2 font-bold text-[#0D2247]">
                        <span class="w-6 h-6 rounded-full bg-[#0D2247] text-white text-xs flex items-center justify-center flex-shrink-0">${noJorong}</span>
                        ${namaJorong}${ketua}
                    </div>
                </td>
                <td><span class="font-bold text-gray-700">${kk.toLocaleString('id')}</span></td>
                <td><span class="badge-lk font-bold text-xs px-2 py-0.5 rounded-full">${lk.toLocaleString('id')}</span></td>
                <td><span class="badge-pr font-bold text-xs px-2 py-0.5 rounded-full">${pr.toLocaleString('id')}</span></td>
                <td><span class="badge-total font-bold text-xs px-2 py-0.5 rounded-full">${tot.toLocaleString('id')}</span></td>
            </tr>`;

            noJorong++;

            // RW
            if (attr.rws && attr.rws.length) {
                let noRW = 1;
                attr.rws.forEach(function (rw) {
                    if (rw.rw && rw.rw !== '-') {
                        const rwKetua = rw.kepala_nama ? ' <span class="text-gray-400 text-xs font-normal">/ ' + rw.kepala_nama.trim() + '</span>' : '';
                        const rwNama  = (rw.sebutan_rw ? rw.sebutan_rw + ' ' : 'RW ') + rw.rw;

                        rows += `<tr class="row-level-1">
                            <td>
                                <div class="flex items-center gap-2 text-gray-700">
                                    <span class="w-5 h-5 rounded bg-blue-100 text-blue-700 text-xs flex items-center justify-center flex-shrink-0 font-bold">${noRW}</span>
                                    <span class="font-semibold">${rwNama}</span>${rwKetua}
                                </div>
                            </td>
                            <td class="text-gray-600">${(rw.keluarga_aktif_count||0).toLocaleString('id')}</td>
                            <td class="text-blue-600">${(rw.penduduk_pria_count||0).toLocaleString('id')}</td>
                            <td class="text-pink-500">${(rw.penduduk_wanita_count||0).toLocaleString('id')}</td>
                            <td class="text-gray-700 font-semibold">${(rw.penduduk_pria_wanita_count||(rw.penduduk_pria_count+rw.penduduk_wanita_count)||0).toLocaleString('id')}</td>
                        </tr>`;

                        noRW++;

                        // RT
                        if (rw.rts && rw.rts.length) {
                            let noRT = 1;
                            rw.rts.forEach(function (rt) {
                                if (rt.rt && rt.rt !== '-') {
                                    const rtKetua = rt.kepala_nama ? ' <span class="text-gray-400 text-xs font-normal">/ ' + rt.kepala_nama.trim() + '</span>' : '';
                                    const rtNama  = (rt.sebutan_rt ? rt.sebutan_rt + ' ' : 'RT ') + rt.rt;

                                    rows += `<tr class="row-level-2">
                                        <td>
                                            <div class="flex items-center gap-2 text-gray-600 text-xs">
                                                <span class="w-4 h-4 rounded bg-indigo-100 text-indigo-600 text-[10px] flex items-center justify-center flex-shrink-0 font-bold">${noRT}</span>
                                                <span class="font-medium">${rtNama}</span>${rtKetua}
                                            </div>
                                        </td>
                                        <td class="text-gray-500 text-xs">${(rt.keluarga_aktif_count||0).toLocaleString('id')}</td>
                                        <td class="text-blue-400 text-xs">${(rt.penduduk_pria_count||0).toLocaleString('id')}</td>
                                        <td class="text-pink-400 text-xs">${(rt.penduduk_wanita_count||0).toLocaleString('id')}</td>
                                        <td class="text-gray-600 font-semibold text-xs">${(rt.penduduk_pria_wanita_count||(rt.penduduk_pria_count+rt.penduduk_wanita_count)||0).toLocaleString('id')}</td>
                                    </tr>`;
                                    noRT++;
                                }
                            });
                        }
                    }
                });
            }
        });

        document.getElementById('tbody-wilayah').innerHTML = rows;

        // Footer total
        const grandTot = grandLK + grandPR;
        document.getElementById('tfoot-wilayah').innerHTML = `
            <tr>
                <td><i class="fas fa-sigma mr-1 text-[#0D2247]/60"></i>TOTAL KESELURUHAN</td>
                <td class="text-gray-800">${grandKK.toLocaleString('id')}</td>
                <td class="text-blue-700">${grandLK.toLocaleString('id')}</td>
                <td class="text-pink-600">${grandPR.toLocaleString('id')}</td>
                <td class="text-[#0D2247]">${grandTot.toLocaleString('id')}</td>
            </tr>`;

        // Update summary cards
        const pctLK  = grandTot > 0 ? (grandLK / grandTot * 100).toFixed(1) : 0;
        const pctPR  = grandTot > 0 ? (grandPR / grandTot * 100).toFixed(1) : 0;
        const jml    = wilayah.length;

        document.getElementById('summary-cards').innerHTML = `
            <div class="stat-card">
                <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Total Jiwa</div>
                <div class="text-4xl font-extrabold text-[#0D2247]">${grandTot.toLocaleString('id')}</div>
                <div class="text-xs text-gray-400 mt-0.5">${jml} Jorong / Dusun</div>
                <div class="mt-2 text-[10px] bg-blue-50 text-blue-600 font-bold px-2 py-0.5 rounded-full inline-block">Data Terkini</div>
            </div>
            <div class="stat-card">
                <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Kepala Keluarga</div>
                <div class="text-4xl font-extrabold text-amber-500">${grandKK.toLocaleString('id')}</div>
                <div class="text-xs text-gray-400 mt-0.5">KK aktif terdaftar</div>
                <div class="mt-2 text-[10px] bg-amber-50 text-amber-600 font-bold px-2 py-0.5 rounded-full inline-block">Rata-rata ${grandKK > 0 ? (grandTot/grandKK).toFixed(1) : 0} jiwa/KK</div>
            </div>
            <div class="stat-card">
                <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Laki-laki</div>
                <div class="text-4xl font-extrabold text-blue-600">${grandLK.toLocaleString('id')}</div>
                <div class="text-xs text-gray-400 mt-0.5">Jiwa (${pctLK}%)</div>
                <div class="mt-3 h-2 bg-gray-100 rounded-full"><div class="h-2 bg-blue-500 rounded-full" style="width:${pctLK}%"></div></div>
            </div>
            <div class="stat-card">
                <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Perempuan</div>
                <div class="text-4xl font-extrabold text-pink-500">${grandPR.toLocaleString('id')}</div>
                <div class="text-xs text-gray-400 mt-0.5">Jiwa (${pctPR}%)</div>
                <div class="mt-3 h-2 bg-gray-100 rounded-full"><div class="h-2 bg-pink-500 rounded-full" style="width:${pctPR}%"></div></div>
            </div>`;
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/wilayah/index.blade.php ENDPATH**/ ?>