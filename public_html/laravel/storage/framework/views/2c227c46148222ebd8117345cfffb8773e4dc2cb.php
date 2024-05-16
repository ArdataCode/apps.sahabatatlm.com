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
<h1 class="m-0">Transaksi <?php echo e(ucwords($jenis)); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
<ol class="breadcrumb float-sm-right">
  <!-- <li class="breadcrumb-item"><a class="_kembali" href="<?php echo e(url('user')); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li> -->
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <?php if($jenis=="paket"): ?>
    <div id="event"><br>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-8"></div>
                <div class="col-4">
                  <form method="get" action="<?php echo e(url('listtransaksi/paket')); ?>" class="form-horizontal">
                    <div class="input-group">
                      <input name="caridata" type="text" class="form-control" placeholder="Cari Data" value="<?php echo e(app('request')->input('caridata')); ?>">
                      <button type="submit" class="btn btn-info">Cari</button>
                      <a href="<?php echo e(url('listtransaksi/paket')); ?>" class="btn btn-warning">Reset</a>
                      <a href="<?php echo e(url('listtransaksi/paket/export')); ?>" class="btn btn-success ml-2">Export Excel</a> <!-- Tombol Export -->
                    </div>
                  </form>
                </div>
              </div>
              <table id="tabledata" class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No.Transaksi</th>
                    <th>User</th>
                    <th>Paket</th>
                    <th>Harga</th>
                    <th>Tanggal Transaksi</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td width="1%"><?php echo e($loop->iteration); ?></td>
                    <td width="25%"><?php echo e($key->merchant_order_id); ?></td>
                    <td><?php echo e($key->user_r ? $key->user_r->name : "[Deleted User]"); ?></td>
                    <td width="5%"><?php echo e($key->paket_mst_r->judul); ?></td>
                    <td width="5%" class="_align_right"><?php echo e(formatRupiahCekGratis($key->harga)); ?></td>
                    <td width="20%" class="_align_center"><?php echo e(Carbon\Carbon::parse($key->created_at)->translatedFormat('l, d F Y , H:i:s')); ?></td>
                    <td width="5%" class="_align_right">
                      <div class="btn-group">
                        <?php if($key->harga > 0): ?>
                        <!-- <span data-toggle="tooltip" data-placement="left" title="Bukti Bayar">
                            <button onclick="modalImage('<?php echo e($key->merchant_order_id); ?>','<?php echo e(asset($key->bukti)); ?>')" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                        </span> -->
                        <?php endif; ?>
                        <?php if($key->status == 1): ?>
                        <span>
                          <button style="white-space:nowrap" data-toggle="modal" data-target="#modal-edit-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-success">Sudah Bayar</button>
                        </span>
                        <?php else: ?>
                        <span>
                          <button style="white-space:nowrap" data-toggle="modal" data-target="#modal-edit-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-danger">Belum Bayar</button>
                        </span>
                        <?php endif; ?>
                        <span data-toggle="tooltip" data-placement="left" title="Hapus Transaksi">
                          <button data-toggle="modal" data-target="#modal-hapus-<?php echo e($key->id); ?>" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                        </span>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <?php echo e($data->links()); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php elseif($jenis=="hadiah"): ?>
    <!-- Your code for hadiah -->
    <?php endif; ?>
  </div>
</section>
<!-- /.content -->

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal Edit Pembayaran -->
<div class="modal fade" id="modal-edit-<?php echo e($key->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Edit Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form untuk edit pembayaran -->
        <form action="<?php echo e(url('updatestatuspembayaran', $key->id)); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PATCH'); ?>
          <div class="form-group">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" class="form-control" required>
              <option value="1" <?php echo e($key->status == 1 ? 'selected' : ''); ?>>Sudah Bayar</option>
              <option value="0" <?php echo e($key->status == 0 ? 'selected' : ''); ?>>Belum Bayar</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
  $(document).ready(function() {

    // datatablelihattran("tabledata");

    // datatablelihathadiah("tabledatahadiah");
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/apps.sahabatatlm.com/public_html/laravel/resources/views/master/listtransaksi.blade.php ENDPATH**/ ?>