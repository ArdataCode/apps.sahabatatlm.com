

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card card-border">
        <div class="card-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('belipaketktg')); ?>">Beli Paket</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('belipaketsubktg')); ?>/<?php echo e(Crypt::encrypt($subkategori->fk_paket_kategori)); ?>"><?php echo e($subkategori->kategori_r->judul); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e($subkategori->judul); ?></li>
            </ol>
          </nav>
          <p class="card-description">
            <h3 class="font-weight-bold"><b>Pilih Paket</b></h3>
          </p>
          <div class="row mt-4">
            <?php $__empty_1 = true; $__currentLoopData = $paket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4 grid-margin stretch-card">
              <a href="<?php echo e(url('paketdetail')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>" class="hrefpaket">
                <div class="card card-border">
                  <img src="<?php echo e(url($key->banner)); ?>" alt="" style="width:100%;height:300px;object-fit:cover;border-top-left-radius: 20px;border-top-right-radius: 20px;">
                  <div class="card-body">
                    <h3><b><?php echo e($key->judul); ?></b></h3>
                    <h6><?php echo e(count($key->paket_dtl_r)); ?> Paket</h6>
                    <div class="row" style="align-items:center">
                      <div class="col-8">
                       <!-- <button class="btn btn-sm btn-primary">Diskon 15%</button><span class="coret"><?php echo e(formatCoret($key->harga)); ?></span> -->
                      </div>
                      <div class="col-4">
                        <?php echo e(formatRupiah($key->harga)); ?>

                      </div>
                    </div>
                    <button class="mt-3 btn btn-md btn-primary btn-block">Lihat Paket</button>
                  </div>
                </div>
              </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <center><img class="mb-3 img-no" src="<?php echo e(asset('image/global/no-paket.png')); ?>" alt=""></center>
            <br>
            <center>Belum Ada Data</center>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
  $(document).ready(function(){
    
  });
</script>
<!-- Loading Overlay -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/sahabatatlm.com/public_html/laravel/resources/views/user/belipaket.blade.php ENDPATH**/ ?>