<?php

namespace App\Exports;

use App\Models\UMapelMst;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UjianExport implements FromCollection,WithHeadings, WithMapping
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $upaketsoalmst = UMapelMst::select('id','judul','point','kkm','bagi_jawaban','jenis_penilaian')->find($this->id);
        // dd($);
        return $upaketsoalmst->u_paket_soal_dtl_r;
    }

    public function headings(): array
    {
        return [
            'No',
            "Point",
            "Jawaban",
            "Jawaban Benar",
            "Soal",
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
            $item->no_soal,
            $item->jawaban_user == $item->jawaban ? $item->max_point : "0",
            $item->jawaban_user,
            $item->jawaban,
            strip_tags($item->soal),
            strip_tags($item->a),
            strip_tags($item->b),
            strip_tags($item->c),
            strip_tags($item->d),
            strip_tags($item->e),
            strip_tags($item->pembahasan)
        ];
    }

}



// dd($upaketsoalmst->u_paket_soal_dtl_r);
