<?php
    preg_match('/(\d+)/', $errors?->first('email'), $matches);
    $second = $matches[0] ?? 0;
    $isProduction = app()->isProduction();
?>

<?php $__env->startSection('content'); ?>
    <form id="validasi" class="login-form" action="<?php echo e($form_action); ?>" method="post">
        <div class="form-group">
            <input
                name="username"
                type="text"
                autocomplete="off"
                placeholder="Nama pengguna"
                <?= ($second) ? 'disabled' : ''; ?>
                class="form-username form-control required"
                maxlength="100"
            >
        </div>
        <div class="form-group">
            <input
                id="password"
                name="password"
                type="password"
                autocomplete="off"
                placeholder="Kata sandi"
                <?= ($second) ? 'disabled' : ''; ?>
                class="form-username form-control required"
                maxlength="100"
            >
        </div>



        <div class="form-group">
            <input <?= ($second) ? 'disabled' : ''; ?> type="checkbox" id="checkbox" class="form-checkbox">
            <label for="checkbox" style="font-weight: unset">Tampilkan kata sandi</label>
            <a href="<?php echo e(site_url('siteman/lupa_sandi')); ?>" class="btn" role="button" aria-pressed="true">Lupa kata sandi?</a>
        </div>
        <div class="form-group">
            <button type="submit" class="btn" <?= ($second) ? 'disabled' : ''; ?>>Masuk</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>


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
                    document.getElementById("countdown").innerHTML = `Terlalu banyak upaya masuk. Silakan coba lagi dalam ${minutes} menit ${seconds} detik.`;
                    totalSeconds--;
                }
            }, 1000);
        }

        $(document).ready(function() {
            var pass = $("#password");
            $('#checkbox').click(function() {
                if (pass.attr('type') === "password") {
                    pass.attr('type', 'text');
                } else {
                    pass.attr('type', 'password')
                }
            });
            if ($('#countdown').length) {
                start_countdown();
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.auth.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>