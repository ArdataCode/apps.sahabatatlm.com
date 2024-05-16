<?php

namespace App\Exports;

use App\Models\UMapelMst;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RankingExport implements FromCollection, WithHeadings, WithMapping
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
        return UMapelMst::where('fk_mapel_mst', $this->id)->orderBy('point','desc')->get();
    }
    public function headings(): array
    {
        return [
            'Id',
            "Nama Lengkap",
            "Provinsi",
            "Point",
            "Set Point",
            "Predikat"
        ];
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->user_r?->name,
            $item->user_r?->provinsi_r->nama,
            $item->point ? $item->point: '0',
            $item->set_nilai ?$item->set_nilai: '0',
            $item->set_predikat ?? '-'
        ];
    }
}
