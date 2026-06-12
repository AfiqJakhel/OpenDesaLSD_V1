<?php echo $__env->make('theme::commons.asset_highcharts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 280px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">Status IDM</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">STATISTIK</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">Status IDM <?php echo e($tahun); ?></h1>
        <p class="text-white/70 max-w-xl font-jakarta">Indeks Desa Membangun (IDM) menunjukkan status kemajuan dan kemandirian desa.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-gray-50 min-h-screen py-16">
    <div class="container mx-auto px-4 max-w-7xl">

        <?php if(isset($idm->error_msg) && $idm->error_msg): ?>
            
            <div class="bg-white rounded-3xl p-4 md:p-8 text-center border border-gray-100 shadow-md">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-exclamation-circle text-gray-400 text-4xl"></i>
                </div>
                <h3 class="font-jakarta font-bold text-xl text-gray-800 mb-3">Data IDM Tidak Tersedia</h3>
                <p class="text-gray-500 max-w-md mx-auto">
                    <?php echo $idm->error_msg; ?>

                </p>
                <a href="<?php echo e(site_url('/')); ?>" class="inline-block mt-6 bg-[#0D2247] hover:bg-[#1a3a5c] text-white px-6 py-3 rounded-xl font-jakarta font-bold text-sm transition">
                    Kembali ke Beranda
                </a>
            </div>
        <?php elseif(isset($idm->SUMMARIES)): ?>
            
            <div class="space-y-8">
                
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-3xl p-6 shadow-md border border-gray-100 flex items-center gap-4 relative overflow-hidden group">
                        <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0 z-10 transition-transform group-hover:scale-110">
                            <i class="fas fa-chart-line text-2xl"></i>
                        </div>
                        <div class="z-10">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider font-jakarta">Skor Saat Ini</p>
                            <h4 class="text-2xl font-extrabold text-gray-800 mt-1 font-jakarta"><?php echo e(number_format($idm->SUMMARIES->SKOR_SAAT_INI ?? 0, 4)); ?></h4>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-5"><i class="fas fa-chart-line text-8xl"></i></div>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-md border border-gray-100 flex items-center gap-4 relative overflow-hidden group">
                        <div class="w-14 h-14 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center flex-shrink-0 z-10 transition-transform group-hover:scale-110">
                            <i class="fas fa-award text-2xl"></i>
                        </div>
                        <div class="z-10">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider font-jakarta">Status IDM</p>
                            <h4 class="text-xl font-extrabold text-gray-800 mt-1 font-jakarta">
                                <?php
                                    $status = $idm->SUMMARIES->STATUS ?? '-';
                                    $badgeColor = match(strtolower($status)) {
                                        'mandiri'          => 'text-green-600',
                                        'maju'             => 'text-blue-600',
                                        'berkembang'       => 'text-yellow-600',
                                        'tertinggal'       => 'text-orange-600',
                                        'sangat tertinggal'=> 'text-red-600',
                                        default            => 'text-gray-600'
                                    };
                                ?>
                                <span class="<?php echo e($badgeColor); ?>"><?php echo e($status); ?></span>
                            </h4>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-5"><i class="fas fa-award text-8xl"></i></div>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-md border border-gray-100 flex items-center gap-4 relative overflow-hidden group">
                        <div class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center flex-shrink-0 z-10 transition-transform group-hover:scale-110">
                            <i class="fas fa-bullseye text-2xl"></i>
                        </div>
                        <div class="z-10">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider font-jakarta">Target Status</p>
                            <h4 class="text-xl font-extrabold text-gray-800 mt-1 font-jakarta"><?php echo e($idm->SUMMARIES->TARGET_STATUS ?? '-'); ?></h4>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-5"><i class="fas fa-bullseye text-8xl"></i></div>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-md border border-gray-100 flex items-center gap-4 relative overflow-hidden group">
                        <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center flex-shrink-0 z-10 transition-transform group-hover:scale-110">
                            <i class="fas fa-tachometer-alt text-2xl"></i>
                        </div>
                        <div class="z-10">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider font-jakarta">Skor Minimal</p>
                            <h4 class="text-2xl font-extrabold text-gray-800 mt-1 font-jakarta"><?php echo e(number_format($idm->SUMMARIES->SKOR_MINIMAL ?? 0, 4)); ?></h4>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-5"><i class="fas fa-tachometer-alt text-8xl"></i></div>
                    </div>
                </div>

                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                        <h3 class="font-bold text-lg text-primary border-l-4 border-accent pl-3 mb-6">Informasi Wilayah</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-500 font-jakarta">Provinsi</span>
                                <span class="font-bold text-gray-800"><?php echo e($idm->IDENTITAS[0]->nama_provinsi ?? '-'); ?></span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-500 font-jakarta">Kabupaten</span>
                                <span class="font-bold text-gray-800"><?php echo e($idm->IDENTITAS[0]->nama_kab_kota ?? '-'); ?></span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-500 font-jakarta"><?php echo e(ucwords(setting('sebutan_kecamatan')) ?? 'Kecamatan'); ?></span>
                                <span class="font-bold text-gray-800"><?php echo e($idm->IDENTITAS[0]->nama_kecamatan ?? '-'); ?></span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-500 font-jakarta"><?php echo e(ucwords(setting('sebutan_desa')) ?? 'Desa'); ?></span>
                                <span class="font-bold text-gray-800"><?php echo e($idm->IDENTITAS[0]->nama_desa ?? '-'); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                        <h3 class="font-bold text-lg text-primary border-l-4 border-accent pl-3 mb-6">Distribusi Skor IDM</h3>
                        <figure class="highcharts-figure w-full">
                            <div id="container" style="height: 300px;"></div>
                        </figure>
                    </div>
                </div>

                
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden p-8">
                    <h3 class="font-bold text-lg text-primary border-l-4 border-accent pl-3 mb-6">Rincian Indikator IDM</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-600">
                            <thead class="bg-gray-50 text-gray-700 font-bold uppercase tracking-wider text-[10px] md:text-xs border-b border-gray-200">
                                <tr>
                                    <th rowspan="2" class="py-3 px-4 rounded-tl-xl border-r border-gray-200">NO</th>
                                    <th rowspan="2" class="py-3 px-4 border-r border-gray-200">INDIKATOR IDM</th>
                                    <th rowspan="2" class="py-3 px-4 border-r border-gray-200">SKOR</th>
                                    <th rowspan="2" class="py-3 px-4 border-r border-gray-200">KETERANGAN</th>
                                    <th rowspan="2" class="py-3 px-4 border-r border-gray-200">KEGIATAN</th>
                                    <th rowspan="2" class="py-3 px-4 border-r border-gray-200">+NILAI</th>
                                    <th colspan="6" class="py-3 px-4 text-center rounded-tr-xl border-b border-gray-200">PELAKSANA</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-3 border-r border-gray-200">Pusat</th>
                                    <th class="py-2 px-3 border-r border-gray-200">Prov</th>
                                    <th class="py-2 px-3 border-r border-gray-200">Kab</th>
                                    <th class="py-2 px-3 border-r border-gray-200">Desa</th>
                                    <th class="py-2 px-3 border-r border-gray-200">CSR</th>
                                    <th class="py-2 px-3">Lainnya</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php if(!empty($idm->ROW)): ?>
                                    <?php $__currentLoopData = $idm->ROW; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e(empty($row->NO) ? 'bg-gray-50 font-bold text-gray-800' : ''); ?>">
                                            <td class="py-2 px-4"><?php echo e($row->NO ?? '-'); ?></td>
                                            <td class="py-2 px-4" style="min-width: 150px;"><?php echo e($row->INDIKATOR ?? '-'); ?></td>
                                            <td class="py-2 px-4 text-center font-semibold"><?php echo e($row->SKOR ?? '-'); ?></td>
                                            <td class="py-2 px-4" style="min-width: 250px;"><?php echo e($row->KETERANGAN ?? '-'); ?></td>
                                            <td class="py-2 px-4"><?php echo e($row->KEGIATAN ?? '-'); ?></td>
                                            <td class="py-2 px-4 text-center"><?php echo e($row->NILAI ?? '-'); ?></td>
                                            <td class="py-2 px-3 text-center"><?php echo e($row->PUSAT ?? '-'); ?></td>
                                            <td class="py-2 px-3 text-center"><?php echo e($row->PROV ?? '-'); ?></td>
                                            <td class="py-2 px-3 text-center"><?php echo e($row->KAB ?? '-'); ?></td>
                                            <td class="py-2 px-3 text-center"><?php echo e($row->DESA ?? '-'); ?></td>
                                            <td class="py-2 px-3 text-center"><?php echo e($row->CSR ?? '-'); ?></td>
                                            <td class="py-2 px-3 text-center"><?php echo e($row->LAINNYA ?? '-'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="12" class="text-center py-4">Data Rincian Tidak Tersedia</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        <?php else: ?>
            <div class="bg-white rounded-3xl p-4 md:p-8 text-center border border-gray-100 shadow-md">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-gray-400 text-4xl"></i>
                </div>
                <h3 class="font-jakarta font-bold text-xl text-gray-800 mb-3">Data Belum Diisi</h3>
                <p class="text-gray-500 max-w-md mx-auto">
                    Data Indeks Desa Membangun (IDM) untuk tahun ini belum tersedia.
                </p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php if(isset($idm->ROW) && !isset($idm->error_msg)): ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var tahun = <?php echo e($tahun ?? '2024'); ?>;
            var iks = <?php echo e($idm->ROW[35]->SKOR ?? 0); ?>;
            var ike = <?php echo e($idm->ROW[48]->SKOR ?? 0); ?>;
            var ikl = <?php echo e($idm->ROW[52]->SKOR ?? 0); ?>;

            Highcharts.chart('container', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Indeks Desa Membangun (IDM) ' + tahun
                },
                subtitle: {
                    text: 'SKOR : IKS, IKE, IKL'
                },
                plotOptions: {
                    series: {
                        colorByPoint: true
                    },
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        showInLegend: true,
                        depth: 45,
                        innerSize: 70,
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y:,.2f} / {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'SKOR',
                    shadow: 1,
                    border: 1,
                    data: [
                        ['IKS', parseFloat(iks)],
                        ['IKE', parseFloat(ike)],
                        ['IKL', parseFloat(ikl)]
                    ]
                }]
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/idm/index.blade.php ENDPATH**/ ?>