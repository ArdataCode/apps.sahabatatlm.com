

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
<h1 class="m-0">Bank Soal <?php echo e($datakategori->judul); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a class="_kembali" href="<?php echo e(url('kategorisoalessay')); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li>
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
                    <div class="col-sm-2">Kategori</div>
                    <div class="col-sm-10">: <?php echo e($datakategori->judul); ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-2">Keterangan</div>
                    <div class="col-sm-10">: <?php echo e($datakategori->ket); ?></div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="btn-group">
                <span data-toggle="tooltip" data-placement="left" title="Tambah Data">
                  <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-sm btn-primary btn-add-absolute btn-add-absolute-group">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </button>
                </span>
                <span style="margin-left:35px" data-toggle="tooltip" data-placement="left" title="Import Data">
                  <button data-toggle="modal" data-target="#modal-import" type="button" class="btn btn-sm btn-success btn-add-absolute btn-add-absolute-group">
                      <i class="fas fa-file-excel"></i>
                  </button>
                </span>
                <span style="margin-left:35px" data-toggle="tooltip" data-placement="left" title="Hapus Data">
                  <button type="button" class="btn-delete-all btn btn-sm btn-danger btn-add-absolute btn-add-absolute-group">
                      <i class="fas fa-trash"></i>
                  </button>
                </span>
              </div>

              <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->
                <table id="tabledata" class="table  table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Soal</th>
                    <th>Jawaban</th>
                    <th>Aksi</th>
                    <th style="text-align:left"><input type="checkbox" id="checkAll" class="checkAll"> All</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td width="1%"><?php echo e($loop->iteration); ?></td>
                    <td width="40%"><?php echo $key->soal; ?></td>
                    <td width="1%"><?php echo $key->jawaban; ?></td>
                    <td width="1%" class="middle">
                      <div class="btn-group">
                        <span data-toggle="tooltip" data-placement="left" title="Ubah Data">
                          <!-- <button data-toggle="modal" data-target="#modal-edit-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button> -->
                          <a type="button" class="btn btn-sm btn-outline-warning" href="<?php echo e(url('editmastersoalessay')); ?>/<?php echo e($idkategori); ?>/<?php echo e($key->id); ?>"><i class="fas fa-edit"></i></a>
                        </span>
                        <?php
                          $cekdata = App\Models\PaketSoalEssayDtl::where('fk_master_soal_essay',$key->id)->get();
                        ?>
                        <?php if(count($cekdata)<=0): ?>
                        <span data-toggle="tooltip" data-placement="left" title="Hapus Data">
                          <button data-toggle="modal" data-target="#modal-hapus-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                        </span>
                        <?php else: ?>
                        <span data-toggle="tooltip" data-placement="left" title="Harap hapus data ini pada paket soal essay terlebih dahulu">
                          <button type="button" class="btn btn-sm btn-outline-danger disabled"><i class="far fa-trash-alt"></i></button>
                        </span>
                        <?php endif; ?>
                      </div>
                    </td>
                    <td width="1%" class="middle">
                      <?php if(count($cekdata)<=0): ?>  
                        <input type="checkbox" name="id_master_soal" class="checkbox" value="<?php echo e($key->id); ?>">
                      <?php else: ?>

                      <?php endif; ?>
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
                <h6> Apakah anda yakin ingin menghapus data ini?</h6>
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
                <input type="hidden" name="fk_kategori_soal_essay_add" value="<?php echo e($idkategori); ?>">
                <!-- <div class="form-group">
                  <label>Tingkat Kesulitan<span class="bintang">*</span></label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tingkat_add" value="1" checked>
                    <label class="form-check-label">Easy</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tingkat_add" value="2">
                    <label class="form-check-label">Medium</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tingkat_add" value="3">
                    <label class="form-check-label">Hard</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tingkat_add" value="4">
                    <label class="form-check-label">Very Hard</label>
                  </div>
                  <br>
                </div> -->
                <div class="form-group">
                  <label for="soal_add">Soal<span class="bintang">*</span></label>
                  <textarea name="soal_add" id="soal_add" rows="10" class="form-control content_" placeholder="Soal"></textarea>
                </div>
                <div class="form-group">
                  <label for="jawaban_add">Jawaban<span class="bintang">*</span></label>
                  <textarea name="jawaban_add" id="jawaban_add" rows="5" class="form-control content_" placeholder="Jawaban"></textarea>  
                </div>
                <div class="form-group">
                  <label for="point_add">Point<span class="bintang">*</span></label>
                  <input value="0" type="number" class="form-control int" id="point_add" name="point_add" placeholder="Point">
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
<!-- /.modal tambah -->

<!-- Modal Import -->
<div class="modal fade" id="modal-import">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Import Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="_formDataImport" class="form-horizontal" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
              <!-- <div class="card-body"> -->
              <div class="form-group">
                <label>Download Template Excel <a href="<?php echo e(asset('document/TemplateSoalEssay.xlsx')); ?>">disini</a></label>
              </div>
              <input type="hidden" name="idkategori" value="<?php echo e($idkategori); ?>">
              <div class="form-group row">
                        <label class="col-sm-12 col-form-label">File Excel <span class="input-keterangan">(.xlsx)</span></label>
                        <div class="col-sm-12">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="input-file" id="fileexcel" name="fileexcel" idlabel="label-fileexcel">
                              <label id="label-fileexcel" class="custom-file-label" style="border-radius: .25rem;" for="fileexcel">Choose file</label>
                            </div>
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
              <button type="submit" class="btn btn-danger">Import</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal import -->

<!-- Modal Hapus All-->
    <div class="modal fade" id="modal-hapus-all">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" id="formHapusAll" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <h6> Apakah anda yakin ingin menghapus data terpilih?</h6>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger btn-hapus-all">Hapus</button>
            </div>
          </form>
        </div>
      <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal Hapus -->

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
<!-- <script src="https://cdn.tiny.cloud/1/6yq8fapml30gqjogz5ilm4dlea09zn9rmxh9mr8fe907tqkj/tinymce/4/tinymce.min.js"></script> -->
<script src="https://cdn.tiny.cloud/1/0twnfvrzobjdj82mvj8h3afdp101vxtvzge7eiqrbb0gwmw2/tinymce/4/tinymce.min.js"></script>

<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
<script>
  $(document).ready(function(){
    $(".btn-delete-all").on('click',function(){
      if ($('.checkbox:checked').length <= 0) {
        Swal.fire({
          html: 'Belum ada data terpilih',
          icon: 'warning',
          showConfirmButton: true
        });
      }else{        
        $("#modal-hapus-all").modal('show');
      }
    });

    $(".checkAll").on('change',function(){
      $(".checkbox").prop('checked',$(this).is(":checked"));
    });

    $(".checkbox").on('change',function(){
      if ($('.checkbox:checked').length == $('.checkbox').length) {
        document.getElementById('checkAll').checked = true;
      }else{
        document.getElementById('checkAll').checked = false;
      }
    });

    bsCustomFileInput.init();
    $(document).on('change', '.input-file', function (e) {
        var idphoto = $(this).attr('id');
        onlyExcel(idphoto);
    });


    $(".int").on('input paste', function () {
      hanyaAngkaAndMinus(this);
    });

    // bsCustomFileInput.init();
    datatablemastersoalpil("tabledata");

    //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //   placeholder: "Jenis",
    //   allowClear: true,
    //   theme: 'bootstrap4'
    // })

    // $(document).on('change', '.input-photo', function (e) {
    //     var idphoto = $(this).attr('id');
    //     onlyPhoto(idphoto);
    // });

    //Fungsi Hapus Data All
      $(document).on('click', '.btn-hapus-all', function (e) {
        var idsoal = [];
        $("input:checkbox[name=id_master_soal]:checked").each(function() {
          idsoal.push($(this).val());
        });
        var url = "<?php echo e(url('/hapusmastersoalessayall')); ?>";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'POST',
            dataType: "JSON",
            data: {"idsoal":idsoal},
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

    //Fungsi Hapus Data
    $(document).on('click', '.btn-hapus', function (e) {
        idform = $(this).attr('idform');
        var formData = new FormData($('#formHapus_' + idform)[0]);

        var url = "<?php echo e(url('/hapusmastersoalessay')); ?>/"+idform;
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

    // Fungsi Add Data
    $('#_formData').validate({
          ignore: ".ignore",
          rules: {
            // tingkat_add:{
            //   required: true
            // },
            soal_add: {
              required: true
            },
            // a_add: {
            //   required: true
            // },
            // b_add: {
            //   required: true
            // },
            // c_add: {
            //   required: true
            // },
            // d_add: {
            //   required: true
            // },
            // e_add: {
            //   required: true
            // },
            jawaban_add: {
              required: true
            },
            // pembahasan_add: {
            //   required: true
            // },
            point_add: {
              required: true
            },
            // point_b_add: {
            //   required: true
            // },
            // point_c_add: {
            //   required: true
            // },
            // point_d_add: {
            //   required: true
            // },
            // point_e_add: {
            //   required: true
            // }
          },
          messages: {
            // tingkat_add: {
            //   required: "Tingkat kesulitan tidak boleh kosong"
            // },
            soal_add: {
              required: "Soal tidak boleh kosong"
            },
            // a_add: {
            //   required: "Pilihan A tidak boleh kosong"
            // },
            // b_add: {
            //   required: "Pilihan B tidak boleh kosong"
            // },
            // c_add: {
            //   required: "Pilihan C tidak boleh kosong"
            // },
            // d_add: {
            //   required: "Pilihan D tidak boleh kosong"
            // },
            // e_add: {
            //   required: "Pilihan E tidak boleh kosong"
            // },
            jawaban_add: {
              required: "Jawaban tidak boleh kosong"
            },
            // pembahasan_add: {
            //   required: "Pembahasan tidak boleh kosong"
            // },
            point_add: {
              required: "Point Pilihan A tidak boleh kosong"
            },
            // point_b_add: {
            //   required: "Point Pilihan A tidak boleh kosong"
            // },
            // point_c_add: {
            //   required: "Point Pilihan A tidak boleh kosong"
            // },
            // point_d_add: {
            //   required: "Point Pilihan A tidak boleh kosong"
            // },
            // point_e_add: {
            //   required: "Point Pilihan A tidak boleh kosong"
            // }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            Swal.fire({
              html: "Harap isi kolom dengan bertanda *",
              icon: 'warning',
              showConfirmButton: true
            });
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          },

          submitHandler: function () {
          
            var formData = new FormData($('#_formData')[0]);

            var url = "<?php echo e(url('storemastersoalessay')); ?>";
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

    // Fungsi Add Data Excel
    $('#_formDataImport').validate({
          rules: {
            fileexcel: {
              required: true
            }
          },
          messages: {
            fileexcel: {
              required: "File excel tidak boleh kosong"
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          },

          submitHandler: function () {
          
            var formData = new FormData($('#_formDataImport')[0]);

            var url = "<?php echo e(url('/importsoalessay')); ?>";
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


<script>
    tinymce.init({
      selector: '.content_',
      plugins: [
              "advlist autolink link image lists charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
              "table contextmenu directionality emoticons paste textcolor"
      ],
      toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
      toolbar2: " | link unlink anchor | image media | forecolor backcolor  | print preview code | tiny_mce_wiris_formulaEditor",
      external_plugins: { 
        tiny_mce_wiris: 'https://www.wiris.net/demo/plugins/tiny_mce/plugin.js' 
      },
      image_advtab: true,
      height : "500",
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/master/mastersoalessay.blade.php ENDPATH**/ ?>