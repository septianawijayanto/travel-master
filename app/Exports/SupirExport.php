<?php

namespace App\Exports;

use App\Supir;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;



class SupirExport implements FromCollection,  WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return supir::all();
    }
    public function map($supir): array
    {
        return [
            $supir->nama_supir,
            $supir->alamat,
            $supir->jenis_kelamin,
            $supir->status,
            $supir->no_hp,
            $supir->jadwal->tujuan
        ];
    }
    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Alamat',
            'Jenis Kelamin',
            'Status',
            'No Hp',
            'Tujuan'
        ];
    }
}
