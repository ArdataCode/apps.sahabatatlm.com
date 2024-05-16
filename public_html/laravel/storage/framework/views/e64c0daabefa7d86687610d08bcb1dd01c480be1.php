

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
              <li class="breadcrumb-item active" aria-current="page"><?php echo e($kategori->judul); ?></li>
            </ol>
          </nav>
          <div class="row" style="align-items:center">
            <div class="col-md-9 col-lg-9">
              <p class="card-description">
                <h3 class="font-weight-bold"><b>Pilih <?php echo e($kategori->judul); ?></b></h3>
              </p>
            </div>
            <div class="col-md-3 col-lg-3">
              <div class="mb-3 mt-3">
                <input type="text" class="form-control" id="cari" placeholder="Cari" name="cari">
              </div>
            </div>
          </div>
          <div id="dataarea" class="row mt-4">
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
    $("#cari").on('input paste', function () {
      datacari = $(this).val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          type: "POST",
          dataType: "JSON",
          url: "<?php echo e(url('caripaketsubktg')); ?>",
          // async: false,
          data: {
            datacari : datacari,
            kategoriid : "<?php echo e($kategori->id); ?>"
          },
          beforeSend: function () {
              // $.LoadingOverlay("show", {
              //     image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
              // });
              $("#dataarea").LoadingOverlay("show", {
                  image : "<?php echo e(asset('/image/global/loading.gif')); ?>"
              });
          },
          success: function(response)
          {
            if (response.status) {
                $("#dataarea").html(response.data);
            }else{
                Swal.fire({
                    html: response.message,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            }
          },
          error: function (xhr, status) {
                alert('Error!!!');
            },
            complete: function () {
                $("#dataarea").LoadingOverlay("hide");
            }
        });
    });
  });
</script>
<!-- Loading Overlay -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/user/belipaketsubktg.blade.php ENDPATH**/ ?>