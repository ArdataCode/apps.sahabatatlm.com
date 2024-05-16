

<?php $__env->startSection('header'); ?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('layout/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('layout/adminlte3/dist/css/adminlte.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader'); ?>
    <h1 class="m-0"><?php echo e($judul); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheadermenu'); ?>
    <ol class="breadcrumb float-sm-right">
        <!-- <li class="breadcrumb-item">Master</li> -->
        <li class="breadcrumb-item active"><?php echo e($judul); ?></li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                                        <h3 class="card-title">Foto Beranda</h3>
                                      </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if($submenu == 'affiliatedtl' && Auth::user()->user_level == '1'): ?>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-8">
                                        <span class="mb-3" data-toggle="tooltip" data-placement="left"
                                            title="Tambah Data">
                                            <button data-toggle="modal" data-target="#modal-tambah" type="button"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>

                                        </span>
                                        <a href="/user/export" download class="btn btn-sm btn-success">
                                            <i class="fa fa-file-excel" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="col-4">

                                        <form method="get" action="<?php echo e(url('user')); ?>" class="form-horizontal">
                                            <div class="input-group">
                                                <input name="caridata" type="text" class="form-control"
                                                    placeholder="Cari Data">
                                                <button type="submit" class="btn btn-info">Cari</button>
                                                <a href="<?php echo e(url('user')); ?>" class="btn btn-warning">Reset</a>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if(count($data) > 0): ?>
                                <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->
                                <table id="tabledata" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username (Email)</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $totalnominal = 0;
                                        ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td width="1%">
                                                    <?php echo e($loop->iteration + ($data->currentPage() - 1) * $data->perPage()); ?>

                                                </td>
                                                <td width="1%"><?php echo e($key->username); ?></td>
                                                <td width="20%"><?php echo e($key->name); ?></td>
                                                <td width="1%" style="text-align:right">
                                                    <div class="btn-group">
                                                        <!-- <span data-toggle="tooltip" data-placement="left" title="Scan Kartu Tanda Siswa/Mahasiswa/Guru">
                                                    <button onclick="modalImage('<?php echo e($key->username); ?>','<?php echo e(asset($key->scan)); ?>')" class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i></button>
                                                </span> -->
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            title="Lihat Transaksi">
                                                            <a href="<?php echo e(url('lihattransaksi')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>"
                                                                class="btn btn-sm btn-outline-danger"><i
                                                                    class="fas fa-money"></i></a>
                                                        </span>
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            title="Lihat Hasil Ujian">
                                                            <a href="<?php echo e(url('lihathasilujian')); ?>/<?php echo e(Crypt::encrypt($key->id)); ?>"
                                                                class="btn btn-sm btn-outline-success"><i
                                                                    class="fas fa-list"></i></a>
                                                        </span>
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            title="Reset Password">
                                                            <button data-toggle="modal"
                                                                data-target="#modal-reset-<?php echo e($key->id); ?>"
                                                                type="button" class="btn btn-sm btn-outline-primary"><i
                                                                    class="fas fa-undo"></i></button>
                                                        </span>
                                                        <span data-toggle="tooltip" data-placement="left" title="Ubah Data">
                                                            <button data-toggle="modal"
                                                                data-target="#modal-edit-<?php echo e($key->id); ?>"
                                                                type="button" class="btn btn-sm btn-outline-warning"><i
                                                                    class="fas fa-edit"></i></button>
                                                        </span>
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            title="Hapus Data">
                                                            <button data-toggle="modal"
                                                                data-target="#modal-hapus-<?php echo e($key->id); ?>"
                                                                type="button" class="btn btn-sm btn-outline-danger"><i
                                                                    class="far fa-trash-alt"></i></button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($data->links()); ?>

                            <?php else: ?>
                                <br>
                                <center>Belum Ada User</center>
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
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal Edit -->
        <div class="modal fade" id="modal-edit-<?php echo e($key->id); ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="formData_<?php echo e($key->id); ?>" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <!-- <div class="card-body"> -->
                            <?php if(Auth::user()->user_level == '1'): ?>
                                <div class="form-group">
                                    <label>User Level<span class="bintang">*</span></label>
                                    <input type="text" class="form-control" placeholder="User Level"
                                        value="<?php echo e($key->nama_level); ?>" readonly>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label>Username<span class="bintang">*</span> (Akun Login)</label>
                                <input type="text" class="form-control" placeholder="Username"
                                    value="<?php echo e($key->username); ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="name_<?php echo e($key->id); ?>">Nama Lengkap<span class="bintang">*</span></label>
                                <input type="text" class="form-control" id="name_<?php echo e($key->id); ?>" name="name[]"
                                    placeholder="Nama Lengkap" value="<?php echo e($key->name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="email_<?php echo e($key->id); ?>">Email<span class="bintang">*</span></label>
                                <input type="email" class="form-control" placeholder="Email"
                                    value="<?php echo e($key->email); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_wa_<?php echo e($key->id); ?>">Nomor Whatsapp<span
                                        class="bintang">*</span></label>
                                <input type="text" class="form-control int" id="no_wa_<?php echo e($key->id); ?>"
                                    name="no_wa[]" placeholder="Nomor Whatsapp" value="<?php echo e($key->no_wa); ?>">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin_<?php echo e($key->id); ?>">Jenis Kelamin<span
                                        class="bintang">*</span></label>
                                <select class="form-control jenis_kelamin" id="jenis_kelamin_<?php echo e($key->id); ?>"
                                    name="jenis_kelamin[]">
                                    <option <?php echo e($key->jenis_kelamin == 'l' ? 'selected' : ''); ?> value="l">Laki-laki
                                    </option>
                                    <option <?php echo e($key->jenis_kelamin == 'p' ? 'selected' : ''); ?> value="p">Perempuan
                                    </option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                          <label for="asal_<?php echo e($key->id); ?>">Asal<span class="bintang">*</span></label>
                                            <select class="form-control asal" id="asal_<?php echo e($key->id); ?>" name="asal[]">
                                              <option value=""></option>
                                              <option value="1" <?php echo e($key->asal == 1 ? 'selected' : ''); ?>>Sekolah</option>
                                              <option value="2" <?php echo e($key->asal == 2 ? 'selected' : ''); ?>>Kampus</option>
                                              <option value="3" <?php echo e($key->asal == 3 ? 'selected' : ''); ?>>Instansi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="jenjang_<?php echo e($key->id); ?>">Jenjang<span class="bintang">*</span></label>
                                            <select class="form-control jenjang" id="jenjang_<?php echo e($key->id); ?>" name="jenjang[]">
                                              <option value=""></option>
                                              <option value="1" <?php echo e($key->jenjang == 1 ? 'selected' : ''); ?>>SD/Sederajat</option>
                                              <option value="2" <?php echo e($key->jenjang == 2 ? 'selected' : ''); ?>>SMP/Sederajat</option>
                                              <option value="3" <?php echo e($key->jenjang == 3 ? 'selected' : ''); ?>>SMA/Sederajat</option>
                                              <option value="4" <?php echo e($key->jenjang == 4 ? 'selected' : ''); ?>>Mahasiswa</option>
                                              <option value="5" <?php echo e($key->jenjang == 5 ? 'selected' : ''); ?>>Guru</option>
                                            </select>
                                        </div> -->
                            <!-- <div class="form-group">
                                          <label for="ttl_<?php echo e($key->id); ?>">Tanggal Lahir</label>
                                          <input type="text" class="form-control ttl" id="ttl_<?php echo e($key->id); ?>" name="ttl[]" placeholder="Tanggal Lahir" value="<?php echo e(tglEdit($key->ttl)); ?>">
                                        </div> -->
                            <div class="form-group">
                                <label for="alamat_<?php echo e($key->id); ?>">Alamat<span class="bintang">*</span></label>
                                <textarea name="alamat[]" id="alamat_<?php echo e($key->id); ?>" rows="5" class="form-control"
                                    placeholder="Alamat"><?php echo e($key->alamat); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="provinsi_<?php echo e($key->id); ?>">Provinsi<span class="bintang">*</span></label>
                                <select class="form-control form-control-lg _provinsi"
                                    id_kabupaten="kabupaten_<?php echo e($key->id); ?>"
                                    id_kecamatan="kecamatan_<?php echo e($key->id); ?>" id="provinsi_<?php echo e($key->id); ?>"
                                    name="provinsi[]">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id_prov); ?>"
                                            <?php echo e($key->provinsi == $data->id_prov ? 'selected' : ''); ?>><?php echo e($data->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="provinsi_<?php echo e($key->id); ?>">Kabupaten<span class="bintang">*</span></label>
                                <select class="form-control form-control-lg" id="kabupaten_<?php echo e($key->id); ?>"
                                    name="kabupaten[]">
                                    <?php
                                        $kab = App\Models\MasterKabupaten::where('id_prov', $key->provinsi)->get();
                                    ?>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $kab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id_kab); ?>"
                                            <?php echo e($key->kabupaten == $data->id_kab ? 'selected' : ''); ?>><?php echo e($data->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="provinsi_<?php echo e($key->id); ?>">Kecamatan<span class="bintang">*</span></label>
                                <select class="form-control form-control-lg" id="kecamatan_<?php echo e($key->id); ?>"
                                    name="kecamatan[]">
                                    <?php
                                        $kec = App\Models\MasterKecamatan::where('id_kab', $key->kabupaten)->get();
                                    ?>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $kec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id_kec); ?>"
                                            <?php echo e($key->kecamatan == $data->id_kec ? 'selected' : ''); ?>><?php echo e($data->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                          <label>Scan Kartu Tanda Siswa/Mahasiswa/Guru <span class="input-keterangan">(jpg/jpeg/png)</span></label>
                                          <div class="input-group">
                                            <div class="custom-file">
                                              <input type="file" class="input-photo custom-file-input" id="scan_<?php echo e($key->id); ?>" name="scan[]" idlabel="label-scan-<?php echo e($key->id); ?>">
                                              <label id="label-scan-<?php echo e($key->id); ?>" class="custom-file-label" style="border-radius: .25rem;">Pilih file</label>
                                            </div>
                                          </div>
                                        </div>   -->
                            <!-- <div class="form-group">
                                          <label for="is_active_<?php echo e($key->id); ?>">Status<span class="bintang">*</span></label>
                                            <select class="form-control" id="is_active_<?php echo e($key->id); ?>" name="is_active[]">
                                              <option <?php echo e($key->is_active == 1 ? 'selected' : ''); ?> value="1">Aktif</option>
                                              <option <?php echo e($key->is_active == 0 ? 'selected' : ''); ?> value="0">Non-Aktif</option>
                                            </select>
                                        </div> -->

                            <!-- /.form-group -->
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>
                            <button type="submit" class="btn btn-danger btn-submit-data"
                                idform="<?php echo e($key->id); ?>">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal edit -->

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
                            <h6> Apakah anda ingin menghapus user <?php echo e($key->name); ?>?</h6>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger btn-hapus"
                                idform="<?php echo e($key->id); ?>">Hapus</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.Modal Hapus -->

        <!-- Modal Hapus -->
        <div class="modal fade" id="modal-reset-<?php echo e($key->id); ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6> Apakah anda ingin me-reset password <?php echo e($key->name); ?>? <b>(Password akan disamakan dengan
                                username)</b></h6>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-danger btn-reset-pwd"
                            iduser="<?php echo e($key->id); ?>">Ya</button>
                    </div>
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
                        <?php if($submenu == 'user'): ?>
                            <input type="hidden" value="2" name="user_level_add">
                        <?php elseif($submenu == 'affiliate' && Auth::user()->user_level == '1'): ?>
                            <input type="hidden" value="3" name="user_level_add">
                        <?php elseif($submenu == 'affiliate' && Auth::user()->user_level == '3'): ?>
                            <input type="hidden" value="4" name="user_level_add">
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="name_add">Nama Lengkap<span class="bintang">*</span></label>
                            <input type="text" class="form-control" id="name_add" name="name_add"
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="email_add">Email<span class="bintang">*</span></label>
                            <input type="email" class="form-control" id="email_add" name="email_add"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="no_wa_add">Nomor Whatsapp<span class="bintang">*</span></label>
                            <input type="text" class="form-control int" id="no_wa_add" name="no_wa_add"
                                placeholder="Nomor Whatsapp">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin_add">Jenis Kelamin<span class="bintang">*</span></label>
                            <select class="form-control jenis_kelamin" id="jenis_kelamin_add" name="jenis_kelamin_add">
                                <option value=""></option>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                                          <label for="asal_add">Asal<span class="bintang">*</span></label>
                                            <select class="form-control asal" id="asal_add" name="asal_add">
                                              <option value=""></option>
                                              <option value="1">Sekolah</option>
                                              <option value="2">Kampus</option>
                                              <option value="3">Instansi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="jenjang_add">Jenjang<span class="bintang">*</span></label>
                                            <select class="form-control jenjang" id="jenjang_add" name="jenjang_add">
                                              <option value=""></option>
                                              <option value="1">SD/Sederajat</option>
                                              <option value="2">SMP/Sederajat</option>
                                              <option value="3">SMA/Sederajat</option>
                                              <option value="4">Mahasiswa</option>
                                              <option value="5">Guru</option>
                                            </select>
                                        </div> -->
                        <!-- <div class="form-group">
                                          <label for="ttl_add">Tanggal Lahir</label>
                                          <input type="text" class="form-control ttl" id="ttl_add" name="ttl_add" placeholder="Tanggal Lahir">
                                        </div> -->
                        <div class="form-group">
                            <label for="alamat_add">Alamat<span class="bintang">*</span></label>
                            <textarea name="alamat_add" id="alamat_add" rows="5" class="form-control" placeholder="Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="provinsi_add">Provinsi<span class="bintang">*</span></label>
                            <select class="form-control form-control-lg _provinsi" id_kabupaten="kabupaten_add"
                                id_kecamatan="kecamatan_add" id="provinsi_add" name="provinsi_add">
                                <option value=""></option>
                                <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id_prov); ?>"><?php echo e($data->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provinsi_add">Kabupaten<span class="bintang">*</span></label>
                            <select class="form-control form-control-lg" id="kabupaten_add" name="kabupaten_add">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provinsi_add">Kecamatan<span class="bintang">*</span></label>
                            <select class="form-control form-control-lg" id="kecamatan_add" name="kecamatan_add">
                                <option value=""></option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                                          <label>Scan Kartu Tanda Siswa/Mahasiswa/Guru<span class="bintang">*</span> <span class="input-keterangan">(jpg/jpeg/png)</span></label>
                                          <div class="input-group">
                                            <div class="custom-file">
                                              <input type="file" class="input-photo custom-file-input" id="scan_add" name="scan_add" idlabel="label-scan-add">
                                              <label id="label-scan-add" class="custom-file-label" style="border-radius: .25rem;">Pilih file</label>
                                            </div>
                                          </div>
                                        </div>   -->
                        <br>
                        <div class="form-group">
                            <label for="provinsi_add">Password<span class="bintang">*</span> sama dengan email</label>
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
    <!-- /.modal edit -->

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
        $(document).ready(function() {
            $('.jenis_kelamin').select2({
                placeholder: "Pilih Jenis Kelamin"
            });
            $('.asal').select2({
                placeholder: "Pilih Asal"
            });
            $('.jenjang').select2({
                placeholder: "Pilih Jenjang"
            });
            // NIS
            $(".int").on('input paste', function() {
                hanyaAngka(this);
            });

            $(".ttl").flatpickr({
                dateFormat: "d-m-Y",
                disableMobile: "true"
            });

            $('._provinsi').each(function(i, obj) {
                var id_provinsi = $(this).attr('id');
                var id_kabupaten = $(this).attr('id_kabupaten');
                var id_kecamatan = $(this).attr('id_kecamatan');
                getKabupaten(id_provinsi, id_kabupaten, id_kecamatan, '<?php echo e(url('/getKabupaten')); ?>',
                    '<?php echo e(asset('/image/global/loading.gif')); ?>');
                getKecamatan(id_kabupaten, id_kecamatan, '<?php echo e(url('/getKecamatan')); ?>',
                    '<?php echo e(asset('/image/global/loading.gif')); ?>');
            });


            // bsCustomFileInput.init();
            // datatableUser("tabledata");



            //       $('[data-toggle="tooltip"]').tooltip({
            //     trigger : 'hover'
            // });

            // Fungsi Reset Password
            $(document).on('click', '.btn-reset-pwd', function(e) {
                iduser = $(this).attr('iduser');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: "<?php echo e(url('resetuserpass')); ?>",
                    data: "iduser=" + iduser,
                    async: false,
                    success: function(response) {
                        if (response.status === true) {
                            Swal.fire({
                                html: response.message,
                                icon: 'success',
                                showConfirmButton: false
                            });
                            reload(1000);
                        } else {
                            Swal.fire({
                                html: response.message,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    }
                });
            });

            //Initialize Select2 Elements
            // $('.select2bs4').select2({
            //   placeholder: "Jenis",
            //   allowClear: true,
            //   theme: 'bootstrap4'
            // })
            bsCustomFileInput.init();

            $(document).on('change', '.input-photo', function(e) {
                var idphoto = $(this).attr('id');
                onlyPhoto(idphoto);
            });

            //Fungsi Hapus Data
            $(document).on('click', '.btn-hapus', function(e) {
                idform = $(this).attr('idform');
                var formData = new FormData($('#formHapus_' + idform)[0]);

                var url = "<?php echo e(url('/hapususerlist')); ?>/" + idform;
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
                    beforeSend: function() {
                        $.LoadingOverlay("show");
                    },
                    success: function(response) {
                        if (response.status == true) {
                            Swal.fire({
                                html: response.message,
                                icon: 'success',
                                showConfirmButton: false
                            });
                            reload(1000);
                        } else {
                            Swal.fire({
                                html: response.message,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    },
                    error: function(xhr, status) {
                        alert('Error!!!');
                    },
                    complete: function() {
                        $.LoadingOverlay("hide");
                    }
                });
            });


            // Fungsi Ubah Data
            $(document).on('click', '.btn-submit-data', function(e) {
                idform = $(this).attr('idform');
                $('#formData_' + idform).validate({
                    rules: {
                        'name[]': {
                            required: true
                        },
                        'no_wa[]': {
                            required: true,
                        },
                        'jenis_kelamin[]': {
                            required: true
                        },
                        'asal[]': {
                            required: true
                        },
                        'jenjang[]': {
                            required: true
                        },
                        'alamat[]': {
                            required: true
                        },
                        'provinsi[]': {
                            required: true
                        },
                        'kabupaten[]': {
                            required: true
                        },
                        'kecamatan[]': {
                            required: true
                        },
                        'is_active[]': {
                            required: true
                        }
                    },
                    messages: {
                        'name[]': {
                            required: "Nama lengkap tidak boleh kosong"
                        },
                        'no_wa[]': {
                            required: "Nomor whatsapp tidak boleh kosong"
                        },
                        'jenis_kelamin[]': {
                            required: "Jenis kelamin tidak boleh kosong"
                        },
                        'asal[]': {
                            required: "Asal tidak boleh kosong"
                        },
                        'jenjang[]': {
                            required: "Jenjang tidak boleh kosong"
                        },
                        'alamat[]': {
                            required: "Alamat tidak boleh kosong"
                        },
                        'provinsi[]': {
                            required: "Provinsi tidak boleh kosong"
                        },
                        'kabupaten[]': {
                            required: "Kabupaten tidak boleh kosong"
                        },
                        'kecamatan[]': {
                            required: "Kecamatan tidak boleh kosong"
                        },
                        'is_active[]': {
                            required: "Status lahir tidak boleh kosong"
                        }
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        if (element.hasClass('_select2')) {
                            element.parent().addClass('select2-error');
                            error.addClass('invalid-feedback');
                            element.closest('.form-group').append(error);
                        } else {
                            error.addClass('invalid-feedback');
                            element.closest('.form-group').append(error);
                        }
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                        if (element.tagName.toLowerCase() == 'select') {
                            var x = element.getAttribute('id');
                            y = $('#' + x).parent().addClass('select2-error');
                        }
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                        if (element.tagName.toLowerCase() == 'select') {
                            var x = element.getAttribute('id');
                            y = $('#' + x).parent().removeClass('select2-error');
                        }
                    },

                    submitHandler: function() {

                        var formData = new FormData($('#formData_' + idform)[0]);

                        var url = "<?php echo e(url('/updateuserlist')); ?>/" + idform;
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            }
                        });
                        $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: "JSON",
                            data: formData,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                $.LoadingOverlay("show");
                            },
                            success: function(response) {
                                if (response.status == true) {
                                    Swal.fire({
                                        html: response.message,
                                        icon: 'success',
                                        showConfirmButton: false
                                    });
                                    reload(1000);
                                } else {
                                    Swal.fire({
                                        html: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Ok'
                                    });
                                }
                            },
                            error: function(xhr, status) {
                                alert('Error!!!');
                            },
                            complete: function() {
                                $.LoadingOverlay("hide");
                            }
                        });
                    }
                });
            });

            // Fungsi Add Data
            $('#_formData').validate({
                rules: {
                    user_level_add: {
                        required: true
                    },
                    name_add: {
                        required: true
                    },
                    no_wa_add: {
                        required: true
                    },
                    email_add: {
                        required: true,
                        email: true
                    },
                    jenis_kelamin_add: {
                        required: true
                    },
                    asal_add: {
                        required: true
                    },
                    jenjang_add: {
                        required: true
                    },
                    alamat_add: {
                        required: true
                    },
                    provinsi_add: {
                        required: true
                    },
                    kabupaten_add: {
                        required: true
                    },
                    kecamatan_add: {
                        required: true
                    },
                    scan_add: {
                        required: true
                    }
                },
                messages: {
                    user_level_add: {
                        required: "User level tidak boleh kosong"
                    },
                    no_wa_add: {
                        required: "Nomor whatsapp tidak boleh kosong"
                    },
                    name_add: {
                        required: "Nama Lengkap tidak boleh kosong"
                    },
                    email_add: {
                        required: "Email tidak boleh kosong",
                        email: "Masukkan alamat email yang benar"
                    },
                    jenis_kelamin_add: {
                        required: "Jenis kelamin tidak boleh kosong"
                    },
                    asal_add: {
                        required: "Asal tidak boleh kosong"
                    },
                    jenjang_add: {
                        required: "Jenjang tidak boleh kosong"
                    },
                    alamat_add: {
                        required: "Alamat tidak boleh kosong"
                    },
                    provinsi_add: {
                        required: "Provinsi tidak boleh kosong"
                    },
                    kabupaten_add: {
                        required: "Kabupaten tidak boleh kosong"
                    },
                    kecamatan_add: {
                        required: "Kecamatan tidak boleh kosong"
                    },
                    scan_add: {
                        required: "Scan tidak boleh kosong"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    if (element.hasClass('_select2')) {
                        element.parent().addClass('select2-error');
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    } else {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                    if (element.tagName.toLowerCase() == 'select') {
                        var x = element.getAttribute('id');
                        y = $('#' + x).parent().addClass('select2-error');
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    if (element.tagName.toLowerCase() == 'select') {
                        var x = element.getAttribute('id');
                        y = $('#' + x).parent().removeClass('select2-error');
                    }
                },

                submitHandler: function() {

                    var formData = new FormData($('#_formData')[0]);

                    var url = "<?php echo e(url('/storeuserlist')); ?>";
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
                        beforeSend: function() {
                            $.LoadingOverlay("show");
                        },
                        success: function(response) {
                            if (response.status == true) {
                                Swal.fire({
                                    html: response.message,
                                    icon: 'success',
                                    showConfirmButton: false
                                });
                                reload(1000);
                            } else {
                                Swal.fire({
                                    html: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            }
                        },
                        error: function(xhr, status) {
                            alert('Error!!!');
                        },
                        complete: function() {
                            $.LoadingOverlay("hide");
                        }
                    });
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Adminlte3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u726706882/domains/apps.sahabatatlm.com/public_html/laravel/resources/views/master/userlist.blade.php ENDPATH**/ ?>