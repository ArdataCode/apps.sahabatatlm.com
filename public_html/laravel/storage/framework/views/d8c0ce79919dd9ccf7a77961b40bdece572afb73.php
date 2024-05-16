<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Latihan</title>
    <style>
        .table{
            width:100%;
            margin-bottom:15px;
        }
        .table tr td{
            text-align:center;
            border:1px solid black; 
            width:20%;
        }
        .nomor{
            font-weight:bold;
            display: flex;
        }
        p{
            margin-top:0px;
            margin-bottom:0px;
        }
        .radiopilgan{
            height:10px;width:10px;border:1px solid #959595;border-radius:50%
        }
    </style>
</head>
<body>
    <!-- <h6 style="position:fixed;bottom:-30px;">Tanggal Cetak : <?php echo e(Carbon\Carbon::now()->translatedFormat('l, d F Y , H:i:s')); ?></h6> -->
    <div>
        <center>
            <h2>Soal Latihan<br><?php echo e($paketsoalmst->judul); ?></h2>
        </center>
        <div style="margin-bottom:15px">
            <b>Jumlah Soal : <?php echo e(count($paketsoaldtl)); ?> Soal</b>
            <br>
            <b>Tanggal Cetak : <?php echo e(Carbon\Carbon::now()->translatedFormat('l, d F Y , H:i:s')); ?></b>
        </div>
    </div>
    <?php
    $no = 1;
    ?>

    <?php if(count($paketsoalessayktg)>0): ?>
    <center><h3 style="color:#A95CFF;margin-bottom:5px">Soal Pilihan Ganda</h3></center>
    <?php endif; ?>

    <?php $__currentLoopData = $paketsoalktg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h4 style="margin-bottom:10px;margin-top:0px">Kategori : <?php echo e($key->kategori_soal_r->judul); ?></h4>
    <?php
        $cekdata = App\Models\PaketSoalDtl::where('fk_paket_soal_ktg','=',$key->id)->inRandomOrder()->get();
    ?>
        <?php $__currentLoopData = $cekdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datadtl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table>
            <tr>
                <td class="nomor"><?php echo e($no); ?>.</td>
                <td><?php echo $datadtl->master_soal_r->soal; ?></td>
            </tr>
            <?php if($datadtl->master_soal_r->a): ?>
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td><?php echo $datadtl->master_soal_r->a; ?></td>
            </tr>
            <?php endif; ?>
            <?php if($datadtl->master_soal_r->b): ?>
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td><?php echo $datadtl->master_soal_r->b; ?></td>
            </tr>
            <?php endif; ?>
            <?php if($datadtl->master_soal_r->c): ?>
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td><?php echo $datadtl->master_soal_r->c; ?></td>
            </tr>
            <?php endif; ?>
            <?php if($datadtl->master_soal_r->d): ?>
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td><?php echo $datadtl->master_soal_r->d; ?></td>
            </tr>
            <?php endif; ?>
            <?php if($datadtl->master_soal_r->e): ?>
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td><?php echo $datadtl->master_soal_r->e; ?></td>
            </tr>
            <?php endif; ?>
        </table>
        <br>
        <?php
            $no++;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php if(count($paketsoalessayktg)>0): ?>
    <center><h3 style="color:#A95CFF;margin-bottom:5px">Soal Essay</h3></center>
    <?php endif; ?>
    <?php $__currentLoopData = $paketsoalessayktg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h4 style="margin-bottom:10px;margin-top:0px">Kategori : <?php echo e($key->kategori_soal_r->judul); ?></h4>
    <?php
        $cekdata = App\Models\PaketSoalEssayDtl::where('fk_paket_soal_essay_ktg','=',$key->id)->inRandomOrder()->get();
    ?>
        <?php $__currentLoopData = $cekdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datadtl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table>
            <tr>
                <td class="nomor"><?php echo e($no); ?>.</td>
                <td><?php echo $datadtl->master_soal_essay_r->soal; ?></td>
            </tr>
        </table>
        <?php
            $no++;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH /home/u726706882/domains/sahabatatlm.com/public_html/laravel/resources/views/pdf/SoalPilGan.blade.php ENDPATH**/ ?>