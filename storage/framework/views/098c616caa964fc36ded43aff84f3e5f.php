<nav class="bg-[#0D2247] text-white sticky top-0 w-full z-[9999] transition-all duration-300" x-data="{ mobileOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50)" :class="scrolled ? 'shadow-[0_2px_12px_rgba(0,0,0,0.08)]' : ''">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex justify-between items-center h-24">
            <!-- Bagian Kiri: Identitas & Logo -->
            <a href="<?php echo e(site_url('/')); ?>" class="flex items-center gap-4 group">
                <div class="bg-white p-1.5 rounded-xl shadow-lg transition-transform group-hover:scale-105">
                    <img src="<?php echo e(gambar_desa($desa['logo'])); ?>" alt="Logo" class="h-12 w-auto">
                </div>
                <div class="leading-tight">
                    <h1 class="text-white font-bold text-lg uppercase tracking-tight">Koto Tangah Batu Ampa</h1>
                    <p class="text-white/80 font-medium text-xs tracking-wide">Sumatera Barat</p>
                </div>
            </a>

            <!-- Bagian Tengah: Tautan Navigasi (Center) -->
            <div class="hidden lg:flex items-center justify-center space-x-6 flex-grow">
                <a href="<?php echo e(site_url('/')); ?>" class="text-white font-bold text-sm tracking-widest relative pb-2 border-b-4 border-white transition">Beranda</a>
                
                <!-- Dropdown: Profil Desa -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 text-white/90 hover:text-white font-medium text-sm tracking-widest transition py-2">
                        Profil Desa
                        <i class="fas fa-chevron-down text-[10px] text-white/70 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                        class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden z-50" x-cloak>
                        <a href="<?php echo e(site_url('profil_desa')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-scroll w-5 mr-2 text-center"></i> Sejarah & Visi Misi
                        </a>
                        <a href="<?php echo e(site_url('peta')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-map-marked-alt w-5 mr-2 text-center"></i> Peta Wilayah
                        </a>
                    </div>
                </div>

                <!-- Dropdown: Pemerintahan -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 text-white/90 hover:text-white font-medium text-sm tracking-widest transition py-2">
                        Pemerintahan
                        <i class="fas fa-chevron-down text-[10px] text-white/70 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                        class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden z-50" x-cloak>
                        <a href="<?php echo e(site_url('pemerintah')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-sitemap w-5 mr-2 text-center"></i> Struktur Organisasi
                        </a>
                        <a href="<?php echo e(site_url('lembaga')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-university w-5 mr-2 text-center"></i> Lembaga Desa
                        </a>
                        <a href="<?php echo e(site_url('pembangunan')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-hard-hat w-5 mr-2 text-center"></i> Pembangunan
                        </a>
                    </div>
                </div>

                <!-- Dropdown: Data Desa -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 text-white/90 hover:text-white font-medium text-sm tracking-widest transition py-2">
                        Data Desa
                        <i class="fas fa-chevron-down text-[10px] text-white/70 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                        class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden z-50" x-cloak>
                        <a href="<?php echo e(site_url('data-statistik')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-chart-bar w-5 mr-2 text-center"></i> Statistik Penduduk
                        </a>
                        <a href="<?php echo e(site_url('data-kesehatan')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-heartbeat w-5 mr-2 text-center"></i> Data Kesehatan
                        </a>
                        <a href="<?php echo e(site_url('status-idm')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-chart-line w-5 mr-2 text-center"></i> IDM
                        </a>
                        <a href="<?php echo e(site_url('inventaris')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-warehouse w-5 mr-2 text-center"></i> Inventaris
                        </a>
                    </div>
                </div>

                <!-- Dropdown: Produk Hukum -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 text-white/90 hover:text-white font-medium text-sm tracking-widest transition py-2">
                        Produk Hukum
                        <i class="fas fa-chevron-down text-[10px] text-white/70 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                        class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden z-50" x-cloak>
                        <a href="<?php echo e(site_url('peraturan-desa')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-gavel w-5 mr-2 text-center"></i> Peraturan Desa
                        </a>
                        <a href="<?php echo e(site_url('informasi-publik')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-file-signature w-5 mr-2 text-center"></i> SK Kepala Desa
                        </a>
                    </div>
                </div>

                <!-- Dropdown: Informasi -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 text-white/90 hover:text-white font-medium text-sm tracking-widest transition py-2">
                        Informasi
                        <i class="fas fa-chevron-down text-[10px] text-white/70 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                        class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden z-50" x-cloak>
                        <a href="<?php echo e(site_url('berita')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-newspaper w-5 mr-2 text-center"></i> Berita
                        </a>
                        <a href="<?php echo e(site_url('agenda')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-calendar-alt w-5 mr-2 text-center"></i> Agenda
                        </a>
                        <a href="<?php echo e(site_url('pengaduan')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-bullhorn w-5 mr-2 text-center"></i> Pengaduan
                        </a>
                        <a href="<?php echo e(site_url('galeri')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-images w-5 mr-2 text-center"></i> Galeri
                        </a>
                        <a href="<?php echo e(site_url('lapak')); ?>" class="block px-5 py-3 text-gray-700 hover:bg-primary hover:text-white transition text-sm font-medium">
                            <i class="fas fa-store w-5 mr-2 text-center"></i> Lapak Desa
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan: Ikon Aksesibilitas -->
            <div class="flex items-center gap-6">
                <a href="<?php echo e(site_url('layanan-mandiri')); ?>" class="text-white/90 hover:text-white transition text-lg" aria-label="Layanan Mandiri">
                    <i class="fas fa-user-circle"></i>
                </a>
                
                <!-- Mobile Menu Button -->
                <button class="lg:hidden text-white p-2" @click="mobileOpen = !mobileOpen">
                    <i class="text-2xl" :class="mobileOpen ? 'fas fa-times' : 'fas fa-bars-staggered'"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Drawer -->
    <div class="lg:hidden" x-show="mobileOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4" x-cloak>
        <div class="bg-primary-100 border-t border-white/10 pb-4">
            <a href="<?php echo e(site_url('/')); ?>" class="block px-6 py-3 text-white font-bold text-sm hover:bg-white/10 transition">
                <i class="fas fa-home w-6 mr-2"></i> Beranda
            </a>

            <!-- Mobile: Profil Desa -->
            <div x-data="{ sub: false }">
                <button @click="sub = !sub" class="w-full text-left px-6 py-3 text-white/90 font-medium text-sm hover:bg-white/10 transition flex items-center justify-between">
                    <span><i class="fas fa-scroll w-6 mr-2"></i> Profil Desa</span>
                    <i class="fas fa-chevron-down text-[10px] transition-transform" :class="{ 'rotate-180': sub }"></i>
                </button>
                <div x-show="sub" x-transition class="bg-primary-200">
                    <a href="<?php echo e(site_url('profil_desa')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Sejarah & Visi Misi</a>
                    <a href="<?php echo e(site_url('peta')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Peta Wilayah</a>
                </div>
            </div>

            <!-- Mobile: Pemerintahan -->
            <div x-data="{ sub: false }">
                <button @click="sub = !sub" class="w-full text-left px-6 py-3 text-white/90 font-medium text-sm hover:bg-white/10 transition flex items-center justify-between">
                    <span><i class="fas fa-sitemap w-6 mr-2"></i> Pemerintahan</span>
                    <i class="fas fa-chevron-down text-[10px] transition-transform" :class="{ 'rotate-180': sub }"></i>
                </button>
                <div x-show="sub" x-transition class="bg-primary-200">
                    <a href="<?php echo e(site_url('pemerintah')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Struktur Organisasi</a>
                    <a href="<?php echo e(site_url('lembaga')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Lembaga Desa</a>
                    <a href="<?php echo e(site_url('pembangunan')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Pembangunan</a>
                </div>
            </div>

            <!-- Mobile: Data Desa -->
            <div x-data="{ sub: false }">
                <button @click="sub = !sub" class="w-full text-left px-6 py-3 text-white/90 font-medium text-sm hover:bg-white/10 transition flex items-center justify-between">
                    <span><i class="fas fa-chart-bar w-6 mr-2"></i> Data Desa</span>
                    <i class="fas fa-chevron-down text-[10px] transition-transform" :class="{ 'rotate-180': sub }"></i>
                </button>
                <div x-show="sub" x-transition class="bg-primary-200">
                    <a href="<?php echo e(site_url('data-statistik/pendidikan-dalam-kk')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Statistik Penduduk</a>
                    <a href="<?php echo e(site_url('data-kesehatan')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Data Kesehatan</a>
                    <a href="<?php echo e(site_url('status-idm')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">IDM</a>
                    <a href="<?php echo e(site_url('inventaris')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Inventaris</a>
                </div>
            </div>

            <!-- Mobile: Produk Hukum -->
            <div x-data="{ sub: false }">
                <button @click="sub = !sub" class="w-full text-left px-6 py-3 text-white/90 font-medium text-sm hover:bg-white/10 transition flex items-center justify-between">
                    <span><i class="fas fa-gavel w-6 mr-2"></i> Produk Hukum</span>
                    <i class="fas fa-chevron-down text-[10px] transition-transform" :class="{ 'rotate-180': sub }"></i>
                </button>
                <div x-show="sub" x-transition class="bg-primary-200">
                    <a href="<?php echo e(site_url('peraturan-desa')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Peraturan Desa</a>
                    <a href="<?php echo e(site_url('informasi-publik')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">SK Kepala Desa</a>
                </div>
            </div>

            <!-- Mobile: Informasi -->
            <div x-data="{ sub: false }">
                <button @click="sub = !sub" class="w-full text-left px-6 py-3 text-white/90 font-medium text-sm hover:bg-white/10 transition flex items-center justify-between">
                    <span><i class="fas fa-info-circle w-6 mr-2"></i> Informasi</span>
                    <i class="fas fa-chevron-down text-[10px] transition-transform" :class="{ 'rotate-180': sub }"></i>
                </button>
                <div x-show="sub" x-transition class="bg-primary-200">
                    <a href="<?php echo e(site_url('berita')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Berita</a>
                    <a href="<?php echo e(site_url('agenda')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Agenda</a>
                    <a href="<?php echo e(site_url('pengaduan')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Pengaduan</a>
                    <a href="<?php echo e(site_url('galeri')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Galeri</a>
                    <a href="<?php echo e(site_url('lapak')); ?>" class="block px-10 py-2.5 text-white/80 text-sm hover:bg-white/10 transition">Lapak Desa</a>
                </div>
            </div>

            <!-- Mobile: Layanan Mandiri -->
            <a href="<?php echo e(site_url('layanan-mandiri')); ?>" class="block px-6 py-3 text-white font-medium text-sm hover:bg-white/10 transition mt-2 border-t border-white/10">
                <i class="fas fa-user-shield w-6 mr-2"></i> Layanan Mandiri
            </a>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/commons/header.blade.php ENDPATH**/ ?>