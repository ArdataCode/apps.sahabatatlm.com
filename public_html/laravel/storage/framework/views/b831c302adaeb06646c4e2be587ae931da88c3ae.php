<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
    $template = App\Models\Template::where('id','<>','~')->first();
  ?>
  <title><?php echo e($template->nama); ?></title>
  <link href="<?php echo e(asset($template->logo_kecil)); ?>" rel="icon">

  <link rel="stylesheet" href="<?php echo e(asset('css/global.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/adminlte3.css')); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/select2/css/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <?php $__env->startSection('header'); ?>        

  <?php echo $__env->yieldSection(); ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img style="border-radius:28px" class="animation__wobble" src="<?php echo e(asset($template->logo_kecil)); ?>" alt="Logo" height="75" width="auto">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
         
            <div class="media">
              <img src="<?php echo e(asset('layout/adminlte3/dist/img/user1-128x128.jpg')); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          
            <div class="media">
              <img src="<?php echo e(asset('layout/adminlte3/dist/img/user8-128x128.jpg')); ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="<?php echo e(asset('layout/adminlte3/dist/img/user3-128x128.jpg')); ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <?php echo e(ucfirst(Auth::user()->name)); ?> <i class="far fa-user"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- <span class="dropdown-item dropdown-header">Profil</span> -->
          <?php if(Auth::user()->user_level==3): ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo e(url('dashboard')); ?>" class="dropdown-item">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
          </a>
          <?php endif; ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo e(url('profil')); ?>" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profil
            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
            <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
          </a>

          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
              <?php echo csrf_field(); ?>
          </form>
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a> -->
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Logout</a> -->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('/')); ?>" class="brand-link" style="font-size:1rem">
      <img src="<?php echo e(asset($template->logo_kecil)); ?>" style="max-height: 30px;" alt="Logo" class="brand-image img-circle elevation-3">
      <span style="font-weight:500 !important;" class="brand-text font-weight-light"><?php echo e($template->nama); ?></span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(Auth::user()->photo=='' || Auth::user()->photo==NULL ? asset('image/user/unknown_user.png') : asset(Auth::user()->photo)); ?>" class="img-circle elevation-2" alt="<?php echo e(ucfirst(Auth::user()->name)); ?>">
        </div>
        <div class="info">
         
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo e(url('home')); ?>" class="nav-link <?php echo e($menu=='home' ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-header">MENU</li>

          <?php if(Auth::user()->user_level==1): ?>
          <li class="nav-item">
            <a href="<?php echo e(url('template')); ?>" class="nav-link <?php echo e($menu=='template' ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Website Setting
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="<?php echo e(url('informasi')); ?>" class="nav-link <?php echo e($menu=='informasi' ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Informasi
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo e($menu=='master' ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e($menu=='master' ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('template')); ?>" class="nav-link <?php echo e($submenu=='template' ? 'active' : ''); ?>">
                  <i class="fas fas fa-sliders-h"></i>
                  <p>
                    Website
                  </p>
                </a>
              </li> 
            </ul> -->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('masterrekening')); ?>" class="nav-link <?php echo e($submenu=='masterrekening' ? 'active' : ''); ?>">
                  <i class="fas fa-wallet"></i>
                  <p>
                    Rekening / E-Wallet
                  </p>
                </a>
              </li> 
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('kategorisoal')); ?>" class="nav-link <?php echo e($submenu=='kategorisoal' ? 'active' : ''); ?>">
                  <i class="fas fa-file-import"></i>
                  <p>
                    Bank Soal Pilihan Ganda
                  </p>
                </a>
              </li> 
            </ul>
   <!--            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('kategorisoalessay')); ?>" class="nav-link <?php echo e($submenu=='kategorisoalessay' ? 'active' : ''); ?>">
                  <i class="fas fa-file-import"></i>
                  <p>
                    Bank Soal Essay
                  </p>
                </a>
              </li> 
            </ul>-->
           
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('kategorisoalkecermatan')); ?>" class="nav-link <?php echo e($submenu=='kategorisoalkecermatan' ? 'active' : ''); ?>">
                  <i class="fas fa-file-import"></i>
                  <p>
                    Bank Soal Kecermatan
                  </p>
                </a>
              </li> 
            </ul> -->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('paketsoalmst')); ?>" class="nav-link <?php echo e($submenu=='paketsoalmst' ? 'active' : ''); ?>">
                  <i class="fas fa-file-signature"></i>
                  <p>
                    Paket Latihan
                  </p>
                </a>
              </li> 
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('paketkategori')); ?>" class="nav-link <?php echo e($submenu=='paketkategori' ? 'active' : ''); ?>">
                  <i class="fas fa-list-ol"></i>
                  <p>
                    Kategori Paket
                  </p>
                </a>
              </li> 
            </ul>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('paketsoalkecermatan')); ?>" class="nav-link <?php echo e($submenu=='paketsoalkecermatan' ? 'active' : ''); ?>">
                  <i class="fas fa-file-signature"></i>
                  <p>
                    Paket Soal Kecermatan
                  </p>
                </a>
              </li> 
            </ul> -->
          
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('paketmst')); ?>" class="nav-link <?php echo e($submenu=='paketmst' ? 'active' : ''); ?>">
                  <i class="fas fa-project-diagram"></i>
                  <p>
                    Paket Pembelian
                  </p>
                </a>
              </li> 
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('kodepotongan')); ?>" class="nav-link <?php echo e($submenu=='kodepotongan' ? 'active' : ''); ?>">
                  <i class="fas fa-percent"></i>
                  <p>
                    Voucher
                  </p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('user')); ?>" class="nav-link <?php echo e($menu=='user' ? 'active' : ''); ?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li> 
          
          <li class="nav-item <?php echo e($menu=='transaksi' ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e($menu=='transaksi' ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('listtransaksi/paket')); ?>" class="nav-link <?php echo e($submenu=='paket' ? 'active' : ''); ?>">
                  <i class="fas fa-wallet"></i>
                  <p>
                    Paket
                  </p>
                </a>
              </li> 
            </ul>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('listtransaksi/hadiah')); ?>" class="nav-link <?php echo e($submenu=='hadiah' ? 'active' : ''); ?>">
                  <i class="fas fa-wallet"></i>
                  <p>
                    Hadiah
                  </p>
                </a>
              </li> 
            </ul> -->
          
          </li>
          
          <?php endif; ?>
          <!-- <li class="nav-item">
            <a href="<?php echo e(url('affiliate')); ?>" class="nav-link <?php echo e($menu=='affiliate' ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                User Affiliate
              </p>
            </a>
          </li>  -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php $__env->startSection('contentheader'); ?>        

            <?php echo $__env->yieldSection(); ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <?php $__env->startSection('contentheadermenu'); ?>        

            <?php echo $__env->yieldSection(); ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php $__env->startSection('content'); ?>        

    <?php echo $__env->yieldSection(); ?>

    <!-- Modal Photo -->
    <div class="modal fade" id="modal-image">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modal-title-image"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="text-align:center;padding:0px">
                <a id="modal-body-href" target="_blank" href=""><img style="width:100%;height:auto" id="modal-body-image" src="" alt=""></a>
            </div>
            <!-- <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> -->
</div>
<!-- ./wrapper -->

<?php $__env->startSection('footer'); ?>        

<?php echo $__env->yieldSection(); ?>

<!-- Global -->
<script src="<?php echo e(asset('js/global.js')); ?>"></script>

<!-- Loading Overlay -->
<script src='https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js'></script>
<!-- Select2 -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/select2/js/select2.full.min.js')); ?>"></script>
<!-- CUSTOM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   $(document).ready(function(){
      $('._lazyload').lazyload();
      $('[data-toggle="tooltip"]').tooltip({
          trigger : 'hover'
      });
   });
</script>
<!-- Pooper -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
</body>
</html>
<?php /**PATH /home/u726706882/domains/sahabatatlm.com/public_html/laravel/resources/views/layouts/Adminlte3.blade.php ENDPATH**/ ?>