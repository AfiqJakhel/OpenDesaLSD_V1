
<?php
    $esIcon      = $icon        ?? 'fa-folder-open';
    $esTitle     = $title       ?? 'Halaman Ini';
    $esDesc      = $description ?? 'Maaf, menu ini belum ada data yang bisa ditampilkan saat ini. Silakan kunjungi kembali nanti.';
    $esBackUrl   = $back_url    ?? site_url('/');
    $esBackLabel = $back_label  ?? 'Kembali ke Beranda';
?>

<style>
    .es-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 4rem 1.5rem;
    }
    .es-icon-circle {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        position: relative;
    }
    .es-icon-circle::before {
        content: '';
        position: absolute;
        inset: -6px;
        border-radius: 50%;
        border: 2px dashed #c7d2fe;
        animation: es-spin 20s linear infinite;
    }
    @keyframes es-spin {
        from { transform: rotate(0deg); }
        to   { transform: rotate(360deg); }
    }
    .es-icon-circle i {
        font-size: 3rem;
        color: var(--color-primary, #1e3a5f);
        opacity: .6;
    }
    .es-svg-wrap {
        margin: 0 auto 2rem;
        width: 180px;
    }
    .es-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: .75rem;
    }
    .es-desc {
        color: #6b7280;
        max-width: 400px;
        margin: 0 auto 2rem;
        line-height: 1.75;
        font-size: .95rem;
    }
    .es-btn {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        background: var(--color-primary, #1e3a5f);
        color: #fff;
        padding: .75rem 2rem;
        border-radius: 999px;
        font-weight: 700;
        font-size: .9rem;
        text-decoration: none;
        box-shadow: 0 4px 16px rgba(30,58,95,.25);
        transition: all .25s;
    }
    .es-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(30,58,95,.35);
        color: #fff;
        text-decoration: none;
    }
</style>

<div class="es-wrap">
    
    <div class="es-svg-wrap" aria-hidden="true">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="100" cy="100" r="100" fill="#f0f4ff"/>
            
            <rect x="40" y="80" width="120" height="80" rx="10" fill="#dbeafe"/>
            
            <path d="M40 80 Q40 65 55 65 H85 Q95 65 98 75 H160 Q170 75 170 80 Z" fill="#bfdbfe"/>
            
            <rect x="60" y="105" width="80" height="6" rx="3" fill="#93c5fd"/>
            <rect x="60" y="120" width="60" height="6" rx="3" fill="#bfdbfe"/>
            <rect x="60" y="135" width="70" height="6" rx="3" fill="#bfdbfe"/>
            
            <circle cx="155" cy="65" r="20" fill="#fff" stroke="#bfdbfe" stroke-width="2"/>
            <text x="155" y="72" text-anchor="middle" font-size="22" font-weight="700" fill="#6366f1">?</text>
        </svg>
    </div>

    <h2 class="es-title">Halaman <?php echo e($esTitle); ?></h2>
    <p class="es-desc"><?php echo e($esDesc); ?></p>

    <a href="<?php echo e($esBackUrl); ?>" class="es-btn">
        <i class="fas fa-home"></i>
        <?php echo e($esBackLabel); ?>

    </a>
</div>
<?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/empty_state.blade.php ENDPATH**/ ?>