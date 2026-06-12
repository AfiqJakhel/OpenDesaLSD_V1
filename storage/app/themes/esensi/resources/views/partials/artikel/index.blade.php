@extends('theme::layouts.home')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .hero-slider { @apply relative overflow-hidden; }
    /* Micro-animations */
    .hover-lift { @apply transition-transform duration-300 hover:-translate-y-2; }
    .card-shadow { box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1); }
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    /* Modern Leaflet Popup Styling */
    .leaflet-popup-content-wrapper {
        border-radius: 16px !important;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15) !important;
        padding: 4px !important;
    }
    .leaflet-popup-content { margin: 12px 16px !important; line-height: 1.5 !important; }
    .leaflet-popup-tip { box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15) !important; }
</style>
@endpush

@section('content')
<!-- 1. HERO CAROUSEL -->
<section class="relative w-full h-[500px] lg:h-[600px] overflow-hidden" x-data="heroCarousel()">
    <!-- Slider Container -->
    <div class="relative w-full h-full">
        @php $slideIndex = 0; @endphp
        @foreach ($slider_gambar['gambar'] as $data)
            @php
                $img = $slider_gambar['lokasi'] . 'sedang_' . $data['gambar'];
            @endphp
            @if (is_file($img))
                <div class="absolute inset-0 w-full h-full transition-all duration-600 ease-in-out"
                     :class="currentSlide === {{ $slideIndex }} ? 'opacity-100 translate-x-0 z-10' : (currentSlide > {{ $slideIndex }} ? 'opacity-0 -translate-x-full z-0' : 'opacity-0 translate-x-full z-0')"
                     style="transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.6s;">
                    <!-- Background Image -->
                    <img src="{{ base_url($img) }}" alt="{{ $data['judul'] }}" class="w-full h-full object-cover">
                    
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>
                    
                    <!-- Content Overlay -->
                    @if ($slider_gambar['sumber'] != 3 && $data['judul'])
                        <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-12">
                            <div class="container mx-auto max-w-7xl">
                                <h2 class="text-2xl lg:text-4xl font-bold text-white mb-3 drop-shadow-lg">{{ $data['judul'] }}</h2>
                                <a href="{{ site_url('artikel/' . buat_slug($data)) }}" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm lg:text-base font-medium transition">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                @php $slideIndex++; @endphp
            @endif
        @endforeach
        
        @if($slideIndex === 0)
            <!-- Fallback: Multiple images untuk demo carousel -->
            @php 
                $placeholderImages = ['nagari-landscape1', 'nagari-landscape2', 'nagari-landscape3'];
                $slideIndex = 0;
            @endphp
            
            @foreach($placeholderImages as $seed)
                <div class="absolute inset-0 w-full h-full transition-all duration-600 ease-in-out"
                     :class="currentSlide === {{ $slideIndex }} ? 'opacity-100 translate-x-0 z-10' : (currentSlide > {{ $slideIndex }} ? 'opacity-0 -translate-x-full z-0' : 'opacity-0 translate-x-full z-0')"
                     style="transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.6s;">
                    <img src="https://picsum.photos/1920/1080?seed={{ $seed }}" class="w-full h-full object-cover" alt="Hero Background">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>
                </div>
                @php $slideIndex++; @endphp
            @endforeach
        @endif
    </div>
    
    <!-- Hero Content (Always Visible) -->
    <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center px-4 pointer-events-none">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-3 uppercase tracking-tight drop-shadow-2xl">
            {{ $desa['nama_desa'] }}
        </h1>
        <p class="text-lg md:text-xl lg:text-2xl text-white/95 font-light mb-8 drop-shadow-lg">
            Kecamatan {{ $desa['nama_kecamatan'] }}, Kabupaten {{ $desa['nama_kabupaten'] }}
        </p>
    </div>
    
    <!-- Navigation Arrows -->
    @if($slideIndex > 1)
    <div class="absolute inset-0 z-30 pointer-events-none">
        <button @click="prevSlide()" class="absolute left-4 lg:left-8 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white transition-all pointer-events-auto opacity-0 hover:opacity-100 group-hover:opacity-100">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>
        <button @click="nextSlide()" class="absolute right-4 lg:right-8 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white transition-all pointer-events-auto opacity-0 hover:opacity-100 group-hover:opacity-100">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>
    </div>
    @endif
</section>

<script>
function heroCarousel() {
    return {
        currentSlide: 0,
        totalSlides: {{ $slideIndex }},
        autoplayInterval: null,
        isPaused: false,
        
        init() {
            if (this.totalSlides > 1) {
                this.startAutoplay();
                
                // Pause on hover
                this.$el.addEventListener('mouseenter', () => {
                    this.isPaused = true;
                    this.stopAutoplay();
                });
                
                // Resume on mouse leave
                this.$el.addEventListener('mouseleave', () => {
                    this.isPaused = false;
                    this.startAutoplay();
                });
            }
        },
        
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            this.resetAutoplay();
        },
        
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            this.resetAutoplay();
        },
        
        goToSlide(index) {
            this.currentSlide = index;
            this.resetAutoplay();
        },
        
        startAutoplay() {
            if (this.totalSlides > 1) {
                this.autoplayInterval = setInterval(() => {
                    if (!this.isPaused) {
                        this.nextSlide();
                    }
                }, 5000); // Auto-slide every 5 seconds
            }
        },
        
        stopAutoplay() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
            }
        },
        
        resetAutoplay() {
            this.stopAutoplay();
            if (!this.isPaused && this.totalSlides > 1) {
                this.startAutoplay();
            }
        }
    }
}
</script>

<!-- 2. MENU SHORTCUT (Overlap Hero) -->
<section class="relative z-20 -mt-16 container mx-auto px-4 max-w-7xl">
    <div class="grid grid-cols-2 md:grid-cols-6 gap-6">
        @php
            $shortcuts = [
                ['label' => 'Data Wilayah', 'icon' => 'fa-map', 'color' => 'bg-blue-500', 'link' => 'data-wilayah'],
                ['label' => 'Lapak Desa', 'icon' => 'fa-store', 'color' => 'bg-orange-500', 'link' => 'lapak'],
                ['label' => 'Artikel', 'icon' => 'fa-newspaper', 'color' => 'bg-green-500', 'link' => 'berita'],
                ['label' => 'Arsip', 'icon' => 'fa-archive', 'color' => 'bg-purple-500', 'link' => 'arsip'],
                ['label' => 'Album', 'icon' => 'fa-images', 'color' => 'bg-red-500', 'link' => 'galeri'],
                ['label' => 'Pengaduan', 'icon' => 'fa-bullhorn', 'color' => 'bg-teal-500', 'link' => 'pengaduan'],
            ];
        @endphp
        @foreach($shortcuts as $item)
        <a href="{{ site_url($item['link']) }}" class="bg-white p-6 rounded-2xl card-shadow flex flex-col items-center justify-center gap-4 hover-lift group">
            <div class="w-14 h-14 {{ $item['color'] }} text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg transition-transform group-hover:rotate-12">
                <i class="fas {{ $item['icon'] }}"></i>
            </div>
            <span class="font-bold text-gray-800 text-sm whitespace-nowrap">{{ $item['label'] }}</span>
        </a>
        @endforeach
    </div>
</section>

<!-- 3. TENTANG DESA -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50/50">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 items-center">
            <!-- Kolom Kiri: Rangkuman & Action -->
            <div class="lg:col-span-7">
                <span class="text-accent font-extrabold tracking-[0.2em] text-xs uppercase bg-accent/10 px-4 py-1.5 rounded-full">Profil Singkat</span>
                <h2 class="text-4xl font-extrabold text-primary mt-6 mb-6 leading-tight">Tentang {{ setting('sebutan_desa') ?? 'Desa' }} {{ $desa['nama_desa'] }}</h2>
                <div class="text-gray-600 leading-relaxed text-lg mb-10">
                    <p>Nagari Koto Tangah Batu Ampa yang terletak di Kecamatan Akabiluru, Kabupaten Lima Puluh Kota, Sumatera Barat, merupakan wilayah agraris seluas ± 2.244 Ha yang terbagi menjadi 6 Jorong (Koto Tangah, Batu Tanyuh, Tambun Ijuk, Seberang Parit, Piladang, dan Sungai Cubadak). Berlandaskan filosofi adat <em>'Adat Basandi Syarak, Syarak Basandi Kitabullah'</em>, nagari ini berkomitmen melaksanakan Rencana Pembangunan Jangka Menengah Nagari (RPJM Nagari) periode 2022–2030 guna mewujudkan tata kelola pemerintahan yang madani, peningkatan ekonomi lokal berbasis pertanian dan UMKM, serta pemerataan pembangunan infrastruktur yang berkelanjutan.</p>
                </div>
                <a href="{{ site_url('profil_desa') }}" class="inline-flex items-center gap-2.5 bg-primary text-white hover:bg-accent px-8 py-3.5 rounded-full font-bold shadow-md hover:shadow-xl hover:-translate-y-0.5 active:scale-95 transition-all duration-300">
                    Selengkapnya <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>
            
            <!-- Kolom Kanan: 4 Info Cards Modern (No Hardcoded Photos) -->
            <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                <!-- Card 1: Luas Wilayah -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 group hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <div class="font-extrabold text-2xl text-gray-800">2.244 Ha</div>
                    <div class="text-xs text-gray-400 font-semibold uppercase mt-1 tracking-wider">Luas Wilayah</div>
                </div>

                <!-- Card 2: 6 Jorong -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 group hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div class="font-extrabold text-2xl text-gray-800">6 Jorong</div>
                    <div class="text-xs text-gray-400 font-semibold uppercase mt-1 tracking-wider">Wilayah Adat</div>
                </div>

                <!-- Card 3: Adat ABS-SBK -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 group hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="font-extrabold text-2xl text-gray-800">ABS-SBK</div>
                    <div class="text-xs text-gray-400 font-semibold uppercase mt-1 tracking-wider">Filosofi Adat</div>
                </div>

                <!-- Card 4: Periode RPJM -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 group hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="font-extrabold text-2xl text-gray-800">2022–2030</div>
                    <div class="text-xs text-gray-400 font-semibold uppercase mt-1 tracking-wider">Periode RPJM</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. VIDEO PROFILE NAGARI (FULL BLEED) -->
<section class="relative w-[85%] mx-auto bg-[#0D1B2A] overflow-hidden rounded-2xl" id="video-profile" style="aspect-ratio: 16/9; min-height: 37vw;">
    <video id="nagari-video" class="absolute inset-0 w-full h-full object-cover" playsinline controls loop preload="auto">
        <source src="/OpenSID/video_nagari.php" type="video/mp4">
    </video>
</section>



<!-- 6. SECTION PETA & DATA PENDUDUK (50:50) -->
<section class="py-24">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Peta -->
            <div class="map-section-wrapper bg-white p-2 rounded-[32px] shadow-2xl overflow-hidden min-h-[500px]" style="position: relative; z-index: 1; isolation: isolate;">
                <div id="map" class="w-full h-full rounded-[24px]"></div>
            </div>
            
            <!-- Grafik Data Penduduk -->
            <div class="flex flex-col">
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <span class="text-accent font-extrabold tracking-[0.2em] text-xs uppercase">Statistik</span>
                        <h2 class="text-4xl font-bold text-primary mt-2">Data Penduduk</h2>
                    </div>
                    <a href="{{ site_url('statistik/0') }}" class="bg-primary/5 text-primary px-6 py-2 rounded-full font-bold hover:bg-primary text-sm hover:text-white transition">Selengkapnya</a>
                </div>
                
                <div id="penduduk-chart" class="flex-grow bg-white p-6 rounded-3xl border border-gray-100 shadow-xl"></div>
            </div>
        </div>
    </div>
</section>

<!-- 9. SECTION LAYANAN MANDIRI (Modern Split Layout) -->
<section class="py-24 bg-gray-50" id="layanan-mandiri">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-12">
            <span class="text-accent font-extrabold tracking-[0.2em] text-xs uppercase">Akses Warga</span>
            <h2 class="text-4xl font-bold text-primary mt-2">Layanan Mandiri</h2>
        </div>
        
        <!-- Split Layout Container -->
        <div class="grid grid-cols-1 lg:grid-cols-5 bg-white rounded-3xl shadow-2xl overflow-hidden">
            <!-- Kolom Kiri: Branding (Navy Background) - Hidden on Mobile -->
            <div class="hidden lg:flex lg:col-span-2 bg-[#0D2247] text-white p-12 flex-col justify-center items-center text-center relative overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -mr-16 -mt-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full -ml-12 -mb-12"></div>
                
                <div class="relative z-10">
                    <!-- Logo Nagari -->
                    <div class="mb-8">
                        <img src="{{ gambar_desa($desa['logo']) }}" alt="Logo" class="h-24 w-auto mx-auto drop-shadow-[0_0_15px_rgba(255,255,255,0.3)]">
                    </div>
                    
                    <!-- Nama Nagari -->
                    <h3 class="text-2xl font-bold mb-2 uppercase tracking-tight">{{ $desa['nama_desa'] }}</h3>
                    <p class="text-white/70 text-sm mb-8">{{ $desa['nama_kecamatan'] }}, {{ $desa['nama_kabupaten'] }}</p>
                    
                    <!-- Tagline -->
                    <div class="w-16 h-0.5 bg-accent mx-auto mb-6"></div>
                    <p class="text-white/90 text-base font-light leading-relaxed mb-8">
                        Layanan administrasi digital untuk kemudahan warga
                    </p>
                    
                    <!-- 3 Bullet Keunggulan -->
                    <div class="space-y-4 text-left max-w-xs mx-auto">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-accent/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-check text-accent text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold">Akses 24/7</p>
                                <p class="text-xs text-white/60">Layanan tersedia kapan saja</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-accent/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-check text-accent text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold">Proses Cepat</p>
                                <p class="text-xs text-white/60">Tanpa antrian panjang</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-accent/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-check text-accent text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold">Aman & Terpercaya</p>
                                <p class="text-xs text-white/60">Data terenkripsi dengan baik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Kolom Kanan: Form Login (White Background) -->
            <div class="lg:col-span-3 p-8 md:p-12">
                <!-- Mobile Logo (Only visible on mobile) -->
                <div class="lg:hidden flex justify-center mb-8">
                    <img src="{{ gambar_desa($desa['logo']) }}" alt="Logo" class="h-16 w-auto">
                </div>
                
                <div class="max-w-md mx-auto">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Masuk ke Akun Anda</h3>
                    <p class="text-gray-500 text-sm mb-8">Silakan masukkan NIK dan PIN untuk mengakses layanan</p>
                    
                    <form action="{{ site_url('layanan-mandiri/cek') }}" method="POST" class="space-y-6">
                        <input type="hidden" name="{{ get_instance()->security->get_csrf_token_name() }}" value="{{ get_instance()->security->get_csrf_hash() }}">
                        
                        <!-- Input NIK dengan Floating Label -->
                        <div class="relative">
                            <input type="text" name="nik" id="nik-input" placeholder=" " maxlength="16" required
                                   class="peer w-full px-4 pt-6 pb-2 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-0 transition outline-none text-gray-800">
                            <label for="nik-input" class="absolute left-4 top-2 text-xs font-semibold text-gray-500 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-xs peer-focus:text-primary">
                                Nomor KTP (NIK)
                            </label>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300">
                                <i class="fas fa-id-card"></i>
                            </span>
                        </div>
                        
                        <!-- Input PIN dengan Floating Label -->
                        <div class="relative">
                            <input type="password" name="password" id="pin-input" placeholder=" " required
                                   class="peer w-full px-4 pt-6 pb-2 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-0 transition outline-none text-gray-800">
                            <label for="pin-input" class="absolute left-4 top-2 text-xs font-semibold text-gray-500 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-xs peer-focus:text-primary">
                                Kode PIN
                            </label>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        
                        <!-- Checkbox Tampilkan PIN -->
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="show-pin-lm" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer">
                            <label for="show-pin-lm" class="text-sm text-gray-600 cursor-pointer select-none">Tampilkan PIN</label>
                        </div>
                        
                        <!-- Tombol Masuk -->
                        <button type="submit" class="w-full bg-[#0D2247] hover:bg-[#1a3a6e] text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all active:scale-[0.98] text-base">
                            <i class="fas fa-sign-in-alt mr-2"></i> Masuk Layanan
                        </button>
                    </form>
                    
                    <!-- Link Lupa PIN -->
                    <div class="text-center mt-8 pt-6 border-t border-gray-100">
                        <p class="text-sm text-gray-500 mb-2">Lupa PIN Anda?</p>
                        <a href="mailto:{{ $desa['email_desa'] ?? 'admin@desa.id' }}" class="text-primary font-semibold text-sm hover:text-accent transition">
                            <i class="fas fa-envelope mr-1.5"></i> Hubungi Admin Desa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. SECTION GALERI (2x4 Grid) -->
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex justify-between items-end mb-12">
            <div>
                <span class="text-accent font-extrabold tracking-[0.2em] text-xs uppercase">Visual</span>
                <h2 class="text-4xl font-bold text-primary mt-2">Galeri Desa</h2>
            </div>
            <a href="{{ site_url('galeri') }}" class="hidden md:block bg-white text-primary border border-primary px-8 py-3 rounded-full font-bold hover:bg-primary hover:text-white transition">Lihat Semua Galeri</a>
        </div>

        @php
            // Ambil foto-foto nyata dari database (anak album, bukan album induk)
            $galeriPhotos = \App\Models\Galery::where('parrent', '>', 0)
                ->where('enabled', 1)
                ->whereNotNull('gambar')
                ->where('gambar', '!=', '')
                ->orderByDesc('id')
                ->limit(8)
                ->get()
                ->filter(fn($g) => file_exists(FCPATH . LOKASI_GALERI . 'sedang_' . $g->gambar));

            // Jika tidak ada foto nyata, coba dari album induk yang punya gambar sendiri
            if ($galeriPhotos->isEmpty()) {
                $galeriPhotos = \App\Models\Galery::where('enabled', 1)
                    ->whereNotNull('gambar')
                    ->where('gambar', '!=', '')
                    ->orderByDesc('id')
                    ->limit(8)
                    ->get()
                    ->filter(fn($g) => file_exists(FCPATH . LOKASI_GALERI . 'sedang_' . $g->gambar));
            }
        @endphp

        @if($galeriPhotos->isNotEmpty())
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($galeriPhotos as $foto)
                    @php $fotoUrl = base_url(LOKASI_GALERI . 'sedang_' . $foto->gambar); @endphp
                    <a href="{{ $fotoUrl }}"
                       data-fancybox="landing-gallery"
                       data-caption="{{ $foto->nama ?? '' }}"
                       class="relative group h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition-all duration-300 block">
                        <img src="{{ $fotoUrl }}"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                             alt="{{ $foto->nama ?? 'Galeri' }}"
                             loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-6">
                            <span class="text-white text-sm font-bold uppercase tracking-widest translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <i class="fas fa-search-plus mr-2 text-accent"></i> Perbesar
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            {{-- Fallback placeholder jika belum ada foto --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @for($i = 1; $i <= 8; $i++)
                <div class="relative group h-64 rounded-2xl overflow-hidden shadow-md bg-gradient-to-br from-primary/10 to-accent/10 flex flex-col items-center justify-center">
                    <i class="fas fa-camera text-4xl text-primary/30 mb-3"></i>
                    <span class="text-primary/40 text-xs font-semibold">Belum ada foto</span>
                </div>
                @endfor
            </div>
            <div class="text-center mt-6">
                <p class="text-gray-400 text-sm">Upload foto galeri melalui panel admin untuk menampilkan dokumentasi di sini.</p>
            </div>
        @endif

        <div class="text-center mt-8 md:hidden">
            <a href="{{ site_url('galeri') }}" class="inline-block bg-white text-primary border border-primary px-8 py-3 rounded-full font-bold hover:bg-primary hover:text-white transition">Lihat Semua Galeri</a>
        </div>
    </div>
</section>


<!-- 8. SECTION BERITA TERBARU -->
<section class="py-24">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="text-center mb-16">
            <span class="text-accent font-extrabold tracking-[0.2em] text-xs uppercase">Informasi</span>
            <h2 class="text-4xl font-bold text-primary mt-2">Berita Terbaru</h2>
        </div>
        
        @php
            // Ambil 3 artikel terbaru dari database
            $artikelTerbaru = \App\Models\Artikel::where('enabled', 1)
                ->orderBy('tgl_upload', 'desc')
                ->limit(3)
                ->get();
        @endphp
        
        @if($artikelTerbaru->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($artikelTerbaru as $post)
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden">
                        @if ($post->gambar && is_file(LOKASI_FOTO_ARTIKEL . 'kecil_' . $post->gambar))
                            <img src="{{ base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post->gambar) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $post->judul }}">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                                <i class="fas fa-newspaper text-white text-5xl opacity-30"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="bg-accent text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-lg">
                                {{ $post->category->kategori ?? 'Berita' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 leading-tight group-hover:text-primary transition">
                            <a href="{{ $post->url_slug }}">{{ $post->judul }}</a>
                        </h3>
                        <div class="flex items-center gap-4 text-gray-400 text-xs mb-4">
                            <span><i class="far fa-calendar-alt mr-1.5"></i> {{ tgl_indo($post->tgl_upload) }}</span>
                            <span><i class="far fa-user mr-1.5"></i> {{ $post->owner }}</span>
                        </div>
                        <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed mb-4">
                            {{ strip_tags(substr($post->isi, 0, 150)) }}...
                        </p>
                        <a href="{{ $post->url_slug }}" class="inline-flex items-center gap-2 text-primary font-bold text-sm hover:text-accent transition">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-16">
                <a href="{{ site_url('berita') }}" class="inline-block border-2 border-primary text-primary px-12 py-4 rounded-full font-bold hover:bg-primary hover:text-white transition shadow-lg">Buka Semua Berita</a>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-newspaper text-gray-300 text-4xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Artikel</h3>
                <p class="text-gray-500 max-w-md mx-auto">Belum ada artikel yang dipublikasikan. Silakan cek kembali nanti.</p>
            </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Plyr !== 'undefined') {
        const player = new Plyr('#nagari-video', {
            controls: [
                'play-large', 'play', 'progress', 'current-time', 
                'duration', 'mute', 'volume', 'fullscreen'
            ],
            loop: { active: true }
        });
    }
});
</script>
@endpush

@endsection

@push('scripts')
<script>
    // PIN Toggle untuk Layanan Mandiri
    document.getElementById('show-pin-lm').addEventListener('change', function() {
        const pinInput = document.getElementById('pin-input');
        pinInput.type = this.checked ? 'text' : 'password';
    });
</script>
@endpush


@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    // Initialize Map
    try {
        var map = L.map('map').setView([-0.2641948, 100.5579674], 15);
        
        // CartoDB Positron TileLayer
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OSM</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>'
        }).addTo(map);
        
        // Custom Modern Marker
        var customIcon = L.divIcon({
            className: 'custom-div-icon',
            html: "<div style='background-color:#0D2247; width:28px; height:28px; border-radius:50%; border:3px solid white; box-shadow: 0 4px 10px rgba(0,0,0,0.3); display:flex; align-items:center; justify-content:center;'><div style='width:8px; height:8px; background:white; border-radius:50%;'></div></div>",
            iconSize: [28, 28],
            iconAnchor: [14, 14],
            popupAnchor: [0, -14]
        });

        // Custom Popup Content
        var popupContent = `
            <div class="font-sans">
                <h4 class="font-bold text-[#0D2247] text-[15px] mb-1">Kantor Desa {{ $desa['nama_desa'] }}</h4>
                <p class="text-[13px] text-gray-500 mb-4 leading-relaxed">Pauah Sangik, Jl. Raya Simpang Batu Hampar No.KM 1<br>Kec. Akabiluru, Kab. Lima Puluh Kota</p>
                <a href="https://maps.app.goo.gl/9VB853vy1v6t7nfw5" target="_blank" class="inline-flex items-center justify-center w-full bg-[#1D9E75] text-white text-xs font-bold px-4 py-2.5 rounded-xl hover:bg-[#167d5c] shadow hover:shadow-lg transition-all active:scale-95">
                    Buka di Google Maps <i class="fas fa-external-link-alt ml-2"></i>
                </a>
            </div>
        `;
        
        L.marker([-0.2641948, 100.5579674], {icon: customIcon}).addTo(map)
            .bindPopup(popupContent)
            .openPopup();
    } catch(e) { 
        console.error('Map init error:', e); 
    }

    // Initialize Chart
    @php
        $lk = \App\Models\Penduduk::withoutGlobalScopes()->where('status_dasar', 1)->where('sex', 1)->count();
        $pr = \App\Models\Penduduk::withoutGlobalScopes()->where('status_dasar', 1)->where('sex', 2)->count();
        if($lk + $pr == 0) { $lk = 1250; $pr = 1350; }
    @endphp
    try {
        Highcharts.chart('penduduk-chart', {
            chart: { type: 'column', backgroundColor: 'transparent' },
            title: { text: '' },
            xAxis: { categories: ['Laki-Laki', 'Perempuan', 'Total'], crosshair: true },
            yAxis: { min: 0, title: { text: 'Jiwa' } },
            legend: { enabled: false },
            tooltip: { shared: true },
            plotOptions: { column: { pointPadding: 0.2, borderWidth: 0, dataLabels: { enabled: true } } },
            series: [{
                name: 'Populasi',
                data: [
                    { y: {{ $lk }}, color: '#3b82f6' },
                    { y: {{ $pr }}, color: '#ec4899' },
                    { y: {{ $lk + $pr }}, color: '#10b981' }
                ]
            }],
            credits: { enabled: false }
        });
    } catch(e) { console.error('Chart error:', e); }

</script>
@endpush
