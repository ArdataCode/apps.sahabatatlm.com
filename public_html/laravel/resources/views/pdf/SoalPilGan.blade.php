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
    <div style="text-align:right">  
        <p style="font-size:12px"><i>{{Carbon\Carbon::now()->translatedFormat('l, d F Y , H:i:s')}}</i></p>
    </div>
    <!-- <h6 style="position:fixed;bottom:-30px;">Tanggal Cetak : {{Carbon\Carbon::now()->translatedFormat('l, d F Y , H:i:s')}}</h6> -->
    <div>
        <center>
            <h2>Soal Latihan<br>{{$paketsoalmst->judul}}</h2>
        </center>
        <div style="margin-bottom:15px">
            <b>Jumlah Soal : {{count($paketsoaldtl)}} Soal</b>
            <!-- <br>
            <b>Tanggal Cetak : {{Carbon\Carbon::now()->translatedFormat('l, d F Y , H:i:s')}}</b> -->
        </div>
    </div>
    @php
    $no = 1;
    @endphp

    @if(count($paketsoalktg)>0)
    <center><h3 style="margin-bottom:5px">Soal Pilihan Ganda</h3></center>
    @endif

    @foreach($paketsoalktg as $key)
    <h4 style="margin-bottom:10px;margin-top:0px">Kategori : {{$key->kategori_soal_r->judul}}</h4>
    @php
        $cekdata = App\Models\PaketSoalDtl::where('fk_paket_soal_ktg','=',$key->id)->inRandomOrder()->get();
    @endphp
        @foreach($cekdata as $datadtl)
        <table>
            <tr>
                <td class="nomor">{{$no}}.</td>
                <td>{!!$datadtl->master_soal_r->soal!!}</td>
            </tr>
            @if($datadtl->master_soal_r->a)
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td>{!!$datadtl->master_soal_r->a!!}</td>
            </tr>
            @endif
            @if($datadtl->master_soal_r->b)
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td>{!!$datadtl->master_soal_r->b!!}</td>
            </tr>
            @endif
            @if($datadtl->master_soal_r->c)
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td>{!!$datadtl->master_soal_r->c!!}</td>
            </tr>
            @endif
            @if($datadtl->master_soal_r->d)
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td>{!!$datadtl->master_soal_r->d!!}</td>
            </tr>
            @endif
            @if($datadtl->master_soal_r->e)
            <tr>
                <td>
                    <div class="radiopilgan"></div>
                </td>
                <td>{!!$datadtl->master_soal_r->e!!}</td>
            </tr>
            @endif
        </table>
        <br>
        @php
            $no++;
        @endphp
        @endforeach
    @endforeach
</body>
</html>