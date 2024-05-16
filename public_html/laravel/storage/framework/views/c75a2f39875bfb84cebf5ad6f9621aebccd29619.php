
<!-- partial -->
<?php $__env->startSection('content'); ?>
<script src="https://kit.fontawesome.com/f121295e13.js" crossorigin="anonymous"></script>

<style>
  .form-check .form-check-label input[type="radio"] + .input-helper:before {
    cursor: unset;
  }
  .btn-tab{
    border: 1px solid transparent !important;
    color: #686868;
  }
  .btn-tab.active{
    border: 1px solid transparent !important;
    color: #106571 !important;
    background-color:transparent !important;
  }
  .btn-tab:hover{
    border: 1px solid transparent !important;
    color: #106571 !important;
    background-color:transparent !important;
  }
  .btn-tab:focus{
    box-shadow:unset !important;
  }
</style>
<?php
if(app('request')->input('tab')){
  $tab = app('request')->input('tab');
}else{
  $tab = "statistik";
}
?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card card-border">
        <div class="card-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Paket Saya</li>
              <li class="breadcrumb-item active" aria-current="page">Hasil & Pembahasan</li>
            </ol>
          </nav>
          <p class="card-description">
            <h3 class="font-weight-bold"><b>Detail Hasil Latihan</b></h3>
            <div class="row">
              <div class="col-12 col-md-3 col-lg-3">
                <table class="table table-borderless">
                <thead>
                  <tr>
                    <th class="pb-0" style="padding-left:0px">Latihan</th>
                    <th class="pb-0"><?php echo e($upaketsoalmst->judul); ?></th>
                  </tr>
                  <tr>
                    <th style="padding-left:0px">Nama</th>
                    <th><?php echo e(Auth::user()->name); ?></th>
                  </tr>
                </thead>
              </table>
              </div>
              <div class="col-12">
                <ul class="pb-0 nav nav-pills btn-menu-paket" role="tablist">
                  <li class="nav-item">
                    <a style="padding-left:0px !important" class="btn btn-sm btn-primary nav-link btn-tab-hasil btn-tab <?php echo e($tab == 'statistik' ? 'active' : ''); ?>" data-toggle="pill" href="#statistik"><i class="fas fa-chart-pie"></i> Hasil</a>
                  </li>
                  <li class="nav-item">
                    <a style="padding-left:0px !important" class="btn btn-sm btn-primary nav-link btn-tab-hasil btn-tab <?php echo e($tab == 'pembahasan' ? 'active' : ''); ?>" data-toggle="pill" href="#pembahasan"><i class="fa fa-list-alt"></i> Pembahasan</a>
                  </li>
                </ul>
                <div class="tab-content tab-hasil-ujian">
                  <div id="statistik" class="tab-pane <?php echo e($tab == 'statistik' ? 'active' : ''); ?>"><br>
                      <div class="row">
                        <div class="col-12 col-md-2 col-lg-2">
                            
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="p-4 card-border" style="text-align:center;border-radius:10px">
                              <?php  
                                $getpoint = App\Models\UPaketSoalDtl::select('max_point')->where('fk_u_paket_soal_mst',$upaketsoalmst->id)->sum('max_point');
                              ?>
                              <h4>SKOR AKHIR</h4>
                              <?php if(count($upaketsoalmst->u_paket_soal_essay_dtl_r)>0): ?>
                                <?php if($upaketsoalmst->status==0): ?>
                                    <center><span class="text-danger">MENUNGGU PENILAIAN ESSAY</span></center>
                                <?php else: ?>
                                    <div>
                                      <span style="font-size:36px;color:#4F46E5"><?php echo e($upaketsoalmst->set_nilai<=0 ? 0 : $upaketsoalmst->set_nilai); ?></span>
                                      <h5>Dari <?php echo e($getpoint); ?></h5> 
                                    </div>
                                <?php endif; ?>
                              <?php else: ?>
                                  <div>
                                    <span style="font-size:36px;color:#4F46E5"><?php echo e($upaketsoalmst->set_nilai<=0 ? 0 : $upaketsoalmst->set_nilai); ?></span>
                                    <h5>Dari <?php echo e($getpoint); ?></h5>
                                  </div>
                              <?php endif; ?>

                              <?php if($upaketsoalmst->kkm): ?>
                                <h6 class="mt-5">Keterangan</h6>
                                <?php if($upaketsoalmst->point < $upaketsoalmst->kkm): ?>
                                  <div class="badge badge-danger badge-pill"><h5 class="mb-0 p-1">Tidak Lulus</h5></div>
                                <?php else: ?>
                                  <div class="badge badge-success badge-pill"><h5 class="mb-0 p-1">Lulus</h5></div>
                                <?php endif; ?>
                              <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="p-4 card-border" style="text-align:center;border-radius:10px">
                                <h4><b>Hasil</b></h4>
                                <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_ktg_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataktg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h6><?php echo e($dataktg->judul); ?> : <?php echo e($dataktg->point); ?></h6>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <h4 class="mt-3"><b>Passing Grade</b></h4>
                                <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_ktg_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataktg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h6><?php echo e($dataktg->judul); ?> : <?php echo e($dataktg->kkm); ?></h6>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                      </div>
                  </div>
                  <div id="pembahasan" class="tab-pane <?php echo e($tab == 'pembahasan' ? 'active' : ''); ?>"><br>
                  <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9 col-xs-9">
                    <div class="_soal_content tab-content" id="pills-tabContent">
                      <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="tab-pane-soal tab-pane fade <?php echo e($key->no_soal==1 ? 'show active' : ''); ?>" id="pills-<?php echo e($key->no_soal); ?>" role="tabpanel">
                          <!-- <h4 class="ktg-soal">Kategori <?php echo e($key->u_paket_soal_ktg_r->judul); ?></h4> -->
                          <!-- <h6><b>[<?php echo e($key->nama_tingkat); ?>]</b></h6> -->
                          <div class="mb-3 p-3 card-border" style="border-radius: 10px;"> 
                          <div class="row">
                            <div class="col-6">
                              <h4 class="mb-0 mt-0"><b>Soal No.<?php echo e($key->no_soal); ?></b> 
                              <?php if($upaketsoalmst->bagi_jawaban==1): ?>
                                <?php if($key->jawaban_user): ?>
                                    <?php if($key->jawaban_user==$key->jawaban): ?>
                                      <!-- <span class="badge badge-outline-success">Benar</span> -->
                                    <?php else: ?>
                                      <!-- <span class="badge badge-outline-danger">Salah</span> -->
                                    <?php endif; ?>
                                <?php else: ?>
                                  <!-- <span class="badge badge-outline-secondary">Kosong</span> -->
                                <?php endif; ?>
                              <?php endif; ?>
                              </h4>
                            </div>
                            <div class="col-6 text-right font-italic">
                              Kategori <?php echo e($key->u_paket_soal_ktg_r->judul); ?> [Pilihan Ganda]
                            </div>
                          </div>
                          <hr>
                          <div class="_soal"><?php echo $key->soal; ?></div>

                          <div class="form-group">
                            <?php if($upaketsoalmst->jenis_penilaian==1): ?>
                            <div class="form-check 
                              <?php if($upaketsoalmst->bagi_jawaban==1): ?>
                              <?php echo e($key->jawaban=='a' ? '_form-check-success' : '_form-check-danger'); ?> 
                              <?php else: ?>
                              _form-check-hitam
                              <?php endif; ?>
                              <?php echo e($key->jawaban_user=='a' ? '_form-check-user' : ''); ?>">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input _radio" disabled idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="a">
                                <i class="input-helper"></i></label>
                                <div class="_pilihan">
                                  <span><b>a.</b> </span>
                                  <div class="_pilihan_isi">
                                    <?php echo $key->a; ?>

                                  </div>
                                </div>
                            </div>
                            <div class="form-check 
                              <?php if($upaketsoalmst->bagi_jawaban==1): ?>
                              <?php echo e($key->jawaban=='b' ? '_form-check-success' : '_form-check-danger'); ?> 
                              <?php else: ?>
                              _form-check-hitam
                              <?php endif; ?>
                               <?php echo e($key->jawaban_user=='b' ? '_form-check-user' : ''); ?>">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input _radio" disabled idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="b">
                                <i class="input-helper"></i></label>
                                <div class="_pilihan">
                                  <span><b>b.</b> </span>
                                  <div class="_pilihan_isi">
                                    <?php echo $key->b; ?>

                                  </div>
                                </div>
                            </div>
                            <?php if($key->c): ?>
                            <div class="form-check 
                              <?php if($upaketsoalmst->bagi_jawaban==1): ?>
                              <?php echo e($key->jawaban=='c' ? '_form-check-success' : '_form-check-danger'); ?> 
                              <?php else: ?>
                              _form-check-hitam
                              <?php endif; ?>
                              <?php echo e($key->jawaban_user=='c' ? '_form-check-user' : ''); ?>">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input _radio" disabled idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="c">
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
                            <div class="form-check
                              <?php if($upaketsoalmst->bagi_jawaban==1): ?>
                              <?php echo e($key->jawaban=='d' ? '_form-check-success' : '_form-check-danger'); ?> 
                              <?php else: ?>
                              _form-check-hitam
                              <?php endif; ?>
                              <?php echo e($key->jawaban_user=='d' ? '_form-check-user' : ''); ?>">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input _radio" disabled idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="d">
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
                            <div class="form-check
                              <?php if($upaketsoalmst->bagi_jawaban==1): ?>
                              <?php echo e($key->jawaban=='e' ? '_form-check-success' : '_form-check-danger'); ?> 
                              <?php else: ?>
                              _form-check-hitam
                              <?php endif; ?>
                              <?php echo e($key->jawaban_user=='e' ? '_form-check-user' : ''); ?>">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input _radio" disabled idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="e">
                                <i class="input-helper"></i></label>
                                <div class="_pilihan">
                                  <span><b>e.</b> </span>
                                  <div class="_pilihan_isi">
                                    <?php echo $key->e; ?>

                                  </div>
                                </div>
                            </div>
                            <?php endif; ?>  
                          <?php endif; ?>
                          </div>
                          <!-- <hr> -->
                          <?php if($upaketsoalmst->bagi_jawaban==1): ?>
                          <h5><b>Jawaban</b> : <?php echo e($key->jawaban_user ? strtoupper($key->jawaban_user) : '-'); ?></h5>
                          <hr>
                          <h5><b>Kunci Jawaban</b> : <?php echo e(strtoupper($key->jawaban)); ?></h5>
                          <br>
                          <h5><b>Pembahasan</b> : <br><br><?php echo $key->pembahasan; ?></h5>
                          <?php endif; ?>
                          </div>

                          <div class="row mb-3">
                            <div class="col-6" style="text-align:right">
                              <span>
                                <?php if($key->no_soal!=1): ?>
                                <button idsoal="<?php echo e($key->no_soal - 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                                  <i class="fa fa-long-arrow-left"></i>                                                    
                                  Sebelumnya
                                </button>
                                <?php endif; ?>
                              </span>
                            </div>
                            <div class="col-6">
                              <span>
                                <?php if($key->no_soal!=$upaketsoalmst->total_soal): ?>
                                <button idsoal="<?php echo e($key->no_soal + 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                                  Selanjutnya
                                  <i class="fa fa-long-arrow-right"></i>                                                    
                                </button>
                                <?php endif; ?>
                              </span>
                            </div>
                          </div>

                      </div>
                      <!-- <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div> -->
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                      <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_essay_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="tab-pane-soal tab-pane fade <?php echo e($key->no_soal==1 ? 'show active' : ''); ?>" id="pills-<?php echo e($key->no_soal); ?>" role="tabpanel">
                          <!-- <h4 class="ktg-soal">Kategori <?php echo e($key->u_paket_soal_ktg_r->judul); ?></h4> -->
                          <!-- <h6><b>[<?php echo e($key->nama_tingkat); ?>]</b></h6> -->
                          <div class="mb-3 p-3 card-border" style="border-radius: 10px;"> 
                          <div class="row">
                            <div class="col-6">
                              <h4 class="mb-0 mt-0"><b>Soal No.<?php echo e($key->no_soal); ?></b> 
                              </h4>
                            </div>
                            <div class="col-6 text-right font-italic">
                              Kategori <?php echo e($key->u_paket_soal_ktg_r->judul); ?> [Essay]
                            </div>
                          </div>
                          <hr>
                          <div class="_soal"><?php echo $key->soal; ?></div>
                          <div>
                            <br>
                            <h6><b>Jawaban:</b></h6>
                            <?php echo $key->jawaban_user; ?>

                          </div>
                          <div>
                            <?php if($key->jawaban_userfile): ?>
                            <br>
                            <h6><b>File Jawaban:</b></h6>
                            <a href="<?php echo e(asset($key->jawaban_userfile)); ?>">File Jawaban</a>
                            <?php endif; ?>
                          </div>
                          <?php if($upaketsoalmst->bagi_jawaban==1): ?>
                            <?php if(count($upaketsoalmst->u_paket_soal_essay_dtl_r)>0): ?>
                              <?php if($upaketsoalmst->status==1): ?>
                              <hr>
                              <h5><b>Pembahasan</b> : <br><?php echo $key->jawaban; ?></h5>
                              <?php endif; ?>
                            <?php else: ?>
                              <hr>
                              <h5><b>Pembahasan</b> : <br><?php echo $key->jawaban; ?></h5>
                            <?php endif; ?>
                          <?php endif; ?>
                          </div>

                          <div class="row mb-3">
                            <div class="col-6" style="text-align:right">
                              <span>
                                <?php if($key->no_soal!=1): ?>
                                <button idsoal="<?php echo e($key->no_soal - 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                                  <i class="fa fa-long-arrow-left"></i>                                                    
                                  Sebelumnya
                                </button>
                                <?php endif; ?>
                              </span>
                            </div>
                            <div class="col-6">
                              <span>
                                <?php if($key->no_soal!=$upaketsoalmst->total_soal): ?>
                                <button idsoal="<?php echo e($key->no_soal + 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                                  Selanjutnya
                                  <i class="fa fa-long-arrow-right"></i>                                                    
                                </button>
                                <?php endif; ?>
                              </span>
                            </div>
                          </div>

                      </div>
                      <!-- <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div> -->
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                      </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-3 col-xs-3">
                      <div class="card-border p-3 br-10">
                        <center class="mb-3">Nomor Soal</center>
                        <?php if($upaketsoalmst->bagi_jawaban==1): ?>
                        <div class="row mb-2">
                          <div class="col-sm-4 col-md-4 col-lg-4" style="padding-right:2.5px;"><i style="font-size:18px;color:#a3a4a5" class="fa fa-square"></i> <span style="font-size:12px;">Kosong</span></div>
                          <div class="col-sm-4 col-md-4 col-lg-4" style="padding-right:2.5px;"><i style="font-size:18px;color:#63bb64" class="fa fa-square"></i> <span style="font-size:12px;">Benar</span></div>
                          <div class="col-sm-4 col-md-4 col-lg-4" style="padding-right:2.5px;"><i style="font-size:18px;color:#FF4747" class="fa fa-square"></i> <span style="font-size:12px;">Salah</span></div>
                        </div>
                        <?php endif; ?>
                        <ul class="_soal nav nav-pills mb-0" id="pills-tab" role="tablist">
                          <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <!-- <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1</button>
                          </li> -->
                          <li class="nav-item" role="presentation">
                            <button id="btn_no_soal_<?php echo e($key->no_soal); ?>" class="
                            <?php if($key->jawaban_user && $upaketsoalmst->bagi_jawaban==1): ?> 
                                <?php if($key->jawaban==$key->jawaban_user): ?>
                                    _benar
                                <?php else: ?>
                                    _salah
                                <?php endif; ?>
                            <?php else: ?>
                                _kosong
                            <?php endif; ?>
                            nav-link nav-link-soal <?php echo e($key->no_soal==1 ? 'active' : ''); ?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($key->no_soal); ?>" type="button" role="tab" aria-selected="true"><?php echo e($key->no_soal); ?></button>
                          </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_essay_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <!-- <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1</button>
                          </li> -->
                          <li class="nav-item" role="presentation">
                            <button id="btn_no_soal_<?php echo e($key->no_soal); ?>" class="_kosong nav-link nav-link-soal <?php echo e($key->no_soal==1 ? 'active' : ''); ?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($key->no_soal); ?>" type="button" role="tab" aria-selected="true"><?php echo e($key->no_soal); ?></button>
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
          </p>
        </div>
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
  $(document).ready(function(){
    $(document).on('click', '.btn-next-back', function (e) {
          idsoal = $(this).attr('idsoal');
          $('.tab-pane-soal').removeClass('show active');
          $('.nav-link-soal').removeClass('active');

          $('#pills-'+idsoal).addClass('show active');
          $('#btn_no_soal_'+idsoal).addClass('active');
      });
  });
</script>
<!-- Loading Overlay -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make($extend, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/sahabatatlm.com/public_html/laravel/resources/views/user/detailhasil.blade.php ENDPATH**/ ?>