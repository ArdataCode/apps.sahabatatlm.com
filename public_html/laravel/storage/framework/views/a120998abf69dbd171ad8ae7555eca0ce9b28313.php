

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
<h1 class="m-0">Voucher</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">List Voucher</li>
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
                <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-sm btn-primary btn-add-absolute">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
              </span>
              <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->
                <table id="tabledata" class="table  table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <!-- <th>Jenis</th> -->
                    <!-- <th>User</th> -->
                    <th>Kode</th>
                    <th>Tipe</th>
                    <th>Potongan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td width="1%"><?php echo e($loop->iteration); ?></td>
                    <!-- <td class="_align_left"><?php echo e($key->jenis==1 ? "Promo" : "Referral"); ?></td> -->
                    <!-- <td><?php echo e($key->user_r ? $key->user_r->name : ''); ?></td> -->
                    <td width="15%"><?php echo e($key->kode); ?></td>
                    <td class="_align_center"><?php echo e($key->tipe==1 ? "Harga" : "Persen"); ?></td>
                    <td class="_align_right"><?php echo e($key->tipe==1 ? formatRupiah($key->jumlah) : $key->jumlah."%"); ?></td>
                    <td width="1%" class="_align_center" style="white-space:nowrap">
                      <b><?php echo e($key->status==1 ? "Aktif" : "Non-Aktif"); ?></b>
                    </td>
                    <td width="1%" class="_align_center">
                      <div class="btn-group">
                        <span data-toggle="tooltip" data-placement="left" title="Lihat Gambar">
                          <button onclick="modalImage('<?php echo e($key->kode); ?>','<?php echo e(asset($key->gambar)); ?>')" type="button" class="btn btn-sm btn-outline-info"><i class="fas fa-image"></i></button>
                        </span>
                        <span data-toggle="tooltip" data-placement="left" title="Ubah Data">
                          <button data-toggle="modal" data-target="#modal-edit-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                        </span>
                        <span data-toggle="tooltip" data-placement="left" title="Hapus Data">
                          <button data-toggle="modal" data-target="#modal-hapus-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                        </span>
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
            <input type="hidden" value="<?php echo e($key->id); ?>" name="iddata[]">
            <div class="modal-body">
              <!-- <div class="card-body"> -->
                <!-- <div class="form-group">
                  <label for="jenis_<?php echo e($key->id); ?>">Jenis<span class="bintang">*</span></label>
                  <select class="form-control jenis" attrjns="<?php echo e($key->id); ?>" name="jenis[]" id="jenis_<?php echo e($key->id); ?>" disabled>
                    <option value=""></option>
                    <option value="1" <?php echo e($key->jenis==1 ? "selected" : ""); ?>>Promo</option>
                    <option value="2" <?php echo e($key->jenis==2 ? "selected" : ""); ?>>Referral</option>
                  </select>
                </div> -->

                <div class="form-group user_<?php echo e($key->id); ?> <?php echo e($key->jenis==1 ? 'hide' : ''); ?>">
                  <label for="fk_user_<?php echo e($key->id); ?>">User<span class="bintang">*</span></label>
                  <select class="form-control user" name="fk_user[]" id="fk_user_<?php echo e($key->id); ?>" disabled>
                    <option value=""></option>
                    <?php $__currentLoopData = $datauser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($datakey->id); ?>" <?php echo e($key->fk_user==$datakey->id ? "selected" : ""); ?>><?php echo e($datakey->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="form-group">
                    <label for="kode_<?php echo e($key->id); ?>">Kode<span class="bintang">*</span> (Angka dan huruf besar)</label>
                    <input type="text" class="form-control angkabesar" id="kode_<?php echo e($key->id); ?>" name="kode[]" placeholder="Kode" value="<?php echo e($key->kode); ?>">
                </div>

                <div class="form-group">
                    <label for="tipe_<?php echo e($key->id); ?>">Tipe<span class="bintang">*</span></label>
                    <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input tipe" type="radio" attrjns="<?php echo e($key->id); ?>" name="tipe[]" value="1" <?php echo e($key->tipe==1 ? "checked" : ""); ?>>
                      <label class="form-check-label">Harga</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input tipe" type="radio" attrjns="<?php echo e($key->id); ?>" name="tipe[]" value="2" <?php echo e($key->tipe==2 ? "checked" : ""); ?>>
                      <label class="form-check-label">Persen</label>
                    </div>
                    <br>
                </div>

                <div class="form-group harga_<?php echo e($key->id); ?> <?php echo e($key->tipe==1 ? '' : 'hide'); ?>">
                      <label for="harga_<?php echo e($key->id); ?>">Harga Potongan<span class="bintang">*</span></label>
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="int form-control" id="harga_<?php echo e($key->id); ?>" name="harga[]" placeholder="Masukkan Harga Potongan" value="<?php echo e($key->jumlah); ?>">
                      </div>
                </div>
                
                <div class="form-group persen_<?php echo e($key->id); ?> <?php echo e($key->tipe==2 ? '' : 'hide'); ?>">
                      <label for="persen_<?php echo e($key->id); ?>">Persen Potongan<span class="bintang">*</span></label>
                      <div class="input-group">
                        <input type="text" class="int form-control" id="persen_<?php echo e($key->id); ?>" name="persen[]" placeholder="Masukkan Persen Potongan" value="<?php echo e($key->jumlah); ?>">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                </div>
                
                <div class="form-group">
                    <label for="ket_<?php echo e($key->id); ?>">Keterangan</label>
                    <textarea name="ket[]" id="ket_<?php echo e($key->id); ?>" rows="5" class="form-control content_" placeholder="Keterangan"><?php echo e($key->ket); ?></textarea>  
                </div> 

                <div class="form-group">
                  <label>Gambar <span class="input-keterangan">(jpg/jpeg/png)</span></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="input-foto custom-file-input" id="gambar_<?php echo e($key->id); ?>" name="gambar[]" idlabel="label-gambar-<?php echo e($key->id); ?>">
                      <label id="label-gambar-<?php echo e($key->id); ?>" class="custom-file-label" style="border-radius: .25rem;">Pilih file</label>
                    </div>
                  </div> 
                </div>

                <div class="form-group">
                    <label for="status_<?php echo e($key->id); ?>">Status</label>
                    <select name="status[]" id="status_<?php echo e($key->id); ?>" class="form-control">
                      <option value="0" <?php echo e($key->status==0 ? "selected" : ""); ?>>Non-Aktif</option>
                      <option value="1" <?php echo e($key->status==1 ? "selected" : ""); ?>>Aktif</option>
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
            <input type="hidden" value="<?php echo e($key->id); ?>" name="iddata[]">
            <div class="modal-body">
                <h6> Apakah anda ingin menghapus kode potongan <?php echo e($key->kode); ?>?</h6>
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
              <input type="hidden" value="1" name="jenis_add" id="jenis_add">
              <!-- <div class="form-group">
                  <label for="jenis_add">Jenis<span class="bintang">*</span></label>
                  <select class="form-control jenis" attrjns="add" name="jenis_add" id="jenis_add">
                    <option value=""></option>
                    <option value="1">Promo</option>
                    <option value="2">Referral</option>
                  </select>
              </div> -->

              <div class="form-group hide user_add">
                  <label for="fk_user_add">User<span class="bintang">*</span></label>
                  <select class="form-control user" name="fk_user_add" id="fk_user_add">
                    <option value=""></option>
                    <?php $__currentLoopData = $datauser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($datakey->id); ?>"><?php echo e($datakey->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>

              <div class="form-group">
                <label for="kode_add">Kode<span class="bintang">*</span> (Angka dan huruf besar)</label>
                <input type="text" class="form-control angkabesar" id="kode_add" name="kode_add" placeholder="Kode">
              </div> 

              <div class="form-group">
                    <label for="tipe_add">Tipe<span class="bintang">*</span></label>
                    <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input tipe" type="radio" attrjns="add" name="tipe_add" value="1">
                      <label class="form-check-label" for="inlineRadio1">Harga</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input tipe" type="radio" attrjns="add" name="tipe_add" value="2">
                      <label class="form-check-label" for="inlineRadio2">Persen</label>
                    </div>
                    <br>
              </div>

              <div class="form-group hide harga_add">
                    <label for="harga_add">Harga Potongan<span class="bintang">*</span></label>
                    <div class="input-group">
                      <div class="input-group-append">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="text" class="int form-control" id="harga_add" name="harga_add" placeholder="Masukkan Harga Potongan">
                    </div>
              </div>
              
              <div class="form-group hide persen_add">
                    <label for="persen_add">Persen Potongan<span class="bintang">*</span></label>
                    <div class="input-group">
                      <input type="text" class="int form-control" id="persen_add" name="persen_add" placeholder="Masukkan Persen Potongan">
                      <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
              </div>

              <div class="form-group">
                <label for="ket_add">Keterangan</label>
                <textarea name="ket_add" id="ket_add" rows="5" class="form-control content_" placeholder="Keterangan"></textarea>  
              </div>

              <div class="form-group">
                <label>Gambar <span class="bintang">*</span> <span class="input-keterangan">(jpg/jpeg/png)</span></label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="input-foto custom-file-input" id="gambar_add" name="gambar_add" idlabel="label-gambar-add">
                    <label id="label-gambar-add" class="custom-file-label" style="border-radius: .25rem;">Pilih file</label>
                  </div>
                </div> 
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
<script>
  $(document).ready(function(){

    bsCustomFileInput.init();

    $(document).on('change', '.input-foto', function (e) {
        var idphoto = $(this).attr('id');
        onlyPhoto(idphoto);
    });

    $(".hide").hide();

    $(document).on('change', '.tipe', function (e) {
        jenis = $(this).val();
        attrjns = $(this).attr('attrjns');
        $(".harga_"+attrjns).hide();
        $(".persen_"+attrjns).hide();
        if(jenis==1){
          $(".harga_"+attrjns).show();
        }else{
          $(".persen_"+attrjns).show();
        }
    });

    $(document).on('change', '.jenis', function (e) {
        jenis = $(this).val();
        attrjns = $(this).attr('attrjns');
        $(".user_"+attrjns).hide();
        if(jenis==2){
          $(".user_"+attrjns).show();
        }
    });

    $(".int").on('input paste', function () {
      hanyaInteger(this);
    });

    $(".angkabesar").on('input paste', function () {
      hanyaAngkaAndBesar(this);
    });
    // bsCustomFileInput.init();
    tablekodepotongan("tabledata");

    //Initialize Select2 Elements

    // $('.mapel').select2({
    //   placeholder: "Pilih Mapel"
    // });

    $('.jenis').select2({
      placeholder: "Pilih Jenis"
    });
    $('.user').select2({
      placeholder: "Pilih User"
    })

    // $('#jenis_soal_add').on('select2:select', function (e) {
    //     var val = $(this).val();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         url: '<?php echo e(url("getPaketSoal")); ?>',
    //         type: 'POST',
    //         dataType: "JSON",
    //         data: {
    //             "val":val
    //         },
    //         beforeSend: function () {
    //             $.LoadingOverlay("show", {
    //                 image       : "<?php echo e(asset('/image/global/loading.gif')); ?>"
    //             });
    //         },
    //         success: function (response) {
    //             if (response.status == true) {

    //                 $("#fk_paket_soal_mst_add").html("");
    //                 var newOption = new Option('', '', false, false);
    //                 $("#fk_paket_soal_mst_add").append(newOption).trigger('change');
    //                 $("#fk_paket_soal_mst_add").attr("data-placeholder","Paket Soal");

    //                 $("#fk_paket_soal_mst_add").select2({
    //                     data: response.datapaket
    //                 });
    //             }else{
    //                 Swal.fire({
    //                     title: "Error!!!",
    //                     icon: 'error',
    //                     confirmButtonText: 'Ok'
    //                 });
    //             }
    //         },
    //         error: function (xhr, status) {
    //             alert('Error!!!');
    //         },
    //         complete: function () {
    //             $.LoadingOverlay("hide");
    //         }
    //     });
    // });

    // $(document).on('change', '.input-photo', function (e) {
    //     var idphoto = $(this).attr('id');
    //     onlyPhoto(idphoto);
    // });

    //Fungsi Hapus Data
    $(document).on('click', '.btn-hapus', function (e) {
        idform = $(this).attr('idform');
        var formData = new FormData($('#formHapus_' + idform)[0]);

        var url = "<?php echo e(url('/hapuskodepotongan')); ?>";
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
            'jenis[]': {
              required: true
            },
            'fk_user[]': {
              required: true
            },
            'kode[]': {
              required: true
            },
            'tipe[]': {
              required: true
            },
            'harga[]': {
              min:1,
              required: true
            },
            'persen[]': {
              min:1,
              max:99,
              required: true
            }
          },
          messages: {
            'jenis[]': {
              required: "Jenis tidak boleh kosong"
            },
            'fk_user[]': {
              required: "User tidak boleh kosong"
            },
            'kode[]': {
              required: "Kode tidak boleh kosong"
            },
            'tipe[]': {
              required: "Tipe tidak boleh kosong"
            },
            'harga[]': {
              min: "Harga potongan tidak boleh kosong",
              required: "Harga potongan tidak boleh kosong"
            },
            'persen[]': {
              min: "Persen potongan tidak boleh kosong",
              max: "Max 99",
              required: "Persen potongan tidak boleh kosong"
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
          
            var formData = new FormData($('#formData_'+idform)[0]);

            var url = "<?php echo e(url('/updatekodepotongan')); ?>";
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
            jenis_add: {
              required: true
            },
            fk_user_add: {
              required: true
            },
            kode_add: {
              required: true
            },
            tipe_add: {
              required: true
            },
            gambar_add: {
              required: true
            },
            harga_add: {
              min:1,
              required: true
            },
            persen_add: {
              min:1,
              max:99,
              required: true
            }
          },
          messages: {
            jenis_add: {
              required: "Jenis tidak boleh kosong"
            },
            fk_user_add: {
              required: "User tidak boleh kosong"
            },
            gambar_add: {
              required: "Gambar tidak boleh kosong"
            },
            kode_add: {
              required: "Kode tidak boleh kosong"
            },
            tipe_add: {
              required: "Tipe tidak boleh kosong"
            },
            harga_add: {
              min: "Harga potongan tidak boleh kosong",
              required: "Harga potongan tidak boleh kosong"
            },
            persen_add: {
              min: "Persen potongan tidak boleh kosong",
              max: "Max 99",
              required: "Persen potongan tidak boleh kosong"
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

            var url = "<?php echo e(url('storekodepotongan')); ?>";
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
<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/apps.sahabatatlm.com/public_html/laravel/resources/views/master/kodepotongan.blade.php ENDPATH**/ ?>