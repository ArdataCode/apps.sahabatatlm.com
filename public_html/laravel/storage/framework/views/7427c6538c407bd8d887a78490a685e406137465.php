
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
              <li class="breadcrumb-item active" aria-current="page">Paket Saya</li>
              <li class="breadcrumb-item active" aria-current="page">Kerjakan Latihan <?php echo e($upaketsoalmst->judul); ?></li>
            </ol>
          </nav>
          <p class="card-description">
            <h3 class="font-weight-bold"><b>Latihan <?php echo e($upaketsoalmst->judul); ?></b></h3>
          </p>
          
          <div class="row mt-3">
            <div class="col-xl-9 col-md-9 col-sm-9 col-xs-9">
            <div class="_soal_content tab-content" id="pills-tabContent">
              <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="tab-pane fade <?php echo e($key->no_soal==1 ? 'show active' : ''); ?>" id="pills-<?php echo e($key->id); ?>" role="tabpanel">
                  <!-- <h4 class="ktg-soal">Kategori <?php echo e($key->u_paket_soal_ktg_r->judul); ?></h4> -->
                  <!-- <h6><b>[<?php echo e($key->nama_tingkat); ?>]</b></h6> -->
                  <div class="mb-3 p-3 card-border" style="border-radius: 10px;">
                    <div class="row">
                      <div class="col-6">
                        <h4 class="mb-0 mt-2"><b>Soal No.<?php echo e($key->no_soal); ?></b></h4>
                      </div>
                      <div class="col-6">
                      </div>
                    </div>
                    <hr>
                    <div class="_soal"><?php echo $key->soal; ?></div>
                    <div class="form-group">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input _radio" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="a" <?php echo e($key->jawaban_user=="a" ? "checked='checked'" : ""); ?>>
                          <i class="input-helper"></i></label>
                          <div class="_pilihan">
                            <span><b>a.</b> </span>
                            <div class="_pilihan_isi">
                              <?php echo $key->a; ?>

                            </div>
                          </div>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input _radio" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="b" <?php echo e($key->jawaban_user=="b" ? "checked" : ""); ?>>
                          <i class="input-helper"></i></label>
                          <div class="_pilihan">
                            <span><b>b.</b> </span>
                            <div class="_pilihan_isi">
                              <?php echo $key->b; ?>

                            </div>
                          </div>
                      </div>
                      <?php if($key->c): ?>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input _radio" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="c" <?php echo e($key->jawaban_user=="c" ? "checked" : ""); ?>>
                          <i class="input-helper"></i></label>
                          <div class="_pilihan">
                            <span><b>c.</b> </span>
                            <div class="_pilihan_isi">
                              <?php echo $key->c; ?>

                            </div>
                          </div>
                      </div>
                      <?php endif; ?>
                      <?php if($key->d): ?>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input _radio" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="d" <?php echo e($key->jawaban_user=="d" ? "checked" : ""); ?>>
                          <i class="input-helper"></i></label>
                          <div class="_pilihan">
                            <span><b>d.</b> </span>
                            <div class="_pilihan_isi">
                              <?php echo $key->d; ?>

                            </div>
                          </div>
                      </div>
                      <?php endif; ?>
                      <?php if($key->e): ?>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input _radio" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="e" <?php echo e($key->jawaban_user=="e" ? "checked" : ""); ?>>
                          <i class="input-helper"></i></label>
                          <div class="_pilihan">
                            <span><b>e.</b> </span>
                            <div class="_pilihan_isi">
                              <?php echo $key->e; ?>

                            </div>
                          </div>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div style="padding-bottom:30px">
                    <span>
                      <?php if(!$loop->first): ?>
                      <button idsoal="<?php echo e($key->id - 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                        <i class="ti-back-left btn-icon-prepend"></i>                                                    
                        Sebelumnya
                      </button>
                      <?php endif; ?>
                    </span>
                    <span style="float:right;padding-bottom:30px">
                      <?php if(!$loop->last): ?>
                      <button idsoal="<?php echo e($key->id + 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                        Selanjutnya
                        <i class="ti-back-right btn-icon-prepend"></i>                                                    
                      </button>
                      <?php endif; ?>
                    </span>
                  </div>
              </div>
              <!-- <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div> -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-3 col-xs-3">
            <div class="mb-4 card-border p-3 div-waktu">
              <div class="mb-0" id="end">
                <h6>Waktu Tersisa</h6>
                <span class="f-waktu" id="hours"></span><br>
                <span class="f-waktu" id="mins"></span>
                <span class="f-waktu" id="secs"></span>
              </div>
            </div>

            <div class="mb-4 card-border p-3 br-10">
              <center class="mb-1">Sudah Selesai?</center>
              <button type="button" data-bs-toggle="modal" data-bs-target="#modalselesaiujian" class="btn-block btn btn-primary btn-sm _btn_selesai_ujian">
                <h6 class="mb-0">Selesaikan Ujian</h6>
              </button>
            </div>

            <div class="card-border p-3 br-10">
              <center class="mb-3">Nomor Soal</center>
              <ul class="_soal nav nav-pills mb-0" id="pills-tab" role="tablist">
                <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1</button>
                </li> -->
                <li class="nav-item" role="presentation">
                  <button id="btn_no_soal_<?php echo e($key->id); ?>" class="btn-sm <?php echo e($key->jawaban_user ? '_ada_isi' : ''); ?> nav-link <?php echo e($key->no_soal==1 ? 'active' : ''); ?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($key->id); ?>" type="button" role="tab" aria-selected="true"><?php echo e($key->no_soal); ?></button>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>

            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalselesaiujian">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <!-- <div class="modal-header">
        <h4 class="modal-title">Selesaikan Ujian?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div> -->

      <!-- Modal body -->
      <div class="modal-body pb-0">
        <center style="font-size:18px"><i style="color:#106571" class="fa fa-check-square"></i> <span style="color:#106571" class="modal-title"><b>Submit Jawaban Sekarang?</b></span></center>
        <h5 class="mt-2"><center>Jawaban yang telah disubmit tidak dapat diubah?</center></h5>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="display:block;text-align: center;border-top:0px solid">
        <button type="button" class="btn btn-primary" id="btn-selesai" upaketsoalmst="<?php echo e(Crypt::encrypt($upaketsoalmst->id)); ?>">Submit</button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<!-- jQuery -->
<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // window.onbeforeunload = function() {
  //     return "Yakin ingin keluar dari halaman ini!";
  // };
  $(document).ready(function(){

      $(document).bind("contextmenu",function(e){
        return false;
      });

      $('body').on("cut copy paste",function(e) {
          e.preventDefault();
      });

      $(document).on('click', '.btn-next-back', function (e) {
          idsoal = $(this).attr('idsoal');
          $('.tab-pane').removeClass('show active');
          $('.nav-link').removeClass('active');

          $('#pills-'+idsoal).addClass('show active');
          $('#btn_no_soal_'+idsoal).addClass('active');
      });

      $(document).on('change', '._radio', function (e) {
          jawaban = $(this).val();
          idpaketdl = $(this).attr('idpaketdtl');
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo e(url('updatejawaban')); ?>",
                // async: false,
                data: {
                  jawaban : jawaban,
                  idpaketdl : idpaketdl
                },
                beforeSend: function () {
                    $.LoadingOverlay("show", {
                        image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
                    });
                },
                success: function(response)
                {
                  if (response.status) {
                      $('#btn_no_soal_'+idpaketdl).addClass('_ada_isi');
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


      $(document).on('click', '#btn-selesai', function (e) {
          idpaketmst = $('#btn-selesai').attr('upaketsoalmst');
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo e(url('selesaiujian')); ?>",
                // async: false,
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
                      document.getElementById("end").innerHTML = "UJIAN SELESAI!!";
                      reload_url(0,response.menu);

                        // Swal.fire({
                        //     html: response.message,
                        //     icon: 'success',
                        //     showConfirmButton: true
                        // }).then((result) => {
                        //     $.LoadingOverlay("show", {
                        //       image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
                        //     });
                        // })

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
                      // $.LoadingOverlay("hide");
                  }
              });
      });

      // COUNDOWN
      // The data/time we want to countdown to
      var countDownDate = new Date("<?php echo e($upaketsoalmst->selesai); ?>").getTime();

      // Run myfunc every second
      i = 0;
      var myfunc = setInterval(function() {

      const now = new Date('<?php echo e($now); ?>');
      now.setSeconds(now.getSeconds() + i);
      i++;
      // console.log(date.setSeconds(date.getSeconds() + 5));

      // var now = new Date().getTime();
      var timeleft = countDownDate - now;
          
      // Calculating the days, hours, minutes and seconds left
      // var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
      var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
          
      // Result is output to the specific element
      // document.getElementById("days").innerHTML = days + ""
      document.getElementById("hours").innerHTML = hours + " Jam " 
      document.getElementById("mins").innerHTML = minutes + " Menit " 
      document.getElementById("secs").innerHTML = seconds + " Detik" 
          
      // Display the message when countdown is over
      if (timeleft < 0) {
          clearInterval(myfunc);
          // document.getElementById("days").innerHTML = ""
          // document.getElementById("hours").innerHTML = "" 
          // document.getElementById("mins").innerHTML = ""
          // document.getElementById("secs").innerHTML = ""
          document.getElementById("end").innerHTML = "UJIAN SELESAI!!";

          idpaketmst = $('#btn-selesai').attr('upaketsoalmst');
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              type: "POST",
              dataType: "JSON",
              url: "<?php echo e(url('selesaiujian')); ?>",
              // async: false,
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
                    reload_url(0,response.menu);

                    // Swal.fire({
                    //     html: response.message,
                    //     icon: 'success',
                    //     showConfirmButton: true
                    // }).then((result) => {
                    //     $.LoadingOverlay("show", {
                    //       image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
                    //     });
                    // })

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
                    // $.LoadingOverlay("hide");
                }
            });
        }
      }, 1000);
      // END COUNDOWN
  });
</script>
<!-- Loading Overlay -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/apps.sahabatatlm.com/public_html/laravel/resources/views/user/ujian.blade.php ENDPATH**/ ?>