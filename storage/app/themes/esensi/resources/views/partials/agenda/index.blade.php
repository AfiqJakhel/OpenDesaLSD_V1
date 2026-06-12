@extends('theme::layouts.full-content')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    .agenda-card {
        background: white; border-radius: 1.5rem; overflow: hidden;
        border: 1.5px solid #f3f4f6;
        box-shadow: 0 4px 16px -4px rgba(0,0,0,0.07);
        transition: all 0.3s;
    }
    .agenda-card:hover { transform: translateY(-4px); box-shadow: 0 16px 32px -8px rgba(0,0,0,0.14); }
    .agenda-tab {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        font-size: 0.8125rem; font-weight: 600;
        color: #6b7280;
        border-bottom: 3px solid transparent;
        transition: all 0.2s;
        white-space: nowrap;
        cursor: pointer;
    }
    .agenda-tab:hover { color: #0D2247; border-bottom-color: #c8973a55; }
    .agenda-tab.active { color: #0D2247; border-bottom-color: #c8973a; font-weight: 700; }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 280px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1506784983877-45594efa4cbe?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="{{ site_url('/') }}" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">Agenda</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Informasi</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">Agenda Kegiatan</h1>
        <p class="text-white/70 max-w-xl font-jakarta">Jadwal kegiatan dan acara di Nagari Koto Tangah Batu Ampa.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

{{-- TAB NAVIGASI --}}
<div class="bg-white shadow-sm sticky top-[96px] z-40 border-b border-gray-100" x-data="{ activeTab: 'mendatang' }">
    <div class="container mx-auto px-4 max-w-7xl overflow-x-auto scrollbar-none">
        <div class="flex">
            <button @click="activeTab = 'mendatang'" :class="activeTab === 'mendatang' ? 'active' : ''" class="agenda-tab">
                <i class="fas fa-calendar-plus text-[11px]"></i> Akan Datang
            </button>
            <button @click="activeTab = 'hari-ini'" :class="activeTab === 'hari-ini' ? 'active' : ''" class="agenda-tab">
                <i class="fas fa-calendar-day text-[11px]"></i> Hari Ini
            </button>
            <button @click="activeTab = 'selesai'" :class="activeTab === 'selesai' ? 'active' : ''" class="agenda-tab">
                <i class="fas fa-calendar-check text-[11px]"></i> Selesai
            </button>
        </div>
    </div>
</div>

{{-- KONTEN --}}
<div class="bg-gray-50 min-h-screen py-16" x-data="{ activeTab: 'mendatang' }">
<div class="container mx-auto px-4 max-w-7xl">

    @php
        use App\Models\Agenda;
        $agenda_mendatang = Agenda::show('yad')->get();
        $agenda_hari_ini = Agenda::show()->get();
        $agenda_selesai = Agenda::show('lama')->orderBy('agenda.tgl_agenda', 'desc')->limit(10)->get();
    @endphp

    {{-- AGENDA MENDATANG --}}
    <div x-show="activeTab === 'mendatang'" x-transition>
        @if($agenda_mendatang->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($agenda_mendatang as $item)
                <div class="agenda-card">
                    <div class="h-48 overflow-hidden bg-gradient-to-br from-[#3a7d44] to-[#4a9d54] relative">
                        <div class="absolute inset-0 opacity-20" style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80'); background-size: cover; background-position: center;"></div>
                        <div class="absolute top-4 right-4 bg-white rounded-xl px-4 py-2 text-center shadow-lg">
                            <div class="font-jakarta font-extrabold text-2xl text-[#3a7d44]">{{ $item->tgl_agenda->format('d') }}</div>
                            <div class="text-xs text-gray-600 font-jakarta font-bold uppercase">{{ $item->tgl_agenda->format('M Y') }}</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <span class="inline-block text-[11px] font-bold uppercase tracking-widest text-white bg-[#3a7d44] px-3 py-1.5 rounded-full mb-3 font-jakarta">
                            {{ $item->tgl_agenda->format('l, d F Y') }}
                        </span>
                        <h3 class="font-jakarta font-bold text-gray-800 text-lg mb-3 line-clamp-2">{{ $item->judul }}</h3>
                        
                        <div class="space-y-2 mb-4">
                            @if($item->lokasi_kegiatan)
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-gray-600 text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-jakarta">Lokasi</p>
                                        <p class="font-jakarta font-semibold text-sm text-gray-800">{{ $item->lokasi_kegiatan }}</p>
                                    </div>
                                </div>
                            @endif
                            @if($item->koordinator_kegiatan)
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-user text-gray-600 text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-jakarta">Koordinator</p>
                                        <p class="font-jakarta font-semibold text-sm text-gray-800">{{ $item->koordinator_kegiatan }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl p-4 md:p-8 text-center border border-gray-100 shadow-md">
                @include('theme::partials.empty_state', [
                    'title'       => 'Agenda Mendatang',
                    'description' => 'Saat ini belum ada agenda kegiatan yang dijadwalkan. Pantau terus halaman ini untuk informasi terbaru.',
                    'icon'        => 'fa-calendar-plus'
                ])
            </div>
        @endif
    </div>

    {{-- AGENDA HARI INI --}}
    <div x-show="activeTab === 'hari-ini'" x-transition x-cloak>
        @if($agenda_hari_ini->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($agenda_hari_ini as $item)
                <div class="agenda-card">
                    <div class="h-48 overflow-hidden bg-gradient-to-br from-[#c8973a] to-[#d8a74a] relative">
                        <div class="absolute inset-0 opacity-20" style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80'); background-size: cover; background-position: center;"></div>
                        <div class="absolute top-4 right-4 bg-white rounded-xl px-4 py-2 text-center shadow-lg">
                            <div class="font-jakarta font-extrabold text-sm text-[#c8973a]">HARI INI</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <span class="inline-block text-[11px] font-bold uppercase tracking-widest text-white bg-[#c8973a] px-3 py-1.5 rounded-full mb-3 font-jakarta">
                            {{ $item->tgl_agenda->format('l, d F Y') }}
                        </span>
                        <h3 class="font-jakarta font-bold text-gray-800 text-lg mb-3 line-clamp-2">{{ $item->judul }}</h3>
                        
                        <div class="space-y-2 mb-4">
                            @if($item->lokasi_kegiatan)
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-gray-600 text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-jakarta">Lokasi</p>
                                        <p class="font-jakarta font-semibold text-sm text-gray-800">{{ $item->lokasi_kegiatan }}</p>
                                    </div>
                                </div>
                            @endif
                            @if($item->koordinator_kegiatan)
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-user text-gray-600 text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-jakarta">Koordinator</p>
                                        <p class="font-jakarta font-semibold text-sm text-gray-800">{{ $item->koordinator_kegiatan }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl p-4 md:p-8 text-center border border-gray-100 shadow-md">
                @include('theme::partials.empty_state', [
                    'title'       => 'Agenda Hari Ini',
                    'description' => 'Tidak ada kegiatan yang dijadwalkan untuk hari ini.',
                    'icon'        => 'fa-calendar-day'
                ])
            </div>
        @endif
    </div>

    {{-- AGENDA SELESAI --}}
    <div x-show="activeTab === 'selesai'" x-transition x-cloak>
        @if($agenda_selesai->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($agenda_selesai as $item)
                <div class="agenda-card opacity-75">
                    <div class="h-48 overflow-hidden bg-gradient-to-br from-gray-600 to-gray-700 relative">
                        <div class="absolute inset-0 opacity-20" style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80'); background-size: cover; background-position: center;"></div>
                        <div class="absolute top-4 right-4 bg-white rounded-xl px-4 py-2 text-center shadow-lg">
                            <div class="font-jakarta font-extrabold text-2xl text-gray-700">{{ $item->tgl_agenda->format('d') }}</div>
                            <div class="text-xs text-gray-600 font-jakarta font-bold uppercase">{{ $item->tgl_agenda->format('M Y') }}</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <span class="inline-block text-[11px] font-bold uppercase tracking-widest text-white bg-gray-600 px-3 py-1.5 rounded-full mb-3 font-jakarta">
                            {{ $item->tgl_agenda->format('l, d F Y') }}
                        </span>
                        <h3 class="font-jakarta font-bold text-gray-800 text-lg mb-3 line-clamp-2">{{ $item->judul }}</h3>
                        
                        <div class="space-y-2 mb-4">
                            @if($item->lokasi_kegiatan)
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-gray-600 text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-jakarta">Lokasi</p>
                                        <p class="font-jakarta font-semibold text-sm text-gray-800">{{ $item->lokasi_kegiatan }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl p-4 md:p-8 text-center border border-gray-100 shadow-md">
                @include('theme::partials.empty_state', [
                    'title'       => 'Riwayat Agenda',
                    'description' => 'Belum ada agenda kegiatan yang telah selesai dilaksanakan.',
                    'icon'        => 'fa-calendar-check'
                ])
            </div>
        @endif
    </div>

</div>
</div>

@endsection
