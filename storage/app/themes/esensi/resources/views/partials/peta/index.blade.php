@extends('theme::layouts.full-content')

@push('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .map-card-wrapper {
            background: white;
            border-radius: 1.5rem;
            padding: 1rem;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);
            border: 1px solid #f3f4f6;
            margin-bottom: 2rem;
            position: relative;
        }

        .map-container-inner {
            position: relative;
            width: 100%;
            height: calc(100vh - 250px);
            min-height: 500px;
            border-radius: 1rem;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            z-index: 10;
        }

        #map_canvas {
            width: 100%;
            height: 100% !important;
            position: relative;
            z-index: 1;
        }
    </style>
@endpush

@section('content')
<div class="bg-gray-50 min-h-screen py-16">
    <div class="container mx-auto px-4 max-w-7xl">
        {{-- Header Section --}}
        <div class="mb-6">
            <h1 class="font-jakarta font-extrabold text-3xl md:text-4xl text-gray-800 mb-2">Peta Desa</h1>
            <nav class="text-gray-500 text-sm font-jakarta flex items-center gap-2">
                <a href="{{ site_url('/') }}" class="hover:text-[#0D2247] transition">Beranda</a>
                <i class="fas fa-chevron-right text-[9px]"></i>
                <span class="text-[#0D2247] font-semibold">Peta Lokasi</span>
            </nav>
        </div>

        {{-- Container Peta --}}
        <div class="map-card-wrapper">
            <div class="map-container-inner">
                <div id="map_canvas"></div>
            </div>
        </div>

        {{-- Panel Info Desa di Bawah Peta --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
                <small class="text-gray-500 block mb-1 font-jakarta uppercase tracking-wider font-bold text-xs">Nama {{ ucwords(setting('sebutan_desa')) }}</small>
                <strong class="text-xl text-gray-800 font-jakarta">{{ $nama_desa ?? '-' }}</strong>
            </div>
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
                <small class="text-gray-500 block mb-1 font-jakarta uppercase tracking-wider font-bold text-xs">{{ ucwords(setting('sebutan_kecamatan')) }}</small>
                <strong class="text-xl text-gray-800 font-jakarta">{{ $kecamatan ?? '-' }}</strong>
            </div>
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
                <small class="text-gray-500 block mb-1 font-jakarta uppercase tracking-wider font-bold text-xs">{{ ucwords(setting('sebutan_kabupaten')) }}</small>
                <strong class="text-xl text-gray-800 font-jakarta">{{ $kabupaten ?? '-' }}</strong>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ theme_asset('js/helper.js') }}"></script>
    <script src="{{ asset('js/leaflet-providers.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (!empty($lat) && !empty($lng))
                var posisi = [{{ $lat }}, {{ $lng }}];
                var zoom = {{ $zoom ?: 10 }};
            @else
                var posisi = [-1.0546279422758742, 116.71875000000001];
                var zoom = 10;
            @endif

            var options = {
                maxZoom: {{ setting('max_zoom_peta') }},
                minZoom: {{ setting('min_zoom_peta') }},
            };

            var map = L.map('map_canvas', options).setView(posisi, zoom);

            //Menampilkan BaseLayers Peta
            var baseLayers = getBaseLayers(map, "{{ setting('mapbox_key') }}", "{{ setting('jenis_peta') }}");

            L.control.layers(baseLayers, null, {
                position: 'topright',
                collapsed: true
            }).addTo(map);

            @if (!empty($lat) && !empty($lng))
                var kantor_desa = L.marker(posisi).addTo(map);
            @endif

            setTimeout(function () {
                map.invalidateSize();
            }, 200);
        });
    </script>
@endpush
