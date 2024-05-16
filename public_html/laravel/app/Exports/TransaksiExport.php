<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::orderBy('created_at','desc')->get();
    }

    public function headings(): array
    {
        return [
            'No Transaksi',
            'User',
            "Paket",
            "Harga",
            "Tanggal",
            "Status",
        ];
    }

    public function map($item): array
    {
        return [
            $item->merchant_order_id,
            $item->user_r ? $item->user_r->name : '[Deleted User]',
            $item->paket_mst_r->judul,
            formatRupiahCekGratis($item->harga),
            $item->created_at->format('Y-m-d H:i:s'),
            $item->status == 1 ? 'Sudah Bayar' : 'Belum Bayar'
        ];
    }

}
