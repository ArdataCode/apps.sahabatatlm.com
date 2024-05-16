
<!-- partial -->
<?php $__env->startSection('content'); ?>
<style>
  .modal-backdrop.show {
      opacity: 0.9;
  }
  .sesuai{
    color:#FBBF24;
  }
  .selesai{
    color:green;
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
              <li class="breadcrumb-item active" aria-current="page">Paket Saya</li>
              <li class="breadcrumb-item active" aria-current="page">Kerjakan Latihan <?php echo e($upaketsoalmst->judul); ?></li>
            </ol>
          </nav>
          <p class="card-description">
            <h3 class="font-weight-bold"><b>Latihan <?php echo e($upaketsoalmst->judul); ?></b></h3>
          </p>
          
          <?php if($upaketsoalmst->jenis_waktu==2): ?>
          <!-- Persesi -->
          <div class="row mt-3">
            <div class="col-xl-9 col-md-9 col-sm-9 col-xs-9">
            <div class="_soal_content tab-content" id="pills-tabContent">

              <?php
              $no = 1;
              $judulsesi = "Sesi";
             
                  $dataloop = $upaketsoalmst->u_paket_soal_ktg_aktif_r;
                  $dataloopessay = $upaketsoalmst->u_paket_soal_essay_ktg_aktif_r;
                  if(count($dataloop)>0){
                    $idktg = $dataloop[0]->id;
                    $selesai = $dataloop[0]->selesai;
                    $countdown = $dataloop[0]->countdown*1000;
                    $idupaketsoalktg = $dataloop[0]->id;
                    $tipe = "pilgan";
                  }else{
                    $idktg = $dataloopessay[0]->id;
                    $selesai = $dataloopessay[0]->selesai;
                    $countdown = $dataloopessay[0]->countdown*1000;
                    $idupaketsoalktg = $dataloopessay[0]->id;
                    $tipe = "essay";
                  }
                
             
                ?>
        
              <?php $__currentLoopData = $dataloop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $datakategori->u_paket_soal_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade <?php echo e($no==1 ? 'show active' : ''); ?>" id="pills-<?php echo e($key->id); ?>" role="tabpanel">
                    <div class="mb-3 p-3 card-border" style="border-radius: 10px;">
                      <h4 class="ktg-soal"><?php echo e($judulsesi); ?> <?php echo e($datakategori->judul); ?></h4>
                      <div class="row">
                        <div class="col-6">
                          <h4 class="mb-0 mt-2"><b>Soal No.<?php echo e($key->no_soal); ?> [Pilihan Ganda]</b></h4>
                        </div>
                        <div class="col-6">
                        </div>
                      </div>
                      <hr>
                      <div class="_soal"><?php echo $key->soal; ?></div>
                      <div class="form-group">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="a" <?php echo e($key->jawaban_user=="a" ? "checked='checked'" : ""); ?>>
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
                            <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="b" <?php echo e($key->jawaban_user=="b" ? "checked" : ""); ?>>
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
                            <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="c" <?php echo e($key->jawaban_user=="c" ? "checked" : ""); ?>>
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
                            <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="d" <?php echo e($key->jawaban_user=="d" ? "checked" : ""); ?>>
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
                            <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="e" <?php echo e($key->jawaban_user=="e" ? "checked" : ""); ?>>
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
                        <?php if($loop->parent->first && $loop->first): ?>
                        
                        <?php else: ?>
                        <button idsoal="<?php echo e($key->id - 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                          <i class="ti-back-left btn-icon-prepend"></i>                                                    
                          Sebelumnya
                        </button>
                        <?php endif; ?>
                      </span>

                      <span style="float:right;padding-bottom:30px">
                        <?php if($loop->parent->last && $loop->last): ?>
                        
                        <?php else: ?>
                        <button idsoal="<?php echo e($key->id + 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                          Selanjutnya
                          <i class="ti-back-right btn-icon-prepend"></i>                                                    
                        </button>
                        <?php endif; ?>
                      </span>
                    </div>
                </div>
                <?php
                  $no++;
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div> -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php if(count($dataloop)<=0): ?>
              <?php $__currentLoopData = $dataloopessay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $datakategori->u_paket_soal_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade <?php echo e($no==1 ? 'show active' : ''); ?>" id="pills-<?php echo e($key->id); ?>" role="tabpanel">
                    <!-- <h4 class="ktg-soal">Kategori <?php echo e($key->u_paket_soal_ktg_r->judul); ?></h4> -->
                    <!-- <h6><b>[<?php echo e($key->nama_tingkat); ?>]</b></h6> -->
                    <div class="mb-3 p-3 card-border" style="border-radius: 10px;">
                    <h4 class="ktg-soal"><?php echo e($judulsesi); ?> <?php echo e($datakategori->judul); ?></h4>

                      <div class="row">
                        <div class="col-6">
                          <h4 class="mb-0 mt-2"><b>Soal No.<?php echo e($key->no_soal); ?> [Essay]</b></h4>
                        </div>
                        <div class="col-6">
                        </div>
                      </div>
                      <hr>
                      <div class="_soal"><?php echo $key->soal; ?></div>
                      <br>
                      <div class="form-group">
                        <label><b>Jawaban :</b></label>
                        <textarea class="form-control _jawabessay" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" rows="10"><?php echo e($key->jawaban_user); ?></textarea>
                      </div>
                
                      <form method="post" id="formData_<?php echo e($key->no_soal); ?>" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <!-- Terakhir -->
                        <input type="hidden" name="idpaketdtl[]" value="<?php echo e($key->id); ?>">
                        <div class="form-group">
                          <label><b>Upload File Jawaban</b> (xls | xlsx | pdf | png | jpg | jpeg | mp4 | mp3) :</label>
                          <input type="file" name="jawabanessayfile[]" class="_jawabessayfile form-control-file" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>">
                        </div>
                      </form>
                      <div id="lihatfilejawaban_<?php echo e($key->no_soal); ?>">
                        <?php if($key->jawaban_userfile): ?>
                        <a target="_blank" href="<?php echo e(asset($key->jawaban_userfile)); ?>">Lihat File Jawaban Sebelumnya</a>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div style="padding-bottom:30px">
                      <span>
                        <?php if($loop->parent->first && $loop->first): ?>
                        
                        <?php else: ?>
                        <button idsoal="<?php echo e($key->id - 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                          <i class="ti-back-left btn-icon-prepend"></i>                                                    
                          Sebelumnya
                        </button>
                        <?php endif; ?>
                      </span>

                      <span style="float:right;padding-bottom:30px">
                        <?php if($loop->parent->last && $loop->last): ?>
                        
                        <?php else: ?>
                        <button idsoal="<?php echo e($key->id + 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                          Selanjutnya
                          <i class="ti-back-right btn-icon-prepend"></i>                                                    
                        </button>
                        <?php endif; ?>
                      </span>
                    </div>
                </div>
                <!-- <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div> -->
                <?php
                    $no++;
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div> -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

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
              <?php if(count($upaketsoalmst->u_paket_soal_ktg_nonaktif_r)>0 || count($upaketsoalmst->u_paket_soal_essay_ktg_nonaktif_r)>0 ): ?>
              <button type="button" data-bs-toggle="modal" data-bs-target="#modallanjutsesi" class="btn-block btn btn-primary btn-sm">
                <h6 class="mb-0">Lanjut Sesi</h6>
              </button>
              <?php else: ?>
              <button type="button" data-bs-toggle="modal" data-bs-target="#modalselesaiujian" class="btn-block btn btn-primary btn-sm">
                <h6 class="mb-0">Selesaikan Ujian</h6>
              </button>
              <?php endif; ?>
            </div>

            <div class="card-border p-3 br-10">
              <center class="mb-2"><?php echo e($judulsesi); ?></center>
              <div>
                <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_ktg_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyktg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h6 class='<?php echo e($keyktg->id==$idktg && $tipe=="pilgan" ? "sesuai" : ""); ?> <?php echo e($keyktg->is_mengerjakan==2 ? "selesai" : ""); ?>'><?php echo e($keyktg->judul); ?>

                  <?php if($keyktg->is_mengerjakan==2): ?>
                  <i class="fas fa-check"></i>
                  <?php endif; ?>
                </h6>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_essay_ktg_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyktg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h6 class='<?php echo e($keyktg->id==$idktg && $tipe=="essay" ? "sesuai" : ""); ?> <?php echo e($keyktg->is_mengerjakan==2 ? "selesai" : ""); ?>'><?php echo e($keyktg->judul); ?>

                  <?php if($keyktg->is_mengerjakan==2): ?>
                  <i class="fas fa-check"></i>
                  <?php endif; ?>
                </h6>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <br>
              <center class="mb-3">Nomor Soal</center>
              <ul class="_soal nav nav-pills mb-0" id="pills-tab" role="tablist">
                <?php
                  $no = 1;
                ?>
                <?php $__currentLoopData = $dataloop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $__currentLoopData = $datakategori->u_paket_soal_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1</button>
                  </li> -->
                  <li class="nav-item" role="presentation">
                    <button id="btn_no_soal_<?php echo e($key->id); ?>" class="btn-sm <?php echo e($key->jawaban_user ? '_ada_isi' : ''); ?> nav-link <?php echo e($no==1 ? 'active' : ''); ?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($key->id); ?>" type="button" role="tab" aria-selected="true"><?php echo e($key->no_soal); ?></button>
                  </li>
                  <?php
                    $no++;
                  ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(count($dataloop)<=0): ?>
                <?php $__currentLoopData = $dataloopessay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $datakategori->u_paket_soal_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1</button>
                  </li> -->
                  <li class="nav-item" role="presentation">
                    <button id="btn_no_soal_<?php echo e($key->id); ?>" class="btn-sm <?php echo e($key->jawaban_user || $key->jawaban_userfile ? '_ada_isi' : ''); ?> nav-link <?php echo e($no==1 ? 'active' : ''); ?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($key->id); ?>" type="button" role="tab" aria-selected="true"><?php echo e($key->no_soal); ?></button>
                  </li>
                  <?php
                    $no++;
                  ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

              </ul>
            </div>

            </div>
          </div>
          <?php else: ?>
          <!-- Perpaket -->
          <?php
              $idktg = 0;
              $dataloop = $upaketsoalmst->u_paket_soal_ktg_r;
              $dataloopessay = $upaketsoalmst->u_paket_soal_essay_ktg_r;
              $selesai = $upaketsoalmst->selesai;
              $countdown = 0;
              $judulsesi = "Kategori";
              $tipe = "";
          ?>
          <div class="row mt-3">
            <div class="col-xl-9 col-md-9 col-sm-9 col-xs-9">
            <div class="_soal_content tab-content" id="pills-tabContent">
              <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="tab-pane fade <?php echo e($key->no_soal==1 ? 'show active' : ''); ?>" id="pills-<?php echo e($key->no_soal); ?>" role="tabpanel">
                  <!-- <h4 class="ktg-soal">Kategori <?php echo e($key->u_paket_soal_ktg_r->judul); ?></h4> -->
                  <!-- <h6><b>[<?php echo e($key->nama_tingkat); ?>]</b></h6> -->
                  <div class="mb-3 p-3 card-border" style="border-radius: 10px;">
                    <div class="row">
                      <div class="col-6">
                        <h4 class="mb-0 mt-2"><b>Soal No.<?php echo e($key->no_soal); ?> [Pilihan Ganda]</b></h4>
                      </div>
                      <div class="col-6">
                      </div>
                    </div>
                    <hr>
                    <div class="_soal"><?php echo $key->soal; ?></div>
                    <div class="form-group">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="a" <?php echo e($key->jawaban_user=="a" ? "checked='checked'" : ""); ?>>
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
                          <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="b" <?php echo e($key->jawaban_user=="b" ? "checked" : ""); ?>>
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
                          <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="c" <?php echo e($key->jawaban_user=="c" ? "checked" : ""); ?>>
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
                          <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="d" <?php echo e($key->jawaban_user=="d" ? "checked" : ""); ?>>
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
                          <input type="radio" class="form-check-input _radio" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" name="radio_<?php echo e($key->id); ?>" value="e" <?php echo e($key->jawaban_user=="e" ? "checked" : ""); ?>>
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
                      <?php if($key->no_soal!=1): ?>
                      <button idsoal="<?php echo e($key->no_soal - 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                        <i class="ti-back-left btn-icon-prepend"></i>                                                    
                        Sebelumnya
                      </button>
                      <?php endif; ?>
                    </span>
                    <span style="float:right;padding-bottom:30px">
                      <?php if($key->no_soal!=$upaketsoalmst->total_soal): ?>
                      <button idsoal="<?php echo e($key->no_soal + 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                        Selanjutnya
                        <i class="ti-back-right btn-icon-prepend"></i>                                                    
                      </button>
                      <?php endif; ?>
                    </span>
                  </div>
              </div>
              <!-- <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div> -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


              <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_essay_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="tab-pane fade <?php echo e($key->no_soal==1 ? 'show active' : ''); ?>" id="pills-<?php echo e($key->no_soal); ?>" role="tabpanel">
                  <!-- <h4 class="ktg-soal">Kategori <?php echo e($key->u_paket_soal_ktg_r->judul); ?></h4> -->
                  <!-- <h6><b>[<?php echo e($key->nama_tingkat); ?>]</b></h6> -->
                  <div class="mb-3 p-3 card-border" style="border-radius: 10px;">
                    <div class="row">
                      <div class="col-6">
                        <h4 class="mb-0 mt-2"><b>Soal No.<?php echo e($key->no_soal); ?> [Essay]</b></h4>
                      </div>
                      <div class="col-6">
                      </div>
                    </div>
                    <hr>
                    <div class="_soal"><?php echo $key->soal; ?></div>
                    <br>
                    <div class="form-group">
                      <label><b>Jawaban :</b></label>
                      <textarea class="form-control _jawabessay" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>" rows="10"><?php echo e($key->jawaban_user); ?></textarea>
                    </div>
               
                    <form method="post" id="formData_<?php echo e($key->no_soal); ?>" class="form-horizontal">
                      <?php echo csrf_field(); ?>
                      <!-- Terakhir -->
                      <input type="hidden" name="idpaketdtl[]" value="<?php echo e($key->id); ?>">
                      <div class="form-group">
                        <label><b>Upload File Jawaban</b> (xls | xlsx | pdf | png | jpg | jpeg | mp4 | mp3) :</label>
                        <input type="file" name="jawabanessayfile[]" class="_jawabessayfile form-control-file" nosoal="<?php echo e($key->no_soal); ?>" idpaketdtl="<?php echo e($key->id); ?>">
                      </div>
                    </form>
                    <div id="lihatfilejawaban_<?php echo e($key->no_soal); ?>">
                      <?php if($key->jawaban_userfile): ?>
                      <a target="_blank" href="<?php echo e(asset($key->jawaban_userfile)); ?>">Lihat File Jawaban Sebelumnya</a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div style="padding-bottom:30px">
                    <span>
                      <?php if($key->no_soal!=1): ?>
                      
                      <button idsoal="<?php echo e($key->no_soal - 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
                        <i class="ti-back-left btn-icon-prepend"></i>                                                    
                        Sebelumnya
                      </button>
                      <?php endif; ?>
                    </span>
                    <span style="float:right;padding-bottom:30px">
                      <?php if($key->no_soal!=$upaketsoalmst->total_soal): ?>
                      <button idsoal="<?php echo e($key->no_soal + 1); ?>" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">
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
                  <button id="btn_no_soal_<?php echo e($key->no_soal); ?>" class="btn-sm <?php echo e($key->jawaban_user ? '_ada_isi' : ''); ?> nav-link <?php echo e($key->no_soal==1 ? 'active' : ''); ?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($key->no_soal); ?>" type="button" role="tab" aria-selected="true"><?php echo e($key->no_soal); ?></button>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $upaketsoalmst->u_paket_soal_essay_dtl_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1</button>
                </li> -->
                <li class="nav-item" role="presentation">
                  <button id="btn_no_soal_<?php echo e($key->no_soal); ?>" class="btn-sm <?php echo e($key->jawaban_user || $key->jawaban_userfile ? '_ada_isi' : ''); ?> nav-link <?php echo e($key->no_soal==1 ? 'active' : ''); ?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($key->no_soal); ?>" type="button" role="tab" aria-selected="true"><?php echo e($key->no_soal); ?></button>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>

            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if($upaketsoalmst->tryout!=1): ?>
  <?php if(count($upaketsoalmst->u_paket_soal_ktg_nonaktif_r)>0 || count($upaketsoalmst->u_paket_soal_essay_ktg_nonaktif_r)>0): ?>
    <div class="modal fade" id="modallanjutsesi">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <!-- <div class="modal-header">
            <h4 class="modal-title">Selesaikan Ujian?</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div> -->

          <!-- Modal body -->
          <div class="modal-body pb-0">
            <center style="font-size:18px"><i style="color:#106571" class="fa fa-check-square"></i> <span style="color:#106571" class="modal-title"><b>Selesaikan Sesi Sekarang?</b></span></center>
            <h5 class="mt-2"><center>Jawaban sesi yang telah diselesaikan tidak dapat diubah lagi!</center></h5>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer" style="display:block;text-align: center;border-top:0px solid">
            <button type="button" class="btn btn-primary" id="btn-lanjutsesi" upaketsoalmst="<?php echo e(Crypt::encrypt($upaketsoalmst->id)); ?>" upaketsoalktg="<?php echo e(Crypt::encrypt($idupaketsoalktg)); ?>">Lanjut Sesi</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          </div>

        </div>
      </div>
    </div>
  <?php else: ?>
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
          <h5 class="mt-2"><center>Jawaban yang telah disubmit tidak dapat diubah!</center></h5>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer" style="display:block;text-align: center;border-top:0px solid">
          <button type="button" class="btn btn-primary" id="btn-selesai" upaketsoalmst="<?php echo e(Crypt::encrypt($upaketsoalmst->id)); ?>">Submit</button>
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        </div>

      </div>
    </div>
  </div>
  <?php endif; ?>
<?php else: ?>
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
        <h5 class="mt-2"><center>Jawaban yang telah disubmit tidak dapat diubah!</center></h5>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="display:block;text-align: center;border-top:0px solid">
        <button type="button" class="btn btn-primary" id="btn-selesai" upaketsoalmst="<?php echo e(Crypt::encrypt($upaketsoalmst->id)); ?>">Submit</button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
      </div>

    </div>
  </div>
</div>
<?php endif; ?>




<div class="modal fade" id="modalwarninglock">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <!-- <div class="modal-header">
        <h4 class="modal-title">Selesaikan Ujian?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div> -->

      <!-- Modal body -->
      <div class="modal-body pb-0">
          <center class="mb-4"><i style="color: #FFC100;font-size: 50px;" class="fas fa-exclamation-triangle"></i></center>
          <center><h3>Persiapan Sesi Selanjutnya dalam</h3></center>
          <center class="mt-3">
            <div style="width:50%" class="btn btn-warning p-3">
              <h2 class="mb-0" id="waktuwarninglock"></h2>
            </div>
          </center>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="display:block;text-align: center;border-top:0px solid">
       
      </div>

    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<!-- jQuery -->
<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jquery-validation -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>

<script>
  // window.onbeforeunload = function() {
  //     return "Yakin ingin keluar dari halaman ini!";
  // };
  $(document).ready(function(){

      $('#modalwarninglock').modal({backdrop: 'static', keyboard: false}); 

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
          nosoal = $(this).attr('nosoal');
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo e(url('updatejawaban')); ?>",
                async: false,
                data: {
                  jawaban : jawaban,
                  idpaketdl : idpaketdl
                },
                beforeSend: function () {
                    // $.LoadingOverlay("show", {
                    //     image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
                    // });
                },
                success: function(response)
                {
                  if (response.status) {
                      if("<?php echo e($upaketsoalmst->jenis_waktu); ?>"==2){
                        $('#btn_no_soal_'+idpaketdl).addClass('_ada_isi');
                      }else{
                        $('#btn_no_soal_'+nosoal).addClass('_ada_isi');
                      }
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

      $(document).on('change', '._jawabessay', function (e) {
          jawaban = $(this).val();
          idpaketdl = $(this).attr('idpaketdtl');
          nosoal = $(this).attr('nosoal');
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo e(url('updatejawabanessay')); ?>",
                async: false,
                data: {
                  jawaban : jawaban,
                  idpaketdl : idpaketdl
                },
                beforeSend: function () {
                    // $.LoadingOverlay("show", {
                    //     image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
                    // });
                },
                success: function(response)
                {
                  if (response.status) {
                    if("<?php echo e($upaketsoalmst->jenis_waktu); ?>"==2){
                      if(jawaban==""){
                        $('#btn_no_soal_'+idpaketdl).removeClass('_ada_isi');
                      }else{
                        $('#btn_no_soal_'+idpaketdl).addClass('_ada_isi');
                      }
                    }else{
                      if(jawaban==""){
                        $('#btn_no_soal_'+nosoal).removeClass('_ada_isi');
                      }else{
                        $('#btn_no_soal_'+nosoal).addClass('_ada_isi');
                      }
                    }
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

      $(document).on('change', '._jawabessayfile', function (e) {
          // jawaban = $(this).val();
          idpaketdl = $(this).attr('idpaketdtl');
          nosoal = $(this).attr('nosoal');
          
          jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
              return !element.files[0] || (element.files[0].size <= limit);
          }, 'File is too big');

          $('#formData_'+nosoal).validate({
          rules: {
            'jawabanessayfile[]': {
              required: true,
              extension: "xls|xlsx|pdf|png|jpg|jpeg|mp4|mp3",
              fileSizeLimit: 5242880 // <- 5 MB
            }
          },
          messages: {
            'jawabanessayfile[]': {
              required: "File tidak boleh kosong",
              extension: "Ekstension file tidak sesuai",
              fileSizeLimit: "Max 5 MB"
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          },

          submitHandler: function () {
                var formData = new FormData($('#formData_'+nosoal)[0]);
                var url = "<?php echo e(url('updatejawabanessayfile')); ?>";
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
                      if (response.status) {
                        if("<?php echo e($upaketsoalmst->jenis_waktu); ?>"==2){
                          $('#btn_no_soal_'+idpaketdl).addClass('_ada_isi');
                        }else{
                          $('#btn_no_soal_'+nosoal).addClass('_ada_isi');
                        }
                        Swal.fire({
                            html: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $("#lihatfilejawaban_"+nosoal).html('<a target="_blank" href="'+response.link+'">Lihat File</a>')
                        // console.log(response.link);
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
            }
          });

          $('#formData_'+nosoal).submit();

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
                      document.getElementById("end").innerHTML = "UJIAN SELESAI!!";
                        Swal.fire({
                            html: response.message,
                            icon: 'success',
                            showConfirmButton: true
                        }).then((result) => {
                            $.LoadingOverlay("show", {
                              image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
                            });
                            reload_url(1500,response.menu);
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
      });

         // Lanjut Sesi
         $(document).on('click', '#btn-lanjutsesi', function (e) {
          document.getElementById("end").innerHTML = "SESI SELESAI!!";

          idpaketmst = $('#btn-lanjutsesi').attr('upaketsoalmst');
          idupaketsoalktg = $('#btn-lanjutsesi').attr('upaketsoalktg');
          tipe = "<?php echo e($tipe); ?>";
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo e(url('lanjutsesi')); ?>",
                async: false,
                data: {
                  idpaketmst : idpaketmst,
                  idupaketsoalktg : idupaketsoalktg,
                  tipe : tipe
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
                          title: "Sesi Selesai!",
                          html: "Halaman akan diarahakan kesesi selanjutnya...",
                          icon: 'success',
                          showConfirmButton: false
                      })
                      reload(1500 );
                      // let timerInterval
                      //   Swal.fire({
                      //     icon: 'success',
                      //     title: "Sesi Selesai!",
                      //     html: response.message+'<br>Persiapan dalam <b></b>...',
                      //     timer: "<?php echo e($countdown); ?>",
                      //     timerProgressBar: true,
                      //     didOpen: () => {
                      //       Swal.showLoading()
                      //       const b = Swal.getHtmlContainer().querySelector('b')
                      //       timerInterval = setInterval(() => {
                      //         b.textContent = Swal.getTimerLeft()
                      //       }, 100)
                      //     },
                      //     willClose: () => {
                      //       clearInterval(timerInterval)
                      //     }
                      //   }).then((result) => {
                      
                      //     if (result.dismiss === Swal.DismissReason.timer) {
                      //       reload(0);
                      //     }
                      //     reload(0);
                      // });

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

      // COUNDOWN
      // The data/time we want to countdown to
      var countDownDate = new Date("<?php echo e($selesai); ?>").getTime();

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
          
      if("<?php echo e(count($upaketsoalmst->u_paket_soal_ktg_nonaktif_r)); ?>">0 || "<?php echo e(count($upaketsoalmst->u_paket_soal_essay_ktg_nonaktif_r)); ?>">0){
        if(timeleft<"<?php echo e($countdown); ?>"){
          if(timeleft<=0){
            sisawaktu = 0;
          }else{
            sisawaktu = timeleft;
          }
          $('#modalwarninglock').modal('show');
          $('#waktuwarninglock').html(sisawaktu/1000+" Detik");
        }
      }

      // Display the message when countdown is over
      if (timeleft < 0) {
          clearInterval(myfunc);
          // document.getElementById("days").innerHTML = ""
          // document.getElementById("hours").innerHTML = "" 
          // document.getElementById("mins").innerHTML = ""
          // document.getElementById("secs").innerHTML = ""

          if("<?php echo e(count($upaketsoalmst->u_paket_soal_ktg_nonaktif_r)); ?>">0 || "<?php echo e(count($upaketsoalmst->u_paket_soal_essay_ktg_nonaktif_r)); ?>">0){
            
            document.getElementById("end").innerHTML = "SESI SELESAI!!";

            idpaketmst = $('#btn-lanjutsesi').attr('upaketsoalmst');
            idupaketsoalktg = $('#btn-lanjutsesi').attr('upaketsoalktg');
            tipe = "<?php echo e($tipe); ?>";

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: "<?php echo e(url('lanjutsesi')); ?>",
                  async: false,
                  data: {
                    idpaketmst : idpaketmst,
                    idupaketsoalktg : idupaketsoalktg,
                    tipe : tipe
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
                        reload(0);
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

          }else{

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
                        reload_url(1500,response.menu);
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

          }

        }
      }, 1000);
      // END COUNDOWN
  });
</script>
<!-- Loading Overlay -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/user/ujian.blade.php ENDPATH**/ ?>