

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
<h1 class="m-0">Paket Soal Pilihan Ganda [Kategori]</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a class="_kembali" href="<?php echo e(url('paketsoalmst')); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="row">
                    <div class="col-sm-3">Paket</div>
                    <div class="col-sm-9">: <?php echo e($datamst->judul); ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Waktu</div>
                    <div class="col-sm-9">: <?php echo e($datamst->waktu); ?> Menit</div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Total Soal</div>
                    <div class="col-sm-9">: <?php echo e($datamst->total_soal); ?> Butir</div>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-3">Total Soal</div>
                    <div class="col-sm-9">: <?php echo e($datamst->total_soal); ?> Butir</div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-sm-3">KKM</div>
                    <div class="col-sm-9">: <?php echo e($datamst->kkm); ?></div>
                </div> -->
              </div>
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
                    <th>Kategori</th>
                    <th>Waktu Pengerjaan</th>
                    <th>Jumlah Soal</th>
                    <!-- <th>KKM Perkategori</th> -->
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td width="1%"><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($key->kategori_soal_r->judul); ?></td>
                    <td width="1%" class="_align_center"><?php echo e($key->waktu); ?> Menit</td>
                    <td width="1%" class="_align_center"><?php echo e($key->jumlah_soal); ?> Butir</td>
                    <!-- <td width="1%" class="_align_center"><?php echo e($key->kkm); ?></td> -->
                    <td width="1%" class="_align_center">
                      <div class="btn-group">
                        <span data-toggle="tooltip" data-placement="left" title="Soal">
                          <a href="<?php echo e(url('paketsoaldtl')); ?>/<?php echo e($key->id); ?>" class="btn btn-sm btn-outline-info"><i class="fas fa-th-list"></i></a>
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
            <div class="modal-body">
              <!-- <div class="card-body"> -->
                <div class="form-group">
                    <label for="fk_kategori_soal_<?php echo e($key->id); ?>">Kategori Soal<span class="bintang">*</span></label>
                    <input readonly type="text" class="form-control" id="fk_kategori_soal_<?php echo e($key->id); ?>" name="fk_kategori_soal[]" placeholder="Kategori Soal" value="<?php echo e($key->kategori_soal_r->judul); ?>">
                </div> 
                <div class="form-group">
                    <label for="waktu_<?php echo e($key->id); ?>">Waktu Pengerjaan (Menit)<span class="bintang">*</span></label>
                    <input type="text" class="form-control int" id="waktu_<?php echo e($key->id); ?>" name="waktu[]" placeholder="Waktu Pengerjaan" value="<?php echo e($key->waktu); ?>">
                </div>
                <div class="form-group">
                    <label for="countdown_<?php echo e($key->id); ?>">Countdown (Detik)<span class="bintang">*</span></label>
                    <input type="text" class="form-control int" id="countdown_<?php echo e($key->id); ?>" name="countdown[]" placeholder="Countdown" value="<?php echo e($key->countdown); ?>">
                </div>
                <div class="form-group" style="display:none">
                    <label for="kkm_<?php echo e($key->id); ?>">Passing Grade Perkategori<span class="bintang">*</span></label>
                    <input type="hidden" class="form-control int" id="kkm_<?php echo e($key->id); ?>" name="kkm[]" placeholder="Passing Grade Perkategori" value="<?php echo e($key->kkm); ?>" <?php echo e($datamst->jenis_penilaian==1 ? "max=100" : ""); ?>>
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
                <h6> Apakah anda ingin menghapus soal kategori <?php echo e($key->kategori_soal_r->judul); ?>?</h6>
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
              <input type="hidden" class="form-control" id="fk_paket_soal_mst" name="fk_paket_soal_mst" value="<?php echo e($idpaketmst); ?>">

              <div class="form-group">
                    <label for="fk_kategori_soal_add">Kategori Soal<span class="bintang">*</span></label>
                    <select class="form-control kategorisoal" name="fk_kategori_soal_add" id="fk_kategori_soal_add">
                      <option value=""></option>
                      <?php $__currentLoopData = $ktgsoal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ktg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($ktg->id); ?>"><?php echo e($ktg->judul); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="waktu_add">Waktu Pengerjaan (Menit)<span class="bintang">*</span></label>
                  <input type="text" class="form-control int" id="waktu_add" name="waktu_add" placeholder="Waktu Pengerjaan" value="0">
                </div>
                <div class="form-group">
                  <label for="countdown_add">Countdown (Detik)<span class="bintang">*</span></label>
                  <input type="text" class="form-control int" id="countdown_add" name="countdown_add" placeholder="Countdown" value="0">
                </div>
              <div class="form-group" style="display:none">
                  <label for="kkm_add">Passing Grade Perkategori<span class="bintang">*</span></label>
                  <input type="hidden" class="form-control int" id="kkm_add" name="kkm_add" placeholder="Passing Grade Perkategori" value="50" <?php echo e($datamst->jenis_penilaian==1 ? "max=100" : ""); ?>>
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

    $(".int").on('input paste', function () {
      hanyaInteger(this);
    });
    // bsCustomFileInput.init();
    datatablekatesoal("tabledata");

    //Initialize Select2 Elements
    $('.kategorisoal').select2({
      placeholder: "Kategori Soal"
    })

    // $(document).on('change', '.input-photo', function (e) {
    //     var idphoto = $(this).attr('id');
    //     onlyPhoto(idphoto);
    // });

    //Fungsi Hapus Data
    $(document).on('click', '.btn-hapus', function (e) {
        idform = $(this).attr('idform');
        var formData = new FormData($('#formHapus_' + idform)[0]);

        var url = "<?php echo e(url('/hapuspaketsoalktg')); ?>/"+idform;
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
            'fk_kategori_soal[]': {
              required: true
            },
            'waktu[]': {
              required: true,
              min:1
            },
            'countdown[]': {
              required: true,
              // min:1,
              // max:60
            },
            'kkm[]': {
              required: true,
              min:1
            }
          },
          messages: {
            'fk_kategori_soal[]': {
              required: "Kategori soal tidak boleh kosong"
            },
            'waktu[]': {
              required: "Waktu tidak boleh kosong",
              min: "Waktu tidak boleh kosong"
            },
            'countdown[]': {
              required: "Countdown tidak boleh kosong",
              // min: "Countdown tidak boleh kosong",
              max: "Countdown maximal 60 Detik"
            },
            'kkm[]': {
              required: "Passing grade tidak boleh kosong",
              min:"Passing grade tidak boleh kosong",
              max:"Maximal 100"
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

            var url = "<?php echo e(url('/updatepaketsoalktg')); ?>/"+idform;
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
            fk_kategori_soal_add: {
              required: true
            },
            waktu_add: {
              required: true,
              min:1
            },
            countdown_add: {
              required: true,
              // min:1,
              // max:60
            },
            kkm_add: {
              required: true,
              min:1
            }
          },
          messages: {
            fk_kategori_soal_add: {
              required: "Kategori soal tidak boleh kosong"
            },
            waktu_add: {
              required: "Waktu tidak boleh kosong",
              min:"Waktu tidak boleh kosong",
            },
            countdown_add: {
              required: "Countdown tidak boleh kosong",
              // min:"Countdown tidak boleh kosong",
              max: "Countdown maximal 60 Detik"
            },
            kkm_add: {
              required: "Passing grade tidak boleh kosong",
              min:"Passing grade tidak boleh kosong",
              max:"Maximal 100"
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

            var url = "<?php echo e(url('storepaketsoalktg')); ?>";
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
<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1124801.cloudwaysapps.com/kgxqsgujwy/public_html/laravel/resources/views/master/paketsoalktg.blade.php ENDPATH**/ ?>