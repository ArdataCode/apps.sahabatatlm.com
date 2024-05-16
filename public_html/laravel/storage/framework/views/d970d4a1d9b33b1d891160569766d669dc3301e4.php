<style>
    .tombol{
        background: #028618;
        padding: 5px 15px;
        text-decoration: none;
        color: white;
        border-radius: 4px;
    }
    .footer{
        text-align:center;padding:25px;background:lightgray;
    }
</style>
<h3>Hi, <?php echo e($nama); ?> !</h3>
<p>Kamu telah mendaftar pada <?php echo e($namaweb); ?>. Semua informasi terbaru <?php echo e($namaweb); ?> akan dikirimkan melalui email ini.</p>
<br>
<p>Terima Kasih</p>
<p><?php echo e($namaweb); ?></p>

<div class="footer">
    <p>Email ini adalah layanan yang disediakan oleh <?php echo e($namaweb); ?></p>
    <p>©<?php echo e(date("Y")); ?> <?php echo e($namaweb); ?> - <?php echo e($_SERVER['SERVER_NAME']); ?></p>
</div><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/email/registerawal.blade.php ENDPATH**/ ?>