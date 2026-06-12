<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    .card-shadow { box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1); }
    
    /* Custom DataTables Styling */
    table.dataTable.no-footer { border-bottom: 0 !important; }
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #e5e7eb; border-radius: 9999px; padding: 6px 16px; margin-left: 8px;
        outline: none; transition: all 0.3s; font-size: 0.875rem; background-color: #f9fafb;
    }
    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #0D2247; box-shadow: 0 0 0 2px rgba(13, 34, 71, 0.1); background-color: #fff;
    }
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #e5e7eb; border-radius: 8px; padding: 4px 8px;
        outline: none; font-size: 0.875rem;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 8px !important; border: 1px solid transparent !important;
        background: transparent !important; color: #4b5563 !important; font-weight: 500;
        transition: all 0.2s;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f3f4f6 !important; border: 1px solid #e5e7eb !important; color: #1f2937 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #0D2247 !important; color: #fff !important; border: 1px solid #0D2247 !important;
        box-shadow: 0 4px 6px -1px rgba(13, 34, 71, 0.2);
    }
    .dataTables_wrapper .dataTables_info {
        color: #6b7280 !important; font-size: 0.875rem; padding-top: 1rem !important;
    }
    
    /* Table row hover & styles */
    table.dataTable tbody tr { transition: all 0.2s ease; border-bottom: 1px solid #f3f4f6; }
    table.dataTable tbody tr:hover { background-color: #f8fafc !important; transform: scale(1.002); }
    table.dataTable thead th { border-bottom: 2px solid #e5e7eb !important; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden font-jakarta" style="min-height:220px;">
    <div class="absolute inset-0 opacity-10"
         style="background-image:url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1600&q=70');background-size:cover;background-position:center;">
    </div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10">
        
        <nav class="flex items-center gap-2 text-xs mb-5">
            <a href="<?php echo e(ci_route('')); ?>" class="text-white/60 hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px] text-white/30"></i>
            <span class="text-white font-semibold">Arsip Artikel</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="text-amber-400 font-bold tracking-widest text-[10px] uppercase block mb-2">Pusat Informasi Terpusat</span>
                <h1 class="text-4xl font-extrabold drop-shadow-md">Arsip Situs Web</h1>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 36L0 18Q720 0 1440 18L1440 36Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-gray-50 min-h-screen font-jakarta py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-white p-6 md:p-8 rounded-3xl card-shadow border border-gray-100">
            <div class="w-full overflow-x-auto">
                <table id="arsip-artikel" class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 text-xs uppercase font-semibold">
                        <tr>
                            <th class="px-4 py-4 rounded-tl-xl" width="5%">No.</th>
                            <th class="px-4 py-4" width="20%">Tanggal Artikel</th>
                            <th class="px-4 py-4" width="55%">Judul Artikel</th>
                            <th class="px-4 py-4" width="10%">Penulis</th>
                            <th class="px-4 py-4 rounded-tr-xl" width="10%">Dibaca</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-700">
                        <!-- Data via Ajax -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            var arsip = $('#arsip-artikel').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ordering: true,
                language: {
                    search: "Pencarian:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ artikel",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Lanjut",
                        previous: "Kembali"
                    }
                },
                ajax: {
                    url: `<?php echo e(ci_route('internal_api.arsip')); ?>`,
                    method: 'get',
                    data: function(row) {
                        return {
                            "page[size]": row.length,
                            "page[number]": (row.start / row.length) + 1,
                            "filter[search]": row.search.value,
                            "sort": (row.order[0]?.dir === "asc" ? "" : "-") + row.columns[row.order[0]?.column]
                                ?.name,
                        };
                    },
                    dataSrc: function(json) {
                        json.recordsTotal = json.meta.pagination.total
                        json.recordsFiltered = json.meta.pagination.total

                        return json.data
                    },
                },
                columnDefs: [
                    { targets: [0, 1, 3, 4], className: 'whitespace-nowrap px-4 py-3 align-middle' },
                    { targets: 2, className: 'px-4 py-3 align-middle' }
                ],
                columns: [{
                        data: null,
                        orderable: false,
                        className: 'font-semibold text-gray-500'
                    },
                    {
                        data: "attributes.tgl_upload_local",
                        name: "tgl_upload"
                    },
                    {
                        data: function(data) {
                            return `<a href="${data.attributes.url_slug}" class="font-bold text-gray-800 hover:text-[#0D2247] transition">
                                    ${data.attributes.judul}
                                </a>`
                        },
                        name: "judul",
                        orderable: false
                    },
                    {
                        data: "attributes.author.nama",
                        name: "id_user",
                        defaultContent: '<span class="text-gray-400 italic">Tidak diketahui</span>',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: function(data) {
                            return `<span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-semibold">${data.attributes.hit} kali</span>`;
                        },
                        name: "hit",
                        searchable: false,
                    },
                ],
                order: [
                    [1, 'desc']
                ]
            })

            arsip.on('draw.dt', function() {
                var PageInfo = $('#arsip-artikel').DataTable().page.info();
                arsip.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/arsip/index.blade.php ENDPATH**/ ?>