

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card card-border">
        <div class="card-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('tryout')); ?>">Try Out Akbar</a></li>
            </ol>
          </nav>
          <p class="card-description">
            <h3 class="font-weight-bold"><b>Try Out Akbar</b></h3>
          </p>
          <div class="row mt-4">
            <?php $__empty_1 = true; $__currentLoopData = $paket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4 grid-margin stretch-card">
              
                <div class="card card-border">
                  <!-- <img src="<?php echo e(url($key->banner)); ?>" alt="" style="width:100%;height:300px;object-fit:cover;border-top-left-radius: 20px;border-top-right-radius: 20px;"> -->
                  <div class="card-body">
                      <h3><b><?php echo e($key->judul); ?></b></h3>
                      <div class="media">
                        <div class="media-body">
                          <h6 class="mb-1"><i class="far fa-sticky-note"></i> <?php echo e($key->total_soal); ?> Soal</h6>
                        </div>   
                        <div class="media-body">
                          <h6 class="mb-1"><i class="far fa-clock"></i> <?php echo e($key->waktu); ?> Menit</h6>
                        </div>
                      </div>
                    <hr>
                    <div class="mb-3">
                      <p>
                        <h6>
                          <b>Tanggal Mulai :</b>
                        </h6>
                        <h6>
                          <?php echo e($key->mulai); ?>

                        </h6>
                      </p>
                      <p class="mt-3">
                        <h6>
                          <b>Tanggal Selesai :</b><br>
                        </h6>
                        <h6>
                          <?php echo e($key->selesai); ?>

                        </h6>
                      </p>
                    </div>

                    <?php
                      $ceksudah = App\Models\UMapelMst::where('fk_user_id',Auth::id())->where('fk_mapel_mst',$key->id)->first();
                    ?>

                      <?php if($ceksudah): ?>
                          <a href="<?php echo e(url('rankingtryout')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>" type="button" class="mt-2 btn btn-md btn-new btn-block btn-icon-text">
                          <i class="fas fa-trophy btn-icon-prepend"></i>    
                          Peringkat
                        </a>
                      <?php else: ?>
                          <?php if($now>$key->mulai && $now<$key->selesai): ?>
                          <button data-bs-toggle="modal" data-bs-target="#myModal_<?php echo e($key->id); ?>" type="button" class="mt-2 btn btn-md btn-primary btn-block btn-icon-text">
                            <i class="fa fa-edit btn-icon-prepend"></i>                                                    
                            Kerjakan Soal
                          </button>
                          <?php elseif($now<$key->mulai): ?>
                          <button type="button" class="mt-2 btn btn-md btn-warning btn-block btn-icon-text">
                            <i class="fas fa-exclamation-triangle"></i>                                                  
                            Belum dimulai
                          </button>
                            <?php else: ?>
                            <a href="<?php echo e(url('rankingtryout')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>" type="button" class="mt-2 btn btn-md btn-new btn-block btn-icon-text">
                              <i class="fas fa-trophy btn-icon-prepend"></i>    
                              Peringkat
                            </a>
                          <?php endif; ?>
                      <?php endif; ?>


                   

                  </div>
                </div>
             
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="myModal_<?php echo e($key->id); ?>">
              <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <!-- <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div> -->
                
                <!-- Modal body -->
                <div class="modal-body">
                  <center style="font-size:18px"><i style="color:#D97706" class="fa fa-warning"></i> <span style="color:#D97706" class="modal-title"><b>Perhatian Sebelum Mengerjakan</b></span></center>
                  <!-- <h5>Peraturan</h5> -->
                  <div class="table-responsive mt-3">
                    <table class="table table-primary">
                    <tbody>
                      <tr>
                        <td>Try Out</td>
                        <td><?php echo e($key->judul); ?></td>
                      </tr>
                      <tr>
                        <td>Jumlah Soal</td>
                        <td><?php echo e($key->total_soal); ?> Soal</td>
                      </tr>
                      <tr>
                        <td>Waktu Mengerjakan</td>
                        <td><?php echo e($key->waktu); ?> Menit</td>
                      </tr>
                      <?php if($key->ket): ?>
                      <tr>
                        <td>Keterangan</td>
                        <td><?php echo $key->ket; ?></td>
                      </tr>
                      <?php endif; ?>
                      <!-- <tr>
                          <td>Passing Grade</td>
                          <td><?php echo e($key->kkm); ?></td>
                        </tr> -->
                    </tbody>
                    </table>
                  </div>

                  <ul class="mt-3">
                    <li>
                      Waktu akan berjalan ketika anda klik tombol <b>Kerjakan Sekarang</b>
                    </li>
                    <!-- <li>
                      Jawaban anda akan tersimpan secara otomatis
                    </li> -->
                    <li>
                      Jika waktu habis maka halaman akan otomatis keluar dan anda tidak bisa lagi mengerjakan soal
                    </li>
                    <li>
                      Jika waktu masi tersisa dan soal sudah selesai dikerjakan, silahkan klik tombol selesai ujian maka nilai akan keluar otomatis
                    </li>
                    <li>
                      Silahkan klik tombol <b>Kerjakan Sekarang</b> di bawah ini untuk memulai ujian.
                    </li>
                    <li>
                      Pastikan koneksi internet stabil saat mengerjakan soal.
                    </li>
                    <li>
                      Jangan lupa berdoa sebelum mengerjakan ujian.
                    </li>
                  </ul>
                
                </div>

                <!-- Modal footer -->
                <div class="modal-footer" style="justify-content:center">
                  <form method="post" id="formKerjakan_<?php echo e($key->id); ?>" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id_paket_soal_mst[]" value="<?php echo e(Crypt::encrypt($key->id)); ?>">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary btn-kerjakan" idform="<?php echo e($key->id); ?>">Kerjakan Sekarang</button>
                  </form>
                </div>

              </div>
            </div>
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
            //Fungsi Kerjakan Soal
            $(document).on('click', '.btn-kerjakan', function (e) {

            idform = $(this).attr('idform');
            var formData = new FormData($('#formKerjakan_' + idform)[0]);

            var url = "<?php echo e(url('/mulaiujian')); ?>/"+idform;
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
                          $('.modal').modal('hide');
                            // Swal.fire({
                            //   html: response.message,
                            //   icon: 'success',
                            //   showConfirmButton: false
                            // });
                            let timerInterval
                            Swal.fire({
                              title: response.message,
                              html: 'Mohon Tunggu... <b></b>',
                              timer: 2000,
                              timerProgressBar: true,
                              didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                  b.textContent = Swal.getTimerLeft()
                                }, 100)
                              },
                              willClose: () => {
                                clearInterval(timerInterval)
                              }
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) {
                                reload_url(0,'<?php echo e(url("ujian")); ?>/'+response.id);
                              }
                            })
                            
                        }else{
                          if(response.cek){
                            Swal.fire({
                            icon: 'warning',
                            html: response.message,
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Lanjutkan',
                            cancelButtonText: 'Batal',
                            denyButtonText: 'Selesaikan Ujian',
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                  window.location.href = '<?php echo e(url("ujian")); ?>/'+response.idpaket;
                                }else if (result.isDenied){
                                  // Selesaikan Ujian
                                  idpaketmst = response.idpaket;
                                  $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        type: "POST",
                                        dataType: "JSON",
                                        url: "<?php echo e(url('selesaiujian')); ?>",
                                        async: false,
                                        data: {
                                          idpaketmst : idpaketmst
                                        },
                                        beforeSend: function () {
                                            $.LoadingOverlay("show", {
                                                image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
                                            });
                                        },
                                        success: function(response)
                                        {
                                        
                                          if (response.status) {
                                              $('.modal').modal('hide');
                                                Swal.fire({
                                                    html: response.message,
                                                    icon: 'success',
                                                    showConfirmButton: true
                                                }).then((result) => {
                                                    $.LoadingOverlay("show", {
                                                      image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
                                                    });
                                                    reload_url(1500,'<?php echo e(url("paketsayaktg")); ?>');
                                                })
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
                                  // Akhir Selesaikan Ujian
                                }
                            });
                          }else{
                            Swal.fire({
                                html: response.message,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                          }
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



<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/sahabatatlm.com/public_html/laravel/resources/views/user/tryout.blade.php ENDPATH**/ ?>