<?php

namespace App\Exports;

use App\Models\KategoriSoal;
use App\Models\MasterSoal;
use App\Models\PaketSoalDtl;
use App\Models\PaketSoalKtg;
use App\Models\PaketSoalMst;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SoalExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
    public function collection()
    {
        $data = PaketSoalKtg::where('fk_paket_soal_mst',$this->id)->pluck('fk_kategori_soal');
        $soal = MasterSoal::whereIn('fk_kategori_soal',$data)->get();
        return $soal;
    } 
    // dd($data->kategori_soal_r);
    public function headings(): array
    {
        return [
            "Soal",
            "Jawaban",
            "A",
            "B",
            "C",
            "D",
            "E",
            "Pembahasan"
        ];
    }

    public function map($item): array
    {
        
        return [
            strip_tags($item->soal),
            $item->jawaban,
            strip_tags($item->a),
            strip_tags($item->b),
            strip_tags($item->c),
            strip_tags($item->d),
            strip_tags($item->e),
            strip_tags($item->pembahasan)
        ];
    }

}
