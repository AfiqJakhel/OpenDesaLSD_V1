@extends('theme::layouts.full-content')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
.font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

/* Tab Nav */
.bab-tab {
    display: inline-flex; align-items: center; gap: .4rem;
    padding: .65rem 1.2rem; font-size: .78rem; font-weight: 600;
    color: #6b7280; border-bottom: 3px solid transparent;
    transition: all .2s; white-space: nowrap; cursor: pointer;
    text-decoration: none; background: none; border-top: none; border-left: none; border-right: none;
}
.bab-tab:hover  { color: #0D2247; border-bottom-color: #c8973a55; }
.bab-tab.active { color: #0D2247; border-bottom-color: #c8973a; font-weight: 700; }

/* Bab Content */
.bab-content { display: none; }
.bab-content.active { display: block; }

/* Card */
.rpjm-card {
    background: white; border-radius: 1.25rem;
    border: 1.5px solid #f3f4f6;
    box-shadow: 0 4px 16px -4px rgba(0,0,0,.07);
    transition: all .3s;
}
.rpjm-card:hover { transform: translateY(-3px); box-shadow: 0 12px 32px -6px rgba(0,0,0,.12); }

/* Info row */
.info-row { display: flex; gap: .75rem; padding: .7rem 0; border-bottom: 1px solid #f3f4f6; }
.info-row:last-child { border-bottom: none; }
.info-label { font-size: .75rem; font-weight: 600; color: #6b7280; min-width: 160px; flex-shrink: 0; padding-top: 2px; }
.info-value  { font-size: .85rem; color: #1f2937; font-weight: 500; }

/* Stat pill */
.stat-pill {
    background: linear-gradient(135deg, #0D2247 0%, #1a3866 100%);
    color: white; border-radius: 1rem; padding: 1.25rem 1.5rem;
    text-align: center;
}

/* Misi card */
.misi-card {
    border-left: 4px solid #c8973a;
    background: white; border-radius: 0 1rem 1rem 0;
    padding: 1rem 1.25rem;
    box-shadow: 0 2px 8px rgba(0,0,0,.06);
}

/* Accordion */
.accordion-btn { width: 100%; text-align: left; background: none; border: none; cursor: pointer; }
.accordion-body { display: none; }
.accordion-body.open { display: block; }

/* Section accent */
.sec-accent { width: 4px; height: 24px; border-radius: 9999px; display: inline-block; flex-shrink: 0; }

.badge-sm {
    display: inline-flex; align-items: center; gap: .3rem;
    font-size: 10px; font-weight: 700; letter-spacing: .06em;
    text-transform: uppercase; padding: .25rem .8rem; border-radius: 9999px;
}

/* Prose */
.rpjm-prose p { margin-bottom: .85rem; line-height: 1.8; color: #374151; }
.rpjm-prose li { margin-bottom: .4rem; line-height: 1.7; color: #4b5563; }
.rpjm-prose ul { list-style: disc; padding-left: 1.25rem; }
.rpjm-prose ol { list-style: decimal; padding-left: 1.25rem; }

/* Override untuk background gelap */
.prose-white p { color: rgba(255,255,255,0.87) !important; line-height: 1.8; margin-bottom: .85rem; }
.prose-white li { color: rgba(255,255,255,0.75) !important; }
</style>
@endpush

@section('content')

{{-- ────────── HERO ────────── --}}
<section class="relative bg-[#0D2247] text-white overflow-hidden font-jakarta" style="min-height:240px;">
    <div class="absolute inset-0 opacity-10" style="background:url('https://images.unsplash.com/photo-1501854140801-50d01698950b?w=1600&q=80') center/cover;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="text-white/50 text-xs mb-4 flex items-center gap-2">
            <a href="{{ site_url('/') }}" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <span class="text-white font-semibold">Profil {{ ucwords(setting('sebutan_desa')) }}</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[.2em] text-xs uppercase">RPJM Nagari 2022–2030</span>
        <h1 class="font-extrabold text-4xl md:text-5xl mt-2 mb-2">Profil {{ ucwords(setting('sebutan_desa')) }}</h1>
        <p class="text-white/60 text-sm max-w-xl">Rencana Pembangunan Jangka Menengah Nagari Koto Tangah Batu Ampa — Kec. Akabiluru, Kab. Lima Puluh Kota, Sumatera Barat · Periode 2022–2030</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 40L0 20Q720 0 1440 20L1440 40Z" fill="white"/>
        </svg>
    </div>
</section>

{{-- ────────── STAT PILLS ────────── --}}
<div class="bg-gray-50 font-jakarta">
<div class="container mx-auto px-4 max-w-7xl py-8">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @php
        $stats = [
            ['label' => 'Jiwa', 'value' => number_format($totalJiwa), 'icon' => 'fa-users', 'color' => '#0D2247'],
            ['label' => 'Kepala Keluarga', 'value' => number_format($totalKK), 'icon' => 'fa-home', 'color' => '#c8973a'],
            ['label' => ucwords(setting('sebutan_dusun')), 'value' => $totalDusun . ' Jorong', 'icon' => 'fa-map-marker-alt', 'color' => '#3a7d44'],
            ['label' => 'Periode RPJM', 'value' => '2022–2030', 'icon' => 'fa-calendar-alt', 'color' => '#7c3d8f'],
        ];
        @endphp
        @foreach($stats as $s)
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background:{{ $s['color'] }}18;">
                <i class="fas {{ $s['icon'] }} text-lg" style="color:{{ $s['color'] }};"></i>
            </div>
            <div>
                <div class="font-extrabold text-xl text-gray-800">{{ $s['value'] }}</div>
                <div class="text-xs text-gray-400 font-medium">{{ $s['label'] }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

{{-- ────────── TAB NAVIGASI BAB ────────── --}}
<div class="bg-white shadow-sm sticky top-[96px] z-40 border-b border-gray-100 font-jakarta">
    <div class="container mx-auto px-4 max-w-7xl overflow-x-auto scrollbar-none">
        <div class="flex">
            <button class="bab-tab active" onclick="showBab('bab1', this)"><i class="fas fa-book-open text-[10px]"></i> BAB I</button>
            <button class="bab-tab" onclick="showBab('bab2', this)"><i class="fas fa-map text-[10px]"></i> BAB II</button>
            <button class="bab-tab" onclick="showBab('bab3', this)"><i class="fas fa-coins text-[10px]"></i> BAB III</button>
            <button class="bab-tab" onclick="showBab('bab4', this)"><i class="fas fa-exclamation-circle text-[10px]"></i> BAB IV</button>
            <button class="bab-tab" onclick="showBab('bab5', this)"><i class="fas fa-bullseye text-[10px]"></i> BAB V</button>
            <button class="bab-tab" onclick="showBab('bab6', this)"><i class="fas fa-chess text-[10px]"></i> BAB VI</button>
            <button class="bab-tab" onclick="showBab('bab7', this)"><i class="fas fa-project-diagram text-[10px]"></i> BAB VII</button>
            <button class="bab-tab" onclick="showBab('bab8', this)"><i class="fas fa-chart-bar text-[10px]"></i> BAB VIII</button>
            <button class="bab-tab" onclick="showBab('bab9', this)"><i class="fas fa-tachometer-alt text-[10px]"></i> BAB IX</button>
            <button class="bab-tab" onclick="showBab('bab10', this)"><i class="fas fa-flag-checkered text-[10px]"></i> BAB X</button>
        </div>
    </div>
</div>

<div class="bg-gray-50 min-h-[60vh] font-jakarta">
<div class="container mx-auto px-4 max-w-7xl py-12 space-y-0">

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB I — PENDAHULUAN --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab1" class="bab-content active space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-[#0D2247]/10 text-[#0D2247]"><i class="fas fa-book-open text-[9px]"></i> BAB I</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Pendahuluan</h2>
        <p class="text-gray-500 text-sm mt-2 max-w-2xl mx-auto">Latar belakang, dasar hukum, dan metodologi penyusunan RPJM Nagari Koto Tangah Batu Ampa Periode 2022–2030</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="rpjm-card p-6 lg:col-span-2">
            <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2">
                <span class="sec-accent bg-amber-500"></span> Latar Belakang
            </h3>
            <div class="rpjm-prose text-sm">
                <p>Rencana Pembangunan Jangka Menengah Nagari (RPJM Nagari) adalah dokumen perencanaan pembangunan Nagari untuk jangka waktu 8 (delapan) tahun yang memuat strategi dan arah kebijakan pembangunan Nagari, program prioritas pembangunan Nagari, dan kebutuhan pendanaan.</p>
                <p>RPJM Nagari Koto Tangah Batu Ampa disusun berdasarkan kondisi dan potensi yang dimiliki Nagari, dengan memperhatikan aspirasi dan kebutuhan seluruh lapisan masyarakat melalui proses musyawarah yang demokratis dan partisipatif.</p>
                <p>Nagari Koto Tangah Batu Ampa adalah salah satu nagari di Kecamatan Akabiluru, Kabupaten Lima Puluh Kota, Provinsi Sumatera Barat. Nagari ini dikukuhkan melalui Keputusan Bupati Lima Puluh Kota Nomor: 955/BLK/2001 tanggal 15 November 2001, terdiri dari 6 (enam) Jorong: Koto Tangah, Batu Tanyuh, Tambun Ijuk, Seberang Parit, Piladang, dan Sungai Cubadak.</p>
            </div>
        </div>
        <div class="space-y-4">
            <div class="rpjm-card p-5">
                <h3 class="font-bold text-[#0D2247] text-sm mb-3 flex items-center gap-2">
                    <i class="fas fa-gavel text-amber-500"></i> Dasar Hukum
                </h3>
                <ul class="rpjm-prose text-xs space-y-2">
                    <li>UU No. 25 Tahun 2004 tentang Sistem Perencanaan Pembangunan Nasional</li>
                    <li>UU No. 23 Tahun 2014 tentang Pemerintahan Daerah</li>
                    <li>UU No. 6 Tahun 2014 tentang Desa</li>
                    <li>Peraturan Bupati Lima Puluh Kota No. 9 Tahun 2022 tentang Juknis Penyusunan RPJM Nagari</li>
                    <li>RPJMD Kabupaten Lima Puluh Kota</li>
                    <li>RPJMD Provinsi Sumatera Barat Tahun 2021–2026</li>
                </ul>
            </div>
            <div class="rpjm-card p-5">
                <h3 class="font-bold text-[#0D2247] text-sm mb-3 flex items-center gap-2">
                    <i class="fas fa-calendar-check text-[#3a7d44]"></i> Periode Perencanaan
                </h3>
                <div class="text-center py-2">
                    <div class="font-extrabold text-3xl text-[#0D2247]">2022</div>
                    <div class="text-gray-400 text-xs my-1">sampai dengan</div>
                    <div class="font-extrabold text-3xl text-amber-500">2030</div>
                    <div class="text-xs text-gray-500 mt-2">8 Tahun Pembangunan</div>
                </div>
            </div>
        </div>
    </div>

    <div class="rpjm-card p-6">
        <h3 class="font-bold text-[#0D2247] text-base mb-5 flex items-center gap-2">
            <span class="sec-accent bg-[#0D2247]"></span> Tahapan Penyusunan RPJM Nagari
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @php $tahapan = [
                ['no'=>'1','judul'=>'Sosialisasi & Persiapan','desc'=>'Pembentukan Tim Penyusun dan sosialisasi kepada seluruh lapisan masyarakat'],
                ['no'=>'2','judul'=>'Penyelarasan Arah Kebijakan','desc'=>'Penyelarasan data dari Profil Nagari, SID, IDM, dan kondisi nagari terkini'],
                ['no'=>'3','judul'=>'FGD Lintas Lembaga','desc'=>'Focus Group Discussion bersama lembaga kemasyarakatan dan keuangan nagari'],
                ['no'=>'4','judul'=>'Pengkajian Keadaan Nagari','desc'=>'Pemetaan aset, potensi, dan permasalahan menggunakan sketsa nagari dan kalender musim'],
                ['no'=>'5','judul'=>'Penyusunan Rancangan','desc'=>'Penyusunan kerangka pembangunan berdasarkan hasil pengkajian dan pemaparan Visi-Misi'],
                ['no'=>'6','judul'=>'Musrenbang & Penetapan','desc'=>'Musyawarah Perencanaan Pembangunan Nagari, pembahasan Bamus, dan penetapan Peraturan Nagari'],
            ]; @endphp
            @foreach($tahapan as $t)
            <div class="flex gap-3 p-4 bg-gray-50 rounded-xl">
                <div class="w-8 h-8 bg-[#0D2247] text-white rounded-lg flex items-center justify-center font-bold text-sm flex-shrink-0">{{ $t['no'] }}</div>
                <div>
                    <div class="font-bold text-gray-800 text-sm">{{ $t['judul'] }}</div>
                    <div class="text-gray-500 text-xs mt-1 leading-relaxed">{{ $t['desc'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB II — GAMBARAN UMUM KONDISI NAGARI --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab2" class="bab-content space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-[#3a7d44]/10 text-[#3a7d44]"><i class="fas fa-map text-[9px]"></i> BAB II</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Gambaran Umum Kondisi Nagari</h2>
        <p class="text-gray-500 text-sm mt-2 max-w-2xl mx-auto">Profil wilayah, demografi, sosial-ekonomi, dan aset Nagari Koto Tangah Batu Ampa</p>
    </div>

    {{-- Identitas Nagari --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="rpjm-card p-6">
            <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-amber-500"></span> Identitas Nagari</h3>
            <div class="space-y-1 text-sm">
                <div class="info-row"><span class="info-label">Nama Nagari</span><span class="info-value font-bold text-[#0D2247]">Koto Tangah Batu Ampa</span></div>
                <div class="info-row"><span class="info-label">Kecamatan</span><span class="info-value">Akabiluru</span></div>
                <div class="info-row"><span class="info-label">Kabupaten</span><span class="info-value">Lima Puluh Kota</span></div>
                <div class="info-row"><span class="info-label">Provinsi</span><span class="info-value">Sumatera Barat</span></div>
                <div class="info-row"><span class="info-label">Dikukuhkan</span><span class="info-value">15 November 2001 (SK Bupati No. 955/BLK/2001)</span></div>
                <div class="info-row"><span class="info-label">Jumlah Jorong</span><span class="info-value">6 Jorong</span></div>
                <div class="info-row"><span class="info-label">Ketinggian</span><span class="info-value">570 – 611 mdpl</span></div>
                <div class="info-row"><span class="info-label">Luas Wilayah</span><span class="info-value">± 2.244 Ha</span></div>
            </div>
        </div>
        <div class="rpjm-card p-6">
            <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-[#3a7d44]"></span> Wilayah Jorong</h3>
            <div class="space-y-2">
                @php $jorongList = [
                    ['nama'=>'Jorong Koto Tangah','kepala'=>'Khazanatul Israr'],
                    ['nama'=>'Jorong Batu Tanyuh','kepala'=>'Zeri Wandra'],
                    ['nama'=>'Jorong Tambun Ijuk','kepala'=>'Dedi Supardi (Plt.)'],
                    ['nama'=>'Jorong Seberang Parit','kepala'=>'Rahmat Sa\'bani, S.T'],
                    ['nama'=>'Jorong Piladang','kepala'=>'Belli Arizona, A.Md'],
                    ['nama'=>'Jorong Sungai Cubadak','kepala'=>'Muhammad Rika, A.Md'],
                ]; @endphp
                @foreach($jorongList as $j)
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                    <div class="w-8 h-8 bg-[#3a7d44]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-map-pin text-[#3a7d44] text-xs"></i>
                    </div>
                    <div>
                        <div class="font-bold text-gray-800 text-sm">{{ $j['nama'] }}</div>
                        <div class="text-gray-400 text-xs">Kepala Jorong: {{ $j['kepala'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Tata Guna Lahan --}}
    <div class="rpjm-card p-6">
        <h3 class="font-bold text-[#0D2247] text-base mb-5 flex items-center gap-2"><span class="sec-accent bg-[#c8973a]"></span> Tata Guna Lahan</h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            @php $lahan = [
                ['nama'=>'Sawah','luas'=>'455 Ha','icon'=>'fa-seedling','color'=>'#3a7d44'],
                ['nama'=>'Perkebunan','luas'=>'895 Ha','icon'=>'fa-tree','color'=>'#2d6a4f'],
                ['nama'=>'Pemukiman','luas'=>'± 200 Ha','icon'=>'fa-home','color'=>'#0D2247'],
                ['nama'=>'Hutan Nagari','luas'=>'± 350 Ha','icon'=>'fa-forest','color'=>'#1b4332'],
                ['nama'=>'Fasilitas Umum','luas'=>'± 50 Ha','icon'=>'fa-building','color'=>'#c8973a'],
                ['nama'=>'Lain-lain','luas'=>'Selebihnya','icon'=>'fa-map','color'=>'#6b7280'],
            ]; @endphp
            @foreach($lahan as $l)
            <div class="text-center p-4 bg-gray-50 rounded-xl">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center mx-auto mb-2" style="background:{{ $l['color'] }}15;">
                    <i class="fas {{ $l['icon'] }} text-sm" style="color:{{ $l['color'] }};"></i>
                </div>
                <div class="font-bold text-gray-800 text-sm">{{ $l['luas'] }}</div>
                <div class="text-gray-400 text-xs mt-1">{{ $l['nama'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Demografis & Aset --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="rpjm-card p-6">
            <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-[#7c3d8f]"></span> Profil Demografis</h3>
            <div class="space-y-1 text-sm">
                <div class="info-row"><span class="info-label">Jumlah Penduduk</span><span class="info-value font-bold">{{ number_format($totalJiwa) }} Jiwa</span></div>
                <div class="info-row"><span class="info-label">Kepala Keluarga</span><span class="info-value">{{ number_format($totalKK) }} KK</span></div>
                <div class="info-row"><span class="info-label">Potensi Wisata</span><span class="info-value">Kolam Tando PLTA Batang Agam</span></div>
                <div class="info-row"><span class="info-label">Sumber Daya Alam</span><span class="info-value">Sawah produktif, perkebunan, perikanan</span></div>
                <div class="info-row"><span class="info-label">Status Nagari</span><span class="info-value"><span class="badge-sm bg-amber-50 text-amber-700">Nagari Adat</span></span></div>
                <div class="info-row"><span class="info-label">Filosofi Adat</span><span class="info-value">Adat Basandi Syarak', Syarak' Basandi Kitabullah</span></div>
            </div>
        </div>
        <div class="rpjm-card p-6">
            <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-amber-500"></span> Kepemimpinan Nagari (Sejak 2001)</h3>
            <div class="space-y-2 text-sm">
                @php $walinagari = [
                    ['periode'=>'2001 – 2002','nama'=>'Wahyu Santoso, SH','ket'=>'Pjs. Wali Nagari'],
                    ['periode'=>'2002 – 2008','nama'=>'Wahyu Santoso, SH','ket'=>'Wali Nagari'],
                    ['periode'=>'2008 – 2014','nama'=>'Ahmad Wajdi Dt. Bonsu Nan Elok','ket'=>'Wali Nagari'],
                    ['periode'=>'2014 – 2016','nama'=>'Yelsi Ekaputri, S.Sos','ket'=>'Pjs. Wali Nagari'],
                    ['periode'=>'2016 – 2022','nama'=>'Syamsul Akmal, A.Md','ket'=>'Wali Nagari'],
                    ['periode'=>'2022 – 2030','nama'=>'Syamsul Akmal, A.Md','ket'=>'Wali Nagari (Aktif)'],
                ]; @endphp
                @foreach($walinagari as $w)
                <div class="flex items-center gap-3 p-2.5 {{ $loop->last ? 'bg-[#0D2247] text-white rounded-xl' : 'border-b border-gray-100' }}">
                    <div class="text-xs font-mono {{ $loop->last ? 'text-white/70' : 'text-gray-400' }} min-w-[90px]">{{ $w['periode'] }}</div>
                    <div>
                        <div class="font-bold {{ $loop->last ? 'text-white' : 'text-gray-800' }} text-sm">{{ $w['nama'] }}</div>
                        <div class="{{ $loop->last ? 'text-amber-400' : 'text-gray-400' }} text-xs">{{ $w['ket'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB III — KEUANGAN NAGARI --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab3" class="bab-content space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-amber-100 text-amber-700"><i class="fas fa-coins text-[9px]"></i> BAB III</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Gambaran Pengelolaan Keuangan Nagari</h2>
        <p class="text-gray-500 text-sm mt-2 max-w-2xl mx-auto">Kerangka pendanaan dan aset pembangunan Nagari Koto Tangah Batu Ampa</p>
    </div>

    <div class="rpjm-card p-6">
        <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-amber-500"></span> Sumber Pendanaan Nagari</h3>
        <div class="rpjm-prose text-sm">
            <p>Pengelolaan keuangan Nagari Koto Tangah Batu Ampa bersumber dari Dana Desa (APBN), Alokasi Dana Nagari (APBD), Bagi Hasil Pajak dan Retribusi Daerah, serta Pendapatan Asli Nagari (PAN). Seluruh pendapatan dan belanja dikelola secara transparan dan akuntabel berdasarkan peraturan yang berlaku.</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-4">
            @php $sumber = [
                ['nama'=>'Dana Desa (APBN)','icon'=>'fa-landmark','color'=>'#0D2247'],
                ['nama'=>'Alokasi Dana Nagari','icon'=>'fa-university','color'=>'#c8973a'],
                ['nama'=>'Bagi Hasil Pajak','icon'=>'fa-percentage','color'=>'#3a7d44'],
                ['nama'=>'Pendapatan Asli Nagari','icon'=>'fa-store','color'=>'#7c3d8f'],
            ]; @endphp
            @foreach($sumber as $s)
            <div class="text-center p-4 rounded-xl" style="background:{{ $s['color'] }}10; border: 1.5px solid {{ $s['color'] }}22;">
                <i class="fas {{ $s['icon'] }} text-xl mb-2" style="color:{{ $s['color'] }};"></i>
                <div class="text-xs font-semibold text-gray-700">{{ $s['nama'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="rpjm-card p-6">
        <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-[#3a7d44]"></span> Aset Infrastruktur Terbangun</h3>
        <div class="rpjm-prose text-sm">
            <p>Nagari Koto Tangah Batu Ampa telah membangun berbagai infrastruktur jalan dan irigasi sejak tahun 2016 hingga 2025. Total nilai aset jalan, irigasi, dan jaringan yang telah terbangun mencapai lebih dari <strong>Rp 5,3 Miliar</strong> dengan 59 titik proyek pembangunan infrastruktur.</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-4">
            <div class="text-center p-4 bg-[#0D2247]/5 rounded-xl">
                <div class="font-extrabold text-2xl text-[#0D2247]">59</div>
                <div class="text-xs text-gray-500 mt-1">Proyek Infrastruktur</div>
            </div>
            <div class="text-center p-4 bg-amber-50 rounded-xl">
                <div class="font-extrabold text-2xl text-amber-700">Rp 5,3 M+</div>
                <div class="text-xs text-gray-500 mt-1">Nilai Aset Jalan & Irigasi</div>
            </div>
            <div class="text-center p-4 bg-[#3a7d44]/5 rounded-xl">
                <div class="font-extrabold text-2xl text-[#3a7d44]">2016–2025</div>
                <div class="text-xs text-gray-500 mt-1">Periode Pembangunan</div>
            </div>
        </div>
        <div class="mt-4 p-4 bg-gray-50 rounded-xl text-xs text-gray-600 leading-relaxed">
            <strong>Proyek meliputi:</strong> Rabat Beton Jalan, Normalisasi Saluran Irigasi, Pembukaan Jalan Baru, Pembangunan Jembatan, Rehab Rumah Tidak Layak Huni (RTLH), dan Lanjutan Pembangunan Infrastruktur antar Jorong.
        </div>
    </div>

</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB IV — PERMASALAHAN DAN ISU STRATEGIS --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab4" class="bab-content space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-red-100 text-red-700"><i class="fas fa-exclamation-circle text-[9px]"></i> BAB IV</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Permasalahan & Isu-Isu Strategis</h2>
        <p class="text-gray-500 text-sm mt-2 max-w-2xl mx-auto">Identifikasi tantangan pembangunan dan isu strategis yang menjadi prioritas penanganan</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @php $masalah = [
            ['bidang'=>'Infrastruktur','color'=>'#0D2247','icon'=>'fa-road','isu'=>[
                'Jalan dan drainase yang belum memadai di beberapa jorong',
                'Jaringan irigasi yang belum optimal untuk menopang produktivitas pertanian',
                'Kebutuhan perbaikan dan rehabilitasi fasilitas umum nagari',
            ]],
            ['bidang'=>'Ekonomi & UMKM','color'=>'#c8973a','icon'=>'fa-store','isu'=>[
                'Potensi UMKM dan ekonomi lokal belum tergarap optimal',
                'Lahan pertanian yang kurang produktif dan lahan tidur',
                'Akses permodalan bagi pelaku usaha kecil yang terbatas',
            ]],
            ['bidang'=>'Sosial & Pendidikan','color'=>'#3a7d44','icon'=>'fa-graduation-cap','isu'=>[
                'Kualitas dan akses pendidikan yang masih perlu ditingkatkan',
                'Angka putus sekolah dan keterbatasan beasiswa lokal',
                'Pemberdayaan pemuda dan perempuan nagari',
            ]],
            ['bidang'=>'Kesehatan','color'=>'#7c3d8f','icon'=>'fa-heartbeat','isu'=>[
                'Layanan kesehatan dasar dan posyandu yang perlu diperkuat',
                'Sanitasi lingkungan dan pengelolaan sampah rumah tangga',
                'Kesadaran masyarakat terhadap pola hidup sehat',
            ]],
            ['bidang'=>'Tata Kelola Pemerintahan','color'=>'#1a5c52','icon'=>'fa-landmark','isu'=>[
                'Digitalisasi pelayanan administrasi nagari',
                'Kapasitas aparatur pemerintahan yang perlu ditingkatkan',
                'Transparansi dan akuntabilitas pengelolaan keuangan nagari',
            ]],
            ['bidang'=>'Adat & Budaya','color'=>'#8b3a2a','icon'=>'fa-mask','isu'=>[
                'Pelestarian nilai-nilai adat ABS-SBK di tengah modernisasi',
                'Penguatan peran lembaga adat dalam pembangunan nagari',
                'Regenerasi kader-kader cendikiawan dan pemimpin adat',
            ]],
        ]; @endphp
        @foreach($masalah as $m)
        <div class="rpjm-card p-5">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:{{ $m['color'] }}15;">
                    <i class="fas {{ $m['icon'] }} text-sm" style="color:{{ $m['color'] }};"></i>
                </div>
                <h4 class="font-bold text-gray-800">{{ $m['bidang'] }}</h4>
            </div>
            <ul class="rpjm-prose text-sm space-y-2">
                @foreach($m['isu'] as $i)
                <li class="flex items-start gap-2">
                    <i class="fas fa-chevron-right text-[9px] mt-1.5 flex-shrink-0" style="color:{{ $m['color'] }};"></i>
                    <span>{{ $i }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>

</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB V — VISI, MISI, TUJUAN DAN SASARAN --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab5" class="bab-content space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-[#0D2247]/10 text-[#0D2247]"><i class="fas fa-bullseye text-[9px]"></i> BAB V</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Visi, Misi, Tujuan & Sasaran</h2>
    </div>

    {{-- Visi --}}
    <div class="relative bg-[#0D2247] rounded-3xl overflow-hidden p-8 md:p-12 text-white text-center">
        <div class="absolute inset-0 opacity-5" style="background:url('https://images.unsplash.com/photo-1501854140801-50d01698950b?w=1200') center/cover;"></div>
        <div class="relative z-10">
            <div class="text-amber-400 font-bold tracking-[.25em] text-xs uppercase mb-4">Visi Nagari 2022–2030</div>
            <blockquote class="font-extrabold text-2xl md:text-3xl leading-tight max-w-3xl mx-auto mb-6">
                "Mewujudkan Nagari yang Madani, Sejahtera dan Berbudaya berlandaskan Adat Basandi Syarak', Syarak' Basandi Kitabullah"
            </blockquote>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach(['Madani','Sejahtera','Berbudaya','ABS-SBK'] as $k)
                <span class="bg-white/15 text-white text-xs font-bold px-4 py-1.5 rounded-full">{{ $k }}</span>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Misi --}}
    <div>
        <h3 class="font-bold text-[#0D2247] text-lg mb-5 flex items-center gap-3">
            <span class="sec-accent bg-amber-500"></span> 7 Misi Nagari
        </h3>
        <div class="space-y-3">
            @php $misi = [
                'Meningkatkan tata kelola pemerintahan yang baik, bersih, transparan dan inovatif berbasis ilmu pengetahuan dan teknologi serta iman dan taqwa.',
                'Mendorong pertumbuhan ekonomi masyarakat yang memiliki keunggulan dan daya saing menuju masyarakat sejahtera.',
                'Melestarikan nilai-nilai adat dan budaya berlandaskan Adat Basandi Syarak\', Syarak\' Basandi Kitabullah di tengah-tengah masyarakat.',
                'Meningkatkan derajat serta penataan lingkungan yang bersih dan sehat.',
                'Mendorong peran aktif lembaga-lembaga nagari dalam mendukung kegiatan pembangunan dan pemberdayaan masyarakat nagari.',
                'Pembangunan infrastruktur yang terencana dan berkelanjutan.',
                'Mewujudkan nagari yang tangguh dan taat hukum sehingga dapat menciptakan suasana aman dan nyaman.',
            ]; @endphp
            @foreach($misi as $i => $m)
            <div class="misi-card flex items-start gap-4">
                <div class="w-8 h-8 bg-[#0D2247] text-white rounded-lg flex items-center justify-center font-extrabold text-sm flex-shrink-0">{{ $i+1 }}</div>
                <p class="text-gray-700 text-sm leading-relaxed pt-1">{{ $m }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Tujuan & Sasaran Per Misi --}}
    <div class="rpjm-card p-6">
        <h3 class="font-bold text-[#0D2247] text-base mb-5 flex items-center gap-2"><span class="sec-accent bg-[#3a7d44]"></span> Tujuan & Sasaran Utama</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            @php $tujuanSasaran = [
                ['misi'=>'Tata Kelola','tujuan'=>'Birokrasi yang bersih, transparan, dan melayani dengan prima berbasis teknologi informasi','color'=>'#0D2247'],
                ['misi'=>'Ekonomi','tujuan'=>'Peningkatan potensi UMKM, pengembangan BUMNag, dan one village one product yang berkelanjutan','color'=>'#c8973a'],
                ['misi'=>'Adat & Budaya','tujuan'=>'Lahirnya kader cendikiawan yang menjaga marwah nagari dan berpegang teguh pada ABS-SBK','color'=>'#8b3a2a'],
                ['misi'=>'Kesehatan','tujuan'=>'Masyarakat yang sadar kesehatan, sanitasi memadai, dan nol kasus gizi buruk pada balita','color'=>'#3a7d44'],
                ['misi'=>'Kelembagaan','tujuan'=>'Lembaga nagari yang berperan aktif mendukung pembangunan dan pemberdayaan masyarakat','color'=>'#7c3d8f'],
                ['misi'=>'Infrastruktur','tujuan'=>'Percepatan pertumbuhan ekonomi melalui infrastruktur jalan, irigasi, dan fasilitas publik','color'=>'#1a5c52'],
            ]; @endphp
            @foreach($tujuanSasaran as $ts)
            <div class="p-4 rounded-xl" style="background:{{ $ts['color'] }}08; border-left: 3px solid {{ $ts['color'] }};">
                <div class="text-xs font-bold uppercase tracking-widest mb-2" style="color:{{ $ts['color'] }};">{{ $ts['misi'] }}</div>
                <p class="text-gray-700 text-sm leading-relaxed">{{ $ts['tujuan'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB VI — STRATEGI DAN ARAH KEBIJAKAN --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab6" class="bab-content space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-[#1a5c52]/10 text-[#1a5c52]"><i class="fas fa-chess text-[9px]"></i> BAB VI</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Strategi & Arah Kebijakan</h2>
        <p class="text-gray-500 text-sm mt-2 max-w-2xl mx-auto">Rumusan strategi komprehensif untuk mencapai Visi dan Misi RPJM Nagari 2022–2030</p>
    </div>

    <div class="rpjm-card p-6">
        <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-[#1a5c52]"></span> Pendekatan Strategis</h3>
        <div class="rpjm-prose text-sm">
            <p>Strategi dan arah kebijakan merupakan rumusan perencanaan komprehensif yang dituangkan dalam RPJM Nagari. Rumusan ini merupakan teknik Pemerintah Nagari dalam melakukan upaya pencapaian Visi, Misi, tujuan, dan sasaran secara efektif dan efisien selama 8 tahun ke depan.</p>
            <p>Program rencana pembangunan disusun berdasarkan musyawarah nagari yang melibatkan tokoh masyarakat, tokoh agama, kepala jorong, Pemerintah Nagari, dan BAMUS, serta melalui penggalian gagasan dari seluruh lapisan masyarakat.</p>
        </div>
    </div>

    <div class="space-y-4">
        @php $strategi = [
            ['misi'=>'Misi 1 — Tata Kelola Pemerintahan','color'=>'#0D2247','strategi'=>[
                'Evaluasi dan revolusi menyeluruh terhadap kualitas aparat sebagai pelayan masyarakat',
                'Penerapan IT untuk efektifitas kerja, keamanan arsip, transparansi, dan kemudahan akses informasi pemerintahan nagari',
                'Peningkatan kapasitas SDM aparatur melalui pelatihan dan pendidikan berkelanjutan',
            ]],
            ['misi'=>'Misi 2 — Ekonomi & UMKM','color'=>'#c8973a','strategi'=>[
                'Meningkatkan potensi sumber daya lokal nagari secara optimal',
                'Pengembangan BUMNag sebagai holding company unit usaha nagari',
                'One village one product yang dikembangkan dari hulu ke hilir secara berkelanjutan',
                'Meningkatkan akses permodalan bagi UMKM dan petani',
            ]],
            ['misi'=>'Misi 3 — Adat & Budaya','color'=>'#8b3a2a','strategi'=>[
                'Penguatan lembaga adat KAN (Kerapatan Adat Nagari) dalam tata kehidupan masyarakat',
                'Pendidikan dan internalisasi nilai ABS-SBK sejak dini kepada generasi muda',
                'Pengembangan seni budaya Minangkabau sebagai identitas nagari',
            ]],
            ['misi'=>'Misi 4 — Kesehatan & Lingkungan','color'=>'#3a7d44','strategi'=>[
                'Penguatan Posyandu dan layanan kesehatan dasar nagari',
                'Program sanitasi dan pengelolaan sampah berbasis masyarakat',
                'Sosialisasi dan edukasi pola hidup bersih dan sehat (PHBS)',
            ]],
            ['misi'=>'Misi 6 — Infrastruktur','color'=>'#1a5c52','strategi'=>[
                'Pembangunan jalan rabat beton dan drainase yang terencana dan merata di seluruh jorong',
                'Normalisasi dan rehabilitasi jaringan irigasi untuk produktivitas pertanian',
                'Pembangunan fasilitas umum nagari yang mendukung aktivitas ekonomi dan sosial',
            ]],
        ]; @endphp
        @foreach($strategi as $s)
        <div class="rpjm-card overflow-hidden">
            <div class="flex items-center gap-3 px-5 py-4" style="background:{{ $s['color'] }}10; border-left: 4px solid {{ $s['color'] }};">
                <div class="font-bold text-sm" style="color:{{ $s['color'] }};">{{ $s['misi'] }}</div>
            </div>
            <div class="px-5 py-4">
                <ul class="space-y-2">
                    @foreach($s['strategi'] as $st)
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <i class="fas fa-arrow-right text-[10px] mt-1.5 flex-shrink-0" style="color:{{ $s['color'] }};"></i>
                        <span>{{ $st }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>

</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB VII — KEBIJAKAN UMUM & PROGRAM PEMBANGUNAN --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab7" class="bab-content space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-[#7c3d8f]/10 text-[#7c3d8f]"><i class="fas fa-project-diagram text-[9px]"></i> BAB VII</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Kebijakan Umum & Program Pembangunan</h2>
        <p class="text-gray-500 text-sm mt-2 max-w-2xl mx-auto">Lima bidang program pembangunan nagari yang menjadi prioritas dalam RPJM 2022–2030</p>
    </div>

    <div class="grid grid-cols-1 gap-5">
        @php $bidang = [
            ['nama'=>'Bidang Penyelenggaraan Pemerintahan Nagari','no'=>'1','color'=>'#0D2247','icon'=>'fa-landmark','program'=>[
                'Peningkatan kualitas dan kapasitas aparatur pemerintahan nagari',
                'Digitalisasi sistem administrasi dan pelayanan publik nagari (OpenSID)',
                'Penguatan fungsi BAMUS dalam pengawasan penyelenggaraan pemerintahan',
                'Pengelolaan administrasi kependudukan yang tertib dan akurat',
                'Penyusunan peraturan nagari yang responsif dan aspiratif',
            ]],
            ['nama'=>'Bidang Pelaksanaan Pembangunan Nagari','no'=>'2','color'=>'#c8973a','icon'=>'fa-hard-hat','program'=>[
                'Pembangunan dan pemeliharaan jalan nagari, jembatan, dan drainase',
                'Normalisasi dan rehabilitasi jaringan irigasi pertanian',
                'Pengembangan sarana dan prasarana pendidikan',
                'Pembangunan fasilitas kesehatan dan Posyandu',
                'Pengembangan Pasar Nagari dan infrastruktur ekonomi lokal',
                'Program Rehab Rumah Tidak Layak Huni (RTLH) bagi warga prasejahtera',
            ]],
            ['nama'=>'Bidang Pembinaan Masyarakat Nagari','no'=>'3','color'=>'#3a7d44','icon'=>'fa-users','program'=>[
                'Penguatan lembaga adat KAN dan pemangku adat Minangkabau',
                'Pembinaan dan pengembangan seni budaya lokal nagari',
                'Program pemberdayaan perempuan dan PKK nagari',
                'Pembinaan pemuda melalui karang taruna dan olahraga',
                'Pendidikan keagamaan dan pembinaan TPA/TPSA',
            ]],
            ['nama'=>'Bidang Pemberdayaan Masyarakat Nagari','no'=>'4','color'=>'#7c3d8f','icon'=>'fa-hand-holding-heart','program'=>[
                'Pengembangan BUMNag sebagai motor perekonomian nagari',
                'Pelatihan keterampilan dan wirausaha bagi masyarakat',
                'Penguatan kelompok tani dan gapoktan nagari',
                'Program beasiswa dan bantuan pendidikan anak nagari',
                'Pengembangan wisata berbasis potensi lokal (Kolam Tando PLTA)',
            ]],
            ['nama'=>'Bidang Kegiatan Tak Terduga / Penanggulangan Bencana','no'=>'5','color'=>'#8b3a2a','icon'=>'fa-shield-alt','program'=>[
                'Pembentukan dan penguatan Tim Siaga Bencana Nagari',
                'Penyediaan dana cadangan nagari untuk keadaan darurat',
                'Pelatihan tanggap bencana bagi masyarakat nagari',
                'Pemetaan daerah rawan bencana di wilayah nagari',
            ]],
        ]; @endphp
        @foreach($bidang as $b)
        <div class="rpjm-card overflow-hidden">
            <div class="flex items-center gap-4 p-5" style="background:{{ $b['color'] }};">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas {{ $b['icon'] }} text-white text-sm"></i>
                </div>
                <div>
                    <div class="text-white/70 text-xs font-semibold">Bidang {{ $b['no'] }} dari 5</div>
                    <div class="font-bold text-white">{{ $b['nama'] }}</div>
                </div>
            </div>
            <div class="p-5">
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach($b['program'] as $p)
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <i class="fas fa-check text-[10px] mt-1.5 flex-shrink-0" style="color:{{ $b['color'] }};"></i>
                        <span>{{ $p }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>

</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB VIII — INDIKASI RENCANA PROGRAM PRIORITAS --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab8" class="bab-content space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-blue-100 text-blue-700"><i class="fas fa-chart-bar text-[9px]"></i> BAB VIII</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Indikasi Rencana Program Prioritas</h2>
        <p class="text-gray-500 text-sm mt-2 max-w-2xl mx-auto">Program prioritas yang disertai kebutuhan pendanaan dalam RPJM Nagari 2022–2030</p>
    </div>

    <div class="rpjm-card p-6">
        <div class="rpjm-prose text-sm">
            <p>Indikasi rencana program prioritas merupakan penjabaran kebijakan umum dan program pembangunan nagari dalam bentuk program dan kegiatan yang terukur, terarah, dan terpadu. Setiap program dilengkapi dengan indikasi kebutuhan pendanaan dari berbagai sumber: Dana Desa, ADN, Bagi Hasil Pajak, dan Pendapatan Asli Nagari.</p>
        </div>
    </div>

    <div class="space-y-4">
        @php $prioritas = [
            ['bidang'=>'Infrastruktur Dasar','alokasi'=>'40%','color'=>'#0D2247','icon'=>'fa-road','rincian'=>[
                'Rabat beton jalan nagari di seluruh jorong (±14 titik prioritas)',
                'Normalisasi dan rehabilitasi saluran irigasi pertanian',
                'Pembangunan jembatan dan gorong-gorong',
                'Pengadaan lampu jalan dan penerangan fasilitas umum',
            ]],
            ['bidang'=>'Pemberdayaan Ekonomi','alokasi'=>'25%','color'=>'#c8973a','icon'=>'fa-store','rincian'=>[
                'Pengembangan BUMNag dan unit usaha nagari',
                'Pelatihan UMKM dan bantuan modal usaha mikro',
                'Pengembangan wisata Kolam Tando PLTA Batang Agam',
                'Penguatan kelompok tani dan sarana produksi pertanian',
            ]],
            ['bidang'=>'Sosial & Pemberdayaan Masyarakat','alokasi'=>'20%','color'=>'#3a7d44','icon'=>'fa-users','rincian'=>[
                'Program RTLH (Rehab Rumah Tidak Layak Huni)',
                'Beasiswa dan bantuan pendidikan anak nagari',
                'Posyandu dan layanan kesehatan dasar',
                'Pembinaan adat, seni, dan budaya Minangkabau',
            ]],
            ['bidang'=>'Pemerintahan & Kelembagaan','alokasi'=>'15%','color'=>'#7c3d8f','icon'=>'fa-landmark','rincian'=>[
                'Digitalisasi pelayanan administrasi nagari',
                'Pelatihan dan peningkatan kapasitas aparatur',
                'Operasional dan pemeliharaan aset nagari',
                'Penyusunan regulasi dan dokumen perencanaan',
            ]],
        ]; @endphp
        @foreach($prioritas as $p)
        <div class="rpjm-card p-5">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:{{ $p['color'] }}15;">
                        <i class="fas {{ $p['icon'] }} text-sm" style="color:{{ $p['color'] }};"></i>
                    </div>
                    <div class="font-bold text-gray-800">{{ $p['bidang'] }}</div>
                </div>
                <div class="font-extrabold text-lg" style="color:{{ $p['color'] }};">{{ $p['alokasi'] }}</div>
            </div>
            <div class="w-full bg-gray-100 rounded-full h-2 mb-4">
                <div class="h-2 rounded-full" style="width:{{ $p['alokasi'] }};background:{{ $p['color'] }};"></div>
            </div>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                @foreach($p['rincian'] as $r)
                <li class="flex items-start gap-2 text-gray-600">
                    <i class="fas fa-circle text-[6px] mt-2 flex-shrink-0" style="color:{{ $p['color'] }};"></i>
                    <span>{{ $r }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>

</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB IX — INDIKATOR KINERJA NAGARI --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab9" class="bab-content space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-[#3a7d44]/10 text-[#3a7d44]"><i class="fas fa-tachometer-alt text-[9px]"></i> BAB IX</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Penetapan Indikator Kinerja Nagari</h2>
        <p class="text-gray-500 text-sm mt-2 max-w-2xl mx-auto">Ukuran keberhasilan pelaksanaan RPJM Nagari Koto Tangah Batu Ampa periode 2022–2030</p>
    </div>

    <div class="rpjm-card p-6">
        <h3 class="font-bold text-[#0D2247] text-base mb-5 flex items-center gap-2"><span class="sec-accent bg-[#3a7d44]"></span> Indikator Kinerja Utama</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @php $kpi = [
                ['label'=>'Indeks Kepuasan Layanan','target'=>'≥ 80%','icon'=>'fa-smile','color'=>'#0D2247'],
                ['label'=>'Jalan Nagari Kondisi Baik','target'=>'≥ 85%','icon'=>'fa-road','color'=>'#c8973a'],
                ['label'=>'Keluarga Akses Irigasi','target'=>'≥ 90%','icon'=>'fa-water','color'=>'#3a7d44'],
                ['label'=>'Angka Gizi Buruk Balita','target'=>'0 Kasus','icon'=>'fa-baby','color'=>'#7c3d8f'],
                ['label'=>'UMKM Terdampingi','target'=>'≥ 50 UMKM','icon'=>'fa-store','color'=>'#1a5c52'],
                ['label'=>'APK Pendidikan Dasar','target'=>'100%','icon'=>'fa-graduation-cap','color'=>'#8b3a2a'],
                ['label'=>'Cakupan Air Bersih','target'=>'≥ 95%','icon'=>'fa-tint','color'=>'#0D2247'],
                ['label'=>'Rumah Tidak Layak Huni','target'=>'Berkurang 50%','icon'=>'fa-home','color'=>'#c8973a'],
                ['label'=>'Pendapatan BUMNag','target'=>'Tumbuh 20%/tahun','icon'=>'fa-chart-line','color'=>'#3a7d44'],
            ]; @endphp
            @foreach($kpi as $k)
            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background:{{ $k['color'] }}12;">
                    <i class="fas {{ $k['icon'] }} text-sm" style="color:{{ $k['color'] }};"></i>
                </div>
                <div>
                    <div class="text-xs text-gray-500">{{ $k['label'] }}</div>
                    <div class="font-bold text-gray-800 text-sm">Target: {{ $k['target'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="rpjm-card p-6">
        <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-amber-500"></span> Mekanisme Evaluasi & Pelaporan</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
            <div class="p-4 bg-[#0D2247]/5 rounded-xl text-center">
                <i class="fas fa-calendar-week text-[#0D2247] text-xl mb-2"></i>
                <div class="font-bold text-gray-800">Evaluasi Triwulanan</div>
                <div class="text-gray-500 text-xs mt-1">Review progres 3 bulanan oleh Tim Pemerintahan Nagari</div>
            </div>
            <div class="p-4 bg-amber-50 rounded-xl text-center">
                <i class="fas fa-calendar-alt text-amber-600 text-xl mb-2"></i>
                <div class="font-bold text-gray-800">Laporan Tahunan (RKP)</div>
                <div class="text-gray-500 text-xs mt-1">Sinkronisasi dengan Rencana Kerja Pemerintah Nagari tahunan</div>
            </div>
            <div class="p-4 bg-[#3a7d44]/5 rounded-xl text-center">
                <i class="fas fa-users text-[#3a7d44] text-xl mb-2"></i>
                <div class="font-bold text-gray-800">Musyawarah Nagari</div>
                <div class="text-gray-500 text-xs mt-1">Evaluasi bersama masyarakat dan pemangku kepentingan</div>
            </div>
        </div>
    </div>

</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- BAB X — PENUTUP --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="bab10" class="bab-content space-y-8">

    <div class="text-center mb-10">
        <span class="badge-sm bg-gray-200 text-gray-700"><i class="fas fa-flag-checkered text-[9px]"></i> BAB X</span>
        <h2 class="font-extrabold text-3xl text-[#0D2247] mt-3">Penutup</h2>
    </div>

    <div class="relative bg-[#0D2247] rounded-3xl overflow-hidden p-8 md:p-12 text-white">
        <div class="absolute inset-0 opacity-5" style="background:url('https://images.unsplash.com/photo-1501854140801-50d01698950b?w=1200') center/cover;"></div>
        <div class="relative z-10 max-w-3xl">
            <div class="text-amber-400 font-bold tracking-[.2em] text-xs uppercase mb-6">Kesimpulan & Harapan</div>
            <div class="prose-white space-y-4">
                <p>RPJM Nagari Koto Tangah Batu Ampa Periode 2022–2030 merupakan dokumen perencanaan yang disusun secara partisipatif, demokratis, dan transparan, dengan melibatkan seluruh lapisan masyarakat melalui serangkaian proses musyawarah yang terstruktur.</p>
                <p>Keberhasilan pelaksanaan RPJM Nagari ini sangat bergantung pada komitmen bersama antara Pemerintah Nagari, BAMUS, Lembaga Adat, seluruh lembaga kemasyarakatan, dan segenap warga masyarakat Nagari Koto Tangah Batu Ampa.</p>
                <p>Dengan berpedoman pada visi <em class="text-amber-300 font-semibold">"Nagari yang Madani, Sejahtera dan Berbudaya berlandaskan Adat Basandi Syarak', Syarak' Basandi Kitabullah"</em>, seluruh program pembangunan diarahkan untuk mewujudkan kesejahteraan yang berkeadilan bagi seluruh masyarakat nagari.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="rpjm-card p-6">
            <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-amber-500"></span> Komitmen Pelaksanaan</h3>
            <ul class="rpjm-prose text-sm space-y-3">
                @foreach([
                    'Seluruh program dilaksanakan secara transparan dan akuntabel',
                    'Melibatkan partisipasi aktif masyarakat dalam setiap tahapan pembangunan',
                    'Pengawasan bersama oleh BAMUS dan masyarakat nagari',
                    'Pelaporan berkala kepada publik melalui media informasi nagari',
                    'Evaluasi dan penyesuaian program secara berkala sesuai kondisi terkini',
                ] as $k)
                <li class="flex items-start gap-2">
                    <i class="fas fa-check-circle text-[#3a7d44] mt-0.5 flex-shrink-0"></i>
                    <span>{{ $k }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="rpjm-card p-6">
            <h3 class="font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2"><span class="sec-accent bg-[#0D2247]"></span> Harapan ke Depan</h3>
            <ul class="rpjm-prose text-sm space-y-3">
                @foreach([
                    'Nagari yang mandiri secara ekonomi dan berdaya saing',
                    'Infrastruktur memadai untuk menopang aktivitas masyarakat',
                    'Generasi penerus yang cerdas, berkarakter, dan mencintai nagari',
                    'Lingkungan yang bersih, sehat, dan berkelanjutan',
                    'Nagari yang dikenal di tingkat kabupaten dan provinsi sebagai nagari maju',
                ] as $h)
                <li class="flex items-start gap-2">
                    <i class="fas fa-star text-amber-500 text-xs mt-1 flex-shrink-0"></i>
                    <span>{{ $h }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="rpjm-card p-6 text-center">
        <div class="text-sm text-gray-500 mb-2">Dokumen RPJM Nagari ini telah disahkan melalui</div>
        <div class="font-bold text-[#0D2247] text-base">Peraturan Nagari Koto Tangah Batu Ampa tentang RPJM Nagari Periode 2022–2030</div>
        <div class="text-xs text-gray-400 mt-1">Kecamatan Akabiluru · Kabupaten Lima Puluh Kota · Sumatera Barat</div>
    </div>

</div>

</div>
</div>

@push('scripts')
<script>
function showBab(id, btn) {
    // Sembunyikan semua konten
    document.querySelectorAll('.bab-content').forEach(function(el) {
        el.classList.remove('active');
    });
    // Tampilkan yang dipilih
    var target = document.getElementById(id);
    if (target) target.classList.add('active');

    // Update tab styling
    document.querySelectorAll('.bab-tab').forEach(function(b) {
        b.classList.remove('active');
    });
    if (btn) btn.classList.add('active');

    // Scroll ke atas konten
    var container = document.querySelector('.bg-gray-50.min-h-\\[60vh\\]');
    if (container) window.scrollTo({ top: container.offsetTop - 120, behavior: 'smooth' });
}
</script>
@endpush

@endsection
