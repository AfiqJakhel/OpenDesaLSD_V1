<?php if(cek_koneksi_internet()): ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.compat.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
    <link rel="stylesheet" href="https://unpkg.com/datatables@1.10.18/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.1.0/leaflet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.11.1/mapbox-gl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#0D2247',
                            100: '#0a1a36',
                            200: '#061124',
                        },
                        accent: {
                            DEFAULT: '#1D9E75',
                            100: '#167d5c',
                        },
                        gray: {
                            50: '#F7F8FA',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(theme_asset('css/style.min.css')); ?>&<?php echo e($themeVersion); ?>">
<link rel="stylesheet" href="<?php echo e(theme_asset('css/custom.css')); ?>&<?php echo e($themeVersion); ?>">
<style>
    body { font-family: 'Inter', sans-serif; }
    .glass-effect { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
    [x-cloak] { display: none !important; }
    /* Plyr custom styling */
    .plyr { height: 100%; border-radius: 0; }
    .plyr video { object-fit: cover; }
    .plyr--video { height: 100%; }
</style>
<?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/commons/source_css.blade.php ENDPATH**/ ?>