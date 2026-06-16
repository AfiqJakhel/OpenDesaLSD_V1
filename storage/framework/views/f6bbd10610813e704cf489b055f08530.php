<?php echo $__env->make('theme::commons.asset_peta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    /* Custom Select & Search - Sama seperti Produk Hukum */
    .filter-search-wrap { position: relative; }
    .filter-search-wrap .search-icon { position: absolute; left: 0.9rem; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 0.8rem; pointer-events: none; }
    .filter-search-wrap input { padding: 0.6rem 1rem 0.6rem 2.4rem; font-size: 0.82rem; font-family: 'Plus Jakarta Sans', sans-serif; border: 1.5px solid #e2e8f0; border-radius: 0.75rem; outline: none; transition: border-color .2s, box-shadow .2s; width: 100%; }
    .filter-search-wrap input:focus { border-color: #0D2247; box-shadow: 0 0 0 3px rgba(13,34,71,0.08); }

    /* CUSTOM DROPDOWN CSS */
    .cd-wrap { position: relative; display: inline-block; font-family: 'Plus Jakarta Sans', sans-serif; min-width: 180px;}
    .cd-wrap select { display: none !important; }
    .cd-btn { display: flex; align-items: center; gap: 0.5rem; padding: 0.6rem 0.9rem; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 0.75rem; cursor: pointer; font-size: 0.82rem; font-weight: 600; color: #374151; transition: border-color .2s, box-shadow .2s; user-select: none; white-space: nowrap; }
    .cd-btn:hover { border-color: #0D2247; }
    .cd-btn.open { border-color: #0D2247; box-shadow: 0 0 0 3px rgba(13,34,71,.08); }
    .cd-btn .cd-btn-icon { color: #94a3b8; font-size: 0.72rem; flex-shrink: 0; }
    .cd-btn .cd-btn-label { flex: 1; overflow: hidden; text-overflow: ellipsis; }
    .cd-btn .cd-btn-chevron { color: #94a3b8; font-size: 0.6rem; flex-shrink: 0; transition: transform .25s; }
    .cd-btn.open .cd-btn-chevron { transform: rotate(180deg); }
    .cd-list { display: none; position: absolute; top: calc(100% + 6px); left: 0; min-width: 100%; max-height: 260px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 0.875rem; box-shadow: 0 8px 32px -4px rgba(13,34,71,.15), 0 2px 8px -2px rgba(0,0,0,.06); overflow: hidden; z-index: 999; animation: cdSlideIn .18s ease; }
    .cd-list.open { display: flex; flex-direction: column; }
    @keyframes cdSlideIn { from { opacity:0; transform: translateY(-6px); } to { opacity:1; transform: translateY(0); } }
    .cd-search-wrap { padding: 0.5rem 0.5rem 0.25rem; border-bottom: 1px solid #f1f5f9; flex-shrink: 0; }
    .cd-search { width: 100%; padding: 0.45rem 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 0.5rem; font-size: 0.78rem; font-family: inherit; outline: none; transition: border-color .2s; }
    .cd-search:focus { border-color: #0D2247; }
    .cd-options { overflow-y: auto; max-height: 200px; padding: 0.3rem; }
    .cd-options::-webkit-scrollbar { width: 4px; }
    .cd-options::-webkit-scrollbar-track { background: transparent; }
    .cd-options::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 4px; }
    .cd-option { display: flex; align-items: center; gap: 0.6rem; padding: 0.55rem 0.75rem; border-radius: 0.5rem; cursor: pointer; font-size: 0.82rem; font-weight: 500; color: #374151; transition: background .15s; }
    .cd-option:hover { background: #F5F7FF; }
    .cd-option.selected { background: #EEF2FF; color: #0D2247; font-weight: 700; }
    .cd-option .cd-check { font-size: 0.7rem; color: #0D2247; margin-left: auto; opacity: 0; }
    .cd-option.selected .cd-check { opacity: 1; }
    .cd-empty { padding: 1rem; text-align: center; color: #94a3b8; font-size: 0.8rem; }

    /* Skeleton */
    .skeleton-box { background: linear-gradient(90deg,#e2e8f0 25%,#f1f5f9 50%,#e2e8f0 75%); background-size: 200% 100%; animation: shimmer 1.5s infinite; }
    @keyframes shimmer { 0% { background-position: 200% 0; } 100% { background-position: -200% 0; } }

    /* Pagination */
    .pg-btn { padding: .4rem .9rem; border-radius: .6rem; border: 1.5px solid #e2e8f0; background: white; color: #475569; font-size: .8rem; font-weight: 600; cursor: pointer; transition: all .2s; }
    .pg-btn:hover, .pg-btn.active { background: #0D2247; color: white; border-color: #0D2247; }
    .pg-btn:disabled { opacity: .35; cursor: not-allowed; }

    /* Product Card CSS */
    .product-card {
        background: white; border-radius: 1.25rem; overflow: hidden;
        border: 1.5px solid #f1f5f9; box-shadow: 0 4px 12px -4px rgba(0,0,0,0.05);
        transition: all 0.3s;
        display: flex; flex-direction: column; height: 100%;
    }
    .product-card:hover { transform: translateY(-4px); box-shadow: 0 12px 24px -8px rgba(0,0,0,0.1); border-color: #e2e8f0; }
    .owl-carousel .owl-nav { display: none !important; }
    .owl-carousel .owl-dots { position: absolute; bottom: 8px; left: 0; right: 0; text-align: center; }
    .owl-carousel .owl-dot span { width: 6px !important; height: 6px !important; background: rgba(255,255,255,0.5) !important; margin: 0 3px !important; transition: all 0.2s !important; }
    .owl-carousel .owl-dot.active span { background: white !important; width: 12px !important; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden font-jakarta" style="min-height:240px;">
    <div class="absolute inset-0 opacity-10"
         style="background-image:url('https://images.unsplash.com/photo-1542838132-92c53300491e?w=1600&q=80');background-size:cover;background-position:center;"></div>
    <div class="container mx-auto px-4 max-w-6xl py-16 relative z-10">
        <nav class="flex items-center gap-2 text-xs mb-5">
            <a href="<?php echo e(site_url('/')); ?>" class="text-white/60 hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px] text-white/30"></i>
            <span class="text-white font-semibold">Lapak</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Pasar Online</span>
        <h1 class="text-4xl md:text-5xl font-extrabold drop-shadow-md mb-3">Lapak Nagari</h1>
        <p class="text-white/65 max-w-xl text-sm">Temukan produk unggulan dan hasil karya masyarakat Nagari Koto Tangah Batu Ampa.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-gray-50 min-h-screen font-jakarta">
<div class="container mx-auto px-4 max-w-6xl py-10">

    
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-8 flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
        
        <div class="filter-search-wrap flex-1 w-full max-w-md">
            <i class="fas fa-search search-icon"></i>
            <input id="search-input" type="text" placeholder="Cari produk...">
        </div>

        
        <div class="flex gap-2 flex-wrap items-center">
            <div class="cd-wrap">
                <select id="kategori-filter">
                    <option value="">Semua Kategori</option>
                </select>
            </div>
        </div>
    </div>

    
    <div id="stats-bar" class="text-xs text-gray-400 mb-4 px-1 hidden flex justify-between items-center">
        <span>Menampilkan <span id="stats-count" class="font-bold text-gray-600"></span> produk</span>
    </div>

    
    <div id="skeleton-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php for($i = 0; $i < 8; $i++): ?>
            <div class="product-card">
                <div class="skeleton-box h-48 w-full"></div>
                <div class="p-5 space-y-3 flex-1">
                    <div class="skeleton-box w-3/4 h-4 rounded"></div>
                    <div class="skeleton-box w-1/2 h-6 rounded"></div>
                    <div class="skeleton-box w-full h-3 rounded mt-2"></div>
                    <div class="skeleton-box w-5/6 h-3 rounded"></div>
                </div>
                <div class="p-4 border-t border-gray-50 flex gap-2">
                    <div class="skeleton-box h-9 w-full rounded-xl"></div>
                    <div class="skeleton-box h-9 w-10 rounded-xl flex-shrink-0"></div>
                </div>
            </div>
        <?php endfor; ?>
    </div>

    
    <div id="produk-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 hidden"></div>

    
    <div id="empty-state" class="hidden bg-white rounded-3xl p-8 md:p-12 text-center border border-gray-100 shadow-sm my-8">
        <?php echo $__env->make('theme::partials.empty_state', [
            'title'       => 'Produk Tidak Ditemukan',
            'description' => 'Maaf, belum ada produk yang sesuai dengan pencarian atau filter Anda.',
            'icon'        => 'fa-box-open'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <button id="btn-reset" class="mt-6 bg-[#0D2247] hover:bg-[#1a3a6e] text-white text-sm font-bold px-6 py-2.5 rounded-xl transition shadow-md">
            Reset Pencarian
        </button>
    </div>

    
    <div id="pagination" class="flex justify-center gap-1.5 mt-10 hidden flex-wrap"></div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
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
        this.btn = document.createElement('div');
        this.btn.className = 'cd-btn';
        this.btn.innerHTML = `<i class="fas ${this.icon} cd-btn-icon"></i><span class="cd-btn-label">${this.placeholder}</span><i class="fas fa-chevron-down cd-btn-chevron"></i>`;
        wrap.appendChild(this.btn);
        this.list = document.createElement('div');
        this.list.className = 'cd-list';
        if (this.searchable) {
            this.list.innerHTML = `<div class="cd-search-wrap"><input class="cd-search" type="text" placeholder="Cari..."></div><div class="cd-options"></div>`;
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
        const opts = Array.from(this.select.options);
        const current = this.select.value;
        const q = (filter || '').toLowerCase();
        const filtered = opts.filter(o => !q || o.text.toLowerCase().includes(q));
        this.optionsEl.innerHTML = '';
        if (!filtered.length) {
            this.optionsEl.innerHTML = '<div class="cd-empty">Tidak ditemukan</div>';
            return;
        }
        filtered.forEach(opt => {
            const item = document.createElement('div');
            item.className = 'cd-option' + (opt.value === current ? ' selected' : '');
            item.dataset.value = opt.value;
            item.innerHTML = `<span>${opt.text}</span><i class="fas fa-check cd-check"></i>`;
            item.addEventListener('click', () => this._choose(opt.value, opt.text));
            this.optionsEl.appendChild(item);
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
        this.btn.addEventListener('click', e => { e.stopPropagation(); this.isOpen ? this.close() : this.open(); });
        if (this.searchInput) {
            this.searchInput.addEventListener('input', e => this._renderOptions(e.target.value));
            this.searchInput.addEventListener('click', e => e.stopPropagation());
        }
        document.addEventListener('click', e => { if (!this.wrap.contains(e.target)) this.close(); });
    }
    open() {
        document.querySelectorAll('.cd-list.open').forEach(l => l.classList.remove('open'));
        document.querySelectorAll('.cd-btn.open').forEach(b => b.classList.remove('open'));
        this.list.classList.add('open');
        this.btn.classList.add('open');
        this.isOpen = true;
        if (this.searchInput) {
            this.searchInput.value = '';
            this._renderOptions();
            setTimeout(() => this.searchInput && this.searchInput.focus(), 60);
        }
    }
    close() { this.list.classList.remove('open'); this.btn.classList.remove('open'); this.isOpen = false; }
    refresh() { this._renderOptions(); this._updateLabel(); }
}

$(document).ready(function() {
    // Inisialisasi API
    const apiKategori = '<?php echo e(route('api.lapak.kategori')); ?>';
    const apiProduk   = '<?php echo e(route('api.lapak.produk')); ?>';
    
    // Inisialisasi custom dropdown
    window._katDD = new CustomDropdown(document.getElementById('kategori-filter'), { icon: 'fa-tags', placeholder: 'Semua Kategori', searchable: true });

    // Load Kategori
    $.get(apiKategori, function(res) {
        const kategori = res.data || [];
        kategori.forEach(function(item) {
            $('#kategori-filter').append(`<option value="${item.id}">${item.attributes.kategori}</option>`);
        });
        window._katDD.refresh();
    });

    let searchTimer;
    let currentPage = 1;
    let totalPages = 1;
    let PAGE_SIZE = 8; // Lapak default page size

    function loadProduk(page = 1) {
        currentPage = page;
        $('#skeleton-list').removeClass('hidden');
        $('#produk-list').addClass('hidden').empty();
        $('#empty-state').addClass('hidden');
        $('#pagination').addClass('hidden');
        $('#stats-bar').addClass('hidden');

        const params = {
            'page[number]': page,
            'page[size]': PAGE_SIZE
        };

        const kategori = $('#kategori-filter').val();
        const search   = $('#search-input').val().trim();

        if (kategori) params['filter[id_produk_kategori]'] = kategori;
        if (search)   params['filter[search]'] = search;

        $.get(apiProduk, params, function(res) {
            $('#skeleton-list').addClass('hidden');
            const produk = res.data || [];
            const meta = res.meta?.pagination || {};
            totalPages = meta.total_pages || 1;

            if (!produk.length) {
                $('#empty-state').removeClass('hidden');
                return;
            }

            $('#stats-count').text(meta.total || produk.length);
            $('#stats-bar').removeClass('hidden');

            const list = $('#produk-list');
            produk.forEach(function(item) {
                const attr = item.attributes;
                const nama = attr.nama;
                const harga = formatRupiah(attr.harga, 'Rp ');
                const hargaDiskon = formatRupiah(attr.harga_diskon, 'Rp ');
                const diskonBadge = (attr.harga !== attr.harga_diskon) ? 
                    `<span class="absolute top-3 left-3 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded-lg z-10 shadow-sm">PROMO</span>` : '';
                
                const hargaHtml = (attr.harga !== attr.harga_diskon) ?
                    `<div class="flex items-center gap-2"><span class="text-sm text-gray-400 line-through">${harga}</span><span class="text-lg font-bold text-emerald-600">${hargaDiskon}</span></div>` :
                    `<div class="text-lg font-bold text-emerald-600">${hargaDiskon}</div>`;

                let fotoHTML = '<div class="owl-carousel relative h-48 w-full bg-gray-100">';
                (attr.foto || []).forEach(function(fotoUrl) {
                    fotoHTML += `<div class="item h-48 w-full"><img src="${fotoUrl}" loading="lazy" class="h-full w-full object-cover" alt="Foto ${nama.replace(/'/g,"\\'").replace(/"/g,"&quot;")}"></div>`;
                });
                fotoHTML += '</div>';

                const pelapakNama = attr.pelapak?.penduduk?.nama || 'Admin';

                const cardHtml = `
                    <div class="product-card">
                        <div class="relative">
                            ${diskonBadge}
                            ${fotoHTML}
                        </div>
                        <div class="p-5 flex-1 flex flex-col">
                            <h3 class="font-bold text-gray-800 text-[15px] leading-tight mb-2 line-clamp-2" title="${nama.replace(/"/g,"&quot;")}">${nama}</h3>
                            <div class="text-[12px] text-gray-500 mb-3 line-clamp-2">${attr.deskripsi || ''}</div>
                            <div class="mt-auto pt-2 border-t border-gray-100 border-dashed">
                                ${hargaHtml}
                                <div class="text-[11px] text-gray-500 mt-1 flex justify-between items-center font-medium">
                                    <span><i class="fas fa-store text-emerald-500 mr-1"></i> ${pelapakNama}</span>
                                    <span class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded text-[10px]">${attr.satuan}</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-50">
                            <a href="${attr.pesan_wa}" target="_blank" class="w-full bg-[#0D2247] hover:bg-[#1a3a6e] text-white text-xs font-bold py-2.5 rounded-xl transition flex items-center justify-center gap-2">
                                <i class="fab fa-whatsapp text-sm"></i> Beli
                            </a>
                        </div>
                    </div>
                `;
                list.append(cardHtml);
            });

            list.removeClass('hidden');

            // Initialize carousel
            list.find('.owl-carousel').owlCarousel({
                items: 1, loop: true, margin: 0, nav: false, dots: true, autoplay: true, autoplayTimeout: 4000
            });

            renderPagination(meta);
        }).fail(function() {
            $('#skeleton-list').addClass('hidden');
            $('#empty-state').removeClass('hidden');
        });
    }

    function renderPagination(meta) {
        const pg = $('#pagination').empty();
        if (!meta || totalPages <= 1) { pg.addClass('hidden'); return; }
        pg.removeClass('hidden');

        const btn = (label, page, active = false, disabled = false) => {
            return $(`<button class="pg-btn${active?' active':''}" ${disabled?'disabled':''}>${label}</button>`)
                .on('click', () => { if (!disabled) loadProduk(page); });
        };

        pg.append(btn('<i class="fas fa-chevron-left"></i>', currentPage - 1, false, currentPage === 1));
        for (let p = 1; p <= totalPages; p++) {
            if (totalPages > 7 && p > 2 && p < totalPages - 1 && Math.abs(p - currentPage) > 1) {
                if (p === 3 || p === totalPages - 2) pg.append($('<span class="px-1 text-gray-300">…</span>'));
                continue;
            }
            pg.append(btn(p, p, p === currentPage));
        }
        pg.append(btn('<i class="fas fa-chevron-right"></i>', currentPage + 1, false, currentPage === totalPages));
    }

    // Events
    $('#kategori-filter').on('change', () => loadProduk(1));
    $('#search-input').on('input', () => {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => loadProduk(1), 400);
    });
    $('#btn-reset').on('click', () => {
        $('#search-input').val('');
        $('#kategori-filter').val('');
        window._katDD.refresh();
        loadProduk(1);
    });

    // Initial load
    loadProduk(1);
});

// View Lokasi SweetAlert Function
function viewLokasi(lat, lng, zoom, title) {
    if (!lat || !lng) {
        Swal.fire('Info', 'Pelapak belum menentukan koordinat lokasi.', 'info');
        return;
    }
    
    Swal.fire({
        title: `<span class="font-jakarta font-bold text-base text-gray-800">Lokasi: ${title}</span>`,
        html: `<div id="swal-map" style="width:100%;height:380px;border-radius:12px;border:1px solid #e2e8f0;z-index:10;"></div>`,
        width: '72%',
        showConfirmButton: false,
        showCloseButton: true,
        didOpen: () => {
            const mapOptions = { maxZoom: setting.max_zoom_peta, minZoom: setting.min_zoom_peta };
            if (window.pelapakMap) window.pelapakMap.remove();
            
            // Wait slight delay to ensure DOM is ready for Leaflet
            setTimeout(() => {
                window.pelapakMap = L.map('swal-map', mapOptions).setView([lat, lng], zoom || 15);
                getBaseLayers(window.pelapakMap, setting.mapbox_key, setting.jenis_peta);
                
                const markerIcon = L.icon({ iconUrl: setting.icon_lapak_peta || 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png' });
                L.marker([lat, lng], { icon: markerIcon })
                 .addTo(window.pelapakMap)
                 .bindPopup(`<div class="font-jakarta font-bold">${title}</div>`)
                 .openPopup();
                 
                L.control.scale().addTo(window.pelapakMap);
            }, 100);
        }
    });
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/lapak/index.blade.php ENDPATH**/ ?>