

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
<h1 class="m-0">Detail Soal</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a class="_kembali" href="<?php echo e(url('paketsoalktg')); ?>/<?php echo e($data->fk_paket_soal_mst); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li>
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
                      <div class="col-sm-10">: <?php echo e($data->kategori_soal_r->judul); ?></div>
                  </div>
                  <!-- <div class="row">
                      <div class="col-sm-2">KKM</div>
                      <div class="col-sm-10">: <?php echo e($data->kkm); ?></div>
                  </div> -->
                  <div class="row">
                      <div class="col-sm-2">Jumlah Soal</div>
                      <div class="col-sm-10">: <?php echo e($data->jumlah_soal); ?> Butir</div>
                  </div>
              </div>
              <div class="card-body">
                 <?php if(count($mastersoal)>0): ?>
                  <span>
                    <button id="btn_simpan_data" type="button" class="btn btn-md btn-primary btn-add-absolute">
                      Simpan
                    </button>
                  </span>
                  <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->
                  <form method="post" id="_formData" class="form-horizontal">
                  <?php echo csrf_field(); ?>
                  <table id="tabledata" class="table  table-striped">
                    <thead>
                    <tr>
                      <th style="text-align:left"><input type="checkbox" id="checkAll" class="checkAll" checked> Ceklis Semua</th>
                      <th>Soal</th>
                      <th>Pilihan A</th>
                      <th>Pilihan B</th>
                      <th>Pilihan C</th>
                      <th>Pilihan D</th>
                      <th>Pilihan E</th>
                      <th>Jawaban</th>
                      <th>Pembahasan</th>
                      <!-- <th>Tingkat Kesulitan</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $mastersoal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $cekdata = App\Models\PaketSoalDtl::where('fk_paket_soal_ktg',$idpaketsoalktg)->where('fk_master_soal',$key->id)->first();
                          if($cekdata){
                            $valcek = 'checked';
                          }else{
                            $valcek = '';
                          }
                      ?>

                      <?php if($valcek==''): ?>
                      <script>
                        document.getElementById('checkAll').checked = false;
                      </script>
                      <?php endif; ?>
                      
                      <tr>
                        <td width="1%"><input type="checkbox" name="id_master_soal[]" class="checkbox" value="<?php echo e($key->id); ?>" <?php echo e($valcek); ?>></td>
                        <td width="1%"><?php echo $key->soal; ?></td>
                        <td width="1%"><?php echo $key->a; ?></td>
                        <td width="1%"><?php echo $key->b; ?></td>
                        <td width="1%"><?php echo $key->c; ?></td>
                        <td width="1%"><?php echo $key->d; ?></td>
                        <td width="1%"><?php echo $key->e; ?></td>
                        <td width="1%"><?php echo $key->jawaban; ?></td>
                        <td width="1%"><?php echo $key->pembahasan; ?></td>
                        <!-- <td width="1%"><?php echo e($key->nama_tingkat); ?></td> -->
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                  </form>
                  <?php else: ?>
                  <center>Belum Ada Bank Soal</center>
                  <?php endif; ?>
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
<script>
  $(document).ready(function(){


    datatablekatesoal("tabledata");

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

    // Fungsi Simpan Data
    $(document).on('click', '#btn_simpan_data', function (e) {
      var formData = new FormData($('#_formData')[0]);
      var url = "<?php echo e(url('storepaketsoaldtl')); ?>/<?php echo e($data->fk_paket_soal_mst); ?>/<?php echo e($idpaketsoalktg); ?>";
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
                  reload_url(1000,"<?php echo e(url('paketsoalktg')); ?>/<?php echo e($data->fk_paket_soal_mst); ?>");
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

  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1017870.cloudwaysapps.com/hnkjpyncjk/public_html/laravel/resources/views/master/paketsoaldtl.blade.php ENDPATH**/ ?>