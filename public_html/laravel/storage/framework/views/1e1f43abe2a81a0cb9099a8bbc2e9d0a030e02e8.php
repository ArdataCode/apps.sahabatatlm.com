
<!-- partial -->
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card card-border">
        <div class="card-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Pembelian</li>
            </ol>
          </nav>
          <p class="card-description">
            <h3 class="font-weight-bold mb-3"><b>Pembelian</b></h3>
            <div class="card card-inverse-info mb-3">
                <div class="card-body">
                  <p class="card-text">
                    <h4><i class="ti-info"></i> Informasi</h4>
                    <div class="informasi">
                      <ul>
                        <!-- <li>Pembayaran diverifikasi otomatis oleh sistem.</li> -->
                        <li>Apabila dalam 30 menit setelah pembayaran namun pembelian belum terkonfirmasi, silahkan hubungi kami melalui No.WhatsApp <?php echo e($template->no_hp); ?></li>
                      </ul>
                    </div>
                  </p>
                </div>
             </div>
          </p>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="">

                <ul class="nav nav-pills btn-menu-hasil" role="tablist">
                  <li class="nav-item">
                    <a class="btn btn-sm btn-primary nav-link btn-tab-hasil active" data-toggle="pill" href="#menunggu"><i class="ti-timer"></i> Menunggu pembayaran</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-sm btn-primary nav-link btn-tab-hasil" data-toggle="pill" href="#batal"><i class="ti-close"></i> Pembayaran batal</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-sm btn-primary nav-link btn-tab-hasil" data-toggle="pill" href="#selesai"><i class="ti-check"></i> Pembayaran selesai</a>
                  </li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content tab-hasil-ujian">
                  <div id="menunggu" class="tab-pane active"><br>
                        <?php $__empty_1 = true; $__currentLoopData = $data->where('status',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                        $idstatus = $key->status;
                        if(Carbon\Carbon::now()  > $key->expired && $idstatus==0){
                          $idstatus = 2;
                          $dataupdate['status'] = 2;
                          \App\Models\Transaksi::find($key->id)->update($dataupdate);
                        }
                        ?>
                        <?php if($idstatus==0): ?>
                        <div class="row mb-3">
                          <div class="col-md-8">
                              <p>No.Pembelian : <b><?php echo e($key->merchant_order_id); ?></b></p>
                              <p>Pembelian : <?php echo e($key->paket_mst_r->judul); ?></p>
                              <p><?php echo e(Carbon\Carbon::parse($key->created_at)->translatedFormat('l, d F Y , H:i:s')); ?></p>
                              <p>Total Pembayaran : <?php echo e(formatRupiahCekGratis($key->harga)); ?></p>
                              <p>Batas Pembayaran : <span class="text-danger"><?php echo e(Carbon\Carbon::parse($key->expired)->translatedFormat('l, d F Y , H:i:s')); ?> WIB</span></p>
                          </div>
                          <div class="col-md-4" style="text-align:right">
                          <label class="badge badge-outline-primary">Menunggu Pembayaran</label>
                          <?php if($key->reference=="MANUAL"): ?>
                          <p><a target="_blank" href="<?php echo e(url('detailbayar')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>" type="button" class="mt-1 btn btn-primary btn-sm btn-fw">Panduan Pembayaran</a></p>
                          <?php else: ?>
                          <p><a target="_blank" href="<?php echo e($key->payment_url); ?>" type="button" class="mt-1 btn btn-primary btn-sm btn-fw">Panduan Pembayaran</a></p>
                          <?php endif; ?>
                          <p><button data-bs-toggle="modal" data-bs-target="#myModal<?php echo e($key->id); ?>" type="button" class="mt-1 btn btn-danger btn-sm btn-fw">Batalkan Pembelian</button></p>
                          </div>
                        </div>

                          <!-- The Modal -->
                            <div class="modal fade" id="myModal<?php echo e($key->id); ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form method="post" id="formHapus_<?php echo e($key->id); ?>" class="form-horizontal">
                                    <?php echo csrf_field(); ?>
                                        <div class="modal-body">
                                          Apakah kamu yakin ingin membatalkan pembelian paket <?php echo e($key->paket_mst_r->judul); ?>?
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer" id="modal-batal-beli">
                                        <!-- <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Tidak</button> -->
                                        <input type="hidden" name="idtransaksi[]" value="<?php echo e(Crypt::encrypt($key->id)); ?>">

                                        <button type="button" class="btn-batalkan btn btn-md btn-danger" idform="<?php echo e($key->id); ?>">Ya, Batalkan</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <center><img class="mb-3 img-no" src="<?php echo e(asset('image/global/no-transaksi.png')); ?>" alt=""></center>
                      <br>
                      <center>Belum Ada Data</center>
                      <?php endif; ?>
                      <!-- <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>No.Transaksi</th>
                                <th>Paket</th>
                                <th>Jumlah</th>
                                <th>Tanggal Transaksi</th>
                                <th>Bayar Sebelum</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(count($data)>0): ?>
                              <?php $__currentLoopData = $data->where('status',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td width="40%"><?php echo e($key->merchant_order_id); ?></td>
                                <td width="40%"><?php echo e($key->paket_mst_r->judul); ?></td>
                                  <td width="10%" style="text-align:right" class="font-weight-bold"><?php echo e(formatRupiahCekGratis($key->harga)); ?></td>
                                  <td>
                                    <?php echo e(Carbon\Carbon::parse($key->created_at)->translatedFormat('l, d F Y , H:i:s')); ?>

                                  </td>
                                  <td>
                                    <?php
                                    $idstatus = $key->status;
                                 
                                    ?>

                                    <?php if($idstatus==0): ?>
                                      <?php echo e(Carbon\Carbon::parse($key->expired)->translatedFormat('l, d F Y , H:i:s')); ?>

                                    <?php endif; ?>
                                  </td>
                                  <td width="10%">
                                  
                                    <label class="<?php echo e(statuspayment($idstatus,2)); ?>"><?php echo e(statuspayment($idstatus,1)); ?></label>
                                    <?php if($idstatus==0): ?>
                                    <a target="_blank" href="<?php echo e($key->payment_url); ?>">
                                      <label class="_hover badge badge-info">Konfirmasi</label>
                                    </a>
                                    <?php endif; ?>
                                  </td>

                                  <?php
                                  $idstatus = $key->status;

                                  if($key->expired < Carbon\Carbon::now()){
                                  }
                                  else{
                                  }
                                  ?>
                         
                                
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php else: ?>
                                <tr>
                                  <td colspan="5" style="text-align:center" class="font-weight-bold">Belum Ada Transaksi</td>
                                </tr>
                              <?php endif; ?>
                            </tbody>
                          </table>
                        </div> -->
                  </div>
                  <div id="batal" class="tab-pane"><br>
                        <?php $__empty_1 = true; $__currentLoopData = $data->where('status',2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        
                        <div class="row mb-3">
                          <div class="col-md-8">
                              <p>No.Pembelian : <?php echo e($key->merchant_order_id); ?></p>
                              <p>Pembelian : <?php echo e($key->paket_mst_r->judul); ?></p>
                              <p><?php echo e(Carbon\Carbon::parse($key->created_at)->translatedFormat('l, d F Y , H:i:s')); ?></p>
                              <p>Total Pembayaran : <?php echo e(formatRupiahCekGratis($key->harga)); ?></p>
                              <!-- <p>Batas Pembayaran : <span class="text-danger"><?php echo e(Carbon\Carbon::parse($key->expired)->translatedFormat('l, d F Y , H:i:s')); ?> WIB</span></p> -->
                          </div>
                          <div class="col-md-4" style="text-align:right">
                          <label class="badge badge-outline-danger">Pembayaran Batal</label>
                          
                          </div>
                        </div>
                      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <center><img class="mb-3 img-no" src="<?php echo e(asset('image/global/no-transaksi.png')); ?>" alt=""></center>
                      <br>
                      <center>Belum Ada Data</center>
                      <?php endif; ?>
                  </div>
                  <div id="selesai" class="tab-pane"><br>
                      <?php $__empty_1 = true; $__currentLoopData = $data->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="row mb-3">
                          <div class="col-md-8">
                              <p>No.Pembelian : <?php echo e($key->merchant_order_id); ?></p>
                              <p>Pembelian : <?php echo e($key->paket_mst_r->judul); ?></p>
                              <p><?php echo e(Carbon\Carbon::parse($key->created_at)->translatedFormat('l, d F Y , H:i:s')); ?></p>
                              <p>Total Pembayaran : <?php echo e(formatRupiahCekGratis($key->harga)); ?></p>
                              <!-- <p>Batas Pembayaran : <span class="text-danger"><?php echo e(Carbon\Carbon::parse($key->expired)->translatedFormat('l, d F Y , H:i:s')); ?> WIB</span></p> -->
                          </div>
                          <div class="col-md-4" style="text-align:right">
                          <label class="badge badge-outline-success">Pembayaran Selesai</label>
                          
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <center><img class="mb-3 img-no" src="<?php echo e(asset('image/global/no-transaksi.png')); ?>" alt=""></center>
                      <br>
                      <center>Belum Ada Data</center>
                      <?php endif; ?>
                  </div>
                </div>
                </div>
              </div>
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
  $(document).ready(function(){
      // alert('x');
          //Fungsi Hapus Data
    $(document).on('click', '.btn-batalkan', function (e) {
        idform = $(this).attr('idform');
        var formData = new FormData($('#formHapus_' + idform)[0]);

        var url = "<?php echo e(url('/batalkanpesanan')); ?>";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'POST',
            dataType: "JSON",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                  $.LoadingOverlay("show", {
                      image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
                  });
            },
            success: function (response) {
                    if (response.status == true) {
                      Swal.fire({
                          html: response.message,
                          icon: 'success',
                          showConfirmButton: false
                        });
                        reload(1000);
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
                $.LoadingOverlay("hide");
            }
        });
    });

  });
</script>
<!-- Loading Overlay -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/sahabatatlm.com/public_html/laravel/resources/views/user/pembelian.blade.php ENDPATH**/ ?>