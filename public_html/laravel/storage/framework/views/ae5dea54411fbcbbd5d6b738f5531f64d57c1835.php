<table>
    <tbody>
        <tr>
            <td>
               Paket
                : <?php echo e($datapaket->judul); ?>

            </td>
        </tr>
    </tbody>
</table>
<table>
    <!-- <thead>
        <tr>
            <th colspan="4" style="text-align:center">HASIL KERJA</th>
        </tr>
    </thead> -->
    <tbody>
        <tr>
            <!-- <td style="text-align:center">NO</td> -->
            <td style="text-align:center">NO</td>
            <td style="text-align:center">NAMA</td>
            <?php $__currentLoopData = $datapaket->paket_soal_ktg_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td style="text-align:center"><?php echo e($key->kategori_soal_r->judul); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td style="text-align:center">Poin Total</td>
            <td style="text-align:center">Ranking</td>
            <td style="text-align:center">Keterangan</td>
        </tr>
    <?php
        $no = 1;
    ?>
    <?php $__currentLoopData = $udatapaket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key->user_r): ?>
        <tr>
            <td style="text-align:center"><?php echo e($no); ?></td>
            <td><?php echo e($key->user_r->name); ?></td>
            <?php
                $gagal = 0;
            ?> 
            <?php $__currentLoopData = $key->u_paket_soal_ktg_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyktg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if($keyktg->point < $keyktg->kkm){
                    $gagal = 1;
                }else{
                    $gagal = 0;
                }
            ?>
            <td style="text-align:center">
                <span><?php echo e($keyktg->point); ?></span>
            </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td style="text-align:center"><?php echo e($key->set_nilai); ?></td>
            <td style="text-align:center"><?php echo e($no); ?></td>
            <td style="text-align:center"><?php echo e($gagal==1 ? "Tidak Lulus" : "Lulus"); ?></td>
        </tr>
        <?php
            $no++;
        ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/u726706882/domains/sahabatatlm.com/public_html/laravel/resources/views/excel/nilaipeserta.blade.php ENDPATH**/ ?>