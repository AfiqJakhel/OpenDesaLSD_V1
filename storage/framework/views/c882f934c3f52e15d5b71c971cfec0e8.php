<?php echo $__env->make('core::admin.layouts.components.asset_numeral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    .table-modern { width: 100%; border-collapse: separate; border-spacing: 0; }
    .table-modern th { background-color: #f8fafc; color: #475569; font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em; padding: 1rem 1.5rem; border-bottom: 2px solid #e2e8f0; }
    .table-modern td { padding: 1rem 1.5rem; border-bottom: 1px solid #f1f5f9; color: #334155; vertical-align: middle; }
    .table-modern tr:hover td { background-color: #f8fafc; }
    .dataTables_wrapper .dataTables_paginate .paginate_button { padding: 0.25rem 0.75rem; margin-left: 0.25rem; border-radius: 0.375rem; border: 1px solid #e2e8f0; background: white; color: #475569 !important; }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #0D2247 !important; color: white !important; border-color: #0D2247; }
    .dataTables_wrapper .dataTables_filter input { border: 1px solid #e2e8f0; border-radius: 0.5rem; padding: 0.5rem 1rem; margin-left: 0.5rem; outline: none; transition: border-color 0.2s; }
    .dataTables_wrapper .dataTables_filter input:focus { border-color: #0D2247; }
    .dataTables_wrapper .dataTables_length select { border: 1px solid #e2e8f0; border-radius: 0.5rem; padding: 0.3rem 1.5rem 0.3rem 0.5rem; margin: 0 0.5rem; outline: none; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 280px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1541888087455-163155ab2b4a?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <a href="<?php echo e(site_url('inventaris')); ?>" class="hover:text-white transition">Inventaris</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold"><?php echo e($judul); ?></span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Data Aset</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4"><?php echo e($judul); ?></h1>
        <p class="text-white/70 max-w-xl font-jakarta">Daftar rincian <?php echo e(strtolower($judul)); ?> yang dimiliki oleh Pemerintah <?php echo e(ucwords(setting('sebutan_desa'))); ?>.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-gray-50 min-h-screen py-16">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 lg:p-8 font-jakarta mb-8">
        <div class="mb-6 border-b border-gray-100 pb-4">
            <h1 class="text-2xl font-extrabold text-[#0D2247]"><?php echo e($judul); ?></h1>
        </div>
        <div class="overflow-x-auto w-full">
            <table id="inventaris" class="table-modern w-full text-left text-sm">
                <thead>
                    <tr>
                        <th class="rounded-tl-xl text-center">No</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Kode Barang / Nomor Registrasi</th>
                        <th class="text-center">Luas (M<sup>2</sup>)</th>
                        <th class="text-center">Tahun Pengadaan</th>
                        <th class="text-center">Letak/Alamat</th>
                        <th class="text-center">Nomor Sertifikat</th>
                        <th class="text-center">Asal Usul</th>
                        <th class="rounded-tr-xl text-center">Harga (Rp)</th>
                    </tr>
                </thead>
                <tbody id="inventaris-tbody">
                </tbody>
                <tfoot id="inventaris-tfoot">
                    <tr>
                        <th colspan="8" class="text-right font-bold bg-gray-50 border-t-2 border-gray-200">Total:</th>
                        <th class="text-right total font-bold text-[#0D2247] bg-gray-50 border-t-2 border-gray-200"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(event) {
                const _url = `<?php echo e(ci_route('internal_api.inventaris-tanah')); ?>`
                const _tbody = document.getElementById('inventaris-tbody')
                const _tfoot = document.getElementById('inventaris-tfoot')
                $.ajax({
                    url: _url,
                    type: 'GET',
                    beforeSend: () => _tbody.innerHTML = `<?php echo $__env->make('theme::commons.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`,
                    success: (response) => {
                        let _trString = []
                        let _total = 0
                        if (response.data.length) {
                            response.data.forEach((element, key) => {
                                _trString.push(`<tr>
                            <td>${key + 1}</td>
                            <td>${element.attributes.nama_barang}</td>
                            <td>${element.attributes.kode_barang}<br>${element.attributes.register}</td>
                            <td>${element.attributes.luas}</td>
                            <td>${element.attributes.tahun_pengadaan}</td>
                            <td>${element.attributes.letak}</td>
                            <td>${element.attributes.no_sertifikat}</td>
                            <td>${element.attributes.asal}</td>
                            <td>${element.attributes.harga_format}</td>
                        </tr>`)
                                _total += element.attributes.harga
                            });
                            _tfoot.querySelector(`th.total`).innerHTML = numeral(_total).format()
                            _tbody.innerHTML = _trString.join('')
                        } else {
                            _tfoot.remove()
                            _tbody.innerHTML = ''
                        }
                        setTimeout(() => {
                            $('#inventaris').DataTable({
                                columnDefs: [{
                                    targets: [0],
                                    orderable: false
                                }],
                                order: [
                                    [1, 'asc']
                                ]
                            });
                        }, 1000);
                    },
                    dataType: 'json'
                })
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/inventaris/tanah.blade.php ENDPATH**/ ?>