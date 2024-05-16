
<!-- partial -->
<?php $__env->startSection('content'); ?>
<style>
  tr th{
    text-align:left;
  }
  thead tr{
    background:#e5e5e5;
  }
  tbody{
    border-top:unset !important;
  }
</style>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card card-border">
        <div class="card-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>"><i class="fas fa-home"></i></a></li>
              <!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('tryout')); ?>">Peringkat</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Peringkat <?php echo e($datapaket->judul); ?></li>
            </ol>
          </nav>
          <p class="card-description">
            <h3 class="font-weight-bold"><b>Peringkat Peserta</b></h3>
          </p>
          <div class="alert alert-success p-3 mt-3" role="alert">
            <div class="row">
              <div class="col-4">
                <table class="table table-borderless table-sm">
                      <tbody>
                        <tr>
                          <th>Paket</th>
                          <th>: <?php echo e($datapaket->judul); ?></th>
                        </tr>
                        <!-- <tr>
                          <th>Jumlah Peserta</th>
                          <th>: <?php echo e(count($udatapaket)); ?> Peserta</th>
                        </tr> -->
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>PERINGKAT</th>
                    <th>NAMA</th>
                    <th>NILAI</th>
                    <th>PROVINSI / KOTA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($udatapaket)>0): ?>
                    <?php $__currentLoopData = $udatapaket->sortByDesc('set_nilai'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <th style="text-align:left"><?php echo e($loop->iteration); ?></th>
                      <td width="40%"><?php echo e($key->user_r->name); ?> <?php if($loop->iteration==1): ?><i style="color:gold" class="ti-medall btn-icon-prepend"></i><?php endif; ?></td>
                      <td width="10%" style="text-align:left" class="font-weight-bold"><?php echo e($key->set_nilai); ?></td>
                      <td style="text-align:left" width="40%"><span data-bs-toggle="tooltip" data-bs-placement="top" title="Kecamatan : <?php echo e($key->user_r->kecamatan_r ? $key->user_r->kecamatan_r->nama : '-'); ?>, <?php echo e($key->user_r->kabupaten_r ? ucwords(strtolower($key->user_r->kabupaten_r->nama)) : '-'); ?>, Provinsi : <?php echo e($key->user_r->provinsi_r ? $key->user_r->provinsi_r->nama : ''); ?>"><?php echo e($key->user_r->kabupaten_r ? ucwords(strtolower($key->user_r->kabupaten_r->nama)) : '-'); ?>, <?php echo e($key->user_r->provinsi_r ? $key->user_r->provinsi_r->nama : '-'); ?></span></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7" style="text-align:center" class="font-weight-bold">Belum Ada Data</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<!-- jQuery -->
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
  $(document).ready(function(){
  
  });
</script>
<!-- Loading Overlay -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make($extend, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/apps.sahabatatlm.com/public_html/laravel/resources/views/user/rankingpaket.blade.php ENDPATH**/ ?>