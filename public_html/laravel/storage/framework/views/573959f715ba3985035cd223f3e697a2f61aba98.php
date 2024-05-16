
        <?php
          $now = Carbon\Carbon::now()->toDateTimeString();
        ?>
        <?php $__env->startSection('content'); ?>
        <style>
          .img-banner{
            width:100%;height:20vw;object-fit:cover;border-top-left-radius: 20px;border-top-right-radius: 20px;
          }
          .p-relative{
            position:relative;
          }
          .p-absolute{
            position:absolute;
          }
          .txt-white{
            color:white;
          }
          a{
            text-decoration:none;
            color:#7c7c7c;
          }
          a:hover{
            text-decoration:none;
            color:#7c7c7c;
          }
          a .card-body:hover img{
            filter: drop-shadow(2px 4px 6px black);
          }
          @media(max-width: 768px){
            .img-banner{
              height:60vw;
            }
            .mt-5-m{
              margin-top:15vw;
            }
          }
        </style>


  
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-md-12">
              <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                  <h4 class="font-weight-bold mb-3">Home</h4>
                  <!-- <h2 class="font-weight-bold">Selamat Datang</h2> -->
                  <!-- <h6 class="font-weight-normal mb-0">Sudah mengikuti event apa hari ini? Jangan lupa ikuti event-event menarik untuk menambah ilmu dan wawasan anda.</h6> -->
                </div>
                
                <div class="col-12 col-lg-4 col-md-4 col-xl-4 txt-white">
                  <a href="<?php echo e(url('belipaketktg')); ?>" style="color:white">
                  <div class="p-relative">
                    <img class="p-absolute" src="<?php echo e(asset('image/global/Group1.png')); ?>" alt="" width="100%">
                    <div class="row p-4">
                        <div class="col-8">
                            <b>Paket Tersedia
                            <br>
                            <?php echo e(count($paket)); ?>

                            </b>
                        </div>
                        <div class="col-4">
                            <img src="<?php echo e(asset('image/global/Icon1.png')); ?>" alt="" width="100%">
                        </div>
                    </div>
                  </div>
                  </a>
                </div>
                <div class="col-12 col-lg-4 col-md-4 col-xl-4 txt-white mt-5-m">
                  <a href="<?php echo e(url('paketsayaktg')); ?>" style="color:white">
                    <div class="p-relative">
                      <img class="p-absolute" src="<?php echo e(asset('image/global/Group2.png')); ?>" alt="" width="100%">
                      <div class="row p-4">
                          <div class="col-8">
                              <b>Paket Saya
                                <br>
                                <?php echo e(count($transaksi)); ?>

                              </b>
                          </div>
                          <div class="col-4">
                              <img src="<?php echo e(asset('image/global/Icon2.png')); ?>" alt="" width="100%">
                          </div>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- <div class="col-12 col-lg-4 col-md-4 col-xl-4 txt-white mt-5-m">
                  <div class="p-relative">
                    <img class="p-absolute" src="<?php echo e(asset('image/global/Group3.png')); ?>" alt="" width="100%">
                    <div class="row p-4">
                        <div class="col-8">
                            <b>Komisi Referral
                              <br>
                              39
                            </b>
                        </div>
                        <div class="col-4">
                            <img src="<?php echo e(asset('image/global/Icon3.png')); ?>" alt="" width="100%">
                        </div>
                    </div>
                  </div>
                </div> -->
              </div>

              <div class="row mt-5 pt-5">
                <?php if(count($informasi)>0): ?>
                <div class="col-6 col-xl-6">
                  <h4 class="font-weight-bold mb-3">Informasi</h4>
                </div>
                <?php endif; ?>
                
                <?php if(count($voucher)>0): ?>
                <div class="col-6 col-xl-6 d-none d-md-block d-lg-block d-xl-block">
                  <h4 class="font-weight-bold mb-3">Promo</h4>
                </div>
                <?php endif; ?>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="my-class">
                  <?php if(count($informasi)>0): ?>
                  <?php $__currentLoopData = $informasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    if($key->link){
                      $link = $key->link;
                    }else{
                      $link = url('informasidtl').'/'.Crypt::encrypt($key->id);
                    }
                  ?>
                  <a href="<?php echo e($link); ?>">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-5">
                            <img class="rounded" src="<?php echo e(asset($key->gambar)); ?>" alt="" style="width:100%;height:150px;object-fit:cover">
                          </div>
                          <div class="col-7">
                            <h6><?php echo e($key->judul); ?></h6>
                            <p><?php echo e($key->ket); ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  </div>
                </div>

                <?php if(count($voucher)>0): ?>
                <div class="col-6 col-xl-6 d-block d-md-none d-lg-none d-xl-none">
                  <h4 class="font-weight-bold mb-3">Promo</h4>
                </div>
                <?php endif; ?>

                <div class="col-md-6">
                  <div class="my-class">
                  <?php if(count($voucher)>0): ?>
                  <?php $__currentLoopData = $voucher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="<?php echo e(url('belipaketktg')); ?>">
                    <div class="card mb-3">
                      <img class="rounded" src="<?php echo e(asset($key->gambar)); ?>" alt="" style="width:100%;height:187px;object-fit:cover">
                    </div>
                  </a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="row">
            <!-- <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php echo e(asset('image/global/dashboard.svg')); ?>" alt="Belajar">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          
          </div>
        </div>
        
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css"/> 
<script src='https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js'></script>

        <script>
          // Initialize tooltips
          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
          })

          $(document).ready(function() {
            $('.my-class').slick({
            infinite: true,
            slidesToShow: 1,
            dots: false,
            speed: 800,
            autoplay: true,  
            autoplaySpeed: 2000,
            easing: 'linear',
            arrows: false,
            fade: false,
            pauseOnHover: true, 
            swipe: true,
            });
          });
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/home/user.blade.php ENDPATH**/ ?>