@extends('theme::layouts.home')
@include('theme::commons.asset_sweetalert')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

    /* Category Badge Colors */
    .badge-pernag   { background: #EEF2FF; color: #4338CA; }
    .badge-perwalnag{ background: #ECFDF5; color: #065F46; }
    .badge-sk       { background: #FFF7ED; color: #C2410C; }
    .badge-default  { background: #F1F5F9; color: #475569; }

    /* Document Card */
    .doc-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        padding: 1.25rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: box-shadow .2s, transform .2s, border-color .2s;
        cursor: pointer;
    }
    .doc-card:hover {
        box-shadow: 0 8px 32px -8px rgba(13,34,71,.15);
        transform: translateY(-2px);
        border-color: #c7d2fe;
    }
    .doc-icon {
        width: 3rem; height: 3rem; border-radius: .75rem;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }

    /* Filter Tabs */
    .filter-tab {
        padding: .45rem 1.1rem; border-radius: 2rem;
        font-size: .8rem; font-weight: 700; cursor: pointer;
        border: 1.5px solid #e2e8f0; background: white; color: #64748b;
        transition: all .2s;
    }
    .filter-tab.active, .filter-tab:hover {
        background: #0D2247; color: white; border-color: #0D2247;
    }

    /* Custom Select Global */
    .custom-select-wrapper {
        position: relative;
        display: inline-flex;
        align-items: center;
    }
    .custom-select-wrapper .select-icon {
        position: absolute;
        left: 0.75rem;
        color: #94a3b8;
        font-size: 0.7rem;
        pointer-events: none;
        z-index: 1;
    }
    .custom-select-wrapper .select-chevron {
        position: absolute;
        right: 0.65rem;
        color: #94a3b8;
        font-size: 0.6rem;
        pointer-events: none;
        z-index: 1;
        transition: transform .2s;
    }
    .custom-select-wrapper select {
        appearance: none;
        -webkit-appearance: none;
        padding: 0.6rem 2.2rem 0.6rem 2.1rem;
        font-size: 0.82rem;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #374151;
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 0.75rem;
        cursor: pointer;
        transition: border-color .2s, box-shadow .2s;
        outline: none;
        min-width: 130px;
    }
    .custom-select-wrapper select:hover {
        border-color: #0D2247;
    }
    .custom-select-wrapper select:focus {
        border-color: #0D2247;
        box-shadow: 0 0 0 3px rgba(13,34,71,0.08);
    }
    .custom-select-wrapper select option {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 500;
        color: #374151;
        padding: 0.5rem;
    }
    .custom-select-wrapper select option:checked {
        background: #EEF2FF;
        color: #0D2247;
    }
    /* Search Input Global */
    .filter-search-wrap {
        position: relative;
    }
    .filter-search-wrap .search-icon {
        position: absolute;
        left: 0.9rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 0.8rem;
        pointer-events: none;
    }
    .filter-search-wrap input {
        padding: 0.6rem 1rem 0.6rem 2.4rem;
        font-size: 0.82rem;
        font-family: 'Plus Jakarta Sans', sans-serif;
        border: 1.5px solid #e2e8f0;
        border-radius: 0.75rem;
        outline: none;
        transition: border-color .2s, box-shadow .2s;
        width: 100%;
    }
    .filter-search-wrap input:focus {
        border-color: #0D2247;
        box-shadow: 0 0 0 3px rgba(13,34,71,0.08);
    }

    /* Skeleton */
    .skeleton-line { height: 1rem; border-radius: .5rem; background: linear-gradient(90deg,#e2e8f0 25%,#f1f5f9 50%,#e2e8f0 75%); background-size: 200% 100%; animation: shimmer 1.5s infinite; }
    @keyframes shimmer { 0% { background-position: 200% 0; } 100% { background-position: -200% 0; } }

    /* Pagination */
    .pg-btn { padding: .4rem .9rem; border-radius: .6rem; border: 1.5px solid #e2e8f0; background: white; color: #475569; font-size: .8rem; font-weight: 600; cursor: pointer; transition: all .2s; }
    .pg-btn:hover, .pg-btn.active { background: #0D2247; color: white; border-color: #0D2247; }
    .pg-btn:disabled { opacity: .35; cursor: not-allowed; }

    /* ── CUSTOM DROPDOWN ── */
    .cd-wrap { position: relative; display: inline-block; font-family: 'Plus Jakarta Sans', sans-serif; }
    .cd-wrap select { display: none !important; }

    .cd-btn {
        display: flex; align-items: center; gap: 0.5rem;
        padding: 0.6rem 0.9rem;
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 0.75rem;
        cursor: pointer;
        font-size: 0.82rem; font-weight: 600;
        color: #374151;
        min-width: 130px;
        transition: border-color .2s, box-shadow .2s;
        user-select: none;
        white-space: nowrap;
    }
    .cd-btn:hover { border-color: #0D2247; }
    .cd-btn.open { border-color: #0D2247; box-shadow: 0 0 0 3px rgba(13,34,71,.08); }
    .cd-btn .cd-btn-icon { color: #94a3b8; font-size: 0.72rem; flex-shrink: 0; }
    .cd-btn .cd-btn-label { flex: 1; overflow: hidden; text-overflow: ellipsis; }
    .cd-btn .cd-btn-chevron { color: #94a3b8; font-size: 0.6rem; flex-shrink: 0; transition: transform .25s; }
    .cd-btn.open .cd-btn-chevron { transform: rotate(180deg); }

    .cd-list {
        display: none;
        position: absolute; top: calc(100% + 6px); left: 0;
        min-width: 100%; max-height: 260px;
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 0.875rem;
        box-shadow: 0 8px 32px -4px rgba(13,34,71,.15), 0 2px 8px -2px rgba(0,0,0,.06);
        overflow: hidden;
        z-index: 999;
        animation: cdSlideIn .18s ease;
    }
    .cd-list.open { display: flex; flex-direction: column; }
    @keyframes cdSlideIn { from { opacity:0; transform: translateY(-6px); } to { opacity:1; transform: translateY(0); } }

    .cd-search-wrap {
        padding: 0.5rem 0.5rem 0.25rem;
        border-bottom: 1px solid #f1f5f9;
        flex-shrink: 0;
    }
    .cd-search {
        width: 100%; padding: 0.45rem 0.75rem;
        border: 1.5px solid #e2e8f0; border-radius: 0.5rem;
        font-size: 0.78rem; font-family: inherit;
        outline: none; transition: border-color .2s;
    }
    .cd-search:focus { border-color: #0D2247; }

    .cd-options { overflow-y: auto; max-height: 200px; padding: 0.3rem; }
    .cd-options::-webkit-scrollbar { width: 4px; }
    .cd-options::-webkit-scrollbar-track { background: transparent; }
    .cd-options::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 4px; }

    .cd-option {
        display: flex; align-items: center; gap: 0.6rem;
        padding: 0.55rem 0.75rem;
        border-radius: 0.5rem;
        cursor: pointer;
        font-size: 0.82rem; font-weight: 500;
        color: #374151;
        transition: background .15s;
    }
    .cd-option:hover { background: #F5F7FF; }
    .cd-option.selected { background: #EEF2FF; color: #0D2247; font-weight: 700; }
    .cd-option .cd-check { font-size: 0.7rem; color: #0D2247; margin-left: auto; opacity: 0; }
    .cd-option.selected .cd-check { opacity: 1; }
    .cd-option .cd-opt-icon { font-size: 0.7rem; color: #94a3b8; flex-shrink: 0; }
    .cd-empty { padding: 1rem; text-align: center; color: #94a3b8; font-size: 0.8rem; }
</style>
@endpush


@section('content')

{{-- ── HERO ── --}}
<section class="relative bg-[#0D2247] text-white overflow-hidden font-jakarta" style="min-height:240px;">
    <div class="absolute inset-0 opacity-10"
         style="background-image:url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=1600&q=80');background-size:cover;background-position:center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="flex items-center gap-2 text-xs mb-5">
            <a href="{{ site_url('/') }}" class="text-white/60 hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px] text-white/30"></i>
            <span class="text-white font-semibold">Produk Hukum</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-widest text-[10px] uppercase block mb-2">Regulasi Nagari</span>
        <h1 class="text-4xl md:text-5xl font-extrabold drop-shadow-md mb-3">Produk Hukum Nagari</h1>
        <p class="text-white/65 max-w-xl text-sm">Kumpulan Peraturan Nagari, Peraturan Wali Nagari, Surat Keputusan, dan regulasi resmi lainnya.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 40L0 20Q720 0 1440 20L1440 40Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

{{-- ── CONTENT ── --}}
<div class="bg-gray-50 min-h-screen font-jakarta">
<div class="container mx-auto px-4 max-w-5xl py-10">

    {{-- Search & Filter Bar --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-6 flex flex-col sm:flex-row gap-3 items-start sm:items-center justify-between">
        {{-- Search Input --}}
        <div class="filter-search-wrap flex-1 max-w-sm">
            <i class="fas fa-search search-icon"></i>
            <input id="search-input" type="text" placeholder="Cari dokumen...">
        </div>

        {{-- Filters --}}
        <div class="flex gap-2 flex-wrap items-center">
            {{-- Year filter --}}
            <div class="custom-select-wrapper">
                <i class="fas fa-calendar-alt select-icon"></i>
                <select id="year-filter">
                    <option value="">Semua Tahun</option>
                </select>
                <i class="fas fa-chevron-down select-chevron"></i>
            </div>

            {{-- Category filter --}}
            <div class="custom-select-wrapper" style="min-width:160px">
                <i class="fas fa-tag select-icon"></i>
                <select id="kategori-filter">
                    <option value="">Semua Kategori</option>
                </select>
                <i class="fas fa-chevron-down select-chevron"></i>
            </div>
        </div>
    </div>


    {{-- Stats --}}
    <div id="stats-bar" class="text-xs text-gray-400 mb-4 px-1 hidden">
        Menampilkan <span id="stats-count" class="font-bold text-gray-600"></span> dokumen
    </div>

    {{-- Skeleton --}}
    <div id="skeleton-list" class="space-y-3">
        @for($i = 0; $i < 6; $i++)
            <div class="doc-card">
                <div class="doc-icon bg-gray-100"></div>
                <div class="flex-1 space-y-2">
                    <div class="skeleton-line w-3/4"></div>
                    <div class="skeleton-line w-1/3"></div>
                </div>
                <div class="skeleton-line w-20 h-8 rounded-xl"></div>
            </div>
        @endfor
    </div>

    {{-- Document List --}}
    <div id="doc-list" class="space-y-3 hidden"></div>

    {{-- Empty State --}}
    <div id="empty-state" class="hidden text-center py-20">
        <div class="w-20 h-20 mx-auto mb-5 rounded-full bg-gray-100 flex items-center justify-center">
            <i class="fas fa-file-alt text-3xl text-gray-300"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-700 mb-1">Belum Ada Dokumen</h3>
        <p class="text-gray-400 text-sm">Belum ada produk hukum yang dipublikasikan.</p>
    </div>

    {{-- Pagination --}}
    <div id="pagination" class="mt-8 flex justify-center gap-2 flex-wrap hidden"></div>

</div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
    const apiUrl   = `{{ route('api.produk-hukum') }}`;
    const tahunUrl = `{{ route('api.tahun-produk-hukum') }}`;
    const katUrl   = `{{ route('api.kategori-produk-hukum') }}`;
    const PAGE_SIZE = 12;

    let currentPage = 1;
    let totalPages  = 1;
    let allTahun    = [];
    let allKategori = [];
    let searchTimer = null;

    // Warna badge berdasarkan nama kategori
    function badgeClass(nama) {
        const n = (nama || '').toLowerCase();
        if (n.includes('peraturan nagari') || n.includes('pernag')) return 'badge-pernag';
        if (n.includes('peraturan wali') || n.includes('perwalnag')) return 'badge-perwalnag';
        if (n.includes('surat keputusan') || n.includes('sk')) return 'badge-sk';
        return 'badge-default';
    }

    // Warna ikon dokumen
    function iconStyle(nama) {
        const n = (nama || '').toLowerCase();
        if (n.includes('peraturan nagari')) return 'background:#EEF2FF;color:#4338CA';
        if (n.includes('peraturan wali'))  return 'background:#ECFDF5;color:#065F46';
        if (n.includes('sk') || n.includes('surat keputusan')) return 'background:#FFF7ED;color:#C2410C';
        return 'background:#F1F5F9;color:#64748b';
    }

    // Muat dropdown tahun
    $.get(tahunUrl, function (res) {
        const validYears = (res.data || []).filter(function(t) {
            // Buang tahun 0, null, kosong, atau tidak valid
            const y = parseInt(t);
            return t && y > 1900 && y <= new Date().getFullYear() + 1;
        });
        validYears.forEach(function (t) {
            $('#year-filter').append(`<option value="${t}">${t}</option>`);
        });
        if (window._yearDD) window._yearDD.refresh();
    });

    // Muat dropdown kategori
    $.get(katUrl, function (res) {
        (res.data || []).forEach(function (k) {
            const label = k.attributes?.nama || k.nama || k;
            const val   = k.id || label;
            $('#kategori-filter').append(`<option value="${val}">${label}</option>`);
        });
        if (window._katDD) window._katDD.refresh();
    });

    // Muat data utama
    function loadData(page) {
        currentPage = page;

        $('#skeleton-list').removeClass('hidden');
        $('#doc-list').addClass('hidden');
        $('#empty-state').addClass('hidden');
        $('#pagination').addClass('hidden');
        $('#stats-bar').addClass('hidden');

        const params = {
            'page[number]': page,
            'page[size]': PAGE_SIZE,
            'sort': '-tgl_upload',
        };

        const tahun = $('#year-filter').val();
        const kat   = $('#kategori-filter').val();
        const cari  = $('#search-input').val().trim();
        if (tahun)  params['filter[tahun]']    = tahun;
        if (kat)    params['filter[kategori]'] = kat;
        if (cari)   params['filter[search]']   = cari;

        $.get(apiUrl, params, function (res) {
            $('#skeleton-list').addClass('hidden');

            const items = res.data || [];
            const meta  = res.meta?.pagination || {};
            totalPages  = meta.total_pages || 1;

            if (items.length === 0) {
                $('#empty-state').removeClass('hidden');
                return;
            }

            // Hitung total
            const total = meta.total || items.length;
            $('#stats-count').text(total);
            $('#stats-bar').removeClass('hidden');

            // Render cards
            const list = $('#doc-list').empty();
            items.forEach(function (item) {
                const attr = item.attributes || {};
                const nama     = attr.nama || '-';
                const tahun    = attr.tahun || '-';
                const kategori = attr.kategori || 'Dokumen';
                const url      = attr.url || attr.satuan || '';

                const card = `
                <div class="doc-card" onclick="viewDokumen('${nama.replace(/'/g,"\\'")}','${url}')">
                    <div class="doc-icon" style="${iconStyle(kategori)}">
                        <i class="fas fa-file-alt text-lg"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 text-sm leading-snug truncate">${nama}</p>
                        <div class="flex items-center gap-2 mt-1.5 flex-wrap">
                            <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-full ${badgeClass(kategori)}">${kategori}</span>
                            <span class="text-gray-400 text-xs"><i class="fas fa-calendar-alt mr-1"></i>${tahun}</span>
                        </div>
                    </div>
                    <button class="flex-shrink-0 bg-[#0D2247] hover:bg-[#1a3a6e] text-white text-xs font-bold px-4 py-2 rounded-xl transition flex items-center gap-1.5">
                        <i class="fas fa-eye"></i><span class="hidden sm:inline">Lihat</span>
                    </button>
                </div>`;
                list.append(card);
            });

            list.removeClass('hidden');
            renderPagination(meta);

        }).fail(function() {
            $('#skeleton-list').addClass('hidden');
            $('#empty-state').removeClass('hidden');
        });
    }

    // Render pagination
    function renderPagination(meta) {
        const pg = $('#pagination').empty();
        if (!meta || totalPages <= 1) { pg.addClass('hidden'); return; }

        pg.removeClass('hidden');

        function btn(label, page, active = false, disabled = false) {
            return $(`<button class="pg-btn${active?' active':''}" ${disabled?'disabled':''}>${label}</button>`)
                .on('click', function() { if (!disabled) loadData(page); });
        }

        pg.append(btn('<i class="fas fa-chevron-left"></i>', currentPage - 1, false, currentPage === 1));

        for (let p = 1; p <= totalPages; p++) {
            if (totalPages > 7 && p > 2 && p < totalPages - 1 && Math.abs(p - currentPage) > 1) {
                if (p === 3 || p === totalPages - 2) {
                    pg.append($('<span class="px-1 text-gray-300">…</span>'));
                }
                continue;
            }
            pg.append(btn(p, p, p === currentPage));
        }

        pg.append(btn('<i class="fas fa-chevron-right"></i>', currentPage + 1, false, currentPage === totalPages));
    }

    // Filter events
    $('#year-filter, #kategori-filter').on('change', function() { loadData(1); });
    $('#search-input').on('input', function() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => loadData(1), 400);
    });

    loadData(1);
});

// Global: lihat dokumen (SweetAlert PDF viewer)
function viewDokumen(nama, url) {
    if (!url) {
        Swal.fire('Info', 'File tidak tersedia.', 'info');
        return;
    }
    Swal.fire({
        title: `<span class="font-jakarta font-bold text-base text-gray-800">${nama}</span>`,
        html: `
            <div style="display:flex;flex-direction:column;gap:12px;align-items:center;">
                <iframe src="${url}" style="width:100%;height:480px;border:1px solid #e2e8f0;border-radius:12px;" frameborder="0"></iframe>
                <a href="${url}" download class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white font-bold px-6 py-2.5 rounded-xl text-sm transition">
                    <i class="fas fa-download"></i> Unduh File
                </a>
            </div>`,
        width: '72%',
        showConfirmButton: false,
        showCloseButton: true,
        heightAuto: true,
    });
}

// ══════════════════════════════════════════
//  CustomDropdown — engine dropdown cantik
// ══════════════════════════════════════════
class CustomDropdown {
    constructor(selectEl, opts = {}) {
        this.select      = selectEl;
        this.icon        = opts.icon || 'fa-list';
        this.searchable  = opts.searchable !== false;
        this.placeholder = opts.placeholder || (selectEl.options[0] ? selectEl.options[0].text : 'Pilih...');
        this._build();
        this._bind();
    }

    _build() {
        const sel = this.select;
        const wrap = document.createElement('div');
        wrap.className = 'cd-wrap';
        sel.parentNode.insertBefore(wrap, sel);
        wrap.appendChild(sel);

        // Trigger button
        this.btn = document.createElement('div');
        this.btn.className = 'cd-btn';
        this.btn.innerHTML = `
            <i class="fas ${this.icon} cd-btn-icon"></i>
            <span class="cd-btn-label">${this.placeholder}</span>
            <i class="fas fa-chevron-down cd-btn-chevron"></i>`;
        wrap.appendChild(this.btn);

        // Dropdown panel
        this.list = document.createElement('div');
        this.list.className = 'cd-list';
        if (this.searchable) {
            this.list.innerHTML = `
                <div class="cd-search-wrap">
                    <input class="cd-search" type="text" placeholder="Cari...">
                </div>
                <div class="cd-options"></div>`;
            this.searchInput = this.list.querySelector('.cd-search');
        } else {
            this.list.innerHTML = `<div class="cd-options"></div>`;
        }
        this.optionsEl = this.list.querySelector('.cd-options');
        wrap.appendChild(this.list);
        this.wrap = wrap;
        this._renderOptions();
        this._updateLabel();
    }

    _renderOptions(filter) {
        const opts    = Array.from(this.select.options);
        const current = this.select.value;
        const q       = (filter || '').toLowerCase();
        const filtered= opts.filter(function(o) { return !q || o.text.toLowerCase().includes(q); });
        this.optionsEl.innerHTML = '';
        if (!filtered.length) {
            this.optionsEl.innerHTML = '<div class="cd-empty"><i class="fas fa-search" style="margin-right:4px"></i>Tidak ditemukan</div>';
            return;
        }
        const self = this;
        filtered.forEach(function(opt) {
            const item = document.createElement('div');
            item.className = 'cd-option' + (opt.value === current ? ' selected' : '');
            item.dataset.value = opt.value;
            item.innerHTML = `<span>${opt.text}</span><i class="fas fa-check cd-check"></i>`;
            item.addEventListener('click', function() { self._choose(opt.value, opt.text); });
            self.optionsEl.appendChild(item);
        });
    }

    _choose(value, text) {
        this.select.value = value;
        this.select.dispatchEvent(new Event('change', { bubbles: true }));
        this._updateLabel(text);
        this._renderOptions();
        this.close();
    }

    _updateLabel(text) {
        const label = text || (this.select.options[this.select.selectedIndex] ? this.select.options[this.select.selectedIndex].text : this.placeholder);
        this.btn.querySelector('.cd-btn-label').textContent = label;
    }

    _bind() {
        const self = this;
        this.btn.addEventListener('click', function(e) {
            e.stopPropagation();
            self.isOpen ? self.close() : self.open();
        });
        if (this.searchInput) {
            this.searchInput.addEventListener('input', function(e) { self._renderOptions(e.target.value); });
            this.searchInput.addEventListener('click', function(e) { e.stopPropagation(); });
        }
        document.addEventListener('click', function(e) {
            if (!self.wrap.contains(e.target)) self.close();
        });
    }

    open() {
        document.querySelectorAll('.cd-list.open').forEach(function(l) { l.classList.remove('open'); });
        document.querySelectorAll('.cd-btn.open').forEach(function(b) { b.classList.remove('open'); });
        this.list.classList.add('open');
        this.btn.classList.add('open');
        this.isOpen = true;
        if (this.searchInput) {
            this.searchInput.value = '';
            this._renderOptions();
            setTimeout(function() { this.searchInput && this.searchInput.focus(); }.bind(this), 60);
        }
    }

    close() {
        this.list.classList.remove('open');
        this.btn.classList.remove('open');
        this.isOpen = false;
    }

    refresh() { this._renderOptions(); this._updateLabel(); }
}

// Inisialisasi setelah DOM ready
document.addEventListener('DOMContentLoaded', function() {
    window._yearDD = new CustomDropdown(
        document.getElementById('year-filter'),
        { icon: 'fa-calendar-alt', placeholder: 'Semua Tahun', searchable: false }
    );
    window._katDD = new CustomDropdown(
        document.getElementById('kategori-filter'),
        { icon: 'fa-tag', placeholder: 'Semua Kategori', searchable: false }
    );
});
</script>
@endpush

