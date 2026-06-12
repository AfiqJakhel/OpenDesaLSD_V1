@extends('theme::layouts.full-content')
@include('theme::commons.asset_sweetalert')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    .table-modern {
        width: 100%; border-collapse: separate; border-spacing: 0;
    }
    .table-modern th {
        background-color: #f8fafc; color: #475569; font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em; padding: 1rem 1.5rem; border-bottom: 2px solid #e2e8f0;
    }
    .table-modern td {
        padding: 1rem 1.5rem; border-bottom: 1px solid #f1f5f9; color: #334155; vertical-align: middle;
    }
    .table-modern tr:hover td { background-color: #f8fafc; }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.25rem 0.75rem; margin-left: 0.25rem; border-radius: 0.375rem; border: 1px solid #e2e8f0; background: white; color: #475569 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #0D2247 !important; color: white !important; border-color: #0D2247;
    }
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #e2e8f0; border-radius: 0.5rem; padding: 0.5rem 1rem; margin-left: 0.5rem; outline: none; transition: border-color 0.2s;
    }
    .dataTables_wrapper .dataTables_filter input:focus { border-color: #0D2247; }
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #e2e8f0; border-radius: 0.5rem; padding: 0.3rem 1.5rem 0.3rem 0.5rem; margin: 0 0.5rem; outline: none;
    }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 280px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="{{ site_url('/') }}" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <a href="#" class="hover:text-white transition">Produk Hukum</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">SK Kepala Desa</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Regulasi</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">Informasi Publik / SK</h1>
        <p class="text-white/70 max-w-xl font-jakarta">Kumpulan dokumen Surat Keputusan (SK) dan Informasi Publik resmi.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

{{-- KONTEN --}}
<div class="bg-gray-50 min-h-screen py-16">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <div id="table-container" class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden p-6 lg:p-8">
            <div class="overflow-x-auto">
                <table class="table-modern w-full text-left text-sm" id="tabelData" style="width:100%">
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

        {{-- EMPTY STATE CONTAINER --}}
        <div id="empty-state-container" class="hidden">
            <div class="bg-white rounded-3xl p-4 md:p-8 text-center border border-gray-100 shadow-md">
                @include('theme::partials.empty_state', [
                    'title'       => 'SK Kepala Desa',
                    'description' => 'Belum ada SK Kepala Desa atau Informasi Publik yang dipublikasikan.',
                    'icon'        => 'fa-file-signature'
                ])
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var route = `{{ route('api.informasi-publik') }}`;

            var tabelData = $('#tabelData').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ordering: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "",
                    zeroRecords: "",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "Lanjut",
                        previous: "Kembali"
                    }
                },
                ajax: {
                    url: route,
                    method: 'GET',
                    data: row => ({
                        "page[size]": row.length,
                        "page[number]": (row.start / row.length) + 1,
                        "filter[search]": row.search.value,
                        "sort": `${row.order[0]?.dir === "asc" ? "" : "-"}${row.columns[row.order[0]?.column]?.name}`
                    }),
                    dataSrc: json => {
                        json.recordsTotal = json.meta.pagination.total;
                        json.recordsFiltered = json.meta.pagination.total;
                        
                        // Handle Empty State
                        // Jika total data di server adalah 0, berarti bukan sekadar pencarian kosong
                        if(json.data.length === 0 && json.recordsTotal === 0) {
                            $('#table-container').hide();
                            $('#empty-state-container').removeClass('hidden');
                        } else {
                            $('#table-container').show();
                            $('#empty-state-container').addClass('hidden');
                        }

                        return json.data;
                    },
                    error: function(xhr) {
                        console.error('AJAX Error:', xhr.responseText);
                        $('#table-container').hide();
                        $('#empty-state-container').removeClass('hidden');
                    }
                },
                columnDefs: [{
                    targets: '_all',
                    className: 'text-nowrap'
                }, ],
                columns: [{
                        data: null,
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        render: (data, type, row) => `<span class="font-bold text-gray-800">${row.attributes.nama}</span>`
                    },
                    {
                        data: 'tahun',
                        name: 'tahun',
                        render: (data, type, row) => row.attributes.tahun
                    },
                    {
                        data: 'kategori',
                        name: 'kategori',
                        render: (data, type, row) => `<span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">${row.attributes.kategori}</span>`
                    },
                    {
                        data: 'tgl_upload',
                        name: 'tgl_upload',
                        render: (data, type, row) => `<span class="text-gray-500"><i class="fas fa-calendar-alt mr-1"></i> ${row.attributes.tgl_upload}</span>`
                    },
                    {
                        data: null,
                        searchable: false,
                        orderable: false,
                        render: (data, type, row) => {
                            return `<button class="bg-[#0D2247] hover:bg-[#1a3a5c] text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 lihat-dokumen"
                                    data-nama="${row.attributes.nama}"
                                    data-url="${row.attributes.url}"
                                    data-file="${row.attributes.satuan}">
                                    <i class="fas fa-eye"></i> Lihat
                                </button>`;
                        }
                    }
                ],
                order: [
                    [4, 'desc']
                ],
                drawCallback: function(settings) {
                    var api = this.api();
                    api.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = api.page.info().start + i + 1;
                    });
                }
            });

            // Event listener untuk tombol lihat dokumen
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
                            <button class="bg-accent hover:bg-yellow-600 text-white font-bold px-6 py-3 rounded-xl transition flex items-center gap-2 mt-4 unduh-dokumen" data-nama="${nama}" data-file="${file}">
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

                            let link = $("<a>")
                                .attr("href", pdfUrl)
                                .attr("download", fileName)
                                .appendTo("body");

                            link[0].click();
                            link.remove();
                        });
                    }
                });
            });
        });
    </script>
@endpush
