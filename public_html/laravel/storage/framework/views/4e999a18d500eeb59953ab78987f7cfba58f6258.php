
<!-- partial -->
<?php $__env->startSection('content'); ?>
<style>
  .select2-container--default .select2-selection--single {
      border: 1px solid #CED4DA !important;
  }
  .select2-container .select2-selection--single .select2-selection__rendered {
    padding-left: 0px !important;
  }
  .custom-file-label {
    padding: 0.375rem 20px;
  }
  .akun-saya .nav-item{
    width:100%;
    margin-right:0px;
  }
  .akun-saya .nav-item .btn{
    text-align:left;
    border-radius:0px;
    border:0px;
    padding: 1rem 1.75rem;
  }
  .akun-saya .nav-pills{
    border-bottom:unset;
  }
  .akun-saya .nav-link.active{
    background: #EFFFF1 !important;
    color: #106571 !important;
    font-weight: bold;
  }
  .akun-saya .nav-link:hover{
    background: #EFFFF1 !important;
    
  }
  .akun-saya .nav-link:focus{
    box-shadow:unset !important;
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- DatePicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card card-border">
        <div class="card-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Akun Saya</li>
            </ol>
          </nav>
          <p class="card-description">
            <h3 class="font-weight-bold mb-3"><b>Akun Saya</b></h3>
            <div class="row">
            <div class="col-md-4 grid-margin">
              <div class="card card-border">
              <div class="card-body" style="padding: 0px;">
									<div class="d-flex align-items-center pb-3" style="padding: 1.25rem 1.25rem;">
										<a target="_blank" href="<?php echo e(Auth::user()->photo ? asset(Auth::user()->photo) : asset('image/global/unknown_user.png')); ?>"><img class="img-sm rounded-circle" src="<?php echo e(Auth::user()->photo ? asset(Auth::user()->photo) : asset('image/global/unknown_user.png')); ?>" alt="profile"></a>
										<div class="ms-3">
											<h6 class="mb-1"><?php echo e(Auth::user()->name); ?></h6>
											<small class="text-muted mb-0"><?php echo e(Auth::user()->username); ?></small>
										</div>
									</div>
                  <div class="akun-saya">
                    <ul class="nav nav-pills" role="tablist">
                      <li class="nav-item">
                        <a class="btn btn-sm btn-light nav-link active" data-toggle="pill" href="#akuntab"><i class="fa fa-address-book-o"></i> Akun</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn btn-sm btn-light nav-link" data-toggle="pill" href="#profiltab"><i class="fa fa-user-o"></i> Profil</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn btn-sm btn-light nav-link" data-toggle="pill" href="#passwordtab"><i class="ti-key"></i> Ubah Password</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn btn-sm btn-light nav-link" data-toggle="pill" href="#vouchertab"><i class="ti-credit-card"></i> Voucher</a>
                      </li>
                    </ul>
                  </div>
								</div>
              </div>
            </div>
            <div class="col-md-8 grid-margin transparent">
                <div class="tab-content tab-hasil-ujian">
                  <div id="akuntab" class="tab-pane active">
                    <form id="formAkun" class="form-horizontal" method="post">
                    <?php echo csrf_field(); ?>
                      <div class="form-group">
                          <label for="name" class=""><b>Nama</b></label>
                          <input name="name" type="text" class="form-control" id="name" placeholder="Nama" value="<?php echo e(Auth::user()->name); ?>">
                      </div>
                      <div class="form-group"`>
                          <label for="username" class=""><b>Username/Email</b></label>
                          <input readonly type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo e(Auth::user()->username); ?>">
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                  </div>
                  <div id="profiltab" class="tab-pane">
                    <form id="formProfil" class="form-horizontal" method="post">
                    <?php echo csrf_field(); ?>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="no_wa" class=""><b>Telepon</b></label>
                              <input name="no_wa" type="text" class="form-control int" id="no_wa" placeholder="Telepon" value="<?php echo e(Auth::user()->no_wa); ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="jurusan" class=""><b>Jurusan</b></label>
                              <input name="jurusan" type="text" class="form-control" id="jurusan" placeholder="Jurusan" value="<?php echo e(Auth::user()->jurusan); ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="no_wa" class=""><b>Tanggal Lahir</b></label>
                        <input type="text" class="form-control" name="ttl" id="ttl" placeholder="Tanggal Lahir" value="<?php echo e(tglEdit(Auth::user()->ttl)); ?>"> 
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="no_wa" class=""><b>Provinsi</b></label><br>
                            <select class="form-control form-control-lg _select2" id="provinsi" name="provinsi" style="width:100%">
                                <option value=""></option>
                                <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id_prov); ?>" <?php echo e(Auth::user()->provinsi==$data->id_prov ? 'selected' : ''); ?>><?php echo e($data->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select> 
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="no_wa" class=""><b>Kabupaten</b></label><br>
                            <select class="form-control form-control-lg _select2" id="kabupaten" name="kabupaten" style="width:100%">
                              <?php
                                $kab = App\Models\MasterKabupaten::where('id_prov',Auth::user()->provinsi)->get();
                              ?>
                              <option value=""></option>
                              <?php $__currentLoopData = $kab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($data->id_kab); ?>" <?php echo e(Auth::user()->kabupaten==$data->id_kab ? 'selected' : ''); ?>><?php echo e(ucwords(strtolower($data->nama))); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="no_wa" class=""><b>Kecamatan</b></label><br>
                            <select class="form-control form-control-lg _select2" id="kecamatan" name="kecamatan" style="width:100%">
                              <?php
                              $kec = App\Models\MasterKecamatan::where('id_kab',Auth::user()->kabupaten)->get();
                              ?>
                              <option value=""></option>
                              <?php $__currentLoopData = $kec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($data->id_kec); ?>" <?php echo e(Auth::user()->kecamatan==$data->id_kec ? 'selected' : ''); ?>><?php echo e($data->nama); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="jenis_kelamin" class="">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" style="width:100%">
                              <option value="">-- Pilih Jenis Kelamin --</option>
                              <option <?php echo e(Auth::user()->jenis_kelamin=='l' ? 'selected' : ''); ?> value="l">Laki-laki</option>
                              <option <?php echo e(Auth::user()->jenis_kelamin=='p' ? 'selected' : ''); ?> value="p">Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="">Photo <span class="input-keterangan">(jpg/jpeg/png)</span></label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="input-foto" id="photo" name="photo" idlabel="label-photo">
                              <label id="label-photo" class="custom-file-label" style="border-radius: .25rem;" for="photo">Choose file</label>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="pendidikan" class=""><b>Pendidikan</b></label>
                          <textarea name="pendidikan" class="form-control" cols="30" rows="10" placeholder="Pendidikan"><?php echo e(Auth::user()->pendidikan); ?></textarea>
                      </div>
                    
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                  </div>
                  <div id="passwordtab" class="tab-pane">
                  <form method="post" id="formPassword" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="password" class=""><b>Password Sekarang</b></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Sekarang" style="border-top-right-radius:0px !important;border-bottom-right-radius:0px !important">
                            <div class="input-group-append showpassword" idpassword="password">
                              <span class="input-group-text"><i id="iconpassword" class="icon-circle-minus"></i></span>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="passwordbaru" class=""><b>Password Baru</b></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="Password Baru" style="border-top-right-radius:0px !important;border-bottom-right-radius:0px !important">
                            <div class="input-group-append showpassword" idpassword="passwordbaru">
                              <span class="input-group-text"><i id="iconpasswordbaru" class="icon-circle-minus"></i></span>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ulangipassword" class=""><b>Ulangi Password Baru</b></label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="ulangipassword" id="ulangipassword" placeholder="Ulangi Password Baru" style="border-top-right-radius:0px !important;border-bottom-right-radius:0px !important">
                            <div class="input-group-append showpassword" idpassword="ulangipassword">
                              <span class="input-group-text"><i id="iconulangipassword" class="icon-circle-minus"></i></span>
                            </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                  </div>
                  <div id="vouchertab" class="tab-pane">
                    <div class="accordion accordion-multi-colored" id="accordion" role="tablist">
                      <?php $__empty_1 = true; $__currentLoopData = $voucher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <div class="card">
                        <div class="card-header p-3" role="tab" id="heading-<?php echo e($key->id); ?>">
                          <h6 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-<?php echo e($key->id); ?>" aria-expanded="false" aria-controls="collapse-<?php echo e($key->id); ?>">
                              <b style="font-size:30px;font-weight:bold"><?php echo e($key->kode); ?></b> (Voucher promo <?php echo e($key->tipe==1 ? formatRupiah($key->jumlah) : $key->jumlah."%"); ?>)
                            </a>
                          </h6>
                        </div>
                        <div id="collapse-<?php echo e($key->id); ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo e($key->id); ?>" data-parent="#accordion" style="">
                          <div class="card-body">
                            <?php echo e($key->ket); ?>

                          </div>
                        </div>
                      </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <center><img class="mb-3 img-no" src="<?php echo e(asset('image/global/no-voucher.png')); ?>" alt=""></center>
                      <br>
                      <center>Tidak ada voucher promo yang tersedia</center>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<!-- jQuery -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jquery-validation -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>
<!-- Custom Input File -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!--  Flatpickr  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

<script>
  $(document).ready(function(){

    bsCustomFileInput.init();

    $("#ttl").flatpickr({
      dateFormat: "d-m-Y",
      disableMobile: "true"
    });

    $('#jenis_kelamin').select2({
        placeholder: "Jenis Kelamin"
    });

    getKabupaten('provinsi','kabupaten','kecamatan','<?php echo e(url("/getKabupaten")); ?>','<?php echo e(asset("/image/global/loading.gif")); ?>');
        getKecamatan('kabupaten','kecamatan','<?php echo e(url("/getKecamatan")); ?>','<?php echo e(asset("/image/global/loading.gif")); ?>');

    $(".int").on('input paste', function () {
      hanyaAngka(this);
    });

    $(".showpassword").click(function(){
    var idpassword = $(this).attr('idpassword');
    var typepassword = $("#"+idpassword).attr('type');
    if(typepassword=="password"){
      $("#"+idpassword).attr('type','text');
      $("#icon"+idpassword).attr('class','icon-eye');
    }else{
      $("#"+idpassword).attr('type','password');
      $("#icon"+idpassword).attr('class','icon-circle-minus');
    }
  });

    $(document).on('change', '.input-foto', function (e) {
        var idphoto = $(this).attr('id');
        onlyPhoto(idphoto);
    });

    $('#formAkun').validate({
      rules: {
        name :{
          required:true
        }
      },
      messages: {
        name : {
          required: "Nama tidak boleh kosong"
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

        var formData = new FormData($('#formAkun')[0]);

        var url = "<?php echo e(url('/updateUserAkun')); ?>";
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
                // $.LoadingOverlay("show");
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
                // $.LoadingOverlay("hide");
            }
        });

        }

    });

    $('#formProfil').validate({
      rules: {
        name :{
          required:true
        },
        // no_wa :{
        //   required:true
        // },
        // provinsi :{
        //   required:true
        // },
        // kabupaten :{
        //   required:true
        // },
        // kecamatan :{
        //   required:true
        // },
        jenis_kelamin:{
          required:true
        },
        photo: {
            extension: "jpeg|jpg|png"
        },
      },
      messages: {
        jenis_kelamin: {
          required: "Jenis Kelamin tidak boleh kosong"
        },
        name : {
          required: "Nama tidak boleh kosong"
        },
        // no_wa : {
        //   required: "Telepon tidak boleh kosong"
        // },
        // provinsi : {
        //   required: "Provinsi tidak boleh kosong"
        // },
        // kabupaten : {
        //   required: "Kabupaten tidak boleh kosong"
        // },
        // kecamatan : {
        //   required: "Kecamatan tidak boleh kosong"
        // },
        photo: {
          extension: "Masukkan format file yang sesuai"
        },
    
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

        var formData = new FormData($('#formProfil')[0]);

        var url = "<?php echo e(url('/updateUserProfil')); ?>";
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
                // $.LoadingOverlay("show");
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
                // $.LoadingOverlay("hide");
            }
        });

        }

    });


    $('#formPassword').validate({
    rules: {
      password: {
        // required: true
      },
      passwordbaru: {
        required: true,
        minlength: 4,
      },
      ulangipassword: {
        required: true,
        equalTo : "#passwordbaru"
      },
    },
    messages: {
      password: {
        required: "Password sekarang tidak boleh kosong"
      },
      passwordbaru: {
        required: "Password baru tidak boleh kosong",
        minlength:"Minimal 4 character"
      },
      ulangipassword: {
        required: "Ulangi password baru tidak boleh kosong",
        equalTo: "Harus sama dengan password baru"
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

            var formData = new FormData($('#formPassword')[0]);

            var url = "<?php echo e(url('/updateUserPassword')); ?>";
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
                    // $.LoadingOverlay("show");
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
                    // $.LoadingOverlay("hide");
                }
            });   
    }
  });

  });
</script>
<!-- Loading Overlay -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/sahabatatlm.com/public_html/laravel/resources/views/user/profileuser.blade.php ENDPATH**/ ?>