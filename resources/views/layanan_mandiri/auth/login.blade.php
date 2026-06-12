@extends('layanan_mandiri.auth.index')

@section('content')
    <form id="validasi" autocomplete="off" action="{{ $form_action }}" method="post" class="space-y-5">
        <!-- NIK Input -->
        <div>
            <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-id-card text-gray-400"></i>
                </div>
                <input 
                    type="text" 
                    id="nik"
                    autocomplete="off" 
                    class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-accent focus:border-accent transition outline-none text-gray-800 angka required {!! jecho($cek_anjungan['keyboard'] == 1, true, 'kbvnumber') !!}" 
                    name="nik" 
                    maxlength="16" 
                    placeholder="Masukkan 16 digit NIK"
                >
            </div>
        </div>

        <!-- PIN Input -->
        <div>
            <label for="pin" class="block text-sm font-semibold text-gray-700 mb-2">PIN</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
                <input
                    type="password"
                    id="pin"
                    autocomplete="off"
                    class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-accent focus:border-accent transition outline-none text-gray-800 angka required {!! jecho($cek_anjungan['keyboard'] == 1, true, 'kbvnumber') !!}"
                    name="password"
                    placeholder="Masukkan 6 digit PIN"
                    maxlength="6"
                >
            </div>
        </div>

        <!-- Show PIN Checkbox -->
        <div class="flex items-center gap-2">
            <input 
                type="checkbox" 
                id="checkbox" 
                class="w-4 h-4 text-accent bg-gray-100 border-gray-300 rounded focus:ring-accent focus:ring-2 cursor-pointer"
            >
            <label for="checkbox" class="text-sm text-gray-600 cursor-pointer select-none">Tampilkan PIN</label>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 active:scale-[0.98] flex items-center justify-center gap-2"
        >
            <i class="fas fa-sign-in-alt"></i>
            <span>MASUK</span>
        </button>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-xs">
                <span class="px-3 bg-white text-gray-500 uppercase tracking-wider">Atau</span>
            </div>
        </div>

        <!-- Alternative Login Methods -->
        <div class="space-y-3">
            <!-- E-KTP Login -->
            <a href="{{ site_url('layanan-mandiri/masuk-ektp') }}">
                <button 
                    type="button" 
                    class="w-full bg-white hover:bg-gray-50 text-primary font-semibold py-3.5 rounded-xl border-2 border-primary transition-all duration-300 flex items-center justify-center gap-2"
                >
                    <i class="fas fa-id-card-alt"></i>
                    <span>MASUK DENGAN E-KTP</span>
                </button>
            </a>

            @if (setting('tampilkan_pendaftaran'))
                <!-- Register -->
                <a href="{{ site_url('layanan-mandiri/daftar') }}">
                    <button 
                        type="button" 
                        class="w-full bg-accent hover:bg-accent/90 text-white font-semibold py-3.5 rounded-xl transition-all duration-300 flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-user-plus"></i>
                        <span>DAFTAR AKUN BARU</span>
                    </button>
                </a>
            @endif

            <!-- Forgot PIN -->
            <a href="{{ site_url('layanan-mandiri/lupa-pin') }}">
                <button 
                    type="button" 
                    class="w-full bg-white hover:bg-gray-50 text-gray-700 font-medium py-3.5 rounded-xl border border-gray-300 transition-all duration-300 flex items-center justify-center gap-2"
                >
                    <i class="fas fa-question-circle"></i>
                    <span>LUPA PIN</span>
                </button>
            </a>

            @if ($cek_anjungan['tipe'] == 1)
                <!-- Anjungan -->
                <a href="{{ route('anjungan.index') }}">
                    <button 
                        type="button" 
                        class="w-full bg-white hover:bg-gray-50 text-gray-700 font-medium py-3.5 rounded-xl border border-gray-300 transition-all duration-300 flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-desktop"></i>
                        <span>ANJUNGAN</span>
                    </button>
                </a>
            @endif
        </div>

        <!-- Back to Home -->
        <div class="pt-4 text-center">
            <a href="{{ site_url('/') }}" class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-primary transition">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </form>
@endsection

@push('script')
    <script type="text/javascript">
        $('document').ready(function() {
            var pass = $("#pin");
            $('#checkbox').click(function() {
                if (pass.attr('type') === "password") {
                    pass.attr('type', 'text');
                } else {
                    pass.attr('type', 'password')
                }
            });
        });
    </script>
@endpush
