<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = User::orderBy('user_level','asc')->get();
        return $user;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'No WA',
            'Provinsi', //ambil dari : $user->provinsi_r->nama;
            'Tanggal Daftar',
            // tambahkan header sesuai dengan atribut yang ingin Anda ekspor
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            (string) $user->no_wa . ' ',
            $user->provinsi_r->nama,
            $user->created_at->format('Y-m-d H:i:s'),
            // tambahkan atribut sesuai dengan yang ingin Anda ekspor
        ];
    }
}
