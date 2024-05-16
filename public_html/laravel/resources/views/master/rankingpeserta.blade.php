@extends('layouts.Adminlte3')

@section('header')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('layout/adminlte3/dist/css/adminlte.min.css') }}">
@endsection

@section('contentheader')
    <h1 class="m-0">Ranking Peserta</h1>
@endsection

@section('contentheadermenu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a class="_kembali" href="{{ url('paketsoalmst') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li>
    </ol>
@endsection

@section('content')
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
                            <!-- <div>
                                <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary">
                                    Ingatkan Peserta
                                </button>
                            </div> -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/rankingpeserta/' . $idOriginal) }}/export" class="btn btn-sm btn-success">
                                    <i class="fa fa-file-excel" aria-hidden="true"></i>
                                </a>
                                <form method="post" action="{{ Route('tampilkanJawaban', $idOriginal) }}" class="form-horizontal">
                                    @csrf
                                    <button class="btn btn-sm btn-success ml-1" type="submit">
                                        <i class="far fa-eye"></i>
                                        Tampilkan Semua
                                    </button>
                                </form>
                            </div>

                            <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->
                            <table id="tabledata" class="table  table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Provinsi</th>
                                        <th>Point</th>
                                        <th>Set Point</th>
                                        <th>Predikat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($udatapaket as $key)
                                        <tr>
                                            <td width="1%">{{ $loop->iteration }}</td>
                                            <td width="25%">{{ $key->user_r?->name }}</td>
                                            <td width="5%" class="_align_center">{{ $key->user_r?->provinsi_r->nama ?? 'N/A' }}</td>
                                            <td width="5%" class="_align_right">{{ $key->point }}</td>
                                            <td width="5%" class="_align_right">{{ $key->set_nilai }}</td>
                                            <td width="5%" class="_align_center">{{ $key->set_predikat }}</td>
                                            <td width="1%" class="_align_center">
                                                <div class="btn-group">
                                                    <span>
                                                        <a href="{{ url('/jawabanPeserta/' . $key->id) }}/export" download class="btn btn-sm btn-primary">
                                                            <i class="fa fa-file-excel" aria-hidden="true"></i>
                                                        </a>
                                                    </span>
                                                    @if ($key->status == 1)
                                                        <span data-toggle="tooltip" data-placement="left" title="Tampil">
                                                            <button type="button" class="btn btn-sm btn-success"><i class="far fa-eye"></i></button>
                                                        </span>
                                                    @else
                                                        <span data-toggle="tooltip" data-placement="left" title="Tidak Tampil">
                                                            <button type="button" class="btn btn-sm btn-danger"><i class="far fa-eye-slash"></i></button>
                                                        </span>
                                                    @endif
                                                    <span data-toggle="tooltip" data-placement="left" title="Ubah Data">
                                                        <button data-toggle="modal" data-target="#modal-edit-{{ $key->id }}" type="button" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></button>
                                                    </span>
                                                    <span data-toggle="tooltip" data-placement="left" title="Hapus Data">
                                                        <button data-toggle="modal" data-target="#modal-hapus-{{ $key->id }}" type="button" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    @foreach ($udatapaket as $key)
        <!-- Modal Edit -->
        <div class="modal fade" id="modal-edit-{{ $key->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="formData_{{ $key->id }}" class="form-horizontal">
                        @csrf
                        <input type="hidden" value="{{ $key->id }}" name="id_data[]">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="set_nilai_{{ $key->id }}">Set Point<span class="bintang">*</span></label>
                                <input type="text" class="form-control int" id="set_nilai_{{ $key->id }}" name="set_nilai[]" placeholder="Set Point" value="{{ $key->set_nilai }}">
                            </div>
                            <div class="form-group">
                                <label for="set_predikat_{{ $key->id }}">Set Predikat<span class="bintang">*</span></label>
                                <select class="select-predikat form-control" name="set_predikat[]" id="set_predikat_{{ $key->id }}">
                                    <option value=""></option>
                                    <option value="A+" {{ $key->set_predikat == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A" {{ $key->set_predikat == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B+" {{ $key->set_predikat == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B" {{ $key->set_predikat == 'B' ? 'selected' : '' }}>B</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_{{ $key->id }}">Tampil Ranking<span class="bintang">*</span></label>
                                <select class="status form-control" name="status[]" id="status_{{ $key->id }}">
                                    <option value=""></option>
                                    <option value="1" {{ $key->status == '1' ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ $key->status == '0' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>
                            <button type="submit" class="btn btn-danger btn-submit-data" idform="{{ $key->id }}">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Hapus -->
        <div class="modal fade" id="modal-hapus-{{ $key->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('/hapuspeserta/' . $key->id) }}" class="form-horizontal">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <h6>Apakah anda yakin ingin menghapus data ini?</h6>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('footer')
    <!-- Custom Input File -->
    <script src="{{ asset('layout/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('layout/adminlte3/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('layout/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('layout/adminlte3/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('layout/adminlte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('layout/adminlte3/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('layout/adminlte3/dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <!-- DatePicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
    <!--  Flatpickr  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <script>
        $(document).ready(function() {

            tablerankingpeserta("tabledata");

            $(".int").on('input paste', function() {
                hanyaInteger(this);
            });

            $('.select-predikat').select2({
                placeholder: "Set Predikat"
            });

            $('.status').select2({
                placeholder: "Status"
            });

            // Fungsi Ubah Data
            $(document).on('click', '.btn-submit-data', function(e) {
                idform = $(this).attr('idform');
                $('#formData_' + idform).validate({
                    rules: {
                        'set_nilai[]': {
                            required: true
                        },
                        'set_predikat[]': {
                            required: true
                        }
                    },
                    messages: {
                        'set_nilai[]': {
                            required: "Set point tidak boleh kosong"
                        },
                        'set_predikat[]': {
                            required: "Set predikat tidak boleh kosong"
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

                        var url = "{{ url('/updateranking') }}/" + idform;
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

        });
    </script>
@endsection
