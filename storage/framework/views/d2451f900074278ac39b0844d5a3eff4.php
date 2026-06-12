<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?php echo e(setting('login_title') . ' ' . ucwords(setting('sebutan_desa')) . ($desa['nama_desa'] ? ' ' . $desa['nama_desa'] : '') . get_dynamic_title_page_from_path()); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo e(favico_desa()); ?>" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0D2247',
                        accent: '#1D9E75',
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- jQuery -->
    <script src="<?php echo e(asset('bootstrap/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/validasi.js')); ?>"></script>
    <script src="<?php echo e(asset('js/localization/messages_id.js')); ?>"></script>
    
    <?php if($cek_anjungan): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/keyboard.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('front/css/mandiri-keyboard.css')); ?>">
    <?php endif; ?>
    
    <?php echo $__env->make('admin.layouts.components.token', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <style>
        * {
            font-family: 'Plus Jakarta Sans', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        body {
            background: #F8FAFC;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Decorative Background Elements */
        .bg-pattern {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            overflow: hidden;
        }
        
        .bg-pattern::before {
            content: '';
            position: absolute;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(200, 151, 58, 0.06) 0%, transparent 70%);
            top: -200px;
            right: -200px;
            border-radius: 50%;
        }
        
        .bg-pattern::after {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(26, 58, 42, 0.05) 0%, transparent 70%);
            bottom: -150px;
            left: -150px;
            border-radius: 50%;
        }
        
        /* Lingkaran dekoratif dihapus — tidak digunakan */
        .deco-circle { display: none; }
        .deco-1, .deco-2, .deco-3 { display: none; }
        
        /* Card Styles */
        .login-card {
            background: transparent;
        }
        
        /* Brand Card — Warna tema asli (Biru #0D2247) */
        .brand-card {
            background: linear-gradient(145deg, #0D2247 0%, #173770 100%);
            position: relative;
            overflow: hidden;
            border-radius: 1.5rem 0 0 1.5rem;
        }
        
        .brand-card::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(200, 151, 58, 0.15) 0%, transparent 70%);
            top: -80px;
            right: -80px;
            border-radius: 50%;
        }

        .brand-card::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
            bottom: -60px;
            left: -60px;
            border-radius: 50%;
        }
        
        /* Input Styles */
        .input-field {
            transition: all 0.2s ease;
        }
        
        .input-field:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(29, 158, 117, 0.15);
        }
        
        /* Button Ripple Effect */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        
        .btn-ripple::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.5s, height 0.5s;
        }
        
        .btn-ripple:active::after {
            width: 300px;
            height: 300px;
        }
        
        /* Feature Badge — lebih breathable, lebih tipis */
        .feature-badge {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(200, 151, 58, 0.2);
            transition: all 0.3s ease;
            padding: 10px 14px !important;
            margin-bottom: 2px;
        }
        
        .feature-badge:hover {
            background: rgba(200, 151, 58, 0.12);
            border-color: rgba(200, 151, 58, 0.4);
            transform: translateX(4px);
        }

        /* Override accent color untuk panel kiri */
        .brand-card .text-accent { color: #c8973a !important; }
        .brand-card .bg-accent\/20 { background: rgba(200, 151, 58, 0.2) !important; }
        .brand-card .border-accent\/30 { border-color: rgba(200, 151, 58, 0.3) !important; }
        .brand-card .bg-accent\/20 i { color: #c8973a !important; }
        .brand-card .pulse-dot { background: #c8973a !important; }

        /* Tombol MASUK — warna emas, teks gelap */
        button[type="submit"],
        input[type="submit"],
        .btn-submit-login {
            background: linear-gradient(135deg, #c8973a 0%, #d4a347 100%) !important;
            color: #1a1a1a !important;
            border: none !important;
        }
        button[type="submit"]:hover,
        input[type="submit"]:hover,
        .btn-submit-login:hover {
            background: linear-gradient(135deg, #b8872a 0%, #c4933a 100%) !important;
            box-shadow: 0 8px 24px rgba(200, 151, 58, 0.35) !important;
        }

        /* Judul tipografi panel kanan */
        .login-heading-label {
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #c8973a;
            border-bottom: 1.5px solid #e5e7eb;
            padding-bottom: 12px;
            margin-bottom: 8px;
            display: block;
        }

        /* Login card — padding lebih lapang */
        .login-card {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }

        /* Footer nagari kecil */
        .nagari-footer {
            font-size: 11px;
            color: #9ca3af;
            text-align: center;
            margin-top: 1.5rem;
            line-height: 1.6;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
        /* Pulse Animation */
        .pulse-dot {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Smooth Transitions */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 lg:p-8">
    <!-- Background Pattern -->
    <div class="bg-pattern">
        <div class="deco-circle deco-1"></div>
        <div class="deco-circle deco-2"></div>
        <div class="deco-circle deco-3"></div>
    </div>
    
    <!-- Main Container - Minimalis -->
    <div class="relative z-10 w-full max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 bg-white rounded-3xl shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] overflow-hidden">
            
            <!-- Left Side - Branding -->
            <div class="hidden md:flex flex-col justify-center p-10 brand-card relative">
                    <!-- Logo & Title -->
                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 mb-8">
                            <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/20">
                                <img src="<?php echo e(gambar_desa($desa['logo'])); ?>" alt="Logo" class="w-8 h-8 object-contain brightness-0 invert">
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Layanan Mandiri</div>
                                <div class="text-accent text-xs font-medium">Digital Service</div>
                            </div>
                        </div>
                        
                        <h1 class="text-white leading-tight mb-4 text-center mt-6">
                            <span style="font-size: 1rem; font-weight: 400; opacity: 0.8; display: block; margin-bottom: 4px;">Selamat Datang di</span>
                            <span class="text-accent" style="font-size: 1.5rem; font-weight: 800; display: block; line-height: 1.2;"><?php echo e(ucwords(setting('sebutan_desa'))); ?> <?php echo e($desa['nama_desa']); ?></span>
                        </h1>
                        
                        <p class="text-white/70 text-sm leading-relaxed mb-8 text-center px-4">
                            Sistem Administrasi dan Pelayanan Digital Terpadu
                        </p>
                    </div>
                </div>
                    

            
            <!-- Right Side - Login Form -->
            <div>
                <div class="login-card p-10 md:p-12 h-full flex flex-col justify-center">
                    <!-- Mobile Header -->
                    <div class="md:hidden text-center mb-6">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-primary to-primary/90 rounded-2xl shadow-lg mb-4">
                            <img src="<?php echo e(gambar_desa($desa['logo'])); ?>" alt="Logo" class="w-10 h-10 object-contain brightness-0 invert">
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Layanan Mandiri</h2>
                        <p class="text-sm text-gray-600 mt-1"><?php echo e(ucwords(setting('sebutan_desa'))); ?> <?php echo e($desa['nama_desa']); ?></p>
                    </div>
                    
                    <!-- Desktop Header -->
                    <div class="hidden md:block mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">Layanan Mandiri</h2>
                        <p class="text-gray-500 text-xs tracking-wide">Masukkan NIK dan PIN untuk masuk</p>
                    </div>
                
                <?php
                    preg_match('/(\d+)/', $errors->first('email'), $matches);
                    $second = $matches[0] ?? 0;
                ?>

                <?php if($errors->any()): ?>
                    <div <?php if(!str_contains($errors->first('email'), 'Terlalu banyak upaya masuk.')): ?> id="notif" <?php endif; ?> class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-800 px-4 py-3 rounded-lg">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(str_contains($item, 'Terlalu banyak upaya masuk.')): ?>
                                <p id="countdown" class="flex items-start gap-2 text-sm">
                                    <i class="fas fa-exclamation-triangle mt-0.5"></i>
                                    <span><?php echo e($item); ?></span>
                                </p>
                            <?php else: ?>
                                <p class="flex items-start gap-2 text-sm">
                                    <i class="fas fa-exclamation-triangle mt-0.5"></i>
                                    <span><?php echo e($item); ?></span>
                                </p>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <?php if($notif = $ci->session->flashdata('notif')): ?>
                    <div id="notif" class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-800 px-4 py-3 rounded-lg">
                        <p class="flex items-start gap-2 text-sm">
                            <i class="fas fa-exclamation-triangle mt-0.5"></i>
                            <span><?php echo e($notif); ?></span>
                        </p>
                    </div>
                <?php endif; ?>
                
                <?php echo $__env->yieldContent('content'); ?>
                
                <!-- Footer -->
                <div class="mt-8 pt-6 border-t border-gray-100 text-center space-y-3">
                    <p class="text-xs text-gray-500">
                        <i class="fas fa-info-circle mr-1"></i>
                        Hubungi operator desa untuk mendapatkan PIN
                    </p>
                    <a href="" target="_blank" class="inline-flex items-center gap-2 text-xs text-gray-400 hover:text-primary transition">
                        <i class="fas fa-code"></i>
                        <span>OpenSID v<?php echo e(AmbilVersi()); ?></span>
                    </a>
                    <!-- Footer Nagari -->
                    <div class="nagari-footer">
                        Nagari Koto Tangah Batu Ampa &middot; Kec. Akabiluru &middot; Kab. Lima Puluh Kota
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php if($cek_anjungan): ?>
        <script src="<?php echo e(asset('js/jquery.keyboard.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.mousewheel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.keyboard.extension-all.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/mandiri-keyboard.js')); ?>"></script>
    <?php endif; ?>
    
    <script src="<?php echo e(asset('js/id_browser.js')); ?>"></script>
    <script>
        function start_countdown() {
            let totalSeconds = <?php echo e($second); ?>;
            const timer = setInterval(function() {
                const minutes = Math.floor(totalSeconds / 60);
                const seconds = totalSeconds % 60;

                if (totalSeconds <= 0) {
                    clearInterval(timer);
                    location.reload();
                } else {
                    const countdownEl = document.getElementById("countdown");
                    if (countdownEl) {
                        countdownEl.innerHTML = `<i class="fas fa-exclamation-triangle mt-0.5"></i> <span>Terlalu banyak upaya masuk. Silakan coba lagi dalam ${minutes} menit ${seconds} detik.</span>`;
                    }
                    totalSeconds--;
                }
            }, 1000);
        }

        $(document).ready(function() {
            if ($('#pin').length) {
                $('#pin').focus();
            } else if ($('#tag').length) {
                $('#tag').focus();
            } else if ($('#nik').length) {
                $('#nik').focus();
            }

            if ($('#countdown').length) {
                start_countdown();
            }

            window.setTimeout(function() {
                $("#notif").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 5000);
        });
    </script>
    
    <?php echo $__env->yieldPushContent('script'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/layanan_mandiri/auth/index.blade.php ENDPATH**/ ?>