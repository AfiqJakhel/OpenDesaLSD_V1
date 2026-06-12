@extends('theme::layouts.full-content')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    .table-modern {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    .table-modern thead th {
        background-color: #f8fafc;
        color: #475569;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        padding: 1rem;
        border-bottom: 2px solid #e2e8f0;
        border-top: 1px solid #e2e8f0;
    }
    .table-modern tbody td {
        padding: 1rem;
        background-color: white;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        vertical-align: middle;
    }
    .table-modern tfoot th {
        background-color: #f8fafc;
        color: #0D2247;
        font-weight: 700;
        padding: 1rem;
        border-top: 2px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
    }
    .table-modern tbody tr:hover td {
        background-color: #f8fafc;
    }
    .btn-action-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        border-radius: 0.5rem;
        background-color: #eff6ff;
        color: #3b82f6;
        transition: all 0.2s;
    }
    .btn-action-modern:hover {
        background-color: #3b82f6;
        color: white;
    }
    
    /* DataTables Pagination overrides */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.5em 1em;
        margin-left: 2px;
        border-radius: 0.5rem;
        border: 1px solid transparent;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #0D2247 !important;
        color: white !important;
        border: 1px solid #0D2247 !important;
    }
</style>
@endpush

@section('content')
{{-- HERO --}}
<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 280px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1541888087455-163155ab2b4a?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="{{ site_url('/') }}" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">Inventaris</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Data Aset</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">Inventaris {{ ucwords(setting('sebutan_desa')) }}</h1>
        <p class="text-white/70 max-w-xl font-jakarta">Daftar rekapitulasi kekayaan dan aset yang dimiliki oleh Pemerintah {{ ucwords(setting('sebutan_desa')) }}.</p>
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
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6 md:p-8 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="font-jakarta font-bold text-xl text-gray-800">Rekapitulasi Inventaris</h3>
                    <p class="text-gray-500 text-sm mt-1 font-jakarta">Ringkasan total aset desa berdasarkan jenis dan sumber perolehan.</p>
                </div>
            </div>
            
            <div class="p-6 md:p-8">
                <div id="loading-container" class="py-12 flex justify-center">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#0D2247]"></div>
                </div>
                
                <div id="empty-container" style="display: none;">
                    @include('theme::partials.empty_state', [
                        'icon' => 'fas fa-boxes',
                        'title' => 'Data Inventaris Kosong',
                        'description' => 'Belum ada data inventaris yang dapat ditampilkan saat ini.'
                    ])
                </div>

                <div id="data-container" style="display: none;" class="overflow-x-auto">
                    <table class="table-modern w-full whitespace-nowrap" id="inventaris">
                        <thead>
                            <tr>
                                <th class="text-center w-16" rowspan="3" style="vertical-align: middle;">No</th>
                                <th rowspan="3" style="vertical-align: middle;">Jenis Barang</th>
                                <th rowspan="3" style="min-width:250px;vertical-align: middle;">Keterangan</th>
                                <th class="text-center" colspan="5" style="border-bottom: 1px solid #e2e8f0;">Asal barang</th>
                                <th class="text-center w-24" rowspan="3" style="vertical-align: middle;">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center" rowspan="2" style="vertical-align: middle; border-right: 1px solid #e2e8f0; border-left: 1px solid #e2e8f0;">Beli Sendiri</th>
                                <th class="text-center" colspan="3" style="border-bottom: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0;">Bantuan</th>
                                <th class="text-center" rowspan="2" style="vertical-align: middle; border-right: 1px solid #e2e8f0;">Sumbangan</th>
                            </tr>
                            <tr>
                                <th class="text-center" style="border-right: 1px solid #e2e8f0;">Pusat</th>
                                <th class="text-center" style="border-right: 1px solid #e2e8f0;">Prov</th>
                                <th class="text-center" style="border-right: 1px solid #e2e8f0;">Kab</th>
                            </tr>
                        </thead>
                        <tbody id="inventaris-tbody">
                            <!-- Data -->
                        </tbody>
                        <tfoot id="inventaris-tfoot">
                            <tr>
                                <th colspan="3" class="text-right font-jakarta pr-6">TOTAL KESELURUHAN</th>
                                <th class="pribadi text-center font-bold text-blue-600">0</th>
                                <th class="pemerintah text-center font-bold text-blue-600">0</th>
                                <th class="provinsi text-center font-bold text-blue-600">0</th>
                                <th class="kabupaten text-center font-bold text-blue-600">0</th>
                                <th class="sumbangan text-center font-bold text-blue-600">0</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            const _url = `{{ ci_route('internal_api.inventaris') }}`
            const _tbody = document.getElementById('inventaris-tbody')
            const _tfoot = document.getElementById('inventaris-tfoot')
            
            $.ajax({
                url: _url,
                type: 'GET',
                dataType: 'json',
                success: (response) => {
                    document.getElementById('loading-container').style.display = 'none';
                    
                    if (!response.data || !response.data[0] || !response.data[0].attributes || response.data[0].attributes.length === 0) {
                        document.getElementById('empty-container').style.display = 'block';
                        return;
                    }
                    
                    document.getElementById('data-container').style.display = 'block';

                    let _trString = []
                    let _total = {
                        'pribadi': 0,
                        'pemerintah': 0,
                        'provinsi': 0,
                        'kabupaten': 0,
                        'sumbangan': 0
                    }

                    response.data[0].attributes.forEach((element, key) => {
                        _trString.push(`<tr>
                        <td class="text-center font-medium">${key + 1}</td>
                        <td class="font-semibold text-gray-800 font-jakarta">${element.jenis}</td>
                        <td class="text-gray-500 text-sm whitespace-normal"><div class="line-clamp-2">${element.ket}</div></td>
                        <td class="text-center font-medium">${element.pribadi}</td>
                        <td class="text-center font-medium">${element.pemerintah}</td>
                        <td class="text-center font-medium">${element.provinsi}</td>
                        <td class="text-center font-medium">${element.kabupaten}</td>
                        <td class="text-center font-medium">${element.sumbangan}</td>
                        <td class="text-center">
                            <a href="${element.url}" title="Lihat Detail ${element.jenis}" class="btn-action-modern">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </td>
                    </tr>`)
                        for (let i in _total) {
                            _total[i] += element[i]
                        }
                    });
                    
                    // Update tfoot with totals
                    for (let i in _total) {
                        const el = _tfoot.querySelector(`th.${i}`);
                        if(el) el.innerHTML = _total[i];
                    }
                    
                    _tbody.innerHTML = _trString.join('')

                    setTimeout(() => {
                        $('#inventaris').DataTable({
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                                search: "_INPUT_",
                                searchPlaceholder: "Cari data inventaris..."
                            },
                            columnDefs: [{
                                targets: [0, 8],
                                orderable: false
                            }],
                            order: [
                                [1, 'asc']
                            ],
                            drawCallback: function(settings) {
                                var api = this.api();
                                api.column(0, {
                                    search: 'applied',
                                    order: 'applied'
                                }).nodes().each(function(cell, i) {
                                    cell.innerHTML = '<span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-gray-100 text-xs font-bold">' + (api.page.info().start + i + 1) + '</span>';
                                });
                            }
                        });
                        
                        // Styling dataTables search and length
                        $('.dataTables_filter input').addClass('form-input rounded-xl border-gray-300 focus:border-[#0D2247] focus:ring-[#0D2247] py-2 px-4').removeClass('input-sm');
                        $('.dataTables_length select').addClass('form-select rounded-xl border-gray-300 focus:border-[#0D2247] focus:ring-[#0D2247] py-2 pl-3 pr-8').removeClass('input-sm');
                    }, 100);
                },
                error: (err) => {
                    document.getElementById('loading-container').style.display = 'none';
                    document.getElementById('empty-container').style.display = 'block';
                    document.getElementById('empty-container').innerHTML = `
                        <div class="bg-red-50 text-red-600 p-8 rounded-3xl text-center border border-red-100">
                            <i class="fas fa-exclamation-triangle text-4xl mb-4"></i>
                            <h3 class="font-bold font-jakarta text-xl mb-2">Gagal Memuat Data</h3>
                            <p>Terjadi kesalahan saat memuat data inventaris. Silakan coba lagi nanti.</p>
                        </div>
                    `;
                }
            })
        });
    </script>
@endpush
