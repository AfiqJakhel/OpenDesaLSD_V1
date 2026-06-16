<?php echo $__env->make('theme::commons.asset_sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    .custom-scrollbar::-webkit-scrollbar { height: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 280px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="<?php echo e(site_url('/')); ?>" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">Produk Hukum</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Regulasi</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">Informasi Publik</h1>
        <p class="text-white/70 max-w-xl font-jakarta">Kumpulan dokumen Peraturan, Keputusan, dan Buku Administrasi Desa resmi.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-gray-50 min-h-screen py-16" x-data="{ activeTab: 'perdes' }" x-init="$watch('activeTab', value => setTimeout(() => $.fn.dataTable.tables({visible: true, api: true}).columns.adjust(), 50))">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- TABS HEADER -->
        <div class="flex overflow-x-auto gap-4 mb-8 border-b border-gray-200 pb-2 custom-scrollbar">
            <button @click="activeTab = 'perdes'" :class="activeTab === 'perdes' ? 'border-b-4 border-[#0D2247] text-[#0D2247] font-bold' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 whitespace-nowrap text-sm font-medium transition">
                Buku Peraturan Desa
            </button>
            <button @click="activeTab = 'skkades'" :class="activeTab === 'skkades' ? 'border-b-4 border-[#0D2247] text-[#0D2247] font-bold' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 whitespace-nowrap text-sm font-medium transition">
                Keputusan Kepala Desa
            </button>
            <button @click="activeTab = 'inventaris'" :class="activeTab === 'inventaris' ? 'border-b-4 border-[#0D2247] text-[#0D2247] font-bold' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 whitespace-nowrap text-sm font-medium transition">
                Buku Inventaris & Kekayaan
            </button>
            <button @click="activeTab = 'tanah'" :class="activeTab === 'tanah' ? 'border-b-4 border-[#0D2247] text-[#0D2247] font-bold' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 whitespace-nowrap text-sm font-medium transition">
                Buku Tanah Kas Desa
            </button>
        </div>

        <!-- TAB CONTENT 1: Peraturan Desa -->
        <div x-show="activeTab === 'perdes'" class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 lg:p-8">
            <div class="overflow-x-auto w-full">
                <table class="table-modern w-full text-left text-sm" id="tabelPerdes">
                    <thead>
                        <tr>
                            <th class="rounded-tl-xl">No</th>
                            <th>Judul Informasi / SK</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                            <th>Tanggal Upload</th>
                            <th class="rounded-tr-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <!-- TAB CONTENT 2: SK Kepala Desa -->
        <div x-show="activeTab === 'skkades'" class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 lg:p-8" style="display:none;">
            <div class="overflow-x-auto w-full">
                <table class="table-modern w-full text-left text-sm" id="tabelSK">
                    <thead>
                        <tr>
                            <th class="rounded-tl-xl">No</th>
                            <th>Judul Informasi / SK</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                            <th>Tanggal Upload</th>
                            <th class="rounded-tr-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <!-- TAB CONTENT 3: Inventaris dan Kekayaan Desa -->
        <div x-show="activeTab === 'inventaris'" class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 lg:p-8" style="display:none;">
            <div class="overflow-x-auto w-full">
                <table class="table-modern w-full text-left text-sm" id="tabelInventaris">
                    <thead>
                        <tr>
                            <th class="rounded-tl-xl" rowspan="2">No</th>
                            <th rowspan="2">Jenis/Nama Barang</th>
                            <th rowspan="2">Asal Barang</th>
                            <th colspan="3" class="text-center">Keadaan Awal Tahun</th>
                            <th colspan="3" class="text-center">Penghapusan</th>
                            <th colspan="3" class="text-center">Keadaan Akhir Tahun</th>
                            <th rowspan="2" class="rounded-tr-xl">Keterangan</th>
                        </tr>
                        <tr>
                            <th>B</th><th>KB</th><th>RB</th>
                            <th>B</th><th>KB</th><th>RB</th>
                            <th>B</th><th>KB</th><th>RB</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <!-- TAB CONTENT 4: Tanah Kas Desa -->
        <div x-show="activeTab === 'tanah'" class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 lg:p-8" style="display:none;">
            <div class="overflow-x-auto w-full">
                <table class="table-modern w-full text-left text-sm" id="tabelTanah">
                    <thead>
                        <tr>
                            <th class="rounded-tl-xl">No</th>
                            <th>Tahun Perolehan</th>
                            <th>Asal Barang</th>
                            <th>Luas (M2)</th>
                            <th>Kelas</th>
                            <th>Lokasi</th>
                            <th>Peruntukan</th>
                            <th class="rounded-tr-xl">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    // Helper function to render common produk hukum tables
    function initProdukHukumTable(tableId, kategoriId) {
        let drawCounter = 0;
        return $(`#${tableId}`).DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ordering: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "",
                zeroRecords: "Tidak ada data ditemukan",
                paginate: { first: "Awal", last: "Akhir", next: "Lanjut", previous: "Kembali" }
            },
            ajax: {
                url: `<?php echo e(site_url('internal_api/produk-hukum')); ?>?filter[kategori]=${kategoriId}`,
                method: 'GET',
                data: row => {
                    drawCounter++;
                    return {
                        "page[size]": row.length,
                        "page[number]": (row.start / row.length) + 1,
                        "filter[search]": row.search.value,
                        "sort": `${row.order[0]?.dir === "asc" ? "" : "-"}${row.columns[row.order[0]?.column]?.name}`
                    };
                },
                dataSrc: json => {
                    json.draw = drawCounter;
                    if (json.meta && json.meta.pagination) {
                        json.recordsTotal = json.meta.pagination.total;
                        json.recordsFiltered = json.meta.pagination.total;
                    }
                    return json.data || [];
                }
            },
            columnDefs: [{ targets: '_all', className: 'text-nowrap' }],
            columns: [
                { data: null, searchable: false, orderable: false },
                { data: 'nama', name: 'nama', render: (data, type, row) => `<span class="font-bold text-gray-800">${row.attributes ? row.attributes.nama : row.nama}</span>` },
                { data: 'tahun', name: 'tahun', render: (data, type, row) => row.attributes ? row.attributes.tahun : row.tahun },
                { data: 'kategori', name: 'kategori', render: (data, type, row) => `<span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">${row.attributes ? row.attributes.kategori : row.kategori}</span>` },
                { data: 'tgl_upload', name: 'tgl_upload', orderable: false, render: (data, type, row) => `<span class="text-gray-500"><i class="fas fa-calendar-alt mr-1"></i> ${row.attributes ? row.attributes.tgl_upload : row.tgl_upload}</span>` },
                {
                    data: null, searchable: false, orderable: false, render: (data, type, row) => {
                        let attrs = row.attributes ? row.attributes : row;
                        return `<button class="bg-[#0D2247] hover:bg-[#1a3a5c] text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 lihat-dokumen"
                                data-nama="${attrs.nama}" data-url="${attrs.url}" data-file="${attrs.satuan}">
                                <i class="fas fa-eye"></i> Lihat
                            </button>`;
                    }
                }
            ],
            order: [[2, 'desc']],
            drawCallback: function(settings) {
                var api = this.api();
                api.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                    cell.innerHTML = api.page.info().start + i + 1;
                });
            }
        });
    }

    // Tab 1 & 2
    initProdukHukumTable('tabelPerdes', 2);
    initProdukHukumTable('tabelSK', 3);

    // Tab 3: Inventaris
    $('#tabelInventaris').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        ordering: false,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "",
            zeroRecords: "Tidak ada data ditemukan",
            paginate: { first: "Awal", last: "Akhir", next: "Lanjut", previous: "Kembali" }
        },
        ajax: {
            url: `<?php echo e(site_url('internal_api/buku-inventaris-kekayaan')); ?>`,
            method: 'GET'
        },
        columnDefs: [{ targets: '_all', className: 'text-nowrap' }],
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama_barang', name: 'nama_barang' },
            { data: 'asal_barang', name: 'asal_barang' },
            { data: 'awal_b', name: 'awal_b' },
            { data: 'awal_kb', name: 'awal_kb' },
            { data: 'awal_rb', name: 'awal_rb' },
            { data: 'hapus_b', name: 'hapus_b' },
            { data: 'hapus_kb', name: 'hapus_kb' },
            { data: 'hapus_rb', name: 'hapus_rb' },
            { data: 'akhir_b', name: 'akhir_b' },
            { data: 'akhir_kb', name: 'akhir_kb' },
            { data: 'akhir_rb', name: 'akhir_rb' },
            { data: 'keterangan', name: 'keterangan' },
        ]
    });

    // Tab 4: Tanah Kas Desa
    $('#tabelTanah').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        ordering: false,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "",
            zeroRecords: "Tidak ada data ditemukan",
            paginate: { first: "Awal", last: "Akhir", next: "Lanjut", previous: "Kembali" }
        },
        ajax: {
            url: `<?php echo e(site_url('internal_api/buku-tanah-kas-desa')); ?>`,
            method: 'GET'
        },
        columnDefs: [{ targets: '_all', className: 'text-nowrap' }],
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'tanggal_perolehan', name: 'tanggal_perolehan' },
            { data: 'ref_asal_tanah_kas.nama', name: 'ref_asal_tanah_kas.nama', defaultContent: '-' },
            { data: 'luas', name: 'luas', defaultContent: '-' },
            { data: 'kode', name: 'kode' },
            { data: 'lokasi', name: 'lokasi' },
            { data: 'peruntukan', name: 'peruntukan' },
            { data: 'keterangan', name: 'keterangan' },
        ]
    });

    // Event listener untuk tombol lihat dokumen (Produk Hukum & SK)
    $(document).on('click', '.lihat-dokumen', function() {
        var nama = $(this).data('nama');
        var file = $(this).data('file') || $(this).data('url');

        nama = nama.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');

        if (!file) {
            Swal.fire('Error', 'File tidak ditemukan.', 'error');
            return;
        }

        Swal.fire({
            title: `<h4 class="font-jakarta font-bold text-lg text-gray-800" style="margin-bottom: 10px;">${$(this).data('nama')}</h4>`,
            html: `
                <div style="display: flex; flex-direction: column; align-items: center; width: 100%; gap: 15px;">
                    <iframe src="${file}" style="width: 100%; min-height: 450px; border: 1px solid #e2e8f0; border-radius: 12px; display: flex; align-items: center; justify-content: center;"></iframe>
                    <button class="bg-[#0D2247] hover:bg-[#1a3a5c] text-white font-bold px-6 py-3 rounded-xl transition flex items-center gap-2 mt-4 unduh-dokumen" data-nama="${nama}" data-file="${file}">
                        <i class="fas fa-download"></i> Unduh File
                    </button>
                </div>
            `,
            width: '70%',
            heightAuto: true,
            showCloseButton: true,
            showConfirmButton: false,
            showCancelButton: false,
            didOpen: () => {
                $(".unduh-dokumen").on("click", function() {
                    let pdfUrl = $(this).data("file");
                    let fileName = $(this).data("nama") || "document.pdf";
                    let link = $("<a>").attr("href", pdfUrl).attr("download", fileName).appendTo("body");
                    link[0].click();
                    link.remove();
                });
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/informasi-publik/index.blade.php ENDPATH**/ ?>