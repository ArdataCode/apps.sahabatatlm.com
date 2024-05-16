<?php $__empty_1 = true; $__currentLoopData = $subkategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="col-md-6 grid-margin stretch-card">
    <a href="<?php echo e(url('belipaket')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>" class="hrefpaket">
    <div class="card card-border" style="height: 100%;">
        <div class="card-body">
        <div class="row">
            <div class="col-6">
            <i class="p-2 ti-layers-alt iconpaket"></i>
            </div>
            <div class="col-6 text-right">
            <i class="ti-arrow-top-right"></i>
            </div>
        </div>
        <div class="mt-4">
            <h4><b><?php echo e($key->judul); ?></b></h4>
            <h6><?php echo e($key->ket); ?></h6>
        </div>
        </div>
    </div>
    </a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<center><img class="mb-3 img-no" src="<?php echo e(asset('image/global/no-paket.png')); ?>" alt=""></center>
<br>
<center>Data "<?php echo e($datacari); ?>" tidak ditemukan</center>
<?php endif; ?><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/include/belipaketsubktg.blade.php ENDPATH**/ ?>