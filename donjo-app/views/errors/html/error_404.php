<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>
<?php 
$previous = 'javascript:history.go(-1)';
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
$CI = &get_instance();
if (! isset($CI)) {
    $CI = new CI_Controller();
}
$desa = isset($desa) ? $desa : ['email_desa' => 'kontak@desa.id'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0D2247',
                        accent: '#1D9E75'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#F7F8FA] w-full min-h-screen flex flex-col items-center justify-center relative overflow-hidden font-sans">
    
    <!-- Top Bar Mock Navbar for Consistency -->
    <nav class="absolute top-0 w-full h-20 bg-[#0D2247] shadow-lg z-50 flex items-center px-8">
        <div class="text-white font-bold text-lg flex items-center gap-2">
            <i class="fas fa-landmark text-[#1D9E75]"></i> OpenSID
        </div>
    </nav>

    <!-- Elemen Dekoratif Geometris -->
    <div class="absolute top-[-100px] right-[-100px] w-[400px] h-[400px] rounded-full border-[1.5px] border-[#1D9E75] opacity-10 pointer-events-none"></div>
    <div class="absolute bottom-[-50px] left-[-80px] w-[200px] h-[200px] rounded-full bg-[#1D9E75] opacity-5 pointer-events-none"></div>
    <div class="absolute top-[20%] left-[15%] w-[80px] h-[80px] rounded-full bg-[#0D2247] opacity-[0.04] pointer-events-none"></div>

    <main class="relative flex flex-col items-center justify-center gap-5 z-10 w-full px-4 text-center mt-10">
        <!-- Teknik Layering 404 -->
        <div class="relative flex items-center justify-center pt-8">
            <span class="font-extrabold text-[#1D9E75]/15 select-none tracking-[-6px]" style="font-size: clamp(120px, 20vw, 200px); line-height: 1;">404</span>
            <span class="absolute font-extrabold text-[#0D2247] select-none tracking-[-2px] inset-0 flex items-center justify-center" style="font-size: clamp(48px, 8vw, 80px);">404</span>
        </div>

        <div class="flex flex-col items-center gap-5 mt-[-20px]">
            <!-- Eyebrow Line -->
            <div class="w-[60px] h-[1px] bg-[#1D9E75]"></div>
            
            <h2 class="text-[#0D2247] font-bold text-3xl md:text-4xl">Halaman Tidak Ditemukan</h2>
            <p class="text-[#4A5568] mx-auto text-center leading-relaxed text-base md:text-lg max-w-md">
                Maaf, halaman sistem yang Anda tuju tidak ditemukan atau URL salah. Silakan kembali ke beranda.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center gap-[12px] mt-2">
                <a href="<?= rtrim(site_url(), '/') ?>" class="w-full sm:w-auto bg-[#0D2247] text-white font-bold rounded-lg flex items-center justify-center transition-all duration-200 hover:bg-[#1a3a6e] hover:-translate-y-[2px] shadow-lg hover:shadow-xl" style="padding: 14px 32px;">
                    <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                </a>
                <a href="<?= $previous ?>" class="w-full sm:w-auto border-[1.5px] border-[#0D2247] bg-transparent text-[#0D2247] hover:bg-[#0D2247] hover:text-white font-bold rounded-lg flex items-center justify-center transition duration-200" style="padding: 14px 32px;">
                    <i class="fas fa-undo mr-2"></i> Halaman Sebelumnya
                </a>
            </div>
        </div>
    </main>
</body>
</html>
