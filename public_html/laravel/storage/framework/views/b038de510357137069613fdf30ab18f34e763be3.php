

<?php $__env->startSection('header'); ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/dist/css/adminlte.min.css')); ?>">
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader'); ?>
<h1 class="m-0">Paket Latihan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
<ol class="breadcrumb float-sm-right">
    <!-- <li class="breadcrumb-item">Master</li> -->
    <li class="breadcrumb-item active">Paket Latihan</li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <span data-toggle="tooltip" data-placement="left" title="Tambah Data">
                <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-sm btn-primary btn-add-absolute">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
              </span>
              <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->
                <table id="tabledata" class="table  table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Jenis</th>
                    <th>Waktu Pengerjaan</th>
                    <th>Total Soal</th>
                    <!-- <th>Passing Grade</th> -->
                    <th>Detail</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td width="1%"><?php echo e($loop->iteration); ?></td>
                    <td width="20%"><?php echo e($key->judul); ?></td>
                    <td width="5%" class="_align_center"><?php echo e(jenissoalpilgan($key->tryout)); ?></td>
                    <td width="1%" class="_align_center">
                      <span style="white-space:nowrap"><?php echo e($key->waktu); ?> Menit</span><br>
                      <span style="white-space:nowrap"><?php echo e($key->tryout!=1 ? $key->jenis_waktu==1 ? "(Perpaket)" : "(Persesi)" : ""); ?></span>
                    </td>
                    <?php
                      $jumlahsoalpilgan = App\Models\PaketSoalDtl::where('fk_paket_soal_mst',$key->id)->get();
                      $jumlahsoalessay = App\Models\PaketSoalEssayDtl::where('fk_paket_soal_mst',$key->id)->get();
                      
                      if($jumlahsoalpilgan){
                        $jumlahsoalpilgan = count($jumlahsoalpilgan);
                      }else{
                        $jumlahsoalpilgan = 0;
                      }
                      
                      if($jumlahsoalessay){
                        $jumlahsoalessay = count($jumlahsoalessay);
                      }else{
                        $jumlahsoalessay = 0;
                      }
                    ?>
                    <td width="1%" class="_align_center">
                      <span style="white-space:nowrap"><?php echo e($jumlahsoalpilgan); ?> Pilihan Ganda</span><br>
                      <span style="white-space:nowrap"><?php echo e($jumlahsoalessay); ?> Essay</span>
                    </td>
                    <!-- <td width="1%" class="_align_center"><?php echo e($key->kkm); ?></td> -->
                    <!-- <td><?php echo e($key->ket); ?></td> -->
                    <td width="1%" class="_align_center">
                      <div class="btn-group">
                       
                     
                        <span data-toggle="tooltip" data-placement="left" title="Soal Pilihan Ganda [Kategori]">
                          <a href="<?php echo e(url('paketsoalktg')); ?>/<?php echo e($key->id); ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-book"></i></a>
                        </span>
                       <!--  <span data-toggle="tooltip" data-placement="left" title="Soal Essay [Kategori]">
                          <a href="<?php echo e(url('paketsoalessayktg')); ?>/<?php echo e($key->id); ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-book"></i></a>
                        </span>-->
                        
                        <span data-toggle="tooltip" data-placement="left" title="Download Soal">
                          <a target="_blank" href="<?php echo e(url('exportsoal/pilgan')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>" class="btn btn-sm btn-outline-success"><i class="fas fa-download"></i></a>
                        </span>
                        <span data-toggle="tooltip" data-placement="left" title="Nilai & Ranking Peserta">
                          <a href="<?php echo e(url('rankingpeserta')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>" class="btn btn-sm btn-outline-info"><i class="fas fa-trophy"></i></a>
                        </span>
                      </div>
                    </td>
                    <td width="1%" class="_align_center">
                      <div class="btn-group">
                        <span data-toggle="tooltip" data-placement="left" title="Ubah Data">
                          <button data-toggle="modal" data-target="#modal-edit-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                        </span>
                        <?php
                          $cekdata = App\Models\PaketDtl::where('fk_mapel_mst',$key->id)->where('jenis',1)->get();
                        ?>
                        <?php if(count($cekdata)<=0): ?>
                        <span data-toggle="tooltip" data-placement="left" title="Hapus Data">
                          <button data-toggle="modal" data-target="#modal-hapus-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                        </span>
                        <?php else: ?>
                          <span data-toggle="tooltip" data-placement="left" title="Harap hapus data pada paket terlebih dahulu">
                            <button type="button" class="btn btn-sm btn-outline-danger disabled"><i class="far fa-trash-alt"></i></button>
                          </span>
                        <?php endif; ?>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                   
    <!-- Modal Edit -->
    <div class="modal fade" id="modal-edit-<?php echo e($key->id); ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" id="formData_<?php echo e($key->id); ?>" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
              <!-- <div class="card-body"> -->
                <div class="form-group">
                    <label for="judul_<?php echo e($key->id); ?>">Judul<span class="bintang">*</span></label>
                    <input type="text" class="form-control" id="judul_<?php echo e($key->id); ?>" name="judul[]" placeholder="Judul" value="<?php echo e($key->judul); ?>">
                </div>

                <div class="form-group">
                    <label for="tryout_<?php echo e($key->id); ?>">Jenis Paket</label>
                    <select name="tryout[]" id="tryout_<?php echo e($key->id); ?>" class="jenistryout form-control" idwaktu="<?php echo e($key->id); ?>">
                      <option value="2" <?php echo e($key->tryout==2 ? "selected" : ""); ?>>Gratis</option>
                      <option value="0" <?php echo e($key->tryout==0 ? "selected" : ""); ?>>Berbayar</option>
                      <option value="1" <?php echo e($key->tryout==1 ? "selected" : ""); ?>>Tryout Akbar</option>
                    </select>
                </div>

                <div class="jenis_waktu_<?php echo e($key->id); ?> <?php echo e($key->tryout==1 ? 'hide' : ''); ?> form-group">
                    <label for="jenis_waktu_<?php echo e($key->id); ?>">Jenis Waktu</label>
                    <select name="jenis_waktu[]" id="jenis_waktu_<?php echo e($key->id); ?>" class="jeniswaktu form-control" idwaktu="<?php echo e($key->id); ?>">
                      <option value="1" <?php echo e($key->jenis_waktu==1 ? "selected" : ""); ?>>Perpaket</option>
                      <option value="2" <?php echo e($key->jenis_waktu==2 ? "selected" : ""); ?>>Persesi</option>
                    </select>
                </div>

                <div class="waktu_pengerjaan_<?php echo e($key->id); ?> <?php echo e($key->tryout==1 ? 'hide' : ''); ?> <?php echo e($key->jenis_waktu==2 ? 'hide' : ''); ?>">
                  <div class="form-group">
                      <label for="waktu_<?php echo e($key->id); ?>">Waktu Pengerjaan (Menit)<span class="bintang">*</span></label>
                      <input type="text" class="form-control int" id="waktu_<?php echo e($key->id); ?>" name="waktu[]" placeholder="Waktu" value="<?php echo e($key->waktu); ?>">
                  </div>
                </div>

                <div class="waktu_tryout_<?php echo e($key->id); ?> <?php echo e($key->tryout==1 ? '' : 'hide'); ?>">
                  <label>Waktu<span class="bintang">*</span></label>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <input value="<?php echo e(datetimeedit($key->mulai)); ?>" type="text" class="form-control waktu" name="mulai[]" id="mulai_<?php echo e($key->id); ?>" placeholder="Mulai"> 
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input value="<?php echo e(datetimeedit($key->selesai)); ?>" type="text" class="form-control waktu" name="selesai[]" id="selesai_<?php echo e($key->id); ?>" placeholder="Selesai"> 
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="form-group">
                    <label for="kkm_<?php echo e($key->id); ?>">Passing Grade <span class="bintang">(Optional)</span></label>
                    <input type="text" class="form-control int" id="kkm_<?php echo e($key->id); ?>" name="kkm[]" placeholder="Passing Grade" value="<?php echo e($key->kkm); ?>">
                </div>
                <div class="form-group">
                  <label>Banner <span class="input-keterangan">(jpg/jpeg/png)</span></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="input-foto custom-file-input" id="banner_<?php echo e($key->id); ?>" name="banner[]" idlabel="label-banner-<?php echo e($key->id); ?>">
                      <label id="label-banner-<?php echo e($key->id); ?>" class="custom-file-label" style="border-radius: .25rem;">Pilih file</label>
                    </div>
                  </div> 
                </div>
                <div class="form-group">
                  <label>Acak Soal<span class="bintang">*</span></label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="acak_soal[]" value="1" <?php echo e($key->acak_soal==1 ? "checked" : ""); ?>>
                    <label class="form-check-label">Ya</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="acak_soal[]" value="0" <?php echo e($key->acak_soal==0 ? "checked" : ""); ?>>
                    <label class="form-check-label">Tidak</label>
                  </div>
                  <br>
                </div>
                <div class="form-group">
                  <label>Bagi Kunci Jawaban & Pembahasan<span class="bintang">*</span></label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bagi_jawaban[]" value="1" <?php echo e($key->bagi_jawaban==1 ? "checked" : ""); ?>>
                    <label class="form-check-label">Bagi</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bagi_jawaban[]" value="0" <?php echo e($key->bagi_jawaban==0 ? "checked" : ""); ?>>
                    <label class="form-check-label">Jangan Bagi</label>
                  </div>
                  <br>
                </div>

                <!-- <div class="form-group">
                  <label>Sertifikat & Piagam<span class="bintang">*</span></label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sertifikat[]" value="1" <?php echo e($key->sertifikat==1 ? "checked" : ""); ?>>
                    <label class="form-check-label">Ada</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sertifikat[]" value="0" <?php echo e($key->sertifikat==0 ? "checked" : ""); ?>>
                    <label class="form-check-label">Tidak Ada</label>
                  </div>
                  <br>
                </div> -->

                <!-- <div class="form-group">
                    <label for="pengumuman">Pengumuman</label>
                    <textarea name="pengumuman[]" id="pengumuman" rows="5" class="form-control content_" placeholder="Pengumuman"><?php echo $key->pengumuman; ?></textarea>  
                </div>  -->

                <div class="form-group">
                    <label for="ket_<?php echo e($key->id); ?>">Keterangan</label>
                    <textarea name="ket[]" id="ket_<?php echo e($key->id); ?>" rows="5" class="form-control content_" placeholder="Keterangan"><?php echo e($key->ket); ?></textarea>  
                </div>  
                
              

               
                <!-- /.form-group -->
              <!-- </div> -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>
                <button type="submit" class="btn btn-danger btn-submit-data" idform="<?php echo e($key->id); ?>">Simpan</button>
            </div>
          </form>
        </div>
      <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit -->

    <!-- Modal Hapus -->
    <div class="modal fade" id="modal-hapus-<?php echo e($key->id); ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" id="formHapus_<?php echo e($key->id); ?>" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <h6> Apakah anda ingin menghapus paket latihan <?php echo e($key->judul); ?>?</h6>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger btn-hapus" idform="<?php echo e($key->id); ?>">Hapus</button>
            </div>
          </form>
        </div>
      <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal Hapus -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="_formData" class="form-horizontal">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
              <!-- <div class="card-body"> -->
              <div class="form-group">
                <label for="judul_add">Judul<span class="bintang">*</span></label>
                <input type="text" class="form-control" id="judul_add" name="judul_add" placeholder="Judul">
              </div>

              <div class="form-group">
                  <label for="tryout_add">Jenis Paket</label>
                  <select name="tryout_add" id="tryout_add" class="jenistryout form-control" idwaktu="add">
                    <option value=""></option>
                    <!-- <option value="2">Gratis</option> -->
                    <option value="0">Berbayar</option>
                    <option value="1">Tryout Akbar</option>
                  </select>
              </div>

              <div class="jenis_waktu_add hide form-group">
                  <label for="jenis_waktu_add">Jenis Waktu</label>
                  <select name="jenis_waktu_add" id="jenis_waktu_add" class="jeniswaktu form-control" idwaktu="add">
                    <option value=""></option>
                    <option value="1">Perpaket</option>
                    <option value="2">Persesi</option>
                  </select>
              </div>

              <div class="waktu_tryout_add hide">
                <label>Waktu<span class="bintang">*</span></label>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <input type="text" class="form-control waktu" name="mulai_add" id="mulai_add" placeholder="Mulai"> 
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <input type="text" class="form-control waktu" name="selesai_add" id="selesai_add" placeholder="Selesai"> 
                    </div>
                  </div>
                </div>
              </div>

              <div class="waktu_pengerjaan_add hide">
                <div class="form-group">
                  <label for="waktu_add">Waktu Pengerjaan (Menit)<span class="bintang">*</span></label>
                  <input type="text" class="form-control int" id="waktu_add" name="waktu_add" placeholder="Waktu" value="0">
                </div>
              </div>
              
              <div class="form-group">
                <label for="kkm_add">Passing Grade <span class="bintang">(Optional)</span></label>
                <input type="text" class="form-control int" id="kkm_add" name="kkm_add" placeholder="Passing Grade" value="">
              </div>

              <div class="form-group">
                <label>Banner<span class="bintang">*</span> <span class="input-keterangan">(jpg/jpeg/png)</span></label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="input-foto custom-file-input" id="banner_add" name="banner_add" idlabel="label-banner-add">
                    <label id="label-banner-add" class="custom-file-label" style="border-radius: .25rem;">Pilih file</label>
                  </div>
                </div> 
              </div>  

              <div class="form-group">
                  <label>Acak Soal<span class="bintang">*</span></label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="acak_soal_add" value="1" checked>
                    <label class="form-check-label">Ya</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="acak_soal_add" value="0">
                    <label class="form-check-label">Tidak</label>
                  </div>
                  <br>
              </div>

              <div class="form-group">
                  <label>Bagi Kunci Jawaban & Pembahasan<span class="bintang">*</span></label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bagi_jawaban_add" value="1" checked>
                    <label class="form-check-label">Bagi</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bagi_jawaban_add" value="0">
                    <label class="form-check-label">Jangan Bagi</label>
                  </div>
                  <br>
              </div>

              <!-- <div class="form-group">
                  <label>Sertifikat & Piagam<span class="bintang">*</span></label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sertifikat_add" value="1" checked>
                    <label class="form-check-label">Ada</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sertifikat_add" value="0">
                    <label class="form-check-label">Tidak Ada</label>
                  </div>
                  <br>
              </div> -->

              <!-- <div class="form-group">
                    <label for="pengumuman_add">Pengumuman</label>
                    <textarea name="pengumuman_add" id="pengumuman_add" rows="2" class="form-control content_" placeholder="Pengumuman"></textarea>
                </div> -->

              <div class="form-group">
                <label for="ket_add">Keterangan</label>
                    <textarea name="ket_add" id="ket_add" rows="5" class="form-control content_" placeholder="Keterangan"></textarea>  
              </div>

            
              <!-- <div class="card-body"> -->
              <!-- /.form-group -->
            <!-- </div> -->
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>
              <button type="submit" class="btn btn-danger">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal edit -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<!-- Custom Input File -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
<!-- jQuery -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- jquery-validation -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('layout/adminlte3/dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('layout/adminlte3/dist/js/demo.js')); ?>"></script>
<!-- Page specific script -->
<!-- DatePicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
<!--  Flatpickr  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
<!-- Tinymce -->
<!-- <script src="https://cdn.tiny.cloud/1/0twnfvrzobjdj82mvj8h3afdp101vxtvzge7eiqrbb0gwmw2/tinymce/4/tinymce.min.js"></script> -->
<script src="https://cdn.tiny.cloud/1/0twnfvrzobjdj82mvj8h3afdp101vxtvzge7eiqrbb0gwmw2/tinymce/4/tinymce.min.js"></script>

<script>
  $(document).ready(function(){

    $('.jenistryout').select2({
      placeholder: "Pilih Jenis Paket"
    });

    $('.jeniswaktu').select2({
      placeholder: "Pilih Jenis Waktu"
    });
    
    $(".hide").hide();

    $(document).on('change', '.jeniswaktu', function (e) {
        jeniswaktu = $(this).val();
        idwaktu = $(this).attr('idwaktu');
        tryout = $("#tryout_"+idwaktu).val();
        $("#waktu_"+idwaktu).val(0);
        if(tryout!=1){
          $(".waktu_pengerjaan_"+idwaktu).hide();
          if(jeniswaktu==1){
            $(".waktu_pengerjaan_"+idwaktu).show();
          }else{
            $(".waktu_pengerjaan_"+idwaktu).hide();
          }
        }
    });

    $(document).on('change', '.jenistryout', function (e) {
        jenis = $(this).val();
        idwaktu = $(this).attr('idwaktu');
        $(".waktu_tryout_"+idwaktu).hide();
        $(".waktu_pengerjaan_"+idwaktu).hide();
        $("#jenis_waktu_"+idwaktu).val('').trigger('change');
        if(jenis==1){
          $(".waktu_tryout_"+idwaktu).show();
          $(".jenis_waktu_"+idwaktu).hide();
        }else{
          $(".jenis_waktu_"+idwaktu).show();
          $(".waktu_pengerjaan_"+idwaktu).hide();
        }
    });

    // bsCustomFileInput.init();
    datatablemapelmst("tabledata");
    
    bsCustomFileInput.init();

    tinymce.init({
        selector: ".content_", theme: "modern",
        plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: " | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true,
        height : "250",
        file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        /*
          Note: In modern browsers input[type="file"] is functional without
          even adding it to the DOM, but that might not be the case in some older
          or quirky browsers like IE, so you might want to add it to the DOM
          just in case, and visually hide it. And do not forget do remove it
          once you do not need it anymore.
        */

        input.onchange = function () {
          var file = this.files[0];

          var reader = new FileReader();
          reader.onload = function () {
            /*
              Note: Now we need to register the blob in TinyMCEs image blob
              registry. In the next release this part hopefully won't be
              necessary, as we are looking to handle it internally.
            */
            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
        };

        input.click();
      }
    });

    $(document).on('change', '.input-foto', function (e) {
        var idphoto = $(this).attr('id');
        onlyPhoto(idphoto);
    });

    $(".waktu").flatpickr({
        enableTime: true,
        dateFormat: "d-m-Y H:i",
        disableMobile: "true",
        time_24hr: true
    });

    $(".int").on('input paste', function () {
      hanyaIntegerKosong(this);
    });

    $(".jenis_penilaian").on('change', function () {
      value = $(this).val();
      idkkm = $(this).attr('idkkm');
      if(value==1){
        $("#"+idkkm).attr('max','100');
      }else{
        $("#"+idkkm).removeAttr('max');
      }
    });

    //Fungsi Hapus Data
    $(document).on('click', '.btn-hapus', function (e) {
        idform = $(this).attr('idform');
        var formData = new FormData($('#formHapus_' + idform)[0]);

        var url = "<?php echo e(url('/hapuspaketsoalmst')); ?>/"+idform;
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
                $.LoadingOverlay("show");
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
    

    // Fungsi Ubah Data
    $(document).on('click', '.btn-submit-data', function (e) {
        idform = $(this).attr('idform');
        $('#formData_'+idform).validate({
          rules: {
            'judul[]': {
              required: true
            },
            'jenis_waktu[]': {
              required: true
            },
            'bagi_jawaban[]': {
              required: true
            },
            'sertifikat[]': {
              required: true
            },
            'mulai[]': {
              required: true
            },
            'selesai[]': {
              required: true
            },
            'waktu[]': {
              required: true,
              min:1
            },
            'kkm[]': {
              // required: true,
              min:1
            },
            'tryout[]': {
              required: true
            }
          },
          messages: {
            'judul[]': {
              required: "Judul tidak boleh kosong"
            },
            'jenis_waktu[]': {
              required: "Jenis waktu tidak boleh kosong"
            },
            'bagi_jawaban[]': {
              required: "Bagi jawaban tidak boleh kosong"
            },
            'sertifikat[]': {
              required: "Sertifikat tidak boleh kosong"
            },
            'mulai[]': {
              required: "Mulai tidak boleh kosong"
            },
            'selesai[]': {
              required: "Selesai tidak boleh kosong"
            },
            'waktu[]': {
              required: "Waktu pengerjaan tidak boleh kosong",
              min:"Waktu pengerjaan tidak boleh kosong"
            },
            'kkm[]': {
              // required: "Passing grade tidak boleh kosong",
              min:"Passing grade tidak boleh kosong",
              max:"Maximal 100"
            },
            'tryout[]': {
              required: "Jenis paket tidak boleh kosong"
            },
          },
          errorPlacement: function (error, element) {
            if (element.hasClass('_select2')) {     
                element.parent().addClass('select2-error');
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            } else {                                      
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            }
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            if(element.tagName.toLowerCase()=='select'){
              var x = element.getAttribute('id');
              y = $('#'+x).parent().addClass('select2-error');
            }
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            if(element.tagName.toLowerCase()=='select'){
              var x = element.getAttribute('id');
              y = $('#'+x).parent().removeClass('select2-error');
            }
          },

          submitHandler: function () {
          
            var formData = new FormData($('#formData_'+idform)[0]);

            var url = "<?php echo e(url('/updatepaketsoalmst')); ?>/"+idform;
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
                    $.LoadingOverlay("show");
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
          }
        });
    });

    // Fungsi Add Data
    $('#_formData').validate({
          rules: {
            judul_add: {
              required: true
            },
            jenis_waktu_add: {
              required: true
            },
            bagi_jawaban_add: {
              required: true
            },
            sertifikat_add: {
              required: true
            },
            waktu_add: {
              required: true,
              min:1
            },
            kkm_add: {
              // required: true,
              min:1
            },
            banner_add: {
              required: true
            },
            mulai_add: {
              required: true
            },
            selesai_add: {
              required: true
            },
            tryout_add: {
              required: true
            }
          },
          messages: {
            judul_add: {
              required: "Judul tidak boleh kosong"
            },
            jenis_waktu_add: {
              required: "Jenis waktu tidak boleh kosong"
            },
            bagi_jawaban_add: {
              required: "Bagi jawaban tidak boleh kosong"
            },
            sertifikat_add: {
              required: "Sertifikat tidak boleh kosong"
            },
            waktu_add: {
              required: "Waktu tidak boleh kosong",
              min:"Waktu pengerjaan tidak boleh kosong"
            },
            kkm_add: {
              // required: "Passing grade tidak boleh kosong",
              min:"Passing grade tidak boleh kosong",
              max:"Maximal 100"
            },
            banner_add: {
              required: "Banner tidak boleh kosong"
            },
            mulai_add: {
              required: "Mulai tidak boleh kosong"
            },
            selesai_add: {
              required: "Selesai tidak boleh kosong"
            },
            tryout_add: {
              required: "Jenis paket tidak boleh kosong"
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            if (element.hasClass('_select2')) {     
                element.parent().addClass('select2-error');
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            } else {                                      
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            }
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            if(element.tagName.toLowerCase()=='select'){
              var x = element.getAttribute('id');
              y = $('#'+x).parent().addClass('select2-error');
            }
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            if(element.tagName.toLowerCase()=='select'){
              var x = element.getAttribute('id');
              y = $('#'+x).parent().removeClass('select2-error');
            }
          },

          submitHandler: function () {
          
            var formData = new FormData($('#_formData')[0]);

            var url = "<?php echo e(url('storepaketsoalmst')); ?>";
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
                    $.LoadingOverlay("show");
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
          }
      });

  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/sahabatatlm.com/public_html/laravel/resources/views/master/paketsoalmst.blade.php ENDPATH**/ ?>