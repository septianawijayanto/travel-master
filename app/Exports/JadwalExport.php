<?php

namespace App\Exports;

use App\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JadwalExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Jadwal::all();
    }
    public function map($jadwal): array
    {
        return [
            $jadwal->jam,
            $jadwal->tujuan,
            $jadwal->biaya

        ];
    }
    public function headings(): array
    {
        return [
            'Jam',
            'Tujuan',
            'Biaya'
        ];
    }
}
