

<?php $__env->startSection('header'); ?>
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/fontawesome-free/css/all.min.css')); ?>">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/dist/css/adminlte.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader'); ?>
<h1 class="m-0">Home</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
<ol class="breadcrumb float-sm-right">
    <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
    <li class="breadcrumb-item active"><?php echo e(Auth::user()->user_level==1 ? "Super Admin" : "Admin Affiliate"); ?></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content home">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                <h3><?php echo e(count($user)); ?></h3>
                <p><?php echo e(Auth::user()->user_level==1 ? "User" : "User Affiliate"); ?></p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
                <?php if(Auth::user()->user_level==1): ?>
                <a href="<?php echo e(url('user')); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                <?php else: ?>
                <a href="<?php echo e(url('affiliate')); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('layout/adminlte3/dist/js/adminlte.js')); ?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-mousewheel/jquery.mousewheel.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-mapael/jquery.mapael.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-mapael/maps/usa_states.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/chart.js/Chart.min.js')); ?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('layout/adminlte3/dist/js/demo.js')); ?>"></script>
<script>
  $(document).ready(function(){
    $('.absensi').on('show.bs.tab', function (e) { 
      $.LoadingOverlay("show");	
      $('html, body').animate({
          scrollTop: $(".absensi_content").offset().top
      }, 1000);
      $.LoadingOverlay("hide");
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1124801.cloudwaysapps.com/kgxqsgujwy/public_html/laravel/resources/views/home/admin.blade.php ENDPATH**/ ?>