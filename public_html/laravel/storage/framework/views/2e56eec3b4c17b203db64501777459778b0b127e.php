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
<p>Password kamu berhasil direset, berikut detailnya :</p>
<p>Username : <?php echo e($email); ?></p>
<p>Password : <?php echo e($password); ?></p>

<div class="footer">
    <p>Email ini adalah layanan yang disediakan oleh <?php echo e($namaweb); ?></p>
    <p>©<?php echo e(date("Y")); ?> <?php echo e($namaweb); ?> - <?php echo e($_SERVER['SERVER_NAME']); ?></p>
</div><?php /**PATH /home/u726706882/domains/apps.sahabatatlm.com/public_html/laravel/resources/views/email/resetpassword.blade.php ENDPATH**/ ?>