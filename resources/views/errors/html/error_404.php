<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans">
    <?php
    // Load theme header
    $CI =& get_instance();
    $CI->load->helper('theme');
    theme_active();
    
    // Get desa data
    $desa = identitas();
    
    // Include header
    echo view('theme::commons.header');
    ?>
    
    <main class="w-full bg-[#F7F8FA] flex flex-col items-center justify-center relative overflow-hidden" style="min-height: calc(100vh - 200px);">
        <!-- Elemen Dekoratif Geometris -->
        <div class="absolute top-[-100px] right-[-100px] w-[400px] h-[400px] rounded-full border-[1.5px] border-[#1D9E75] opacity-10 pointer-events-none"></div>
        <div class="absolute bottom-[-50px] left-[-80px] w-[200px] h-[200px] rounded-full bg-[#1D9E75] opacity-5 pointer-events-none"></div>
        <div class="absolute top-[20%] left-[15%] w-[80px] h-[80px] rounded-full bg-[#0D2247] opacity-[0.04] pointer-events-none"></div>

        <div class="relative flex flex-col items-center justify-center gap-5 z-10 w-full px-4 text-center">
            <!-- Teknik Layering 404 -->
            <div class="relative flex items-center justify-center pt-8">
                <span class="font-extrabold text-[#1D9E75]/15 select-none tracking-[-6px]" style="font-size: clamp(120px, 20vw, 200px); line-height: 1;">404</span>
                <span class="absolute font-extrabold text-[#0D2247] select-none tracking-[-2px] inset-0 flex items-center justify-center" style="font-size: clamp(48px, 8vw, 80px);">404</span>
            </div>

            <div class="flex flex-col items-center gap-5 mt-[-20px]">
                <!-- Eyebrow Line -->
                <div class="w-[60px] h-[1px] bg-[#1D9E75]"></div>
                
                <h2 class="text-[#0D2247] font-bold" style="font-size: 28px;">Halaman Tidak Ditemukan</h2>
                <p class="text-[#4A5568] mx-auto text-center leading-relaxed" style="font-size: 16px; max-width: 420px;">
                    Maaf, halaman yang Anda cari tidak tersedia, telah dipindahkan, atau Anda salah memasukkan URL.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center gap-[12px] mt-2">
                    <a href="<?php echo site_url(); ?>" class="w-full sm:w-auto bg-[#0D2247] text-white font-bold rounded-lg flex items-center justify-center transition-all duration-200" style="padding: 14px 32px;" onmouseover="this.style.backgroundColor='#1a3a6e'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(13,34,71,0.25)'" onmouseout="this.style.backgroundColor='#0D2247'; this.style.transform='none'; this.style.boxShadow='none'">
                        Kembali ke Beranda
                    </a>
                    <a href="mailto:<?php echo $desa['email_desa'] ?? 'kontak@desa.id'; ?>" class="w-full sm:w-auto border-[1.5px] border-[#0D2247] bg-transparent text-[#0D2247] hover:bg-[#0D2247] hover:text-white font-bold rounded-lg flex items-center justify-center transition duration-200" style="padding: 14px 32px;">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </main>
    
    <?php
    // Include footer
    echo view('theme::commons.footer');
    ?>
</body>
</html>
