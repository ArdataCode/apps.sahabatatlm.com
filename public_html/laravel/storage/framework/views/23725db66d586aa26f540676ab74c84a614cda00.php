

<?php $__env->startSection('content'); ?>
<?php
    $template = App\Models\Template::where('id','<>','~')->first();
?>
<style>
    .code{
        color:#025ade;
        font-weight:bold;
    }
    .input-foto-error .custom-file-label{
      border: 1px solid red;
    }
</style>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css"/>
<div class="content-wrapper">
    <div class="main">
        <div class="row">
            <div class="col-md-2 align-items-stretch">
            </div>

            <div class="col-md-8 align-items-stretch">
              <div class="row">

              <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    

                    <h5 class="text-primary"><i>No.Pesanan : <?php echo e($transaksi->merchant_order_id); ?></i></h5>
                     <?php if($transaksi->harga>0): ?>
                      <center class="mt-5 mb-3"><h3><u>Cara Pembayaran</u></h3></center>
                      <h4 class="mb-1">Pembayaran dapat dilakukan ke salah satu metode pembayaran dibawah ini:</h4>
                      <!-- <code style="padding:15px 0px">Bayar Sebelum : <?php echo e(Carbon\Carbon::parse($transaksi->expired)->addSeconds(1)->translatedFormat('l, d F Y , H:i:s')); ?></code> -->
                      <br>
                      <h5 class="card-title">Jumlah yang harus dibayar:</h5>
                      <h1 style="text-align:center;color:#025ade;font-weight: bold;"><?php echo e(formatRupiahCekGratis($transaksi->harga)); ?></h1>
                      <br>
                      <h5 class="card-title">Metode Pembayaran:</h5>

                      <!-- <p class="card-description">
                        Add class <code>.icon-lg</code>, <code>.icon-md</code>, <code>.icon-sm</code>
                      </p> -->
                      <div class="table-responsive">
                        <div class="d-none d-md-block d-lg-block">
                          <table class="table table-borderless table-sm">
                            <tbody>
                            <tr>
                                <td colspan="2" style="text-align:center;background:antiquewhite;border-radius: 8px;"><h4 class="my-2">Transfer Bank</h4></td>
                            </tr>
                            <?php $__currentLoopData = $rek->where('kategori',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datarek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="_bankrek"><?php echo e($datarek->nama); ?> <code class="code">(<?php echo e($datarek->partner); ?>)</code></td>
                                <td class="_rek"><?php echo e($datarek->no); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $rek->where('kategori',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datarek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="2" style="text-align:center;background:antiquewhite;border-radius: 8px;"><h4 class="my-2">E-Wallet</h4></td>
                            </tr>
                            <tr>
                                <td class="_bankrek"><?php echo e($datarek->nama); ?> <code class="code">(<?php echo e($datarek->partner); ?>)</code></td>
                                <td class="_rek"><?php echo e($datarek->no); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <!-- <tr>
                                <td class="_bankrek">BANK BRI</td>
                                <td class="_rek">12345678910</td>
                            </tr>
                            <tr>
                                <td class="_bankrek">BANK BNI</td>
                                <td class="_rek">12345678910</td>
                            </tr>
                            <tr>
                                <td class="_bankrek">PERMATA BANK</td>
                                <td class="_rek">12345678910</td>
                            </tr>
                            <tr>
                                <td class="_bankrek">BANK MANDIRI</td>
                                <td class="_rek">12345678910</td>
                            </tr> -->
                            </tbody>
                        </table>
                      </div>
                      <br>
                      <div class="d-block d-md-none d-lg-none">
                          <table class="table table-borderless">
                              <tbody>
                              <tr>
                                <td style="text-align:center;background:antiquewhite;border-radius: 8px;padding:0.1rem"><code><h4>Transfer Bank</h4></code></td>
                              </tr>
                              <tr>
                                <td></td>
                              </tr>
                              <?php $__currentLoopData = $rek->where('kategori',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datarek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td class="_bankrek2"><?php echo e($datarek->nama); ?> <code>(<?php echo e($datarek->partner); ?>)</code></td>
                              </tr>
                              <tr>
                                  <td class="_rek2"><?php echo e($datarek->no); ?></td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td style="text-align:center;background:antiquewhite;border-radius: 8px;padding:0.1rem"><code><h4>E-Wallet</h4></code></td>
                              </tr>
                              <tr>
                                <td></td>
                              </tr>
                              <?php $__currentLoopData = $rek->where('kategori',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datarek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td class="_bankrek2"><?php echo e($datarek->nama); ?> <code>(<?php echo e($datarek->partner); ?>)</code></td>
                              </tr>
                              <tr>
                                  <td class="_rek2"><?php echo e($datarek->no); ?></td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <!-- <tr>
                                  <td class="_bankrek2">BANK BRI</td>
                              </tr>
                              <tr>
                                  <td class="_rek2">12345678910</td>
                              </tr>
                              <tr>
                                  <td class="_bankrek2">BANK BNI</td>
                              </tr>
                              <tr>
                                  <td class="_rek2">12345678910</td>
                              </tr>
                              <tr>
                                  <td class="_bankrek2">PERMATA BANK</td>
                                </tr>
                              <tr>
                                  <td class="_rek2">12345678910</td>
                              </tr>
                              <tr>
                                  <td class="_bankrek2">BANK MANDIRI</td>
                              </tr>
                              <tr>
                                  <td class="_rek2">12345678910</td>
                              </tr> -->
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <br>
                    <hr>
                    <?php if($transaksi->status==0): ?>
                    <center class="mt-5 mb-3"><h3>Upload Bukti Bayar</h3></center>

                    <form id="formBuktiBayar" class="form-horizontal" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e(Crypt::encrypt($transaksi->id)); ?>" name="id_transaksi">
                        <div class="form-group row" style="align-items:center">
                            <!-- <label class="py-0 col-sm-12 col-form-label font-weight-bold">Upload Bukti Bayar<br><span class="input-keterangan">(jpg/jpeg/png)</span></label> -->
                            <div class="col-sm-12">
                            <label class="mb-2">Bukti bayar dapat diupload pada input dibawah ini<br><span class="input-keterangan"><i>(Format : jpg/jpeg/png/pdf)</i></span></label>
                            <div class="form-group mb-2">
                                <div class="custom-file">
                                <input type="file" class="input-foto" id="photo" name="photo" idlabel="label-photo">
                                <label id="label-photo" class="custom-file-label" style="border-radius: .25rem;" for="photo">Pilih file</label>
                                </div>
                            </div> 
                            <?php if($transaksi->bukti): ?>
                            <small>Lihat bukti upload sebelumnya <a style="color:red" target="_blank" href="<?php echo e(asset($transaksi->bukti)); ?>">disini</a>  </small>
                        <?php endif; ?>
                            </div>
                        </div>

                       

                        <div class="col-md-12 grid-margin" style="text-align:center">
                            <button type="submit" class="btn btn-primary btn-icon-text">
                                <i class="ti-back-left btn-icon-prepend"></i>                                                    
                                UPLOAD BUKTI PEMBAYARAN <?php echo e($transaksi->bukti ? "KEMBALI" : ""); ?>

                            </button>   
                        </div>

                        <!-- <div class="col-md-12 grid-margin" style="text-align:center">
                            <a href="https://api.whatsapp.com/send?phone=<?php echo e($template->no_hp); ?>&text=Halo Admin Saya <?php echo e(Auth::user()->name); ?> (<?php echo e(Auth::user()->username); ?>) Mau Upload Bukti Pembayaran dengan Order ID <?php echo e($transaksi->merchant_order_id); ?>" target="_blank" class="btn btn-primary btn-icon-text">
                            <i class="ti-back-left btn-icon-prepend"></i>                                                    
                            UPLOAD BUKTI PEMBAYARAN
                            </a>   
                        </div> -->
                    </form>
                    <?php else: ?>
                    <center>
                        <code>Anda sudah melakukan pembayaran</code>
                    </center>
                    <?php endif; ?>
                    
                    <?php else: ?>
                    <center>
                        <code>Harap tunggu atau hubungi admin untuk konfirmasi pendaftaran</code>
                    </center>
                    <?php endif; ?>
                    </div>
                  </div>
                </div>

               

              </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('layout/adminlte3/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>
<!-- Custom Input File -->
<script src="<?php echo e(asset('layout/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<script>
  $(document).ready(function(){
    bsCustomFileInput.init();

    $(document).on('change', '.input-foto', function (e) {
        var idphoto = $(this).attr('id');
        onlyPhotoPdf(idphoto);
    });

        $('#formBuktiBayar').validate({
            rules: {
                photo: {
                    required:true,
                    extension: "jpeg|jpg|png|pdf"
                },
            },
            messages: {
                photo: {
                required: "Belum ada file terpilih, harap pilih file terlebih dahulu",
                extension: "Masukkan format file yang sesuai"
                },
            
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                if (element.hasClass('select')) {     
                    element.parent().addClass('select2-error');
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                }else if (element.hasClass('input-foto')){
                    element.parent().addClass('input-foto-error');
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                }else {                                      
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
                if(element.tagName.toLowerCase()=='select'){
                var x = element.getAttribute('id');
                $('#'+x).parent().addClass('select2-error');
                }else if(element.tagName.toLowerCase()=='input'){
                var x = element.getAttribute('class');
                var z = element.getAttribute('id');
                if(x=="input-foto is-invalid"){
                    $('#'+z).parent().addClass('input-foto-error');
                }
                }
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                if(element.tagName.toLowerCase()=='select'){
                var x = element.getAttribute('id');
                $('#'+x).parent().removeClass('select2-error');
                }else if(element.tagName.toLowerCase()=='input'){
                var x = element.getAttribute('class');
                var z = element.getAttribute('id');
                if(x=="input-foto"){
                    $('#'+z).parent().removeClass('input-foto-error');
                }
                }
            },

            submitHandler: function () {

                var formData = new FormData($('#formBuktiBayar')[0]);

                var url = "<?php echo e(url('/updateBuktiBayar')); ?>";
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
                            title: "Upload Berhasil",
                            html: response.message,
                            icon: 'success',
                            showConfirmButton: true
                            }).then((result) => {
                                reload_url(500,"<?php echo e(url('pembelian')); ?>");
                            });
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
<?php echo $__env->make('layouts.Skydash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1124801.cloudwaysapps.com/kgxqsgujwy/public_html/laravel/resources/views/user/detailbayar.blade.php ENDPATH**/ ?>