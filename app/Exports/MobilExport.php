<?php

namespace App\Exports;

use App\Mobil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MobilExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Mobil::all();
    }
    public function map($mobil): array
    {
        return [
            $mobil->kd_mobil,
            $mobil->merk,
            $mobil->no_pol,
            $mobil->bangku,
            $mobil->jml_kursi,
            $mobil->tahun,

        ];
    }
    public function headings(): array
    {
        return [
            'Kode Mobil',
            'Merk',
            'No Polisi',
            'Bangku',
            'Kursi',
            'Tahun',
        ];
    }
}
