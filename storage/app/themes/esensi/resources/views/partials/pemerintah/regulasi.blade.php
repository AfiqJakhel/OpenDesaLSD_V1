@extends('theme::layouts.full-content')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    .gov-tab {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        font-size: 0.8125rem; font-weight: 600;
        color: #6b7280;
        border-bottom: 3px solid transparent;
        transition: all 0.2s;
        white-space: nowrap;
        text-decoration: none;
    }
    .gov-tab:hover { color: #0D2247; border-bottom-color: #c8973a55; }
    .gov-tab.active { color: #0D2247; border-bottom-color: #c8973a; font-weight: 700; }
    .peraturan-row {
        display: grid; grid-template-columns: auto 1fr auto;
        align-items: center; gap: 1rem;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #f3f4f6;
        transition: background 0.15s;
    }
    .peraturan-row:last-child { border-bottom: none; }
    .peraturan-row:hover { background: #f9fafb; }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 260px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="{{ site_url('/') }}" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <a href="{{ site_url('pemerintah') }}" class="hover:text-white transition">Pemerintahan</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">Regulasi</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Produk Hukum</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">Peraturan Nagari</h1>
        <p class="text-white/70 max-w-xl font-jakarta">Daftar peraturan nagari yang berlaku sebagai landasan hukum penyelenggaraan pemerintahan.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="white"/>
        </svg>
    </div>
</section>

{{-- TAB NAVIGASI --}}
<div class="bg-white shadow-sm sticky top-[96px] z-40 border-b border-gray-100">
    <div class="container mx-auto px-4 max-w-7xl overflow-x-auto scrollbar-none">
        <div class="flex">
            <a href="{{ site_url('pemerintah') }}" class="gov-tab"><i class="fas fa-users text-[11px]"></i> Aparatur Nagari</a>
            <a href="{{ site_url('sotk') }}" class="gov-tab"><i class="fas fa-sitemap text-[11px]"></i> Struktur Organisasi</a>
            <a href="{{ site_url('pemerintah/tugas-fungsi') }}" class="gov-tab"><i class="fas fa-tasks text-[11px]"></i> Tugas & Fungsi</a>
            <a href="{{ site_url('pemerintah/regulasi') }}" class="gov-tab active"><i class="fas fa-gavel text-[11px]"></i> Regulasi</a>
            <a href="{{ site_url('pemerintah/transparansi') }}" class="gov-tab"><i class="fas fa-chart-pie text-[11px]"></i> Transparansi</a>
        </div>
    </div>
</div>

{{-- KONTEN --}}
<div class="bg-gray-50 min-h-screen py-16">
<div class="container mx-auto px-4 max-w-5xl">

    <div class="text-center mb-12">
        <h2 class="font-jakarta font-extrabold text-3xl text-[#0D2247]">Daftar Peraturan Nagari</h2>
        <p class="text-gray-500 mt-3 text-sm max-w-lg mx-auto">Peraturan yang berlaku dan menjadi dasar penyelenggaraan pemerintahan Nagari Koto Tangah Batu Ampa.</p>
    </div>

    @php
        // Data statis peraturan nagari
        $peraturan_db = [];   // kosong → pakai fallback

        // Data statis fallback
        $peraturan_default = [
            [
                'kategori' => 'APBNag',
                'nomor' => '01',
                'tahun' => '2023',
                'judul' => 'Anggaran Pendapatan dan Belanja Nagari (APBNag) Tahun Anggaran 2023',
                'status' => 'Berlaku',
                'color' => '#c8973a',
            ],
            [
                'kategori' => 'Aset',
                'nomor' => '02',
                'tahun' => '2023',
                'judul' => 'Pengelolaan Aset Nagari Koto Tangah Batu Ampa',
                'status' => 'Berlaku',
                'color' => '#3a7d44',
            ],
            [
                'kategori' => 'Ketertiban',
                'nomor' => '03',
                'tahun' => '2022',
                'judul' => 'Ketertiban Umum dan Ketenteraman Masyarakat',
                'status' => 'Berlaku',
                'color' => '#0D2247',
            ],
            [
                'kategori' => 'Pemberdayaan',
                'nomor' => '01',
                'tahun' => '2022',
                'judul' => 'Pemberdayaan Masyarakat dan Lembaga Kemasyarakatan Nagari',
                'status' => 'Berlaku',
                'color' => '#8b3a2a',
            ],
            [
                'kategori' => 'APBNag',
                'nomor' => '01',
                'tahun' => '2021',
                'judul' => 'Anggaran Pendapatan dan Belanja Nagari (APBNag) Tahun Anggaran 2021',
                'status' => 'Tidak Berlaku',
                'color' => '#9ca3af',
            ],
            [
                'kategori' => 'Tata Kelola',
                'nomor' => '02',
                'tahun' => '2021',
                'judul' => 'Tata Kelola Pemerintahan Nagari yang Baik',
                'status' => 'Berlaku',
                'color' => '#1a5c52',
            ],
        ];

        $peraturan_tampil = $peraturan_default;

        // Group by tahun
        $by_tahun = [];
        foreach ($peraturan_tampil as $p) {
            $by_tahun[$p['tahun']][] = $p;
        }
        krsort($by_tahun);
    @endphp

    {{-- Filter & Info --}}
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-[#0D2247] rounded-xl flex items-center justify-center">
                <i class="fas fa-gavel text-white text-sm"></i>
            </div>
            <div>
                <p class="font-jakarta font-bold text-[#0D2247] text-sm">Total {{ count($peraturan_tampil) }} Peraturan</p>
                <p class="text-gray-400 text-xs">Nagari Koto Tangah Batu Ampa</p>
            </div>
        </div>
        @if(empty($peraturan_db))
        <div class="bg-amber-50 border border-amber-200 text-amber-700 text-xs px-4 py-2 rounded-xl font-jakarta">
            <i class="fas fa-info-circle mr-1"></i> Data statis – perbarui via Admin → Produk Hukum
        </div>
        @endif
    </div>

    {{-- Tabel Peraturan grouped by tahun --}}
    <div class="space-y-8">
        @foreach($by_tahun as $tahun => $peraturan_list)
        <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-md">
            {{-- Header Tahun --}}
            <div class="flex items-center gap-3 px-6 py-4 bg-[#0D2247]">
                <span class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center text-white font-jakarta font-bold text-xs">{{ $tahun }}</span>
                <span class="font-jakarta font-bold text-white text-sm">Tahun {{ $tahun }}</span>
                <span class="ml-auto text-white/50 text-xs">{{ count($peraturan_list) }} peraturan</span>
            </div>

            {{-- Daftar --}}
            <div>
                @foreach($peraturan_list as $idx => $p)
                <div class="peraturan-row">
                    {{-- Nomor --}}
                    <div class="w-16 h-16 rounded-2xl flex flex-col items-center justify-center flex-shrink-0 text-white text-center" style="background: {{ $p['color'] }};">
                        <span class="font-jakarta font-extrabold leading-none text-lg">{{ str_pad($p['nomor'], 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="text-[9px] text-white/70 mt-0.5">/{{ $p['tahun'] }}</span>
                    </div>
                    
                    {{-- Judul --}}
                    <div>
                        <p class="text-[10px] font-jakarta font-bold uppercase tracking-widest mb-1" style="color: {{ $p['color'] }};">
                            {{ $p['kategori'] }}
                        </p>
                        <p class="font-jakarta font-semibold text-gray-800 text-sm leading-relaxed">
                            Pernag No. {{ $p['nomor'] }}/{{ $p['tahun'] }} tentang {{ $p['judul'] }}
                        </p>
                    </div>

                    {{-- Status & Aksi --}}
                    <div class="flex flex-col items-end gap-2 flex-shrink-0">
                        @if($p['status'] === 'Berlaku')
                            <span class="text-[11px] bg-green-50 text-green-700 px-3 py-1 rounded-full font-jakarta font-bold">✓ Berlaku</span>
                        @else
                            <span class="text-[11px] bg-gray-50 text-gray-400 px-3 py-1 rounded-full font-jakarta font-bold">Tidak Berlaku</span>
                        @endif
                        @if(!empty($p['url']))
                            <a href="{{ $p['url'] }}" target="_blank" class="text-[11px] text-[#0D2247] font-jakarta font-bold hover:text-accent transition flex items-center gap-1">
                                <i class="fas fa-download text-[9px]"></i> Unduh
                            </a>
                        @else
                            <span class="text-[11px] text-gray-300 font-jakarta">Dokumen segera</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    {{-- Catatan Hukum --}}
    <div class="mt-12 bg-white rounded-3xl p-8 border border-gray-100 shadow-md">
        <h3 class="font-jakarta font-bold text-[#0D2247] text-base mb-4 flex items-center gap-2">
            <i class="fas fa-balance-scale text-accent"></i> Dasar Hukum
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-600 font-jakarta">
            <div class="flex items-start gap-2">
                <i class="fas fa-dot-circle text-accent text-[10px] mt-1.5 flex-shrink-0"></i>
                <span>UU No. 6 Tahun 2014 tentang Desa</span>
            </div>
            <div class="flex items-start gap-2">
                <i class="fas fa-dot-circle text-accent text-[10px] mt-1.5 flex-shrink-0"></i>
                <span>PP No. 43 Tahun 2014 tentang Peraturan Pelaksanaan UU Desa</span>
            </div>
            <div class="flex items-start gap-2">
                <i class="fas fa-dot-circle text-accent text-[10px] mt-1.5 flex-shrink-0"></i>
                <span>Permendesa No. 1 Tahun 2015 tentang Pedoman Kewenangan Berdasarkan Hak Asal Usul</span>
            </div>
            <div class="flex items-start gap-2">
                <i class="fas fa-dot-circle text-accent text-[10px] mt-1.5 flex-shrink-0"></i>
                <span>Perda Kabupaten Lima Puluh Kota tentang Pemerintahan Nagari</span>
            </div>
        </div>
    </div>

</div>
</div>

@endsection
