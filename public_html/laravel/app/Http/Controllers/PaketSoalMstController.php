<?php

namespace App\Http\Controllers;

use App\Exports\RankingExport;
use App\Exports\SoalExport;
use App\Exports\UjianExport;
use Excel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KategoriSoal;
use App\Models\PaketSoalMst;
use App\Models\UMapelMst;
use App\Models\PaketHadiah;
use App\Models\PaketSoalDtl;
use App\Models\PaketSoalKtg;
use App\Models\MasterSoal;
use App\Models\Keranjang;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Support\Facades\Crypt;

class PaketSoalMstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = 'master';
        $submenu = 'paketsoalmst';
        $data = PaketSoalMst::orderBy('created_at', 'desc')->get();
        $data_param = [
            'menu', 'submenu', 'data'
        ];

        return view('master/paketsoalmst')->with(compact($data_param));
    }

    public function store(Request $request)
    {
        $data['judul'] = $request->judul_add;
        $data['bagi_jawaban'] = $request->bagi_jawaban_add;

        if ($request->tryout_add == 1) {
            $data['mulai'] = datetimestore($request->mulai_add);
            $data['selesai'] = datetimestore($request->selesai_add);
            if ($data['mulai'] >= $data['selesai']) {
                return response()->json([
                    'status' => false,
                    'message' => 'Waktu salah, harap cek kembali!'
                ]);
            }
            $start = new Carbon($data['mulai']);
            $end = new Carbon($data['selesai']);
            $diff = $start->diffInMinutes($end);
            $data['waktu'] = $diff;
        } else {
            $data['waktu'] = $request->waktu_add;
        }

        if ($files = $request->file("banner_add")) {
            $destinationPath = 'upload/mapel/banner/';
            $file = 'Banner_' . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $data['banner'] = $destinationPath . $file;
        }

        $data['jenis_penilaian'] = 1;
        $data['kkm'] = $request->kkm_add;
        $data['ket'] = $request->ket_add;
        $data['tryout'] = $request->tryout_add;
        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $createdata = PaketSoalMst::create($data);
        if ($createdata) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $data['judul'] = $request->judul[0];
        $data['bagi_jawaban'] = $request->bagi_jawaban[0];

        if ($request->tryout[0] == 1) {
            $data['mulai'] = datetimestore($request->mulai[0]);
            $data['selesai'] = datetimestore($request->selesai[0]);
            if ($data['mulai'] >= $data['selesai']) {
                return response()->json([
                    'status' => false,
                    'message' => 'Waktu salah, harap cek kembali!'
                ]);
            }
            $start = new Carbon($data['mulai']);
            $end = new Carbon($data['selesai']);
            $diff = $start->diffInMinutes($end);
            $data['waktu'] = $diff;
        } else {
            $data['waktu'] = $request->waktu[0];
        }

        if ($request->file("banner")) {
            if ($files = $request->file("banner")[0]) {
                $destinationPath = 'upload/event/banner/';
                $file = 'Banner_' . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file);
                $data['banner'] = $destinationPath . $file;
            }
        }

        $data['kkm'] = $request->kkm[0];
        $data['ket'] = $request->ket[0];
        $data['tryout'] = $request->tryout[0];
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $updatedata = PaketSoalMst::find($id)->update($data);

        if ($updatedata) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function destroy($id)
    {
        // Cari data yang akan dihapus
        $peserta = UMapelMst::find($id);
        if (!$peserta) {
            return response()->json([
                'status' => false,
                'message' => 'Peserta tidak ditemukan'
            ]);
        }

        // Hapus data dari tabel UMapelMst
        $peserta->delete();

            return redirect()->back()->with('success', 'Data peserta berhasil dihapus');

    }

    public function indexktg($idpaketmst)
    {
        $menu = 'master';
        $submenu = 'paketsoalmst';
        $datamst = PaketSoalMst::find($idpaketmst);
        $arr = PaketSoalKtg::where('fk_paket_soal_mst', $idpaketmst)->pluck('fk_kategori_soal')->all();
        $ktgsoal = KategoriSoal::whereNotIn('id', $arr)->get();
        $data = PaketSoalKtg::where('fk_paket_soal_mst', $idpaketmst)->get();
        $data_param = [
            'menu', 'submenu', 'data', 'ktgsoal', 'idpaketmst', 'datamst'
        ];
        return view('master/paketsoalktg')->with(compact($data_param));
    }

    public function storektg(Request $request)
    {
        $data['fk_paket_soal_mst'] = $request->fk_paket_soal_mst;
        $data['fk_kategori_soal'] = $request->fk_kategori_soal_add;

        $cekdata = PaketSoalKtg::where('fk_paket_soal_mst', $request->fk_paket_soal_mst)->where('fk_kategori_soal', $request->fk_kategori_soal_add)->first();
        if ($cekdata) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori soal sudah ada pada paket ini, silahkan isi kategori lainnya!'
            ]);
        }

        $data['kkm'] = $request->kkm_add;
        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $createdata = PaketSoalKtg::create($data);
        if ($createdata) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function updatektg(Request $request, $id)
    {
        $data['kkm'] = $request->kkm[0];
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $updatedata = PaketSoalKtg::find($id)->update($data);

        if ($updatedata) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function destroyktg($id)
    {
        $getdata = PaketSoalKtg::find($id);
        $data['deleted_by'] = Auth::id();
        $data['deleted_at'] = Carbon::now()->toDateTimeString();
        PaketSoalKtg::find($id)->update($data);
        PaketSoalDtl::where('fk_paket_soal_ktg', $id)->update($data);

        $updatedatamst['total_soal'] = count(PaketSoalDtl::where('fk_paket_soal_mst', $getdata->fk_paket_soal_mst)->get());
        PaketSoalMst::find($getdata->fk_paket_soal_mst)->update($updatedatamst);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function indexdtl($idpaketsoalktg)
    {
        $menu = 'master';
        $submenu = 'paketsoalmst';
        $data = PaketSoalKtg::find($idpaketsoalktg);
        $mastersoal = MasterSoal::where('fk_kategori_soal', $data->fk_kategori_soal)->get();
        $data_param = [
            'menu', 'submenu', 'data', 'mastersoal', 'idpaketsoalktg'
        ];
        return view('master/paketsoaldtl')->with(compact($data_param));
    }

    public function storedtl(Request $request, $idmst, $idktg)
    {
        if ($request->id_master_soal) {
            PaketSoalDtl::where('fk_paket_soal_mst', $idmst)->where('fk_paket_soal_ktg', $idktg)->forceDelete();
            foreach ($request->id_master_soal as $key) {
                $data['fk_master_soal'] = $key;
                $data['fk_paket_soal_mst'] = $idmst;
                $data['fk_paket_soal_ktg'] = $idktg;
                $data['created_by'] = Auth::id();
                $data['created_at'] = Carbon::now()->toDateTimeString();
                $data['updated_by'] = Auth::id();
                $data['updated_at'] = Carbon::now()->toDateTimeString();
                PaketSoalDtl::create($data);
            }
            $updatedataktg['jumlah_soal'] = count(PaketSoalDtl::where('fk_paket_soal_ktg', $idktg)->get());
            PaketSoalKtg::find($idktg)->update($updatedataktg);

            $updatedatamst['total_soal'] = count(PaketSoalDtl::where('fk_paket_soal_mst', $idmst)->get());
            PaketSoalMst::find($idmst)->update($updatedatamst);

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Soal belum dipilih'
            ]);
        }
    }

    public function rankingpeserta($id)
    {
        $idOriginal = $id;
        $id = Crypt::decrypt($id);

        $menu = "master";
        $submenu = "paketsoalmst";
        $datapaket = PaketSoalMst::find($id);

        $udatapaket = UMapelMst::where('fk_mapel_mst', $id)->where('is_mengerjakan', 0)->orderBy('set_nilai', 'desc')->get();

        $data_param = [
            'submenu', 'menu', 'datapaket', 'udatapaket', 'idOriginal'
        ];
        return view('master/rankingpeserta')->with(compact($data_param));
    }

    public function rankingpesertaExport($id)
    {
        $decryptedId = Crypt::decrypt($id);

        $map = PaketSoalMst::find($decryptedId);
        return Excel::download(new RankingExport($decryptedId), "Ranking Peserta - $map->judul.xlsx");
    }

    public function tampilkanJawaban($id)
    {
        $decryptedId = Crypt::decrypt($id);

        UMapelMst::where('fk_mapel_mst', $decryptedId)->update(['status' => 1]);

        return redirect()->back();
    }

    public function exportktg($id)
    {
        $map = PaketSoalMst::find($id);
        return Excel::download(new SoalExport($id), "Soal - $map->judul.xlsx");
    }

    public function jawabanPesertaExport($id)
    {
        $upaketsoalmst = UMapelMst::find($id);

        return Excel::download(new UjianExport($id), "Ujian - " . $upaketsoalmst->user_r->name . "- " . $upaketsoalmst->judul . ".xlsx");
    }

    public function updateranking(Request $request)
    {
        $id = $request->id_data[0];
        $data['set_nilai'] = $request->set_nilai[0];
        $data['set_predikat'] = $request->set_predikat[0];
        $data['status'] = $request->status[0];
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $updatedata = UMapelMst::find($id)->update($data);

        if ($updatedata) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function pakethadiah($id)
    {
        $idmapel = Crypt::decrypt($id);
        $menu = "master";
        $submenu = "paketsoalmst";
        $data = PaketHadiah::where('fk_mapel_mst', $idmapel)->get();
        $data_param = [
            'submenu', 'menu', 'data', 'idmapel'
        ];

        return view('master/hadiah')->with(compact($data_param));
    }

    public function storehadiah(Request $request)
    {
        $data['fk_mapel_mst'] = Crypt::decrypt($request->fk_mapel_mst);
        $data['judul'] = $request->judul_add;
        $data['harga'] = $request->harga_add;
        $data['berat'] = $request->berat_add;
        $data['ket'] = $request->ket_add;
        if ($files = $request->file("gambar_add")) {
            $destinationPath = 'upload/pakethadiah/gambar/';
            $file = 'gambar_' . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $data['foto'] = $destinationPath . $file;
        }
        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $createdata = PaketHadiah::create($data);
        if ($createdata) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function updatehadiah(Request $request)
    {
        $id = Crypt::decrypt($request->iddata[0]);
        $data['judul'] = $request->judul[0];
        $data['harga'] = $request->harga[0];
        $data['berat'] = $request->berat[0];
        $data['ket'] = $request->ket[0];
        if ($request->file("gambar")) {
            if ($files = $request->file("gambar")[0]) {
                $destinationPath = 'upload/pakethadiah/gambar/';
                $file = 'gambar_' . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file);
                $data['foto'] = $destinationPath . $file;
            }
        }
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $updatedata = PaketHadiah::find($id)->update($data);

        if ($updatedata) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function destroyhadiah(Request $request)
    {
        $id = Crypt::decrypt($request->iddata[0]);

        $cekdata = Keranjang::where('fk_paket_hadiah_id', $id)->first();
        if ($cekdata) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak dapat dihapus'
            ]);
        }
        $data['deleted_by'] = Auth::id();
        $data['deleted_at'] = Carbon::now()->toDateTimeString();
        PaketHadiah::find($id)->update($data);
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
