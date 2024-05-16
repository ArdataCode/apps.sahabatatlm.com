

<?php $__env->startSection('content'); ?>

<?php
if(app('request')->input('tab')){
  $tab = app('request')->input('tab');
}else{
  $tab = "pembelajaran";
}
?>

<style>
  a:hover{
    text-decoration:none;
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
              <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('paketsayaktg')); ?>">Paket Saya</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('paketsayasubktg')); ?>/<?php echo e(Crypt::encrypt($data->fk_paket_kategori)); ?>"><?php echo e($data->kategori_r->judul); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('paketsaya')); ?>/<?php echo e(Crypt::encrypt($data->id)); ?>"><?php echo e($data->subkategori_r->judul); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e($data->judul); ?></li>
            </ol>
          </nav>
          <p class="card-description">
            <h3 class="font-weight-bold"><b><?php echo e($data->judul); ?></b></h3>
            <h6 class="txt-abu"><?php echo $data->ket; ?></h6>
          </p>
          <hr>
          <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <ul class="pb-0 nav nav-pills btn-menu-paket" role="tablist" style="border-bottom:unset">
                  <li class="nav-item">
                    <a class="btn btn-sm btn-primary nav-link btn-tab-hasil <?php echo e($tab == 'pembelajaran' ? 'active' : ''); ?>" data-toggle="pill" href="#pembelajaran">Pembelajaran</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-sm btn-primary nav-link btn-tab-hasil <?php echo e($tab == 'latihan' ? 'active' : ''); ?>" data-toggle="pill" href="#latihan">Latihan</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-sm btn-primary nav-link btn-tab-hasil <?php echo e($tab == 'hasillatihan' ? 'active' : ''); ?>" data-toggle="pill" href="#hasillatihan">Hasil Latihan</a>
                  </li>
                </ul>
                <div class="tab-content tab-hasil-ujian">

                <div id="pembelajaran" class="tab-pane <?php echo e($tab == 'pembelajaran' ? 'active' : ''); ?>"><br>
                    <?php if(count($paketvideo)>0 || count($paketpdf)>0 || count($paketzoom)>0): ?>

                    <?php if(count($paketvideo)>0): ?>
                    <b>Video Pembelajaran</b>
                    <div class="row mt-3">
                      <?php $__currentLoopData = $paketvideo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-4 grid-margin stretch-card">
                          <div class="card card-border" style="height: 100%;">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-1">
                                  </div>
                                  <div class="col-10">
                                    <div class="row" style="align-items: center">
                                      <div class="col-3" style="padding:0px">
                                        <img width="100%" src="<?php echo e(asset('image/global/img-video.png')); ?>" alt="">
                                      </div>
                                      <div class="col-9">
                                        <h6>Video</h6>
                                        <h4 style="margin-bottom:0px"><b><?php echo e($key->judul); ?></b></h4>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <a target="_blank" href="<?php echo e($key->link); ?>">
                                  <button type="button" class="mt-2 btn btn-md btn-primary btn-block btn-icon-text">
                                    <i class="ti-control-play btn-icon-prepend"></i>                                                    
                                    Tonton
                                  </button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                    <?php if(count($paketpdf)>0): ?>
                    <hr>
                    <b>Materi Pembelajaran</b>
                    <div class="row mt-3">
                      <?php $__currentLoopData = $paketpdf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-4 grid-margin stretch-card">
                          <div class="card card-border" style="height: 100%;">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-1">
                                  </div>
                                  <div class="col-10">
                                    <div class="row" style="align-items: center">
                                      <div class="col-3" style="padding:0px">
                                        <img width="100%" src="<?php echo e(asset('image/global/img-paket.png')); ?>" alt="">
                                      </div>
                                      <div class="col-9">
                                        <h6>Materi</h6>
                                        <h4 style="margin-bottom:0px"><b><?php echo e($key->judul); ?></b></h4>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <a target="_blank" href="<?php echo e(asset($key->link)); ?>">
                                  <button type="button" class="mt-2 btn btn-md btn-primary btn-block btn-icon-text">
                                    <i class="fa fa-eye btn-icon-prepend"></i>                                                    
                                    Lihat Materi
                                  </button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>


                    <?php if(count($paketzoom)>0): ?>
                    <hr>
                    <b>Zoom</b>
                    <div class="row mt-3">
                      <?php $__currentLoopData = $paketzoom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-4 grid-margin stretch-card">
                          <div class="card card-border" style="height: 100%;">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-1">
                                  </div>
                                  <div class="col-10">
                                    <div class="row" style="align-items: center">
                                      <div class="col-3" style="padding:0px">
                                        <img width="100%" src="<?php echo e(asset('image/global/img-video.png')); ?>" alt="">
                                      </div>
                                      <div class="col-9">
                                        <h6>Zoom</h6>
                                        <h4 style="margin-bottom:0px"><b><?php echo e($key->judul); ?></b></h4>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <a target="_blank" href="<?php echo e(asset($key->link)); ?>">
                                  <button type="button" class="mt-2 btn btn-md btn-primary btn-block btn-icon-text">
                                    <!-- <i class="fa fa-eye btn-icon-prepend"></i>   -->
                                    <i class="fas fa-chalkboard-teacher btn-icon-prepend"></i>                                                  
                                    Ikuti Zoom
                                  </button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>


                    <?php else: ?>
                    <center><img class="mb-3 img-no" src="<?php echo e(asset('image/global/no-paket.png')); ?>" alt=""></center>
                    <br>
                    <center>Belum Ada Data</center>
                    <?php endif; ?>
                  </div>

                  <div id="latihan" class="tab-pane <?php echo e($tab == 'latihan' ? 'active' : ''); ?>"><br>
                  
                    <?php if(count($paketdtl)>0): ?>
             
                    <b>Latihan Soal</b>
                    <div class="row mt-3">
                      <?php $__currentLoopData = $paketdtl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-4 grid-margin stretch-card">
                          <div class="card card-border" style="height: 100%;">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-1">
                                  </div>
                                  <div class="col-10">
                                    <div class="row" style="align-items: center">
                                      <div class="col-3" style="padding:0px">
                                        <img width="100%" src="<?php echo e(asset('image/global/img-paket.png')); ?>" alt="">
                                      </div>
                                      <div class="col-9">
                                        <h6>Latihan</h6>
                                        <h4 style="margin-bottom:0px"><b><?php echo e($key->paket_mst_r->judul); ?></b></h4>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <button data-bs-toggle="modal" data-bs-target="#myModal_<?php echo e($key->id); ?>" type="button" class="mt-2 btn btn-md btn-primary btn-block btn-icon-text">
                                    <i class="fa fa-edit btn-icon-prepend"></i>                                                    
                                    Kerjakan Soal
                                  </button>
                                  <a href="<?php echo e(url('rankingpaket')); ?>/<?php echo e(Crypt::encrypt($key->paket_mst_r->id)); ?>" type="button" class="mt-2 btn btn-md btn-new btn-block btn-icon-text">
                                    <i class="fas fa-trophy btn-icon-prepend"></i>    
                                    Peringkat
                                  </a>
                                </div>
                              </div>
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
                                    <td>Paket Latihan</td>
                                    <td><?php echo e($key->paket_mst_r->judul); ?></td>
                                  </tr>
                                  <tr>
                                    <td>Jumlah Soal</td>
                                    <td>
                                      <h6><?php echo e($key->paket_mst_r->total_soal); ?> Soal</h6>
                                      <?php if(count($key->paket_mst_r->paket_soal_dtl_r)>0): ?> 
                                      <h6>[ <?php echo e(count($key->paket_mst_r->paket_soal_dtl_r)); ?> Pilihan Ganda ]</h6>
                                      <?php endif; ?>
                                      <?php if(count($key->paket_mst_r->paket_soal_essay_dtl_r)>0): ?> 
                                      <h6>[ <?php echo e(count($key->paket_mst_r->paket_soal_essay_dtl_r)); ?> Essay ]</h6>
                                      <?php endif; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Waktu Mengerjakan</td>
                                    <td><?php echo e($key->paket_mst_r->waktu); ?> Menit</td>
                                  </tr>
                                  <?php if($key->paket_mst_r->ket): ?>
                                  <tr>
                                    <td>Keterangan</td>
                                    <td><?php echo $key->paket_mst_r->ket; ?></td>
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
                                <input type="hidden" name="id_paket_soal_mst[]" value="<?php echo e(Crypt::encrypt($key->paket_mst_r->id)); ?>">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary btn-kerjakan" idform="<?php echo e($key->id); ?>">Kerjakan Sekarang</button>
                              </form>
                            </div>

                          </div>
                        </div>
                      </div>

                  
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <center><img class="mb-3 img-no" src="<?php echo e(asset('image/global/no-paket.png')); ?>" alt=""></center>
                      <br>
                      <center>Belum Ada Data</center>
                    <?php endif; ?>
                  </div>
                  <div id="hasillatihan" class="tab-pane <?php echo e($tab == 'hasillatihan' ? 'active' : ''); ?>"><br>
                  <?php if(count($hasilujian)>0): ?>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>LATIHAN</th>
                          <th>TANGGAL</th>
                          <th>SKOR AKHIR</th>
                          <th>OPSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          <?php $__currentLoopData = $hasilujian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td width="1%"><?php echo e($loop->iteration); ?></td>
                            <td width="30%"><?php echo e($key->judul); ?></td>
                            <td width="10%">
                              <?php echo e(Carbon\Carbon::parse($key->mulai)->translatedFormat('l, d F Y , H:i:s')); ?>  
                            </td>
                            <!-- <td width="5%"><?php echo e($key->kkm); ?></td> -->
                            <td width="10%" style="text-align:center">
                            <?php if(count($key->u_paket_soal_essay_dtl_r)>0): ?>
                                <?php if($key->status==0): ?>
                                <span class="text-danger">Menunggu Penilaian Essay</span>  
                                <?php else: ?>
                                <?php echo e($key->set_nilai<=0 ? 0 : $key->set_nilai); ?>

                                <?php endif; ?>
                            <?php else: ?>
                                <?php echo e($key->set_nilai<=0 ? 0 : $key->set_nilai); ?>

                            <?php endif; ?>
                            </td>
                            <?php
                            if($key->set_nilai < $key->kkm){
                              $lulus = 0;
                            }
                            else{
                              $lulus = 1;
                            }
                            ?>
                            <!-- <td width="10%">
                              <label class="<?php echo e(statuslulus($lulus,2)); ?>"><?php echo e(statuslulus($lulus,1)); ?></label>
                              <a href="<?php echo e(url('detailhasil')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>">
                                <label class="_hover badge badge-info">Pembahasan</label>
                              </a>
                            </td> -->
                            <td width="10%">
                              <!-- <label class="<?php echo e(statuslulus($lulus,2)); ?>"><?php echo e(statuslulus($lulus,1)); ?></label> -->
                              <a target="_blank" href="<?php echo e(url('detailhasil')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>">
                                <button class="btn btn-new btn-sm">
                                <i class="fas fa-external-link-alt"></i> Pembahasan
                                </button>
                              </a>
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                      </tbody>
                    </table>
                  </div>
                  <?php else: ?>
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



<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/user/paketsayadtl.blade.php ENDPATH**/ ?>