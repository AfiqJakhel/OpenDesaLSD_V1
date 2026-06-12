@extends('theme::layouts.full-content')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>
@endpush

@section('content')
{{-- HERO --}}
<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 280px;">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1585829365295-ab7cd400c167?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
            <a href="{{ site_url('/') }}" class="hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[9px]"></i>
            <span class="text-white font-semibold">{{ $title ?? 'Berita & Artikel' }}</span>
        </nav>
        <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Informasi Publik</span>
        <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">{{ $title ?? 'Berita & Artikel' }}</h1>
        <p class="text-white/70 max-w-xl font-jakarta">Informasi terkini, pengumuman, dan artikel terbaru dari {{ ucwords(setting('sebutan_desa')) }} {{ ucwords(identitas('nama_desa')) }}.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

{{-- KONTEN --}}
<div class="bg-gray-50 min-h-screen py-10 pb-20">
    <div class="container mx-auto px-4 max-w-7xl">
        
        {{-- SEARCH & FILTER BAR --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 md:p-6 mb-10 flex flex-col md:flex-row gap-4 justify-between items-center transform -translate-y-6 relative z-20 mx-auto max-w-4xl">
            <form action="{{ site_url(uri_string()) }}" method="GET" class="w-full flex gap-3">
                @if(request()->get('kategori'))
                    <input type="hidden" name="kategori" value="{{ request()->get('kategori') }}">
                @endif
                <div class="relative flex-grow">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="cari" value="{{ $cari ?? '' }}" placeholder="Cari judul atau isi berita..." class="w-full py-3 pl-11 pr-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#0D2247] focus:border-transparent font-jakarta transition duration-200" autocomplete="off">
                </div>
                <button type="submit" class="bg-[#0D2247] hover:bg-[#1a3a5c] text-white font-bold py-3 px-6 rounded-xl transition duration-200 font-jakarta flex-shrink-0 flex items-center gap-2 shadow-md">
                    <span>Cari</span>
                </button>
            </form>
        </div>

        {{-- INFO PENCARIAN --}}
        @if(!empty($cari))
        <div class="mb-8 flex justify-between items-center">
            <p class="text-gray-600 font-jakarta text-sm">
                Hasil pencarian untuk <span class="font-bold text-gray-800">"{{ e($cari) }}"</span> 
                <span class="bg-gray-200 text-gray-700 px-2.5 py-0.5 rounded-full text-xs ml-2 font-bold">{{ $artikel->total() }} Ditemukan</span>
            </p>
            <a href="{{ site_url(uri_string()) }}" class="text-red-500 hover:text-red-700 text-sm font-semibold font-jakarta inline-flex items-center gap-1 transition">
                <i class="fas fa-times-circle"></i> Reset
            </a>
        </div>
        @endif

        {{-- ARTIKEL GRID --}}
        @if($artikel->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($artikel as $post)
                @php
                    $urlPost   = $post->url_slug ?? site_url('artikel/' . buat_slug($post->toArray()));
                    $gambarSrc = 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?w=800&q=80'; // fallback
                    if (!empty($post->gambar) && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post->gambar)) {
                        $gambarSrc = base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post->gambar);
                    }
                    $excerpt = strip_tags($post->isi ?? '');
                    $excerpt = mb_strlen($excerpt) > 120 ? mb_substr($excerpt, 0, 120) . '...' : $excerpt;
                @endphp
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col group">
                    <div class="relative h-48 overflow-hidden">
                        <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                            src="{{ $gambarSrc }}" alt="{{ $post->judul }}" onerror="this.src='https://images.unsplash.com/photo-1585829365295-ab7cd400c167?w=800&q=80'" />
                        <div class="absolute top-4 left-4">
                            <span class="bg-accent text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-lg">
                                {{ $post->kategori ?? 'Berita' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-3 text-xs text-gray-500 mb-3 font-medium font-jakarta">
                            <span class="flex items-center gap-1.5"><i class="fas fa-calendar-alt text-gray-400"></i> {{ tgl_indo($post->tgl_upload) }}</span>
                            @if(!empty($post->owner))
                            <span class="flex items-center gap-1.5"><i class="fas fa-user text-gray-400"></i> {{ $post->owner }}</span>
                            @endif
                        </div>

                        <h3 class="font-jakarta font-bold text-lg text-gray-800 leading-tight mb-3 line-clamp-2 group-hover:text-[#0D2247] transition-colors duration-200">
                            <a href="{{ $urlPost }}">{{ $post->judul }}</a>
                        </h3>
                        
                        <p class="text-gray-500 text-sm mb-6 flex-grow line-clamp-3 leading-relaxed">
                            {{ $excerpt }}
                        </p>
                        
                        <div class="pt-4 border-t border-gray-100 mt-auto">
                            <a href="{{ $urlPost }}" class="inline-flex justify-between items-center w-full group/btn text-[#0D2247] font-semibold text-sm font-jakarta transition duration-200 hover:text-blue-600">
                                <span>Baca Selengkapnya</span>
                                <span class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center group-hover/btn:bg-blue-100 transition-colors">
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            @if($artikel->lastPage() > 1)
            <div class="mt-12 flex justify-center w-full">
                {{ $artikel->appends(request()->query())->links() }}
            </div>
            @endif

        @else
            {{-- EMPTY STATE --}}
            <div class="mt-8">
                @include('theme::partials.empty_state', [
                    'icon' => 'fas fa-newspaper',
                    'title' => 'Belum Ada Artikel',
                    'description' => !empty($cari) ? 'Tidak ada artikel yang cocok dengan pencarian "'.e($cari).'". Coba gunakan kata kunci lain.' : 'Artikel akan muncul di sini setelah perangkat desa mempublikasikannya.'
                ])
            </div>
        @endif
    </div>
</div>
@endsection
