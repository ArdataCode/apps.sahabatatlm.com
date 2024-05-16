

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
<h1 class="m-0">Ubah Data</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a class="_kembali" href="<?php echo e(url('mastersoalessay')); ?>/<?php echo e($idkategori); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <form method="post" id="formData" class="form-horizontal">
                <?php echo csrf_field(); ?>
                      <div class="modal-body">
                        <!-- <div class="form-group">
                        <label>Tingkat Kesulitan<span class="bintang">*</span></label>
                        <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tingkat_edit" value="1" <?php echo e($data->tingkat==1 ? 'checked' : ''); ?>>
                          <label class="form-check-label">Easy</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tingkat_edit" value="2" <?php echo e($data->tingkat==2 ? 'checked' : ''); ?>>
                          <label class="form-check-label">Medium</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tingkat_edit" value="3" <?php echo e($data->tingkat==3 ? 'checked' : ''); ?>>
                          <label class="form-check-label">Hard</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tingkat_edit" value="4" <?php echo e($data->tingkat==4 ? 'checked' : ''); ?>>
                          <label class="form-check-label">Very Hard</label>
                        </div>
                        <br>
                      </div> -->
                      <div class="form-group">
                          <label for="soal">Soal<span class="bintang">*</span></label>
                          <textarea id="soal" name="soal[]" placeholder="Soal" rows="10" class="form-control content_"><?php echo $data->soal; ?></textarea>
                      </div>
                    
                      <div class="form-group">
                          <label for="jawaban">Jawaban<span class="bintang">*</span></label>
                          <textarea name="jawaban[]" id="jawaban" rows="5" class="form-control content_" placeholder="Jawaban"><?php echo $data->jawaban; ?></textarea>  
                      </div>  
                      <div class="form-group">
                        <label for="point">Point<span class="bintang">*</span></label>
                        <input type="number" class="form-control int" id="point" name="point[]" placeholder="Point" value="<?php echo e($data->point); ?>">
                      </div>
              
                    </div>
                    <div class="modal-footer justify-content-between">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> -->
                        <button type="submit" class="btn btn-danger btn-submit-data">Simpan</button>
                        <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>
                    </div>
                  </form>

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
<script>
  $(document).ready(function(){

    bsCustomFileInput.init();
    $(document).on('change', '.input-file', function (e) {
        var idphoto = $(this).attr('id');
        onlyExcel(idphoto);
    });

    $(".int").on('input paste', function () {
      hanyaAngkaAndMinus(this);
    });

    // Fungsi Ubah Data
    $(document).on('click', '.btn-submit-data', function (e) {
        $('#formData').validate({
          ignore: ".ignore",
          rules: {
            // tingkat_edit: {
            //   required: true
            // },
            'soal[]': {
              required: true
            },
            // 'a[]': {
            //   required: true
            // },
            // 'b[]': {
            //   required: true
            // },
            // 'c[]': {
            //   required: true
            // },
            // 'd[]': {
            //   required: true
            // },
            // 'e[]': {
            //   required: true
            // },
            // 'point_a[]': {
            //   required: true
            // },
            // 'point_b[]': {
            //   required: true
            // },
            // 'point_c[]': {
            //   required: true
            // },
            // 'point_d[]': {
            //   required: true
            // },
            // 'point_e[]': {
            //   required: true
            // },
            'jawaban[]': {
              required: true
            },
            'point[]': {
              required: true
            },
            // 'pembahasan[]': {
            //   required: true
            // }
          },
          messages: {
            // tingkat_edit: {
            //   required: "Tingkat kesulitan tidak boleh kosong"
            // },
            'soal[]': {
              required: "Soal tidak boleh kosong"
            },
            // 'a[]': {
            //   required: "Pilihan A tidak boleh kosong"
            // },
            // 'b[]': {
            //   required: "Pilihan B tidak boleh kosong"
            // },
            // 'c[]': {
            //   required: "Pilihan C tidak boleh kosong"
            // },
            // 'd[]': {
            //   required: "Pilihan D tidak boleh kosong"
            // },
            // 'e[]': {
            //   required: "Pilihan E tidak boleh kosong"
            // },
            // 'point_a[]': {
            //   required: "Point Pilihan A tidak boleh kosong"
            // },
            // 'point_b[]': {
            //   required: "Point Pilihan B tidak boleh kosong"
            // },
            // 'point_c[]': {
            //   required: "Point Pilihan C tidak boleh kosong"
            // },
            // 'point_d[]': {
            //   required: "Point Pilihan D tidak boleh kosong"
            // },
            // 'point_e[]': {
            //   required: "Point Pilihan E tidak boleh kosong"
            // },
            'jawaban[]': {
              required: "Jawaban tidak boleh kosong"
            },
            'point[]': {
              required: "Point tidak boleh kosong"
            },
            // 'pembahasan[]': {
            //   required: "Pembahasan tidak boleh kosong"
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
          
            var formData = new FormData($('#formData')[0]);

            var url = "<?php echo e(url('/updatemastersoalessay')); ?>/<?php echo e($data->id); ?>";
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
                        reload_url(1000,"<?php echo e(url('mastersoalessay')); ?>/<?php echo e($idkategori); ?>");
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

  });
</script>

<script>
    tinymce.init({
      selector: ".content_",
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
      height : "350",
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
<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/master/editsoalessay.blade.php ENDPATH**/ ?>