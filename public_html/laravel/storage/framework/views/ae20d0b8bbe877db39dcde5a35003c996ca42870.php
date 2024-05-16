

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
<h1 class="m-0">Paket</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
<ol class="breadcrumb float-sm-right">
    <!-- <li class="breadcrumb-item">Master</li> -->
    <li class="breadcrumb-item active">Paket</li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">Foto Beranda</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
              <span data-toggle="tooltip" data-placement="left" title="Tambah Data">
                <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-sm btn-primary">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
              </span>
              <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->
                <table id="tabledata" class="table  table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <!-- <th>Tanggal</th> -->
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td width="1%"><?php echo e($loop->iteration); ?></td>
                    <td width="20%"><?php echo e($key->judul); ?></td>
                    <!-- <td style="white-space:nowrap"width="15%" class="_align_center"><span class="d-none"><?php echo e($key->mulai); ?></span><?php echo e(tglIndoSingkat($key->mulai)); ?> - <?php echo e(tglIndoSingkat($key->selesai)); ?></td> -->
                    <td><?php echo $key->ket; ?></td>
                    <td width="15%" class="_bold _align_right"><span class="d-none"><?php echo e($key->harga); ?></span><?php echo e($key->harga<=0 ? "Gratis" : formatRupiah($key->harga)); ?></td>
                    <td width="1%" class="_align_center">
                      <div class="btn-group">
                        <span data-toggle="tooltip" data-placement="left" title="Fitur">
                          <a href="<?php echo e(url('paketfitur')); ?>/<?php echo e($key->id); ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-list-ol"></i></a>
                        </span>
                        <span data-toggle="tooltip" data-placement="left" title="Materi">
                          <a href="<?php echo e(url('paketmateri')); ?>/<?php echo e($key->id); ?>" class="btn btn-sm btn-outline-primary"><i class="far fa-newspaper"></i></a>
                        </span>
                        <span data-toggle="tooltip" data-placement="left" title="Zoom">
                          <a href="<?php echo e(url('paketzoom')); ?>/<?php echo e($key->id); ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-chalkboard-teacher"></i></a>
                        </span>
                        <span data-toggle="tooltip" data-placement="left" title="Paket">
                          <a href="<?php echo e(url('paketdtl')); ?>/<?php echo e($key->id); ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-th-list"></i></a>
                        </span>
                      </div>
                    </td>
                    <td width="1%" class="_align_center">
                      <div class="btn-group">
                        <span data-toggle="tooltip" data-placement="left" title="Ubah Data">
                          <button data-toggle="modal" data-target="#modal-edit-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                        </span>
                        <?php
                          $cekdata = App\Models\Transaksi::where('fk_paket_mst',$key->id)->get();
                        ?>
                        <?php if(count($cekdata)<=0): ?>
                          <span data-toggle="tooltip" data-placement="left" title="Hapus Data">
                            <button data-toggle="modal" data-target="#modal-hapus-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                          </span>
                        <?php else: ?>
                          <span data-toggle="tooltip" data-placement="left" title="Data tidak bisa dihapus karena sudah ada yang membeli paket ini">
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
                  <label for="fk_paket_kategori_<?php echo e($key->id); ?>">Kategori Paket<span class="bintang">*</span></label>
                  <select class="form-control fk_paket_kategori" name="fk_paket_kategori[]" id="fk_paket_kategori_<?php echo e($key->id); ?>" idsub="#fk_paket_subkategori_<?php echo e($key->id); ?>">
                      <option value=""></option>
                      <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keydata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($keydata->id); ?>" <?php echo e($keydata->id==$key->fk_paket_kategori ? "selected" : ""); ?>><?php echo e($keydata->judul); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <?php
                  $subkategori = App\Models\PaketSubkategori::where('fk_paket_kategori',$key->fk_paket_kategori)->get();
                ?>
                <div class="form-group">
                  <label for="fk_paket_subkategori_<?php echo e($key->id); ?>">Subkategori Paket<span class="bintang">*</span></label>
                  <select class="form-control fk_paket_subkategori" name="fk_paket_subkategori[]" id="fk_paket_subkategori_<?php echo e($key->id); ?>">
                      <option value=""></option>
                      <?php $__currentLoopData = $subkategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keydata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($keydata->id); ?>" <?php echo e($keydata->id==$key->fk_paket_subkategori ? "selected" : ""); ?>><?php echo e($keydata->judul); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="judul_<?php echo e($key->id); ?>">Judul<span class="bintang">*</span></label>
                    <input type="text" class="form-control" id="judul_<?php echo e($key->id); ?>" name="judul[]" placeholder="Judul" value="<?php echo e($key->judul); ?>">
                </div>

                <div class="form-group">
                    <label for="harga_<?php echo e($key->id); ?>">Harga<span class="bintang">*</span></label>
                    <input type="text" class="form-control int" id="harga_<?php echo e($key->id); ?>" name="harga[]" placeholder="Harga" value="<?php echo e($key->harga); ?>">
                </div>

                <!-- <label>Tanggal<span class="bintang">*</span></label>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <input value="<?php echo e(tglEdit($key->mulai)); ?>" type="text" class="form-control tgl" name="mulai[]" id="mulai_<?php echo e($key->id); ?>" placeholder="Mulai"> 
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <input value="<?php echo e(tglEdit($key->selesai)); ?>" type="text" class="form-control tgl" name="selesai[]" id="selesai_<?php echo e($key->id); ?>" placeholder="Selesai"> 
                    </div>
                  </div>
                </div>
                
                <label>Tanggal Pendaftaran<span class="bintang">*</span></label>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <input value="<?php echo e(datetimeedit($key->mulai_daftar)); ?>" type="text" class="form-control waktu" name="mulai_daftar[]" id="mulai_daftar_<?php echo e($key->id); ?>" placeholder="Mulai Daftar"> 
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <input value="<?php echo e(datetimeedit($key->selesai_daftar)); ?>" type="text" class="form-control waktu" name="selesai_daftar[]" id="selesai_daftar_<?php echo e($key->id); ?>" placeholder="Selesai Daftar"> 
                    </div>
                  </div>
                </div>  -->
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
                  <label>Juknis <span class="input-keterangan">(pdf)</span></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="input-pdf custom-file-input" name="juknis[]" id="juknis_<?php echo e($key->id); ?>" idlabel="label-juknis-<?php echo e($key->id); ?>">
                      <label id="label-juknis-<?php echo e($key->id); ?>" class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                </div> 
                <!-- <div class="form-group">
                  <label for="syarat_<?php echo e($key->id); ?>">Syarat</label><br>
                  <input type="checkbox" name="syarat[]" data-on-text="Ya" data-off-text="Tidak" data-bootstrap-switch data-off-color="danger" data-on-color="success" <?php echo e($key->syarat=="1" ? "checked" : ""); ?>>
                </div>   -->
                <div class="form-group">
                    <label for="ket_<?php echo e($key->id); ?>">Keterangan</label>
                    <textarea name="ket[]" id="ket_<?php echo e($key->id); ?>" rows="5" class="form-control content_" placeholder="Keterangan"><?php echo e($key->ket); ?></textarea>  
                </div> 
                <div class="form-group">
                    <label for="status_<?php echo e($key->id); ?>">Tampil</label>
                    <select name="status[]" id="status_<?php echo e($key->id); ?>" class="form-control">
                      <option value="0" <?php echo e($key->status==0 ? "selected" : ""); ?>>Tidak</option>
                      <option value="1" <?php echo e($key->status==1 ? "selected" : ""); ?>>Ya</option>
                    </select>
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
                <h6> Apakah anda ingin menghapus paket <?php echo e($key->judul); ?>?</h6>
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
                <label for="fk_paket_kategori_add">Kategori Paket<span class="bintang">*</span></label>
                <select class="form-control fk_paket_kategori" name="fk_paket_kategori_add" id="fk_paket_kategori_add" idsub="#fk_paket_subkategori_add">
                    <option value=""></option>
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keydata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($keydata->id); ?>"><?php echo e($keydata->judul); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="fk_paket_subkategori_add">Subkategori Paket<span class="bintang">*</span></label>
                <select class="form-control fk_paket_subkategori" name="fk_paket_subkategori_add" id="fk_paket_subkategori_add">
                    <option value=""></option>
                </select>
              </div>
              <div class="form-group">
                <label for="judul_add">Judul<span class="bintang">*</span></label>
                <input type="text" class="form-control" id="judul_add" name="judul_add" placeholder="Judul">
              </div>  
              <div class="form-group">
                <label for="harga_add">Harga<span class="bintang">*</span></label>
                <input type="text" class="form-control int" id="harga_add" name="harga_add" placeholder="Harga" value="0">
              </div>       
              <!-- <label>Tanggal<span class="bintang">*</span></label>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" class="form-control tgl" name="mulai_add" id="mulai_add" placeholder="Mulai"> 
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" class="form-control tgl" name="selesai_add" id="selesai_add" placeholder="Selesai"> 
                  </div>
                </div>
              </div>
              <label>Tanggal Pendaftaran<span class="bintang">*</span></label>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" class="form-control waktu" name="mulai_daftar_add" id="mulai_daftar_add" placeholder="Mulai Daftar"> 
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" class="form-control waktu" name="selesai_daftar_add" id="selesai_daftar_add" placeholder="Selesai Daftar"> 
                  </div>
                </div>
              </div> -->
              <!-- <div class="form-group">
                <label for="syarat_add">Syarat</label><br>
                <input type="checkbox" name="syarat_add" data-on-text="Ya" data-off-text="Tidak" data-bootstrap-switch data-off-color="danger" data-on-color="success">
              </div>  -->
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
                <label>Juknis <span class="input-keterangan">(pdf)</span></label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="input-pdf custom-file-input" name="juknis_add" id="juknis_add" idlabel="label-juknis-add">
                    <label id="label-juknis-add" class="custom-file-label">Choose file</label>
                  </div>
                </div>
              </div> 
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
<script src="https://cdn.tiny.cloud/1/0twnfvrzobjdj82mvj8h3afdp101vxtvzge7eiqrbb0gwmw2/tinymce/4/tinymce.min.js"></script>
<!-- <script src="https://cdn.tiny.cloud/1/6yq8fapml30gqjogz5ilm4dlea09zn9rmxh9mr8fe907tqkj/tinymce/4/tinymce.min.js"></script> -->

<!-- Bootstrap Switch -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>
<script>
  $(document).ready(function(){

    $('.fk_paket_subkategori').select2({
      placeholder: "Pilih Subkategori Paket"
    });

    $('.fk_paket_kategori').select2({
      placeholder: "Pilih Kategori Paket"
    });

    $('.fk_paket_kategori').on('select2:select', function (e) {
        var val = $(this).val();
        var idsub = $(this).attr('idsub');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "<?php echo e(url('getsubkategori')); ?>",
            type: 'POST',
            dataType: "JSON",
            data: {
                "val":val
            },
            beforeSend: function () {
                $.LoadingOverlay("show");
            },
            success: function (response) {
                if (response.status == true) {
                    $(idsub).html("");
                    $(idsub).select2({
                    data: response.datasub
                    })
                }else{
                    Swal.fire({
                        title: "Error!!!",
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

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $(".int").on('input paste', function () {
      hanyaInteger(this);
    });
    $(".waktu").flatpickr({
        enableTime: true,
        dateFormat: "d-m-Y H:i",
        disableMobile: "true",
        time_24hr: true
    });
    $(".tgl").flatpickr({
        dateFormat: "d-m-Y",
        disableMobile: "true"
    });
    // bsCustomFileInput.init();
    datatablemasterevent("tabledata");

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

    //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //   placeholder: "Jenis",
    //   allowClear: true,
    //   theme: 'bootstrap4'
    // })

    bsCustomFileInput.init();
    $(document).on('change', '.input-foto', function (e) {
        var idphoto = $(this).attr('id');
        onlyPhoto(idphoto);
    });
    $(document).on('change', '.input-pdf', function (e) {
        var idphoto = $(this).attr('id');
        onlyPdf(idphoto);
    });

    // $(document).on('change', '.input-photo', function (e) {
    //     var idphoto = $(this).attr('id');
    //     onlyPhoto(idphoto);
    // });

    //Fungsi Hapus Data
    $(document).on('click', '.btn-hapus', function (e) {
        idform = $(this).attr('idform');
        var formData = new FormData($('#formHapus_' + idform)[0]);

        var url = "<?php echo e(url('/hapuseventmst')); ?>/"+idform;
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
            'fk_paket_subkategori[]': {
              required: true
            },
            'fk_paket_kategori[]': {
              required: true
            },
            'judul[]': {
              required: true
            },
            'mulai[]': {
              required: true  
            },
            'harga[]': {
              min:20000,
              required: true  
            },
            'selesai[]': {
              required: true  
            },
            'mulai_daftar[]': {
              required: true  
            },
            'selesai_daftar[]': {
              required: true  
            }
          },
          messages: {
            'fk_paket_subkategori[]': {
              required: "Subkategori paket tidak boleh kosong"
            },
            'fk_paket_kategori[]': {
              required: "Kategori paket tidak boleh kosong"
            },
            'judul[]': {
              required: "Judul tidak boleh kosong"
            },
            'harga[]': {
              min: "Harga minimal 20000",
              required: "Harga tidak boleh kosong"
            },
            'mulai[]': {
              required: "Mulai tidak boleh kosong"
            },
            'selesai[]': {
              required: "Selesai tidak boleh kosong"
            },
            'mulai_daftar[]': {
              required: "Mulai daftar tidak boleh kosong"
            },
            'selesai_daftar[]': {
              required: "Selesai daftar tidak boleh kosong"
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
          
            var formData = new FormData($('#formData_'+idform)[0]);

            var url = "<?php echo e(url('/updateeventmst')); ?>/"+idform;
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
            fk_paket_kategori_add: {
              required: true
            },
            fk_paket_subkategori_add: {
              required: true
            },
            harga_add: {
              min:20000,
              required: true
            },
            // juknis_add: {
            //   required: true
            // },
            banner_add: {
              required: true
            },
            mulai_add: {
              required: true
            },
            selesai_add: {
              required: true
            },
            mulai_daftar_add: {
              required: true
            },
            selesai_daftar_add: {
              required: true
            }
          },
          messages: {
            judul_add: {
              required: "Judul tidak boleh kosong"
            },
            fk_paket_kategori_add: {
              required: "Kategori paket tidak boleh kosong"
            },
            fk_paket_subkategori_add: {
              required: "Subkategori paket tidak boleh kosong"
            },
            harga_add: {
              min: "Harga minimal 20000",
              required: "Harga tidak boleh kosong"
            },
            banner_add: {
              required: "Banner tidak boleh kosong"
            },
            // juknis_add: {
            //   required: "Juknis tidak boleh kosong"
            // },
            mulai_add: {
              required: "Mulai tidak boleh kosong"
            },
            selesai_add: {
              required: "Selesai tidak boleh kosong"
            },
            mulai_daftar_add: {
              required: "Mulai daftar tidak boleh kosong"
            },
            selesai_daftar_add: {
              required: "Selesai daftar tidak boleh kosong"
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

            var url = "<?php echo e(url('storeeventmst')); ?>";
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
<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/master/paketmst.blade.php ENDPATH**/ ?>