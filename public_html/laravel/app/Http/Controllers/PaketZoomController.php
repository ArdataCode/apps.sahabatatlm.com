<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaketZoom;
use App\Models\PaketMst;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Auth;

class PaketZoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($idmst)
    {
        $menu = 'master';
        $submenu='paketmst';
        $datamst = PaketMst::find($idmst);
        $data = PaketZoom::where('fk_paket_mst',$idmst)->get();
        $data_param = [
            'menu','submenu','data','idmst','datamst'
        ];
        return view('master/paketzoom')->with(compact($data_param));
    }

    public function store(Request $request)
    {
        $data['fk_paket_mst'] = $request->fk_paket_mst;
        $data['judul'] = $request->judul_add;
        $data['link'] = $request->link_add;
        $data['ket'] = $request->ket_add;
        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $createdata = PaketZoom::create($data);
        if($createdata){
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $data['judul'] = $request->judul[0];
        $data['link'] = $request->link[0];
        $data['ket'] = $request->ket[0];
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $updatedata = PaketZoom::find($id)->update($data);

        if($updatedata){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }
    public function destroy($id)
    {
        $data['deleted_by'] = Auth::id();
        $data['deleted_at'] = Carbon::now()->toDateTimeString();
        $updateData = PaketZoom::find($id)->update($data);
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
